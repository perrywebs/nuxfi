@extends('layouts.dash1')
@section('title', $title)
@section('content')

    <x-danger-alert />
    <x-success-alert />

    {{-- Ticker Tape --}}
    @include('user.partials.ticker-tape')

    {{-- Quick Nav --}}
    @include('user.partials.quick-nav')

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl font-bold text-content-primary">Signal Payment History</h2>
            <p class="text-sm text-content-secondary mt-1">Track your signal plan payment requests and their approval status</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('user.signal.subscriptions') }}" class="px-4 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary text-sm font-medium transition-colors">My Subscriptions</a>
            <a href="{{ route('user.signal.plans') }}" class="px-4 py-2 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-medium transition-colors">Browse Plans</a>
        </div>
    </div>

    <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden">
        @if($payments->isEmpty())
            <div class="p-10 text-center">
                <x-icon name="document-text" class="w-12 h-12 text-content-tertiary mx-auto mb-3" />
                <p class="text-content-secondary mb-1">You have no signal payment requests yet.</p>
                <p class="text-xs text-content-tertiary mb-4">Select a signal plan to create your first payment request.</p>
                <a href="{{ route('user.signal.plans') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-medium transition-colors">
                    Browse Signal Plans
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-surface-border">
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Order</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Plan</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Amount</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Method / Network</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">TXID</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Status</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Submitted</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-border">
                        @foreach($payments as $payment)
                            <tr class="hover:bg-surface-overlay/50 transition-colors align-top">
                                <td class="px-5 py-4 text-content-tertiary">#{{ str_pad($payment->id, 6, '0', STR_PAD_LEFT) }}</td>
                                <td class="px-5 py-4">
                                    <p class="font-medium text-content-primary">{{ $payment->plan_name }}</p>
                                    <p class="text-xs text-content-tertiary">{{ $payment->duration }} {{ \Illuminate\Support\Str::plural('week', $payment->duration) }}</p>
                                </td>
                                <td class="px-5 py-4 font-medium text-content-primary whitespace-nowrap">{{ $payment->currency }}{{ number_format($payment->amount, 2) }}</td>
                                <td class="px-5 py-4">
                                    <p class="text-content-primary">{{ $payment->payment_method_name ?: 'Not selected' }}</p>
                                    @if($payment->payment_network)
                                        <p class="text-xs text-content-tertiary">{{ $payment->payment_network }}</p>
                                    @endif
                                </td>
                                <td class="px-5 py-4 max-w-[220px]">
                                    @if($payment->tx_hash)
                                        <p class="font-mono text-xs text-content-secondary break-all" title="{{ $payment->tx_hash }}">{{ \Illuminate\Support\Str::limit($payment->tx_hash, 24) }}</p>
                                    @else
                                        <span class="text-xs text-content-tertiary">Not submitted</span>
                                    @endif
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold capitalize {{ $payment->statusBadgeClass() }}">{{ $payment->status }}</span>
                                    @if($payment->isRejected() && $payment->rejection_reason)
                                        <p class="text-xs text-loss mt-1 max-w-[200px]">{{ \Illuminate\Support\Str::limit($payment->rejection_reason, 80) }}</p>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-content-tertiary text-xs whitespace-nowrap">
                                    {{ $payment->submitted_at ? $payment->submitted_at->toDayDateTimeString() : ($payment->created_at ? $payment->created_at->toDayDateTimeString() : '—') }}
                                </td>
                                <td class="px-5 py-4">
                                    <a href="{{ route('user.signal.payment.show', $payment->id) }}"
                                       class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-surface-overlay border border-surface-border text-xs font-medium text-content-secondary hover:text-content-primary transition-colors">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($payments->hasPages())
                <div class="px-5 py-4 border-t border-surface-border">
                    {{ $payments->links() }}
                </div>
            @endif
        @endif
    </div>

@endsection
