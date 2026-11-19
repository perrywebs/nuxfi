


<div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Active Loans', 'value' => $activeLoans->count(), 'icon' => 'hand-raised'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Outstanding', 'value' => \App\Helpers\CurrencyHelper::formatForUser($totalLoanOutstanding), 'icon' => 'banknotes', 'color' => 'loss'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Total Repaid', 'value' => \App\Helpers\CurrencyHelper::formatForUser($activeLoans->sum('total_repaid')), 'icon' => 'check-circle', 'color' => 'gain'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php if($activeLoans->count() > 0): ?>
    <div class="space-y-4">
        <?php $__currentLoopData = $activeLoans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $progress = $loan->progress_percentage ?? 0;
                $remaining = $loan->total_repayable - $loan->total_repaid;
                $isOverdue = $loan->is_overdue ?? false;
            ?>
            <div class="bg-surface-raised border border-surface-border rounded-xl p-5">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="text-sm font-semibold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($loan->amount); ?> Loan</span>
                            <span class="px-2 py-0.5 text-[10px] font-medium rounded-full <?php echo e($isOverdue ? 'bg-loss/10 text-loss' : 'bg-gain/10 text-gain'); ?>">
                                <?php echo e($isOverdue ? 'Overdue' : ucfirst($loan->status)); ?>

                            </span>
                        </div>
                        <span class="text-xs text-content-tertiary">
                            <?php echo e(number_format($loan->interest_rate, 1)); ?>% interest &middot; <?php echo e($loan->duration ?? '—'); ?> months
                        </span>
                    </div>
                    <div class="text-right">
                        <span class="text-xs text-content-tertiary block">Remaining</span>
                        <span class="text-lg font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($remaining); ?></span>
                    </div>
                </div>

                
                <div class="mb-3">
                    <div class="flex items-center justify-between text-xs mb-1">
                        <span class="text-content-secondary">Repayment Progress</span>
                        <span class="text-content-primary font-medium"><?php echo e(number_format($progress, 1)); ?>%</span>
                    </div>
                    <div class="w-full h-2 rounded-full bg-surface-overlay overflow-hidden">
                        <div class="h-full rounded-full <?php echo e($isOverdue ? 'bg-loss' : 'bg-primary'); ?> transition-all duration-300"
                             style="width: <?php echo e(min($progress, 100)); ?>%"></div>
                    </div>
                </div>

                
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-xs">
                    <div>
                        <span class="text-content-tertiary block">Total Repayable</span>
                        <span class="text-content-primary font-medium"><?php echo \App\Helpers\CurrencyHelper::formatForUser($loan->total_repayable); ?></span>
                    </div>
                    <div>
                        <span class="text-content-tertiary block">Repaid</span>
                        <span class="text-gain font-medium"><?php echo \App\Helpers\CurrencyHelper::formatForUser($loan->total_repaid); ?></span>
                    </div>
                    <div>
                        <span class="text-content-tertiary block">Next Payment</span>
                        <span class="<?php echo e($isOverdue ? 'text-loss font-medium' : 'text-content-secondary'); ?>">
                            <?php echo e($loan->next_payment_date ? \Carbon\Carbon::parse($loan->next_payment_date)->format('M d, Y') : '—'); ?>

                        </span>
                    </div>
                    <div>
                        <span class="text-content-tertiary block">Maturity</span>
                        <span class="text-content-secondary">
                            <?php echo e($loan->maturity_date ? \Carbon\Carbon::parse($loan->maturity_date)->format('M d, Y') : '—'); ?>

                        </span>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>
    <?php echo $__env->make('user.trades.partials.empty-state', [
        'icon' => 'hand-raised',
        'title' => 'No active loans',
        'message' => 'You don\'t have any outstanding loans.',
        'actionUrl' => route('loans.create'),
        'actionLabel' => 'Apply for Loan',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\trades\partials\portfolio-tab-loans.blade.php ENDPATH**/ ?>