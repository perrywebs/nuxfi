@extends('layouts.admin-dash')
@section('title', $title)
@section('content')
    <x-admin.page-header title="Compound Investment" subtitle="{{ $investment->reference }}">
        <x-slot name="actions"><a href="{{ route('admin.compound-investments.index') }}" class="rounded-lg border border-border px-3 py-2 text-sm text-content-secondary">Back to requests</a></x-slot>
    </x-admin.page-header>

    @if (session('success'))<x-admin.alert type="success" :dismissible="true">{{ session('success') }}</x-admin.alert>@endif
    @if (session('error'))<x-admin.alert type="danger" :dismissible="true">{{ session('error') }}</x-admin.alert>@endif
    @if ($errors->any())
        <x-admin.alert type="danger" :dismissible="true"><ul class="list-disc pl-5">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></x-admin.alert>
    @endif

    <div class="mt-5 grid grid-cols-1 xl:grid-cols-[1fr_340px] gap-5">
        <div class="space-y-5">
            <x-admin.card>
                <div class="flex flex-wrap items-start justify-between gap-3">
                    <div>
                        <p class="text-xs uppercase tracking-wide text-content-muted">Investment Request</p>
                        <h2 class="mt-1 font-mono text-lg font-semibold text-content">{{ $investment->reference }}</h2>
                        <p class="mt-1 text-sm text-content-secondary">
                            <a class="text-primary hover:underline" href="{{ route('viewuser', $investment->user) }}">{{ optional($investment->customer)->name ?? 'Deleted user' }}</a>
                            · {{ optional($investment->customer)->email }}
                        </p>
                    </div>
                    <x-admin.badge type="{{ $investment->statusBadgeType() }}">{{ $investment->statusLabel() }}</x-admin.badge>
                </div>
                <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ([
                        ['Starting Amount', '$' . number_format($investment->starting_amount, 2)],
                        ['Payment Currency', $investment->payment_currency ?: $investment->payment_method],
                        ['Payment Network', $investment->payment_network ?: '—'],
                        ['Deposit Wallet', $investment->wallet_address ?: '—'],
                        ['Deposit Amount', '$' . number_format($investment->deposit_amount, 2)],
                        ['Payment Reference', $investment->payment_reference ?: '—'],
                        ['Duration', $investment->durationLabel()],
                        ['Compounding Frequency', ['monthly' => 'Monthly', 'weekly' => 'Weekly', 'daily' => 'Daily'][$investment->recurring_frequency] ?? '—'],
                        [['monthly' => 'Monthly', 'weekly' => 'Weekly', 'daily' => 'Daily'][$investment->duration_unit] . ' Return', number_format($investment->period_return_rate, 2) . '%'],
                        ['Recurring Top-up', '$' . number_format($investment->recurring_topup, 2) . ' / ' . ['monthly' => 'month', 'weekly' => 'week', 'daily' => 'day'][$investment->duration_unit]],
                        ['Projected Final Amount', '$' . number_format($investment->projected_final_amount, 2)],
                        ['Projected Interest', '$' . number_format($investment->projected_interest, 2)],
                        ['Total Interest Accumulated', '$' . number_format($investment->total_interest_credited, 2)],
                        ['Total Transferred To Total Profit', '$' . number_format($investment->total_interest_transferred, 2)],
                        ['Total Profit Before Completion', $investment->total_profit_before_completion !== null ? '$' . number_format($investment->total_profit_before_completion, 2) : '—'],
                        ['Total Profit After Completion', $investment->total_profit_after_completion !== null ? '$' . number_format($investment->total_profit_after_completion, 2) : '—'],
                        ['Submitted', $investment->created_at->format('M d, Y H:i')],
                        ['Approved', optional($investment->approved_at)->format('M d, Y H:i') ?: '—'],
                        ['Started', optional($investment->activated_at)->format('M d, Y H:i') ?: '—'],
                        ['Completion Date', optional($investment->completed_at)->format('M d, Y H:i') ?: '—'],
                        ['Completed By', $investment->completed_by_name ?: '—'],
                    ] as $detail)
                        <div class="rounded-lg bg-surface-alt/50 p-3">
                            <p class="text-xs text-content-muted">{{ $detail[0] }}</p>
                            <p class="mt-1 break-words text-sm font-medium text-content">{{ $detail[1] }}</p>
                        </div>
                    @endforeach
                </div>
                @if ($investment->proof)
                    <div class="mt-4"><a class="text-sm font-medium text-primary hover:underline" target="_blank" rel="noopener" href="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($investment->proof) }}">View payment proof</a></div>
                @endif
                @if ($investment->user_note)<p class="mt-4 text-sm text-content-secondary"><strong>User note:</strong> {{ $investment->user_note }}</p>@endif
                @if ($investment->rejection_reason)<p class="mt-4 text-sm text-danger"><strong>Rejection reason:</strong> {{ $investment->rejection_reason }}</p>@endif
            </x-admin.card>

            <x-admin.card>
                <h2 class="text-base font-semibold text-content">Interest / top-up history</h2>
                @if ($investment->credits->isNotEmpty())
                    <div class="mt-4 overflow-x-auto">
                        <table class="w-full min-w-[600px] text-left">
                            <thead><tr class="border-b border-border text-xs uppercase text-content-muted"><th class="py-2">Top-up Date</th><th class="py-2">Amount</th><th class="py-2">Investment interest total</th><th class="py-2">Admin / note</th></tr></thead>
                            <tbody class="divide-y divide-border">
                                @foreach ($investment->credits as $credit)
                                    <tr class="text-sm">
                                        <td class="py-3 text-content-secondary">{{ optional($credit->credited_at)->format('M d, Y H:i') }}</td>
                                        <td class="py-3 font-semibold text-success">${{ number_format($credit->amount, 2) }}</td>
                                        <td class="py-3 text-content-secondary">${{ number_format($credit->new_investment_interest, 2) }}</td>
                                        <td class="py-3 text-xs text-content-secondary">{{ $credit->credited_by_name }}<br>{{ $credit->note }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="mt-3 text-sm text-content-muted">No interest credits have been recorded.</p>
                @endif
            </x-admin.card>

            <x-admin.card>
                <h2 class="text-base font-semibold text-content">Complete audit history</h2>
                <div class="mt-4 space-y-3">
                    @forelse ($investment->activities as $activity)
                        <div class="border-l-2 border-primary/40 pl-3">
                            <div class="flex flex-wrap justify-between gap-2">
                                <p class="text-sm font-medium text-content">{{ ucfirst(str_replace('_', ' ', $activity->action)) }}</p>
                                <p class="text-xs text-content-muted">{{ $activity->created_at->format('M d, Y H:i:s') }}</p>
                            </div>
                            <p class="mt-1 text-sm text-content-secondary">{{ $activity->description }}</p>
                            @if ($activity->actor_name)<p class="mt-1 text-xs text-content-muted">By {{ $activity->actor_name }} ({{ $activity->actor_type }})</p>@endif
                        </div>
                    @empty
                        <p class="text-sm text-content-muted">No activity recorded.</p>
                    @endforelse
                </div>
            </x-admin.card>
        </div>

        <aside class="space-y-5">
            <x-admin.card>
                <h2 class="text-base font-semibold text-content">Request review</h2>
                @if (in_array($investment->status, [\App\Models\CompoundInvestment::STATUS_PENDING, \App\Models\CompoundInvestment::STATUS_APPROVED], true))
                    @if ($investment->isPending())
                        <form method="POST" action="{{ route('admin.compound-investments.approve', $investment->id) }}" class="mt-4">@csrf
                            <button class="w-full rounded-lg bg-success px-4 py-2.5 text-sm font-semibold text-white">Approve & Activate</button>
                        </form>
                    @endif
                    <form method="POST" action="{{ route('admin.compound-investments.reject', $investment->id) }}" class="mt-3 space-y-3">@csrf
                        <label class="block text-xs font-medium text-content-secondary">Reject / revoke reason
                            <textarea name="reason" required maxlength="1000" rows="3" class="mt-1 w-full rounded-lg border border-border bg-surface-card p-3 text-sm text-content">{{ old('reason') }}</textarea>
                        </label>
                        <button class="w-full rounded-lg border border-danger/40 px-4 py-2.5 text-sm font-semibold text-danger">Reject Request</button>
                    </form>
                @endif
                @if ($investment->isApproved())
                    <form method="POST" action="{{ route('admin.compound-investments.activate', $investment->id) }}" class="mt-4 space-y-3">@csrf
                        <label class="block text-xs font-medium text-content-secondary">Investment start date
                            <input type="date" name="start_date" value="{{ now()->toDateString() }}" class="mt-1 w-full rounded-lg border border-border bg-surface-card px-3 py-2 text-sm text-content">
                        </label>
                        <button class="w-full rounded-lg bg-primary px-4 py-2.5 text-sm font-semibold text-primary-foreground">Mark Active</button>
                    </form>
                @endif
                @if ($investment->isCompleted() && $investment->canBeReopened())
                    <form method="POST" action="{{ route('admin.compound-investments.reopen', $investment->id) }}" class="mt-4 space-y-3">@csrf
                        <input name="note" maxlength="1000" placeholder="Reason for reopening" class="w-full rounded-lg border border-border bg-surface-card px-3 py-2 text-sm text-content">
                        <button class="w-full rounded-lg bg-warning px-4 py-2.5 text-sm font-semibold text-white">Reopen Investment</button>
                    </form>
                @endif
            </x-admin.card>

            @if ($investment->isActive())
                <x-admin.card>
                    <h2 class="text-base font-semibold text-content">Add period interest / top-up</h2>
                    <p class="mt-1 text-xs text-content-muted">This admin-controlled top-up accumulates in the investment record. It is transferred to Total Profit only when the investment is completed.</p>
                    @if ($investment->canReceiveInterest())
                    <form method="POST" action="{{ route('admin.compound-investments.credit-interest', $investment->id) }}" class="mt-4 space-y-3">@csrf
                        <label class="block text-xs font-medium text-content-secondary">
                            Adding each {{ ['monthly' => 'month', 'weekly' => 'week', 'daily' => 'day'][$investment->duration_unit] ?? 'period' }} (USD)
                            <input type="number" name="amount" min="0.01" max="100000000" step="0.01" required value="{{ old('amount', number_format($investment->recurring_topup, 2, '.', '')) }}" class="mt-1 w-full rounded-lg border border-border bg-surface-card px-3 py-2.5 text-sm text-content">
                        </label>
                        <label class="block text-xs font-medium text-content-secondary">Description (optional)
                            <textarea name="note" maxlength="1000" rows="2" class="mt-1 w-full rounded-lg border border-border bg-surface-card p-3 text-sm text-content"></textarea>
                        </label>
                        <input type="hidden" name="idempotency_key" value="{{ \Illuminate\Support\Str::uuid() }}">
                        <button class="w-full rounded-lg bg-primary px-4 py-2.5 text-sm font-semibold text-primary-foreground">Add Top-up to Investment</button>
                    </form>
                    @else
                        <p class="mt-4 rounded-lg bg-warning/10 p-3 text-xs text-warning">The investment duration has ended. No further top-ups can be added; complete the investment to transfer its accumulated interest.</p>
                    @endif
                    @if (!$investment->end_date || today()->gte($investment->end_date))
                        <form method="POST" action="{{ route('admin.compound-investments.complete', $investment->id) }}" class="mt-5 border-t border-border pt-4 space-y-3">@csrf
                            <input name="note" maxlength="1000" placeholder="Completion note (optional)" class="w-full rounded-lg border border-border bg-surface-card px-3 py-2 text-sm text-content">
                            <button class="w-full rounded-lg border border-warning/40 px-4 py-2.5 text-sm font-semibold text-warning">Complete Investment</button>
                        </form>
                    @else
                        <p class="mt-5 border-t border-border pt-4 text-xs text-content-muted">Completion becomes available on {{ $investment->end_date->format('M d, Y') }}.</p>
                    @endif
                </x-admin.card>
            @endif

            @if ($investment->isCompleted())
                <x-admin.card>
                    <h2 class="text-sm font-semibold text-content">Reopen permission</h2>
                    <p class="mt-1 text-xs text-content-muted">Completed investments cannot receive credits. An authorized admin may reopen only when this permission is enabled.</p>
                    <form method="POST" action="{{ route('admin.compound-investments.reopen-setting', $investment->id) }}" class="mt-3 flex items-center justify-between gap-3">@csrf
                        <label class="inline-flex items-center gap-2 text-sm text-content"><input type="hidden" name="reopen_allowed" value="0"><input type="checkbox" name="reopen_allowed" value="1" {{ $investment->reopen_allowed ? 'checked' : '' }} class="rounded border-border text-primary">Allow reopening</label>
                        <button class="rounded-lg border border-border px-3 py-2 text-xs font-medium text-content">Save</button>
                    </form>
                </x-admin.card>
            @endif
        </aside>
    </div>
@endsection
