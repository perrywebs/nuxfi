<?php $attributes = $attributes->exceptProps(['type' => 'neutral']); ?>
<?php foreach (array_filter((['type' => 'neutral']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
$classes = match($type) {
    'success', 'processed' => 'bg-success-light text-success',
    'danger', 'rejected', 'failed' => 'bg-danger-light text-danger',
    'warning', 'pending' => 'bg-warning-light text-warning',
    'info' => 'bg-info-light text-info',
    default => 'bg-surface-alt text-content-secondary',
};
?>

<span <?php echo e($attributes->merge(['class' => "inline-flex items-center text-xs font-medium px-2.5 py-0.5 rounded-full $classes"])); ?>>
    <?php echo e($slot); ?>

</span>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/components/admin/badge.blade.php ENDPATH**/ ?>