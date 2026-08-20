@php
    $score = Auth::user()->trade_signal ?? 0;
    if ($score >= 81) {
        $tierLabel = 'Very Strong Progress';
        $tierColor = 'gain';
        $tierMessage = 'Very strong Progress! Excellent conditions for trading opportunities.';
        $tierGradient = 'linear-gradient(90deg, #22C55E, #10B981)';
    } elseif ($score >= 61) {
        $tierLabel = 'Strong Progress';
        $tierColor = 'info';
        $tierMessage = 'Strong Progress. Good conditions for new positions.';
        $tierGradient = 'linear-gradient(90deg, #3B82F6, #60A5FA)';
    } elseif ($score >= 31) {
        $tierLabel = 'Moderate Progress';
        $tierColor = 'warning';
        $tierMessage = 'Moderate Progress. Proceed with caution on new positions.';
        $tierGradient = 'linear-gradient(90deg, #F59E0B, #FBBF24)';
    } else {
        $tierLabel = 'Weak Progress';
        $tierColor = 'loss';
        $tierMessage = 'Weak Progress. Consider waiting for better conditions.';
        $tierGradient = 'linear-gradient(90deg, #EF4444, #F87171)';
    }
@endphp

<div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden">
    <div class="p-5">
        {{-- Header Row: Icon + Title + Score + Badge --}}
        <div class="flex items-center justify-between gap-3 mb-4">
            <div class="flex items-center gap-3 min-w-0">
                <x-icon name="signal" class="w-5 h-5 text-primary flex-shrink-0" />
                <h3 class="text-sm font-semibold text-content-primary leading-tight">Trade Progress</h3>
            </div>
            <div class="flex items-center gap-3 flex-shrink-0">
                <span class="text-2xl font-bold text-content-primary">{{ $score }}%</span>
                <span class="px-2.5 py-1 rounded-lg text-[11px] font-bold bg-{{ $tierColor }}/10 text-{{ $tierColor }}">
                    {{ $tierLabel }}
                </span>
            </div>
        </div>

        {{-- Progress Bar --}}
        <div class="w-full h-3 rounded-full bg-surface-overlay overflow-hidden mb-2">
            <div class="h-full rounded-full transition-all duration-500"
                 style="width: {{ $score }}%; background: {{ $tierGradient }};"></div>
        </div>

        {{-- Scale Labels --}}
        <div class="flex items-center justify-between text-xs text-content-secondary mb-3">
            <span>0% Weak</span>
            <span>50% Moderate</span>
            <span>100% Max</span>
        </div>

        {{-- Tier Message --}}
        <p class="text-sm text-content-secondary text-center">
            {{ $tierMessage }}
        </p>
    </div>
</div>