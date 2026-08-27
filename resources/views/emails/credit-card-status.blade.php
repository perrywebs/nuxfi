@extends('emails.layouts.master')

@section('preheader')Credit card application update — {{ $card->reference_number }}@endsection

@section('greeting')Hello {{ $user->username }},@endsection

@section('content')
    <h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">{{ $subjectText }}</h2>

    <p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
        @if ($card->status === \App\Models\Card::STATUS_REQUESTED)
            We have received your credit card request. Our team will review your application and keep you updated at every step.
        @elseif ($card->status === \App\Models\Card::STATUS_APPROVED)
            Good news! Your credit card request has been <span style="color: #059669; font-weight: 600;">approved</span>. We are now preparing your card for shipment.
        @elseif ($card->status === \App\Models\Card::STATUS_DENIED)
            Unfortunately your credit card request was <span style="color: #DC2626; font-weight: 600;">denied</span>.
            @if ($card->isRefunded())
                The application fee of <strong>{{ \App\Helpers\CurrencyHelper::formatForUser($card->fee, $user) }}</strong> has been refunded to your account.
            @endif
        @elseif ($card->status === \App\Models\Card::STATUS_SHIPPED)
            Your credit card has been <span style="color: #2563EB; font-weight: 600;">shipped</span> and is on its way to your delivery address.
        @elseif ($card->status === \App\Models\Card::STATUS_DELIVERED)
            Your credit card has been <span style="color: #059669; font-weight: 600;">delivered</span>. You can now activate and start using it.
        @endif
    </p>

    @include('emails.partials.transaction-details', ['details' => [
        ['label' => 'Application #', 'value' => $card->reference_number],
        ['label' => 'Status', 'value' => $card->statusLabel()],
        ['label' => 'Amount Charged', 'value' => \App\Helpers\CurrencyHelper::formatForUser($card->fee, $user)],
        ['label' => 'Delivery Address', 'value' => nl2br(e($card->delivery_address))],
    ]])

    @if ($card->status === \App\Models\Card::STATUS_REQUESTED)
        <p style="margin: 16px 0 0; font-size: 15px; line-height: 1.6; color: #374151;">
            You can track the status of your application anytime from your dashboard. Thank you for choosing {{ $settings->site_name ?? config('app.name') }}.
        </p>
    @endif
@endsection
