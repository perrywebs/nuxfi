@extends('layouts.dash1')
@section('title', $title)
@section('content')
    @include('user.partials.page-header', ['title' => 'Compound Investments', 'subtitle' => 'Track requests, active investments, and every credited interest amount'])
    <x-danger-alert />
    <x-success-alert />

    <div class="grid grid-cols-2 xl:grid-cols-4 gap-3">
        @foreach ([
            ['label' => 'Invested', 'value' => '$' . number_format($summary['total_invested'], 2)],
            ['label' => 'Interest Accumulated', 'value' => '$' . number_format($summary['total_interest'], 2)],
            ['label' => 'Active', 'value' => $summary['active_count']],
            ['label' => 'Pending Review', 'value' => $summary['pending_count']],
        ] as $stat)
            <div class="rounded-xl border border-surface-border bg-surface-raised p-4">
                <p class="text-xs text-content-tertiary">{{ $stat['label'] }}</p>
                <p class="mt-1 text-xl font-semibold text-content-primary">{{ $stat['value'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>
            <h2 class="text-lg font-semibold text-content-primary">Investment History</h2>
            <p class="text-sm text-content-tertiary">Every request and status update is kept here.</p>
        </div>
        <a href="{{ route('compound-investments.create') }}" class="inline-flex justify-center rounded-lg bg-primary px-4 py-2.5 text-sm font-semibold text-content-inverse hover:bg-primary-dark">
            Start Compounding
        </a>
    </div>

    <div class="overflow-hidden rounded-xl border border-surface-border bg-surface-raised">
        @if ($investments->count())
            <div class="overflow-x-auto">
                <table class="w-full min-w-[760px] text-left text-sm">
                    <thead class="bg-surface-overlay text-xs uppercase tracking-wide text-content-tertiary">
                        <tr>
                            <th class="px-4 py-3 font-medium">Reference</th>
                            <th class="px-4 py-3 font-medium">Starting Amount</th>
                            <th class="px-4 py-3 font-medium">Duration</th>
                            <th class="px-4 py-3 font-medium">Interest Accumulated</th>
                            <th class="px-4 py-3 font-medium">Status</th>
                            <th class="px-4 py-3 font-medium">Submitted</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-border">
                        @foreach ($investments as $investment)
                            <tr>
                                <td class="px-4 py-3 font-mono text-xs text-content-primary">{{ $investment->reference }}</td>
                                <td class="px-4 py-3 text-content-primary">${{ number_format($investment->starting_amount, 2) }}</td>
                                <td class="px-4 py-3 text-content-secondary">{{ $investment->durationLabel() }}</td>
                                <td class="px-4 py-3 text-content-secondary">${{ number_format($investment->total_interest_credited, 2) }}</td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex rounded-full px-2.5 py-1 text-xs font-medium
                                        {{ $investment->statusBadgeType() === 'success' ? 'bg-gain/10 text-gain' : ($investment->statusBadgeType() === 'danger' ? 'bg-loss/10 text-loss' : ($investment->statusBadgeType() === 'info' ? 'bg-info/10 text-info' : 'bg-warning/10 text-warning')) }}">
                                        {{ $investment->statusLabel() }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-content-tertiary">{{ $investment->created_at->format('M d, Y') }}</td>
                                <td class="px-4 py-3 text-right">
                                    <a href="{{ route('compound-investments.show', $investment->id) }}" class="font-medium text-primary hover:underline">Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="border-t border-surface-border p-4">{{ $investments->links() }}</div>
        @else
            <div class="px-5 py-12 text-center">
                <p class="font-medium text-content-primary">No compound investment requests yet</p>
                <p class="mt-1 text-sm text-content-tertiary">Build a scenario and submit a payment request to get started.</p>
                <a href="{{ route('compound-investments.create') }}" class="mt-4 inline-flex rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-content-inverse">Create Request</a>
            </div>
        @endif
    </div>
@endsection
