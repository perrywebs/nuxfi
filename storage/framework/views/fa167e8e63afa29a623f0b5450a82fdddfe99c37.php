
<?php
    $icon = $icon ?? 'chart-bar';
    $title = $title ?? 'No data found';
    $message = $message ?? 'There\'s nothing to show here yet.';
    $actionUrl = $actionUrl ?? null;
    $actionLabel = $actionLabel ?? 'Get Started';
?>

<div class="flex flex-col items-center justify-center py-12 px-6 text-center" role="status">
    <div class="p-4 rounded-full bg-surface-overlay mb-4">
        <?php echo $__env->make("components.icons.{$icon}", ['class' => 'w-10 h-10 text-content-tertiary'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <h3 class="text-base font-semibold text-content-primary mb-1"><?php echo e($title); ?></h3>
    <p class="text-sm text-content-tertiary max-w-sm mb-4"><?php echo e($message); ?></p>
    <?php if($actionUrl): ?>
        <a href="<?php echo e($actionUrl); ?>"
           class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-surface-base">
            <?php echo $__env->make("components.icons.{$icon}", ['class' => 'w-4 h-4'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo e($actionLabel); ?>

        </a>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\trades\partials\empty-state.blade.php ENDPATH**/ ?>