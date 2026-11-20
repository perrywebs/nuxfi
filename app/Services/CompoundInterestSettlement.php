<?php

namespace App\Services;

class CompoundInterestSettlement
{
    /**
     * Return only interest accumulated since the last completion payout.
     * Persisting the transferred total under the investment row lock makes a
     * repeated completion request produce zero and prevents duplicate credit.
     */
    public static function pendingTransfer(float $accumulated, float $alreadyTransferred): float
    {
        return max(0, round(max(0, $accumulated) - max(0, $alreadyTransferred), 2));
    }
}
