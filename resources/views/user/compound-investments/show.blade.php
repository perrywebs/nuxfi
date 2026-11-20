@extends('layouts.dash1')
@section('title', $title)
@section('content')
    @include('user.partials.page-header', ['title' => 'Compound Investment', 'subtitle' => $investment->reference])
    <x-danger-alert />
    <x-success-alert />

    <div class="grid grid-cols-1 xl:grid-cols-[1.2fr_0.8fr] gap-5">
        <section class="rounded-xl border border-surface-border bg-surface-raised p-4 sm:p-6">
            <div class="flex flex-wrap items-start justify-between gap-3">
                <div>
                    <p class="text-xs uppercase tracking-wide text-content-tertiary">Investment reference</p>
                    <p class="mt-1 font-mono text-sm font-semibold text-content-primary">{{ $investment->reference }}</p>
                </div>
                <span class="rounded-full px-3 py-1 text-xs font-semibold
                    {{ $investment->statusBadgeType() === 'success' ? 'bg-gain/10 text-gain' : ($investment->statusBadgeType() === 'danger' ? 'bg-loss/10 text-loss' : ($investment->statusBadgeType() === 'info' ? 'bg-info/10 text-info' : 'bg-warning/10 text-warning')) }}">
                    {{ $investment->statusLabel() }}
                </span>
            </div>

            @php
                $lastCompletionActivity = $investment->activities->firstWhere('action', 'completed');
                $lastCompletionTransfer = data_get($lastCompletionActivity, 'meta.amount_transferred_this_completion', 0);
            @endphp
            <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 gap-x-6">
                @foreach ([
                    ['Starting Amount', '$' . number_format($investment->starting_amount, 2)],
                    ['Payment', trim(($investment->payment_currency ?: $investment->payment_method) . ($investment->payment_network ? ' / ' . $investment->payment_network : ''))],
                    ['Duration', $investment->durationLabel()],
                    ['Compounding Frequency', ['monthly' => 'Monthly', 'weekly' => 'Weekly', 'daily' => 'Daily'][$investment->recurring_frequency]],
                    [['monthly' => 'Monthly', 'weekly' => 'Weekly', 'daily' => 'Daily'][$investment->duration_unit] . ' Return', number_format($investment->period_return_rate, 2) . '%'],
                    ['Recurring Top-up', '$' . number_format($investment->recurring_topup, 2) . ' / ' . ['monthly' => 'month', 'weekly' => 'week', 'daily' => 'day'][$investment->duration_unit]],
                    ['Projected Final Amount', '$' . number_format($investment->projected_final_amount, 2)],
                    ['Projected Interest', '$' . number_format($investment->projected_interest, 2)],
                    ['Total Interest Accumulated', '$' . number_format($investment->total_interest_credited, 2)],
                    ['Total Transferred to Total Profit', '$' . number_format($investment->total_interest_transferred, 2)],
                    ['Amount Transferred at Last Completion', $lastCompletionActivity ? '$' . number_format($lastCompletionTransfer, 2) : '—'],
                    ['Submitted', $investment->created_at->format('M d, Y H:i')],
                    ['Approved', optional($investment->approved_at)->format('M d, Y H:i') ?: '—'],
                    ['Started', optional($investment->activated_at)->format('M d, Y H:i') ?: '—'],
                    ['Completion Date', optional($investment->completed_at)->format('M d, Y H:i') ?: optional($lastCompletionActivity ? $lastCompletionActivity->created_at : null)->format('M d, Y H:i') ?: '—'],
                    ['Completed By', $investment->completed_by_name ?: '—'],
                    ['Total Profit After Completion', $investment->total_profit_after_completion !== null ? '$' . number_format($investment->total_profit_after_completion, 2) : '—'],
                ] as $detail)
                    <div class="border-b border-surface-border py-3">
                        <p class="text-xs text-content-tertiary">{{ $detail[0] }}</p>
                        <p class="mt-1 text-sm font-medium text-content-primary">{{ $detail[1] }}</p>
                    </div>
                @endforeach
            </div>

            @if ($investment->rejection_reason)
                <div class="mt-4 rounded-lg border border-loss/20 bg-loss/10 p-4">
                    <p class="text-xs font-semibold text-loss">Review note</p>
                    <p class="mt-1 text-sm text-content-secondary">{{ $investment->rejection_reason }}</p>
                </div>
            @endif
        </section>

        <section class="rounded-xl border border-surface-border bg-surface-raised p-4 sm:p-6">
            <h2 class="text-base font-semibold text-content-primary">Status tracking</h2>
            <div class="mt-4 space-y-4">
                @foreach ($investment->activities as $activity)
                    <div class="relative border-l border-surface-border pl-4 pb-1">
                        <span class="absolute -left-[5px] top-1 h-2.5 w-2.5 rounded-full bg-primary ring-4 ring-surface-raised"></span>
                        <p class="text-sm font-medium text-content-primary">{{ ucfirst(str_replace('_', ' ', $activity->action)) }}</p>
                        <p class="mt-1 text-xs leading-relaxed text-content-secondary">{{ $activity->description }}</p>
                        <p class="mt-1 text-[11px] text-content-tertiary">
                            {{ $activity->created_at->format('M d, Y H:i') }}
                            @if ($activity->actor_name) · {{ $activity->actor_name }} @endif
                        </p>
                    </div>
                @endforeach
                @if ($investment->activities->isEmpty())
                    <p class="text-sm text-content-tertiary">No status updates yet.</p>
                @endif
            </div>
        </section>
    </div>

    <section class="overflow-hidden rounded-xl border border-surface-border bg-surface-raised">
        <div class="border-b border-surface-border px-4 py-4 sm:px-6">
            <h2 class="font-semibold text-content-primary">Interest history</h2>
            <p class="mt-1 text-xs text-content-tertiary">Each admin top-up accumulates in this investment record. Total Profit is credited only when the investment is completed.</p>
        </div>
        @if ($investment->credits->isNotEmpty())
            <div class="overflow-x-auto">
                <table class="w-full min-w-[620px] text-left text-sm">
                    <thead class="bg-surface-overlay text-xs uppercase tracking-wide text-content-tertiary">
                        <tr><th class="px-4 py-3 font-medium">Date</th><th class="px-4 py-3 font-medium">Reference</th><th class="px-4 py-3 font-medium">Description</th><th class="px-4 py-3 text-right font-medium">Amount</th><th class="px-4 py-3 text-right font-medium">Accumulated Interest</th><th class="px-4 py-3 font-medium">Credited By</th></tr>
                    </thead>
                    <tbody class="divide-y divide-surface-border">
                        @foreach ($investment->credits as $credit)
                            <tr>
                                <td class="px-4 py-3 text-content-secondary">{{ optional($credit->credited_at)->format('M d, Y H:i') }}</td>
                                <td class="px-4 py-3 font-mono text-xs text-content-primary">{{ $investment->reference }}</td>
                                <td class="px-4 py-3 text-content-secondary">{{ $credit->note ?: 'Compound interest credit' }}</td>
                                <td class="px-4 py-3 text-right font-semibold text-gain">+${{ number_format($credit->amount, 2) }}</td>
                                <td class="px-4 py-3 text-right text-content-primary">${{ number_format($credit->new_investment_interest, 2) }}</td>
                                <td class="px-4 py-3 text-content-secondary">{{ $credit->credited_by_name ?: 'Administrator' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="px-5 py-8 text-center text-sm text-content-tertiary">No top-ups have been added to this investment.</p>
        @endif
    </section>

    <a href="{{ route('compound-investments.index') }}" class="inline-flex text-sm font-medium text-primary hover:underline">← Back to Compound Investments</a>
@endsection
