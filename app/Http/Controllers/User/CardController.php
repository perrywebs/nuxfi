<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\CreditCardStatus;
use App\Models\Card;
use App\Models\Tp_Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CardController extends Controller
{
    /**
     * Submit a credit card application.
     *
     * Financial safety:
     *  - Runs inside a DB transaction with a locked user row.
     *  - Checks available balance (never trusts client fee/balance).
     *  - Only one active application per user (guards against double submit).
     *  - Email is sent only after a successful commit.
     */
    public function apply(Request $request)
    {
        $request->validate([
            'delivery_address' => 'required|string|min:10|max:500',
        ], [
            'delivery_address.required' => 'Please provide a delivery address.',
            'delivery_address.min' => 'Please enter a more complete delivery address.',
        ]);

        $userId = Auth::id();
        $fee = Card::defaultFee();

        // Pre-check: only one active application at a time.
        $activeExists = Card::where('user_id', $userId)
            ->whereIn('status', [Card::STATUS_REQUESTED, Card::STATUS_APPROVED, Card::STATUS_SHIPPED])
            ->exists();

        if ($activeExists) {
            return redirect()->route('creditcard')
                ->with('message', 'You already have an active card application.');
        }

        try {
            $card = DB::transaction(function () use ($userId, $request, $fee) {
                $user = User::where('id', $userId)->lockForUpdate()->first();

                // Re-check inside the lock (concurrency guard against double-clicks).
                $alreadyActive = Card::where('user_id', $user->id)
                    ->whereIn('status', [Card::STATUS_REQUESTED, Card::STATUS_APPROVED, Card::STATUS_SHIPPED])
                    ->lockForUpdate()
                    ->exists();

                if ($alreadyActive) {
                    throw new \Exception('You already have an active card application.');
                }

                // Available balance = account_bal - frozen_bal
                $available = $user->account_bal - $user->frozen_bal;

                if ($available < $fee) {
                    throw new \Exception('Insufficient balance');
                }

                // Debit the fee (reuse the existing account_bal column).
                User::where('id', $user->id)
                    ->update(['account_bal' => $user->account_bal - $fee]);

                // Create the card application record (source of truth).
                $card = Card::create([
                    'user_id' => $user->id,
                    'reference_number' => Card::generateReference(),
                    'fee' => $fee,
                    'delivery_address' => $request->delivery_address,
                    'status' => Card::STATUS_REQUESTED,
                ]);

                // Record the financial transaction using the EXISTING system.
                Tp_Transaction::create([
                    'user' => $user->id,
                    'plan' => 'Credit Card Application',
                    'amount' => $fee,
                    'type' => 'Card Fee',
                ]);

                return $card;
            });
        } catch (\Exception $e) {
            $message = $e->getMessage();

            if ($message === 'Insufficient balance') {
                return redirect()->route('creditcard')
                    ->with('message', 'Insufficient balance. Please fund your account and try again.');
            }

            return redirect()->route('creditcard')
                ->with('message', $message ?: 'Unable to process your application. Please try again.');
        }

        // Send the "request received" email only after a successful commit.
        try {
            Mail::to(Auth::user()->email)
                ->send(new CreditCardStatus($card, Auth::user(), 'Credit Card Request Received'));
        } catch (\Exception $e) {
            // Mail failure must not undo a successful application.
        }

        return redirect()->route('creditcard')
            ->with('success', 'Your credit card request has been received.');
    }
}
