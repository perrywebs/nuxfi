
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
        <div class="flex items-start justify-between mb-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'cpu-chip','class' => 'w-6 h-6 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'cpu-chip','class' => 'w-6 h-6 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-content-primary"><?php echo e($subscription->tradingBot->name ?? 'Deleted Bot'); ?></h2>
                    <p class="text-xs text-content-tertiary">Subscription #<?php echo e($subscription->id); ?></p>
                </div>
            </div>
            <?php
                $statusClass = match($subscription->status) {
                    'active' => 'bg-gain/10 text-gain',
                    'stopped' => 'bg-loss/10 text-loss',
                    'completed' => 'bg-primary-subtle text-primary',
                    'settled' => 'bg-warning/10 text-warning',
                    default => 'bg-surface-overlay text-content-tertiary',
                };
            ?>
            <span class="<?php echo e($statusClass); ?> text-xs font-medium px-3 py-1.5 rounded-full"><?php echo e(ucfirst($subscription->status)); ?></span>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-5 gap-4 pt-4 border-t border-surface-border">
            <div>
                <p class="text-xs text-content-tertiary">Invested</p>
                <p class="text-lg font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($subscription->invested_amount); ?></p>
            </div>
            <div>
                <p class="text-xs text-content-tertiary">Accumulated Profit</p>
                <p class="text-lg font-bold <?php echo e($subscription->accumulated_profit >= 0 ? 'text-gain' : 'text-loss'); ?>"><?php echo \App\Helpers\CurrencyHelper::formatForUser($subscription->accumulated_profit); ?></p>
            </div>
            <div>
                <p class="text-xs text-content-tertiary">Daily ROI</p>
                <p class="text-lg font-bold text-gain"><?php echo e(number_format($subscription->daily_roi_snapshot, 2)); ?>%</p>
            </div>
            <div>
                <p class="text-xs text-content-tertiary">Started</p>
                <p class="text-sm font-medium text-content-primary"><?php echo e($subscription->started_at->format('M d, Y')); ?></p>
            </div>
            <div>
                <p class="text-xs text-content-tertiary">Expires</p>
                <p class="text-sm font-medium text-content-primary"><?php echo e($subscription->expires_at ? $subscription->expires_at->format('M d, Y') : '—'); ?></p>
            </div>
        </div>

        <?php if($subscription->status === 'active'): ?>
            <div class="mt-4 pt-4 border-t border-surface-border flex items-center justify-between">
                <div>
                    <p class="text-xs text-content-tertiary">Total Payout if Stopped Now</p>
                    <p class="text-xl font-bold text-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($subscription->totalPayout()); ?></p>
                </div>
                <form action="<?php echo e(route('botTrading.stop', $subscription->id)); ?>" method="POST" onsubmit="return confirm('Stop this subscription and withdraw your funds?')">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="bg-loss/10 text-loss hover:bg-loss hover:text-white rounded-lg px-5 py-2.5 text-sm font-medium transition-all">Stop & Withdraw</button>
                </form>
            </div>
        <?php endif; ?>
    </div>

    
    <div class="bg-surface-raised border border-surface-border rounded-xl mt-6">
        <div class="px-5 py-4 border-b border-surface-border flex items-center justify-between">
            <h3 class="text-sm font-semibold text-content-primary">Simulated Trades</h3>
            <span class="text-xs text-content-tertiary"><?php echo e($trades->total()); ?> total</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-surface-overlay/50">
                        <th class="text-left text-xs font-medium text-content-tertiary px-5 py-2.5">Asset</th>
                        <th class="text-left text-xs font-medium text-content-tertiary px-5 py-2.5">Action</th>
                        <th class="text-left text-xs font-medium text-content-tertiary px-5 py-2.5">Amount</th>
                        <th class="text-left text-xs font-medium text-content-tertiary px-5 py-2.5">Entry</th>
                        <th class="text-left text-xs font-medium text-content-tertiary px-5 py-2.5">Exit</th>
                        <th class="text-left text-xs font-medium text-content-tertiary px-5 py-2.5">P/L</th>
                        <th class="text-left text-xs font-medium text-content-tertiary px-5 py-2.5">Result</th>
                        <th class="text-left text-xs font-medium text-content-tertiary px-5 py-2.5">Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="border-b border-surface-border last:border-b-0">
                            <td class="px-5 py-3">
                                <p class="font-medium text-content-primary"><?php echo e($trade->asset_name); ?></p>
                                <p class="text-[10px] text-content-tertiary"><?php echo e($trade->asset_class); ?></p>
                            </td>
                            <td class="px-5 py-3">
                                <span class="<?php echo e($trade->action === 'buy' ? 'text-gain' : 'text-loss'); ?> text-xs font-semibold uppercase"><?php echo e($trade->action); ?></span>
                            </td>
                            <td class="px-5 py-3 text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->amount); ?></td>
                            <td class="px-5 py-3 text-content-primary"><?php echo e(number_format($trade->entry_price, 4)); ?></td>
                            <td class="px-5 py-3 text-content-primary"><?php echo e(number_format($trade->exit_price, 4)); ?></td>
                            <td class="px-5 py-3 font-medium <?php echo e($trade->profit_loss >= 0 ? 'text-gain' : 'text-loss'); ?>"><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->profit_loss); ?></td>
                            <td class="px-5 py-3">
                                <span class="<?php echo e($trade->result === 'WIN' ? 'bg-gain/10 text-gain' : 'bg-loss/10 text-loss'); ?> text-xs font-medium px-2 py-0.5 rounded-full"><?php echo e($trade->result); ?></span>
                            </td>
                            <td class="px-5 py-3 text-content-tertiary text-xs"><?php echo e($trade->executed_at->format('M d, H:i')); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="8" class="px-5 py-8 text-center text-content-tertiary">No trades recorded yet. The bot will start trading shortly.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($trades->hasPages()): ?>
        <div class="mt-4"><?php echo e($trades->links()); ?></div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\bot-trading\subscription.blade.php ENDPATH**/ ?>