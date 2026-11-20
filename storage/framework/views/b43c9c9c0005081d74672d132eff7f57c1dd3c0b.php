
<?php
    $marketAssets = \App\Models\TradingAsset::where('is_active', true)
        ->whereNotNull('price')->where('price', '>', 0)
        ->orderByDesc('market_cap')
        ->take(5)->get();
?>

<div class="bg-surface-raised border border-surface-border rounded-xl overflow-hidden">
    <div class="px-5 py-4 border-b border-surface-border flex items-center gap-2">
        <?php echo $__env->make('components.icons.chart-bar', ['class' => 'w-5 h-5 text-primary'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <h3 class="text-sm font-semibold text-content-primary">Market Overview</h3>
    </div>

    <div class="p-4">
        <div class="flex gap-3 overflow-x-auto pb-2 scrollbar-thin">
            <?php $__currentLoopData = $marketAssets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $changePct = $asset->price_change_pct_24h ?? 0;
                    $isPositive = $changePct >= 0;
                    $isFirst = $index === 0;
                ?>

                <div class="flex-shrink-0 w-[180px] rounded-lg p-3.5 border transition-colors
                    <?php echo e($isFirst
                        ? 'bg-primary border-primary'
                        : 'bg-surface-overlay border-surface-border hover:border-surface-border-light'); ?>">

                    <div class="flex items-center gap-2 mb-3">
                        <?php if($asset->logo_url): ?>
                            <img src="<?php echo e($asset->logo_url); ?>" alt="<?php echo e($asset->symbol); ?>" class="w-7 h-7 rounded-full flex-shrink-0">
                        <?php else: ?>
                            <span class="w-7 h-7 rounded-full flex items-center justify-center flex-shrink-0 text-[10px] font-bold
                                <?php echo e($isFirst ? 'bg-white/20 text-white' : 'bg-primary/20 text-primary'); ?>">
                                <?php echo e(strtoupper(substr($asset->symbol, 0, 2))); ?>

                            </span>
                        <?php endif; ?>
                        <span class="text-xs font-semibold truncate <?php echo e($isFirst ? 'text-white' : 'text-content-primary'); ?>">
                            <?php echo e($asset->symbol); ?>

                        </span>
                        <span class="ml-auto flex items-center gap-0.5 text-[11px] font-medium
                            <?php echo e($isFirst
                                ? ($isPositive ? 'text-white/80' : 'text-white/80')
                                : ($isPositive ? 'text-gain' : 'text-loss')); ?>">
                            <?php echo e($isPositive ? '↑' : '↓'); ?>

                            <?php echo e(abs(round($changePct, 2))); ?>%
                        </span>
                    </div>

                    <p class="text-lg font-bold <?php echo e($isFirst ? 'text-white' : 'text-content-primary'); ?>">
                        <?php echo e($asset->formatted_price); ?>

                    </p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($marketAssets->isEmpty()): ?>
                <div class="w-full py-6 text-center">
                    <p class="text-xs text-content-tertiary">No market data available</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/user/partials/market-overview.blade.php ENDPATH**/ ?>