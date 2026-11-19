<?php $attributes = $attributes->exceptProps(['href', 'icon' => '', 'active' => false, 'badge' => null]); ?>
<?php foreach (array_filter((['href', 'icon' => '', 'active' => false, 'badge' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<a href="<?php echo e($href); ?>"
   class="mx-3 flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-colors cursor-pointer
          <?php echo e($active
              ? 'bg-sidebar-active text-content-inverse relative before:absolute before:left-0 before:top-1/2 before:-translate-y-1/2 before:h-5 before:w-0.5 before:rounded-full before:bg-primary'
              : 'text-sidebar-text hover:bg-sidebar-hover'); ?>">
    <?php if($icon): ?>
        <?php echo $icon; ?>

    <?php endif; ?>
    <span class="flex-1"><?php echo e($slot); ?></span>
    <?php if($badge !== null): ?>
        <span class="<?php echo e($badge === 'OFF' ? 'bg-danger/20 text-danger' : 'bg-primary text-primary-foreground'); ?> text-[0.65rem] font-semibold px-1.5 py-0.5 rounded-full min-w-[1.25rem] text-center"><?php echo e($badge); ?></span>
    <?php endif; ?>
</a>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\components\admin\sidebar-item.blade.php ENDPATH**/ ?>