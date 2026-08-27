<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\CreditCardStatus;
use App\Models\Card;
use App\Models\Tp_Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CardController extends Controller
{
    /**
     * List card applications with search / status filter.
     */
    public function index(Request $request)
    {
        $query = Card::with('user')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('reference_number', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($u) use ($search) {
                        $u->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%")
                            ->orWhere('username', 'like', "%{$search}%");
                    });
            });
        }

        $cards = $query->paginate(20)->withQueryString();

        return view('admin.cards.index', compact('cards'));
    }

    public function show(Card $card)
    {
        $card->load('user');

        return view('admin.cards.show', compact('card'));
    }

    /**
     * requested → approved
     */
    public function approve(Request $request, Card $card)
    {
        if (!$card->canTransitionTo(Card::STATUS_APPROVED)) {
            return back()->with('message', 'Only requested applications can be approved.');
        }

        $card->update(['status' => Card::STATUS_APPROVED]);
        $this->sendEmail($card, 'Credit Card Request Approved');

        return back()->with('success', 'Card application approved and customer notified.');
    }

    /**
     * requested → denied  +  refund (protected against double refund).
     */
    public function deny(Request $request, Card $card)
    {
        if (!$card->canTransitionTo(Card::STATUS_DENIED)) {
            return back()->with('message', 'Only requested applications can be denied.');
        }

        try {
            DB::transaction(function () use ($card) {
                $locked = Card::where('id', $card->id)->lockForUpdate()->first();

                if (!$locked->canTransitionTo(Card::STATUS_DENIED)) {
                    throw new \Exception('Application status changed. Please refresh and try again.');
                }

                // Refund only once — guard against duplicate execution.
                if ($locked->refunded_at) {
                    $locked->update(['status' => Card::STATUS_DENIED]);
                    return;
                }

                $user = User::where('id', $locked->user_id)->lockForUpdate()->first();

                // Credit the fee back to the customer's balance.
                User::where('id', $user->id)
                    ->update(['account_bal' => $user->account_bal + $locked->fee]);

                Tp_Transaction::create([
                    'user' => $user->id,
                    'plan' => 'Credit Card Refund',
                    'amount' => $locked->fee,
                    'type' => 'Card Refund',
                ]);

                $locked->update([
                    'status' => Card::STATUS_DENIED,
                    'refunded_at' => now(),
                ]);
            });
        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage() ?: 'Unable to deny this application.');
        }

        $this->sendEmail($card, 'Credit Card Request Denied');

        return back()->with('success', 'Application denied and fee refunded to the customer.');
    }

    /**
     * approved → shipped
     */
    public function ship(Request $request, Card $card)
    {
        if (!$card->canTransitionTo(Card::STATUS_SHIPPED)) {
            return back()->with('message', 'Only approved applications can be shipped.');
        }

        $card->update(['status' => Card::STATUS_SHIPPED]);
        $this->sendEmail($card, 'Your Credit Card Has Been Shipped');

        return back()->with('success', 'Card marked as shipped and customer notified.');
    }

    /**
     * shipped → delivered
     */
    public function deliver(Request $request, Card $card)
    {
        if (!$card->canTransitionTo(Card::STATUS_DELIVERED)) {
            return back()->with('message', 'Only shipped cards can be marked delivered.');
        }

        $card->update(['status' => Card::STATUS_DELIVERED]);
        $this->sendEmail($card, 'Your Credit Card Has Been Delivered');

        return back()->with('success', 'Card marked as delivered and customer notified.');
    }

    protected function sendEmail(Card $card, string $subject)
    {
        try {
            $card->load('user');
            Mail::to($card->user->email)
                ->send(new CreditCardStatus($card, $card->user, $subject));
        } catch (\Exception $e) {
            // Email failure must not roll back the status change.
        }
    }
}
