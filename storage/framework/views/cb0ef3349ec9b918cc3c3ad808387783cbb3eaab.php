


<div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Active Plans', 'value' => $activePlans->count(), 'icon' => 'banknotes'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Total Invested', 'value' => \App\Helpers\CurrencyHelper::formatForUser($totalPlanInvested), 'icon' => 'chart-bar', 'color' => 'info'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Profit Earned', 'value' => \App\Helpers\CurrencyHelper::formatForUser($totalPlanProfit), 'icon' => 'arrow-trending-up', 'color' => 'gain'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php if($activePlans->count() > 0): ?>
    
    <div class="hidden md:block bg-surface-raised border border-surface-border rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-surface-border">
                    <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Plan</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">Invested</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">Profit</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Started</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Expires</th>
                    <th class="px-4 py-3 text-center text-xs font-medium text-content-tertiary uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-surface-border">
                <?php $__currentLoopData = $activePlans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-surface-overlay/50 transition-colors">
                        <td class="px-4 py-3">
                            <span class="text-sm font-semibold text-content-primary"><?php echo e($plan->planDetails->name ?? 'Unknown Plan'); ?></span>
                        </td>
                        <td class="px-4 py-3 text-right">
                            <span class="text-sm font-medium text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($plan->amount ?? 0); ?></span>
                        </td>
                        <td class="px-4 py-3 text-right">
                            <span class="text-sm font-medium text-gain"><?php echo \App\Helpers\CurrencyHelper::formatForUser($plan->profit_earned ?? 0); ?></span>
                        </td>
                        <td class="px-4 py-3 text-xs text-content-secondary">
                            <?php echo e($plan->activated_at ? \Carbon\Carbon::parse($plan->activated_at)->format('M d, Y') : '—'); ?>

                        </td>
                        <td class="px-4 py-3">
                            <?php if($plan->expire_date): ?>
                                <?php $daysLeft = now()->diffInDays(\Carbon\Carbon::parse($plan->expire_date), false); ?>
                                <span class="text-xs <?php echo e($daysLeft <= 3 ? 'text-warning font-medium' : 'text-content-secondary'); ?>">
                                    <?php echo e(\Carbon\Carbon::parse($plan->expire_date)->format('M d, Y')); ?>

                                    <?php if($daysLeft <= 3 && $daysLeft >= 0): ?>
                                        <span class="text-[10px] text-warning block"><?php echo e($daysLeft); ?> day<?php echo e($daysLeft !== 1 ? 's' : ''); ?> left</span>
                                    <?php endif; ?>
                                </span>
                            <?php else: ?>
                                <span class="text-xs text-content-tertiary">—</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <span class="px-2 py-0.5 text-[10px] font-medium rounded-full bg-gain/10 text-gain">Active</span>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    
    <div class="md:hidden space-y-3">
        <?php $__currentLoopData = $activePlans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-surface-raised border border-surface-border rounded-xl p-4">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-sm font-semibold text-content-primary"><?php echo e($plan->planDetails->name ?? 'Unknown Plan'); ?></span>
                    <span class="px-2 py-0.5 text-[10px] font-medium rounded-full bg-gain/10 text-gain">Active</span>
                </div>
                <div class="grid grid-cols-2 gap-3 text-xs">
                    <div>
                        <span class="text-content-tertiary block">Invested</span>
                        <span class="text-content-primary font-medium"><?php echo \App\Helpers\CurrencyHelper::formatForUser($plan->amount ?? 0); ?></span>
                    </div>
                    <div>
                        <span class="text-content-tertiary block">Profit</span>
                        <span class="text-gain font-medium"><?php echo \App\Helpers\CurrencyHelper::formatForUser($plan->profit_earned ?? 0); ?></span>
                    </div>
                    <div>
                        <span class="text-content-tertiary block">Started</span>
                        <span class="text-content-secondary"><?php echo e($plan->activated_at ? \Carbon\Carbon::parse($plan->activated_at)->format('M d, Y') : '—'); ?></span>
                    </div>
                    <div>
                        <span class="text-content-tertiary block">Expires</span>
                        <span class="text-content-secondary"><?php echo e($plan->expire_date ? \Carbon\Carbon::parse($plan->expire_date)->format('M d, Y') : '—'); ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>
    <?php echo $__env->make('user.trades.partials.empty-state', [
        'icon' => 'banknotes',
        'title' => 'No active investment plans',
        'message' => 'You haven\'t subscribed to any investment plans yet.',
        'actionUrl' => route('mplans'),
        'actionLabel' => 'Browse Plans',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\trades\partials\portfolio-tab-investments.blade.php ENDPATH**/ ?>