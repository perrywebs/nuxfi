@extends('layouts.dash1')
@section('title', 'Compound Interest')
@section('content')

    <style>
        #ci-app .ci-take-active {
            background: linear-gradient(90deg, #22d3ee, #818cf8);
            color: #06121a;
            border-color: transparent;
        }

        #ci-app .ci-pill-active {
            background-color: rgba(34, 211, 238, .15);
            color: #a5f3fc;
            border-color: rgba(34, 211, 238, .4);
        }

        #ci-app .ci-chart-tooltip {
            display: none;
            position: absolute;
            z-index: 10;
            pointer-events: none;
            min-width: 180px;
            padding: 8px 12px;
            border: 1px solid rgba(34, 211, 238, .25);
            border-radius: 12px;
            background: #0b1019;
            color: #fff;
            box-shadow: 0 12px 30px -12px rgba(0, 0, 0, .8);
        }

        #ci-app input {
            min-width: 0;
        }

        #ci-app button,
        #ci-app input {
            -webkit-tap-highlight-color: transparent;
        }
    </style>

    <div id="ci-app" data-compound-calculator class="relative max-w-5xl mx-auto space-y-6">

        {{-- Heading --}}
        <div class="relative pt-1">
            <a href="{{ route('dashboard') }}" aria-label="Back to dashboard"
                class="absolute left-0 top-0 w-9 h-9 rounded-full flex items-center justify-center text-white/70 hover:text-white hover:bg-white/[0.06] transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="w-5 h-5">
                    <path d="m12 19-7-7 7-7"></path>
                    <path d="M19 12H5"></path>
                </svg>
            </a>

            <div class="text-center px-10 sm:px-12">
                <p class="inline-flex items-center gap-1.5 text-[10px] sm:text-[11px] font-bold uppercase tracking-[0.2em] text-cyan-300/70">
                    <x-icon name="calculator" class="w-3.5 h-3.5" />
                    Free tool · No signup
                </p>
                <h1 class="text-[26px] leading-[1.12] sm:text-5xl font-black tracking-tight mt-2 text-white text-balance">
                    Compound Interest
                    <span class="bg-clip-text text-transparent"
                        style="background-image: linear-gradient(135deg, #67e8f9, #22d3ee, #818cf8);">Calculator</span>
                </h1>
                <p class="text-[12.5px] sm:text-sm text-white/55 mt-3 max-w-2xl mx-auto leading-relaxed">
                    Punch in a starting amount, your monthly return, and how long you let it run. Add recurring
                    contributions if you keep funding the account — see the full month-by-month curve, the effective
                    annual rate, and a compound-vs-simple comparison.
                </p>
            </div>
        </div>

        {{-- Result hero --}}
        <div class="relative overflow-hidden rounded-3xl border border-cyan-400/25 p-5 sm:p-7"
            style="background: radial-gradient(ellipse 80% 70% at 80% 0%, rgba(34,211,238,0.16), transparent 60%), radial-gradient(ellipse 60% 60% at 10% 110%, rgba(129,140,248,0.12), transparent 60%), linear-gradient(160deg, #0b1019, #070b12);">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <div class="min-w-0">
                    <p id="ci-final-label" class="text-[11px] uppercase tracking-[0.18em] text-cyan-300/60">
                        Projected final balance · 12 mo
                    </p>
                    <p id="ci-final"
                        class="text-4xl sm:text-6xl font-black tabular-nums mt-1 bg-clip-text text-transparent break-words"
                        style="background-image: linear-gradient(135deg, #a5f3fc, #22d3ee, #818cf8);">$93,149</p>

                    <p id="ci-interest-line" class="text-sm font-bold text-emerald-300 tabular-nums mt-1">
                        +<span id="ci-interest">$88,149</span> interest earned
                    </p>
                    <p id="ci-cash-line" class="hidden text-sm font-bold text-emerald-300 tabular-nums mt-1">
                        + <span id="ci-cash-total">—</span> paid out to you along the way
                        <span class="text-white/45 font-semibold">· total value <span id="ci-total-value">—</span></span>
                    </p>
                </div>

                <div class="grid grid-cols-3 gap-3 lg:gap-5 shrink-0">
                    <div class="text-center lg:text-right min-w-0">
                        <p class="text-[9px] sm:text-[10px] uppercase tracking-[0.12em] text-white/40 font-semibold">
                            Total growth
                        </p>
                        <p id="ci-growth"
                            class="text-base sm:text-xl font-black tabular-nums text-white mt-1 leading-none break-words">+1763%</p>
                        <p id="ci-multiple" class="text-[10px] text-white/40 tabular-nums mt-0.5">18.63×</p>
                    </div>
                    <div class="text-center lg:text-right min-w-0">
                        <p id="ci-stat2-label"
                            class="text-[9px] sm:text-[10px] uppercase tracking-[0.12em] text-white/40 font-semibold">
                            Effective APY
                        </p>
                        <p id="ci-stat2-value"
                            class="text-base sm:text-xl font-black tabular-nums text-white mt-1 leading-none break-words">1763%</p>
                        <p id="ci-stat2-sub" class="text-[10px] text-white/40 tabular-nums mt-0.5">per year</p>
                    </div>
                    <div class="text-center lg:text-right min-w-0">
                        <p class="text-[9px] sm:text-[10px] uppercase tracking-[0.12em] text-white/40 font-semibold">
                            You put in
                        </p>
                        <p id="ci-principal-total"
                            class="text-base sm:text-xl font-black tabular-nums text-white mt-1 leading-none break-words">$5,000</p>
                        <p class="text-[10px] text-white/40 tabular-nums mt-0.5">principal</p>
                    </div>
                </div>
            </div>

            <div class="mt-5 pt-4 border-t border-white/[0.08] flex items-center justify-between gap-3 flex-wrap">
                <div class="inline-flex p-1 rounded-full border border-white/10 bg-black/30" role="group"
                    aria-label="Return period">
                    <button type="button" data-period="month" aria-pressed="true"
                        class="px-4 py-1.5 rounded-full text-[12px] font-bold transition text-white/55 hover:text-white"
                        style="background: linear-gradient(90deg, #22d3ee, #818cf8); color: #06121a;">Per month</button>
                    <button type="button" data-period="year" aria-pressed="false"
                        class="px-4 py-1.5 rounded-full text-[12px] font-bold transition text-white/55 hover:text-white">Per
                        year</button>
                </div>
                <p class="text-[12px] text-white/50">
                    Your <span id="ci-rate-value" class="text-white/80 font-semibold">27.6%</span>
                    <span id="ci-rate-kind">monthly</span> return =
                    <span id="ci-apy-inline" class="font-bold text-cyan-300 tabular-nums">1762.98%</span>
                    effective APY
                </p>
            </div>
        </div>

        {{-- Inputs --}}
        <div class="rounded-3xl border border-white/[0.08] bg-[#0a0e16] p-5 sm:p-6">
            <div class="flex items-center gap-2 mb-4">
                <x-icon name="calculator" class="w-4 h-4 text-cyan-300" />
                <h3 class="text-sm font-bold text-white">Your scenario</h3>
                <span class="text-[11px] text-white/35 ml-1">— tap any value to edit</span>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">
                <div class="rounded-2xl border border-white/[0.09] bg-white/[0.02] p-3.5 min-w-0 focus-within:border-cyan-400/40 transition-colors">
                    <p class="text-[10px] uppercase tracking-[0.12em] text-white/45 font-semibold leading-tight min-h-[1.6em]">
                        Starting amount
                    </p>
                    <div class="flex items-baseline gap-1 mt-1.5">
                        <span class="text-white/45 text-lg font-bold shrink-0">$</span>
                        <input id="ci-principal" type="text" inputmode="decimal" value="5000"
                            aria-label="Starting amount"
                            class="w-full bg-transparent text-2xl font-black tabular-nums text-white outline-none focus:text-cyan-200 transition-colors">
                    </div>
                    <p class="text-[10px] text-white/30 mt-1 truncate">What you invest today</p>
                </div>

                <div class="rounded-2xl border border-white/[0.09] bg-white/[0.02] p-3.5 min-w-0 focus-within:border-cyan-400/40 transition-colors">
                    <p id="ci-rate-label"
                        class="text-[10px] uppercase tracking-[0.12em] text-white/45 font-semibold leading-tight min-h-[1.6em]">
                        Monthly return
                    </p>
                    <div class="flex items-baseline gap-1 mt-1.5">
                        <input id="ci-rate" type="text" inputmode="decimal" value="27.6"
                            aria-label="Return rate"
                            class="w-full bg-transparent text-2xl font-black tabular-nums text-cyan-300 outline-none transition-colors">
                        <span class="text-white/45 text-sm font-semibold shrink-0">%</span>
                    </div>
                    <p class="text-[10px] text-white/30 mt-1 truncate">Goldrock avg ≈ 15.4%/mo</p>
                </div>

                <div class="rounded-2xl border border-white/[0.09] bg-white/[0.02] p-3.5 min-w-0 focus-within:border-cyan-400/40 transition-colors">
                    <p class="text-[10px] uppercase tracking-[0.12em] text-white/45 font-semibold leading-tight min-h-[1.6em]">
                        Time horizon
                    </p>
                    <div class="flex items-baseline gap-1 mt-1.5">
                        <input id="ci-months" type="text" inputmode="numeric" value="12"
                            aria-label="Time horizon in months"
                            class="w-full bg-transparent text-2xl font-black tabular-nums text-white outline-none focus:text-cyan-200 transition-colors">
                        <span class="text-white/45 text-sm font-semibold shrink-0">mo</span>
                    </div>
                    <p class="text-[10px] text-white/30 mt-1 truncate">How long it runs</p>
                </div>

                <div class="rounded-2xl border border-white/[0.09] bg-white/[0.02] p-3.5 min-w-0 focus-within:border-cyan-400/40 transition-colors">
                    <p class="text-[10px] uppercase tracking-[0.12em] text-white/45 font-semibold leading-tight min-h-[1.6em]">
                        Adding each month
                    </p>
                    <div class="flex items-baseline gap-1 mt-1.5">
                        <span class="text-white/45 text-lg font-bold shrink-0">$</span>
                        <input id="ci-contribution" type="text" inputmode="decimal" value="0"
                            aria-label="Monthly contribution"
                            class="w-full bg-transparent text-2xl font-black tabular-nums text-white outline-none focus:text-cyan-200 transition-colors">
                    </div>
                    <p class="text-[10px] text-white/30 mt-1 truncate">Optional recurring top-up</p>
                </div>
            </div>

            <div class="flex gap-2 flex-wrap mt-4 pt-4 border-t border-white/[0.06]">
                <span class="text-[11px] text-white/35 self-center mr-1">Quick start:</span>
                <button type="button" data-quick="500" aria-pressed="false"
                    class="px-3 py-1 rounded-full text-[11px] font-semibold border text-white/55 border-white/10 hover:border-white/25 transition-colors">$500</button>
                <button type="button" data-quick="1000" aria-pressed="false"
                    class="px-3 py-1 rounded-full text-[11px] font-semibold border text-white/55 border-white/10 hover:border-white/25 transition-colors">$1,000</button>
                <button type="button" data-quick="5000" aria-pressed="true"
                    class="ci-pill-active px-3 py-1 rounded-full text-[11px] font-semibold border text-white/55 border-white/10 hover:border-white/25 transition-colors">$5,000</button>
                <button type="button" data-quick="10000" aria-pressed="false"
                    class="px-3 py-1 rounded-full text-[11px] font-semibold border text-white/55 border-white/10 hover:border-white/25 transition-colors">$10,000</button>
                <button type="button" data-quick="25000" aria-pressed="false"
                    class="px-3 py-1 rounded-full text-[11px] font-semibold border text-white/55 border-white/10 hover:border-white/25 transition-colors">$25,000</button>
            </div>
        </div>

        {{-- Withdrawal settings --}}
        <div class="rounded-3xl border border-white/[0.08] bg-[#0a0e16] p-5 sm:p-6">
            <div class="flex items-center gap-2 mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="w-4 h-4 text-cyan-300">
                    <path d="m17 2 4 4-4 4"></path>
                    <path d="M3 11v-1a4 4 0 0 1 4-4h14"></path>
                    <path d="m7 22-4-4 4-4"></path>
                    <path d="M21 13v1a4 4 0 0 1-4 4H3"></path>
                </svg>
                <h3 class="text-sm font-bold text-white">Take profits out each month?</h3>
            </div>
            <p class="text-[12px] text-white/50 mb-4">
                Keep everything in to compound, or take a share of each month's profit as cash and let the rest keep
                growing.
            </p>

            <div class="flex flex-wrap gap-2" role="group" aria-label="Monthly profit withdrawal">
                <button type="button" data-take="0" aria-pressed="true"
                    class="ci-take-active h-10 px-4 rounded-full text-[13px] font-bold border transition text-white/70 border-white/10 hover:border-cyan-400/40 hover:text-white">Keep
                    it all in</button>
                <button type="button" data-take="25" aria-pressed="false"
                    class="h-10 px-4 rounded-full text-[13px] font-bold border transition text-white/70 border-white/10 hover:border-cyan-400/40 hover:text-white">Take
                    25%</button>
                <button type="button" data-take="50" aria-pressed="false"
                    class="h-10 px-4 rounded-full text-[13px] font-bold border transition text-white/70 border-white/10 hover:border-cyan-400/40 hover:text-white">Take
                    50%</button>
                <button type="button" data-take="75" aria-pressed="false"
                    class="h-10 px-4 rounded-full text-[13px] font-bold border transition text-white/70 border-white/10 hover:border-cyan-400/40 hover:text-white">Take
                    75%</button>
                <button type="button" data-take="100" aria-pressed="false"
                    class="h-10 px-4 rounded-full text-[13px] font-bold border transition text-white/70 border-white/10 hover:border-cyan-400/40 hover:text-white">Take
                    all profit</button>
            </div>

            <div id="ci-withdraw-results" class="hidden mt-5 grid grid-cols-1 lg:grid-cols-[1fr_auto] gap-4 items-start">
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    <div class="rounded-2xl border border-white/[0.09] bg-white/[0.02] p-3 min-w-0">
                        <p class="text-[10px] uppercase tracking-[0.12em] text-white/45 font-semibold leading-tight">
                            Cash to you
                        </p>
                        <p id="ci-cash-to-you" class="text-lg font-black tabular-nums mt-1 text-emerald-300 break-words">$0</p>
                    </div>
                    <div class="rounded-2xl border border-white/[0.09] bg-white/[0.02] p-3 min-w-0">
                        <p class="text-[10px] uppercase tracking-[0.12em] text-white/45 font-semibold leading-tight">
                            Still invested
                        </p>
                        <p id="ci-still-invested" class="text-lg font-black tabular-nums mt-1 text-white break-words">$0</p>
                    </div>
                    <div class="rounded-2xl border border-white/[0.09] bg-white/[0.02] p-3 min-w-0">
                        <p id="ci-fee-label"
                            class="text-[10px] uppercase tracking-[0.12em] text-white/45 font-semibold leading-tight">
                            Fee on withdrawals (30%)
                        </p>
                        <p id="ci-fee-on-withdrawals"
                            class="text-lg font-black tabular-nums mt-1 text-rose-300 break-words">$0</p>
                    </div>
                    <div class="rounded-2xl border border-white/[0.09] bg-white/[0.02] p-3 min-w-0">
                        <p class="text-[10px] uppercase tracking-[0.12em] text-white/45 font-semibold leading-tight">
                            If you'd kept it all in
                        </p>
                        <p id="ci-all-in" class="text-lg font-black tabular-nums mt-1 text-white/70 break-words">$0</p>
                    </div>
                </div>

                <div class="rounded-2xl border border-white/[0.09] bg-white/[0.02] p-3 min-w-[160px]">
                    <p class="text-[10px] uppercase tracking-[0.12em] text-white/45 font-semibold">Performance fee</p>
                    <div class="flex items-baseline gap-1 mt-1">
                        <input id="ci-fee" type="text" inputmode="decimal" value="30" aria-label="Performance fee"
                            class="w-16 bg-transparent text-xl font-black tabular-nums text-white outline-none">
                        <span class="text-white/45 text-sm font-semibold">%</span>
                    </div>
                    <p class="text-[10px] text-white/35 mt-1">on profit you take out</p>
                </div>
            </div>

            <p id="ci-withdrawal-explanation" class="hidden text-[12px] leading-relaxed text-white/55 mt-4"></p>
        </div>

        {{-- Chart --}}
        <div class="rounded-3xl border border-white/[0.08] bg-[#0a0e16] p-4 sm:p-6">
            <div class="flex items-center justify-between gap-2 mb-4 flex-wrap">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-4 h-4 text-cyan-300">
                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                        <polyline points="16 7 22 7 22 13"></polyline>
                    </svg>
                    <h3 class="text-sm font-bold text-white">Projected growth</h3>
                </div>
                <div class="flex items-center gap-4 text-[11px] text-white/50 flex-wrap">
                    <span class="inline-flex items-center gap-1.5">
                        <span class="w-3 h-3 rounded-sm"
                            style="background: linear-gradient(180deg, #22d3ee, #0891b2);"></span>
                        This month's gain
                    </span>
                    <span class="inline-flex items-center gap-1.5">
                        <span class="w-4 h-0.5 rounded-full bg-violet-400"></span>
                        Running balance
                    </span>
                    <span id="ci-legend-cash" class="hidden inline-flex items-center gap-1.5">
                        <span class="w-4 h-0.5 rounded-full bg-emerald-400"></span>
                        Paid out to you (total)
                    </span>
                </div>
            </div>

            <div id="ci-chart" class="relative w-full" style="height: 300px;">
                <div id="ci-chart-svg" class="absolute inset-0"></div>
                <div id="ci-chart-tooltip" class="ci-chart-tooltip"></div>
            </div>

            <div id="ci-simple-note" class="mt-4 rounded-2xl border border-cyan-400/20 px-4 py-3 flex items-center justify-between gap-3 flex-wrap"
                style="background: linear-gradient(90deg, rgba(34,211,238,0.10), rgba(129,140,248,0.06));">
                <p class="text-[13px] text-white/85">
                    <span class="font-bold text-cyan-300">Compounding adds <span id="ci-compound-adds">$71,589</span></span>
                    vs flat simple interest at the same rate.
                </p>
                <p class="text-[12px] text-white/45 tabular-nums">simple: <span id="ci-simple-balance">$21,560</span></p>
            </div>
        </div>

        {{-- Table --}}
        <div class="rounded-3xl border border-white/[0.08] bg-[#0a0e16] overflow-hidden">
            <div class="flex items-center justify-between gap-2 px-5 pt-5 flex-wrap">
                <div>
                    <h3 class="text-base font-bold text-white">Month-by-month projection</h3>
                    <p class="text-[12px] text-white/45 mt-0.5">
                        The same compounding curve, laid out so you can scan every month.
                    </p>
                </div>
                <p id="ci-table-meta" class="text-[12px] text-white/40 tabular-nums">
                    12 months · 27.6% / mo
                </p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-8 gap-y-0 px-5 py-4">
                <div id="ci-table-first" class="min-w-0"></div>
                <div id="ci-table-second" class="min-w-0"></div>
            </div>
        </div>

        {{-- Explanatory cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
            <div class="rounded-2xl border border-white/[0.07] bg-white/[0.02] p-4">
                <div class="flex items-center gap-2 mb-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-4 h-4 text-cyan-300">
                        <path d="m17 2 4 4-4 4"></path>
                        <path d="M3 11v-1a4 4 0 0 1 4-4h14"></path>
                        <path d="m7 22-4-4 4-4"></path>
                        <path d="M21 13v1a4 4 0 0 1-4 4H3"></path>
                    </svg>
                    <h4 class="text-[13px] font-bold text-white">What compounding does</h4>
                </div>
                <p class="text-[12px] leading-relaxed text-white/50">
                    Each month's gain is added to your balance, so the next month earns a return on a bigger base. That
                    snowball is why the curve bends upward instead of rising in a straight line.
                </p>
            </div>

            <div class="rounded-2xl border border-white/[0.07] bg-white/[0.02] p-4">
                <div class="flex items-center gap-2 mb-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-4 h-4 text-cyan-300">
                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                        <polyline points="16 7 22 7 22 13"></polyline>
                    </svg>
                    <h4 class="text-[13px] font-bold text-white">Compound vs simple</h4>
                </div>
                <p class="text-[12px] leading-relaxed text-white/50">
                    Simple interest pays the same flat amount every month on your original deposit. Compounding
                    reinvests every gain — the gap between the two grows wider the longer you stay invested.
                </p>
            </div>

            <div class="rounded-2xl border border-white/[0.07] bg-white/[0.02] p-4">
                <div class="flex items-center gap-2 mb-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-4 h-4 text-cyan-300">
                        <path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3Z"></path>
                    </svg>
                    <h4 class="text-[13px] font-bold text-white">Adding each month</h4>
                </div>
                <p class="text-[12px] leading-relaxed text-white/50">
                    Recurring contributions stack new principal on top of a compounding balance. Even small monthly
                    top-ups meaningfully lift the final number over time.
                </p>
            </div>
        </div>

        {{-- CTA --}}
        <div class="rounded-3xl border border-cyan-400/20 p-6 text-center"
            style="background: linear-gradient(135deg, rgba(34,211,238,0.10), rgba(129,140,248,0.07));">
            <p class="text-base font-bold text-white flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="w-4 h-4 text-cyan-300">
                    <path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3Z"></path>
                </svg>
                Ready to put compounding to work?
            </p>
            <p class="text-[13px] text-white/55 mt-1.5">
                {{ env('APP_NAME') }} has averaged ≈ 15.4% / month. Invest and let it reinvest for you.
            </p>
            <a href="{{ route('copyTrading') }}"
                class="mt-4 h-11 px-7 rounded-full font-bold text-[#06121a] inline-flex items-center gap-2"
                style="background: linear-gradient(90deg, #22d3ee, #818cf8);">
                Invest Now →
            </a>
        </div>

        {{-- Disclaimer --}}
        <p class="text-[11px] leading-relaxed text-white/35 px-1 text-center flex items-start gap-1.5 justify-center max-w-2xl mx-auto">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="w-3.5 h-3.5 shrink-0 mt-0.5">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M12 16v-4"></path>
                <path d="M12 8h.01"></path>
            </svg>
            <span>
                This calculator is for illustration only. Projections assume a constant return and do not guarantee
                future results. Past performance is not indicative of future returns. Trading involves risk.
            </span>
        </p>
    </div>

    <script>
        @include('user.partials.compound-interest-script')
    </script>
@endsection
