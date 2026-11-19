<?php $attributes = $attributes->exceptProps(['label' => 'Color']); ?>
<?php foreach (array_filter((['label' => 'Color']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div x-data="{
    val: <?php echo e($attributes->first('x-model') ? '' : "'#000000'"); ?>,
    sync(e) { this.val = e.target.value; }
}" class="flex flex-col gap-1.5">
    <label class="text-xs font-medium text-content-secondary"><?php echo e($label); ?></label>
    <div class="flex items-center gap-2">
        <input type="color"
            <?php echo e($attributes->whereStartsWith('x-model')); ?>

            @input="sync($event)"
            class="w-10 h-10 rounded-lg border border-border cursor-pointer bg-transparent p-0.5 shrink-0
                   [&::-webkit-color-swatch-wrapper]:p-0 [&::-webkit-color-swatch]:rounded-md [&::-webkit-color-swatch]:border-0
                   [&::-moz-color-swatch]:rounded-md [&::-moz-color-swatch]:border-0">
        <input type="text"
            <?php echo e($attributes->whereStartsWith('x-model')); ?>

            maxlength="7"
            pattern="^#[0-9A-Fa-f]{6}$"
            class="flex-1 bg-surface-alt border border-border rounded-lg px-3 py-2 text-sm text-content font-mono
                   focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors"
            placeholder="#000000">
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\components\admin\color-field.blade.php ENDPATH**/ ?>