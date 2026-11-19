<?php $attributes = $attributes->exceptProps(['title' => '', 'actions' => null, 'tableId' => null]); ?>
<?php foreach (array_filter((['title' => '', 'actions' => null, 'tableId' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="bg-surface-card rounded-xl border border-border shadow-card">
    <?php if($title || $actions): ?>
        <div class="flex items-center justify-between px-5 py-4 border-b border-border">
            <?php if($title): ?>
                <h3 class="text-base font-medium text-content"><?php echo e($title); ?></h3>
            <?php endif; ?>
            <?php if($actions): ?>
                <div class="flex items-center gap-3">
                    <?php echo e($actions); ?>

                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="overflow-x-auto">
        <?php echo e($slot); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\components\admin\table-card.blade.php ENDPATH**/ ?>