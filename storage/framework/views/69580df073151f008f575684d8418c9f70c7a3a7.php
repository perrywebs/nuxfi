
<?php
    $allocationTotal = $tradeAllocation->sum();
    $allocationColors = [
        'crypto' => 'bg-primary', 'forex' => 'bg-info', 'stock' => 'bg-warning',
        'etf' => 'bg-gain', 'index' => 'bg-loss', 'unknown' => 'bg-content-tertiary',
    ];
?>


<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Invested', 'value' => \App\Helpers\CurrencyHelper::formatForUser($totalTradeInvested), 'icon' => 'chart-bar'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Unrealized P/L', 'value' => \App\Helpers\CurrencyHelper::formatForUser($totalUnrealizedPL), 'icon' => 'arrow-trending-up', 'color' => $totalUnrealizedPL >= 0 ? 'gain' : 'loss'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Realized P/L', 'value' => \App\Helpers\CurrencyHelper::formatForUser($realizedPL), 'icon' => 'arrow-trending-down', 'color' => $realizedPL >= 0 ? 'gain' : 'loss'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Open Positions', 'value' => $openTrades->count(), 'icon' => 'briefcase'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    
    <div class="lg:col-span-2 space-y-4">
        <h3 class="text-sm font-semibold text-content-secondary uppercase tracking-wider">Open Positions</h3>
        <?php if($positionsByAsset->count() > 0): ?>
            <?php $__currentLoopData = $positionsByAsset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assetId => $trades): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $asset = $trades->first()->tradingAsset;
                    $assetInvested = $trades->sum('amount');
                    $assetPL = $trades->sum('unrealized_pl');
                ?>
                <div class="bg-surface-raised border border-surface-border rounded-xl overflow-hidden">
                    <div class="px-5 py-3 border-b border-surface-border flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <?php if($asset && $asset->logo_url): ?>
                                <img src="<?php echo e($asset->logo_url); ?>" alt="" class="w-8 h-8 rounded-full bg-surface-overlay" loading="lazy">
                            <?php else: ?>
                                <div class="w-8 h-8 rounded-full bg-surface-overlay flex items-center justify-center text-xs font-bold text-content-secondary">
                                    <?php echo e(strtoupper(substr(($asset ? $asset->symbol : '?'), 0, 2))); ?>

                                </div>
                            <?php endif; ?>
                            <div>
                                <span class="text-sm font-bold text-content-primary"><?php echo e($asset ? $asset->name : 'Unknown'); ?></span>
                                <?php if($asset && $asset->symbol): ?>
                                    <span class="text-xs text-content-tertiary ml-1"><?php echo e($asset->symbol); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="text-xs text-content-tertiary block">Net P/L</span>
                            <?php echo $__env->make('user.trades.partials.pnl-display', ['value' => $assetPL], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                    <div class="divide-y divide-surface-border">
                        <?php $__currentLoopData = $trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('user.trades.show', $trade->id)); ?>" class="flex items-center justify-between px-5 py-3 hover:bg-surface-overlay/50 transition-colors group">
                                <div class="flex items-center gap-3">
                                    <span class="inline-flex items-center gap-1 text-xs font-semibold uppercase <?php echo e($trade->action === 'buy' ? 'text-gain' : 'text-loss'); ?>">
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => ''.e($trade->action === 'buy' ? 'arrow-trending-up' : 'arrow-trending-down').'','class' => 'w-3.5 h-3.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => ''.e($trade->action === 'buy' ? 'arrow-trending-up' : 'arrow-trending-down').'','class' => 'w-3.5 h-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                        <?php echo e($trade->action); ?>

                                    </span>
                                    <span class="text-sm text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->amount); ?></span>
                                    <span class="px-1.5 py-0.5 text-[10px] font-medium rounded bg-surface-overlay text-content-secondary"><?php echo e($trade->leverage); ?>x</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <?php echo $__env->make('user.trades.partials.pnl-display', ['value' => $trade->unrealized_pl, 'size' => 'sm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'chevron-right','class' => 'w-4 h-4 text-content-tertiary opacity-0 group-hover:opacity-100 transition-opacity']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'chevron-right','class' => 'w-4 h-4 text-content-tertiary opacity-0 group-hover:opacity-100 transition-opacity']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="px-5 py-2.5 bg-surface-overlay/30 text-xs text-content-tertiary">
                        <?php echo e($trades->count()); ?> position<?php echo e($trades->count() !== 1 ? 's' : ''); ?> &middot; <?php echo \App\Helpers\CurrencyHelper::formatForUser($assetInvested); ?> invested
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php echo $__env->make('user.trades.partials.empty-state', [
                'icon' => 'chart-bar',
                'title' => 'No open trades',
                'message' => 'You have no open live trades. Start trading to build your portfolio.',
                'actionUrl' => route('trade'),
                'actionLabel' => 'Start Trading',
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>

    
    <div class="space-y-6">
        
        <div class="bg-surface-raised border border-surface-border rounded-xl p-5">
            <h3 class="text-sm font-semibold text-content-primary mb-4">Asset Allocation</h3>
            <?php if($allocationTotal > 0): ?>
                <div class="flex rounded-full overflow-hidden h-3 bg-surface-overlay mb-4">
                    <?php $__currentLoopData = $tradeAllocation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class => $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="<?php echo e($allocationColors[$class] ?? 'bg-content-tertiary'); ?>"
                             style="width: <?php echo e(($amount / $allocationTotal) * 100); ?>%"
                             title="<?php echo e(ucfirst($class)); ?>: <?php echo e(\App\Helpers\CurrencyHelper::formatForUser($amount)); ?>">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="space-y-2">
                    <?php $__currentLoopData = $tradeAllocation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class => $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-2.5 h-2.5 rounded-full <?php echo e($allocationColors[$class] ?? 'bg-content-tertiary'); ?>"></div>
                                <span class="text-xs text-content-secondary capitalize"><?php echo e($class); ?></span>
                            </div>
                            <span class="text-xs font-medium text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($amount); ?></span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <p class="text-xs text-content-tertiary text-center py-4">No trades to display</p>
            <?php endif; ?>
        </div>

        
        <div class="bg-surface-raised border border-surface-border rounded-xl p-5">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-semibold text-content-primary">Recent Activity</h3>
                <a href="<?php echo e(route('user.trades.history')); ?>" class="text-xs text-primary hover:text-primary-light transition-colors">View All</a>
            </div>
            <?php if($recentClosed->count() > 0): ?>
                <div class="space-y-3">
                    <?php $__currentLoopData = $recentClosed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $asset = $trade->tradingAsset; ?>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2.5 min-w-0">
                                <?php if($asset && $asset->logo_url): ?>
                                    <img src="<?php echo e($asset->logo_url); ?>" alt="" class="w-7 h-7 rounded-full bg-surface-overlay shrink-0" loading="lazy">
                                <?php else: ?>
                                    <div class="w-7 h-7 rounded-full bg-surface-overlay flex items-center justify-center text-[10px] font-bold text-content-secondary shrink-0">
                                        <?php echo e(strtoupper(substr(($asset ? $asset->symbol : $trade->asset_name) ?? '?', 0, 2))); ?>

                                    </div>
                                <?php endif; ?>
                                <div class="min-w-0">
                                    <span class="text-xs font-medium text-content-primary truncate block"><?php echo e($asset ? $asset->name : $trade->asset_name); ?></span>
                                    <span class="text-[10px] text-content-tertiary"><?php echo e(\Carbon\Carbon::parse($trade->settled_at ?? $trade->updated_at)->diffForHumans()); ?></span>
                                </div>
                            </div>
                            <?php echo $__env->make('user.trades.partials.pnl-display', ['value' => $trade->profit_loss, 'size' => 'sm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <p class="text-xs text-content-tertiary text-center py-4">No closed trades yet</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\trades\partials\portfolio-tab-trading.blade.php ENDPATH**/ ?>