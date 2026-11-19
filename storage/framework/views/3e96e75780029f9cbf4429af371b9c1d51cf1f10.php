
<?php
    $allocationTotal = $categoryAllocation->sum();
    $categoryColors = [
        'Trading'      => ['bg' => 'bg-primary',    'text' => 'text-primary'],
        'Investments'  => ['bg' => 'bg-info',        'text' => 'text-info'],
        'Copy Trading' => ['bg' => 'bg-warning',     'text' => 'text-warning'],
        'Pre-IPO'      => ['bg' => 'bg-gain',        'text' => 'text-gain'],
        'NFTs'         => ['bg' => 'bg-loss',        'text' => 'text-loss'],
    ];
?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    
    <div class="lg:col-span-2 bg-surface-raised border border-surface-border rounded-xl p-5">
        <h3 class="text-sm font-semibold text-content-primary mb-4">Portfolio Allocation</h3>

        <?php if($allocationTotal > 0): ?>
            
            <div class="flex rounded-full overflow-hidden h-3 bg-surface-overlay mb-5" role="img" aria-label="Portfolio allocation breakdown">
                <?php $__currentLoopData = $categoryAllocation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $color = $categoryColors[$category] ?? ['bg' => 'bg-content-tertiary', 'text' => 'text-content-tertiary']; ?>
                    <div class="<?php echo e($color['bg']); ?>"
                         style="width: <?php echo e(($amount / $allocationTotal) * 100); ?>%"
                         title="<?php echo e($category); ?>: <?php echo e(\App\Helpers\CurrencyHelper::formatForUser($amount)); ?>">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                <?php $__currentLoopData = $categoryAllocation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $color = $categoryColors[$category] ?? ['bg' => 'bg-content-tertiary', 'text' => 'text-content-tertiary']; ?>
                    <div class="flex items-center gap-2">
                        <div class="w-2.5 h-2.5 rounded-full <?php echo e($color['bg']); ?> shrink-0"></div>
                        <div>
                            <span class="text-xs text-content-secondary block"><?php echo e($category); ?></span>
                            <span class="text-sm font-semibold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($amount); ?></span>
                            <span class="text-[10px] text-content-tertiary ml-1">(<?php echo e(number_format(($amount / $allocationTotal) * 100, 1)); ?>%)</span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <p class="text-sm text-content-tertiary text-center py-8">No active investments across any module.</p>
        <?php endif; ?>
    </div>

    
    <div class="space-y-4">
        
        <div class="bg-surface-raised border border-surface-border rounded-xl p-4">
            <span class="text-xs text-content-tertiary uppercase tracking-wider block mb-1">Account Balance</span>
            <span class="text-xl font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($user->account_bal ?? 0); ?></span>
        </div>

        
        <?php if(!empty($tabs['loans']) && $totalLoanOutstanding > 0): ?>
            <div class="bg-surface-raised border border-surface-border rounded-xl p-4">
                <span class="text-xs text-content-tertiary uppercase tracking-wider block mb-1">Outstanding Loans</span>
                <span class="text-xl font-bold text-loss"><?php echo \App\Helpers\CurrencyHelper::formatForUser($totalLoanOutstanding); ?></span>
                <span class="text-xs text-content-tertiary block mt-0.5"><?php echo e($activeLoans->count()); ?> active loan<?php echo e($activeLoans->count() !== 1 ? 's' : ''); ?></span>
            </div>
        <?php endif; ?>

        
        <div class="bg-surface-raised border border-surface-border rounded-xl p-4">
            <span class="text-xs text-content-tertiary uppercase tracking-wider block mb-2">Active Positions</span>
            <div class="space-y-2">
                <?php if(!empty($tabs['trading'])): ?>
                    <div class="flex justify-between text-xs">
                        <span class="text-content-secondary">Open Trades</span>
                        <span class="text-content-primary font-medium"><?php echo e($openTrades->count()); ?></span>
                    </div>
                <?php endif; ?>
                <?php if(!empty($tabs['investments'])): ?>
                    <div class="flex justify-between text-xs">
                        <span class="text-content-secondary">Active Plans</span>
                        <span class="text-content-primary font-medium"><?php echo e($activePlans->count()); ?></span>
                    </div>
                <?php endif; ?>
                <?php if(!empty($tabs['copy_trading'])): ?>
                    <div class="flex justify-between text-xs">
                        <span class="text-content-secondary">Copy Positions</span>
                        <span class="text-content-primary font-medium"><?php echo e($activeCopyPositions->count()); ?></span>
                    </div>
                <?php endif; ?>
                <?php if(!empty($tabs['pre_ipo'])): ?>
                    <div class="flex justify-between text-xs">
                        <span class="text-content-secondary">Pre-IPO Holdings</span>
                        <span class="text-content-primary font-medium"><?php echo e($preIpoHoldings->count()); ?></span>
                    </div>
                <?php endif; ?>
                <?php if(!empty($tabs['nfts'])): ?>
                    <div class="flex justify-between text-xs">
                        <span class="text-content-secondary">NFTs Owned</span>
                        <span class="text-content-primary font-medium"><?php echo e($ownedNfts->count()); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        
        <?php if(($user->demo_bal ?? 0) > 0): ?>
            <div class="bg-surface-raised border border-surface-border rounded-xl p-4">
                <span class="inline-flex items-center gap-1.5 text-xs text-warning">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'exclamation-triangle','class' => 'w-3.5 h-3.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'exclamation-triangle','class' => 'w-3.5 h-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    Demo Balance: <?php echo \App\Helpers\CurrencyHelper::formatForUser($user->demo_bal); ?>
                </span>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\trades\partials\portfolio-tab-overview.blade.php ENDPATH**/ ?>