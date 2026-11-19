
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

    <?php echo $__env->make('user.partials.page-header', ['title' => 'My Pre-IPO Holdings', 'subtitle' => 'Track your pre-IPO investments and sell post-IPO shares'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <?php echo $__env->make('user.partials.stat-card', ['label' => 'Total Invested', 'value' => \App\Helpers\CurrencyHelper::formatForUser($totalInvested), 'icon' => 'banknotes'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card', ['label' => 'Current Value', 'value' => \App\Helpers\CurrencyHelper::formatForUser($totalCurrentValue), 'icon' => 'chart-bar'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card', ['label' => 'Unrealized P/L', 'value' => ($totalPnl >= 0 ? '+' : '') . \App\Helpers\CurrencyHelper::formatForUser($totalPnl), 'icon' => 'chart-pie'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    
    <div class="bg-surface-raised border border-surface-border rounded-xl">
        <div class="px-5 py-4 border-b border-surface-border">
            <h3 class="text-sm font-semibold text-content-primary">Active Holdings</h3>
            <p class="text-xs text-content-tertiary mt-0.5">Pre-IPO shares — sell becomes available after IPO</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-surface-overlay/50">
                        <th class="px-5 py-3 text-xs font-medium text-content-tertiary uppercase tracking-wide text-left">Company</th>
                        <th class="px-5 py-3 text-xs font-medium text-content-tertiary uppercase tracking-wide text-right">Shares</th>
                        <th class="px-5 py-3 text-xs font-medium text-content-tertiary uppercase tracking-wide text-right">Avg Cost</th>
                        <th class="px-5 py-3 text-xs font-medium text-content-tertiary uppercase tracking-wide text-right">Current Price</th>
                        <th class="px-5 py-3 text-xs font-medium text-content-tertiary uppercase tracking-wide text-right">Current Value</th>
                        <th class="px-5 py-3 text-xs font-medium text-content-tertiary uppercase tracking-wide text-right">P/L</th>
                        <th class="px-5 py-3 text-xs font-medium text-content-tertiary uppercase tracking-wide text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $activeHoldings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $holding): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="border-b border-surface-border last:border-0 hover:bg-surface-overlay/30 transition-colors">
                            <td class="px-5 py-3.5">
                                <a href="<?php echo e(route('user.pre-ipo.show', $holding->pre_ipo_company_id)); ?>" class="flex items-center gap-3 group">
                                    <?php if($holding->company->logo): ?>
                                        <img src="<?php echo e(asset('storage/app/public/' . $holding->company->logo)); ?>" alt="" class="w-8 h-8 rounded-lg object-cover border border-surface-border">
                                    <?php else: ?>
                                        <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-xs font-bold"><?php echo e(substr($holding->company->symbol, 0, 2)); ?></div>
                                    <?php endif; ?>
                                    <div>
                                        <p class="text-sm font-medium text-content-primary group-hover:text-primary transition-colors"><?php echo e($holding->company->name); ?></p>
                                        <p class="text-xs text-content-tertiary font-mono"><?php echo e($holding->company->symbol); ?></p>
                                    </div>
                                </a>
                            </td>
                            <td class="px-5 py-3.5 text-sm font-medium text-content-primary text-right"><?php echo e(number_format($holding->shares)); ?></td>
                            <td class="px-5 py-3.5 text-sm text-content-secondary text-right"><?php echo \App\Helpers\CurrencyHelper::formatForUser($holding->purchase_price); ?></td>
                            <td class="px-5 py-3.5 text-sm text-content-secondary text-right"><?php echo \App\Helpers\CurrencyHelper::formatForUser($holding->company->current_price); ?></td>
                            <td class="px-5 py-3.5 text-sm font-medium text-content-primary text-right"><?php echo \App\Helpers\CurrencyHelper::formatForUser($holding->current_value); ?></td>
                            <td class="px-5 py-3.5 text-sm font-medium text-right <?php echo e($holding->unrealized_pnl >= 0 ? 'text-gain' : 'text-loss'); ?>">
                                <?php echo e($holding->unrealized_pnl >= 0 ? '+' : ''); ?><?php echo \App\Helpers\CurrencyHelper::formatForUser($holding->unrealized_pnl); ?>
                                <span class="text-xs">(<?php echo e($holding->unrealized_pnl_percent >= 0 ? '+' : ''); ?><?php echo e($holding->unrealized_pnl_percent); ?>%)</span>
                            </td>
                            <td class="px-5 py-3.5 text-center">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gain/10 text-gain">Active</span>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="py-8 text-center text-content-tertiary text-sm">
                                No active pre-IPO holdings.
                                <a href="<?php echo e(route('user.pre-ipo.index')); ?>" class="text-primary hover:underline">Browse offerings</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    
    <?php if($convertedHoldings->count() > 0): ?>
    <div class="bg-surface-raised border border-surface-border rounded-xl">
        <div class="px-5 py-4 border-b border-surface-border">
            <h3 class="text-sm font-semibold text-content-primary">Converted Holdings</h3>
            <p class="text-xs text-content-tertiary mt-0.5">Post-IPO shares — sell at live market price</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-surface-overlay/50">
                        <th class="px-5 py-3 text-xs font-medium text-content-tertiary uppercase tracking-wide text-left">Company</th>
                        <th class="px-5 py-3 text-xs font-medium text-content-tertiary uppercase tracking-wide text-right">Shares</th>
                        <th class="px-5 py-3 text-xs font-medium text-content-tertiary uppercase tracking-wide text-right">Avg Cost</th>
                        <th class="px-5 py-3 text-xs font-medium text-content-tertiary uppercase tracking-wide text-right">Live Price</th>
                        <th class="px-5 py-3 text-xs font-medium text-content-tertiary uppercase tracking-wide text-right">Current Value</th>
                        <th class="px-5 py-3 text-xs font-medium text-content-tertiary uppercase tracking-wide text-right">P/L</th>
                        <th class="px-5 py-3 text-xs font-medium text-content-tertiary uppercase tracking-wide text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $convertedHoldings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $holding): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b border-surface-border last:border-0 hover:bg-surface-overlay/30 transition-colors">
                            <td class="px-5 py-3.5">
                                <a href="<?php echo e(route('user.pre-ipo.show', $holding->pre_ipo_company_id)); ?>" class="flex items-center gap-3 group">
                                    <?php if($holding->company->logo): ?>
                                        <img src="<?php echo e(asset('storage/app/public/' . $holding->company->logo)); ?>" alt="" class="w-8 h-8 rounded-lg object-cover border border-surface-border">
                                    <?php else: ?>
                                        <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-xs font-bold"><?php echo e(substr($holding->company->symbol, 0, 2)); ?></div>
                                    <?php endif; ?>
                                    <div>
                                        <p class="text-sm font-medium text-content-primary group-hover:text-primary transition-colors"><?php echo e($holding->company->name); ?></p>
                                        <p class="text-xs text-content-tertiary font-mono"><?php echo e($holding->company->symbol); ?></p>
                                    </div>
                                </a>
                            </td>
                            <td class="px-5 py-3.5 text-sm font-medium text-content-primary text-right"><?php echo e(number_format($holding->shares)); ?></td>
                            <td class="px-5 py-3.5 text-sm text-content-secondary text-right"><?php echo \App\Helpers\CurrencyHelper::formatForUser($holding->purchase_price); ?></td>
                            <td class="px-5 py-3.5 text-sm text-content-secondary text-right"><?php echo \App\Helpers\CurrencyHelper::formatForUser($holding->company->current_price); ?></td>
                            <td class="px-5 py-3.5 text-sm font-medium text-content-primary text-right"><?php echo \App\Helpers\CurrencyHelper::formatForUser($holding->current_value); ?></td>
                            <td class="px-5 py-3.5 text-sm font-medium text-right <?php echo e($holding->unrealized_pnl >= 0 ? 'text-gain' : 'text-loss'); ?>">
                                <?php echo e($holding->unrealized_pnl >= 0 ? '+' : ''); ?><?php echo \App\Helpers\CurrencyHelper::formatForUser($holding->unrealized_pnl); ?>
                            </td>
                            <td class="px-5 py-3.5 text-center" x-data="{ showSell: false }">
                                <button @click="showSell = !showSell"
                                        class="bg-loss/10 text-loss border border-loss/20 hover:bg-loss/20 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">
                                    Sell
                                </button>
                                <div x-show="showSell" x-cloak class="mt-2 text-left">
                                    <form action="<?php echo e(route('user.pre-ipo.sell', $holding->id)); ?>" method="POST" class="flex items-center gap-2">
                                        <?php echo csrf_field(); ?>
                                        <input type="number" name="quantity" min="1" max="<?php echo e($holding->shares); ?>" value="1" required
                                               class="w-20 bg-surface-overlay border border-surface-border rounded-lg px-2 py-1.5 text-xs text-content-primary focus:outline-none focus:ring-1 focus:ring-primary">
                                        <button type="submit" class="bg-loss text-white rounded-lg px-3 py-1.5 text-xs font-medium hover:bg-loss/90 transition-colors">Confirm</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>

    <div class="text-center">
        <a href="<?php echo e(route('user.pre-ipo.index')); ?>" class="text-sm text-primary hover:underline">Browse Pre-IPO Offerings →</a>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\pre-ipo\holdings.blade.php ENDPATH**/ ?>