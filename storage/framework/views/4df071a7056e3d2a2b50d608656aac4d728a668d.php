<?php $attributes = $attributes->exceptProps(['active' => '']); ?>
<?php foreach (array_filter((['active' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div x-data="{ activeTab: '<?php echo e($active); ?>' }" <?php echo e($attributes->merge(['class' => ''])); ?>>
    
    <div class="flex gap-1 border-b border-border">
        <?php echo e($tabs); ?>

    </div>
    
    <div class="mt-5">
        <?php echo e($slot); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\components\admin\tabs.blade.php ENDPATH**/ ?>