
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
            <h2 class="text-xl font-bold text-content-primary">Trading Signals</h2>
            <p class="text-sm text-content-secondary mt-1">Live trading signals from our expert analysts</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="<?php echo e(route('user.signal.plans')); ?>" class="px-4 py-2 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-medium transition-colors">Signal Plans</a>
            <a href="<?php echo e(route('user.signal.subscriptions')); ?>" class="px-4 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary text-sm font-medium transition-colors">My Plans</a>
        </div>
    </div>

    
    <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden">
        <?php if($signals->isEmpty()): ?>
            <div class="p-8 text-center">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'signal','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'signal','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <p class="text-content-secondary">No signals available at the moment.</p>
            </div>
        <?php else: ?>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-surface-border">
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">#</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Signal</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Entry Price</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Take Profit</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Stop Loss</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Leverage</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Status</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-border">
                        <?php $__currentLoopData = $signals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $signal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-surface-overlay/50 transition-colors">
                                <td class="px-5 py-3 text-content-tertiary"><?php echo e($key + 1); ?></td>
                                <td class="px-5 py-3 font-medium text-content-primary"><?php echo e($signal->name); ?></td>
                                <td class="px-5 py-3 text-content-primary"><?php echo e($settings->currency); ?><?php echo e(number_format($signal->entry_price, 2)); ?></td>
                                <td class="px-5 py-3 text-gain"><?php echo e($settings->currency); ?><?php echo e(number_format($signal->take_profit, 2)); ?></td>
                                <td class="px-5 py-3 text-loss"><?php echo e($settings->currency); ?><?php echo e(number_format($signal->stop_loss, 2)); ?></td>
                                <td class="px-5 py-3 text-content-primary"><?php echo e($signal->leverage); ?>x</td>
                                <td class="px-5 py-3">
                                    <?php if(strtolower($signal->status) == 'active'): ?>
                                        <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-gain/10 text-gain"><?php echo e($signal->status); ?></span>
                                    <?php elseif(strtolower($signal->status) == 'closed'): ?>
                                        <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-content-tertiary/10 text-content-tertiary"><?php echo e($signal->status); ?></span>
                                    <?php else: ?>
                                        <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-warning/10 text-warning"><?php echo e($signal->status); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-5 py-3 text-content-tertiary text-xs"><?php echo e(\Carbon\Carbon::parse($signal->updated_at)->toDayDateTimeString()); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\signals\index.blade.php ENDPATH**/ ?>