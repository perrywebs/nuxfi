
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.danger-alert','data' => []]); ?>
<?php $component->withName('danger-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.success-alert','data' => []]); ?>
<?php $component->withName('success-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    
    <?php echo $__env->make('user.partials.ticker-tape', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->make('user.partials.quick-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-content-primary">Swap History</h2>
            <p class="text-sm text-content-secondary mt-1">Your crypto swap transaction history</p>
        </div>
        <a href="<?php echo e(route('assetbalance')); ?>" class="px-4 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary text-sm font-medium transition-colors">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'arrow-left','class' => 'w-4 h-4 inline-block mr-1']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'arrow-left','class' => 'w-4 h-4 inline-block mr-1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            Back
        </a>
    </div>

    
    <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-surface-border">
                        <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Source</th>
                        <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Destination</th>
                        <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Amount (src)</th>
                        <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Quantity (dest)</th>
                        <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-border">
                    <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-surface-overlay/50 transition-colors">
                            <td class="px-5 py-3 font-medium text-content-primary"><?php echo e($tran->source); ?></td>
                            <td class="px-5 py-3 text-content-primary"><?php echo e($tran->dest); ?></td>
                            <td class="px-5 py-3 text-content-primary"><?php echo e(round(number_format($tran->amount, 2, '.', ','), 6)); ?></td>
                            <td class="px-5 py-3 text-content-primary"><?php echo e(round($tran->quantity, 6)); ?></td>
                            <td class="px-5 py-3 text-content-tertiary text-xs"><?php echo e(\Carbon\Carbon::parse($tran->created_at)->toDayDateTimeString()); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="px-5 py-8 text-center text-content-tertiary">No record available</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="px-5 py-3 border-t border-surface-border"><?php echo e($transactions->links()); ?></div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\crypto-transaction.blade.php ENDPATH**/ ?>