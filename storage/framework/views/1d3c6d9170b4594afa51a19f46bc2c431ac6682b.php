
<?php
    $label = $label ?? '';
    $value = $value ?? '';
    $icon  = $icon  ?? 'chart-bar';
    $color = $color ?? 'primary';
    $sub   = $sub   ?? '';

    $colorMap = [
        'primary' => ['bg' => 'bg-primary-subtle', 'text' => 'text-primary', 'icon' => 'text-primary'],
        'gain'    => ['bg' => 'bg-gain/10', 'text' => 'text-gain', 'icon' => 'text-gain'],
        'loss'    => ['bg' => 'bg-loss/10', 'text' => 'text-loss', 'icon' => 'text-loss'],
        'warning' => ['bg' => 'bg-warning/10', 'text' => 'text-warning', 'icon' => 'text-warning'],
        'info'    => ['bg' => 'bg-info/10', 'text' => 'text-info', 'icon' => 'text-info'],
    ];
    $c = $colorMap[$color] ?? $colorMap['primary'];
?>

<div class="bg-surface-raised border border-surface-border rounded-xl p-4 sm:p-5 hover:border-surface-border-light transition-colors group min-w-0 overflow-hidden">
    <div class="flex items-start justify-between mb-3">
        <div class="p-2.5 rounded-lg <?php echo e($c['bg']); ?>">
            <?php echo $__env->make("components.icons.{$icon}", ['class' => 'w-5 h-5 ' . $c['icon']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <p class="text-xs text-content-tertiary font-medium uppercase tracking-wide mb-1"><?php echo e($label); ?></p>
    <p class="text-[15px] sm:text-2xl font-bold text-content-primary truncate" title="<?php echo e($value); ?>"><?php echo e($value); ?></p>
    <?php if($sub): ?>
        <p class="text-xs mt-1 <?php echo e($c['text']); ?>"><?php echo e($sub); ?></p>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/user/partials/stat-card.blade.php ENDPATH**/ ?>