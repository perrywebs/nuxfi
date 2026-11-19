
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

    
    <div class="mb-4">
        <a href="<?php echo e(route('botTrading')); ?>" class="inline-flex items-center gap-1.5 text-sm text-content-tertiary hover:text-primary transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
            Back to Bot Trading
        </a>
    </div>

    
    <div class="bg-surface-raised border border-surface-border rounded-xl p-6">
        <div class="flex items-start gap-4">
            <div class="w-14 h-14 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'cpu-chip','class' => 'w-7 h-7 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'cpu-chip','class' => 'w-7 h-7 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
            <div class="flex-1 min-w-0">
                <div class="flex items-center gap-3 mb-1">
                    <h2 class="text-xl font-bold text-content-primary"><?php echo e($bot->name); ?></h2>
                    <?php
                        $strategyColors = ['scalping' => 'bg-warning/10 text-warning', 'day_trading' => 'bg-info/10 text-info', 'swing' => 'bg-primary/10 text-primary'];
                    ?>
                    <span class="<?php echo e($strategyColors[$bot->strategy_type] ?? 'bg-surface-overlay text-content-tertiary'); ?> text-xs font-medium px-2 py-0.5 rounded"><?php echo e($bot->strategy_label); ?></span>
                </div>
                <?php if($bot->description): ?>
                    <p class="text-sm text-content-secondary mt-1 leading-relaxed"><?php echo e($bot->description); ?></p>
                <?php endif; ?>
            </div>
            <div class="text-right flex-shrink-0">
                <p class="text-2xl font-bold text-gain"><?php echo e(number_format($bot->expected_roi, 2)); ?>%</p>
                <p class="text-xs text-content-tertiary">daily ROI</p>
            </div>
        </div>

        
        <div class="grid grid-cols-2 sm:grid-cols-5 gap-4 mt-6 pt-5 border-t border-surface-border">
            <div>
                <p class="text-xs text-content-tertiary">Win Rate</p>
                <p class="text-lg font-bold text-gain"><?php echo e(number_format($bot->win_rate)); ?>%</p>
            </div>
            <div>
                <p class="text-xs text-content-tertiary">Trade Interval</p>
                <p class="text-lg font-bold text-content-primary"><?php echo e($bot->trade_interval_minutes); ?>m</p>
            </div>
            <div>
                <p class="text-xs text-content-tertiary">Min Investment</p>
                <p class="text-lg font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($bot->min_investment); ?></p>
            </div>
            <div>
                <p class="text-xs text-content-tertiary">Max Investment</p>
                <p class="text-lg font-bold text-content-primary"><?php echo e($bot->max_investment ? \App\Helpers\CurrencyHelper::formatForUser($bot->max_investment) : 'No limit'); ?></p>
            </div>
            <div>
                <p class="text-xs text-content-tertiary">Max Duration</p>
                <p class="text-lg font-bold text-content-primary"><?php echo e($bot->max_duration_days); ?> days</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
        
        <div class="lg:col-span-2">
            <div class="bg-surface-raised border border-surface-border rounded-xl">
                <div class="px-5 py-4 border-b border-surface-border">
                    <h3 class="text-sm font-semibold text-content-primary">Recent Bot Trades</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-surface-overlay/50">
                                <th class="text-left text-xs font-medium text-content-tertiary px-5 py-2.5">Asset</th>
                                <th class="text-left text-xs font-medium text-content-tertiary px-5 py-2.5">Action</th>
                                <th class="text-left text-xs font-medium text-content-tertiary px-5 py-2.5">P/L</th>
                                <th class="text-left text-xs font-medium text-content-tertiary px-5 py-2.5">Result</th>
                                <th class="text-left text-xs font-medium text-content-tertiary px-5 py-2.5">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $recentTrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="border-b border-surface-border last:border-b-0">
                                    <td class="px-5 py-3">
                                        <p class="font-medium text-content-primary"><?php echo e($trade->asset_name); ?></p>
                                        <p class="text-[10px] text-content-tertiary"><?php echo e($trade->asset_class); ?></p>
                                    </td>
                                    <td class="px-5 py-3">
                                        <span class="<?php echo e($trade->action === 'buy' ? 'text-gain' : 'text-loss'); ?> text-xs font-semibold uppercase"><?php echo e($trade->action); ?></span>
                                    </td>
                                    <td class="px-5 py-3 font-medium <?php echo e($trade->profit_loss >= 0 ? 'text-gain' : 'text-loss'); ?>"><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->profit_loss); ?></td>
                                    <td class="px-5 py-3">
                                        <span class="<?php echo e($trade->result === 'WIN' ? 'bg-gain/10 text-gain' : 'bg-loss/10 text-loss'); ?> text-xs font-medium px-2 py-0.5 rounded-full"><?php echo e($trade->result); ?></span>
                                    </td>
                                    <td class="px-5 py-3 text-content-tertiary text-xs"><?php echo e($trade->executed_at->diffForHumans()); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr><td colspan="5" class="px-5 py-8 text-center text-content-tertiary">No trades recorded yet.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        
        <div>
            <?php if($activeSubscription): ?>
                <div class="bg-surface-raised border border-primary/30 rounded-xl p-5">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-gain/10 text-gain text-xs font-medium px-2.5 py-1 rounded-full">Active</span>
                        <span class="text-xs text-content-tertiary">Subscription #<?php echo e($activeSubscription->id); ?></span>
                    </div>
                    <div class="space-y-3">
                        <div>
                            <p class="text-xs text-content-tertiary">Invested</p>
                            <p class="text-lg font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($activeSubscription->invested_amount); ?></p>
                        </div>
                        <div>
                            <p class="text-xs text-content-tertiary">Profit Earned</p>
                            <p class="text-lg font-bold <?php echo e($activeSubscription->accumulated_profit >= 0 ? 'text-gain' : 'text-loss'); ?>"><?php echo \App\Helpers\CurrencyHelper::formatForUser($activeSubscription->accumulated_profit); ?></p>
                        </div>
                        <div>
                            <p class="text-xs text-content-tertiary">Expires</p>
                            <p class="text-sm text-content-primary"><?php echo e($activeSubscription->expires_at->format('M d, Y H:i')); ?></p>
                        </div>
                    </div>
                    <div class="mt-4 flex gap-2">
                        <a href="<?php echo e(route('botTrading.subscription', $activeSubscription->id)); ?>" class="flex-1 text-center bg-primary/10 text-primary hover:bg-primary hover:text-content-inverse rounded-lg py-2.5 text-sm font-medium transition-all">View Details</a>
                        <form action="<?php echo e(route('botTrading.stop', $activeSubscription->id)); ?>" method="POST" class="flex-1" onsubmit="return confirm('Stop this subscription? Your balance will be returned.')">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="w-full bg-loss/10 text-loss hover:bg-loss hover:text-white rounded-lg py-2.5 text-sm font-medium transition-all">Stop</button>
                        </form>
                    </div>
                </div>
            <?php else: ?>
                <div class="bg-surface-raised border border-surface-border rounded-xl p-5" x-data="{ amount: <?php echo e(old('invested_amount', Auth::user()->convertToUserCurrency($bot->min_investment))); ?>, days: <?php echo e(old('duration_days', min(30, $bot->max_duration_days))); ?> }">
                    <h3 class="text-sm font-semibold text-content-primary mb-4">Subscribe to this Bot</h3>
                    <form action="<?php echo e(route('botTrading.subscribe')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="trading_bot_id" value="<?php echo e($bot->id); ?>">

                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs text-content-tertiary mb-1.5">Investment Amount (<?php echo \App\Helpers\CurrencyHelper::getUserCode(); ?>)</label>
                                <input type="number" name="invested_amount" x-model="amount" min="<?php echo e(round(Auth::user()->convertToUserCurrency($bot->min_investment), 2)); ?>" <?php echo e($bot->max_investment ? 'max='.round(Auth::user()->convertToUserCurrency($bot->max_investment), 2) : ''); ?> step="0.01" required class="w-full bg-surface-overlay border border-surface-border rounded-lg px-3 py-2.5 text-sm text-content-primary focus:outline-none focus:ring-2 focus:ring-primary">
                                <p class="text-[10px] text-content-tertiary mt-1">Min: <?php echo \App\Helpers\CurrencyHelper::formatForUser($bot->min_investment); ?><?php echo e($bot->max_investment ? ' · Max: ' . \App\Helpers\CurrencyHelper::formatForUser($bot->max_investment) : ''); ?></p>
                            </div>

                            <div>
                                <label class="block text-xs text-content-tertiary mb-1.5">Duration (Days)</label>
                                <input type="number" name="duration_days" x-model="days" min="1" max="<?php echo e($bot->max_duration_days); ?>" required class="w-full bg-surface-overlay border border-surface-border rounded-lg px-3 py-2.5 text-sm text-content-primary focus:outline-none focus:ring-2 focus:ring-primary">
                                <p class="text-[10px] text-content-tertiary mt-1">Max: <?php echo e($bot->max_duration_days); ?> days</p>
                            </div>

                            
                            <div class="bg-surface-overlay/50 rounded-lg p-3 border border-surface-border">
                                <p class="text-xs text-content-tertiary mb-2">Estimated Earnings</p>
                                <div class="flex justify-between text-sm">
                                    <span class="text-content-secondary">Daily Profit</span>
                                    <span class="font-semibold text-gain" x-text="'<?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?>' + (amount * <?php echo e($bot->expected_roi); ?> / 100).toFixed(2)"></span>
                                </div>
                                <div class="flex justify-between text-sm mt-1">
                                    <span class="text-content-secondary">Total Estimated</span>
                                    <span class="font-semibold text-gain" x-text="'<?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?>' + (amount * <?php echo e($bot->expected_roi); ?> / 100 * days).toFixed(2)"></span>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="w-full mt-4 bg-primary hover:bg-primary-dark text-content-inverse rounded-lg py-2.5 text-sm font-medium transition-colors">
                            Subscribe Now
                        </button>
                        <p class="text-[10px] text-content-tertiary text-center mt-2">Amount will be deducted from your account balance</p>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\bot-trading\show.blade.php ENDPATH**/ ?>