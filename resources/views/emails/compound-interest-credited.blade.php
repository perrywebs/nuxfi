@extends('emails.layouts.master')

@section('preheader'){{ \App\Helpers\CurrencyHelper::formatForUser($credit->amount, $user) }} was added to your Compound Interest investment record.@endsection

@section('greeting')Hello {{ $user->name }},@endsection

@section('content')
    <h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">Compound Interest Top-up Added</h2>

    <p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
        An interest top-up of <strong>{{ \App\Helpers\CurrencyHelper::formatForUser($credit->amount, $user) }}</strong> has
        been added to the accumulated interest record for compound investment
        <strong>{{ $investment->reference }}</strong>. It remains in the investment record and will transfer to
        <strong>Total Profit</strong> only after an administrator completes the investment.
    </p>

    @include('emails.partials.transaction-details', ['details' => [
        ['label' => 'Reference', 'value' => $investment->reference],
        ['label' => 'Top-up Amount', 'value' => '<span style="color: #059669; font-weight: 600;">' . \App\Helpers\CurrencyHelper::formatForUser($credit->amount, $user) . '</span>'],
        ['label' => 'Starting Amount', 'value' => \App\Helpers\CurrencyHelper::formatForUser($investment->starting_amount, $user)],
        ['label' => 'Payment Method', 'value' => trim(($investment->payment_currency ?: $investment->payment_method) . ($investment->payment_network ? ' / ' . $investment->payment_network : ''))],
        ['label' => ['monthly' => 'Monthly', 'weekly' => 'Weekly', 'daily' => 'Daily'][$investment->duration_unit] . ' Return', 'value' => number_format($investment->period_return_rate, 2) . '%'],
        ['label' => 'Duration', 'value' => $investment->durationLabel()],
        ['label' => 'Accumulated Interest', 'value' => \App\Helpers\CurrencyHelper::formatForUser($investment->total_interest_credited, $user)],
        ['label' => 'Top-up Admin', 'value' => $credit->credited_by_name],
        ['label' => 'Recurring Top-up', 'value' => \App\Helpers\CurrencyHelper::formatForUser($investment->recurring_topup, $user)],
        ['label' => 'Credited On', 'value' => optional($credit->credited_at)->format('M d, Y H:i') ?? now()->format('M d, Y H:i')],
        ['label' => 'Status', 'value' => ucfirst($investment->status)],
    ]])

    @if ($credit->note)
        <p style="margin: 16px 0 0; font-size: 14px; line-height: 1.6; color: #4B5563;">
            <strong>Note from our team:</strong> {{ $credit->note }}
        </p>
    @endif

    <p style="margin: 16px 0 0; font-size: 15px; line-height: 1.6; color: #374151;">
        You can review every credit and the status of this investment on your dashboard.
    </p>
@endsection

@section('action')
    @include('emails.partials.button', ['url' => url('dashboard/compound-investments/' . $investment->id), 'label' => 'View Investment'])
@endsection

@section('signoff')Thank you for investing with {{ $settings->site_name ?? config('app.name') }}@endsection
