{{-- Header partial — Institutional Light Blue Theme --}}
<header x-data="{ mobileOpen: false }" class="sticky top-0 z-50 bg-info-50/50 backdrop-blur-md border-b border-slate-200/80 transition-all duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            
            {{-- Brand Logo --}}
            <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center gap-3">
                <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="{{ $settings->site_name }}" class="h-10 w-auto object-contain" />
            </a>

            {{-- Desktop Navigation Links --}}
            <nav class="hidden lg:flex items-center space-x-1">
                <a href="{{ route('home') }}" class="px-3.5 py-2 text-sm font-semibold text-slate-700 hover:text-sky-600 hover:bg-sky-50/60 rounded-lg transition">
                    Home
                </a>
                <a href="{{ route('pricing') }}" class="px-3.5 py-2 text-sm font-semibold text-slate-700 hover:text-sky-600 hover:bg-sky-50/60 rounded-lg transition">
                    Markets
                </a>

                {{-- Company Dropdown --}}
                <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                    <button @click="open = !open" class="inline-flex items-center px-3.5 py-2 text-sm font-semibold text-slate-700 hover:text-sky-600 hover:bg-sky-50/60 rounded-lg transition">
                        Company
                        <svg class="ml-1.5 w-4 h-4 text-slate-400 group-hover:text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-150" 
                         x-transition:enter-start="opacity-0 translate-y-1" 
                         x-transition:enter-end="opacity-100 translate-y-0" 
                         x-transition:leave="transition ease-in duration-100" 
                         x-transition:leave-start="opacity-100 translate-y-0" 
                         x-transition:leave-end="opacity-0 translate-y-1" 
                         class="absolute left-0 mt-1 w-52 bg-white rounded-xl shadow-xl border border-slate-200/80 py-2.5 z-50" 
                         x-cloak>
                        <a href="{{ route('about') }}" class="block px-4 py-2 text-sm text-slate-600 hover:text-sky-600 hover:bg-sky-50/50 transition font-medium">About Firm</a>
                        <a href="{{ route('service') }}" class="block px-4 py-2 text-sm text-slate-600 hover:text-sky-600 hover:bg-sky-50/50 transition font-medium">Careers</a>
                    </div>
                </div>

                {{-- Resources Dropdown --}}
                <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                    <button @click="open = !open" class="inline-flex items-center px-3.5 py-2 text-sm font-semibold text-slate-700 hover:text-sky-600 hover:bg-sky-50/60 rounded-lg transition">
                        Resources
                        <svg class="ml-1.5 w-4 h-4 text-slate-400 group-hover:text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-150" 
                         x-transition:enter-start="opacity-0 translate-y-1" 
                         x-transition:enter-end="opacity-100 translate-y-0" 
                         x-transition:leave="transition ease-in duration-100" 
                         x-transition:leave-start="opacity-100 translate-y-0" 
                         x-transition:leave-end="opacity-0 translate-y-1" 
                         class="absolute left-0 mt-1 w-64 bg-white rounded-xl shadow-xl border border-slate-200/80 py-2.5 z-50" 
                         x-cloak>
                        <a href="{{ route('contact') }}" class="block px-4 py-2 text-sm text-slate-600 hover:text-sky-600 hover:bg-sky-50/50 transition font-medium">Help Desk & Advisory</a>
                        <a href="{{ route('faq') }}" class="block px-4 py-2 text-sm text-slate-600 hover:text-sky-600 hover:bg-sky-50/50 transition font-medium">Legal Documentation</a>
                        <a href="{{ route('safety') }}" class="block px-4 py-2 text-sm text-slate-600 hover:text-sky-600 hover:bg-sky-50/50 transition font-medium">Security & Safeguards</a>
                        <a href="{{ route('trading') }}" class="block px-4 py-2 text-sm text-slate-600 hover:text-sky-600 hover:bg-sky-50/50 transition font-medium">WebTrader Terminal</a>
                    </div>
                </div>
            </nav>

            {{-- Desktop Action / Auth Buttons --}}
            <div class="hidden lg:flex items-center space-x-3">
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-sky-600 hover:bg-sky-700 text-white font-semibold rounded-xl px-5 py-2.5 text-sm transition shadow-sm shadow-sky-600/20">
                        Client Portal
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm font-semibold text-slate-600 hover:text-slate-900 px-3 py-2 transition">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-700 hover:text-sky-600 px-3.5 py-2 transition">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}" class="bg-sky-600 hover:bg-sky-700 text-white font-semibold rounded-xl px-5 py-2.5 text-sm transition shadow-sm shadow-sky-600/20">
                        Open Account
                    </a>
                @endauth
            </div>

            {{-- Mobile Menu Trigger Button --}}
            <button @click="mobileOpen = !mobileOpen" class="lg:hidden p-2 rounded-lg text-slate-600 hover:bg-sky-50 hover:text-sky-600 transition">
                <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg x-show="mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        {{-- Mobile Dropdown Menu --}}
        <div x-show="mobileOpen" 
             x-transition:enter="transition ease-out duration-200" 
             x-transition:enter-start="opacity-0 -translate-y-2" 
             x-transition:enter-end="opacity-100 translate-y-0" 
             x-transition:leave="transition ease-in duration-150" 
             x-transition:leave-start="opacity-100 translate-y-0" 
             x-transition:leave-end="opacity-0 -translate-y-2" 
             class="lg:hidden border-t border-slate-200 py-4 space-y-1 bg-white rounded-b-2xl shadow-lg" 
             x-cloak>
            <a href="{{ route('home') }}" class="block px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600 rounded-lg">Home</a>
            <a href="{{ route('pricing') }}" class="block px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600 rounded-lg">Markets</a>
            <a href="{{ route('about') }}" class="block px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600 rounded-lg">About Firm</a>
            <a href="{{ route('service') }}" class="block px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600 rounded-lg">Careers</a>
            <a href="{{ route('contact') }}" class="block px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600 rounded-lg">Help Desk</a>
            <a href="{{ route('faq') }}" class="block px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600 rounded-lg">Legal Docs</a>
            <a href="{{ route('safety') }}" class="block px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600 rounded-lg">Security</a>
            <a href="{{ route('trading') }}" class="block px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600 rounded-lg">WebTrader</a>

            <div class="pt-4 px-4 space-y-2 border-t border-slate-100 mt-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="block w-full text-center bg-sky-600 text-white font-semibold rounded-xl py-3 text-sm">Client Portal</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-center text-slate-600 font-medium py-2 text-sm">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block w-full text-center text-slate-700 font-semibold py-2.5 text-sm border border-slate-200 rounded-xl">Sign In</a>
                    <a href="{{ route('register') }}" class="block w-full text-center bg-sky-600 text-white font-semibold rounded-xl py-3 text-sm">Open Account</a>
                @endauth
            </div>
        </div>
    </div>
</header>