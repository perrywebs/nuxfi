
<footer class="bg-gradient-to-b from-sky-50/40 via-sky-50/80 to-blue-50/50 border-t border-sky-100/80 text-slate-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10">
            
            
            <div class="lg:col-span-2 space-y-4">
                <img src="<?php echo e(asset('storage/app/public/' . $settings->logo)); ?>" alt="<?php echo e($settings->site_name); ?>" class="h-10 w-auto object-contain" />
                
                <p class="text-sm text-slate-600 max-w-sm leading-relaxed">
                    Providing institutional liquidity, wealth management, and transparent cross-asset execution for institutional and private clients worldwide.
                </p>

                <div class="pt-2">
                    <span class="block text-xs font-semibold text-sky-800 uppercase tracking-wider mb-1">Direct Client Support</span>
                    <a href="mailto:<?php echo e($settings->contact_email); ?>" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-900 hover:text-sky-600 transition">
                        <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <?php echo e($settings->contact_email); ?>

                    </a>
                </div>
            </div>

            
            <div>
                <h4 class="text-xs font-bold text-slate-900 uppercase tracking-widest mb-4">Corporate</h4>
                <ul class="space-y-2.5 text-sm font-medium">
                    <li><a href="<?php echo e(route('about')); ?>" class="text-slate-600 hover:text-sky-600 transition">About Firm</a></li>
                    <li><a href="<?php echo e(route('service')); ?>" class="text-slate-600 hover:text-sky-600 transition">Careers & Culture</a></li>
                    <li><a href="<?php echo e(route('contact')); ?>" class="text-slate-600 hover:text-sky-600 transition">Advisory Contact</a></li>
                </ul>
            </div>

            
            <div>
                <h4 class="text-xs font-bold text-slate-900 uppercase tracking-widest mb-4">Ecosystem</h4>
                <ul class="space-y-2.5 text-sm font-medium">
                    <li><a href="<?php echo e(route('trading')); ?>" class="text-slate-600 hover:text-sky-600 transition">WebTrader Engine</a></li>
                    <li><a href="<?php echo e(route('pricing')); ?>" class="text-slate-600 hover:text-sky-600 transition">Global Markets</a></li>
                    <li><a href="<?php echo e(route('safety')); ?>" class="text-slate-600 hover:text-sky-600 transition">Custody & Protection</a></li>
                    <li><a href="<?php echo e(route('faq')); ?>" class="text-slate-600 hover:text-sky-600 transition">Knowledgebase</a></li>
                </ul>
            </div>

            
            <div>
                <h4 class="text-xs font-bold text-slate-900 uppercase tracking-widest mb-4">Security & Socials</h4>
                <div class="flex items-center gap-3 mb-6">
                    
                    <a href="#" class="w-9 h-9 rounded-lg bg-white border border-sky-100 flex items-center justify-center text-slate-500 hover:text-sky-600 hover:border-sky-300 hover:shadow-sm transition" aria-label="Facebook">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                    </a>
                    
                    <a href="#" class="w-9 h-9 rounded-lg bg-white border border-sky-100 flex items-center justify-center text-slate-500 hover:text-sky-600 hover:border-sky-300 hover:shadow-sm transition" aria-label="Twitter">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    
                    <a href="#" class="w-9 h-9 rounded-lg bg-white border border-sky-100 flex items-center justify-center text-slate-500 hover:text-sky-600 hover:border-sky-300 hover:shadow-sm transition" aria-label="LinkedIn">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                </div>
                
                
                <div class="inline-flex items-center gap-3 bg-white px-3.5 py-2 rounded-xl border border-sky-200/60 shadow-sm">
                    <img src="<?php echo e(asset('temp/frontpage/img/security.png')); ?>" alt="Security Verified" class="h-8 w-auto opacity-90" />
                    <div>
                        <p class="text-[11px] font-bold text-slate-900 leading-tight">SSL Encrypted</p>
                        <p class="text-[10px] text-slate-500">Tier-1 Protection</p>
                    </div>
                </div>
            </div>

        </div>

        
        <div class="border-t border-sky-200/60 mt-12 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-xs text-slate-500 font-medium">
                &copy; <?php echo e(date('Y')); ?> <?php echo e($settings->site_name); ?>. Institutional Wealth Services. All rights reserved.
            </p>
            <div class="flex items-center space-x-6">
                <a href="<?php echo e(route('terms')); ?>" class="text-xs text-slate-500 hover:text-sky-600 font-medium transition">Terms of Service</a>
                <a href="<?php echo e(route('privacy')); ?>" class="text-xs text-slate-500 hover:text-sky-600 font-medium transition">Privacy Policy</a>
                <a href="<?php echo e(route('risk')); ?>" class="text-xs text-slate-500 hover:text-sky-600 font-medium transition">Risk Disclosure</a>
            </div>
        </div>
    </div>
</footer><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/home/partials/footer.blade.php ENDPATH**/ ?>