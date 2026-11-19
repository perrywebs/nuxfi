
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

    <?php echo $__env->make('user.partials.page-header', ['title' => 'Stock Shares', 'subtitle' => 'Buy and sell fractional shares of real stocks'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="flex items-center gap-3 mb-6">
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

    
    <div x-data="{ search: '' }" class="space-y-6">
        <div class="relative">
            <input type="text" x-model="search" placeholder="Search stocks by name or symbol..."
                   class="w-full bg-surface-overlay border border-surface-border rounded-lg px-4 py-2.5 pl-10 text-sm text-content-primary focus:outline-none focus:ring-2 focus:ring-primary" />
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-content-tertiary" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
        </div>

        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <?php $__empty_1 = true; $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div x-show="!search || '<?php echo e(strtolower($stock->symbol . ' ' . $stock->name)); ?>'.includes(search.toLowerCase())"
                     class="bg-surface-raised border border-surface-border rounded-xl p-5 hover:border-primary/30 transition-colors">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex items-center gap-3">
                            <?php if($stock->logo_url): ?>
                                <img src="<?php echo e($stock->logo_url); ?>" alt="<?php echo e($stock->symbol); ?>" class="w-10 h-10 rounded-full object-cover bg-surface-overlay">
                            <?php else: ?>
                                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-sm">
                                    <?php echo e(substr($stock->symbol, 0, 2)); ?>

                                </div>
                            <?php endif; ?>
                            <div>
                                <h3 class="text-sm font-semibold text-content-primary"><?php echo e($stock->symbol); ?></h3>
                                <p class="text-xs text-content-tertiary truncate max-w-[120px]"><?php echo e($stock->name); ?></p>
                            </div>
                        </div>
                        <?php if(isset($userPositions[$stock->id])): ?>
                            <span class="text-[10px] font-medium px-1.5 py-0.5 rounded bg-primary/10 text-primary">HOLDING</span>
                        <?php endif; ?>
                    </div>

                    <div class="flex items-end justify-between mb-4">
                        <div>
                            <span class="text-lg font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($stock->price); ?></span>
                            <?php if($stock->price_change_pct_24h): ?>
                                <span class="text-xs font-medium ml-1 <?php echo e($stock->price_change_pct_24h >= 0 ? 'text-gain' : 'text-loss'); ?>">
                                    <?php echo e($stock->price_change_pct_24h >= 0 ? '+' : ''); ?><?php echo e(number_format($stock->price_change_pct_24h, 2)); ?>%
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if(isset($userPositions[$stock->id])): ?>
                        <p class="text-xs text-content-tertiary mb-3">You hold <?php echo e(number_format($userPositions[$stock->id], 4)); ?> shares</p>
                    <?php endif; ?>

                    <a href="<?php echo e(route('user.stocks.show', $stock->id)); ?>"
                       class="block w-full text-center bg-primary hover:bg-primary-dark text-content-inverse rounded-lg py-2 text-sm font-medium transition-colors">
                        Trade
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-full text-center py-12">
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
                    <p class="text-content-secondary">No stocks available at the moment.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\stocks\index.blade.php ENDPATH**/ ?>