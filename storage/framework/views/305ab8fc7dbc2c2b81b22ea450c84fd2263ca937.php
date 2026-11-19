<?php
    $score = Auth::user()->signal_strength_score ?? 0;
    if ($score >= 50) {
        $tierLabel = 'Strong Signal';
        $tierColor = 'gain';
        $tierMessage = 'Strong signal strength! Optimal conditions for trading opportunities.';
        $tierEmoji = "\xF0\x9F\x9A\x80";
    } elseif ($score >= 25) {
        $tierLabel = 'Moderate';
        $tierColor = 'warning';
        $tierMessage = 'Moderate signal strength. Proceed with caution on new positions.';
        $tierEmoji = "\xE2\x9A\xA1";
    } else {
        $tierLabel = 'Weak Signal';
        $tierColor = 'loss';
        $tierMessage = 'Weak signal strength. Consider waiting for better conditions.';
        $tierEmoji = "\xE2\x9A\xA0\xEF\xB8\x8F";
    }
?>

<div class="bg-surface-raised border border-surface-border rounded-xl p-5">
    
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-3">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'signal','class' => 'w-6 h-6 text-content-secondary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'signal','class' => 'w-6 h-6 text-content-secondary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <h3 class="text-base font-bold text-content-primary leading-tight">Trading Signal<br>Strength</h3>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-3xl font-bold text-content-primary"><?php echo e($score); ?>%</span>
            <span class="px-3 py-1.5 rounded-lg text-xs font-bold bg-<?php echo e($tierColor); ?>/10 text-<?php echo e($tierColor); ?>">
                <?php echo e($tierLabel); ?>

            </span>
        </div>
    </div>

    
    <div class="w-full h-3 rounded-full bg-surface-overlay overflow-hidden mb-2">
        <div class="h-full rounded-full transition-all duration-500"
             style="width: <?php echo e($score); ?>%; background: linear-gradient(90deg, #22C55E, #10B981);"></div>
    </div>

    
    <div class="flex items-center justify-between text-xs text-content-secondary mb-4">
        <span>0% Weak</span>
        <span>25% Moderate</span>
        <span>50%+ Strong</span>
    </div>

    
    <p class="text-sm text-content-secondary text-center">
        <?php echo e($tierEmoji); ?> <?php echo e($tierMessage); ?>

    </p>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\partials\signal-strength.blade.php ENDPATH**/ ?>