
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

    <?php echo $__env->make('user.partials.page-header', ['title' => 'Pre-IPO Shares', 'subtitle' => 'Invest in companies before they go public'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
        <a href="<?php echo e(route('user.pre-ipo.holdings')); ?>"
           class="bg-primary hover:bg-primary-dark text-content-inverse rounded-lg py-2.5 px-4 text-sm font-medium transition-colors inline-flex items-center gap-2">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'briefcase','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'briefcase','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?> My Holdings
        </a>
    </div>

    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php $__empty_1 = true; $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <a href="<?php echo e(route('user.pre-ipo.show', $company->id)); ?>"
               class="bg-surface-raised border border-surface-border rounded-xl p-5 hover:border-primary/30 transition-colors group">

                <div class="flex items-start justify-between mb-3">
                    <div class="flex items-center gap-3">
                        <?php if($company->logo): ?>
                            <img src="<?php echo e(asset('storage/app/public/' . $company->logo)); ?>" alt="<?php echo e($company->name); ?>" class="w-10 h-10 rounded-lg object-cover border border-surface-border">
                        <?php else: ?>
                            <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-xs font-bold"><?php echo e(substr($company->symbol, 0, 2)); ?></div>
                        <?php endif; ?>
                        <div>
                            <h3 class="text-sm font-semibold text-content-primary group-hover:text-primary transition-colors"><?php echo e($company->name); ?></h3>
                            <p class="text-xs text-content-tertiary font-mono"><?php echo e($company->symbol); ?></p>
                        </div>
                    </div>
                    <?php if($company->is_featured): ?>
                        <span class="text-warning text-xs">★ Featured</span>
                    <?php endif; ?>
                </div>

                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-content-tertiary">Share Price</span>
                        <span class="text-sm font-semibold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($company->share_price); ?></span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-content-tertiary">Price Change</span>
                        <span class="text-xs font-medium <?php echo e($company->price_change_percent >= 0 ? 'text-gain' : 'text-loss'); ?>">
                            <?php echo e($company->price_change_percent >= 0 ? '+' : ''); ?><?php echo e($company->price_change_percent); ?>%
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-content-tertiary">Available</span>
                        <span class="text-xs text-content-secondary"><?php echo e(number_format($company->shares_remaining)); ?> / <?php echo e(number_format($company->total_shares)); ?></span>
                    </div>

                    
                    <div class="w-full bg-surface-overlay rounded-full h-1.5 mt-1">
                        <div class="bg-primary rounded-full h-1.5" style="width: <?php echo e($company->total_shares > 0 ? round(($company->shares_sold / $company->total_shares) * 100) : 0); ?>%"></div>
                    </div>

                    <div class="flex items-center justify-between pt-1">
                        <?php
                            $statusColors = [
                                'upcoming' => 'bg-info/10 text-info',
                                'open' => 'bg-gain/10 text-gain',
                                'closed' => 'bg-warning/10 text-warning',
                                'ipo' => 'bg-primary/10 text-primary',
                                'public' => 'bg-gain/10 text-gain',
                            ];
                        ?>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium <?php echo e($statusColors[$company->status] ?? 'bg-surface-overlay text-content-secondary'); ?>">
                            <?php echo e(ucfirst($company->status)); ?>

                        </span>
                        <?php if(isset($userHoldings[$company->id])): ?>
                            <span class="text-xs text-primary font-medium"><?php echo e($userHoldings[$company->id]); ?> shares held</span>
                        <?php endif; ?>
                    </div>
                </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full text-center py-12 text-content-tertiary">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'building-office','class' => 'w-12 h-12 mx-auto mb-3 opacity-50']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'building-office','class' => 'w-12 h-12 mx-auto mb-3 opacity-50']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <p class="text-sm">No Pre-IPO offerings available right now.</p>
            </div>
        <?php endif; ?>
    </div>

    <?php if($companies->hasPages()): ?>
        <div class="mt-4"><?php echo e($companies->links()); ?></div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\pre-ipo\index.blade.php ENDPATH**/ ?>