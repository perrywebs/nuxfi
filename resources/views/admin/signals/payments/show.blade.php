@extends('layouts.admin-dash')
@section('title', 'Signal Payment Details')
@section('content')

    <x-admin.page-header title="Signal Payment #{{ $payment->id }}" subtitle="Review the payment request and verify the submitted transaction.">
        <x-slot name="actions">
            <a href="{{ route('signal-payments.index') }}" class="inline-flex items-center gap-1.5 bg-surface-alt text-content hover:bg-surface-alt/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors border border-border">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                Back to payments
            </a>
        </x-slot>
    </x-admin.page-header>

    @if(session('success'))
        <div class="mt-4"><x-admin.alert type="success" :dismissible="true">{{ session('success') }}</x-admin.alert></div>
    @endif
    @if(session('message'))
        <div class="mt-4"><x-admin.alert type="danger" :dismissible="true">{{ session('message') }}</x-admin.alert></div>
    @endif
    @if($errors->any())
        <div class="mt-4">
            <x-admin.alert type="danger" :dismissible="true">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </x-admin.alert>
        </div>
    @endif

    <div class="mt-6 grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">

        {{-- Payment + plan --}}
        <div class="lg:col-span-2 space-y-6">
            <x-admin.card>
                <div class="flex items-center justify-between mb-5">
                    <h3 class="text-base font-medium text-content">Payment details</h3>
                    <x-admin.badge :type="$payment->status === 'approved' ? 'success' : ($payment->status === 'rejected' ? 'danger' : 'warning')">
                        {{ ucfirst($payment->status) }}
                    </x-admin.badge>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 text-sm">
                    <div>
                        <p class="text-xs font-medium text-content-muted uppercase tracking-wide">Signal plan</p>
                        <p class="mt-1 font-medium text-content">{{ $payment->plan_name }}</p>
                        <p class="text-xs text-content-secondary">{{ $payment->duration }} {{ \Illuminate\Support\Str::plural('week', $payment->duration) }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-content-muted uppercase tracking-wide">Amount to pay</p>
                        <p class="mt-1 text-lg font-semibold text-primary">{{ $payment->currency }}{{ number_format($payment->amount, 2) }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-content-muted uppercase tracking-wide">Payment method</p>
                        <p class="mt-1 text-content">{{ $payment->payment_method_name ?: 'Not selected' }}</p>
                        <p class="text-xs text-content-secondary">{{ $payment->payment_network ?: '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-content-muted uppercase tracking-wide">Requested on</p>
                        <p class="mt-1 text-content">{{ $payment->created_at ? $payment->created_at->toDayDateTimeString() : '—' }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <p class="text-xs font-medium text-content-muted uppercase tracking-wide">Wallet address (snapshot)</p>
                        <p class="mt-1 font-mono text-xs text-content break-all">{{ $payment->wallet_address ?: '—' }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <p class="text-xs font-medium text-content-muted uppercase tracking-wide">Transaction hash / TXID</p>
                        <p class="mt-1 font-mono text-sm text-content break-all">{{ $payment->tx_hash ?: 'Not submitted yet' }}</p>
                        @if($payment->submitted_at)
                            <p class="text-xs text-content-muted mt-1">Submitted {{ $payment->submitted_at->toDayDateTimeString() }}</p>
                        @endif
                    </div>
                </div>
            </x-admin.card>

            {{-- Actions --}}
            <x-admin.card>
                <h3 class="text-base font-medium text-content mb-4">Verification actions</h3>

                @if($payment->isPending())
                    <div class="rounded-lg bg-warning-light border border-warning/30 p-4 mb-5">
                        <p class="text-sm text-warning font-medium">This payment is pending verification.</p>
                        <p class="text-xs text-content-secondary mt-1">
                            Verify the transaction hash on the blockchain before approving. Approval activates the
                            user's signal subscription immediately and cannot be undone.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <form action="{{ route('signal-payments.approve', $payment->id) }}" method="POST"
                                  onsubmit="return confirm('Approve this payment and activate the subscription?')">
                                @csrf
                                <button type="submit"
                                        class="w-full inline-flex items-center justify-center gap-2 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2.5 text-sm font-semibold transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                                        {{ $payment->tx_hash ? '' : 'disabled' }}>
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                                    Approve &amp; Activate
                                </button>
                            </form>
                            @if(!$payment->tx_hash)
                                <p class="text-xs text-content-muted mt-2 text-center">The user has not submitted a TXID yet.</p>
                            @endif
                        </div>

                        <div x-data="{ open: false }">
                            <button type="button" @click="open = !open"
                                    class="w-full inline-flex items-center justify-center gap-2 border border-danger/40 text-danger hover:bg-danger-light rounded-lg px-4 py-2.5 text-sm font-semibold transition-colors">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                Reject Payment
                            </button>

                            <form x-show="open" x-cloak x-transition action="{{ route('signal-payments.reject', $payment->id) }}" method="POST"
                                  class="mt-3 space-y-3" onsubmit="return confirm('Reject this payment? The subscription will not be activated.')">
                                @csrf
                                <textarea name="rejection_reason" rows="3" maxlength="1000"
                                          placeholder="Optional rejection reason (visible to the user)"
                                          class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-danger/30 focus:border-danger">{{ old('rejection_reason') }}</textarea>
                                <button type="submit"
                                        class="w-full inline-flex items-center justify-center gap-2 bg-danger text-content-inverse hover:bg-danger/80 rounded-lg px-4 py-2.5 text-sm font-semibold transition-colors">
                                    Confirm Rejection
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="rounded-lg {{ $payment->isApproved() ? 'bg-success-light border-success/30' : 'bg-danger-light border-danger/30' }} border p-4">
                        <p class="text-sm font-medium {{ $payment->isApproved() ? 'text-success' : 'text-danger' }}">
                            This payment was {{ $payment->status }}@if($payment->approved_at || $payment->rejected_at)
                                on {{ optional($payment->approved_at ?? $payment->rejected_at)->toDayDateTimeString() }}
                            @endif.
                        </p>
                        @if($payment->isRejected() && $payment->rejection_reason)
                            <p class="text-xs text-content-secondary mt-2"><strong>Reason:</strong> {{ $payment->rejection_reason }}</p>
                        @endif
                        @if($payment->isApproved() && $payment->subscription)
                            <p class="text-xs text-content-secondary mt-2">
                                Subscription active from {{ optional($payment->subscription->starts_at)->toDayDateTimeString() ?: '—' }}
                                to {{ optional($payment->subscription->expires_at)->toDayDateTimeString() ?: '—' }}.
                            </p>
                        @endif
                        <p class="text-xs text-content-muted mt-2">
                            Handled by:
                            {{ $payment->isApproved() ? optional($payment->approver)->firstName . ' ' . optional($payment->approver)->lastName : optional($payment->rejecter)->firstName . ' ' . optional($payment->rejecter)->lastName }}
                        </p>
                    </div>
                @endif
            </x-admin.card>
        </div>

        {{-- User + timeline --}}
        <div class="space-y-6">
            <x-admin.card>
                <h3 class="text-base font-medium text-content mb-4">User</h3>
                @if($payment->user)
                    <div class="space-y-3 text-sm">
                        <div>
                            <p class="text-xs text-content-muted">Name</p>
                            <p class="font-medium text-content">{{ $payment->user->name }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-content-muted">Email</p>
                            <p class="text-content break-all">{{ $payment->user->email }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-content-muted">User ID</p>
                            <p class="text-content">{{ $payment->user->id }}</p>
                        </div>
                        <a href="{{ url('admin/dashboard/user-wallet/' . $payment->user->id) }}" class="inline-flex items-center gap-1 text-xs font-medium text-primary hover:underline">
                            View user wallet
                        </a>
                    </div>
                @else
                    <p class="text-sm text-content-muted">This user no longer exists.</p>
                @endif
            </x-admin.card>

            <x-admin.card>
                <h3 class="text-base font-medium text-content mb-4">Timeline</h3>
                <div class="space-y-4 text-sm">
                    <div class="flex gap-3">
                        <span class="mt-1 w-2 h-2 rounded-full bg-primary shrink-0"></span>
                        <div>
                            <p class="text-content font-medium">Request created</p>
                            <p class="text-xs text-content-muted">{{ $payment->created_at ? $payment->created_at->toDayDateTimeString() : '—' }}</p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <span class="mt-1 w-2 h-2 rounded-full {{ $payment->submitted_at ? 'bg-info' : 'bg-content-muted' }} shrink-0"></span>
                        <div>
                            <p class="text-content font-medium">TXID submitted</p>
                            <p class="text-xs text-content-muted">{{ $payment->submitted_at ? $payment->submitted_at->toDayDateTimeString() : 'Not yet' }}</p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <span class="mt-1 w-2 h-2 rounded-full {{ $payment->approved_at ? 'bg-success' : ($payment->rejected_at ? 'bg-danger' : 'bg-content-muted') }} shrink-0"></span>
                        <div>
                            <p class="text-content font-medium">Admin decision</p>
                            <p class="text-xs text-content-muted">
                                @if($payment->approved_at)
                                    Approved {{ $payment->approved_at->toDayDateTimeString() }}
                                @elseif($payment->rejected_at)
                                    Rejected {{ $payment->rejected_at->toDayDateTimeString() }}
                                @else
                                    Awaiting review
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </x-admin.card>
        </div>
    </div>

@endsection
