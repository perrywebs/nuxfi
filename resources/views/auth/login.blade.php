@extends('layouts.guest1')
@section('title', 'Login account')
@section('styles')
<style>
    .auth-segment-button {
        transition: all 0.25s ease;
    }
    .auth-segment-button-active {
        box-shadow: 0 10px 35px rgba(14, 165, 233, 0.18);
    }
</style>
@endsection
@section('content')

<div class="w-full max-w-lg mx-auto">
    {{-- Logo --}}
    <div class="text-center mb-8">
        <a href="/">
            <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="{{ $settings->site_name }}" class="h-12 mx-auto">
        </a>
    </div>

    {{-- Segmented navigation --}}
    <div class="mb-6  shadow-[0_0_35px_rgba(14,165,233,0.12)] rounded-xl">
        <div class="flex rounded-xl border border-surface-border bg-surface-overlay p-1 shadow-[0_0_35px_rgba(14,165,233,0.12)]">
            <a href="{{ route('login') }}"
               class="auth-segment-button flex-1 text-center rounded-xl px-4 py-3 text-sm font-semibold text-content-primary bg-surface-raised border border-cyan-400 text-white auth-segment-button-active">
                Sign in
            </a>
            <a href="{{ route('register') }}"
               class="auth-segment-button flex-1 text-center rounded-xl px-4 py-3 text-sm font-semibold text-content-tertiary hover:text-content-primary transition-colors">
                Register
            </a>
        </div>
    </div>

    {{-- Card --}}
    <div class="bg-[#090c11] border border-surface-border rounded-[32px] p-8 shadow-[0_20px_80px_rgba(0,0,0,0.24)]">
        {{-- Status Alert --}}
        @if (Session::has('status'))
            <div class="mb-6 flex items-start gap-3 p-4 rounded-3xl bg-blue-500/10 border border-blue-500/20">
                <svg class="w-5 h-5 text-blue-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-sm text-blue-300">{{ session('status') }}</p>
            </div>
        @endif

        <h1 class="text-3xl font-semibold text-content-primary mb-1">Sign In</h1>
        <p class="text-content-tertiary text-sm mb-8">Enter your credentials to access your account.</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-5">
                <label class="block text-sm font-semibold text-content-primary mb-2">E-mail</label>
                <input type="text" name="email" value="{{ old('email') }}" required
                    placeholder="example@example.com"
                    class="w-full bg-[#111827] border border-surface-border rounded-2xl px-4 py-3 text-content-primary placeholder:text-content-tertiary focus:outline-none focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/20 transition-colors">
                @error('email')
                    <p class="mt-2 text-sm text-loss">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-6">
                <label class="block text-sm font-semibold text-content-primary mb-2">Password</label>
                <input type="password" name="password" required
                    placeholder="Enter your password"
                    class="w-full bg-[#111827] border border-surface-border rounded-2xl px-4 py-3 text-content-primary placeholder:text-content-tertiary focus:outline-none focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/20 transition-colors">
                @error('password')
                    <p class="mt-2 text-sm text-loss">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <button type="submit"
                class="w-full bg-[#0b1222] border border-cyan-400 text-cyan-200 font-semibold py-3 rounded-2xl hover:bg-[#0f172a] hover:text-cyan-100 transition-all shadow-[0_0_25px_rgba(56,189,248,0.18)] focus:outline-none focus:ring-2 focus:ring-cyan-400/30">
                Sign in
            </button>
        </form>

        {{-- Links --}}
        <div class="mt-6 space-y-3 text-sm">
            <p><a href="{{ route('password.request') }}" class="text-primary-light hover:text-primary transition-colors">Forgot password?</a></p>
            <p class="text-content-tertiary">Don't have an account? <a href="{{ route('register') }}" class="text-primary-light hover:text-primary transition-colors">Register Here</a></p>
        </div>
    </div>
</div>

@endsection
