
<?php
    $label = $label ?? '';
    $value = $value ?? '';
    $icon  = $icon  ?? 'chart-bar';
    $color = $color ?? 'primary';

    $colorMap = [
        'primary' => ['bg' => 'bg-primary-subtle', 'icon' => 'text-primary'],
        'gain'    => ['bg' => 'bg-gain/10', 'icon' => 'text-gain'],
        'loss'    => ['bg' => 'bg-loss/10', 'icon' => 'text-loss'],
        'warning' => ['bg' => 'bg-warning/10', 'icon' => 'text-warning'],
        'info'    => ['bg' => 'bg-info/10', 'icon' => 'text-info'],
    ];
    $c = $colorMap[$color] ?? $colorMap['primary'];
?>

<div class="bg-surface-raised border border-surface-border rounded-xl p-3 hover:border-surface-border-light transition-colors flex items-center gap-3">
    <div class="p-2 rounded-lg <?php echo e($c['bg']); ?> shrink-0">
        <?php echo $__env->make("components.icons.{$icon}", ['class' => 'w-4 h-4 ' . $c['icon']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="min-w-0">
        <p class="text-xs text-content-tertiary font-medium uppercase tracking-wide truncate"><?php echo e($label); ?></p>
        <p class="text-lg font-bold text-content-primary"><?php echo e($value); ?></p>
        <?php if(!empty($subvalue)): ?>
            <p class="text-xs font-medium <?php echo e(($color ?? 'primary') === 'gain' ? 'text-gain' : (($color ?? 'primary') === 'loss' ? 'text-loss' : 'text-content-secondary')); ?>"><?php echo e($subvalue); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\partials\stat-card-compact.blade.php ENDPATH**/ ?>