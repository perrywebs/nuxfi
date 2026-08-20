@extends('layouts.base')

@section('title', 'Home')

@section('content')

    {{-- ===== 1. HERO SECTION ===== --}}
    <section
        class="relative bg-gradient-to-b from-slate-50 via-blue-50/30 to-white pt-12 pb-20 lg:pt-20 lg:pb-28 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">

                {{-- Hero Copy --}}
                <div class="lg:col-span-7 space-y-8">
                    <div
                        class="inline-flex items-center gap-2 bg-emerald-50/80 border border-emerald-200/60 rounded-full px-3.5 py-1.5 shadow-sm">
                        <span class="relative flex h-2 w-2">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                        </span>
                        <span class="text-emerald-800 text-xs font-semibold uppercase tracking-wider">Institutional Grade
                            Wealth Engine</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-slate-900 leading-[1.15] tracking-tight">
                        Smart wealth management <br class="hidden sm:inline">
                        <span class="bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">engineered
                            for growth.</span>
                    </h1>

                    <p class="text-lg sm:text-xl text-slate-600 max-w-xl font-normal leading-relaxed">
                        Institutional-level market execution, direct liquidity pools, and personal wealth advisors—all
                        inside one transparent platform.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 pt-2">
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center justify-center px-8 py-4 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-xl transition-all duration-200 shadow-md shadow-emerald-600/20 hover:shadow-lg hover:shadow-emerald-600/30 text-base">
                            Open Free Account
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                        <a href="{{ route('trading') }}"
                            class="inline-flex items-center justify-center px-8 py-4 bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 font-semibold rounded-xl transition-all duration-200 text-base shadow-sm">
                            Explore Assets
                        </a>
                    </div>

                    {{-- Key Metrics Grid --}}
                    <div class="grid grid-cols-3 gap-6 pt-6 border-t border-slate-200/80 max-w-lg">
                        <div>
                            <p class="text-2xl sm:text-3xl font-bold text-slate-900">$2.4B+</p>
                            <p class="text-xs font-medium text-slate-500 uppercase tracking-wider mt-1">Processed Volume</p>
                        </div>
                        <div>
                            <p class="text-2xl sm:text-3xl font-bold text-slate-900">120+</p>
                            <p class="text-xs font-medium text-slate-500 uppercase tracking-wider mt-1">Asset Classes</p>
                        </div>
                        <div>
                            <p class="text-2xl sm:text-3xl font-bold text-slate-900">99.9%</p>
                            <p class="text-xs font-medium text-slate-500 uppercase tracking-wider mt-1">Platform Uptime</p>
                        </div>
                    </div>
                </div>

                {{-- Hero Visual (Human Trust Focus) --}}
                <div class="lg:col-span-5 relative">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-slate-200/50">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=800&auto=format&fit=crop&q=80"
                            alt="Financial Advisor discussing portfolio strategy"
                            class="w-full h-[480px] sm:h-[540px] object-cover">

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent">
                        </div>

                        {{-- Floating Advisory Card --}}
                        <div
                            class="absolute bottom-6 left-6 right-6 bg-white/95 backdrop-blur-md rounded-xl p-4 shadow-xl border border-slate-100">
                            <div class="flex items-center gap-4">
                                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=120&auto=format&fit=crop&q=80"
                                    alt="Marcus Vance" class="w-12 h-12 rounded-full object-cover ring-2 ring-emerald-500">
                                <div>
                                    <h4 class="text-sm font-semibold text-slate-900">Marcus Vance</h4>
                                    <p class="text-xs text-slate-500">Chief Investment Strategist</p>
                                    <p class="text-xs text-emerald-600 font-medium mt-0.5">● Portfolio Consultations Active
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ===== 2. TRUST & REGULATION BAR ===== --}}
    <section class="bg-white border-y border-slate-100 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-center text-xs font-semibold text-slate-400 uppercase tracking-widest mb-8">Integrated with
                premier global institutions</p>
            <div
                class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center justify-items-center opacity-70 grayscale hover:grayscale-0 transition-all duration-300">
                <div class="flex items-center gap-2 font-bold text-slate-700 text-lg">
                    <svg class="w-6 h-6 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                    </svg>
                    ApexClearing
                </div>
                <div class="flex items-center gap-2 font-bold text-slate-700 text-lg">
                    <svg class="w-6 h-6 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                    </svg>
                    Coinbase Custody
                </div>
                <div class="flex items-center gap-2 font-bold text-slate-700 text-lg">
                    <svg class="w-6 h-6 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                    </svg>
                    Barclays Capital
                </div>
                <div class="flex items-center gap-2 font-bold text-slate-700 text-lg">
                    <svg class="w-6 h-6 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                    </svg>
                    Interactive Brokers
                </div>
            </div>
        </div>
    </section>

    {{-- ===== 3. FEATURES SECTION ===== --}}
    <section class="py-24 bg-slate-50/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-emerald-600 font-semibold text-xs uppercase tracking-widest">Enterprise
                    Architecture</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mt-2 mb-4 tracking-tight">Built for Unyielding
                    Reliability</h2>
                <p class="text-slate-600 text-base sm:text-lg">Combining advanced financial technology with enterprise-tier
                    risk management.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @php
                    $features = [
                        [
                            'svg' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z"/>',
                            'title' => 'Ultra-Low Latency',
                            'desc' =>
                                'Direct liquidity routing delivers average execution speeds under 12 milliseconds.',
                        ],
                        [
                            'svg' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>',
                            'title' => 'Cold-Storage & Segregation',
                            'desc' =>
                                'Client funds reside in tier-1 regulated custodial banks completely separate from operating capital.',
                        ],
                        [
                            'svg' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>',
                            'title' => 'Cross-Device Engine',
                            'desc' =>
                                'Seamless experience across web terminals, iOS, and Android with unified state sync.',
                        ],
                        [
                            'svg' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>',
                            'title' => 'Deep Analytics',
                            'desc' =>
                                'Comprehensive portfolio tracking, custom yield calculators, and algorithmic reporting.',
                        ],
                    ];
                @endphp
                @foreach ($features as $feature)
                    <div
                        class="bg-white rounded-2xl p-8 border border-slate-200/80 shadow-sm hover:shadow-md hover:border-emerald-200 transition-all duration-200">
                        <div
                            class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                {!! $feature['svg'] !!}
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">{{ $feature['title'] }}</h3>
                        <p class="text-slate-600 text-sm leading-relaxed">{{ $feature['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== 4. REAL PEOPLE / ADVISORY SECTION ===== --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

                <div class="lg:col-span-6 space-y-6">
                    <span class="text-emerald-600 font-semibold text-xs uppercase tracking-widest">Human Capital</span>
                    <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 tracking-tight">
                        Backed by dedicated financial specialists, not anonymous scripts.
                    </h2>
                    <p class="text-slate-600 text-lg leading-relaxed">
                        Automated precision meets personal expertise. Every user gets access to certified risk managers and
                        active account supervision to guide capital allocation.
                    </p>

                    <div class="space-y-4 pt-2">
                        <div class="flex items-start gap-4">
                            <div
                                class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-slate-900">Tailored Wealth Guidance</h4>
                                <p class="text-xs text-slate-500 mt-0.5">Custom investment strategies aligned with
                                    individual liquidity objectives.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div
                                class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-slate-900">Licensed Advisory Support</h4>
                                <p class="text-xs text-slate-500 mt-0.5">24/7 dedicated telephone and live-chat response
                                    desks.</p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4">
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center text-emerald-600 hover:text-emerald-700 font-semibold text-sm">
                            Schedule a Consultation
                            <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-6 grid grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=500&auto=format&fit=crop&q=80"
                            alt="Financial Analyst" class="rounded-2xl w-full h-64 object-cover shadow-md">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=500&auto=format&fit=crop&q=80"
                            alt="Strategy Team" class="rounded-2xl w-full h-48 object-cover shadow-md">
                    </div>
                    <div class="space-y-4 pt-6">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=500&auto=format&fit=crop&q=80"
                            alt="Wealth Manager" class="rounded-2xl w-full h-48 object-cover shadow-md">
                        <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=500&auto=format&fit=crop&q=80"
                            alt="Client Strategy Session" class="rounded-2xl w-full h-64 object-cover shadow-md">
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ===== 5. SUCCESS STORIES (REAL TESTIMONIALS) ===== --}}
    <section class="py-24 bg-slate-50/50 border-y border-slate-200/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-emerald-600 font-semibold text-xs uppercase tracking-widest">Client Testimonials</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mt-2 mb-4 tracking-tight">Trusted by Industry
                    Professionals</h2>
                <p class="text-slate-600 text-lg">Verified reviews from long-term capital allocators.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $testimonials = [
                        [
                            'name' => 'Elena Rostova',
                            'role' => 'Portfolio Manager',
                            'text' =>
                                'The yield transparency and automated portfolio rebalancing have completely redefined how we manage our secondary fund capital.',
                            'img' =>
                                'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=200&auto=format&fit=crop&q=80',
                        ],
                        [
                            'name' => 'David Vance',
                            'role' => 'Private Equity Investor',
                            'text' =>
                                'Execution speeds are unmatched. Knowing client funds are held in Tier-1 custody provides absolute peace of mind.',
                            'img' =>
                                'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=200&auto=format&fit=crop&q=80',
                        ],
                        [
                            'name' => 'Sophia Zhang',
                            'role' => 'Institutional Client',
                            'text' =>
                                'Having a real advisor review my strategy quarterly added immediate value. The platform is clean, reliable, and corporate-ready.',
                            'img' =>
                                'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=200&auto=format&fit=crop&q=80',
                        ],
                    ];
                @endphp
                @foreach ($testimonials as $testimonial)
                    <div
                        class="bg-white rounded-2xl p-8 border border-slate-200/80 shadow-sm flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-1 text-amber-400 mb-6">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                            <p class="text-slate-700 text-sm leading-relaxed mb-6 font-normal">"{{ $testimonial['text'] }}"
                            </p>
                        </div>
                        <div class="flex items-center gap-4 pt-4 border-t border-slate-100">
                            <img src="{{ $testimonial['img'] }}" alt="{{ $testimonial['name'] }}"
                                class="w-12 h-12 rounded-full object-cover">
                            <div>
                                <p class="font-bold text-slate-900 text-sm">{{ $testimonial['name'] }}</p>
                                <p class="text-xs text-slate-500 font-medium">{{ $testimonial['role'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== 6. MARKETS SECTION ===== --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12">
                <div>
                    <span class="text-emerald-600 font-semibold text-xs uppercase tracking-widest">Global Assets</span>
                    <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mt-2 tracking-tight">Multi-Asset Ecosystem
                    </h2>
                </div>
                <a href="{{ route('trading') }}"
                    class="text-emerald-600 hover:text-emerald-700 font-semibold text-sm inline-flex items-center gap-1 mt-4 md:mt-0">
                    Explore All Asset Classes
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $markets = [
                        [
                            'title' => 'Foreign Exchange',
                            'symbol' => 'Forex',
                            'desc' => 'Major, minor, & exotic pairs with micro-pip spreads.',
                            'badge' => '55+ Pairs',
                        ],
                        [
                            'title' => 'Digital Currencies',
                            'symbol' => 'Crypto',
                            'desc' => 'Institutional spot & perpetual liquidity pools.',
                            'badge' => '24/7 Market',
                        ],
                        [
                            'title' => 'Precious Metals & Energy',
                            'symbol' => 'Commodities',
                            'desc' => 'Direct spot pricing on Gold, Silver, and Crude.',
                            'badge' => 'Low Margin',
                        ],
                        [
                            'title' => 'Global Indices',
                            'symbol' => 'Indices',
                            'desc' => 'Direct exposure to S&P 500, NASDAQ, and FTSE.',
                            'badge' => '0% Comm.',
                        ],
                    ];
                @endphp
                @foreach ($markets as $market)
                    <div
                        class="bg-slate-50 hover:bg-white rounded-2xl p-6 border border-slate-200/80 hover:border-emerald-300 hover:shadow-lg transition-all duration-200 group">
                        <div class="flex justify-between items-center mb-4">
                            <span
                                class="text-xs font-bold text-emerald-700 bg-emerald-100/60 px-2.5 py-1 rounded-md">{{ $market['badge'] }}</span>
                            <span
                                class="text-xs font-semibold text-slate-400 uppercase tracking-widest">{{ $market['symbol'] }}</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-emerald-600 transition-colors">
                            {{ $market['title'] }}</h3>
                        <p class="text-slate-600 text-xs leading-relaxed">{{ $market['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== 7. HOW IT WORKS ===== --}}
    <section class="py-24 bg-slate-50/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-emerald-600 font-semibold text-xs uppercase tracking-widest">Seamless Onboarding</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mt-2 mb-4 tracking-tight">Active Strategy in 3
                    Steps</h2>
                <p class="text-slate-600 text-base sm:text-lg">Deploy your portfolio through our streamlined regulatory
                    verification.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                @php
                    $steps = [
                        [
                            'num' => '01',
                            'title' => 'Identity Verification',
                            'desc' => 'Complete bank-grade e-KYC compliance in under 3 minutes.',
                        ],
                        [
                            'num' => '02',
                            'title' => 'Capital Allocation',
                            'desc' => 'Deposit securely via wire transfer, card, or digital assets.',
                        ],
                        [
                            'num' => '03',
                            'title' => 'Execute & Monitor',
                            'desc' => 'Activate algorithmic investment plans or trade manually.',
                        ],
                    ];
                @endphp
                @foreach ($steps as $step)
                    <div class="bg-white rounded-2xl p-8 border border-slate-200/80 shadow-sm relative z-10 text-center">
                        <div
                            class="w-14 h-14 mx-auto rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-600 flex items-center justify-center text-xl font-bold mb-6">
                            {{ $step['num'] }}
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">{{ $step['title'] }}</h3>
                        <p class="text-slate-600 text-sm leading-relaxed">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== 8. INVESTMENT PLANS ===== --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-emerald-600 font-semibold text-xs uppercase tracking-widest">Account Tiers</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mt-2 mb-4 tracking-tight">Structured Wealth Tiers
                </h2>
                <p class="text-slate-600 text-lg">Select an allocation model designed for your return expectations.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($plans as $index => $plan)
                    <div
                        class="bg-white rounded-2xl border {{ $index === 1 ? 'border-emerald-500 shadow-xl ring-1 ring-emerald-500' : 'border-slate-200 shadow-sm' }} p-8 flex flex-col justify-between relative transition-all duration-200 hover:shadow-md">
                        @if ($index === 1)
                            <div
                                class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-emerald-600 text-white text-[11px] font-bold uppercase tracking-widest px-3 py-1 rounded-full">
                                Most Popular Tier
                            </div>
                        @endif

                        <div>
                            <h3 class="text-xl font-bold text-slate-900 mb-1">{{ $plan->name }}</h3>
                            <p class="text-xs text-slate-500 mb-6 font-medium">Targeted for
                                {{ $index === 0 ? 'Retail Investors' : ($index === 1 ? 'Active Capitalists' : 'Institutional Clients') }}
                            </p>

                            <div class="mb-6 pb-6 border-b border-slate-100">
                                <span
                                    class="text-3xl font-extrabold text-slate-900">{{ $settings->currency }}{{ number_format($plan->min_price) }}</span>
                                <span class="text-slate-400 text-sm font-normal"> -
                                    {{ $settings->currency }}{{ number_format($plan->max_price) }}</span>
                            </div>

                            <ul class="space-y-4 mb-8">
                                @php
                                    $features = [
                                        'Up to ' . $plan->increment_amount . '% projected return',
                                        'Direct Liquidity Engine Access',
                                        'Allocation Bonus: ' . $settings->currency . $plan->gift,
                                        '24/7 Advisory Desk Support',
                                        'Instant Settlement & Withdrawals',
                                    ];
                                @endphp
                                @foreach ($features as $feature)
                                    <li class="flex items-start gap-3 text-slate-600 text-sm">
                                        <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <a href="{{ route('register') }}"
                            class="block w-full text-center py-3.5 rounded-xl font-semibold transition-all duration-200 text-sm {{ $index === 1 ? 'bg-emerald-600 text-white hover:bg-emerald-700 shadow-md shadow-emerald-600/20' : 'bg-slate-100 text-slate-800 hover:bg-slate-200' }}">
                            Activate Allocation
                        </a>
                    </div>
                @endforeach
            </div>

            <p class="text-center text-slate-400 text-xs mt-10 max-w-2xl mx-auto leading-relaxed">
                Capital carries risk. Projected returns are based on historical performance metrics. Please review our <a
                    href="{{ route('risk') }}" class="text-emerald-600 underline hover:text-emerald-700">Financial Risk
                    Notice</a> before committing capital.
            </p>
        </div>
    </section>

    {{-- ===== 9. FAQ SECTION ===== --}}
    <section class="py-24 bg-slate-50/50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-emerald-600 font-semibold text-xs uppercase tracking-widest">Client Knowledgebase</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mt-2 mb-4 tracking-tight">Frequently Asked
                    Questions</h2>
                <p class="text-slate-600 text-base sm:text-lg">Clear answers regarding platform operations and regulatory
                    safety.</p>
            </div>

            <div x-data="{ open: 0 }" class="space-y-4">
                @php
                    $faqs = [
                        [
                            'q' => 'How is my institutional capital protected?',
                            'a' =>
                                'Client capital is segregated in Tier-1 custody accounts protected by strict regulatory standards and FDIC/SIPC equivalent coverage limits depending on jurisdiction.',
                        ],
                        [
                            'q' => 'What are the minimum capital requirements?',
                            'a' =>
                                'Minimum accounts start at ' .
                                $settings->currency .
                                '10 for retail allocations. Wealth tiers provide dedicated manager options at higher capital limits.',
                        ],
                        [
                            'q' => 'How are liquidity withdrawals settled?',
                            'a' =>
                                'Withdrawal requests undergo automated risk review and are processed within 24 business hours directly back to your verified bank account or wallet.',
                        ],
                        [
                            'q' => 'Can I access personal wealth management advisory?',
                            'a' =>
                                'Yes. All active account tiers include assigned advisory support accessible through direct message, phone, or scheduled video consult.',
                        ],
                    ];
                @endphp
                @foreach ($faqs as $i => $faq)
                    <div
                        class="bg-white rounded-xl border border-slate-200/80 overflow-hidden shadow-sm transition-all duration-200">
                        <button @click="open = open === {{ $i }} ? null : {{ $i }}"
                            class="w-full flex items-center justify-between p-6 text-left hover:bg-slate-50/80 transition-colors duration-150">
                            <span class="font-bold text-slate-900 text-base pr-4">{{ $faq['q'] }}</span>
                            <svg :class="open === {{ $i }} ? 'rotate-180' : ''"
                                class="w-5 h-5 text-slate-400 flex-shrink-0 transition-transform duration-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open === {{ $i }}" x-collapse x-cloak>
                            <div class="px-6 pb-6 text-slate-600 text-sm leading-relaxed border-t border-slate-100 pt-4">
                                {{ $faq['a'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-10">
                <a href="{{ route('faq') }}"
                    class="text-emerald-600 hover:text-emerald-700 font-semibold text-sm inline-flex items-center gap-1">
                    View Knowledgebase & Documentation
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- ===== 10. FINAL CALL TO ACTION ===== --}}
    <section class="relative py-20 bg-slate-900 overflow-hidden">
        {{-- Human background layer --}}
        <div class="absolute inset-0 opacity-20 mix-blend-luminosity">
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1600&auto=format&fit=crop&q=80"
                alt="Professional financial advisors in discussion" class="w-full h-full object-cover">
        </div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-5xl font-bold text-white mb-6 tracking-tight">
                Ready to optimize your financial portfolio?
            </h2>
            <p class="text-lg text-slate-300 mb-8 max-w-2xl mx-auto leading-relaxed">
                Join thousands of traders and capital allocators leveraging our enterprise wealth platform today.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}"
                    class="inline-flex items-center justify-center px-8 py-4 bg-emerald-600 hover:bg-emerald-500 text-white font-semibold rounded-xl transition-all duration-200 shadow-lg shadow-emerald-900/50 text-base">
                    Create Free Account
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
                <a href="{{ route('trading') }}"
                    class="inline-flex items-center justify-center px-8 py-4 bg-slate-800/80 hover:bg-slate-800 border border-slate-700 text-white font-semibold rounded-xl transition-all duration-200 text-base backdrop-blur-sm">
                    View Active Markets
                </a>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.14.8/dist/cdn.min.js"></script>
@endpush
