<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

/**
 * Top Earners leaderboard.
 *
 * Earnings are aggregated directly from the application's real profit
 * records using database aggregation (no per-user PHP calculation):
 *
 *  1. Trades            → trades.profit_loss  (closed, live, positive)     dated by COALESCE(settled_at, created_at)
 *  2. Investments (ROI) → tp__transactions.amount (type = 'ROI', positive) dated by created_at
 *  3. Copy trading      → copy_simulated_trades.profit_loss (positive)     dated by executed_at
 *  4. Bot trading       → bot_simulated_trades.profit_loss (positive)      dated by executed_at
 *
 * Only positive (earned) amounts count, matching the application's own
 * "Total Profit" / roi accounting which accumulates wins and ROI returns.
 */
class LeaderboardService
{
    public const PERIODS = ['1d', '1w', '1m', 'all'];

    /**
     * Normalize an incoming period value to a known key.
     */
    public function validPeriod(?string $period): string
    {
        return in_array($period, self::PERIODS, true) ? $period : 'all';
    }

    /**
     * Start-of-period cutoff for the given filter, or null for "Combined".
     */
    protected function cutoff(string $period): ?\Carbon\Carbon
    {
        return match ($period) {
            '1d' => now()->subHours(24),
            '1w' => now()->subDays(7),
            '1m' => now()->subDays(30),
            default => null,
        };
    }

    /**
     * Full ranked list: [['user_id' => int, 'earnings' => float], ...] ordered by earnings DESC.
     */
    public function ranked(string $period): array
    {
        $cutoff = $this->cutoff($period);

        // 1. Realized trading profits (closed live trades)
        $trades = DB::table('trades')
            ->selectRaw('user_id, SUM(profit_loss) AS e')
            ->where('status', 'closed')
            ->where('is_demo', 0)
            ->where('profit_loss', '>', 0)
            ->when($cutoff, function ($q) use ($cutoff) {
                $q->where(DB::raw('COALESCE(settled_at, created_at)'), '>=', $cutoff);
            })
            ->groupBy('user_id');

        // 2. Investment ROI payments
        $roi = DB::table('tp__transactions')
            ->selectRaw('`user` AS user_id, SUM(CAST(amount AS DECIMAL(15,2))) AS e')
            ->where('type', 'ROI')
            ->when($cutoff, function ($q) use ($cutoff) {
                $q->where('created_at', '>=', $cutoff);
            })
            ->groupBy('user');

        // 3. Copy trading simulated trade profits
        $copy = DB::table('copy_simulated_trades')
            ->join('copy_positions', 'copy_positions.id', '=', 'copy_simulated_trades.copy_position_id')
            ->selectRaw('copy_positions.user_id AS user_id, SUM(copy_simulated_trades.profit_loss) AS e')
            ->where('copy_simulated_trades.profit_loss', '>', 0)
            ->when($cutoff, function ($q) use ($cutoff) {
                $q->where('copy_simulated_trades.executed_at', '>=', $cutoff);
            })
            ->groupBy('copy_positions.user_id');

        // 4. Bot trading simulated trade profits
        $bot = DB::table('bot_simulated_trades')
            ->join('bot_subscriptions', 'bot_subscriptions.id', '=', 'bot_simulated_trades.bot_subscription_id')
            ->selectRaw('bot_subscriptions.user_id AS user_id, SUM(bot_simulated_trades.profit_loss) AS e')
            ->where('bot_simulated_trades.profit_loss', '>', 0)
            ->when($cutoff, function ($q) use ($cutoff) {
                $q->where('bot_simulated_trades.executed_at', '>=', $cutoff);
            })
            ->groupBy('bot_subscriptions.user_id');

        $union = $trades->unionAll($roi)->unionAll($copy)->unionAll($bot);

        $rows = DB::table(DB::raw('(' . $union->toSql() . ') AS src'))
            ->mergeBindings($union)
            ->join('users', 'users.id', '=', 'src.user_id')
            ->selectRaw('src.user_id, SUM(src.e) AS total_earnings')
            ->groupBy('src.user_id')
            ->orderByDesc('total_earnings')
            ->get();

        return $rows
            ->map(fn ($row) => [
                'user_id' => (int) $row->user_id,
                'earnings' => round((float) $row->total_earnings, 2),
            ])
            ->values()
            ->all();
    }

    /**
     * Podium slice (top 4).
     */
    public function podium(array $ranked): array
    {
        return array_slice($ranked, 0, 4);
    }

    /**
     * Paginate the ranked list preserving global ranks.
     */
    public function paginate(array $ranked, int $perPage = 20): LengthAwarePaginator
    {
        $page = max(1, (int) request('page'));
        $items = array_slice($ranked, ($page - 1) * $perPage, $perPage);

        return new LengthAwarePaginator(
            $items,
            count($ranked),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }

    /**
     * 1-based rank of a user, or null if not ranked.
     */
    public function rankOf(array $ranked, ?int $userId): ?int
    {
        if (!$userId) {
            return null;
        }

        foreach ($ranked as $index => $entry) {
            if ($entry['user_id'] === $userId) {
                return $index + 1;
            }
        }

        return null;
    }
}
