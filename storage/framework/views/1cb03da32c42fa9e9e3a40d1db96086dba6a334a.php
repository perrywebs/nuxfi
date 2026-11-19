
<div class="space-y-6">

    
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <?php echo $__env->make('user.partials.stat-card', ['label' => 'Total Invested', 'value' => \App\Helpers\CurrencyHelper::formatForUser($totalStockInvested), 'icon' => 'banknotes'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card', ['label' => 'Current Value', 'value' => \App\Helpers\CurrencyHelper::formatForUser($totalStockValue), 'icon' => 'chart-bar'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php $stockPL = $totalStockValue - $totalStockInvested; ?>
        <?php echo $__env->make('user.partials.stat-card', ['label' => 'Unrealized P/L', 'value' => \App\Helpers\CurrencyHelper::formatForUser($stockPL), 'icon' => 'arrow-trending-up'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    
    <?php if($stockPositions->count() > 0): ?>
        <div class="bg-surface-raised border border-surface-border rounded-xl overflow-hidden">
            <div class="px-5 py-3 border-b border-surface-border flex items-center justify-between">
                <h3 class="text-sm font-semibold text-content-primary">Stock Holdings</h3>
                <a href="<?php echo e(route('user.stocks.portfolio')); ?>" class="text-xs text-primary hover:underline">View Full Portfolio</a>
            </div>
            <table class="w-full text-sm">
                <thead class="bg-surface-overlay">
                    <tr>
                        <th class="px-5 py-2.5 text-left text-xs font-semibold text-content-tertiary uppercase">Stock</th>
                        <th class="px-5 py-2.5 text-right text-xs font-semibold text-content-tertiary uppercase">Shares</th>
                        <th class="px-5 py-2.5 text-right text-xs font-semibold text-content-tertiary uppercase">Avg Cost</th>
                        <th class="px-5 py-2.5 text-right text-xs font-semibold text-content-tertiary uppercase">Price</th>
                        <th class="px-5 py-2.5 text-right text-xs font-semibold text-content-tertiary uppercase">Value</th>
                        <th class="px-5 py-2.5 text-right text-xs font-semibold text-content-tertiary uppercase">P/L</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-border">
                    <?php $__currentLoopData = $stockPositions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-surface-overlay/50 transition-colors">
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-2">
                                    <?php if($pos->asset && $pos->asset->logo_url): ?>
                                        <img src="<?php echo e($pos->asset->logo_url); ?>" alt="<?php echo e($pos->asset->symbol); ?>" class="w-6 h-6 rounded-full object-cover">
                                    <?php endif; ?>
                                    <span class="font-medium text-content-primary"><?php echo e($pos->asset->symbol ?? 'N/A'); ?></span>
                                </div>
                            </td>
                            <td class="px-5 py-3 text-right text-content-primary"><?php echo e(number_format($pos->shares, 4)); ?></td>
                            <td class="px-5 py-3 text-right text-content-secondary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($pos->avg_buy_price); ?></td>
                            <td class="px-5 py-3 text-right text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($pos->asset->price ?? 0); ?></td>
                            <td class="px-5 py-3 text-right text-content-primary font-medium"><?php echo \App\Helpers\CurrencyHelper::formatForUser($pos->current_value); ?></td>
                            <td class="px-5 py-3 text-right font-medium <?php echo e($pos->unrealized_pnl >= 0 ? 'text-gain' : 'text-loss'); ?>">
                                <?php echo \App\Helpers\CurrencyHelper::formatForUser($pos->unrealized_pnl); ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="bg-surface-raised border border-surface-border rounded-xl p-8 text-center">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'chart-bar','class' => 'w-10 h-10 text-content-tertiary mx-auto mb-2']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'chart-bar','class' => 'w-10 h-10 text-content-tertiary mx-auto mb-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <p class="text-sm text-content-tertiary">No stock positions yet.</p>
            <a href="<?php echo e(route('user.stocks.index')); ?>" class="text-sm text-primary hover:underline mt-1 inline-block">Browse Stocks</a>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\trades\partials\portfolio-tab-stocks.blade.php ENDPATH**/ ?>