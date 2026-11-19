<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SignalPayment;
use App\Models\SignalPaymentMethod;
use App\Models\SignalPlan;
use App\Models\Settings;
use App\Services\SignalPaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class SignalPaymentController extends Controller
{
    public function __construct(private SignalPaymentService $payments)
    {
    }

    /**
     * List all signal subscription payment requests with search/filters.
     */
    public function index(Request $request)
    {
        $title = 'Signal Payments';

        $query = SignalPayment::with(['user', 'signalPlan', 'paymentMethod'])->latest('id');

        if ($request->filled('q')) {
            $q = trim($request->input('q'));
            $query->where(function ($sub) use ($q) {
                $sub->where('tx_hash', 'like', "%{$q}%")
                    ->orWhere('plan_name', 'like', "%{$q}%")
                    ->orWhereHas('user', function ($u) use ($q) {
                        $u->where('name', 'like', "%{$q}%")
                            ->orWhere('email', 'like', "%{$q}%")
                            ->orWhere('id', $q);
                    });
            });
        }

        $status = $request->input('status', 'all');
        if (in_array($status, ['pending', 'approved', 'rejected'], true)) {
            $query->where('status', $status);
        } else {
            $status = 'all';
        }

        if ($request->filled('plan_id')) {
            $query->where('signal_plan_id', $request->input('plan_id'));
        }

        if ($request->filled('method_id')) {
            $query->where('signal_payment_method_id', $request->input('method_id'));
        }

        $payments = $query->paginate(20)->withQueryString();

        $stats = [
            'pending'  => SignalPayment::where('status', SignalPayment::STATUS_PENDING)->count(),
            'approved' => SignalPayment::where('status', SignalPayment::STATUS_APPROVED)->count(),
            'rejected' => SignalPayment::where('status', SignalPayment::STATUS_REJECTED)->count(),
            'pending_amount' => (float) SignalPayment::where('status', SignalPayment::STATUS_PENDING)->sum('amount'),
        ];

        $plans = SignalPlan::orderBy('name')->get();
        $methods = SignalPaymentMethod::withTrashed()->orderBy('name')->get();
        $currency = optional(Settings::find(1))->currency ?: 'USD';

        return view('admin.signals.payments.index', compact(
            'payments', 'stats', 'plans', 'methods', 'status', 'title', 'currency'
        ));
    }

    public function show($id)
    {
        $title = 'Signal Payment Details';
        $payment = SignalPayment::with(['user', 'signalPlan', 'paymentMethod', 'subscription', 'approver', 'rejecter'])
            ->findOrFail($id);

        return view('admin.signals.payments.show', compact('payment', 'title'));
    }

    /**
     * Approve a pending payment + activate the subscription.
     */
    public function approve($id)
    {
        $payment = SignalPayment::findOrFail($id);
        $admin = Auth::guard('admin')->user();

        try {
            $this->payments->approve($payment, $admin);
        } catch (ValidationException $e) {
            return redirect()->back()->with('message', collect($e->errors())->flatten()->first());
        } catch (\Throwable $e) {
            Log::error('Signal payment approval failed: ' . $e->getMessage());
            return redirect()->back()->with('message', 'Unable to approve this payment. Please try again.');
        }

        return redirect()
            ->route('signal-payments.show', $payment->id)
            ->with('success', 'Payment approved and signal subscription activated.');
    }

    /**
     * Reject a pending payment without activating the subscription.
     */
    public function reject(Request $request, $id)
    {
        $validated = $request->validate([
            'rejection_reason' => 'nullable|string|max:1000',
        ]);

        $payment = SignalPayment::findOrFail($id);
        $admin = Auth::guard('admin')->user();

        try {
            $this->payments->reject($payment, $admin, $validated['rejection_reason'] ?? null);
        } catch (ValidationException $e) {
            return redirect()->back()->with('message', collect($e->errors())->flatten()->first());
        } catch (\Throwable $e) {
            Log::error('Signal payment rejection failed: ' . $e->getMessage());
            return redirect()->back()->with('message', 'Unable to reject this payment. Please try again.');
        }

        return redirect()
            ->route('signal-payments.show', $payment->id)
            ->with('success', 'Payment rejected. The subscription was not activated.');
    }
}
