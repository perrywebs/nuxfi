@extends('layouts.admin-dash')
@section('title', 'Add Signal Payment Method')
@section('content')

    <x-admin.page-header title="Add Signal Payment Method" subtitle="Add a cryptocurrency wallet that users can pay signal subscriptions to.">
        <x-slot name="actions">
            <a href="{{ route('signal-payment-methods.index') }}" class="inline-flex items-center gap-1.5 bg-surface-alt text-content hover:bg-surface-alt/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors border border-border">
                Back to methods
            </a>
        </x-slot>
    </x-admin.page-header>

    <div class="mt-6 max-w-2xl">
        <x-admin.card>
            <form action="{{ route('signal-payment-methods.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.signals.payment-methods._form', ['submitLabel' => 'Create Payment Method'])
            </form>
        </x-admin.card>
    </div>

@endsection
