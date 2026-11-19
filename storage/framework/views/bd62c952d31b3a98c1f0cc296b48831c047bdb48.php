
<?php
    $pm = $payment_mode;
?>

<div class="space-y-4">
    <?php if(!empty($pm->bankname)): ?>
        <div>
            <label class="block text-xs font-medium text-content-tertiary uppercase tracking-wide mb-1">Bank Name</label>
            <div class="flex items-stretch gap-2">
                <input type="text" value="<?php echo e($pm->bankname); ?>" readonly
                       class="flex-1 bg-surface-overlay border border-surface-border-light rounded-lg px-4 py-3 text-sm text-content-primary focus:outline-none">
                <button onclick="navigator.clipboard.writeText('<?php echo e($pm->bankname); ?>')"
                        class="px-3 rounded-lg border border-surface-border-light bg-surface-overlay text-content-secondary hover:text-primary hover:border-primary/30 transition">
                    <?php echo $__env->make('components.icons.copy', ['class' => 'w-4 h-4'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </button>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!empty($pm->account_name)): ?>
        <div>
            <label class="block text-xs font-medium text-content-tertiary uppercase tracking-wide mb-1">Account Name</label>
            <div class="flex items-stretch gap-2">
                <input type="text" value="<?php echo e($pm->account_name); ?>" readonly
                       class="flex-1 bg-surface-overlay border border-surface-border-light rounded-lg px-4 py-3 text-sm text-content-primary focus:outline-none">
                <button onclick="navigator.clipboard.writeText('<?php echo e($pm->account_name); ?>')"
                        class="px-3 rounded-lg border border-surface-border-light bg-surface-overlay text-content-secondary hover:text-primary hover:border-primary/30 transition">
                    <?php echo $__env->make('components.icons.copy', ['class' => 'w-4 h-4'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </button>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!empty($pm->account_number)): ?>
        <div>
            <label class="block text-xs font-medium text-content-tertiary uppercase tracking-wide mb-1">Account Number</label>
            <div class="flex items-stretch gap-2">
                <input type="text" value="<?php echo e($pm->account_number); ?>" readonly
                       class="flex-1 bg-surface-overlay border border-surface-border-light rounded-lg px-4 py-3 text-sm text-content-primary font-mono focus:outline-none">
                <button onclick="navigator.clipboard.writeText('<?php echo e($pm->account_number); ?>')"
                        class="px-3 rounded-lg border border-surface-border-light bg-surface-overlay text-content-secondary hover:text-primary hover:border-primary/30 transition">
                    <?php echo $__env->make('components.icons.copy', ['class' => 'w-4 h-4'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </button>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!empty($pm->swift_code)): ?>
        <div>
            <label class="block text-xs font-medium text-content-tertiary uppercase tracking-wide mb-1">Swift Code</label>
            <div class="flex items-stretch gap-2">
                <input type="text" value="<?php echo e($pm->swift_code); ?>" readonly
                       class="flex-1 bg-surface-overlay border border-surface-border-light rounded-lg px-4 py-3 text-sm text-content-primary font-mono focus:outline-none">
                <button onclick="navigator.clipboard.writeText('<?php echo e($pm->swift_code); ?>')"
                        class="px-3 rounded-lg border border-surface-border-light bg-surface-overlay text-content-secondary hover:text-primary hover:border-primary/30 transition">
                    <?php echo $__env->make('components.icons.copy', ['class' => 'w-4 h-4'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </button>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\partials\_bank-details.blade.php ENDPATH**/ ?>