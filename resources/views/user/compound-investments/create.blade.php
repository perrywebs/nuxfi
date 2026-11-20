@extends('layouts.dash1')
@section('title', $title)
@section('content')
    @include('user.partials.page-header', ['title' => 'Start Compounding', 'subtitle' => 'Build a scenario and submit it for payment review'])
    <x-danger-alert />
    <x-success-alert />

    @if ($errors->any())
        <div class="rounded-lg border border-loss/30 bg-loss/10 p-4 text-sm text-loss">
            <ul class="list-disc space-y-1 pl-5">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    @if ($hasPending)
        <div class="rounded-lg border border-warning/30 bg-warning/10 p-4 text-sm text-content-secondary">
            You already have a request awaiting review. You may still submit another scenario, but each request is reviewed separately.
            <a href="{{ route('compound-investments.index') }}" class="font-semibold text-primary underline">View your requests</a>.
        </div>
    @endif

    <form action="{{ route('compound-investments.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5" id="compound-investment-form">
        @csrf
        <input type="hidden" name="submission_key" value="{{ old('submission_key', \Illuminate\Support\Str::uuid()) }}">
        <section class="rounded-xl border border-surface-border bg-surface-raised p-4 sm:p-6">
            <div class="mb-5">
                <h2 class="text-base font-semibold text-content-primary">Your scenario</h2>
                <p class="mt-1 text-sm text-content-tertiary">Tap any value to edit it. Projections use an illustrative constant return and do not guarantee future results; projected gains are never credited automatically.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
                <label class="block">
                    <span class="text-xs font-medium text-content-tertiary">Starting amount (USD)</span>
                    <input id="ci-starting" name="starting_amount" type="number" min="1" max="100000000" step="0.01" required value="{{ old('starting_amount', $prefill['principal']) }}"
                        class="mt-1 w-full rounded-lg border border-surface-border bg-surface-overlay px-3 py-2.5 text-sm text-content-primary focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
                </label>
                <label class="block">
                    <span id="ci-rate-label" class="text-xs font-medium text-content-tertiary">Monthly return (%)</span>
                    <input id="ci-rate" name="period_return_rate" readonly type="number" min="0.1" max="100" step="0.01" required value="{{ old('period_return_rate', $prefill['rate']) }}"
                        class="mt-1 w-full rounded-lg border border-surface-border bg-surface-overlay px-3 py-2.5 text-sm text-content-primary focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
                </label>
                <div class="grid grid-cols-[1fr_1fr] gap-2">
                    <label class="block">
                        <span class="text-xs font-medium text-content-tertiary">Duration</span>
                        <input id="ci-duration" name="duration_value" type="number" min="1" max="10000" step="1" required value="{{ old('duration_value', $prefill['duration']) }}"
                            class="mt-1 w-full rounded-lg border border-surface-border bg-surface-overlay px-3 py-2.5 text-sm text-content-primary focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
                    </label>
                    <label class="block">
                        <span class="text-xs font-medium text-content-tertiary">Unit</span>
                        <select id="ci-unit" name="duration_unit" class="mt-1 w-full rounded-lg border border-surface-border bg-surface-overlay px-3 py-2.5 text-sm text-content-primary focus:border-primary focus:outline-none">
                            <option value="monthly" {{ old('duration_unit', $prefill['unit']) === 'monthly' ? 'selected' : '' }}>Monthly</option>
                            <option value="weekly" {{ old('duration_unit', $prefill['unit']) === 'weekly' ? 'selected' : '' }}>Weekly</option>
                            <option value="daily" {{ old('duration_unit', $prefill['unit']) === 'daily' ? 'selected' : '' }}>Daily</option>
                        </select>
                    </label>
                </div>
                <label class="block">
                    <span id="ci-topup-label" class="text-xs font-medium text-content-tertiary">Adding each month (USD)</span>
                    <input id="ci-topup" name="recurring_topup" type="number" readonly min="0" max="100000000" step="0.01" value="{{ old('recurring_topup', $prefill['contribution']) }}"
                        class="mt-1 w-full rounded-lg border border-surface-border bg-surface-overlay px-3 py-2.5 text-sm text-content-primary focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
                </label>
            </div>

            <div class="mt-5 grid grid-cols-1 sm:grid-cols-3 gap-3">
                <div class="rounded-lg border border-surface-border bg-surface-overlay p-4">
                    <p class="text-xs text-content-tertiary">Projected final amount</p><p id="ci-projected-final" class="mt-1 text-lg font-bold text-content-primary">—</p>
                </div>
                <div class="rounded-lg border border-surface-border bg-surface-overlay p-4">
                    <p class="text-xs text-content-tertiary">Projected interest</p><p id="ci-projected-interest" class="mt-1 text-lg font-bold text-gain">—</p>
                </div>
                <div class="rounded-lg border border-surface-border bg-surface-overlay p-4">
                    <p class="text-xs text-content-tertiary">Total contributions</p><p id="ci-total-contributions" class="mt-1 text-lg font-bold text-content-primary">—</p>
                </div>
            </div>
        </section>

        <section class="rounded-xl border border-surface-border bg-surface-raised p-4 sm:p-6">
            <h2 class="text-base font-semibold text-content-primary">Investment deposit</h2>
            <p class="mt-1 text-sm text-content-tertiary">Deposit the selected starting amount to the wallet below, then submit your transaction proof. Your request will not be activated until reviewed by an administrator.</p>

            @if ($methods->isEmpty())
                <div class="mt-4 rounded-lg border border-warning/30 bg-warning/10 p-4 text-sm text-content-secondary">
                    No enabled manual deposit wallets are currently available. Please contact support.
                </div>
            @else
                <div class="mt-5 grid grid-cols-1 lg:grid-cols-[1fr_200px] gap-5 items-start">
                    <div class="space-y-4">
                        <div class="rounded-lg border border-surface-border bg-surface-overlay p-4">
                            <p class="text-xs text-content-tertiary">Starting amount to deposit</p>
                            <p id="ci-deposit-amount" class="mt-1 text-2xl font-bold text-content-primary">—</p>
                        </div>
                        <label class="block">
                            <span class="text-xs font-medium text-content-tertiary">Payment cryptocurrency / method</span>
                            <select id="ci-payment-method" name="payment_method" required class="mt-1 w-full rounded-lg border border-surface-border bg-surface-overlay px-3 py-2.5 text-sm text-content-primary focus:border-primary focus:outline-none">
                                @foreach ($methods as $method)
                                    <option value="{{ $method->id }}" data-wallet="{{ $method->wallet_address }}" data-network="{{ $method->network ?? '' }}" data-currency="{{ $method->name }}"
                                        {{ (string) old('payment_method') === (string) $method->id ? 'selected' : '' }}>
                                        {{ $method->name }}{{ !empty($method->network) ? ' — ' . $method->network : '' }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                        <div>
                            <p class="mb-1 text-xs text-content-tertiary">Deposit wallet address</p>
                            <div class="flex gap-2">
                                <input id="ci-wallet" readonly class="min-w-0 flex-1 rounded-lg border border-surface-border bg-surface-overlay px-3 py-2.5 text-xs sm:text-sm font-mono text-content-primary">
                                <button type="button" id="ci-copy-wallet" class="shrink-0 rounded-lg bg-primary px-3 py-2 text-sm font-medium text-content-inverse">Copy</button>
                            </div>
                            <p id="ci-network" class="mt-1 text-xs text-content-tertiary"></p>
                        </div>
                        <label class="block">
                            <span class="text-xs font-medium text-content-tertiary">Transaction hash / payment reference (optional)</span>
                            <input name="payment_reference" maxlength="191" value="{{ old('payment_reference') }}" class="mt-1 w-full rounded-lg border border-surface-border bg-surface-overlay px-3 py-2.5 text-sm text-content-primary">
                        </label>
                        <label class="block">
                            <span class="text-xs font-medium text-content-tertiary">Upload payment proof (required)</span>
                            <input name="proof" type="file" required accept=".jpg,.jpeg,.png,.pdf" class="mt-1 block w-full text-sm text-content-secondary file:mr-3 file:rounded-md file:border-0 file:bg-primary/10 file:px-3 file:py-2 file:text-sm file:font-medium file:text-primary">
                        </label>
                    </div>
                    <div class="rounded-lg border border-surface-border bg-white p-3 text-center">
                        <img id="ci-wallet-qr" alt="Deposit wallet QR code" class="mx-auto aspect-square w-full max-w-[180px] object-contain">
                        <p class="mt-2 text-[11px] text-gray-500">Verify the selected network before sending.</p>
                    </div>
                </div>
                <label class="mt-5 flex items-start gap-2 text-xs text-content-tertiary">
                    <input type="checkbox" required class="mt-0.5 rounded border-surface-border text-primary">
                    <span>I understand this is an investment request for review. Projections are illustrative and my investment will not start until approved and activated by an administrator.</span>
                </label>
                <button type="submit" class="mt-5 w-full rounded-lg bg-primary px-4 py-3 text-sm font-semibold text-content-inverse hover:bg-primary-dark">
                    Submit Compound Investment Request
                </button>
            @endif
        </section>
    </form>

    <script>
        (function () {
            const $ = (id) => document.getElementById(id);
            const fields = ['ci-starting', 'ci-rate', 'ci-duration', 'ci-unit', 'ci-topup'].map($);
            const money = (value) => '$' + Number(value || 0).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            function calculate() {
                const principal = Math.max(0, Number($('ci-starting').value) || 0);
                const rate = Math.max(0, Number($('ci-rate').value) || 0) / 100;
                const duration = Math.max(0, Number($('ci-duration').value) || 0);
                const contribution = Math.max(0, Number($('ci-topup').value) || 0);
                const periods = Math.min(10000, duration);
                const whole = Math.floor(periods);
                const fraction = periods - whole;
                let balance = principal;
                for (let i = 0; i < whole; i++) balance = balance * (1 + rate) + contribution;
                if (fraction > 0) balance *= Math.pow(1 + rate, fraction);
                $('ci-projected-final').textContent = money(balance);
                $('ci-projected-interest').textContent = money(balance - principal - whole * contribution);
                $('ci-total-contributions').textContent = money(principal + whole * contribution);
                $('ci-deposit-amount').textContent = money(principal);
                const unit = $('ci-unit').value;
                $('ci-rate-label').textContent = ({monthly:'Monthly', weekly:'Weekly', daily:'Daily'}[unit]) + ' return (%)';
                $('ci-topup-label').textContent = 'Adding each ' + ({monthly:'month', weekly:'week', daily:'day'}[unit]) + ' (USD)';
            }
            function updateWallet() {
                const option = $('ci-payment-method').selectedOptions[0];
                const wallet = option ? (option.dataset.wallet || '') : '';
                $('ci-wallet').value = wallet;
                $('ci-network').textContent = option && option.dataset.network ? 'Network: ' + option.dataset.network : '';
                $('ci-wallet-qr').src = wallet ? 'https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=' + encodeURIComponent(wallet) : '';
            }
            fields.forEach((field) => field && field.addEventListener('input', calculate));
            $('ci-payment-method') && $('ci-payment-method').addEventListener('change', updateWallet);
            $('ci-copy-wallet') && $('ci-copy-wallet').addEventListener('click', function () {
                const button = this;
                const field = $('ci-wallet');
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(field.value).then(() => { button.textContent = 'Copied'; });
                } else {
                    field.select();
                    document.execCommand('copy');
                    button.textContent = 'Copied';
                }
            });
            calculate();
            updateWallet();
        })();
    </script>
@endsection
