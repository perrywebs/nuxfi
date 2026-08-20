<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

    
    <?php if(Auth::user()->dashboard_banner_enabled && Auth::user()->dashboard_banner_message): ?>
        <?php $bannerType = Auth::user()->dashboard_banner_type ?? 'warning'; ?>
        <div class="rounded-xl border p-4 flex items-start gap-3
            <?php echo e($bannerType === 'success' ? 'bg-gain/10 border-gain/20' : ''); ?>

            <?php echo e($bannerType === 'warning' ? 'bg-warning/10 border-warning/20' : ''); ?>

            <?php echo e($bannerType === 'danger' ? 'bg-loss/10 border-loss/20' : ''); ?>">
            <?php if($bannerType === 'success'): ?>
                <svg class="w-5 h-5 text-gain flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <?php elseif($bannerType === 'danger'): ?>
                <svg class="w-5 h-5 text-loss flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" /></svg>
            <?php else: ?>
                <svg class="w-5 h-5 text-warning flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" /></svg>
            <?php endif; ?>
            <p class="text-sm font-medium <?php echo e($bannerType === 'success' ? 'text-gain' : ''); ?><?php echo e($bannerType === 'warning' ? 'text-warning' : ''); ?><?php echo e($bannerType === 'danger' ? 'text-loss' : ''); ?>">
                <?php echo e(Auth::user()->dashboard_banner_message); ?>

            </p>
        </div>
    <?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.danger-alert','data' => []]); ?>
<?php $component->withName('danger-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.success-alert','data' => []]); ?>
<?php $component->withName('success-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, []); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>

    
    <?php echo $__env->make('user.partials.ticker-tape', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        
        <div class="lg:col-span-5 space-y-5">

            
            <?php if(Auth::user()->signal_strength_enabled): ?>
            <?php echo $__env->make('user.partials.signal-strength', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            
            <?php echo $__env->make('user.partials.portfolio-hero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            
            <div class="grid grid-cols-2 gap-3 overflow-hidden">
                <?php echo $__env->make('user.partials.stat-card', [
                    'label' => 'Total Profit',
                     'value' => \App\Helpers\CurrencyHelper::formatForUser(Auth::user()->roi),
                    'icon'  => 'arrow-trending-up',
                    'color' => 'gain',
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('user.partials.stat-card', [
                    'label' => 'Bonus',
                    'value' => \App\Helpers\CurrencyHelper::formatForUser(Auth::user()->bonus),
                    'icon'  => 'gift',
                    'color' => 'info',
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('user.partials.stat-card', [
                    'label' => 'Referral Bonus',
                    'value' => \App\Helpers\CurrencyHelper::formatForUser(Auth::user()->ref_bonus),
                    'icon'  => 'users',
                    'color' => 'warning',
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('user.partials.stat-card', [
                    'label' => 'Withdrawals',
                    'value' => \App\Helpers\CurrencyHelper::formatForUser($total_withdrawal),
                    'icon'  => 'arrow-up-tray',
                    'color' => 'loss',
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            
            <?php if(!empty($mod['trading'])): ?>
            <a href="<?php echo e(route('trade')); ?>" class="block w-full text-center bg-primary hover:bg-primary-dark text-content-inverse font-semibold text-sm py-3 rounded-xl transition-colors">
                Trade Now
            </a>
            <?php endif; ?>

            
            <?php if($settings->wallet_status == 'on' && Auth::user()->wallet_connect_status == 'on'): ?>
            <a href="<?php echo e(route('connect-wallet')); ?>"
               class="group relative block w-full overflow-hidden bg-surface-raised border border-primary/30 rounded-xl p-4 hover:border-primary/60 transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-primary-subtle group-hover:bg-primary/20 transition-colors">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'wallet','class' => 'w-5 h-5 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'wallet','class' => 'w-5 h-5 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-content-primary">Connect Wallet</p>
                            <p class="text-xs text-content-tertiary">Earn <?php echo \App\Helpers\CurrencyHelper::formatForUser($settings->min_return); ?> daily</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="hidden sm:inline-flex items-center gap-1 text-[11px] font-medium px-2 py-0.5 rounded-full bg-gain/10 text-gain">
                            <span class="w-1.5 h-1.5 rounded-full bg-gain animate-pulse"></span>
                            Active
                        </span>
                        <svg class="w-4 h-4 text-content-tertiary group-hover:text-primary group-hover:translate-x-0.5 transition-all" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </div>
                </div>
            </a>
            <?php endif; ?>

            
            <?php echo $__env->make('user.partials.quick-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            
            <?php echo $__env->make('user.partials.support-widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            
            <?php if(!empty($mod['pre_ipo']) && $preIpoHoldings->count() > 0): ?>
            <div class="bg-surface-raised border border-surface-border rounded-xl p-5">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-semibold text-content-primary">Pre-IPO Portfolio</h3>
                    <a href="<?php echo e(route('user.pre-ipo.holdings')); ?>" class="text-xs text-primary hover:text-primary-dark transition-colors">View All</a>
                </div>
                <?php
                    $piTotalInvested = $preIpoHoldings->sum('total_cost');
                    $piTotalValue = $preIpoHoldings->sum(fn($h) => $h->current_value);
                    $piPnl = $piTotalValue - $piTotalInvested;
                ?>
                <div class="grid grid-cols-3 gap-3 mb-4">
                    <div>
                        <p class="text-xs text-content-tertiary">Invested</p>
                        <p class="text-sm font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($piTotalInvested); ?></p>
                    </div>
                    <div>
                        <p class="text-xs text-content-tertiary">Value</p>
                        <p class="text-sm font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($piTotalValue); ?></p>
                    </div>
                    <div>
                        <p class="text-xs text-content-tertiary">P/L</p>
                        <p class="text-sm font-bold <?php echo e($piPnl >= 0 ? 'text-gain' : 'text-loss'); ?>">
                            <?php echo e($piPnl >= 0 ? '+' : ''); ?><?php echo \App\Helpers\CurrencyHelper::formatForUser($piPnl); ?>
                        </p>
                    </div>
                </div>
                <div class="space-y-2">
                    <?php $__currentLoopData = $preIpoHoldings->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $holding): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center justify-between text-xs">
                        <div class="flex items-center gap-2">
                            <?php if($holding->company->logo): ?>
                            <img src="<?php echo e(asset('storage/' . $holding->company->logo)); ?>" class="w-5 h-5 rounded-full" alt="">
                            <?php else: ?>
                            <div class="w-5 h-5 rounded-full bg-surface-overlay flex items-center justify-center text-content-tertiary text-[10px] font-bold"><?php echo e(substr($holding->company->symbol, 0, 1)); ?></div>
                            <?php endif; ?>
                            <span class="text-content-primary font-medium"><?php echo e($holding->company->symbol); ?></span>
                        </div>
                        <div class="text-right">
                            <span class="text-content-secondary"><?php echo e(number_format($holding->shares)); ?> shares</span>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($preIpoHoldings->count() > 3): ?>
                    <p class="text-xs text-content-tertiary text-center pt-1">+ <?php echo e($preIpoHoldings->count() - 3); ?> more</p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>

            
            <?php if(!empty($mod['copy_trading'])): ?>
            <?php echo $__env->make('user.partials.top-experts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

        </div>

        
        <div class="lg:col-span-7 space-y-5">

            
            <?php echo $__env->make('user.partials.market-overview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            
            <?php echo $__env->make('user.partials.featured-etfs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            
            <?php echo $__env->make('user.partials.featured-forex', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            
            <?php echo $__env->make('user.partials.recent-transactions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/user/dashboard.blade.php ENDPATH**/ ?>