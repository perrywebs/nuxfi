<?php
    $score = Auth::user()->trade_signal ?? 0;
    if ($score >= 81) {
        $tierLabel = 'Very Strong Progress';
        $tierColor = 'gain';
        $tierMessage = 'Very strong Progress! Excellent conditions for trading opportunities.';
        $tierGradient = 'linear-gradient(90deg, #22C55E, #10B981)';
    } elseif ($score >= 61) {
        $tierLabel = 'Strong Progress';
        $tierColor = 'info';
        $tierMessage = 'Strong Progress. Good conditions for new positions.';
        $tierGradient = 'linear-gradient(90deg, #3B82F6, #60A5FA)';
    } elseif ($score >= 31) {
        $tierLabel = 'Moderate Progress';
        $tierColor = 'warning';
        $tierMessage = 'Moderate Progress. Proceed with caution on new positions.';
        $tierGradient = 'linear-gradient(90deg, #F59E0B, #FBBF24)';
    } else {
        $tierLabel = 'Weak Progress';
        $tierColor = 'loss';
        $tierMessage = 'Weak Progress. Consider waiting for better conditions.';
        $tierGradient = 'linear-gradient(90deg, #EF4444, #F87171)';
    }
?>

<div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden">
    <div class="p-5">
        
        <div class="flex items-center justify-between gap-3 mb-4">
            <div class="flex items-center gap-3 min-w-0">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'signal','class' => 'w-5 h-5 text-primary flex-shrink-0']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'signal','class' => 'w-5 h-5 text-primary flex-shrink-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <h3 class="text-sm font-semibold text-content-primary leading-tight">Trade Progress</h3>
            </div>
            <div class="flex items-center gap-3 flex-shrink-0">
                <span class="text-2xl font-bold text-content-primary"><?php echo e($score); ?>%</span>
                <span class="px-2.5 py-1 rounded-lg text-[11px] font-bold bg-<?php echo e($tierColor); ?>/10 text-<?php echo e($tierColor); ?>">
                    <?php echo e($tierLabel); ?>

                </span>
            </div>
        </div>

        
        <div class="w-full h-3 rounded-full bg-surface-overlay overflow-hidden mb-2">
            <div class="h-full rounded-full transition-all duration-500"
                 style="width: <?php echo e($score); ?>%; background: <?php echo e($tierGradient); ?>;"></div>
        </div>

        
        <div class="flex items-center justify-between text-xs text-content-secondary mb-3">
            <span>0% Weak</span>
            <span>50% Moderate</span>
            <span>100% Max</span>
        </div>

        
        <p class="text-sm text-content-secondary text-center">
            <?php echo e($tierMessage); ?>

        </p>
    </div>
</div><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/user/partials/trade-signal.blade.php ENDPATH**/ ?>