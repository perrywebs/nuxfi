
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

    <?php echo $__env->make('user.partials.page-header', ['title' => 'Stock Portfolio', 'subtitle' => 'Your stock share holdings and performance'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="flex items-center gap-3 mb-6">
        <a href="<?php echo e(route('user.stocks.index')); ?>" class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium bg-primary hover:bg-primary-dark text-content-inverse rounded-lg transition-colors">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'chart-bar','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'chart-bar','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?> Browse Stocks
        </a>
        <a href="<?php echo e(route('user.stocks.history')); ?>" class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium bg-surface-overlay text-content-secondary hover:text-content-primary hover:bg-surface-overlay/80 rounded-lg transition-colors">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'clock','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'clock','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?> Trade History
        </a>
    </div>

    
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <?php echo $__env->make('user.partials.stat-card', [
            'label' => 'Total Invested',
            'value' => \App\Helpers\CurrencyHelper::formatForUser($totalInvested),
            'icon' => 'banknotes',
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card', [
            'label' => 'Current Value',
            'value' => \App\Helpers\CurrencyHelper::formatForUser($totalCurrentValue),
            'icon' => 'chart-bar',
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card', [
            'label' => 'Total P/L',
            'value' => ($totalPnl >= 0 ? '+' : '-') . \App\Helpers\CurrencyHelper::formatForUser(abs($totalPnl)),
            'icon' => 'arrow-trending-up',
            'color' => $totalPnl >= 0 ? 'gain' : 'loss',
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    
    <?php if($positions->count() > 0): ?>
        
        <div class="bg-surface-raised border border-surface-border rounded-xl overflow-hidden hidden md:block">
            <table class="w-full text-sm">
                <thead class="bg-surface-overlay">
                    <tr>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-content-tertiary uppercase tracking-wider">Stock</th>
                        <th class="px-5 py-3 text-right text-xs font-semibold text-content-tertiary uppercase tracking-wider">Shares</th>
                        <th class="px-5 py-3 text-right text-xs font-semibold text-content-tertiary uppercase tracking-wider">Avg Cost</th>
                        <th class="px-5 py-3 text-right text-xs font-semibold text-content-tertiary uppercase tracking-wider">Current Price</th>
                        <th class="px-5 py-3 text-right text-xs font-semibold text-content-tertiary uppercase tracking-wider">Market Value</th>
                        <th class="px-5 py-3 text-right text-xs font-semibold text-content-tertiary uppercase tracking-wider">P/L</th>
                        <th class="px-5 py-3 text-right text-xs font-semibold text-content-tertiary uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-border">
                    <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-surface-overlay/50 transition-colors">
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <?php if($pos->asset->logo_url): ?>
                                        <img src="<?php echo e($pos->asset->logo_url); ?>" alt="<?php echo e($pos->asset->symbol); ?>" class="w-8 h-8 rounded-full object-cover">
                                    <?php else: ?>
                                        <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary text-xs font-bold"><?php echo e(substr($pos->asset->symbol, 0, 2)); ?></div>
                                    <?php endif; ?>
                                    <div>
                                        <p class="font-medium text-content-primary"><?php echo e($pos->asset->symbol); ?></p>
                                        <p class="text-xs text-content-tertiary"><?php echo e($pos->asset->name); ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4 text-right text-content-primary"><?php echo e(number_format($pos->shares, 4)); ?></td>
                            <td class="px-5 py-4 text-right text-content-secondary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($pos->avg_buy_price); ?></td>
                            <td class="px-5 py-4 text-right text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($pos->asset->price); ?></td>
                            <td class="px-5 py-4 text-right text-content-primary font-medium"><?php echo \App\Helpers\CurrencyHelper::formatForUser($pos->current_value); ?></td>
                            <td class="px-5 py-4 text-right">
                                <span class="font-medium <?php echo e($pos->unrealized_pnl >= 0 ? 'text-gain' : 'text-loss'); ?>">
                                    <?php echo e($pos->unrealized_pnl >= 0 ? '+' : '-'); ?><?php echo \App\Helpers\CurrencyHelper::formatForUser(abs($pos->unrealized_pnl)); ?>
                                </span>
                                <span class="block text-xs <?php echo e($pos->unrealized_pnl_percent >= 0 ? 'text-gain' : 'text-loss'); ?>">
                                    <?php echo e($pos->unrealized_pnl_percent >= 0 ? '+' : ''); ?><?php echo e(number_format($pos->unrealized_pnl_percent, 2)); ?>%
                                </span>
                            </td>
                            <td class="px-5 py-4 text-right">
                                <a href="<?php echo e(route('user.stocks.show', $pos->asset->id)); ?>" class="text-xs font-medium text-primary hover:text-primary-dark transition-colors">Trade</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        
        <div class="md:hidden space-y-3">
            <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-surface-raised border border-surface-border rounded-xl p-4">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-2">
                            <?php if($pos->asset->logo_url): ?>
                                <img src="<?php echo e($pos->asset->logo_url); ?>" alt="<?php echo e($pos->asset->symbol); ?>" class="w-8 h-8 rounded-full object-cover">
                            <?php else: ?>
                                <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary text-xs font-bold"><?php echo e(substr($pos->asset->symbol, 0, 2)); ?></div>
                            <?php endif; ?>
                            <div>
                                <p class="text-sm font-semibold text-content-primary"><?php echo e($pos->asset->symbol); ?></p>
                                <p class="text-xs text-content-tertiary"><?php echo e($pos->asset->name); ?></p>
                            </div>
                        </div>
                        <span class="text-sm font-semibold <?php echo e($pos->unrealized_pnl >= 0 ? 'text-gain' : 'text-loss'); ?>">
                            <?php echo e($pos->unrealized_pnl >= 0 ? '+' : '-'); ?><?php echo \App\Helpers\CurrencyHelper::formatForUser(abs($pos->unrealized_pnl)); ?>
                        </span>
                    </div>
                    <div class="grid grid-cols-2 gap-2 text-xs">
                        <div><span class="text-content-tertiary">Shares:</span> <span class="text-content-primary"><?php echo e(number_format($pos->shares, 4)); ?></span></div>
                        <div><span class="text-content-tertiary">Avg Cost:</span> <span class="text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($pos->avg_buy_price); ?></span></div>
                        <div><span class="text-content-tertiary">Price:</span> <span class="text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($pos->asset->price); ?></span></div>
                        <div><span class="text-content-tertiary">Value:</span> <span class="text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($pos->current_value); ?></span></div>
                    </div>
                    <a href="<?php echo e(route('user.stocks.show', $pos->asset->id)); ?>" class="block text-center text-xs font-medium text-primary mt-3">Trade →</a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <div class="bg-surface-raised border border-surface-border rounded-xl p-12 text-center">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'chart-bar','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'chart-bar','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <h3 class="text-content-primary font-semibold mb-1">No positions yet</h3>
            <p class="text-sm text-content-tertiary mb-4">Start building your portfolio by buying stocks.</p>
            <a href="<?php echo e(route('user.stocks.index')); ?>" class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium bg-primary hover:bg-primary-dark text-content-inverse rounded-lg transition-colors">
                Browse Stocks
            </a>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\stocks\portfolio.blade.php ENDPATH**/ ?>