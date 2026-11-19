


<div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Active Bots', 'value' => $activeBotSubscriptions->count(), 'icon' => 'cpu-chip'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Total Invested', 'value' => \App\Helpers\CurrencyHelper::formatForUser($totalBotInvested), 'icon' => 'chart-bar', 'color' => 'info'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Accumulated Profit', 'value' => \App\Helpers\CurrencyHelper::formatForUser($totalBotProfit), 'icon' => 'arrow-trending-up', 'color' => 'gain'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php if($activeBotSubscriptions->count() > 0): ?>
    
    <div class="hidden md:block bg-surface-raised border border-surface-border rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-surface-border">
                    <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Bot</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Strategy</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">Invested</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">Profit</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">Daily ROI</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Started</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Expires</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-surface-border">
                <?php $__currentLoopData = $activeBotSubscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-surface-overlay/50 transition-colors">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'cpu-chip','class' => 'w-4 h-4 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'cpu-chip','class' => 'w-4 h-4 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                                <span class="text-sm font-semibold text-content-primary"><?php echo e($sub->tradingBot->name ?? 'Unknown Bot'); ?></span>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <?php
                                $strategyColors = [
                                    'scalping' => 'bg-info/10 text-info',
                                    'day_trading' => 'bg-warning/10 text-warning',
                                    'swing' => 'bg-primary/10 text-primary',
                                ];
                                $strategyClass = $strategyColors[$sub->tradingBot->strategy_type ?? ''] ?? 'bg-surface-overlay text-content-secondary';
                            ?>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium <?php echo e($strategyClass); ?>">
                                <?php echo e($sub->tradingBot->strategy_label ?? ucfirst(str_replace('_', ' ', $sub->tradingBot->strategy_type ?? ''))); ?>

                            </span>
                        </td>
                        <td class="px-4 py-3 text-right">
                            <span class="text-sm font-medium text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($sub->invested_amount); ?></span>
                        </td>
                        <td class="px-4 py-3 text-right">
                            <span class="text-sm font-medium <?php echo e($sub->accumulated_profit >= 0 ? 'text-gain' : 'text-loss'); ?>">
                                <?php echo \App\Helpers\CurrencyHelper::formatForUser($sub->accumulated_profit); ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-right">
                            <span class="text-xs font-medium text-content-secondary"><?php echo e(number_format($sub->daily_roi_snapshot ?? 0, 2)); ?>%</span>
                        </td>
                        <td class="px-4 py-3 text-xs text-content-secondary">
                            <?php echo e($sub->started_at ? $sub->started_at->format('M d, Y') : '—'); ?>

                        </td>
                        <td class="px-4 py-3">
                            <?php if($sub->expires_at): ?>
                                <?php $daysLeft = now()->diffInDays($sub->expires_at, false); ?>
                                <span class="text-xs <?php echo e($daysLeft <= 3 ? 'text-warning font-medium' : 'text-content-secondary'); ?>">
                                    <?php echo e($sub->expires_at->format('M d, Y')); ?>

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
        <?php $__currentLoopData = $activeBotSubscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-surface-raised border border-surface-border rounded-xl p-4">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'cpu-chip','class' => 'w-5 h-5 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'cpu-chip','class' => 'w-5 h-5 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                    <div class="min-w-0 flex-1">
                        <span class="text-sm font-semibold text-content-primary block truncate"><?php echo e($sub->tradingBot->name ?? 'Unknown Bot'); ?></span>
                        <span class="text-xs text-content-tertiary">Daily ROI: <?php echo e(number_format($sub->daily_roi_snapshot ?? 0, 2)); ?>%</span>
                    </div>
                    <?php
                        $strategyColors = [
                            'scalping' => 'bg-info/10 text-info',
                            'day_trading' => 'bg-warning/10 text-warning',
                            'swing' => 'bg-primary/10 text-primary',
                        ];
                        $strategyClass = $strategyColors[$sub->tradingBot->strategy_type ?? ''] ?? 'bg-surface-overlay text-content-secondary';
                    ?>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium <?php echo e($strategyClass); ?>">
                        <?php echo e($sub->tradingBot->strategy_label ?? ucfirst(str_replace('_', ' ', $sub->tradingBot->strategy_type ?? ''))); ?>

                    </span>
                </div>
                <div class="grid grid-cols-2 gap-3 text-xs">
                    <div>
                        <span class="text-content-tertiary block">Invested</span>
                        <span class="text-content-primary font-medium"><?php echo \App\Helpers\CurrencyHelper::formatForUser($sub->invested_amount); ?></span>
                    </div>
                    <div>
                        <span class="text-content-tertiary block">Profit</span>
                        <span class="<?php echo e($sub->accumulated_profit >= 0 ? 'text-gain' : 'text-loss'); ?> font-medium">
                            <?php echo \App\Helpers\CurrencyHelper::formatForUser($sub->accumulated_profit); ?>
                        </span>
                    </div>
                    <div>
                        <span class="text-content-tertiary block">Started</span>
                        <span class="text-content-secondary"><?php echo e($sub->started_at ? $sub->started_at->format('M d') : '—'); ?></span>
                    </div>
                    <div>
                        <span class="text-content-tertiary block">Expires</span>
                        <span class="text-content-secondary"><?php echo e($sub->expires_at ? $sub->expires_at->format('M d') : '—'); ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>
    <?php echo $__env->make('user.trades.partials.empty-state', [
        'icon' => 'cpu-chip',
        'title' => 'No active bot subscriptions',
        'message' => 'You haven\'t subscribed to any trading bots yet.',
        'actionUrl' => route('botTrading'),
        'actionLabel' => 'Browse Bots',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\trades\partials\portfolio-tab-bot-trading.blade.php ENDPATH**/ ?>