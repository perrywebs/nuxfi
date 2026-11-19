@extends('layouts.admin-dash')
@section('title', 'Edit Signal Payment Method')
@section('content')

    <x-admin.page-header title="Edit Signal Payment Method" subtitle="Update the wallet details shown to users on the signal payment page.">
        <x-slot name="actions">
            <a href="{{ route('signal-payment-methods.index') }}" class="inline-flex items-center gap-1.5 bg-surface-alt text-content hover:bg-surface-alt/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors border border-border">
                Back to methods
            </a>
        </x-slot>
    </x-admin.page-header>

    <div class="mt-6 max-w-2xl">
        <x-admin.card>
            <form action="{{ route('signal-payment-methods.update', $method->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.signals.payment-methods._form', ['submitLabel' => 'Update Payment Method'])
            </form>
        </x-admin.card>
    </div>

@endsection
