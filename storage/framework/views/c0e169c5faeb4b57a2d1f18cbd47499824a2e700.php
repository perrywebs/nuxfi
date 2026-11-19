<?php $attributes = $attributes->exceptProps(['align' => 'right', 'width' => 'w-48']); ?>
<?php foreach (array_filter((['align' => 'right', 'width' => 'w-48']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div x-data="{ open: false }" @click.away="open = false" <?php echo e($attributes->merge(['class' => 'relative inline-block'])); ?>>
    
    <div @click="open = !open" class="cursor-pointer">
        <?php echo e($trigger); ?>

    </div>
    
    <div x-show="open" x-transition
         class="absolute <?php echo e($align === 'right' ? 'left-0 sm:left-auto sm:right-0' : 'left-0'); ?> mt-2 <?php echo e($width); ?> bg-surface-raised rounded-xl border border-border shadow-lg py-1 z-50 max-h-[70vh] overflow-y-auto">
        <?php echo e($slot); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\components\admin\dropdown.blade.php ENDPATH**/ ?>