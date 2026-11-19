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

    
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl font-bold text-content-primary">Signal Payment History</h2>
            <p class="text-sm text-content-secondary mt-1">Track your signal plan payment requests and their approval status</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="<?php echo e(route('user.signal.subscriptions')); ?>" class="px-4 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary text-sm font-medium transition-colors">My Subscriptions</a>
            <a href="<?php echo e(route('user.signal.plans')); ?>" class="px-4 py-2 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-medium transition-colors">Browse Plans</a>
        </div>
    </div>

    <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden">
        <?php if($payments->isEmpty()): ?>
            <div class="p-10 text-center">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'document-text','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'document-text','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <p class="text-content-secondary mb-1">You have no signal payment requests yet.</p>
                <p class="text-xs text-content-tertiary mb-4">Select a signal plan to create your first payment request.</p>
                <a href="<?php echo e(route('user.signal.plans')); ?>" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-medium transition-colors">
                    Browse Signal Plans
                </a>
            </div>
        <?php else: ?>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-surface-border">
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Order</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Plan</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Amount</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Method / Network</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">TXID</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Status</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Submitted</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-border">
                        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-surface-overlay/50 transition-colors align-top">
                                <td class="px-5 py-4 text-content-tertiary">#<?php echo e(str_pad($payment->id, 6, '0', STR_PAD_LEFT)); ?></td>
                                <td class="px-5 py-4">
                                    <p class="font-medium text-content-primary"><?php echo e($payment->plan_name); ?></p>
                                    <p class="text-xs text-content-tertiary"><?php echo e($payment->duration); ?> <?php echo e(\Illuminate\Support\Str::plural('week', $payment->duration)); ?></p>
                                </td>
                                <td class="px-5 py-4 font-medium text-content-primary whitespace-nowrap"><?php echo e($payment->currency); ?><?php echo e(number_format($payment->amount, 2)); ?></td>
                                <td class="px-5 py-4">
                                    <p class="text-content-primary"><?php echo e($payment->payment_method_name ?: 'Not selected'); ?></p>
                                    <?php if($payment->payment_network): ?>
                                        <p class="text-xs text-content-tertiary"><?php echo e($payment->payment_network); ?></p>
                                    <?php endif; ?>
                                </td>
                                <td class="px-5 py-4 max-w-[220px]">
                                    <?php if($payment->tx_hash): ?>
                                        <p class="font-mono text-xs text-content-secondary break-all" title="<?php echo e($payment->tx_hash); ?>"><?php echo e(\Illuminate\Support\Str::limit($payment->tx_hash, 24)); ?></p>
                                    <?php else: ?>
                                        <span class="text-xs text-content-tertiary">Not submitted</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold capitalize <?php echo e($payment->statusBadgeClass()); ?>"><?php echo e($payment->status); ?></span>
                                    <?php if($payment->isRejected() && $payment->rejection_reason): ?>
                                        <p class="text-xs text-loss mt-1 max-w-[200px]"><?php echo e(\Illuminate\Support\Str::limit($payment->rejection_reason, 80)); ?></p>
                                    <?php endif; ?>
                                </td>
                                <td class="px-5 py-4 text-content-tertiary text-xs whitespace-nowrap">
                                    <?php echo e($payment->submitted_at ? $payment->submitted_at->toDayDateTimeString() : ($payment->created_at ? $payment->created_at->toDayDateTimeString() : '—')); ?>

                                </td>
                                <td class="px-5 py-4">
                                    <a href="<?php echo e(route('user.signal.payment.show', $payment->id)); ?>"
                                       class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-surface-overlay border border-surface-border text-xs font-medium text-content-secondary hover:text-content-primary transition-colors">
                                        View
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <?php if($payments->hasPages()): ?>
                <div class="px-5 py-4 border-t border-surface-border">
                    <?php echo e($payments->links()); ?>

                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\signals\payments.blade.php ENDPATH**/ ?>