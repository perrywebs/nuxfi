@extends('layouts.admin-dash')
@section('title', $user->name . ' - User Details')
@section('content')
    <x-admin.page-header title="{{ $user->name }}">
        <x-slot name="actions">
            <a class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-3 py-1.5 text-xs font-medium transition-colors" href="{{ route('manageusers') }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                back
            </a>
            {{-- Actions Dropdown --}}
            <x-admin.dropdown align="right" width="w-56">
                <x-slot name="trigger">
                    <button type="button" class="inline-flex items-center gap-1.5 bg-surface-alt text-content hover:bg-surface-alt/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors border border-border">
                        Actions
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                    </button>
                </x-slot>

                <a class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors" href="{{ route('loginactivity', $user->id) }}">Login Activity</a>

                @if ($user->isProtectedAccount() || (int) Auth::guard('web')->id() === (int) $user->id)
                    <span class="block px-4 py-2 text-sm text-content-muted cursor-not-allowed"
                        title="This account is protected from deactivation.">Protected account</span>
                @elseif ($user->isActive())
                    <a class="block px-4 py-2 text-sm text-warning hover:bg-surface-alt transition-colors"
                        href="{{ route('user.deactivate', $user->id) }}"
                        onclick="event.preventDefault(); Swal.fire({ title: 'Deactivate {{ addslashes($user->name) }}?', text: 'The account keeps all of its data but the user will be signed out and blocked from logging in.', icon: 'warning', showCancelButton: true, confirmButtonColor: 'rgb(217,119,6)', confirmButtonText: 'Yes, deactivate' }).then(function (result) { if (result.isConfirmed) { window.location.href = '{{ route('user.deactivate', $user->id) }}'; } });">
                        Deactivate Account
                    </a>
                @else
                    <a class="block px-4 py-2 text-sm text-success hover:bg-surface-alt transition-colors"
                        href="{{ route('user.activate', $user->id) }}"
                        onclick="event.preventDefault(); Swal.fire({ title: 'Activate {{ addslashes($user->name) }}?', text: 'The user will be able to sign in again immediately.', icon: 'question', showCancelButton: true, confirmButtonColor: 'rgb(22,163,74)', confirmButtonText: 'Yes, activate' }).then(function (result) { if (result.isConfirmed) { window.location.href = '{{ route('user.activate', $user->id) }}'; } });">
                        Activate Account
                    </a>
                @endif

                @if ($user->trade_mode == 'on')
                    <a class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors" href="{{ url('admin/dashboard/usertrademode') }}/{{ $user->id }}/off">Turn off trade</a>
                @else
                    <a class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors" href="{{ url('admin/dashboard/usertrademode') }}/{{ $user->id }}/on">Turn on trade</a>
                @endif

                @if (!$user->email_verified_at)
                    <a href="{{ url('admin/dashboard/email-verify') }}/{{ $user->id }}" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Verify Email</a>
                @endif

                <a href="#" @click.prevent="$dispatch('open-topupmodal'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Credit/Debit</a>
                <a href="#" @click.prevent="$dispatch('open-winrate'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Set User Win Rate</a>
                <a href="#" @click.prevent="$dispatch('open-signalstrength'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Set Signal Strength</a>
                <a href="#" @click.prevent="$dispatch('open-tradesignal'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Set Trade Progress</a>
                <a href="#" @click.prevent="$dispatch('open-withdrawalcode'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Set Withdrawal Code</a>
                <a href="#" @click.prevent="$dispatch('open-notify'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Notify User Dashboard</a>
                <a href="#" @click.prevent="$dispatch('open-resetpswdmodal'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Reset Password</a>
                <a href="#" @click.prevent="$dispatch('open-clearacctmodal'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Clear Account</a>
                <a href="#" @click.prevent="$dispatch('open-tradingmodal'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Add Trading History</a>
                <a href="#" @click.prevent="$dispatch('open-edituser'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Edit</a>
                <a href="{{ route('showusers', $user->id) }}" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Add Referral</a>
                <a href="#" @click.prevent="$dispatch('open-sendmailtooneusermodal'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Send Email</a>
                <a href="#" @click.prevent="$dispatch('open-switchusermodal'); open = false" class="block px-4 py-2 text-sm text-success hover:bg-surface-alt transition-colors">Login as {{ $user->name }}</a>
                @if ($user->isProtectedAccount() || (int) Auth::guard('web')->id() === (int) $user->id)
                    <span class="block px-4 py-2 text-sm text-content-muted cursor-not-allowed"
                        title="This account is protected from deletion.">Delete (protected)</span>
                @else
                    <a href="#" @click.prevent="$dispatch('open-deletemodal'); open = false" class="block px-4 py-2 text-sm text-danger hover:bg-surface-alt transition-colors">Delete {{ $user->name }}</a>
                @endif
            </x-admin.dropdown>
        </x-slot>
    </x-admin.page-header>

    <div class="mt-6 space-y-6">
        {{-- Account Balances --}}
        <x-admin.card>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div>
                    <h5 class="text-sm font-semibold text-content">Account Balance</h5>
                    <p class="mt-1 text-content-secondary">{{ $settings->currency }}{{ number_format($user->account_bal, 2, '.', ',') }}</p>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">Profit</h5>
                    <p class="mt-1 text-content-secondary">{{ $settings->currency }}{{ number_format($user->roi, 2, '.', ',') }}</p>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">Referral Bonus</h5>
                    <p class="mt-1 text-content-secondary">{{ $settings->currency }}{{ number_format($user->ref_bonus, 2, '.', ',') }}</p>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">Bonus</h5>
                    <p class="mt-1 text-content-secondary">{{ $settings->currency }}{{ number_format($user->bonus, 2, '.', ',') }}</p>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">User Account Status</h5>
                    <div class="mt-1 flex items-center gap-2">
                        @if ($user->isActive())
                            <x-admin.badge type="success">Active</x-admin.badge>
                            <span class="text-xs text-content-muted">Can sign in</span>
                        @else
                            <x-admin.badge type="danger">Inactive</x-admin.badge>
                            <span class="text-xs text-content-muted">Sign-in blocked</span>
                        @endif
                    </div>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">Inv. Plans</h5>
                    <div class="mt-1">
                        @if ($user->plan != null)
                            <a class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-3 py-1.5 text-xs font-medium transition-colors"
                               href="{{ route('user.plans', $user->id) }}">View Plans</a>
                        @else
                            <p class="text-content-secondary">No Investment Plan</p>
                        @endif
                    </div>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">KYC</h5>
                    <div class="mt-1">
                        @if ($user->account_verify == 'Verified')
                            <x-admin.badge type="success">Verified</x-admin.badge>
                        @else
                            <x-admin.badge type="danger">Not Verified</x-admin.badge>
                        @endif
                    </div>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">Trade Mode</h5>
                    <div class="mt-1">
                        @if ($user->trade_mode == 'off' || $user->trade_mode == null)
                            <x-admin.badge type="danger">Off</x-admin.badge>
                        @else
                            <x-admin.badge type="success">On</x-admin.badge>
                        @endif
                    </div>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">Wallet Connect</h5>
                    <div class="mt-1 flex items-center gap-2">
                        @if ($user->wallet_connect_status == 'on')
                            <x-admin.badge type="success">On</x-admin.badge>
                            <a href="{{ url('admin/dashboard/userwalletstatus') }}/{{ $user->id }}/off"
                               class="text-xs text-danger hover:underline">Turn Off</a>
                        @else
                            <x-admin.badge type="danger">Off</x-admin.badge>
                            <a href="{{ url('admin/dashboard/userwalletstatus') }}/{{ $user->id }}/on"
                               class="text-xs text-success hover:underline">Turn On</a>
                        @endif
                    </div>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">Signal Strength</h5>
                    <div class="mt-1 flex items-center gap-2">
                        @if ($user->signal_strength_enabled)
                            <x-admin.badge type="success">On</x-admin.badge>
                            <span class="text-sm text-content-secondary">{{ $user->signal_strength_score ?? 0 }}%</span>
                        @else
                            <x-admin.badge type="danger">Off</x-admin.badge>
                        @endif
                    </div>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">Trade Progress</h5>
                    <div class="mt-1 flex items-center gap-2">
                        <x-admin.badge type="{{ $user->trade_signal >= 50 ? 'success' : 'danger' }}">{{ $user->trade_signal ?? 50 }}%</x-admin.badge>
                        <a href="#" @click.prevent="$dispatch('open-tradesignal')" class="text-xs text-primary hover:underline">Edit</a>
                    </div>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">Dashboard Banner</h5>
                    <div class="mt-1 flex items-center gap-2">
                        @if ($user->dashboard_banner_enabled)
                            <x-admin.badge type="{{ $user->dashboard_banner_type == 'success' ? 'success' : ($user->dashboard_banner_type == 'danger' ? 'danger' : 'warning') }}">{{ ucfirst($user->dashboard_banner_type ?? 'warning') }}</x-admin.badge>
                            <span class="text-sm text-content-secondary truncate max-w-[200px]" title="{{ $user->dashboard_banner_message }}">{{ Str::limit($user->dashboard_banner_message, 40) }}</span>
                        @else
                            <x-admin.badge type="danger">Off</x-admin.badge>
                        @endif
                    </div>
                </div>
            </div>
        </x-admin.card>

        {{-- User Information --}}
        <x-admin.card>
            <h5 class="text-sm font-semibold text-content-secondary uppercase tracking-wider mb-4">User Information</h5>
            <div class="divide-y divide-border">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2 py-3">
                    <div class="text-sm font-medium text-content">Fullname</div>
                    <div class="md:col-span-2 text-sm text-content-secondary">{{ $user->name }}</div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2 py-3">
                    <div class="text-sm font-medium text-content">Email Address</div>
                    <div class="md:col-span-2 text-sm text-content-secondary">{{ $user->email }}</div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2 py-3">
                    <div class="text-sm font-medium text-content">Mobile Number</div>
                    <div class="md:col-span-2 text-sm text-content-secondary">{{ $user->phone }}</div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2 py-3">
                    <div class="text-sm font-medium text-content">Date of birth</div>
                    <div class="md:col-span-2 text-sm text-content-secondary">{{ $user->dob }}</div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2 py-3">
                    <div class="text-sm font-medium text-content">Nationality</div>
                    <div class="md:col-span-2 text-sm text-content-secondary">{{ $user->country }}</div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2 py-3">
                    <div class="text-sm font-medium text-content">Registered</div>
                    <div class="md:col-span-2 text-sm text-content-secondary">{{ \Carbon\Carbon::parse($user->created_at)->toDayDateTimeString() }}</div>
                </div>
            </div>
        </x-admin.card>

        {{-- Withdrawal Verification Codes --}}
        <x-admin.card>
            @php
                $activeCount = 0;
                for ($i = 1; $i <= 5; $i++) {
                    if ($user->{"code{$i}_enabled"}) $activeCount++;
                }
                $defaultLabels = [
                    1 => 'Withdrawal Verification Code',
                    2 => 'Anti-Theft Security Code',
                    3 => 'IMF Code',
                    4 => 'Cost of Transfer Code',
                    5 => 'Taxation Code',
                ];
            @endphp
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h5 class="text-sm font-semibold text-content-secondary uppercase tracking-wider">Withdrawal Verification Codes</h5>
                    <p class="text-xs text-content-muted mt-1">{{ $activeCount }} of 5 verification steps active</p>
                </div>
            </div>

            <form method="POST" action="{{ route('withdrawalcode') }}" x-data="{
                @for ($i = 1; $i <= 5; $i++)
                    code{{ $i }}_enabled: {{ $user->{"code{$i}_enabled"} ? 'true' : 'false' }}{{ $i < 5 ? ',' : '' }}
                @endfor
            }">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">

                <div class="space-y-3">
                    @for ($i = 1; $i <= 5; $i++)
                        <div class="flex items-center gap-4 p-3 rounded-lg border transition-colors"
                             :class="code{{ $i }}_enabled ? 'border-primary/30 bg-primary/5' : 'border-border bg-surface-alt/30'">

                            {{-- Toggle --}}
                            <label class="relative inline-flex items-center cursor-pointer flex-shrink-0">
                                <input type="checkbox" name="code{{ $i }}_enabled" value="1"
                                       x-model="code{{ $i }}_enabled"
                                       class="sr-only peer">
                                <div class="w-9 h-5 bg-surface-alt peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-primary"></div>
                            </label>

                            {{-- Step Number --}}
                            <span class="text-xs font-bold w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0"
                                  :class="code{{ $i }}_enabled ? 'bg-primary text-primary-foreground' : 'bg-surface-alt text-content-muted'">
                                {{ $i }}
                            </span>

                            {{-- Label Input --}}
                            <div class="flex-1 min-w-0">
                                <input type="text" name="code{{ $i }}_label"
                                       value="{{ $user->{"code{$i}_label"} ?: $defaultLabels[$i] }}"
                                       placeholder="Step label"
                                       :disabled="!code{{ $i }}_enabled"
                                       class="w-full bg-transparent border-0 border-b border-border px-0 py-1 text-sm text-content placeholder-content-muted focus:outline-none focus:border-primary disabled:opacity-40">
                            </div>

                            {{-- Code Value Input --}}
                            <div class="w-36 flex-shrink-0">
                                <input type="text" name="code{{ $i }}"
                                       value="{{ $user->{"code{$i}"} }}"
                                       placeholder="Code value"
                                       :disabled="!code{{ $i }}_enabled"
                                       class="w-full bg-surface-card border border-border rounded-lg px-3 py-1.5 text-sm text-content font-mono tracking-wide placeholder-content-muted focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary disabled:opacity-40 disabled:cursor-not-allowed">
                            </div>

                            {{-- Status Badge --}}
                            <template x-if="code{{ $i }}_enabled">
                                <span class="text-xs font-medium px-2 py-0.5 rounded-full bg-success-light text-success flex-shrink-0">Active</span>
                            </template>
                            <template x-if="!code{{ $i }}_enabled">
                                <span class="text-xs font-medium px-2 py-0.5 rounded-full bg-surface-alt text-content-muted flex-shrink-0">Disabled</span>
                            </template>
                        </div>
                    @endfor
                </div>

                <div class="mt-4 flex justify-end">
                    <button type="submit" class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" /></svg>
                        Save Verification Settings
                    </button>
                </div>
            </form>
        </x-admin.card>

        {{-- Per-user broker withdrawal commission --}}
        <x-admin.card>
            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3 mb-5">
                <div>
                    <h5 class="text-sm font-semibold text-content-secondary uppercase tracking-wider">Broker Withdrawal Commission</h5>
                    <p class="text-xs text-content-muted mt-1">Shown as the final requirement in this user's withdrawal flow. Existing withdrawals keep the settings captured when they were created.</p>
                </div>
                @if ($user->broker_commission_enabled)
                    <x-admin.badge type="success">Enabled</x-admin.badge>
                @else
                    <x-admin.badge type="danger">Disabled</x-admin.badge>
                @endif
            </div>

            <form method="POST" action="{{ route('admin.users.broker-commission') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">

                <label class="inline-flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="broker_commission_enabled" value="1"
                        {{ old('broker_commission_enabled', $user->broker_commission_enabled) ? 'checked' : '' }}
                        class="w-4 h-4 rounded border-border text-primary focus:ring-primary/30">
                    <span class="text-sm font-medium text-content">Require broker commission for this user's withdrawals</span>
                </label>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-admin.form-group label="Commission Amount" for="broker_commission_amount" helper="Amount is denominated in the selected cryptocurrency.">
                        <input type="number" id="broker_commission_amount" name="broker_commission_amount" min="0.00000001" step="0.00000001"
                            value="{{ old('broker_commission_amount', $user->broker_commission_amount) }}"
                            class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                        @error('broker_commission_amount')<p class="mt-1 text-xs text-danger">{{ $message }}</p>@enderror
                    </x-admin.form-group>

                    <x-admin.form-group label="Cryptocurrency" for="broker_commission_currency">
                        <select id="broker_commission_currency" name="broker_commission_currency"
                            class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                            <option value="">Select currency</option>
                            @foreach ($commissionCurrencies as $currency)
                                <option value="{{ $currency }}" {{ old('broker_commission_currency', $user->broker_commission_currency) === $currency ? 'selected' : '' }}>{{ $currency }}</option>
                            @endforeach
                        </select>
                        @error('broker_commission_currency')<p class="mt-1 text-xs text-danger">{{ $message }}</p>@enderror
                    </x-admin.form-group>
                </div>

                <x-admin.form-group label="Receiving Wallet Address" for="broker_commission_wallet">
                    <input type="text" id="broker_commission_wallet" name="broker_commission_wallet" maxlength="191"
                        value="{{ old('broker_commission_wallet', $user->broker_commission_wallet) }}"
                        class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm font-mono text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                    @error('broker_commission_wallet')<p class="mt-1 text-xs text-danger">{{ $message }}</p>@enderror
                </x-admin.form-group>

                <x-admin.form-group label="Payment Instructions (Optional)" for="broker_commission_note">
                    <input type="text" id="broker_commission_note" name="broker_commission_note" maxlength="255"
                        value="{{ old('broker_commission_note', $user->broker_commission_note) }}"
                        class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                </x-admin.form-group>

                <div class="flex justify-end">
                    <button type="submit" class="bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                        Save Commission Settings
                    </button>
                </div>
            </form>
        </x-admin.card>

        {{-- Connected Wallets --}}
        <x-admin.card>
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-sm font-semibold text-content-secondary uppercase tracking-wider">Connected Wallets</h5>
                @if ($wallets->count() > 0)
                    <span class="text-xs text-content-muted">{{ $wallets->count() }} wallet{{ $wallets->count() !== 1 ? 's' : '' }}</span>
                @endif
            </div>

            @if ($wallets->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-surface-alt">
                                <th class="px-4 py-2.5 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Wallet</th>
                                <th class="px-4 py-2.5 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Status</th>
                                <th class="px-4 py-2.5 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Connected</th>
                                <th class="px-4 py-2.5 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-border">
                            @foreach ($wallets as $wallet)
                                @php
                                    $slug = \Illuminate\Support\Str::slug($wallet->wallet_name);
                                    $logoPath = 'img/wallets/' . $slug . '.svg';
                                    $hasLogo = file_exists(public_path($logoPath));
                                @endphp
                                <tr class="hover:bg-surface-alt/50 transition-colors">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg overflow-hidden bg-surface-alt flex items-center justify-center flex-shrink-0">
                                                <img src="{{ asset($hasLogo ? $logoPath : 'img/wallets/generic.svg') }}" alt="{{ $wallet->wallet_name }}" class="w-8 h-8">
                                            </div>
                                            <span class="text-sm font-medium text-content">{{ $wallet->wallet_name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <x-admin.badge type="success">Active</x-admin.badge>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-content-secondary">
                                        {{ $wallet->created_at->format('M d, Y H:i') }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <button
                                            onclick="Swal.fire({ title: 'Disconnect wallet?', text: 'This will remove {{ $wallet->wallet_name }} from {{ $user->name }}\'s account.', icon: 'warning', showCancelButton: true, confirmButtonColor: 'rgb(220,38,38)', confirmButtonText: 'Yes, disconnect' }).then((result) => { if(result.isConfirmed) window.location.href='{{ route('admin.wallet.disconnect', $wallet->id) }}' })"
                                            class="bg-danger text-white hover:bg-danger/90 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors inline-flex items-center gap-1">
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.181 8.68a4.503 4.503 0 0 1 1.903 6.405m-9.768-2.782L3.56 14.06a4.5 4.5 0 0 0 6.364 6.365l.552-.552m0 0L14.06 16.29m0 0-2.122-2.122m2.122 2.122L16.29 14.06m-7.071-7.071 2.122 2.122M7.757 7.757 6 6" /></svg>
                                            Disconnect
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-6">
                    <p class="text-sm text-content-muted">No wallets connected</p>
                </div>
            @endif
        </x-admin.card>
    </div>

    @include('admin.Users.users_actions')
@endsection
