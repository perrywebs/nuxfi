
<?php
    $forexAssets = \App\Models\TradingAsset::where('is_active', true)
        ->where('asset_class', 'forex')->whereNotNull('price')->where('price', '>', 0)
        ->take(3)->get();
?>

<?php if($forexAssets->isNotEmpty()): ?>
<div class="bg-surface-raised border border-surface-border rounded-xl overflow-hidden">
    <div class="px-5 py-4 border-b border-surface-border flex items-center gap-2">
        <span class="w-2 h-2 rounded-full bg-info"></span>
        <h3 class="text-sm font-semibold text-content-primary">Featured Forex</h3>
    </div>

    <div class="p-4">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
            <?php $__currentLoopData = $forexAssets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pair): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $changePct = $pair->price_change_pct_24h ?? 0;
                    $isPositive = $changePct >= 0;
                ?>
                <div class="flex items-center gap-3 rounded-lg bg-surface-overlay border border-surface-border p-3 hover:border-surface-border-light transition-colors">
                    <?php if($pair->logo_url): ?>
                        <img src="<?php echo e($pair->logo_url); ?>" alt="<?php echo e($pair->symbol); ?>" class="w-8 h-8 rounded-lg flex-shrink-0 bg-white/5 p-0.5">
                    <?php else: ?>
                        <span class="w-8 h-8 rounded-lg bg-info/20 text-info text-[10px] font-bold flex items-center justify-center flex-shrink-0">
                            <?php echo e(strtoupper(substr($pair->symbol, 0, 3))); ?>

                        </span>
                    <?php endif; ?>

                    <div class="min-w-0 flex-1">
                        <p class="text-xs text-content-primary font-medium truncate"><?php echo e($pair->name); ?></p>
                        <span class="text-[10px] text-content-tertiary uppercase"><?php echo e($pair->symbol); ?></span>
                    </div>

                    <div class="text-right flex-shrink-0">
                        <p class="text-sm font-bold text-content-primary">$<?php echo e($pair->formatted_price); ?></p>
                        <span class="text-[10px] font-medium <?php echo e($isPositive ? 'text-gain' : 'text-loss'); ?>">
                            <?php echo e($isPositive ? '+' : ''); ?><?php echo e(round($changePct, 2)); ?>%
                        </span>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\partials\featured-forex.blade.php ENDPATH**/ ?>