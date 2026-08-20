<?php $attributes = $attributes->exceptProps(['label', 'value', 'icon' => null, 'trend' => null, 'trendUp' => true]); ?>
<?php foreach (array_filter((['label', 'value', 'icon' => null, 'trend' => null, 'trendUp' => true]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="bg-surface-card rounded-xl border border-border shadow-card p-5">
    <div class="flex items-start justify-between">
        <div>
            <p class="text-xs font-medium text-content-muted uppercase tracking-wide"><?php echo e($label); ?></p>
            <p class="text-stat text-content mt-3"><?php echo e($value); ?></p>
            <?php if($trend): ?>
                <p class="mt-2 text-xs font-medium <?php echo e($trendUp ? 'text-success' : 'text-danger'); ?>">
                    <?php if($trendUp): ?>
                        <svg class="w-3 h-3 inline" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" /></svg>
                    <?php else: ?>
                        <svg class="w-3 h-3 inline" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 4.5l15 15m0 0V8.25m0 11.25H8.25" /></svg>
                    <?php endif; ?>
                    <?php echo e($trend); ?>

                </p>
            <?php endif; ?>
        </div>
        <?php if($icon): ?>
            <div class="w-10 h-10 rounded-lg bg-primary-light flex items-center justify-center shrink-0">
                <?php echo $icon; ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/components/admin/stat-card.blade.php ENDPATH**/ ?>