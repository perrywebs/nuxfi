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
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-content-primary">Signal Plans</h2>
            <p class="text-sm text-content-secondary mt-1">Subscribe to receive premium trading signals</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('user.signal.payments') }}" class="px-4 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary text-sm font-medium transition-colors">Payment History</a>
            <a href="{{ route('user.signal.subscriptions') }}" class="px-4 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary text-sm font-medium transition-colors">My Plans</a>
            <a href="{{ route('user.signal.index') }}" class="px-4 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary text-sm font-medium transition-colors">Signals</a>
        </div>
    </div>

    {{-- Manual crypto payment notice --}}
    <div class="rounded-xl bg-primary/5 border border-primary/20 p-4 mb-6 flex items-start gap-3">
        <x-icon name="information-circle" class="w-5 h-5 text-primary mt-0.5 shrink-0" />
        <div>
            <p class="text-sm font-semibold text-primary">Cryptocurrency payment only</p>
            <p class="text-xs text-content-secondary mt-1">
                Signal plans are paid manually in cryptocurrency. Your internal wallet balance is not used or deducted.
                After selecting a plan you will be redirected to a payment page with the wallet address and instructions.
                Your subscription becomes active only after an administrator verifies your transaction.
            </p>
        </div>
    </div>

    {{-- Pending payment requests --}}
    @if(isset($pendingPayments) && $pendingPayments->isNotEmpty())
        <div class="rounded-xl bg-warning/10 border border-warning/30 p-4 mb-6">
            <div class="flex items-start gap-3">
                <x-icon name="clock" class="w-5 h-5 text-warning mt-0.5 shrink-0" />
                <div class="flex-1">
                    <p class="text-sm font-semibold text-warning">You have a payment awaiting verification</p>
                    @foreach($pendingPayments as $pending)
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mt-2">
                            <p class="text-xs text-content-secondary">
                                {{ $pending->plan_name }} — {{ $pending->currency }}{{ number_format($pending->amount, 2) }}
                                @if($pending->tx_hash)
                                    · TXID submitted, awaiting approval
                                @else
                                    · TXID not submitted yet
                                @endif
                            </p>
                            <a href="{{ route('user.signal.payment.show', $pending->id) }}" class="inline-flex items-center gap-1 text-xs font-semibold text-warning hover:underline">
                                {{ $pending->tx_hash ? 'View status' : 'Complete payment' }}
                                <x-icon name="arrow-right" class="w-3.5 h-3.5" />
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- Plans Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($plans as $plan)
            <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden hover:border-primary/50 transition-colors flex flex-col">
                {{-- Plan Header --}}
                <div class="p-6 text-center border-b border-surface-border">
                    <h3 class="text-lg font-bold text-content-primary mb-2">{{ $plan->name }}</h3>
                    <div>
                        <span class="text-3xl font-bold text-primary">{{ $settings->currency }}{{ number_format($plan->price) }}</span>
                    </div>
                </div>

                {{-- Features --}}
                <div class="p-6 space-y-3 flex-1">
                    <div class="flex items-center gap-2 text-sm">
                        <x-icon name="check-circle" class="w-4 h-4 text-gain flex-shrink-0" />
                        <span class="text-content-secondary">General trading signals</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <x-icon name="check-circle" class="w-4 h-4 text-gain flex-shrink-0" />
                        <span class="text-content-secondary">{{ $plan->features }}</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <x-icon name="check-circle" class="w-4 h-4 text-gain flex-shrink-0" />
                        <span class="text-content-secondary">24/7 Expert support</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <x-icon name="clock" class="w-4 h-4 text-primary flex-shrink-0" />
                        <span class="text-content-secondary">Duration: {{ $plan->duration }} Weeks</span>
                    </div>
                </div>

                {{-- Subscribe --}}
                <div class="px-6 pb-6">
                    <form id="subscribe-form-{{ $plan->id }}" action="{{ route('user.signal.subscribe') }}" method="POST">
                        @csrf
                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                        <button type="button" onclick="confirmSubscription({{ $plan->id }}, '{{ addslashes($plan->name) }}', {{ $plan->price }})"
                                class="w-full py-2.5 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-semibold transition-colors">
                            Purchase Plan
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@section('scripts')
@parent
<script>
    function confirmSubscription(planId, planName, price) {
        Swal.fire({
            title: 'Confirm Plan',
            html: 'You are about to create a payment request for <strong>' + planName + '</strong>.<br><br>' +
                  'Amount: <strong>{{ $settings->currency }}' + price.toLocaleString() + '</strong><br>' +
                  '<span style="font-size:12px;color:#9AA0AB;">You will be redirected to a cryptocurrency payment page. No wallet balance will be deducted.</span>',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#059669',
            cancelButtonColor: '#2A2F36',
            confirmButtonText: 'Continue to Payment',
            cancelButtonText: 'Cancel',
            background: '#161A1E',
            color: '#E8EAED'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('subscribe-form-' + planId).submit();
            }
        });
    }
</script>
@endsection
