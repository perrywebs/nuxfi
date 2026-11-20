<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\CompoundInterestCredited;
use App\Mail\CompoundInvestmentStatus;
use App\Models\CompoundInvestment;
use App\Models\CompoundInvestmentCredit;
use App\Models\Settings;
use App\Models\Tp_Transaction;
use App\Models\User;
use App\Services\NotificationService;
use App\Services\CompoundInterestSettlement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CompoundInterestController extends Controller
{
    /**
     * Investment list with search and status filters.
     */
    public function index(Request $request)
    {
        $request->validate([
            'status' => 'nullable|in:pending,approved,active,completed,rejected',
            'q' => 'nullable|string|max:191',
            'from' => 'nullable|date',
            'to' => 'nullable|date',
        ]);

        $query = CompoundInvestment::with('customer');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('q')) {
            $term = trim($request->q);
            $query->where(function ($builder) use ($term) {
                $builder->where('reference', 'like', '%' . $term . '%')
                    ->orWhere('payment_method', 'like', '%' . $term . '%')
                    ->orWhereHas('customer', function ($userQuery) use ($term) {
                        $userQuery->where('name', 'like', '%' . $term . '%')
                            ->orWhere('email', 'like', '%' . $term . '%')
                            ->orWhere('username', 'like', '%' . $term . '%');
                    });
            });
        }

        if ($request->filled('from')) {
            $query->whereDate('created_at', '>=', $request->from);
        }

        if ($request->filled('to')) {
            $query->whereDate('created_at', '<=', $request->to);
        }

        $investments = $query->orderByDesc('created_at')->paginate(15)->withQueryString();

        $stats = [
            'pending' => CompoundInvestment::where('status', CompoundInvestment::STATUS_PENDING)->count(),
            'approved' => CompoundInvestment::where('status', CompoundInvestment::STATUS_APPROVED)->count(),
            'active' => CompoundInvestment::where('status', CompoundInvestment::STATUS_ACTIVE)->count(),
            'completed' => CompoundInvestment::where('status', CompoundInvestment::STATUS_COMPLETED)->count(),
            'rejected' => CompoundInvestment::where('status', CompoundInvestment::STATUS_REJECTED)->count(),
            'principal' => (float) CompoundInvestment::whereIn('status', [
                CompoundInvestment::STATUS_APPROVED,
                CompoundInvestment::STATUS_ACTIVE,
                CompoundInvestment::STATUS_COMPLETED,
            ])->sum('starting_amount'),
            'interest_credited' => (float) CompoundInvestment::sum('total_interest_credited'),
        ];

        return view('admin.compound-investments.index', [
            'title' => 'Compound Interest',
            'investments' => $investments,
            'stats' => $stats,
        ]);
    }

    public function show($id)
    {
        $investment = CompoundInvestment::with(['customer', 'credits', 'activities'])->findOrFail($id);

        return view('admin.compound-investments.show', [
            'title' => 'Compound Investment ' . $investment->reference,
            'investment' => $investment,
        ]);
    }

    public function approve($id)
    {
        $admin = Auth::guard('admin')->user();

        $result = DB::transaction(function () use ($id, $admin) {
            $investment = CompoundInvestment::where('id', $id)->lockForUpdate()->firstOrFail();

            if (!$investment->isPending()) {
                return ['error' => 'Only pending investment requests can be approved.'];
            }

            $now = now();
            $start = $now->copy()->startOfDay();
            $end = $this->investmentEndDate(
                $start,
                (float) $investment->duration_value,
                $investment->duration_unit
            );

            // Approval includes activation so the user's requested investment
            // starts immediately after payment review.
            $investment->status = CompoundInvestment::STATUS_ACTIVE;
            $investment->approved_at = now();
            $investment->activated_at = $now;
            $investment->start_date = $start->toDateString();
            $investment->end_date = $end->toDateString();
            $investment->reviewed_by = $admin->id;
            $investment->reviewed_by_name = trim($admin->firstName . ' ' . $admin->lastName);
            $investment->save();

            $investment->logActivity(
                'approved',
                'Investment request approved by ' . $investment->reviewed_by_name . '.',
                [],
                'admin',
                $admin->id,
                $investment->reviewed_by_name
            );
            $investment->logActivity(
                'activated',
                'Investment activated on approval by ' . $investment->reviewed_by_name . '.',
                [
                    'start_date' => $investment->start_date->toDateString(),
                    'end_date' => $investment->end_date->toDateString(),
                ],
                'admin',
                $admin->id,
                $investment->reviewed_by_name
            );

            return ['investment' => $investment];
        });

        if (isset($result['error'])) {
            return back()->with('error', $result['error']);
        }

        $investment = $result['investment'];
        $this->sendStatusMail($investment, 'activated');
        $this->notifyUser($investment, 'Investment Active', 'Your compound investment ' . $investment->reference . ' has been approved and is now active.');

        return back()->with('success', 'Investment request approved and activated.');
    }

    public function reject(Request $request, $id)
    {
        $validated = $request->validate([
            'reason' => 'required|string|max:1000',
        ]);

        $admin = Auth::guard('admin')->user();

        $result = DB::transaction(function () use ($id, $admin, $validated) {
            $investment = CompoundInvestment::where('id', $id)->lockForUpdate()->firstOrFail();

            if (!$investment->isPending() && !$investment->isApproved()) {
                return ['error' => 'This investment can no longer be rejected.'];
            }

            $investment->status = CompoundInvestment::STATUS_REJECTED;
            $investment->rejected_at = now();
            $investment->rejection_reason = $validated['reason'];
            $investment->reviewed_by = $admin->id;
            $investment->reviewed_by_name = trim($admin->firstName . ' ' . $admin->lastName);
            $investment->save();

            $investment->logActivity(
                'rejected',
                'Investment request rejected by ' . $investment->reviewed_by_name . '. Reason: ' . $validated['reason'],
                ['reason' => $validated['reason']],
                'admin',
                $admin->id,
                $investment->reviewed_by_name
            );

            return ['investment' => $investment];
        });

        if (isset($result['error'])) {
            return back()->with('error', $result['error']);
        }

        $investment = $result['investment'];
        $this->sendStatusMail($investment, 'rejected', $validated['reason']);
        $this->notifyUser($investment, 'Investment Declined', 'Your compound investment ' . $investment->reference . ' was declined. Reason: ' . $validated['reason']);

        return back()->with('success', 'Investment request rejected.');
    }

    public function activate(Request $request, $id)
    {
        $validated = $request->validate([
            'start_date' => 'nullable|date',
        ]);

        $admin = Auth::guard('admin')->user();

        $result = DB::transaction(function () use ($id, $admin, $validated) {
            $investment = CompoundInvestment::where('id', $id)->lockForUpdate()->firstOrFail();

            if (!$investment->isApproved()) {
                return ['error' => 'Only approved investments can be activated.'];
            }

            $start = !empty($validated['start_date'])
                ? \Carbon\Carbon::parse($validated['start_date'])->startOfDay()
                : now()->startOfDay();

            $end = $this->investmentEndDate(
                $start,
                (float) $investment->duration_value,
                $investment->duration_unit
            );

            $investment->status = CompoundInvestment::STATUS_ACTIVE;
            $investment->activated_at = now();
            $investment->start_date = $start->toDateString();
            $investment->end_date = $end->toDateString();
            $investment->save();

            $investment->logActivity(
                'activated',
                'Investment activated by ' . $investment->reviewed_by_name . '.',
                [
                    'start_date' => $investment->start_date->toDateString(),
                    'end_date' => $investment->end_date->toDateString(),
                ],
                'admin',
                $admin->id,
                trim($admin->firstName . ' ' . $admin->lastName)
            );

            return ['investment' => $investment];
        });

        if (isset($result['error'])) {
            return back()->with('error', $result['error']);
        }

        $investment = $result['investment'];
        $this->sendStatusMail($investment, 'activated');
        $this->notifyUser($investment, 'Investment Active', 'Your compound investment ' . $investment->reference . ' is now active.');

        return back()->with('success', 'Investment activated.');
    }

    /**
     * Add an admin-approved period top-up to the investment record. These
     * amounts accumulate here and are not paid to Total Profit until completion.
     */
    public function creditInterest(Request $request, $id)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01|max:100000000',
            'note' => 'nullable|string|max:1000',
            'idempotency_key' => 'required|uuid',
        ]);

        $admin = Auth::guard('admin')->user();
        $amount = round((float) $validated['amount'], 2);

        $result = DB::transaction(function () use ($id, $admin, $validated, $amount) {
            $investment = CompoundInvestment::where('id', $id)->lockForUpdate()->firstOrFail();

            if (!$investment->canReceiveInterest()) {
                return ['error' => 'Interest can only be credited while an investment is active and within its duration.'];
            }

            if (CompoundInvestmentCredit::where('idempotency_key', $validated['idempotency_key'])->exists()) {
                return ['error' => 'This credit has already been recorded. Refresh the page before crediting again.'];
            }

            $user = User::where('id', $investment->user)->lockForUpdate()->firstOrFail();
            $profitSnapshot = round((float) $user->roi, 2);
            $previousInvestmentInterest = round((float) $investment->total_interest_credited, 2);
            $newInvestmentInterest = round($previousInvestmentInterest + $amount, 2);
            if ($newInvestmentInterest > 9999999999999999.99) {
                return ['error' => 'This top-up exceeds the supported investment balance range.'];
            }

            $credit = CompoundInvestmentCredit::create([
                'investment_id' => $investment->id,
                'user' => $user->id,
                'amount' => $amount,
                // Keep legacy profit columns as an explicit unchanged snapshot.
                'previous_profit' => $profitSnapshot,
                'new_profit' => $profitSnapshot,
                'previous_investment_interest' => $previousInvestmentInterest,
                'new_investment_interest' => $newInvestmentInterest,
                'idempotency_key' => $validated['idempotency_key'],
                'note' => $validated['note'] ?? null,
                'credited_by' => $admin->id,
                'credited_by_name' => trim($admin->firstName . ' ' . $admin->lastName),
                'credited_at' => now(),
            ]);

            $investment->total_interest_credited = $newInvestmentInterest;
            $investment->save();

            $investment->logActivity(
                'top_up_added',
                'Top-up of $' . number_format($amount, 2) . ' added to accumulated investment interest by ' . $credit->credited_by_name . '.',
                [
                    'amount' => $amount,
                    'frequency' => $investment->recurring_frequency,
                    'previous_investment_interest' => $previousInvestmentInterest,
                    'new_investment_interest' => $newInvestmentInterest,
                ],
                'admin',
                $admin->id,
                $credit->credited_by_name
            );

            return ['investment' => $investment, 'credit' => $credit, 'user' => $user];
        });

        if (isset($result['error'])) {
            return back()->with('error', $result['error']);
        }

        /** @var CompoundInvestment $investment */
        $investment = $result['investment'];
        $credit = $result['credit'];
        $user = $result['user'];

        try {
            Mail::to($user->email)->send(new CompoundInterestCredited($investment, $credit, $user));
        } catch (\Exception $e) {
            Log::error('Compound interest credit email failed: ' . $e->getMessage());
        }

        NotificationService::notifyUser(
            $user,
            'investment',
            'Interest Added to Investment',
            '$' . number_format($credit->amount, 2) . ' was added to accumulated interest for ' . $investment->reference . '. It will transfer to Total Profit when the investment is completed.',
            url('dashboard/compound-investments/' . $investment->id)
        );

        return back()->with('success', 'Top-up added to the investment. It will be transferred to Total Profit at completion.');
    }

    public function complete(Request $request, $id)
    {
        $validated = $request->validate([
            'note' => 'nullable|string|max:1000',
        ]);

        $admin = Auth::guard('admin')->user();

        $result = DB::transaction(function () use ($id, $admin, $validated) {
            $investment = CompoundInvestment::where('id', $id)->lockForUpdate()->firstOrFail();

            if (!$investment->canBeCompleted()) {
                return ['error' => 'Only an active investment can be completed.'];
            }
            if ($investment->end_date && today()->lt($investment->end_date)) {
                return ['error' => 'This investment cannot be completed before its end date.'];
            }

            $user = User::where('id', $investment->user)->lockForUpdate()->firstOrFail();
            $accumulated = round((float) $investment->total_interest_credited, 2);
            $alreadyTransferred = round((float) $investment->total_interest_transferred, 2);
            $transferAmount = CompoundInterestSettlement::pendingTransfer($accumulated, $alreadyTransferred);
            $profitBefore = round((float) $user->roi, 2);
            $profitAfter = round($profitBefore + $transferAmount, 2);

            if ($profitAfter > 9999999999999999.99) {
                return ['error' => 'The completion transfer exceeds the supported Total Profit balance range.'];
            }

            if ($transferAmount > 0) {
                $user->roi = $profitAfter;
                $user->save();

                Tp_Transaction::create([
                    'user' => $user->id,
                    'plan' => 'Compound interest completion for ' . $investment->reference,
                    'amount' => $transferAmount,
                    'type' => 'Compound Interest',
                ]);
            }

            $investment->status = CompoundInvestment::STATUS_COMPLETED;
            $investment->completed_at = now();
            $investment->completed_by = $admin->id;
            $investment->completed_by_name = trim($admin->firstName . ' ' . $admin->lastName);
            $investment->total_interest_transferred = round($alreadyTransferred + $transferAmount, 2);
            $investment->interest_transferred_at = now();
            $investment->total_profit_before_completion = $profitBefore;
            $investment->total_profit_after_completion = $profitAfter;
            if (!empty($validated['note'])) {
                $investment->admin_note = $validated['note'];
            }
            $investment->save();

            $investment->logActivity(
                'completed',
                'Investment completed by ' . $investment->completed_by_name . '. $' . number_format($transferAmount, 2) . ' transferred to Total Profit.',
                [
                    'interest_accumulated' => $accumulated,
                    'amount_transferred_this_completion' => $transferAmount,
                    'total_interest_transferred' => $investment->total_interest_transferred,
                    'total_profit_before' => $profitBefore,
                    'total_profit_after' => $profitAfter,
                    'note' => $validated['note'] ?? null,
                ],
                'admin',
                $admin->id,
                $investment->completed_by_name
            );

            return [
                'investment' => $investment,
                'user' => $user,
                'transfer_amount' => $transferAmount,
                'total_profit_after' => $profitAfter,
            ];
        });

        if (isset($result['error'])) {
            return back()->with('error', $result['error']);
        }

        $investment = $result['investment'];
        $this->sendStatusMail($investment, 'completed', null, $result['transfer_amount']);
        $this->notifyUser(
            $investment,
            'Investment Completed',
            'Your compound investment ' . $investment->reference . ' has been completed. '
                . '$' . number_format($result['transfer_amount'], 2) . ' was transferred to Total Profit. '
                . 'Your updated Total Profit balance is $' . number_format($result['total_profit_after'], 2) . '.'
        );

        return back()->with('success', 'Investment completed and accumulated interest transferred to Total Profit. Further top-ups are blocked.');
    }

    public function reopen(Request $request, $id)
    {
        $validated = $request->validate([
            'note' => 'nullable|string|max:1000',
        ]);

        $admin = Auth::guard('admin')->user();

        $result = DB::transaction(function () use ($id, $admin, $validated) {
            $investment = CompoundInvestment::where('id', $id)->lockForUpdate()->firstOrFail();

            if (!$investment->isCompleted()) {
                return ['error' => 'Only a completed investment can be reopened.'];
            }

            if (!$investment->reopen_allowed) {
                return ['error' => 'Reopening is disabled for this investment.'];
            }

            $previousCompletedAt = $investment->completed_at;
            $previousStartDate = optional($investment->start_date)->toDateString();
            $previousEndDate = optional($investment->end_date)->toDateString();
            $reopenedAt = now();
            $newStartDate = $reopenedAt->copy()->startOfDay();
            $newEndDate = $this->investmentEndDate(
                $newStartDate,
                (float) $investment->duration_value,
                $investment->duration_unit
            );

            $investment->status = CompoundInvestment::STATUS_ACTIVE;
            $investment->completed_at = null;
            $investment->activated_at = $reopenedAt;
            $investment->start_date = $newStartDate->toDateString();
            $investment->end_date = $newEndDate->toDateString();
            if (!empty($validated['note'])) {
                $investment->admin_note = $validated['note'];
            }
            $investment->save();

            $investment->logActivity(
                'reopened',
                'Investment reopened by ' . trim($admin->firstName . ' ' . $admin->lastName) . '.',
                [
                    'previous_completed_at' => optional($previousCompletedAt)->toDateTimeString(),
                    'previous_start_date' => $previousStartDate,
                    'previous_end_date' => $previousEndDate,
                    'start_date' => $investment->start_date->toDateString(),
                    'end_date' => $investment->end_date->toDateString(),
                    'note' => $validated['note'] ?? null,
                ],
                'admin',
                $admin->id,
                trim($admin->firstName . ' ' . $admin->lastName)
            );

            return ['investment' => $investment];
        });

        if (isset($result['error'])) {
            return back()->with('error', $result['error']);
        }

        $investment = $result['investment'];
        $this->sendStatusMail($investment, 'reopened');
        $this->notifyUser($investment, 'Investment Reopened', 'Your compound investment ' . $investment->reference . ' has been reopened.');

        return back()->with('success', 'Investment reopened.');
    }

    public function updateReopenAllowed(Request $request, $id)
    {
        $validated = $request->validate([
            'reopen_allowed' => 'required|boolean',
        ]);

        $investment = CompoundInvestment::findOrFail($id);
        $investment->reopen_allowed = (bool) $validated['reopen_allowed'];
        $investment->save();

        $admin = Auth::guard('admin')->user();
        $investment->logActivity(
            'settings_updated',
            'Reopen permission set to ' . ($investment->reopen_allowed ? 'allowed' : 'disabled') . '.',
            [],
            'admin',
            $admin->id,
            trim($admin->firstName . ' ' . $admin->lastName)
        );

        return back()->with('success', 'Reopen setting updated.');
    }

    private function sendStatusMail(
        CompoundInvestment $investment,
        string $type,
        ?string $reason = null,
        float $amountCredited = 0.0
    ): void
    {
        $user = $investment->customer;
        if (!$user) {
            return;
        }

        try {
            Mail::to($user->email)->send(new CompoundInvestmentStatus(
                $investment,
                $user,
                $type,
                $reason,
                $amountCredited
            ));
        } catch (\Exception $e) {
            Log::error('Compound investment ' . $type . ' email failed: ' . $e->getMessage());
        }
    }

    private function notifyUser(CompoundInvestment $investment, string $title, string $message): void
    {
        $user = $investment->customer;
        if (!$user) {
            return;
        }

        NotificationService::notifyUser($user, 'investment', $title, $message, url('dashboard/compound-investments/' . $investment->id));
    }

    private function investmentEndDate(\Carbon\Carbon $start, float $duration, string $unit): \Carbon\Carbon
    {
        switch ($unit) {
            case 'weekly':
                return $start->copy()->addWeeks((int) ceil($duration));
            case 'daily':
                return $start->copy()->addDays((int) ceil($duration));
            case 'monthly':
            default:
                return $start->copy()->addMonths((int) ceil($duration));
        }
    }
}
