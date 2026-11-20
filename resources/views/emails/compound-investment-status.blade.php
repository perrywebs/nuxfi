@extends('emails.layouts.master')

@php
    $headings = [
        'submitted' => 'Investment Request Received',
        'approved' => 'Investment Request Approved',
        'rejected' => 'Investment Request Declined',
        'activated' => 'Your Investment Is Now Active',
        'completed' => 'Compound Investment Completed',
        'reopened' => 'Compound Investment Reopened',
    ];
    $messages = [
        'submitted' => 'We have received your compound investment request and our team will review your payment shortly.',
        'approved' => 'Your compound investment request has been approved and is active.',
        'rejected' => 'Unfortunately your compound investment request could not be approved.',
        'activated' => 'Your compound investment is now active. Admin-approved top-ups will accumulate in the investment record and transfer to Total Profit when the investment is completed.',
        'completed' => 'Your compound investment has been completed. The accumulated interest has been transferred to Total Profit, and your full top-up history remains available on your dashboard.',
        'reopened' => 'Your compound investment has been reopened and can receive interest credits again.',
    ];
@endphp

@section('preheader'){{ $messages[$type] ?? 'Compound investment update' }}@endsection

@section('greeting')Hello {{ $user->name }},@endsection

@section('content')
    <h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">{{ $headings[$type] ?? 'Compound Investment Update' }}</h2>

    <p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
        {{ $messages[$type] ?? 'There is an update on your compound investment.' }}
    </p>

    @include('emails.partials.transaction-details', ['details' => array_values(array_filter([
        ['label' => 'Reference', 'value' => $investment->reference],
        ['label' => 'Status', 'value' => $investment->statusLabel()],
        ['label' => 'Starting Amount', 'value' => \App\Helpers\CurrencyHelper::formatForUser($investment->starting_amount, $user)],
        ['label' => 'Payment Method', 'value' => trim(($investment->payment_currency ?: $investment->payment_method) . ($investment->payment_network ? ' / ' . $investment->payment_network : ''))],
        ['label' => ['monthly' => 'Monthly', 'weekly' => 'Weekly', 'daily' => 'Daily'][$investment->duration_unit] . ' Return', 'value' => number_format($investment->period_return_rate, 2) . '%'],
        ['label' => 'Duration', 'value' => $investment->durationLabel()],
        ['label' => 'Frequency', 'value' => ['monthly' => 'Monthly', 'weekly' => 'Weekly', 'daily' => 'Daily'][$investment->recurring_frequency]],
        ['label' => 'Recurring Top-up', 'value' => \App\Helpers\CurrencyHelper::formatForUser($investment->recurring_topup, $user)],
        ['label' => 'Projected Final Value', 'value' => \App\Helpers\CurrencyHelper::formatForUser($investment->projected_final_amount, $user)],
        ['label' => 'Interest Accumulated in Investment', 'value' => \App\Helpers\CurrencyHelper::formatForUser($investment->total_interest_credited, $user)],
        $type === 'completed' ? ['label' => 'Interest Transferred To Total Profit', 'value' => \App\Helpers\CurrencyHelper::formatForUser($amountCredited, $user)] : null,
        $type === 'completed' ? ['label' => 'Total Transferred To Date', 'value' => \App\Helpers\CurrencyHelper::formatForUser($investment->total_interest_transferred, $user)] : null,
        $type === 'completed' ? ['label' => 'Updated Total Profit Balance', 'value' => \App\Helpers\CurrencyHelper::formatForUser($investment->total_profit_after_completion, $user)] : null,
        $type === 'completed' ? ['label' => 'Completed By', 'value' => $investment->completed_by_name ?: 'Administrator'] : null,
        $type === 'completed' && $investment->completed_at ? ['label' => 'Completion Date', 'value' => $investment->completed_at->format('M d, Y H:i')] : null,
        $type === 'rejected' ? ['label' => 'Reason', 'value' => $reason ?: 'Not provided'] : null,
        $investment->start_date ? ['label' => 'Start Date', 'value' => $investment->start_date->format('M d, Y')] : null,
        $investment->end_date ? ['label' => 'End Date', 'value' => $investment->end_date->format('M d, Y')] : null,
    ]))])

    <p style="margin: 16px 0 0; font-size: 15px; line-height: 1.6; color: #374151;">
        You can view the full history of this investment from your dashboard at any time.
    </p>
@endsection

@section('action')
    @include('emails.partials.button', ['url' => url('dashboard/compound-investments/' . $investment->id), 'label' => 'View Investment'])
@endsection

@section('signoff')Thank you for using {{ $settings->site_name ?? config('app.name') }}@endsection
