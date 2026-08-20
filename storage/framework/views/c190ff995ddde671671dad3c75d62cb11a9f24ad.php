<?php $attributes = $attributes->exceptProps(['label' => '', 'for' => '', 'error' => '', 'helper' => '', 'required' => false]); ?>
<?php foreach (array_filter((['label' => '', 'for' => '', 'error' => '', 'helper' => '', 'required' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div <?php echo e($attributes->merge(['class' => ''])); ?>>
    <?php if($label): ?>
        <label <?php if($for): ?> for="<?php echo e($for); ?>" <?php endif; ?> class="block text-sm font-medium text-content mb-1.5">
            <?php echo e($label); ?>

            <?php if($required): ?>
                <span class="text-danger">*</span>
            <?php endif; ?>
        </label>
    <?php endif; ?>
    <?php echo e($slot); ?>

    <?php if($helper && !$error): ?>
        <p class="text-xs text-content-muted mt-1"><?php echo e($helper); ?></p>
    <?php endif; ?>
    <?php if($error): ?>
        <p class="text-xs text-danger mt-1"><?php echo e($error); ?></p>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/components/admin/form-group.blade.php ENDPATH**/ ?>