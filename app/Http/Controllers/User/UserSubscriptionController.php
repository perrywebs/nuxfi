<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\Signal;
use App\Models\SignalPayment;
use App\Models\SignalPaymentMethod;
use App\Models\SignalPlan;
use App\Models\SignalSubscription;
use App\Services\SignalPaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserSubscriptionController extends Controller
{
    public function __construct(private SignalPaymentService $payments)
    {
    }

    public function index()
    {
        $user = auth()->user();
        $title = 'Signal Subscribed';
        $settings = Settings::where('id', 1)->first();

        // Check if the user has an active signal subscription
        $activeSubscription = SignalSubscription::where('user_id', $user->id)
            ->where('expires_at', '>', now())
            ->exists();

        if (!$activeSubscription) {
            return redirect()->route('user.signal.plans')->with('message', 'You need an active subscription to view signals.');
        }

        $signals = Signal::latest()->get();
        return view('user.signals.index', compact('signals', 'title', 'settings'));
    }

    public function showPlans()
    {
        $plans = SignalPlan::all();
        $settings = Settings::where('id', 1)->first();
        $title = 'Suscribe Signals';

        $pendingPayments = SignalPayment::where('user_id', Auth::id())
            ->pending()
            ->latest('id')
            ->get();

        return view('user.signals.subscribe', compact('plans', 'title', 'settings', 'pendingPayments'));
    }

    /**
     * Create a manual crypto payment request. No wallet balance is deducted.
     */
    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'plan_id' => 'required|integer|exists:signal_plans,id',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $plan = SignalPlan::findOrFail($validated['plan_id']);

        $payment = $this->payments->createRequest($user, $plan);

        return redirect()
            ->route('user.signal.payment.show', $payment->id)
            ->with('success', 'Your signal payment request was created. Complete the cryptocurrency payment below.');
    }

    // Show user's signal subscriptions
    public function mySubscriptions()
    {
        $title = 'Signals';
        $settings = Settings::where('id', 1)->first();
        $subscriptions = SignalSubscription::where('user_id', Auth::id())
            ->with('plan')
            ->latest('id')
            ->get();

        return view('user.signals.subscriptions', compact('subscriptions', 'title', 'settings'));
    }

    /**
     * Renewing now creates a new manual crypto payment request instead of
     * deducting from the internal wallet.
     */
    public function renew(Request $request, $subscriptionId)
    {
        $subscription = SignalSubscription::where('id', $subscriptionId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $plan = SignalPlan::findOrFail($subscription->signal_plan_id);

        $payment = $this->payments->createRequest(Auth::user(), $plan);

        return redirect()
            ->route('user.signal.payment.show', $payment->id)
            ->with('success', 'Your renewal payment request was created. Complete the cryptocurrency payment below.');
    }

    /**
     * Dedicated signal payment page for the authenticated user's own request.
     */
    public function showPayment($id)
    {
        $settings = Settings::where('id', 1)->first();

        $payment = SignalPayment::with(['signalPlan', 'paymentMethod'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        $methods = SignalPaymentMethod::active()
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $title = 'Signal Payment';

        return view('user.signals.payment', compact('payment', 'methods', 'settings', 'title'));
    }

    /**
     * Attach the transaction hash + chosen method to the pending request.
     */
    public function confirmPayment(Request $request, $id)
    {
        $payment = SignalPayment::where('user_id', Auth::id())->findOrFail($id);

        $validated = $request->validate([
            'payment_method_id' => 'required|integer|exists:signal_payment_methods,id',
            'tx_hash'           => 'required|string|min:6|max:191',
        ]);

        $method = SignalPaymentMethod::active()->find($validated['payment_method_id']);

        if (!$method) {
            return redirect()->back()->withInput()->withErrors([
                'payment_method_id' => 'The selected payment method is not available.',
            ]);
        }

        try {
            $this->payments->submitTransaction($payment, $method, $validated['tx_hash']);
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->withErrors($e->errors());
        }

        return redirect()
            ->route('user.signal.payment.show', $payment->id)
            ->with('success', 'Payment confirmation submitted. Your subscription will be activated after admin verification.');
    }

    /**
     * User payment history — scoped strictly to the authenticated user.
     */
    public function paymentHistory()
    {
        $settings = Settings::where('id', 1)->first();
        $title = 'Signal Payment History';

        $payments = SignalPayment::with(['signalPlan', 'paymentMethod'])
            ->where('user_id', Auth::id())
            ->latest('id')
            ->paginate(10);

        return view('user.signals.payments', compact('payments', 'settings', 'title'));
    }
}
