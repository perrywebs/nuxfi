@extends('layouts.dash1')
@section('title', $title)
@section('content')

    <x-danger-alert />
    <x-success-alert />
    <x-alert />

    {{-- Ticker Tape --}}
    @include('user.partials.ticker-tape')

    {{-- Quick Nav --}}
    @include('user.partials.quick-nav')

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl font-bold text-content-primary">Signal Plan Payment</h2>
            <p class="text-sm text-content-secondary mt-1">Complete your cryptocurrency payment to activate your subscription</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('user.signal.payments') }}" class="px-4 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary text-sm font-medium transition-colors">Payment History</a>
            <a href="{{ route('user.signal.plans') }}" class="px-4 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary text-sm font-medium transition-colors">Back to Plans</a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">

        {{-- ── Left: order summary ── --}}
        <div class="lg:col-span-1 space-y-6">
            <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden">
                <div class="p-5 border-b border-surface-border">
                    <h3 class="text-sm font-semibold text-content-primary">Order Summary</h3>
                </div>
                <div class="p-5 space-y-4">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-content-tertiary">Order</span>
                        <span class="font-medium text-content-primary">#{{ str_pad($payment->id, 6, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-content-tertiary">Signal Plan</span>
                        <span class="font-medium text-content-primary text-right">{{ $payment->plan_name }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-content-tertiary">Duration</span>
                        <span class="font-medium text-content-primary">{{ $payment->duration }} {{ \Illuminate\Support\Str::plural('Week', $payment->duration) }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-content-tertiary">Requested</span>
                        <span class="font-medium text-content-primary">{{ $payment->created_at ? $payment->created_at->toFormattedDateString() : '—' }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-content-tertiary">Status</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold capitalize {{ $payment->statusBadgeClass() }}">{{ $payment->status }}</span>
                    </div>
                    <div class="border-t border-surface-border pt-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-content-tertiary">Amount Due</span>
                            <span class="text-2xl font-bold text-primary">{{ $payment->currency }}{{ number_format($payment->amount, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Arbitration / pending notice --}}
            @if($payment->isPending())
                <div class="rounded-xl bg-warning/10 border border-warning/30 p-4 flex items-start gap-3">
                    <x-icon name="clock" class="w-5 h-5 text-warning mt-0.5 shrink-0" />
                    <div>
                        <p class="text-sm font-semibold text-warning">Payment status: Pending</p>
                        <p class="text-xs text-content-secondary mt-1 leading-relaxed">
                            Your signal subscription will only become active after an administrator verifies and approves your payment.
                            No money has been deducted from your internal wallet.
                        </p>
                    </div>
                </div>
            @elseif($payment->isApproved())
                <div class="rounded-xl bg-gain/10 border border-gain/30 p-4 flex items-start gap-3">
                    <x-icon name="check-circle" class="w-5 h-5 text-gain mt-0.5 shrink-0" />
                    <div>
                        <p class="text-sm font-semibold text-gain">Payment approved</p>
                        <p class="text-xs text-content-secondary mt-1 leading-relaxed">
                            Your subscription to {{ $payment->plan_name }} is active
                            @if($payment->subscription && $payment->subscription->expires_at)
                                until {{ $payment->subscription->expires_at->toDayDateTimeString() }}.
                            @else
                                .
                            @endif
                        </p>
                        <a href="{{ route('user.signal.subscriptions') }}" class="inline-flex items-center gap-1 text-xs font-semibold text-gain mt-2 hover:underline">
                            View my subscriptions <x-icon name="arrow-right" class="w-3.5 h-3.5" />
                        </a>
                    </div>
                </div>
            @else
                <div class="rounded-xl bg-loss/10 border border-loss/30 p-4 flex items-start gap-3">
                    <x-icon name="x-circle" class="w-5 h-5 text-loss mt-0.5 shrink-0" />
                    <div>
                        <p class="text-sm font-semibold text-loss">Payment rejected</p>
                        <p class="text-xs text-content-secondary mt-1 leading-relaxed">
                            {{ $payment->rejection_reason ?: 'Your payment could not be verified. Please contact support or create a new payment request.' }}
                        </p>
                        <a href="{{ route('user.signal.plans') }}" class="inline-flex items-center gap-1 text-xs font-semibold text-loss mt-2 hover:underline">
                            Choose a plan again <x-icon name="arrow-right" class="w-3.5 h-3.5" />
                        </a>
                    </div>
                </div>
            @endif

            <div class="rounded-xl bg-surface-raised border border-surface-border p-4 flex items-start gap-3">
                <x-icon name="shield-check" class="w-5 h-5 text-primary mt-0.5 shrink-0" />
                <p class="text-xs text-content-tertiary leading-relaxed">
                    Pay only to the wallet address shown on this page. Always double-check the
                    network before sending funds. Crypto payments are irreversible.
                </p>
            </div>
        </div>

        {{-- ── Right: payment method + TxID ── --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden"
                 x-data="{ method: '{{ old('payment_method_id', $payment->signal_payment_method_id) }}' }">
                <div class="p-5 border-b border-surface-border">
                    <h3 class="text-sm font-semibold text-content-primary">Payment Method</h3>
                    <p class="text-xs text-content-tertiary mt-1">Select the cryptocurrency and network you paid with.</p>
                </div>

                <div class="p-5 space-y-5">
                    @if($errors->any())
                        <div class="rounded-lg bg-loss/10 border border-loss/30 p-3">
                            @foreach($errors->all() as $error)
                                <p class="text-xs text-loss">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    @if($methods->isEmpty())
                        <div class="rounded-lg bg-warning/10 border border-warning/30 p-4 text-sm text-content-secondary">
                            No cryptocurrency payment methods are configured right now. Please contact support.
                        </div>
                    @else
                        {{-- Method selector --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @foreach($methods as $method)
                                <label class="relative flex items-center gap-3 p-4 rounded-xl border cursor-pointer transition-colors"
                                       :class="method == '{{ $method->id }}' ? 'border-primary bg-primary/5' : 'border-surface-border bg-surface-overlay/40 hover:border-primary/40'">
                                    <input type="radio" name="payment_method_picker" value="{{ $method->id }}"
                                           x-model="method" class="sr-only" {{ $payment->isPending() ? '' : 'disabled' }}>
                                    <span class="w-9 h-9 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0">
                                        <x-icon name="wallet" class="w-5 h-5" />
                                    </span>
                                    <span class="min-w-0">
                                        <span class="block text-sm font-semibold text-content-primary truncate">{{ $method->name }}</span>
                                        <span class="block text-xs text-content-tertiary truncate">
                                            {{ $method->currency ?: $method->name }}@if($method->network) · {{ $method->network }}@endif
                                        </span>
                                    </span>
                                    <span class="ml-auto w-4 h-4 rounded-full border-2 shrink-0 flex items-center justify-center"
                                          :class="method == '{{ $method->id }}' ? 'border-primary' : 'border-surface-border'">
                                        <span class="w-2 h-2 rounded-full bg-primary" x-show="method == '{{ $method->id }}'"></span>
                                    </span>
                                </label>
                            @endforeach
                        </div>

                        {{-- Selected method details --}}
                        @foreach($methods as $method)
                            <div x-show="method == '{{ $method->id }}'" x-cloak x-transition.opacity class="space-y-4">
                                @if($payment->isPending())
                                    <div class="rounded-xl border border-surface-border bg-surface-overlay/30 p-4 sm:p-5">
                                        <div class="flex flex-col sm:flex-row items-center gap-5">
                                            {{-- QR --}}
                                            <div class="shrink-0">
                                                @if($method->qr_code)
                                                    <div class="p-2 bg-white rounded-xl inline-block">
                                                        <img src="{{ asset('storage/' . $method->qr_code) }}" alt="{{ $method->name }} QR code" class="w-40 h-40 object-contain">
                                                    </div>
                                                @else
                                                    <div class="p-2 bg-white rounded-xl inline-flex items-center justify-center w-[176px] h-[176px]">
                                                        <div class="signal-qr" data-qr-text="{{ $method->wallet_address }}"></div>
                                                    </div>
                                                @endif
                                            </div>

                                            {{-- Address --}}
                                            <div class="flex-1 w-full space-y-3">
                                                <div>
                                                    <p class="text-xs uppercase tracking-wide text-content-tertiary mb-1">Send to {{ $method->name }} address</p>
                                                    <div class="flex items-stretch gap-2">
                                                        <input type="text" readonly value="{{ $method->wallet_address }}"
                                                               id="wallet-address-{{ $method->id }}"
                                                               class="flex-1 min-w-0 bg-surface-overlay border border-surface-border rounded-lg px-3 py-2.5 text-xs sm:text-sm text-content-primary font-mono select-all focus:outline-none">
                                                        <button type="button"
                                                                x-data="{ copied: false }"
                                                                @click="
                                                                    const input = document.getElementById('wallet-address-{{ $method->id }}');
                                                                    const done = () => { copied = true; setTimeout(() => copied = false, 2000); };
                                                                    if (navigator.clipboard && window.isSecureContext) {
                                                                        navigator.clipboard.writeText(input.value).then(done).catch(() => { input.select(); document.execCommand('copy'); done(); });
                                                                    } else { input.select(); document.execCommand('copy'); done(); }
                                                                "
                                                                class="px-3 rounded-lg border border-primary/30 bg-primary/10 text-primary hover:bg-primary/20 transition flex items-center gap-1.5">
                                                            <x-icon name="copy" class="w-4 h-4" />
                                                            <span class="text-xs font-semibold hidden sm:inline" x-text="copied ? 'Copied!' : 'Copy'">Copy</span>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="grid grid-cols-2 gap-3 text-xs">
                                                    <div>
                                                        <p class="text-content-tertiary">Network</p>
                                                        <p class="font-semibold text-content-primary">{{ $method->network ?: '—' }}</p>
                                                    </div>
                                                    <div>
                                                        <p class="text-content-tertiary">Amount to send</p>
                                                        <p class="font-semibold text-content-primary">{{ $payment->currency }}{{ number_format($payment->amount, 2) }}</p>
                                                    </div>
                                                </div>

                                                @if($method->instructions)
                                                    <div class="rounded-lg bg-primary/5 border border-primary/20 p-3">
                                                        <p class="text-xs text-content-secondary whitespace-pre-line">{{ $method->instructions }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @endif

                    {{-- TxID submission --}}
                    @if($payment->isPending() && $methods->isNotEmpty())
                        <form action="{{ route('user.signal.payment.confirm', $payment->id) }}" method="POST" class="border-t border-surface-border pt-5 space-y-4">
                            @csrf
                            <div>
                                <label for="payment_method_id" class="block text-sm font-medium text-content-primary mb-1.5">Selected Payment Method</label>
                                <select name="payment_method_id" id="payment_method_id" x-model="method" required
                                        class="w-full bg-surface-overlay border border-surface-border rounded-lg px-3 py-2.5 text-sm text-content-primary focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                                    <option value="">Select payment method</option>
                                    @foreach($methods as $method)
                                        <option value="{{ $method->id }}">{{ $method->name }}@if($method->network) — {{ $method->network }}@endif</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="tx_hash" class="block text-sm font-medium text-content-primary mb-1.5">Transaction Hash / TXID</label>
                                <input type="text" name="tx_hash" id="tx_hash" required maxlength="191"
                                       value="{{ old('tx_hash', $payment->tx_hash) }}"
                                       placeholder="Paste the transaction hash or TXID of your payment"
                                       class="w-full bg-surface-overlay border border-surface-border rounded-lg px-3 py-2.5 text-sm text-content-primary font-mono focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                                <p class="text-xs text-content-tertiary mt-1.5">
                                    You can find the TXID in your wallet or on the blockchain explorer after sending the payment.
                                </p>
                            </div>

                            <div class="rounded-lg bg-primary/5 border border-primary/20 p-3 flex items-start gap-2">
                                <x-icon name="information-circle" class="w-4 h-4 text-primary mt-0.5 shrink-0" />
                                <p class="text-xs text-content-secondary">
                                    After submitting, your payment status stays <strong>Pending</strong> until an administrator verifies it.
                                    Your subscription activates automatically once approved.
                                </p>
                            </div>

                            <button type="submit"
                                    class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-semibold transition-colors">
                                <x-icon name="check-circle" class="w-4 h-4" />
                                {{ $payment->tx_hash ? 'Update Payment Confirmation' : 'Submit Payment Confirmation' }}
                            </button>
                        </form>
                    @elseif(!$payment->isPending())
                        <div class="border-t border-surface-border pt-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                            <div class="text-sm">
                                <p class="text-content-tertiary">Submitted TXID</p>
                                <p class="font-mono text-content-primary break-all">{{ $payment->tx_hash ?: '—' }}</p>
                            </div>
                            <a href="{{ route('user.signal.payments') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-surface-overlay border border-surface-border text-sm font-medium text-content-secondary hover:text-content-primary transition-colors">
                                View all payments
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Submitted info --}}
            @if($payment->tx_hash)
                <div class="rounded-xl bg-surface-raised border border-surface-border p-5 space-y-3">
                    <div class="flex items-center justify-between gap-3">
                        <h3 class="text-sm font-semibold text-content-primary">Submitted Payment</h3>
                        <span class="text-xs text-content-tertiary">{{ $payment->submitted_at ? $payment->submitted_at->toDayDateTimeString() : '' }}</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <div>
                            <p class="text-xs text-content-tertiary">Payment method</p>
                            <p class="font-medium text-content-primary">{{ $payment->methodLabel() }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-content-tertiary">Transaction hash / TXID</p>
                            <p class="font-mono text-content-primary break-all">{{ $payment->tx_hash }}</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection

@section('scripts')
@parent
<script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof QRCode === 'undefined') {
            return;
        }

        document.querySelectorAll('.signal-qr[data-qr-text]').forEach(function (el) {
            var text = el.getAttribute('data-qr-text');
            if (!text) {
                return;
            }
            el.innerHTML = '';
            new QRCode(el, {
                text: text,
                width: 160,
                height: 160,
                colorDark: '#111827',
                colorLight: '#ffffff',
                correctLevel: QRCode.CorrectLevel.M
            });
        });
    });
</script>
@endsection
