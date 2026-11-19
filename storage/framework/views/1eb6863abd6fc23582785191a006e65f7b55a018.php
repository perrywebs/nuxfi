<?php $attributes = $attributes->exceptProps(['title' => '', 'subtitle' => '', 'actions' => null]); ?>
<?php foreach (array_filter((['title' => '', 'subtitle' => '', 'actions' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-semibold text-content tracking-tight"><?php echo e($title); ?></h1>
        <?php if($subtitle): ?>
            <p class="mt-1 text-sm text-content-secondary"><?php echo e($subtitle); ?></p>
        <?php endif; ?>
    </div>
    <?php if($actions): ?>
        <div class="flex items-center gap-3">
            <?php echo e($actions); ?>

        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\components\admin\page-header.blade.php ENDPATH**/ ?>