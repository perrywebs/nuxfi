
<?php
    $user = Auth::user();
    $balance = $user->account_bal ?? 0;
    $profit  = $user->roi ?? 0;
    $isVerified = $user->account_verify === 'Verified';

    // Profit percentage relative to balance
    $profitPct = $balance > 0 ? round(($profit / $balance) * 100, 2) : null;
    $profitPositive = $profit >= 0;
?>

<div class="relative rounded-xl overflow-hidden group/hero">

    
    <div class="absolute top-0 inset-x-0 h-[2px] bg-gradient-to-r from-primary/0 via-primary to-primary/0"></div>

    
    <div class="bg-gradient-to-br from-surface-raised via-surface-raised to-surface-overlay border border-surface-border rounded-xl p-5 sm:p-6 relative">

        
        <div class="absolute -top-20 -right-20 w-56 h-56 bg-primary/[0.04] rounded-full blur-2xl pointer-events-none"></div>
        <div class="absolute -bottom-16 -left-16 w-40 h-40 bg-info/[0.03] rounded-full blur-2xl pointer-events-none"></div>
        <div class="absolute top-1/2 right-8 w-24 h-24 border border-primary/[0.06] rounded-full pointer-events-none hidden sm:block"></div>
        <div class="absolute top-1/3 right-16 w-12 h-12 border border-primary/[0.04] rounded-full pointer-events-none hidden sm:block"></div>

        
        <div class="flex items-center justify-between mb-4 relative">
            <div>
                <p class="text-xs text-content-tertiary font-medium mb-0.5">Welcome back,</p>
                <p class="text-sm font-semibold text-content-primary"><?php echo e($user->name); ?> <?php echo e($user->l_name); ?></p>
            </div>

            <div class="flex items-center gap-2">
                
                <?php if($settings->wallet_status == 'on' && $user->wallet_connect_status == 'on'): ?>
                    <a href="<?php echo e(route('connect-wallet')); ?>" class="inline-flex items-center gap-1.5 text-xs font-medium text-primary bg-primary/10 border border-primary/20 px-3 py-1.5 rounded-full hover:bg-primary/20 transition-colors">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'wallet','class' => 'w-3.5 h-3.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'wallet','class' => 'w-3.5 h-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        Connect Wallet
                    </a>
                <?php endif; ?>

                
                <?php if($settings->enable_kyc == 'yes'): ?>
                    <?php if($isVerified): ?>
                        <span class="inline-flex items-center gap-1.5 text-xs font-medium text-gain bg-gain/10 border border-gain/20 px-3 py-1.5 rounded-full">
                            <?php echo $__env->make('components.icons.shield-check', ['class' => 'w-3.5 h-3.5'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            Verified
                        </span>
                    <?php elseif($user->account_verify === 'Under review'): ?>
                        <span class="inline-flex items-center gap-1.5 text-xs font-medium text-info bg-info/10 border border-info/20 px-3 py-1.5 rounded-full">
                            <?php echo $__env->make('components.icons.shield-check', ['class' => 'w-3.5 h-3.5'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            Under Review
                        </span>
                    <?php else: ?>
                        <a href="<?php echo e(route('account.verify')); ?>" class="inline-flex items-center gap-1.5 text-xs font-medium text-warning bg-warning/10 border border-warning/20 px-3 py-1.5 rounded-full hover:bg-warning/20 transition-colors">
                            <?php echo $__env->make('components.icons.shield-check', ['class' => 'w-3.5 h-3.5'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            Unverified
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="h-px bg-gradient-to-r from-surface-border/0 via-surface-border to-surface-border/0 mb-5"></div>

        
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 relative mb-5 overflow-hidden">

            
            <div class="min-w-0">
                <div class="flex items-center gap-2 mb-2">
                    <div class="p-1.5 rounded-md bg-primary-subtle">
                        <?php echo $__env->make('components.icons.wallet', ['class' => 'w-4 h-4 text-primary'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <span class="text-xs font-medium uppercase tracking-widest text-content-tertiary">Portfolio Value</span>
                </div>
                <p class="text-content-primary tracking-tight truncate">
                    <span class="text-base sm:text-2xl font-semibold text-content-secondary align-top"><?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?></span><span class="text-2xl sm:text-4xl font-bold"><?php echo e(number_format(Auth::user()->convertToUserCurrency($balance), 2, '.', ',')); ?></span>
                </p>
            </div>

            
            <div class="bg-surface-overlay/40 border border-surface-border rounded-lg p-3 sm:p-3.5 flex items-center gap-3 sm:min-w-[220px] overflow-hidden">
                <div class="p-2 rounded-lg <?php echo e($profitPositive ? 'bg-gain/10' : 'bg-loss/10'); ?> shrink-0 ring-1 <?php echo e($profitPositive ? 'ring-gain/20' : 'ring-loss/20'); ?>">
                    <?php echo $__env->make('components.icons.arrow-trending-up', ['class' => 'w-4 h-4 ' . ($profitPositive ? 'text-gain' : 'text-loss')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-[10px] text-content-tertiary font-medium uppercase tracking-widest mb-0.5">Profit / Loss</p>
                    <div class="flex items-baseline gap-1.5 sm:gap-2">
                        <span class="text-sm sm:text-lg font-bold text-content-primary truncate min-w-0"><?php echo \App\Helpers\CurrencyHelper::formatForUser($profit); ?></span>
                        <?php if($profitPct !== null): ?>
                            <span class="inline-flex items-center gap-0.5 text-[11px] font-semibold px-1.5 py-0.5 rounded shrink-0 <?php echo e($profitPositive ? 'bg-gain/10 text-gain' : 'bg-loss/10 text-loss'); ?>">
                                <?php echo e($profitPositive ? '↑' : '↓'); ?> <?php echo e(abs($profitPct)); ?>%
                            </span>
                        <?php else: ?>
                            <span class="text-xs font-medium text-content-tertiary shrink-0">N/A</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>

        
        <div class="h-px bg-gradient-to-r from-surface-border/0 via-surface-border to-surface-border/0 mb-4"></div>

        
        <div class="flex items-center gap-2 sm:gap-3 relative">
            <a href="<?php echo e(route('deposits')); ?>" class="flex-1 flex items-center justify-center gap-1.5 bg-primary hover:bg-primary-dark text-content-inverse text-xs sm:text-sm font-medium py-2 sm:py-2.5 rounded-lg transition-colors">
                <?php echo $__env->make('components.icons.arrow-down-tray', ['class' => 'w-4 h-4'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                Deposit
            </a>
            <a href="<?php echo e(route('withdrawalsdeposits')); ?>" class="flex-1 flex items-center justify-center gap-1.5 bg-surface-overlay hover:bg-surface-border text-content-primary text-xs sm:text-sm font-medium py-2 sm:py-2.5 rounded-lg border border-surface-border transition-colors">
                <?php echo $__env->make('components.icons.arrow-up-tray', ['class' => 'w-4 h-4'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                Withdraw
            </a>
            <?php if(!empty($mod['trading'])): ?>
            <a href="<?php echo e(route('trade')); ?>" class="flex-1 flex items-center justify-center gap-1.5 bg-surface-overlay hover:bg-surface-border text-content-primary text-xs sm:text-sm font-medium py-2 sm:py-2.5 rounded-lg border border-surface-border transition-colors">
                <?php echo $__env->make('components.icons.chart-bar', ['class' => 'w-4 h-4'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                Trade
            </a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\partials\portfolio-hero.blade.php ENDPATH**/ ?>