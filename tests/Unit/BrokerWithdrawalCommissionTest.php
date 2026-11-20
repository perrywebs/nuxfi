<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class BrokerWithdrawalCommissionTest extends TestCase
{
    public function test_only_a_complete_enabled_user_configuration_is_returned()
    {
        $user = new User();
        $user->broker_commission_enabled = true;
        $user->broker_commission_amount = 12.50;
        $user->broker_commission_currency = 'BTC';
        $user->broker_commission_wallet = 'bc1qexamplewallet';
        $user->broker_commission_note = 'Use Bitcoin network';

        $this->assertSame([
            'amount' => 12.5,
            'currency' => 'BTC',
            'wallet' => 'bc1qexamplewallet',
            'note' => 'Use Bitcoin network',
        ], $user->brokerCommission());
    }

    public function test_disabled_or_incomplete_commission_is_skipped()
    {
        $user = new User();
        $user->broker_commission_enabled = true;
        $user->broker_commission_amount = 12.50;
        $user->broker_commission_currency = 'BTC';
        $this->assertNull($user->brokerCommission());

        $user->broker_commission_wallet = 'bc1qexamplewallet';
        $user->broker_commission_enabled = false;
        $this->assertNull($user->brokerCommission());
    }
}
