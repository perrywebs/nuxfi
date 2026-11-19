
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
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.error-alert','data' => []]); ?>
<?php $component->withName('error-alert'); ?>
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
            <h2 class="text-xl font-bold text-content-primary">My Loans</h2>
            <p class="text-sm text-content-secondary mt-1">Track and manage your loan applications</p>
        </div>
        <a href="<?php echo e(route('loans.create')); ?>" class="px-4 py-2 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-medium transition-colors">
            Apply for Loan
        </a>
    </div>

    
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <?php echo $__env->make('user.partials.stat-card', ['label' => 'Active Loans', 'value' => $stats['active_count'], 'icon' => 'wallet'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card', ['label' => 'Total Borrowed', 'value' => \App\Helpers\CurrencyHelper::formatForUser($stats['total_borrowed']), 'icon' => 'wallet'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card', ['label' => 'Total Repaid', 'value' => \App\Helpers\CurrencyHelper::formatForUser($stats['total_repaid']), 'icon' => 'wallet'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card', ['label' => 'Pending', 'value' => $stats['pending_count'], 'icon' => 'wallet'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    
    <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-surface-border">
                        <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">#</th>
                        <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Plan</th>
                        <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Amount</th>
                        <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Duration</th>
                        <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Repayment</th>
                        <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Status</th>
                        <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Date</th>
                        <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-border">
                    <?php $__empty_1 = true; $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-surface-overlay/50 transition-colors">
                            <td class="px-5 py-3 text-content-tertiary"><?php echo e($loop->iteration); ?></td>
                            <td class="px-5 py-3 text-content-primary"><?php echo e($loan->loanPlan->name ?? 'Legacy'); ?></td>
                            <td class="px-5 py-3 font-medium text-content-primary">
                                <?php echo \App\Helpers\CurrencyHelper::formatForUser($loan->approved_amount ?? $loan->amount); ?>
                            </td>
                            <td class="px-5 py-3 text-content-primary"><?php echo e($loan->duration); ?> mo</td>
                            <td class="px-5 py-3">
                                <?php if($loan->total_repayable > 0): ?>
                                    <div class="flex items-center space-x-2">
                                        <div class="flex-1 h-1.5 rounded-full bg-surface-overlay overflow-hidden">
                                            <div class="h-full rounded-full bg-primary" style="width: <?php echo e($loan->progress_percentage); ?>%"></div>
                                        </div>
                                        <span class="text-xs text-content-tertiary"><?php echo e($loan->progress_percentage); ?>%</span>
                                    </div>
                                <?php else: ?>
                                    <span class="text-xs text-content-tertiary">—</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-5 py-3">
                                <?php
                                    $statusColors = [
                                        'pending' => 'bg-warning/10 text-warning',
                                        'active' => 'bg-info/10 text-info',
                                        'repaying' => 'bg-primary-subtle text-primary',
                                        'completed' => 'bg-gain/10 text-gain',
                                        'rejected' => 'bg-loss/10 text-loss',
                                        'defaulted' => 'bg-loss/10 text-loss',
                                        'cancelled' => 'bg-surface-overlay text-content-tertiary',
                                    ];
                                    $color = $statusColors[$loan->status] ?? 'bg-surface-overlay text-content-tertiary';
                                ?>
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full <?php echo e($color); ?>">
                                    <?php echo e(ucfirst($loan->status)); ?>

                                </span>
                                <?php if($loan->is_overdue): ?>
                                    <span class="ml-1 px-2 py-0.5 text-xs font-medium rounded-full bg-loss/10 text-loss">Overdue</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-5 py-3 text-content-tertiary text-xs"><?php echo e($loan->created_at->format('M d, Y')); ?></td>
                            <td class="px-5 py-3">
                                <a href="<?php echo e(route('loans.show', $loan)); ?>" class="text-primary hover:text-primary-dark text-xs font-medium">
                                    View
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" class="px-5 py-8 text-center text-content-tertiary">
                                No loan applications yet.
                                <a href="<?php echo e(route('loans.create')); ?>" class="text-primary hover:underline">Apply for your first loan</a>.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\loans\my_loans.blade.php ENDPATH**/ ?>