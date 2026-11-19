


<?php $preIpoPL = $totalPreIpoValue - $totalPreIpoCost; ?>
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Holdings', 'value' => $preIpoHoldings->count(), 'icon' => 'building-office'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Total Cost', 'value' => \App\Helpers\CurrencyHelper::formatForUser($totalPreIpoCost), 'icon' => 'chart-bar', 'color' => 'info'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Current Value', 'value' => \App\Helpers\CurrencyHelper::formatForUser($totalPreIpoValue), 'icon' => 'banknotes'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Unrealized P/L', 'value' => \App\Helpers\CurrencyHelper::formatForUser($preIpoPL), 'icon' => 'arrow-trending-up', 'color' => $preIpoPL >= 0 ? 'gain' : 'loss'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php if($preIpoHoldings->count() > 0): ?>
    
    <div class="hidden md:block bg-surface-raised border border-surface-border rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-surface-border">
                    <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Company</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">Shares</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">Avg Price</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">Current Price</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">Total Cost</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">Current Value</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">P/L</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-surface-border">
                <?php $__currentLoopData = $preIpoHoldings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $holding): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-surface-overlay/50 transition-colors">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <?php if($holding->company && $holding->company->logo): ?>
                                    <img src="<?php echo e(asset('storage/app/public/' . $holding->company->logo)); ?>" class="w-8 h-8 rounded-full bg-surface-overlay" alt="">
                                <?php else: ?>
                                    <div class="w-8 h-8 rounded-full bg-surface-overlay flex items-center justify-center text-xs font-bold text-content-secondary">
                                        <?php echo e(strtoupper(substr($holding->company->symbol ?? $holding->company->name ?? '?', 0, 2))); ?>

                                    </div>
                                <?php endif; ?>
                                <div>
                                    <span class="text-sm font-semibold text-content-primary"><?php echo e($holding->company->name ?? 'Unknown'); ?></span>
                                    <?php if($holding->company && $holding->company->symbol): ?>
                                        <span class="text-xs text-content-tertiary ml-1"><?php echo e($holding->company->symbol); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-right text-sm font-medium text-content-primary"><?php echo e(number_format($holding->shares)); ?></td>
                        <td class="px-4 py-3 text-right text-sm text-content-secondary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($holding->purchase_price); ?></td>
                        <td class="px-4 py-3 text-right text-sm text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($holding->company->current_price ?? 0); ?></td>
                        <td class="px-4 py-3 text-right text-sm text-content-secondary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($holding->total_cost); ?></td>
                        <td class="px-4 py-3 text-right text-sm font-medium text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($holding->current_value ?? 0); ?></td>
                        <td class="px-4 py-3 text-right">
                            <?php $pnl = $holding->unrealized_pnl ?? 0; ?>
                            <span class="text-sm font-medium <?php echo e($pnl >= 0 ? 'text-gain' : 'text-loss'); ?>">
                                <?php echo \App\Helpers\CurrencyHelper::formatForUser($pnl); ?>
                            </span>
                            <?php if($holding->unrealized_pnl_percent): ?>
                                <span class="text-[10px] <?php echo e($pnl >= 0 ? 'text-gain' : 'text-loss'); ?> block">
                                    (<?php echo e($pnl >= 0 ? '+' : ''); ?><?php echo e(number_format($holding->unrealized_pnl_percent, 2)); ?>%)
                                </span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    
    <div class="md:hidden space-y-3">
        <?php $__currentLoopData = $preIpoHoldings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $holding): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $pnl = $holding->unrealized_pnl ?? 0; ?>
            <div class="bg-surface-raised border border-surface-border rounded-xl p-4">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-2">
                        <?php if($holding->company && $holding->company->logo): ?>
                            <img src="<?php echo e(asset('storage/app/public/' . $holding->company->logo)); ?>" class="w-8 h-8 rounded-full bg-surface-overlay" alt="">
                        <?php else: ?>
                            <div class="w-8 h-8 rounded-full bg-surface-overlay flex items-center justify-center text-xs font-bold text-content-secondary">
                                <?php echo e(strtoupper(substr($holding->company->symbol ?? '?', 0, 2))); ?>

                            </div>
                        <?php endif; ?>
                        <span class="text-sm font-semibold text-content-primary"><?php echo e($holding->company->name ?? 'Unknown'); ?></span>
                    </div>
                    <span class="text-sm font-medium <?php echo e($pnl >= 0 ? 'text-gain' : 'text-loss'); ?>">
                        <?php echo \App\Helpers\CurrencyHelper::formatForUser($pnl); ?>
                    </span>
                </div>
                <div class="grid grid-cols-3 gap-3 text-xs">
                    <div>
                        <span class="text-content-tertiary block">Shares</span>
                        <span class="text-content-primary font-medium"><?php echo e(number_format($holding->shares)); ?></span>
                    </div>
                    <div>
                        <span class="text-content-tertiary block">Cost</span>
                        <span class="text-content-secondary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($holding->total_cost); ?></span>
                    </div>
                    <div>
                        <span class="text-content-tertiary block">Value</span>
                        <span class="text-content-primary font-medium"><?php echo \App\Helpers\CurrencyHelper::formatForUser($holding->current_value ?? 0); ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>
    <?php echo $__env->make('user.trades.partials.empty-state', [
        'icon' => 'building-office',
        'title' => 'No Pre-IPO holdings',
        'message' => 'You haven\'t purchased any Pre-IPO shares yet.',
        'actionUrl' => route('user.pre-ipo.index'),
        'actionLabel' => 'Browse Pre-IPO',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\trades\partials\portfolio-tab-pre-ipo.blade.php ENDPATH**/ ?>