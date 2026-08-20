<?php $attributes = $attributes->exceptProps(['padding' => 'p-6', 'hover' => false]); ?>
<?php foreach (array_filter((['padding' => 'p-6', 'hover' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div <?php echo e($attributes->merge([
    'class' => 'bg-surface-card rounded-xl border border-border shadow-card ' . $padding
        . ($hover ? ' hover:shadow-card-hover hover:border-primary/20 transition-all duration-200' : '')
])); ?>>
    <?php echo e($slot); ?>

</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/components/admin/card.blade.php ENDPATH**/ ?>