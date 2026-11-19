@extends('layouts.admin-dash')
@section('title', 'Signal Payment Wallets')
@section('content')

    <x-admin.page-header title="Signal Payment Wallets" subtitle="Configure the cryptocurrency wallets shown to users on the signal payment page.">
        <x-slot name="actions">
            <a href="{{ route('signal-payment-methods.create') }}" class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                Add Payment Method
            </a>
        </x-slot>
    </x-admin.page-header>

    @if(session('success'))
        <div class="mt-4"><x-admin.alert type="success" :dismissible="true">{{ session('success') }}</x-admin.alert></div>
    @endif
    @if(session('message'))
        <div class="mt-4"><x-admin.alert type="danger" :dismissible="true">{{ session('message') }}</x-admin.alert></div>
    @endif

    <div class="mt-4">
        <x-admin.alert type="info" :dismissible="true">
            Only <strong>active</strong> methods with a wallet address are shown on the user payment page.
            A QR code is generated automatically from the wallet address; upload a custom QR image to override it.
            Methods used by existing payment records are archived instead of permanently deleted.
        </x-admin.alert>
    </div>

    <div class="mt-6">
        <x-admin.table-card title="Configured Payment Methods">
            <table class="w-full text-sm text-left">
                <thead>
                    <tr class="bg-surface-alt text-content-muted text-xs uppercase tracking-wide">
                        <th class="px-5 py-3 font-medium">#</th>
                        <th class="px-5 py-3 font-medium">Name</th>
                        <th class="px-5 py-3 font-medium">Currency / Network</th>
                        <th class="px-5 py-3 font-medium">Wallet Address</th>
                        <th class="px-5 py-3 font-medium">QR</th>
                        <th class="px-5 py-3 font-medium">Payments</th>
                        <th class="px-5 py-3 font-medium">Status</th>
                        <th class="px-5 py-3 font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse($methods as $method)
                        <tr class="hover:bg-surface-alt/50 transition-colors align-top">
                            <td class="px-5 py-3 text-content">{{ $loop->iteration }}</td>
                            <td class="px-5 py-3">
                                <p class="text-content font-medium">{{ $method->name }}</p>
                                @if($method->instructions)
                                    <p class="text-xs text-content-muted max-w-[260px]">{{ \Illuminate\Support\Str::limit($method->instructions, 90) }}</p>
                                @endif
                            </td>
                            <td class="px-5 py-3">
                                <p class="text-content">{{ $method->currency ?: '—' }}</p>
                                <p class="text-xs text-content-muted">{{ $method->network ?: '—' }}</p>
                            </td>
                            <td class="px-5 py-3 max-w-[220px]">
                                <p class="font-mono text-xs text-content-secondary break-all">{{ $method->wallet_address ?: '—' }}</p>
                            </td>
                            <td class="px-5 py-3">
                                @if($method->qr_code)
                                    <span class="inline-flex items-center gap-1 text-xs text-success font-medium">Uploaded</span>
                                @else
                                    <span class="text-xs text-content-muted">Auto-generated</span>
                                @endif
                            </td>
                            <td class="px-5 py-3 text-content">{{ $method->payments_count }}</td>
                            <td class="px-5 py-3">
                                <x-admin.badge :type="$method->is_active ? 'success' : 'danger'">
                                    {{ $method->is_active ? 'Enabled' : 'Disabled' }}
                                </x-admin.badge>
                            </td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <a href="{{ route('signal-payment-methods.edit', $method->id) }}" class="inline-flex items-center gap-1 text-sm font-medium text-primary hover:text-primary-hover transition-colors">
                                        Edit
                                    </a>
                                    <form action="{{ route('signal-payment-methods.toggle', $method->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-sm font-medium text-warning hover:text-warning/80 transition-colors">
                                            {{ $method->is_active ? 'Disable' : 'Enable' }}
                                        </button>
                                    </form>
                                    <form action="{{ route('signal-payment-methods.destroy', $method->id) }}" method="POST" class="inline"
                                          onsubmit="return confirm('{{ $method->payments_count > 0 ? 'This method is used by existing payment records and will be archived instead of deleted. Continue?' : 'Delete this payment method?' }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm font-medium text-danger hover:text-danger/80 transition-colors">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-5 py-10 text-center text-content-muted">
                                No signal payment methods configured yet.
                                <a href="{{ route('signal-payment-methods.create') }}" class="text-primary font-medium hover:underline">Add your first method</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @if($methods->hasPages())
                <div class="px-5 py-4 border-t border-border">
                    {{ $methods->links() }}
                </div>
            @endif
        </x-admin.table-card>
    </div>

@endsection
