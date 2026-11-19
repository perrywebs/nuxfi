@extends('layouts.admin-dash')
@section('title', 'Signal Payments')
@section('content')

    <x-admin.page-header title="Signal Subscription Payments" subtitle="Review, approve or reject manual cryptocurrency payments for signal plans.">
        <x-slot name="actions">
            <a href="{{ route('signal-payment-methods.index') }}" class="inline-flex items-center gap-1.5 bg-surface-card border border-border text-content hover:bg-surface-alt rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3" /></svg>
                Payment Wallets
            </a>
        </x-slot>
    </x-admin.page-header>

    @if(session('success'))
        <div class="mt-4"><x-admin.alert type="success" :dismissible="true">{{ session('success') }}</x-admin.alert></div>
    @endif
    @if(session('message'))
        <div class="mt-4"><x-admin.alert type="danger" :dismissible="true">{{ session('message') }}</x-admin.alert></div>
    @endif

    {{-- Stats --}}
    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <x-admin.stat-card label="Pending" :value="$stats['pending']" />
        <x-admin.stat-card label="Approved" :value="$stats['approved']" />
        <x-admin.stat-card label="Rejected" :value="$stats['rejected']" />
        <x-admin.stat-card label="Pending Amount" :value="$currency . number_format($stats['pending_amount'], 2)" />
    </div>

    {{-- Filters --}}
    <div class="mt-6 bg-surface-card rounded-xl border border-border shadow-card p-4">
        <form method="GET" action="{{ route('signal-payments.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">
            <div class="lg:col-span-2">
                <label class="block text-xs font-medium text-content-muted mb-1">Search</label>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="User name, email, ID, plan or TXID"
                       class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
            </div>
            <div>
                <label class="block text-xs font-medium text-content-muted mb-1">Status</label>
                <select name="status" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                    <option value="all" {{ $status === 'all' ? 'selected' : '' }}>All statuses</option>
                    <option value="pending" {{ $status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ $status === 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ $status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-medium text-content-muted mb-1">Plan</label>
                <select name="plan_id" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                    <option value="">All plans</option>
                    @foreach($plans as $plan)
                        <option value="{{ $plan->id }}" {{ (string) request('plan_id') === (string) $plan->id ? 'selected' : '' }}>{{ $plan->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-medium text-content-muted mb-1">Payment method</label>
                <div class="flex gap-2">
                    <select name="method_id" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                        <option value="">All methods</option>
                        @foreach($methods as $method)
                            <option value="{{ $method->id }}" {{ (string) request('method_id') === (string) $method->id ? 'selected' : '' }}>{{ $method->name }}{{ $method->trashed() ? ' (archived)' : '' }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="lg:col-span-5 flex items-center gap-2">
                <button type="submit" class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                    Apply Filters
                </button>
                <a href="{{ route('signal-payments.index') }}" class="inline-flex items-center px-4 py-2 rounded-lg border border-border text-sm font-medium text-content-secondary hover:bg-surface-alt transition-colors">
                    Reset
                </a>
            </div>
        </form>
    </div>

    {{-- Table --}}
    <div class="mt-6">
        <x-admin.table-card title="Payment Requests">
            <table class="w-full text-sm text-left">
                <thead>
                    <tr class="bg-surface-alt text-content-muted text-xs uppercase tracking-wide">
                        <th class="px-5 py-3 font-medium">#</th>
                        <th class="px-5 py-3 font-medium">User</th>
                        <th class="px-5 py-3 font-medium">Plan</th>
                        <th class="px-5 py-3 font-medium">Amount</th>
                        <th class="px-5 py-3 font-medium">Method / Network</th>
                        <th class="px-5 py-3 font-medium">TXID</th>
                        <th class="px-5 py-3 font-medium">Status</th>
                        <th class="px-5 py-3 font-medium">Created</th>
                        <th class="px-5 py-3 font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse($payments as $payment)
                        <tr class="hover:bg-surface-alt/50 transition-colors align-top">
                            <td class="px-5 py-3 text-content">#{{ $payment->id }}</td>
                            <td class="px-5 py-3">
                                @if($payment->user)
                                    <p class="text-content font-medium">{{ $payment->user->name }}</p>
                                    <p class="text-xs text-content-muted">{{ $payment->user->email }}</p>
                                    <p class="text-xs text-content-muted">ID: {{ $payment->user->id }}</p>
                                @else
                                    <span class="text-content-muted">Deleted user</span>
                                @endif
                            </td>
                            <td class="px-5 py-3">
                                <p class="text-content">{{ $payment->plan_name }}</p>
                                <p class="text-xs text-content-muted">{{ $payment->duration }} {{ \Illuminate\Support\Str::plural('week', $payment->duration) }}</p>
                            </td>
                            <td class="px-5 py-3 text-content font-medium whitespace-nowrap">{{ $payment->currency }}{{ number_format($payment->amount, 2) }}</td>
                            <td class="px-5 py-3">
                                <p class="text-content">{{ $payment->payment_method_name ?: '—' }}</p>
                                @if($payment->payment_network)
                                    <p class="text-xs text-content-muted">{{ $payment->payment_network }}</p>
                                @endif
                            </td>
                            <td class="px-5 py-3 max-w-[200px]">
                                @if($payment->tx_hash)
                                    <p class="font-mono text-xs text-content-secondary break-all" title="{{ $payment->tx_hash }}">{{ \Illuminate\Support\Str::limit($payment->tx_hash, 22) }}</p>
                                @else
                                    <span class="text-xs text-content-muted">Not submitted</span>
                                @endif
                            </td>
                            <td class="px-5 py-3">
                                <x-admin.badge :type="$payment->status === 'approved' ? 'success' : ($payment->status === 'rejected' ? 'danger' : 'warning')">
                                    {{ ucfirst($payment->status) }}
                                </x-admin.badge>
                            </td>
                            <td class="px-5 py-3 text-content-secondary text-xs whitespace-nowrap">{{ $payment->created_at ? $payment->created_at->toDayDateTimeString() : '—' }}</td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('signal-payments.show', $payment->id) }}" class="inline-flex items-center gap-1 text-sm font-medium text-primary hover:text-primary-hover transition-colors">
                                        View
                                    </a>
                                    @if($payment->isPending() && $payment->tx_hash)
                                        <form action="{{ route('signal-payments.approve', $payment->id) }}" method="POST" onsubmit="return confirm('Approve this payment and activate the subscription?')">
                                            @csrf
                                            <button type="submit" class="inline-flex items-center gap-1 text-sm font-medium text-success hover:text-success/80 transition-colors">
                                                Approve
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-5 py-10 text-center text-content-muted">No signal payment requests found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @if($payments->hasPages())
                <div class="px-5 py-4 border-t border-border">
                    {{ $payments->links() }}
                </div>
            @endif
        </x-admin.table-card>
    </div>

@endsection
