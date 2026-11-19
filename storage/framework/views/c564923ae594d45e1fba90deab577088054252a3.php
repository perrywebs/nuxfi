<?php $attributes = $attributes->exceptProps(['class' => 'w-5 h-5']); ?>
<?php foreach (array_filter((['class' => 'w-5 h-5']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="<?php echo e($class ?? 'w-5 h-5'); ?>">
  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
</svg>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\components\icons\arrow-right.blade.php ENDPATH**/ ?>