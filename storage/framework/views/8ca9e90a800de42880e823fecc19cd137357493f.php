
<div class="bg-surface-raised border border-surface-border rounded-xl overflow-hidden">
    <div class="px-5 py-4 border-b border-surface-border flex items-center justify-between">
        <div class="flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-info"></span>
            <h3 class="text-sm font-semibold text-content-primary">Recent Transactions</h3>
        </div>
        <a href="<?php echo e(route('accounthistory')); ?>" class="text-xs text-primary hover:text-primary-light font-medium transition-colors">
            View All &rarr;
        </a>
    </div>

    <?php if($t_history->count() > 0): ?>
        <div class="divide-y divide-surface-border">
            <?php $__currentLoopData = $t_history->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="px-5 py-3 flex items-center justify-between">
                    <div class="flex items-center gap-3 min-w-0">
                        <?php
                            $typeColors = [
                                'Deposit'    => 'bg-gain/10 text-gain',
                                'Withdrawal' => 'bg-loss/10 text-loss',
                                'Bonus'      => 'bg-warning/10 text-warning',
                                'Trade'      => 'bg-info/10 text-info',
                            ];
                            $colorClass = $typeColors[$tx->type] ?? 'bg-primary-subtle text-primary';
                        ?>
                        <span class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0 text-[10px] font-bold <?php echo e($colorClass); ?>">
                            <?php echo e(strtoupper(substr($tx->type ?? 'TX', 0, 2))); ?>

                        </span>
                        <div class="min-w-0">
                            <p class="text-sm text-content-primary font-medium truncate"><?php echo e($tx->type ?? 'Transaction'); ?></p>
                            <p class="text-[10px] text-content-tertiary"><?php echo e($tx->created_at ? $tx->created_at->format('M d, Y') : ''); ?></p>
                        </div>
                    </div>
                    <span class="text-sm font-semibold text-content-primary flex-shrink-0">
                        <?php echo e($settings->currency); ?><?php echo e(number_format($tx->amount ?? 0, 2, '.', ',')); ?>

                    </span>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <div class="px-5 py-10 text-center">
            <?php echo $__env->make('components.icons.folder', ['class' => 'w-8 h-8 text-content-tertiary mx-auto mb-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <p class="text-xs text-content-tertiary">No Transactions</p>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/user/partials/recent-transactions.blade.php ENDPATH**/ ?>