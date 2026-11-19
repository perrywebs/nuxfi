
<?php
    $asset = $trade->tradingAsset ?? null;
    $logoUrl = $asset->logo_url ?? null;
    $symbol = $asset ? $asset->symbol : ($trade->asset_name ?? '—');
    $name = $asset ? $asset->name : '';
?>

<div class="flex items-center gap-2.5 min-w-0">
    <?php if($logoUrl): ?>
        <img src="<?php echo e($logoUrl); ?>" alt="<?php echo e($symbol); ?>" class="w-6 h-6 rounded-full shrink-0 bg-surface-overlay" loading="lazy" />
    <?php else: ?>
        <div class="w-6 h-6 rounded-full bg-surface-overlay flex items-center justify-center shrink-0">
            <span class="text-[10px] font-bold text-content-tertiary"><?php echo e(strtoupper(substr($symbol, 0, 2))); ?></span>
        </div>
    <?php endif; ?>
    <div class="min-w-0">
        <p class="text-sm font-semibold text-content-primary truncate" title="<?php echo e($symbol); ?><?php echo e($name ? ' — ' . $name : ''); ?>"><?php echo e($symbol); ?></p>
        <?php if($name): ?>
            <p class="text-xs text-content-tertiary truncate" title="<?php echo e($name); ?>"><?php echo e($name); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\trades\partials\asset-cell.blade.php ENDPATH**/ ?>