@extends('layouts.admin-dash')
@section('title', 'Card Management')

@section('content')

<div class="space-y-6">

    @if (session('success'))
        <x-admin.alert type="success" :dismissible="true">{{ session('success') }}</x-admin.alert>
    @endif
    @if (session('error') || session('message'))
        <x-admin.alert type="danger" :dismissible="true">{{ session('error') ?? session('message') }}</x-admin.alert>
    @endif

    <x-admin.page-header
        title="Card Management"
        subtitle="Review and process credit card applications."
    >
        <form method="GET" action="{{ route('admin.cards.index') }}" class="flex items-center gap-2">
            <select name="status"
                    class="rounded-lg border border-border bg-surface px-3 py-2 text-sm text-content focus:outline-none focus:border-primary">
                <option value="">All Statuses</option>
                @foreach (App\Models\Card::statusLabels() as $key => $label)
                    <option value="{{ $key }}" {{ request('status') == $key ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Search ref / name / email"
                   class="rounded-lg border border-border bg-surface px-3 py-2 text-sm text-content focus:outline-none focus:border-primary w-56">
            <button type="submit"
                    class="rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-content-inverse hover:bg-primary-dark transition">
                Filter
            </button>
        </form>
    </x-admin.page-header>

    <x-admin.table-card title="Applications ({{ $cards->total() }})">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-surface-alt text-left text-xs font-medium uppercase tracking-wide text-content-muted">
                        <th class="px-4 py-3 border-b border-border">Reference</th>
                        <th class="px-4 py-3 border-b border-border">Customer</th>
                        <th class="px-4 py-3 border-b border-border">Email</th>
                        <th class="px-4 py-3 border-b border-border">Fee</th>
                        <th class="px-4 py-3 border-b border-border">Delivery Address</th>
                        <th class="px-4 py-3 border-b border-border">Requested</th>
                        <th class="px-4 py-3 border-b border-border">Status</th>
                        <th class="px-4 py-3 border-b border-border text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cards as $card)
                        @php
                            $badgeType = match($card->status) {
                                'requested' => 'warning',
                                'approved'  => 'info',
                                'denied'    => 'danger',
                                'shipped'   => 'info',
                                'delivered' => 'success',
                                default     => 'neutral',
                            };
                        @endphp
                        <tr class="border-b border-border last:border-0 hover:bg-surface-alt/50 transition-colors">
                            <td class="px-4 py-3 font-mono text-content">{{ $card->reference_number }}</td>
                            <td class="px-4 py-3 text-content">{{ $card->user->name ?? 'N/A' }}</td>
                            <td class="px-4 py-3 text-content-secondary">{{ $card->user->email ?? 'N/A' }}</td>
                            <td class="px-4 py-3 text-content">@money($card->fee, $card->user)</td>
                            <td class="px-4 py-3 text-content-secondary max-w-xs">
                                {{ \Illuminate\Support\Str::limit($card->delivery_address, 60) }}
                            </td>
                            <td class="px-4 py-3 text-content-secondary">{{ $card->created_at->format('M d, Y') }}</td>
                            <td class="px-4 py-3">
                                <x-admin.badge :type="$badgeType">{{ $card->statusLabel() }}</x-admin.badge>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex flex-wrap items-center justify-end gap-2">
                                    @if ($card->status === 'requested')
                                        <form action="{{ route('admin.cards.approve', $card) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit"
                                                class="rounded-lg bg-success-light px-3 py-1.5 text-xs font-medium text-success hover:opacity-80 transition">
                                                Approve
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.cards.deny', $card) }}" method="POST" class="inline"
                                              onsubmit="return confirm('Deny this application and refund the fee?');">
                                            @csrf
                                            <button type="submit"
                                                class="rounded-lg bg-danger-light px-3 py-1.5 text-xs font-medium text-danger hover:opacity-80 transition">
                                                Deny
                                            </button>
                                        </form>
                                    @elseif ($card->status === 'approved')
                                        <form action="{{ route('admin.cards.ship', $card) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit"
                                                class="rounded-lg bg-info-light px-3 py-1.5 text-xs font-medium text-info hover:opacity-80 transition">
                                                Mark Shipped
                                            </button>
                                        </form>
                                    @elseif ($card->status === 'shipped')
                                        <form action="{{ route('admin.cards.deliver', $card) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit"
                                                class="rounded-lg bg-success-light px-3 py-1.5 text-xs font-medium text-success hover:opacity-80 transition">
                                                Mark Delivered
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-xs text-content-muted">—</span>
                                    @endif

                                    <a href="{{ route('admin.cards.show', $card) }}"
                                       class="rounded-lg border border-border px-3 py-1.5 text-xs font-medium text-content-secondary hover:border-surface-border hover:text-content-primary transition">
                                        View
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-4 py-10 text-center text-content-muted">No card applications found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $cards->links() }}
        </div>
    </x-admin.table-card>
</div>

@endsection
