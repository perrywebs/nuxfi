<?php

namespace App\Services;

/**
 * Shared compound-interest projection used by the investment request flow.
 * The selected duration unit is also the compounding/contribution period:
 * weekly durations compound weekly and daily durations compound daily.
 */
class CompoundInterestCalculator
{
    /** Average Gregorian month length, used by the legacy monthsFrom helper. */
    public const DAYS_PER_MONTH = 30.436875;

    public const MAX_PERIODS = 10000;

    public const DURATION_UNITS = ['monthly', 'weekly', 'daily'];

    public const DEFAULT_MONTHLY_RATE = 27.80;

    /**
     * Return a duration in the selected compounding period.
     */
    public static function periodsFrom(float $value, string $unit): float
    {
        return max(0, $value);
    }

    /**
     * Convert weekly/daily durations to fractional months for legacy callers.
     */
    public static function monthsFrom(float $value, string $unit): float
    {
        $value = max(0, $value);

        switch ($unit) {
            case 'weekly':
                return $value * 7 / self::DAYS_PER_MONTH;
            case 'daily':
                return $value / self::DAYS_PER_MONTH;
            case 'monthly':
            default:
                return $value;
        }
    }

    /**
     * Build the projection for a scenario.
     *
     * @return array{months: float, final: float, principal: float, interest: float, multiple: float, growth_percent: float}
     */
    public static function project(
        float $principal,
        float $periodRate,
        float $durationValue,
        string $durationUnit,
        float $contribution = 0.0
    ): array {
        $principal = max(0, $principal);
        $periodRate = max(0, $periodRate) / 100;
        $contribution = max(0, $contribution);

        $periods = min(self::MAX_PERIODS, self::periodsFrom($durationValue, $durationUnit));
        $fullPeriods = (int) floor($periods);
        $remainder = $periods - $fullPeriods;
        if ($remainder < 0.000001) {
            $remainder = 0.0;
        } elseif ($remainder > 0.999999) {
            $fullPeriods += 1;
            $remainder = 0.0;
        }

        $balance = $principal;
        for ($period = 1; $period <= $fullPeriods; $period++) {
            $balance += $balance * $periodRate;
            $balance += $contribution;
        }
        if ($remainder > 0) {
            $balance *= pow(1 + $periodRate, $remainder);
        }

        $principalTotal = $principal + $contribution * $fullPeriods;
        $interest = $balance - $principalTotal;

        return [
            'months' => $fullPeriods + $remainder,
            'periods' => $fullPeriods + $remainder,
            'final' => round($balance, 2),
            'principal' => round($principalTotal, 2),
            'interest' => round($interest, 2),
            'multiple' => $principalTotal > 0 ? round($balance / $principalTotal, 4) : 0.0,
            'growth_percent' => $principalTotal > 0 ? round(($interest / $principalTotal) * 100, 2) : 0.0,
        ];
    }

    /**
     * Human readable duration, e.g. "12 months" / "90 days".
     */
    public static function describeDuration(float $value, string $unit): string
    {
        $labels = [
            'monthly' => ['month', 'months'],
            'weekly' => ['week', 'weeks'],
            'daily' => ['day', 'days'],
        ];
        $pair = $labels[$unit] ?? $labels['monthly'];
        $rounded = round($value, 2);
        $label = $rounded == 1 ? $pair[0] : $pair[1];

        return rtrim(rtrim(number_format($rounded, 2, '.', ''), '0'), '.') . ' ' . $label;
    }
}
