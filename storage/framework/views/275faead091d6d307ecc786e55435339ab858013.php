<?php $attributes = $attributes->exceptProps(['id' => 'modal', 'title' => '', 'maxWidth' => 'max-w-lg']); ?>
<?php foreach (array_filter((['id' => 'modal', 'title' => '', 'maxWidth' => 'max-w-lg']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div x-data="{ open: false }"
     @open-<?php echo e($id); ?>.window="open = true"
     x-show="open" x-cloak
     <?php echo e($attributes->merge(['class' => 'fixed inset-0 z-[60] flex items-center justify-center p-4'])); ?>>
    
    <div x-show="open" x-transition.opacity class="absolute inset-0 bg-surface-overlay/60" @click="open = false"></div>
    
    <div x-show="open" x-transition class="relative w-full <?php echo e($maxWidth); ?> bg-surface-card rounded-2xl shadow-xl overflow-hidden">
        
        <?php if($title): ?>
            <div class="px-6 py-4 border-b border-border flex items-center justify-between">
                <h3 class="text-lg font-semibold text-content"><?php echo e($title); ?></h3>
                <button @click="open = false" class="text-content-muted hover:text-content transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
        <?php endif; ?>
        
        <div class="px-6 py-5">
            <?php echo e($slot); ?>

        </div>
        
        <?php if(isset($footer)): ?>
            <div class="px-6 py-4 border-t border-border flex justify-end gap-3">
                <?php echo e($footer); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/components/admin/modal.blade.php ENDPATH**/ ?>