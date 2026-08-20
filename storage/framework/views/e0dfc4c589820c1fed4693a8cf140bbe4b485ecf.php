<?php $attributes = $attributes->exceptProps(['label', 'icon' => '', 'active' => false, 'id', 'badge' => null]); ?>
<?php foreach (array_filter((['label', 'icon' => '', 'active' => false, 'id', 'badge' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div x-data="{ expanded: <?php echo e($active ? 'true' : 'false'); ?> }">
    
    <button @click="expanded = !expanded"
            class="mx-3 w-[calc(100%-1.5rem)] flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-colors cursor-pointer
                   <?php echo e($active ? 'text-content-inverse' : 'text-sidebar-text hover:bg-sidebar-hover'); ?>">
        <?php if($icon): ?>
            <?php echo $icon; ?>

        <?php endif; ?>
        <span class="flex-1 text-left"><?php echo e($label); ?></span>
        <?php if($badge !== null): ?>
            <span class="bg-danger/20 text-danger text-[0.6rem] font-semibold px-1.5 py-0.5 rounded-full"><?php echo e($badge); ?></span>
        <?php endif; ?>
        <svg class="w-4 h-4 transition-transform duration-200" :class="expanded && 'rotate-90'" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
    </button>
    
    <div x-show="expanded" x-collapse class="mt-0.5">
        <?php echo e($slot); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/components/admin/sidebar-group.blade.php ENDPATH**/ ?>