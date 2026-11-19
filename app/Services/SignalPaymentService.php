<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\Settings;
use App\Models\SignalPayment;
use App\Models\SignalPaymentMethod;
use App\Models\SignalPlan;
use App\Models\SignalSubscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

/**
 * Handles the manual cryptocurrency payment flow for signal plan subscriptions.
 *
 * Nothing in this service touches the user's internal account balance. A payment
 * stays pending until an administrator explicitly approves it.
 */
class SignalPaymentService
{
    /**
     * Create (or reuse) a pending payment request for the given user + plan.
     * The amount and plan details are always taken from the database.
     */
    public function createRequest(User $user, SignalPlan $plan): SignalPayment
    {
        return DB::transaction(function () use ($user, $plan) {
            $existing = SignalPayment::where('user_id', $user->id)
                ->where('signal_plan_id', $plan->id)
                ->where('status', SignalPayment::STATUS_PENDING)
                ->latest('id')
                ->lockForUpdate()
                ->first();

            if ($existing) {
                return $existing;
            }

            $settings = Settings::find(1);

            $payment = SignalPayment::create([
                'user_id'         => $user->id,
                'signal_plan_id'  => $plan->id,
                'plan_name'       => $plan->name,
                'amount'          => $plan->price,
                'currency'        => $settings->currency ?? 'USD',
                'duration'        => max(1, (int) $plan->duration),
                'status'          => SignalPayment::STATUS_PENDING,
            ]);

            try {
                NotificationService::notifyAdmin(
                    'signal',
                    'New Signal Payment Request',
                    $user->name . ' started a payment request for the ' . $plan->name . ' signal plan (' . ($settings->currency ?? '') . number_format($plan->price, 2) . ').',
                    url('admin/signal-payments/' . $payment->id)
                );
            } catch (\Throwable $e) {
                report($e);
            }

            return $payment;
        });
    }

    /**
     * Attach the user's chosen payment method + transaction hash to a pending request.
     */
    public function submitTransaction(SignalPayment $payment, SignalPaymentMethod $method, string $txHash): SignalPayment
    {
        $txHash = trim($txHash);

        return DB::transaction(function () use ($payment, $method, $txHash) {
            /** @var SignalPayment $fresh */
            $fresh = SignalPayment::whereKey($payment->id)->lockForUpdate()->firstOrFail();

            if (!$fresh->isPending()) {
                throw ValidationException::withMessages([
                    'tx_hash' => 'This payment is no longer pending and cannot be updated.',
                ]);
            }

            if (!$method->is_active) {
                throw ValidationException::withMessages([
                    'payment_method_id' => 'The selected payment method is not available.',
                ]);
            }

            $duplicate = SignalPayment::where('tx_hash', $txHash)
                ->where('id', '!=', $fresh->id)
                ->exists();

            if ($duplicate) {
                throw ValidationException::withMessages([
                    'tx_hash' => 'This transaction hash has already been submitted.',
                ]);
            }

            $fresh->update([
                'signal_payment_method_id' => $method->id,
                'payment_method_name'      => $method->name,
                'payment_network'          => $method->network,
                'wallet_address'           => $method->wallet_address,
                'tx_hash'                  => $txHash,
                'submitted_at'             => now(),
            ]);

            return $fresh;
        });
    }

    /**
     * Approve a pending payment and activate the signal subscription.
     *
     * Runs inside a transaction with a row lock so the same payment can never be
     * approved twice, even if two admins click approve at the same moment.
     */
    public function approve(SignalPayment $payment, Admin $admin): SignalPayment
    {
        $approved = DB::transaction(function () use ($payment, $admin) {
            /** @var SignalPayment $fresh */
            $fresh = SignalPayment::whereKey($payment->id)->lockForUpdate()->firstOrFail();

            if (!$fresh->isPending()) {
                throw ValidationException::withMessages([
                    'payment' => 'This payment has already been ' . $fresh->status . ' and cannot be approved again.',
                ]);
            }

            if (empty($fresh->tx_hash)) {
                throw ValidationException::withMessages([
                    'payment' => 'This payment has no transaction hash yet, so it cannot be approved.',
                ]);
            }

            $approvedAt = Carbon::now();
            $duration   = max(1, (int) $fresh->duration);
            $expiresAt  = $approvedAt->copy()->addWeeks($duration);

            $subscription = SignalSubscription::where('user_id', $fresh->user_id)
                ->where('signal_plan_id', $fresh->signal_plan_id)
                ->orderByDesc('id')
                ->first();

            if ($subscription) {
                $subscription->update([
                    'starts_at'  => $approvedAt,
                    'expires_at' => $expiresAt,
                ]);
            } else {
                $subscription = SignalSubscription::create([
                    'user_id'        => $fresh->user_id,
                    'signal_plan_id' => $fresh->signal_plan_id,
                    'starts_at'      => $approvedAt,
                    'expires_at'     => $expiresAt,
                ]);
            }

            $fresh->update([
                'status'            => SignalPayment::STATUS_APPROVED,
                'approved_by'       => $admin->id,
                'approved_at'       => $approvedAt,
                'rejected_by'       => null,
                'rejected_at'       => null,
                'rejection_reason'  => null,
                'subscription_id'   => $subscription->id,
            ]);

            return $fresh;
        });

        try {
            $user = $approved->user;
            if ($user) {
                NotificationService::notifyUser(
                    $user,
                    'signal',
                    'Signal Subscription Activated',
                    'Your payment for the ' . $approved->plan_name . ' signal plan was approved. Your subscription is active until ' . optional($approved->subscription)->expires_at?->toDayDateTimeString() . '.',
                    route('user.signal.subscriptions')
                );
            }
        } catch (\Throwable $e) {
            report($e);
        }

        return $approved;
    }

    /**
     * Reject a pending payment without activating the subscription.
     */
    public function reject(SignalPayment $payment, Admin $admin, ?string $reason = null): SignalPayment
    {
        $rejected = DB::transaction(function () use ($payment, $admin, $reason) {
            /** @var SignalPayment $fresh */
            $fresh = SignalPayment::whereKey($payment->id)->lockForUpdate()->firstOrFail();

            if (!$fresh->isPending()) {
                throw ValidationException::withMessages([
                    'payment' => 'This payment has already been ' . $fresh->status . ' and cannot be rejected.',
                ]);
            }

            $fresh->update([
                'status'           => SignalPayment::STATUS_REJECTED,
                'rejection_reason' => $reason ?: null,
                'rejected_by'      => $admin->id,
                'rejected_at'      => Carbon::now(),
            ]);

            return $fresh;
        });

        try {
            $user = $rejected->user;
            if ($user) {
                NotificationService::notifyUser(
                    $user,
                    'signal',
                    'Signal Payment Rejected',
                    'Your payment for the ' . $rejected->plan_name . ' signal plan was rejected.'
                        . ($rejected->rejection_reason ? ' Reason: ' . $rejected->rejection_reason : ''),
                    route('user.signal.payments')
                );
            }
        } catch (\Throwable $e) {
            report($e);
        }

        return $rejected;
    }
}
