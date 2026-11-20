<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CompoundInvestment;
use App\Models\Settings;
use App\Models\User;
use App\Models\Wdmethod;
use App\Services\CompoundInterestCalculator;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CompoundInvestmentController extends Controller
{
    /**
     * List every compound investment belonging to the signed-in user.
     */
    public function index()
    {
        $investments = CompoundInvestment::forUser(Auth::id())
            ->withCount('credits')
            ->orderByDesc('created_at')
            ->paginate(10);

        $summary = [
            'total_invested' => (float) CompoundInvestment::forUser(Auth::id())
                ->whereIn('status', [CompoundInvestment::STATUS_ACTIVE, CompoundInvestment::STATUS_COMPLETED])
                ->sum('starting_amount'),
            'total_interest' => (float) CompoundInvestment::forUser(Auth::id())->sum('total_interest_credited'),
            'active_count' => CompoundInvestment::forUser(Auth::id())->where('status', CompoundInvestment::STATUS_ACTIVE)->count(),
            'pending_count' => CompoundInvestment::forUser(Auth::id())->where('status', CompoundInvestment::STATUS_PENDING)->count(),
        ];

        return view('user.compound-investments.index', [
            'title' => 'Compound Investments',
            'investments' => $investments,
            'summary' => $summary,
        ]);
    }

    /**
     * Scenario builder + funding request form.
     */
    public function create(Request $request)
    {
        $user = Auth::user();

        $prefill = [
            'principal' => (float) $request->query('principal', 5000),
            'rate' => (float) $request->query('rate', CompoundInterestCalculator::DEFAULT_MONTHLY_RATE),
            'duration' => (float) $request->query('duration', $request->query('months', 12)),
            'unit' => in_array($request->query('unit'), CompoundInterestCalculator::DURATION_UNITS, true)
                ? $request->query('unit')
                : 'monthly',
            'contribution' => (float) $request->query('contribution', 0),
        ];

        $methods = Wdmethod::where(function ($query) {
            $query->where('type', 'deposit')->orWhere('type', 'both');
        })
            ->where('status', 'enabled')
            ->whereNotNull('wallet_address')
            ->where('wallet_address', '<>', '')
            ->orderBy('name')
            ->get();

        $hasPending = CompoundInvestment::forUser($user->id)
            ->where('status', CompoundInvestment::STATUS_PENDING)
            ->exists();

        return view('user.compound-investments.create', [
            'title' => 'Start Compounding',
            'prefill' => $prefill,
            'methods' => $methods,
            'hasPending' => $hasPending,
        ]);
    }

    /**
     * Persist a new investment request. Nothing is credited here: an admin
     * must review the payment before the investment becomes active.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'submission_key' => 'required|uuid',
            'starting_amount' => 'required|numeric|min:1|max:100000000',
            'period_return_rate' => 'required|numeric|min:0.1|max:100',
            'duration_value' => 'required|integer|min:1|max:10000',
            'duration_unit' => 'required|in:monthly,weekly,daily',
            'recurring_topup' => 'nullable|numeric|min:0|max:100000000',
            'payment_method' => 'required|integer|exists:wdmethods,id',
            'payment_reference' => 'nullable|string|max:191',
            'proof' => 'required|file|mimes:jpeg,jpg,png,pdf|max:4096',
            'user_note' => 'nullable|string|max:1000',
        ]);

        $method = Wdmethod::where('id', $validated['payment_method'])
            ->where('status', 'enabled')
            ->whereNotNull('wallet_address')
            ->where('wallet_address', '<>', '')
            ->where(function ($query) {
                $query->where('type', 'deposit')->orWhere('type', 'both');
            })
            ->first();

        if (!$method) {
            return back()->withInput()->with('message', 'The selected payment method is no longer available.');
        }

        // The unique submission token also protects against a concurrent
        // browser double-submit; normal form resubmissions reuse the same key.
        if (CompoundInvestment::where('submission_key', $validated['submission_key'])->exists()) {
            return redirect()->route('compound-investments.index')
                ->with('message', 'You already submitted this investment request. Please wait for it to be reviewed.');
        }

        $startingAmount = round((float) $validated['starting_amount'], 2);
        $rate = round((float) $validated['period_return_rate'], 2);
        $durationValue = (float) $validated['duration_value'];
        $unit = $validated['duration_unit'];
        $topup = round((float) ($validated['recurring_topup'] ?? 0), 2);

        $projection = CompoundInterestCalculator::project($startingAmount, $rate, $durationValue, $unit, $topup);

        if (!is_finite($projection['final']) || $projection['final'] > 9999999999999999.99) {
            return back()->withInput()->withErrors([
                'duration_value' => 'This scenario exceeds the supported projection range. Reduce the duration, return, or recurring amount.',
            ]);
        }

        $proofPath = $request->file('proof')->store('uploads', 'public');

        try {
            $investment = DB::transaction(function () use ($user, $validated, $method, $proofPath, $startingAmount, $rate, $durationValue, $unit, $topup, $projection) {
            $investment = CompoundInvestment::create([
                'reference' => CompoundInvestment::generateReference(),
                'submission_key' => $validated['submission_key'],
                'user' => $user->id,
                'status' => CompoundInvestment::STATUS_PENDING,
                'starting_amount' => $startingAmount,
                'period_return_rate' => $rate,
                'duration_value' => $durationValue,
                'duration_unit' => $unit,
                'recurring_topup' => $topup,
                'recurring_frequency' => $unit,
                'projected_final_amount' => $projection['final'],
                'projected_interest' => $projection['interest'],
                'deposit_amount' => $startingAmount,
                'payment_method' => $method->name,
                'payment_currency' => $method->name,
                'payment_network' => $method->network ?? null,
                'payment_reference' => $validated['payment_reference'] ?? null,
                'wallet_address' => $method->wallet_address,
                'proof' => $proofPath,
                'user_note' => $validated['user_note'] ?? null,
            ]);

            $investment->logActivity(
                'created',
                'Investment request submitted by the user.',
                [
                    'starting_amount' => $startingAmount,
                    'period_return_rate' => $rate,
                    'duration' => $investment->durationLabel(),
                    'projected_final_amount' => $projection['final'],
                ],
                'user',
                $user->id,
                $user->name
            );

            return $investment;
            });
        } catch (\Illuminate\Database\QueryException $e) {
            Storage::disk('public')->delete($proofPath);
            if (CompoundInvestment::where('submission_key', $validated['submission_key'])->exists()) {
                return redirect()->route('compound-investments.index')
                    ->with('message', 'You already submitted this investment request. Please wait for it to be reviewed.');
            }

            throw $e;
        }

        $settings = Settings::where('id', 1)->first();

        try {
            Mail::to($user->email)->send(new \App\Mail\CompoundInvestmentStatus($investment, $user, 'submitted'));
        } catch (\Exception $e) {
            Log::error('Compound investment request email failed: ' . $e->getMessage());
        }

        try {
            if ($settings && $settings->contact_email) {
                Mail::to($settings->contact_email)->send(new \App\Mail\NewNotification(
                    $user->name . ' submitted a compound investment request ' . $investment->reference
                        . ' for $' . number_format($startingAmount, 2) . '. Review it in the admin dashboard.',
                    'New Compound Investment Request',
                    'Admin',
                    url('admin/compound-investments/' . $investment->id)
                ));
            }
        } catch (\Exception $e) {
            Log::error('Admin compound investment email failed: ' . $e->getMessage());
        }

        NotificationService::notifyUser(
            $user,
            'investment',
            'Compound Investment Submitted',
            'Your compound investment request ' . $investment->reference . ' for $' . number_format($startingAmount, 2) . ' has been submitted and is awaiting review.',
            url('dashboard/compound-investments/' . $investment->id)
        );

        NotificationService::notifyAdmin(
            'investment',
            'New Compound Investment Request',
            $user->name . ' submitted a compound investment request ' . $investment->reference . ' for $' . number_format($startingAmount, 2) . '.',
            url('admin/compound-investments/' . $investment->id)
        );

        return redirect()->route('compound-investments.show', $investment->id)
            ->with('success', 'Your compound investment request has been submitted. You will be notified once it is reviewed.');
    }

    /**
     * Investment details, interest credits and status timeline.
     */
    public function show($id)
    {
        $investment = CompoundInvestment::with(['credits', 'activities'])
            ->where('user', Auth::id())
            ->findOrFail($id);

        return view('user.compound-investments.show', [
            'title' => 'Investment ' . $investment->reference,
            'investment' => $investment,
        ]);
    }
}
