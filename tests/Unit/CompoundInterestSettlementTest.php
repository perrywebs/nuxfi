<?php

namespace Tests\Unit;

use App\Services\CompoundInterestSettlement;
use PHPUnit\Framework\TestCase;

class CompoundInterestSettlementTest extends TestCase
{
    public function test_completion_transfers_only_the_amount_not_already_paid()
    {
        $this->assertSame(250.75, CompoundInterestSettlement::pendingTransfer(250.75, 0));
        $this->assertSame(0.0, CompoundInterestSettlement::pendingTransfer(250.75, 250.75));
        $this->assertSame(40.25, CompoundInterestSettlement::pendingTransfer(291.00, 250.75));
    }
}
