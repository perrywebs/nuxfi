<?php

namespace Tests\Unit;

use App\Services\CompoundInterestCalculator;
use PHPUnit\Framework\TestCase;

class CompoundInterestCalculatorTest extends TestCase
{
    public function test_monthly_compounding_includes_end_of_period_contributions()
    {
        $projection = CompoundInterestCalculator::project(1000, 10, 2, 'monthly', 100);

        $this->assertSame(1420.0, $projection['final']);
        $this->assertSame(1200.0, $projection['principal']);
        $this->assertSame(220.0, $projection['interest']);
    }

    public function test_selected_weekly_or_daily_unit_is_the_compounding_period()
    {
        $weekly = CompoundInterestCalculator::project(1000, 10, 2, 'weekly');
        $daily = CompoundInterestCalculator::project(1000, 10, 2, 'daily');

        $this->assertSame(1210.0, $weekly['final']);
        $this->assertSame(1210.0, $daily['final']);
    }

    public function test_fractional_period_grows_without_a_partial_recurring_contribution()
    {
        $projection = CompoundInterestCalculator::project(1000, 10, 1.5, 'monthly', 100);

        $this->assertSame(1100.0, $projection['principal']);
        $this->assertEqualsWithDelta(1258.57, $projection['final'], 0.01);
    }
}
