<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\LeaderboardService;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    /**
     * Top Earners leaderboard.
     */
    public function index(Request $request, LeaderboardService $service)
    {
        $period = $service->validPeriod($request->query('period'));

        // Aggregated, ranked list of earners (user_id => earnings)
        $ranked = $service->ranked($period);

        // Top 4 podium
        $podium = $service->podium($ranked);

        // Full leaderboard (20 per page, global ranks preserved)
        $rows = $service->paginate($ranked, 20);

        // Eager-load users for the current page + podium (2 small queries, no N+1)
        $users = User::whereIn('id', collect($rows->items())->pluck('user_id')->all())
            ->get()
            ->keyBy('id');

        $podiumUsers = User::whereIn('id', collect($podium)->pluck('user_id')->all())
            ->get()
            ->keyBy('id');

        // Current authenticated user's position
        $myRank = $service->rankOf($ranked, auth()->id());
        $myEarnings = $myRank ? $ranked[$myRank - 1]['earnings'] : 0;

        return view('user.top-earners')->with([
            'title' => 'Top Earners',
            'period' => $period,
            'periods' => [
                ['key' => '1d', 'label' => '1D'],
                ['key' => '1w', 'label' => '1W'],
                ['key' => '1m', 'label' => '1M'],
                ['key' => 'all', 'label' => 'Combined'],
            ],
            'podium' => $podium,
            'podiumUsers' => $podiumUsers,
            'rows' => $rows,
            'users' => $users,
            'myRank' => $myRank,
            'myEarnings' => $myEarnings,
            'totalEarners' => count($ranked),
        ]);
    }
}
