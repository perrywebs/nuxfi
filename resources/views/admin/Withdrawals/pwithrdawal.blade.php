@extends('layouts.admin-dash')
@section('title', 'Process Withdrawal')
@section('content')
    <x-admin.page-header title="Process Withdrawal Request">
        <x-slot name="actions">
            <a class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-3 py-1.5 text-xs font-medium transition-colors" href="{{ route('mwithdrawals') }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                back
            </a>
        </x-slot>
    </x-admin.page-header>

    <div class="mt-6 max-w-3xl mx-auto" x-data="{ action: 'Paid', emailSend: 'false' }">
        <x-admin.card>
            {{-- Status Header --}}
            <div class="mb-5">
                @if ($withdrawal->status != 'Processed')
                    <h4 class="text-lg font-medium text-content">Send Funds to {{ optional($user)->name ?? 'Deleted User' }} through his payment details below</h4>
                @else
                    <h4 class="text-lg font-medium text-success">Payment Completed</h4>
                @endif
            </div>

            {{-- Payment Details --}}
            <div class="space-y-4">
                @if ($method->defaultpay == 'yes')
                    @if ($withdrawal->payment_mode == 'Bitcoin')
                        <x-admin.form-group label="BTC Address">
                            <input type="text" class="w-full bg-surface-alt border border-border rounded-lg px-3 py-2 text-sm text-content" value="{{ optional($withdrawal->duser)->btc_address ?? 'N/A' }}" readonly>
                        </x-admin.form-group>
                    @elseif($withdrawal->payment_mode == 'Ethereum')
                        <x-admin.form-group label="ETH Address">
                            <input type="text" class="w-full bg-surface-alt border border-border rounded-lg px-3 py-2 text-sm text-content" value="{{ optional($withdrawal->duser)->eth_address ?? 'N/A' }}" readonly>
                        </x-admin.form-group>
                    @elseif($withdrawal->payment_mode == 'Litecoin')
                        <x-admin.form-group label="LTC Address">
                            <input type="text" class="w-full bg-surface-alt border border-border rounded-lg px-3 py-2 text-sm text-content" value="{{ optional($withdrawal->duser)->ltc_address ?? 'N/A' }}" readonly>
                        </x-admin.form-group>
                    @elseif ($withdrawal->payment_mode == 'USDT')
                        <x-admin.form-group label="USDT Address">
                            <input type="text" class="w-full bg-surface-alt border border-border rounded-lg px-3 py-2 text-sm text-content" value="{{ optional($withdrawal->duser)->usdt_address ?? 'N/A' }}" readonly>
                        </x-admin.form-group>
                    @elseif ($withdrawal->payment_mode == 'BUSD')
                        <x-admin.form-group label="BUSD Address">
                            <input type="text" class="w-full bg-surface-alt border border-border rounded-lg px-3 py-2 text-sm text-content" value="{{ $withdrawal->paydetails }}" readonly>
                        </x-admin.form-group>
                    @elseif($withdrawal->payment_mode == 'Bank Transfer')
                        <x-admin.form-group label="Bank Name">
                            <input type="text" class="w-full bg-surface-alt border border-border rounded-lg px-3 py-2 text-sm text-content" value="{{ optional($withdrawal->duser)->bank_name ?? 'N/A' }}" readonly>
                        </x-admin.form-group>
                        <x-admin.form-group label="Account Name">
                            <input type="text" class="w-full bg-surface-alt border border-border rounded-lg px-3 py-2 text-sm text-content" value="{{ optional($withdrawal->duser)->account_name ?? 'N/A' }}" readonly>
                        </x-admin.form-group>
                        <x-admin.form-group label="Account Number">
                            <input type="text" class="w-full bg-surface-alt border border-border rounded-lg px-3 py-2 text-sm text-content" value="{{ optional($withdrawal->duser)->account_number ?? 'N/A' }}" readonly>
                        </x-admin.form-group>
                        @if (!empty(optional($withdrawal->duser)->swift_code))
                            <x-admin.form-group label="Swift Code">
                                <input type="text" class="w-full bg-surface-alt border border-border rounded-lg px-3 py-2 text-sm text-content" value="{{ optional($withdrawal->duser)->swift_code }}" readonly>
                            </x-admin.form-group>
                        @endif
                    @endif
                @else
                    @if ($method->methodtype == 'crypto')
                        <x-admin.form-group label="{{ $withdrawal->payment_mode }} Address">
                            <input type="text" class="w-full bg-surface-alt border border-border rounded-lg px-3 py-2 text-sm text-content" value="{{ $withdrawal->paydetails }}" readonly>
                        </x-admin.form-group>
                    @else
                        <x-admin.form-group label="{{ $withdrawal->payment_mode }} Payment Details">
                            <input type="text" class="w-full bg-surface-alt border border-border rounded-lg px-3 py-2 text-sm text-content" value="{{ $withdrawal->paydetails }}" readonly>
                        </x-admin.form-group>
                    @endif
                @endif
            </div>

            @if ((float) $withdrawal->broker_commission_amount > 0)
                <div class="mt-6 rounded-xl border border-warning/30 bg-warning/5 p-4">
                    <h3 class="text-sm font-semibold text-content">Broker Withdrawal Commission</h3>
                    <div class="mt-3 grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
                        <div><span class="text-content-muted">Required</span><p class="font-medium text-content">{{ rtrim(rtrim(number_format($withdrawal->broker_commission_amount, 8, '.', ''), '0'), '.') }} {{ $withdrawal->broker_commission_currency }}</p></div>
                        <div><span class="text-content-muted">Payment reference</span><p class="break-all font-mono text-xs text-content">{{ $withdrawal->broker_commission_payment_reference ?: 'Not submitted' }}</p></div>
                        <div class="sm:col-span-2"><span class="text-content-muted">Receiving wallet</span><p class="break-all font-mono text-xs text-content">{{ $withdrawal->broker_commission_wallet }}</p></div>
                        @if ($withdrawal->broker_commission_note)
                            <div class="sm:col-span-2"><span class="text-content-muted">Payment instructions</span><p class="text-content">{{ $withdrawal->broker_commission_note }}</p></div>
                        @endif
                        @if ($withdrawal->broker_commission_submitted_at)
                            <div><span class="text-content-muted">Submitted</span><p class="text-content">{{ $withdrawal->broker_commission_submitted_at->format('M d, Y H:i') }}</p></div>
                        @endif
                        <div><span class="text-content-muted">Payment review status</span><p class="font-medium text-content">{{ ucfirst($withdrawal->broker_commission_status ?? 'pending') }}</p></div>
                    </div>
                    @if ($commissionPayments->isNotEmpty())
                        <div class="mt-4 space-y-3 border-t border-border pt-4">
                            <p class="text-xs font-semibold uppercase tracking-wide text-content-muted">Payment submission history</p>
                            @foreach ($commissionPayments as $payment)
                                <div class="rounded-lg border border-border bg-surface-card p-3">
                                    <div class="flex flex-wrap items-start justify-between gap-2">
                                        <div>
                                            <p class="break-all font-mono text-xs text-content">{{ $payment->payment_reference }}</p>
                                            <p class="mt-1 text-xs text-content-muted">Submitted {{ optional($payment->submitted_at)->format('M d, Y H:i') }}</p>
                                        </div>
                                        <x-admin.badge type="{{ $payment->status === 'approved' ? 'success' : ($payment->status === 'rejected' ? 'danger' : 'warning') }}">{{ ucfirst($payment->status) }}</x-admin.badge>
                                    </div>
                                    @if ($payment->rejection_reason)
                                        <p class="mt-2 text-xs text-danger">Rejection reason: {{ $payment->rejection_reason }}</p>
                                    @endif
                                    @if ($payment->status === 'submitted' && $loop->first)
                                        <div class="mt-3 flex flex-col sm:flex-row gap-2">
                                            <form method="POST" action="{{ route('admin.withdrawals.verify-broker-commission', $withdrawal->id) }}">
                                                @csrf
                                                <button class="rounded-lg bg-success px-4 py-2 text-sm font-semibold text-white">Approve Payment</button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.withdrawals.reject-broker-commission', $withdrawal->id) }}" class="flex flex-1 gap-2">
                                                @csrf
                                                <input name="reason" required maxlength="1000" placeholder="Reason for rejection" class="min-w-0 flex-1 rounded-lg border border-border bg-surface-card px-3 py-2 text-xs text-content">
                                                <button class="rounded-lg border border-danger/40 px-3 py-2 text-xs font-semibold text-danger">Reject</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @elseif ($withdrawal->broker_commission_confirmed)
                        <p class="mt-3 text-sm font-medium text-success">Payment approved {{ optional($withdrawal->broker_commission_confirmed_at)->format('M d, Y H:i') }}.</p>
                    @else
                        <p class="mt-3 text-xs text-warning">Waiting for the user to submit a payment reference.</p>
                    @endif
                </div>
            @endif

            {{-- Process Form --}}
            @if ($withdrawal->status != 'Processed')
                <div class="mt-6 pt-6 border-t border-border">
                    <form action="{{ route('pwithdrawal') }}" method="POST">
                        @csrf

                        <x-admin.form-group label="Action">
                            <select name="action" x-model="action"
                                    class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                                <option value="Paid">Paid</option>
                                <option value="Reject">Reject</option>
                            </select>
                        </x-admin.form-group>

                        {{-- Email Options (shown on Reject) --}}
                        <div x-show="action === 'Reject'" x-cloak class="mt-4 space-y-4">
                            <div class="flex items-center gap-4">
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="emailsend" value="false" x-model="emailSend"
                                           class="w-4 h-4 text-primary border-border focus:ring-primary/30">
                                    <span class="text-sm text-content">Don't Send Email</span>
                                </label>
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="emailsend" value="true" x-model="emailSend"
                                           class="w-4 h-4 text-primary border-border focus:ring-primary/30">
                                    <span class="text-sm text-content">Send Email</span>
                                </label>
                            </div>

                            {{-- Email Fields --}}
                            <div x-show="emailSend === 'true'" x-cloak class="space-y-4">
                                <x-admin.form-group label="Subject">
                                    <input type="text" name="subject"
                                           class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary"
                                           x-bind:required="emailSend === 'true' && action === 'Reject'">
                                </x-admin.form-group>
                                <x-admin.form-group label="Enter Reasons for rejecting this withdrawal request">
                                    <textarea name="reason" rows="3" placeholder="Type in here"
                                              class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary"
                                              x-bind:required="emailSend === 'true' && action === 'Reject'"></textarea>
                                </x-admin.form-group>
                            </div>
                        </div>

                        <div class="mt-5">
                            <input type="hidden" name="id" value="{{ $withdrawal->id }}">
                            <button type="submit"
                                    class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                                Process
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        </x-admin.card>
    </div>
@endsection
