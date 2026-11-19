
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

    <?php echo $__env->make('user.partials.page-header', ['title' => 'Stock Trade History', 'subtitle' => 'Your buy and sell activity'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="flex items-center gap-3 mb-6">
        <a href="<?php echo e(route('user.stocks.index')); ?>" class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium bg-surface-overlay text-content-secondary hover:text-content-primary hover:bg-surface-overlay/80 rounded-lg transition-colors">
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
        <a href="<?php echo e(route('user.stocks.portfolio')); ?>" class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium bg-surface-overlay text-content-secondary hover:text-content-primary hover:bg-surface-overlay/80 rounded-lg transition-colors">
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
<?php endif; ?> My Portfolio
        </a>
    </div>

    
    <div class="flex items-center gap-1 mb-6">
        <a href="<?php echo e(route('user.stocks.history')); ?>"
           class="px-3 py-2 text-sm font-medium rounded-lg transition-colors <?php echo e($filter === 'all' ? 'bg-primary text-content-inverse' : 'bg-surface-overlay text-content-secondary hover:text-content-primary'); ?>">
            All
        </a>
        <a href="<?php echo e(route('user.stocks.history', ['type' => 'buy'])); ?>"
           class="px-3 py-2 text-sm font-medium rounded-lg transition-colors <?php echo e($filter === 'buy' ? 'bg-gain text-white' : 'bg-surface-overlay text-content-secondary hover:text-content-primary'); ?>">
            Buys
        </a>
        <a href="<?php echo e(route('user.stocks.history', ['type' => 'sell'])); ?>"
           class="px-3 py-2 text-sm font-medium rounded-lg transition-colors <?php echo e($filter === 'sell' ? 'bg-loss text-white' : 'bg-surface-overlay text-content-secondary hover:text-content-primary'); ?>">
            Sells
        </a>
    </div>

    <?php if($trades->count() > 0): ?>
        
        <div class="bg-surface-raised border border-surface-border rounded-xl overflow-hidden hidden md:block">
            <table class="w-full text-sm">
                <thead class="bg-surface-overlay">
                    <tr>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-content-tertiary uppercase tracking-wider">Stock</th>
                        <th class="px-5 py-3 text-center text-xs font-semibold text-content-tertiary uppercase tracking-wider">Type</th>
                        <th class="px-5 py-3 text-right text-xs font-semibold text-content-tertiary uppercase tracking-wider">Shares</th>
                        <th class="px-5 py-3 text-right text-xs font-semibold text-content-tertiary uppercase tracking-wider">Price/Share</th>
                        <th class="px-5 py-3 text-right text-xs font-semibold text-content-tertiary uppercase tracking-wider">Total</th>
                        <th class="px-5 py-3 text-right text-xs font-semibold text-content-tertiary uppercase tracking-wider">Fee</th>
                        <th class="px-5 py-3 text-right text-xs font-semibold text-content-tertiary uppercase tracking-wider">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-border">
                    <?php $__currentLoopData = $trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-surface-overlay/50 transition-colors">
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <?php if($trade->asset && $trade->asset->logo_url): ?>
                                        <img src="<?php echo e($trade->asset->logo_url); ?>" alt="<?php echo e($trade->asset->symbol); ?>" class="w-8 h-8 rounded-full object-cover">
                                    <?php else: ?>
                                        <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary text-xs font-bold"><?php echo e($trade->asset ? substr($trade->asset->symbol, 0, 2) : '??'); ?></div>
                                    <?php endif; ?>
                                    <div>
                                        <p class="font-medium text-content-primary"><?php echo e($trade->asset->symbol ?? 'N/A'); ?></p>
                                        <p class="text-xs text-content-tertiary"><?php echo e($trade->asset->name ?? ''); ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4 text-center">
                                <span class="px-2 py-0.5 text-xs font-medium rounded <?php echo e($trade->type === 'buy' ? 'bg-gain/10 text-gain' : 'bg-loss/10 text-loss'); ?>">
                                    <?php echo e(strtoupper($trade->type)); ?>

                                </span>
                            </td>
                            <td class="px-5 py-4 text-right text-content-primary"><?php echo e(number_format($trade->shares, 4)); ?></td>
                            <td class="px-5 py-4 text-right text-content-secondary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->price_per_share); ?></td>
                            <td class="px-5 py-4 text-right text-content-primary font-medium"><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->total_amount); ?></td>
                            <td class="px-5 py-4 text-right text-content-tertiary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->fee_amount); ?></td>
                            <td class="px-5 py-4 text-right text-content-tertiary"><?php echo e($trade->created_at->format('M d, Y H:i')); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        
        <div class="md:hidden space-y-3">
            <?php $__currentLoopData = $trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-surface-raised border border-surface-border rounded-xl p-4">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center gap-2">
                            <?php if($trade->asset && $trade->asset->logo_url): ?>
                                <img src="<?php echo e($trade->asset->logo_url); ?>" alt="<?php echo e($trade->asset->symbol); ?>" class="w-7 h-7 rounded-full object-cover">
                            <?php endif; ?>
                            <span class="text-sm font-semibold text-content-primary"><?php echo e($trade->asset->symbol ?? 'N/A'); ?></span>
                        </div>
                        <span class="px-2 py-0.5 text-xs font-medium rounded <?php echo e($trade->type === 'buy' ? 'bg-gain/10 text-gain' : 'bg-loss/10 text-loss'); ?>">
                            <?php echo e(strtoupper($trade->type)); ?>

                        </span>
                    </div>
                    <div class="grid grid-cols-2 gap-2 text-xs">
                        <div><span class="text-content-tertiary">Shares:</span> <span class="text-content-primary"><?php echo e(number_format($trade->shares, 4)); ?></span></div>
                        <div><span class="text-content-tertiary">Price:</span> <span class="text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->price_per_share); ?></span></div>
                        <div><span class="text-content-tertiary">Total:</span> <span class="text-content-primary font-medium"><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->total_amount); ?></span></div>
                        <div><span class="text-content-tertiary">Date:</span> <span class="text-content-primary"><?php echo e($trade->created_at->format('M d, Y')); ?></span></div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
        <div class="mt-6">
            <?php echo e($trades->withQueryString()->links()); ?>

        </div>
    <?php else: ?>
        <div class="bg-surface-raised border border-surface-border rounded-xl p-12 text-center">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'clock','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'clock','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <h3 class="text-content-primary font-semibold mb-1">No trades yet</h3>
            <p class="text-sm text-content-tertiary mb-4">Your stock trade history will appear here.</p>
            <a href="<?php echo e(route('user.stocks.index')); ?>" class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium bg-primary hover:bg-primary-dark text-content-inverse rounded-lg transition-colors">
                Browse Stocks
            </a>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\stocks\history.blade.php ENDPATH**/ ?>