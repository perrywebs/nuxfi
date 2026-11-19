<?php $attributes = $attributes->exceptProps(['type' => 'info', 'dismissible' => false]); ?>
<?php foreach (array_filter((['type' => 'info', 'dismissible' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
$classes = match($type) {
    'success' => 'bg-success-light border-success text-success',
    'danger' => 'bg-danger-light border-danger text-danger',
    'warning' => 'bg-warning-light border-warning text-warning',
    default => 'bg-info-light border-info text-info',
};
?>

<div <?php echo e($attributes->merge(['class' => "border-l-4 rounded-lg p-4 flex items-start gap-3 $classes"])); ?>

     <?php if($dismissible): ?> x-data="{ show: true }" x-show="show" x-transition <?php endif; ?>>
    <div class="flex-1 text-sm"><?php echo e($slot); ?></div>
    <?php if($dismissible): ?>
        <button @click="show = false" class="shrink-0 opacity-60 hover:opacity-100 transition-opacity">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\components\admin\alert.blade.php ENDPATH**/ ?>