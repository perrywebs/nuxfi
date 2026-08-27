@extends('layouts.admin-dash')
@section('title', 'Card Application — ' . $card->reference_number)

@section('content')

<div class="space-y-6">

    @if (session('success'))
        <x-admin.alert type="success" :dismissible="true">{{ session('success') }}</x-admin.alert>
    @endif
    @if (session('error') || session('message'))
        <x-admin.alert type="danger" :dismissible="true">{{ session('error') ?? session('message') }}</x-admin.alert>
    @endif

    <x-admin.page-header
        title="Card Application"
        subtitle="{{ $card->reference_number }}"
    >
        <a href="{{ route('admin.cards.index') }}"
           class="rounded-lg border border-border px-4 py-2 text-sm font-medium text-content-secondary hover:border-surface-border hover:text-content-primary transition">
            Back to list
        </a>
    </x-admin.page-header>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 rounded-xl bg-surface-raised border border-surface-border p-6">
            <h3 class="text-base font-semibold text-content mb-4">Application Details</h3>

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

            <dl class="space-y-3 text-sm">
                <div class="flex justify-between border-b border-border pb-3">
                    <dt class="text-content-muted">Reference</dt>
                    <dd class="font-mono text-content">{{ $card->reference_number }}</dd>
                </div>
                <div class="flex justify-between border-b border-border pb-3">
                    <dt class="text-content-muted">Customer</dt>
                    <dd class="text-content">{{ $card->user->name ?? 'N/A' }}</dd>
                </div>
                <div class="flex justify-between border-b border-border pb-3">
                    <dt class="text-content-muted">Email</dt>
                    <dd class="text-content">{{ $card->user->email ?? 'N/A' }}</dd>
                </div>
                <div class="flex justify-between border-b border-border pb-3">
                    <dt class="text-content-muted">Fee Charged</dt>
                    <dd class="text-content">@money($card->fee, $card->user)</dd>
                </div>
                <div class="flex justify-between border-b border-border pb-3">
                    <dt class="text-content-muted">Status</dt>
                    <dd><x-admin.badge :type="$badgeType">{{ $card->statusLabel() }}</x-admin.badge></dd>
                </div>
                <div class="flex justify-between border-b border-border pb-3">
                    <dt class="text-content-muted">Refunded</dt>
                    <dd class="text-content">{{ $card->isRefunded() ? 'Yes' : 'No' }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-content-muted">Requested</dt>
                    <dd class="text-content">{{ $card->created_at->format('M d, Y H:i') }}</dd>
                </div>
            </dl>

            <div class="mt-5">
                <p class="text-xs font-medium uppercase tracking-wide text-content-muted mb-1.5">Delivery Address</p>
                <p class="text-sm text-content whitespace-pre-line">{{ $card->delivery_address }}</p>
            </div>
        </div>

        <div class="rounded-xl bg-surface-raised border border-surface-border p-6">
            <h3 class="text-base font-semibold text-content mb-4">Actions</h3>

            <div class="space-y-3">
                @if ($card->status === 'requested')
                    <form action="{{ route('admin.cards.approve', $card) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full rounded-lg bg-success-light px-4 py-2.5 text-sm font-semibold text-success hover:opacity-80 transition">
                            Approve Application
                        </button>
                    </form>
                    <form action="{{ route('admin.cards.deny', $card) }}" method="POST"
                          onsubmit="return confirm('Deny this application and refund the fee?');">
                        @csrf
                        <button type="submit"
                            class="w-full rounded-lg bg-danger-light px-4 py-2.5 text-sm font-semibold text-danger hover:opacity-80 transition">
                            Deny &amp; Refund
                        </button>
                    </form>
                @elseif ($card->status === 'approved')
                    <form action="{{ route('admin.cards.ship', $card) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full rounded-lg bg-info-light px-4 py-2.5 text-sm font-semibold text-info hover:opacity-80 transition">
                            Mark as Shipped
                        </button>
                    </form>
                @elseif ($card->status === 'shipped')
                    <form action="{{ route('admin.cards.deliver', $card) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full rounded-lg bg-success-light px-4 py-2.5 text-sm font-semibold text-success hover:opacity-80 transition">
                            Mark as Delivered
                        </button>
                    </form>
                @else
                    <p class="text-sm text-content-muted">No further actions available for this application.</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
