<?php

namespace Tests\Feature;

use App\Http\Middleware\EnsureIsAdmin;
use App\Http\Middleware\TwoFactorVerify;
use App\Models\Admin;
use App\Models\SignalPayment;
use App\Models\SignalPaymentMethod;
use App\Models\SignalPlan;
use App\Models\SignalSubscription;
use App\Models\User;
use App\Services\SignalPaymentService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class SignalPaymentFlowTest extends TestCase
{
    use DatabaseTransactions;

    private function makeUser(): User
    {
        $user = User::create([
            'name'              => 'Signal Buyer',
            'email'             => 'signal.buyer.' . uniqid() . '@example.com',
            'username'          => 'sigbuyer' . uniqid(),
            'password'          => Hash::make('secret123'),
            'email_verified_at' => now(),
            'status'            => 'active',
        ]);

        // account_bal is not mass assignable.
        $user->forceFill(['account_bal' => 500])->save();

        return $user->fresh();
    }

    private function makeMethod(): SignalPaymentMethod
    {
        return SignalPaymentMethod::create([
            'name'           => 'USDT Test',
            'currency'       => 'USDT',
            'network'        => 'TRC20',
            'wallet_address' => 'TTestWallet000000000000000000',
            'is_active'      => true,
        ]);
    }

    public function test_purchase_creates_pending_payment_without_touching_wallet_balance()
    {
        $user = $this->makeUser();
        $plan = SignalPlan::firstOrFail();

        $response = $this->actingAs($user)->post(route('user.signal.subscribe'), [
            'plan_id' => $plan->id,
            'amount'  => 1, // tampering attempt — must be ignored
        ]);

        $payment = SignalPayment::where('user_id', $user->id)->firstOrFail();

        $response->assertRedirect(route('user.signal.payment.show', $payment->id));
        $this->assertSame(SignalPayment::STATUS_PENDING, $payment->status);
        $this->assertEquals($plan->price, $payment->amount);
        $this->assertEquals($plan->name, $payment->plan_name);
        $this->assertEquals(500, $user->fresh()->account_bal);
    }

    public function test_user_cannot_view_or_confirm_another_users_payment()
    {
        $owner = $this->makeUser();
        $intruder = $this->makeUser();
        $plan = SignalPlan::firstOrFail();
        $method = $this->makeMethod();

        $payment = app(SignalPaymentService::class)->createRequest($owner, $plan);

        $this->actingAs($intruder)
            ->get(route('user.signal.payment.show', $payment->id))
            ->assertNotFound();

        $this->actingAs($intruder)
            ->post(route('user.signal.payment.confirm', $payment->id), [
                'payment_method_id' => $method->id,
                'tx_hash'           => 'TX-INTRUDER',
            ])
            ->assertNotFound();
    }

    public function test_admin_approval_activates_subscription_and_cannot_be_repeated()
    {
        $user = $this->makeUser();
        $plan = SignalPlan::firstOrFail();
        $method = $this->makeMethod();
        $admin = Admin::firstOrFail();

        $payment = app(SignalPaymentService::class)->createRequest($user, $plan);

        $this->actingAs($user)->post(route('user.signal.payment.confirm', $payment->id), [
            'payment_method_id' => $method->id,
            'tx_hash'           => 'TX-APPROVE-' . uniqid(),
        ])->assertRedirect(route('user.signal.payment.show', $payment->id));

        $this->withoutMiddleware([EnsureIsAdmin::class, TwoFactorVerify::class]);
        $this->actingAs($admin, 'admin');

        $this->post(route('signal-payments.approve', $payment->id))
            ->assertRedirect(route('signal-payments.show', $payment->id));

        $payment->refresh();
        $this->assertSame(SignalPayment::STATUS_APPROVED, $payment->status);
        $this->assertEquals($admin->id, $payment->approved_by);
        $this->assertNotNull($payment->approved_at);
        $this->assertNotNull($payment->subscription_id);

        $subscription = SignalSubscription::findOrFail($payment->subscription_id);
        $this->assertNotNull($subscription->starts_at);
        $this->assertSame(now()->addWeeks($payment->duration)->toDateString(), $subscription->expires_at->toDateString());

        $subscriptionCount = SignalSubscription::where('user_id', $user->id)
            ->where('signal_plan_id', $plan->id)
            ->count();

        $this->post(route('signal-payments.approve', $payment->id))
            ->assertSessionHas('message');

        $this->assertSame(SignalPayment::STATUS_APPROVED, $payment->fresh()->status);
        $this->assertSame(
            $subscriptionCount,
            SignalSubscription::where('user_id', $user->id)->where('signal_plan_id', $plan->id)->count()
        );
    }

    public function test_admin_rejection_does_not_activate_subscription()
    {
        $user = $this->makeUser();
        $method = $this->makeMethod();
        $admin = Admin::firstOrFail();

        $plans = SignalPlan::limit(2)->get();
        if ($plans->count() < 2) {
            $this->markTestSkipped('Need at least two signal plans.');
        }

        $plan = $plans->last();
        $payment = app(SignalPaymentService::class)->createRequest($user, $plan);
        app(SignalPaymentService::class)->submitTransaction($payment, $method, 'TX-REJECT-' . uniqid());

        $this->withoutMiddleware([EnsureIsAdmin::class, TwoFactorVerify::class]);
        $this->actingAs($admin, 'admin');

        $this->post(route('signal-payments.reject', $payment->id), [
            'rejection_reason' => 'Invalid TXID',
        ])->assertRedirect(route('signal-payments.show', $payment->id));

        $payment->refresh();
        $this->assertSame(SignalPayment::STATUS_REJECTED, $payment->status);
        $this->assertSame('Invalid TXID', $payment->rejection_reason);
        $this->assertEquals($admin->id, $payment->rejected_by);
        $this->assertNull($payment->subscription_id);
        $this->assertFalse(
            SignalSubscription::where('user_id', $user->id)->where('signal_plan_id', $plan->id)->exists()
        );
    }

    public function test_duplicate_transaction_hash_is_rejected()
    {
        $user = $this->makeUser();
        $method = $this->makeMethod();
        $plans = SignalPlan::limit(2)->get();

        if ($plans->count() < 2) {
            $this->markTestSkipped('Need at least two signal plans.');
        }

        $service = app(SignalPaymentService::class);
        $first = $service->createRequest($user, $plans[0]);
        $service->submitTransaction($first, $method, 'TX-DUPLICATE');

        $second = $service->createRequest($user, $plans[1]);

        $this->actingAs($user)->post(route('user.signal.payment.confirm', $second->id), [
            'payment_method_id' => $method->id,
            'tx_hash'           => 'TX-DUPLICATE',
        ])->assertSessionHasErrors('tx_hash');

        $this->assertNull($second->fresh()->tx_hash);
    }

    public function test_guests_cannot_access_admin_signal_payments()
    {
        $this->get(route('signal-payments.index'))->assertRedirect(route('validate_admin'));

        $user = $this->makeUser();
        $this->actingAs($user)->get(route('signal-payments.index'))->assertRedirect(route('validate_admin'));
    }

    public function test_admin_can_view_payment_lists_and_manage_wallets()
    {
        $user = $this->makeUser();
        $method = $this->makeMethod();
        $payment = app(SignalPaymentService::class)->createRequest($user, SignalPlan::firstOrFail());
        $admin = Admin::firstOrFail();

        $this->withoutMiddleware([EnsureIsAdmin::class, TwoFactorVerify::class]);
        $this->actingAs($admin, 'admin');

        $this->get(route('signal-payments.index'))->assertOk()->assertSee('Payment Requests');
        $this->get(route('signal-payments.show', $payment->id))->assertOk()->assertSee($payment->plan_name);
        $this->get(route('signal-payment-methods.index'))->assertOk()->assertSee('Configured Payment Methods');
        $this->get(route('signal-payment-methods.create'))->assertOk();
        $this->get(route('signal-payment-methods.edit', $method->id))->assertOk();

        $this->post(route('signal-payment-methods.toggle', $method->id))->assertRedirect();
        $this->assertFalse($method->fresh()->is_active);

        $this->put(route('signal-payment-methods.update', $method->id), [
            'name'           => 'USDT Updated',
            'currency'       => 'USDT',
            'network'        => 'TRC20',
            'wallet_address' => 'TUpdatedWalletAddress',
            'is_active'      => 1,
        ])->assertRedirect(route('signal-payment-methods.index'));

        $method->refresh();
        $this->assertSame('USDT Updated', $method->name);
        $this->assertTrue($method->is_active);

        // Unused method is permanently deleted.
        $this->delete(route('signal-payment-methods.destroy', $method->id))
            ->assertRedirect(route('signal-payment-methods.index'));
        $this->assertNull(SignalPaymentMethod::find($method->id));
    }

    public function test_method_referenced_by_a_payment_is_archived_instead_of_deleted()
    {
        $user = $this->makeUser();
        $method = $this->makeMethod();
        $admin = Admin::firstOrFail();

        $service = app(SignalPaymentService::class);
        $payment = $service->createRequest($user, SignalPlan::firstOrFail());
        $service->submitTransaction($payment, $method, 'TX-ARCHIVE-' . uniqid());

        $this->withoutMiddleware([EnsureIsAdmin::class, TwoFactorVerify::class]);
        $this->actingAs($admin, 'admin');

        $this->delete(route('signal-payment-methods.destroy', $method->id))
            ->assertRedirect(route('signal-payment-methods.index'));

        $this->assertSoftDeleted('signal_payment_methods', ['id' => $method->id]);
        $this->assertDatabaseHas('signal_payments', [
            'id'                      => $payment->id,
            'signal_payment_method_id' => $method->id,
        ]);
    }
}
