@extends('layouts.admin-dash')
@section('title', $title)
@section('content')
    <x-admin.page-header title="Compound Interest" subtitle="Review and manage compound investment requests">
        <x-slot name="actions">
            <span class="rounded-full bg-warning/10 px-3 py-1.5 text-xs font-medium text-warning">{{ $stats['pending'] }} pending</span>
        </x-slot>
    </x-admin.page-header>

    @if (session('success'))<x-admin.alert type="success" :dismissible="true">{{ session('success') }}</x-admin.alert>@endif
    @if (session('error'))<x-admin.alert type="danger" :dismissible="true">{{ session('error') }}</x-admin.alert>@endif

    <div class="mt-5 grid grid-cols-2 xl:grid-cols-4 gap-4">
        @foreach ([
            ['Requests', $investments->total()],
            ['Pending Review', $stats['pending']],
            ['Active', $stats['active']],
            ['Interest Accumulated', '$' . number_format($stats['interest_credited'], 2)],
        ] as $stat)
            <x-admin.card>
                <p class="text-xs text-content-muted">{{ $stat[0] }}</p>
                <p class="mt-1 text-xl font-semibold text-content">{{ $stat[1] }}</p>
            </x-admin.card>
        @endforeach
    </div>

    <x-admin.card class="mt-5">
        <form method="GET" action="{{ route('admin.compound-investments.index') }}" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-3 items-end">
            <x-admin.form-group label="Search user / reference" for="q">
                <input id="q" name="q" value="{{ request('q') }}" placeholder="Name, email, username, reference"
                    class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content">
            </x-admin.form-group>
            <x-admin.form-group label="Status" for="status">
                <select id="status" name="status" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content">
                    <option value="">All statuses</option>
                    @foreach (\App\Models\CompoundInvestment::statusLabels() as $key => $label)
                        <option value="{{ $key }}" {{ request('status') === $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </x-admin.form-group>
            <x-admin.form-group label="From" for="from">
                <input type="date" id="from" name="from" value="{{ request('from') }}" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content">
            </x-admin.form-group>
            <x-admin.form-group label="To" for="to">
                <input type="date" id="to" name="to" value="{{ request('to') }}" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content">
            </x-admin.form-group>
            <div class="flex gap-2">
                <button class="rounded-lg bg-primary px-4 py-2 text-sm font-medium text-primary-foreground">Filter</button>
                <a href="{{ route('admin.compound-investments.index') }}" class="rounded-lg border border-border px-4 py-2 text-sm text-content-secondary">Clear</a>
            </div>
        </form>
    </x-admin.card>

    <x-admin.card class="mt-5">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[920px] text-left">
                <thead><tr class="border-b border-border text-xs uppercase tracking-wide text-content-muted">
                    <th class="px-3 py-3">Reference / User</th><th class="px-3 py-3">Amount</th><th class="px-3 py-3">Payment</th><th class="px-3 py-3">Scenario</th><th class="px-3 py-3">Status</th><th class="px-3 py-3">Submitted</th><th class="px-3 py-3"></th>
                </tr></thead>
                <tbody class="divide-y divide-border">
                    @forelse ($investments as $investment)
                        <tr>
                            <td class="px-3 py-3">
                                <a class="font-mono text-xs text-primary hover:underline" href="{{ route('admin.compound-investments.show', $investment->id) }}">{{ $investment->reference }}</a>
                                <p class="mt-1 text-sm text-content">{{ optional($investment->customer)->name ?? 'Deleted user' }}</p>
                                <p class="text-xs text-content-muted">{{ optional($investment->customer)->email }}</p>
                            </td>
                            <td class="px-3 py-3 text-sm text-content">${{ number_format($investment->starting_amount, 2) }}</td>
                            <td class="px-3 py-3 text-sm text-content-secondary">{{ $investment->payment_currency ?: $investment->payment_method }}<p class="text-xs text-content-muted">{{ $investment->payment_network }}</p></td>
                            <td class="px-3 py-3 text-xs text-content-secondary">
                                {{ $investment->durationLabel() }} · {{ number_format($investment->period_return_rate, 2) }}% / {{ ['monthly' => 'month', 'weekly' => 'week', 'daily' => 'day'][$investment->duration_unit] ?? 'period' }}<br>
                                Top-up ${{ number_format($investment->recurring_topup, 2) }} · Projected ${{ number_format($investment->projected_final_amount, 2) }}
                            </td>
                            <td class="px-3 py-3"><x-admin.badge type="{{ $investment->statusBadgeType() }}">{{ $investment->statusLabel() }}</x-admin.badge></td>
                            <td class="px-3 py-3 text-xs text-content-secondary">{{ $investment->created_at->format('M d, Y H:i') }}</td>
                            <td class="px-3 py-3 text-right"><a href="{{ route('admin.compound-investments.show', $investment->id) }}" class="rounded-lg bg-primary px-3 py-1.5 text-xs font-medium text-primary-foreground">Review</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="px-3 py-12 text-center text-sm text-content-muted">No compound investment requests found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $investments->withQueryString()->links() }}</div>
    </x-admin.card>
@endsection
