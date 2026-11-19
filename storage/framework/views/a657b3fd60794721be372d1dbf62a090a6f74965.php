


<div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Active Positions', 'value' => $activeCopyPositions->count(), 'icon' => 'copy'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Total Invested', 'value' => \App\Helpers\CurrencyHelper::formatForUser($totalCopyInvested), 'icon' => 'chart-bar', 'color' => 'info'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Accumulated Profit', 'value' => \App\Helpers\CurrencyHelper::formatForUser($totalCopyProfit), 'icon' => 'arrow-trending-up', 'color' => 'gain'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php if($activeCopyPositions->count() > 0): ?>
    
    <div class="hidden md:block bg-surface-raised border border-surface-border rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-surface-border">
                    <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Expert</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">Invested</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">Profit</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">Daily ROI</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Started</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Expires</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-surface-border">
                <?php $__currentLoopData = $activeCopyPositions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-surface-overlay/50 transition-colors">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <?php if($position->expert && $position->expert->profile_picture): ?>
                                    <img src="<?php echo e(asset('storage/app/public/' . $position->expert->profile_picture)); ?>" class="w-8 h-8 rounded-full bg-surface-overlay" alt="">
                                <?php else: ?>
                                    <div class="w-8 h-8 rounded-full bg-surface-overlay flex items-center justify-center text-xs font-bold text-content-secondary">
                                        <?php echo e(strtoupper(substr($position->expert->name ?? '?', 0, 2))); ?>

                                    </div>
                                <?php endif; ?>
                                <div>
                                    <span class="text-sm font-semibold text-content-primary"><?php echo e($position->expert->name ?? 'Unknown'); ?></span>
                                    <?php if($position->expert && $position->expert->area_of_expertise): ?>
                                        <span class="text-[10px] text-content-tertiary block"><?php echo e($position->expert->area_of_expertise); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-right">
                            <span class="text-sm font-medium text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($position->invested_amount); ?></span>
                        </td>
                        <td class="px-4 py-3 text-right">
                            <span class="text-sm font-medium <?php echo e($position->accumulated_profit >= 0 ? 'text-gain' : 'text-loss'); ?>">
                                <?php echo \App\Helpers\CurrencyHelper::formatForUser($position->accumulated_profit); ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-right">
                            <span class="text-xs font-medium text-content-secondary"><?php echo e(number_format($position->daily_roi_snapshot ?? 0, 2)); ?>%</span>
                        </td>
                        <td class="px-4 py-3 text-xs text-content-secondary">
                            <?php echo e($position->started_at ? \Carbon\Carbon::parse($position->started_at)->format('M d, Y') : '—'); ?>

                        </td>
                        <td class="px-4 py-3">
                            <?php if($position->expires_at): ?>
                                <?php $daysLeft = now()->diffInDays(\Carbon\Carbon::parse($position->expires_at), false); ?>
                                <span class="text-xs <?php echo e($daysLeft <= 3 ? 'text-warning font-medium' : 'text-content-secondary'); ?>">
                                    <?php echo e(\Carbon\Carbon::parse($position->expires_at)->format('M d, Y')); ?>

                                </span>
                            <?php else: ?>
                                <span class="text-xs text-content-tertiary">—</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    
    <div class="md:hidden space-y-3">
        <?php $__currentLoopData = $activeCopyPositions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-surface-raised border border-surface-border rounded-xl p-4">
                <div class="flex items-center gap-3 mb-3">
                    <?php if($position->expert && $position->expert->profile_picture): ?>
                        <img src="<?php echo e(asset('storage/app/public/' . $position->expert->profile_picture)); ?>" class="w-10 h-10 rounded-full bg-surface-overlay" alt="">
                    <?php else: ?>
                        <div class="w-10 h-10 rounded-full bg-surface-overlay flex items-center justify-center text-sm font-bold text-content-secondary">
                            <?php echo e(strtoupper(substr($position->expert->name ?? '?', 0, 2))); ?>

                        </div>
                    <?php endif; ?>
                    <div class="min-w-0 flex-1">
                        <span class="text-sm font-semibold text-content-primary block truncate"><?php echo e($position->expert->name ?? 'Unknown'); ?></span>
                        <span class="text-xs text-content-tertiary">Daily ROI: <?php echo e(number_format($position->daily_roi_snapshot ?? 0, 2)); ?>%</span>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-3 text-xs">
                    <div>
                        <span class="text-content-tertiary block">Invested</span>
                        <span class="text-content-primary font-medium"><?php echo \App\Helpers\CurrencyHelper::formatForUser($position->invested_amount); ?></span>
                    </div>
                    <div>
                        <span class="text-content-tertiary block">Profit</span>
                        <span class="<?php echo e($position->accumulated_profit >= 0 ? 'text-gain' : 'text-loss'); ?> font-medium">
                            <?php echo \App\Helpers\CurrencyHelper::formatForUser($position->accumulated_profit); ?>
                        </span>
                    </div>
                    <div>
                        <span class="text-content-tertiary block">Started</span>
                        <span class="text-content-secondary"><?php echo e($position->started_at ? \Carbon\Carbon::parse($position->started_at)->format('M d') : '—'); ?></span>
                    </div>
                    <div>
                        <span class="text-content-tertiary block">Expires</span>
                        <span class="text-content-secondary"><?php echo e($position->expires_at ? \Carbon\Carbon::parse($position->expires_at)->format('M d') : '—'); ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>
    <?php echo $__env->make('user.trades.partials.empty-state', [
        'icon' => 'copy',
        'title' => 'No copy trading positions',
        'message' => 'You haven\'t started copying any experts yet.',
        'actionUrl' => route('copyTrading'),
        'actionLabel' => 'Browse Experts',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\trades\partials\portfolio-tab-copy-trading.blade.php ENDPATH**/ ?>