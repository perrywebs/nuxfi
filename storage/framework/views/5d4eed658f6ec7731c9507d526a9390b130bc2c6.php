
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

    
    <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden mb-6">
        <?php if($collection->banner_image): ?>
            <div class="h-40 sm:h-56 overflow-hidden">
                <img src="<?php echo e(asset('storage/app/public/' . $collection->banner_image)); ?>" alt="<?php echo e($collection->name); ?>" class="w-full h-full object-cover">
            </div>
        <?php else: ?>
            <div class="h-32 bg-gradient-to-r from-primary/20 to-primary/5"></div>
        <?php endif; ?>

        <div class="p-5 -mt-8 relative">
            <div class="flex items-end gap-4">
                <?php if($collection->logo_image): ?>
                    <img src="<?php echo e(asset('storage/app/public/' . $collection->logo_image)); ?>" class="w-16 h-16 rounded-xl border-4 border-surface-raised object-cover">
                <?php else: ?>
                    <div class="w-16 h-16 rounded-xl border-4 border-surface-raised bg-surface-overlay flex items-center justify-center">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'folder','class' => 'w-8 h-8 text-content-tertiary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'folder','class' => 'w-8 h-8 text-content-tertiary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="flex-1">
                    <h2 class="text-lg font-bold text-content-primary"><?php echo e($collection->name); ?></h2>
                    <?php if($collection->category): ?>
                        <p class="text-xs text-content-tertiary"><?php echo e($collection->category->name); ?></p>
                    <?php endif; ?>
                </div>
                <a href="<?php echo e(route('nft.gallery')); ?>" class="px-3 py-1.5 rounded-lg bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary text-xs font-medium transition-colors">
                    ← Gallery
                </a>
            </div>

            <?php if($collection->description): ?>
                <p class="text-sm text-content-secondary mt-3"><?php echo e($collection->description); ?></p>
            <?php endif; ?>

            
            <div class="flex items-center gap-6 mt-4 text-sm">
                <div>
                    <span class="text-content-tertiary text-xs">Items</span>
                    <p class="font-semibold text-content-primary"><?php echo e($nfts->total()); ?></p>
                </div>
                <div>
                    <span class="text-content-tertiary text-xs">Floor Price</span>
                    <p class="font-semibold text-primary"><?php echo e($collection->floor_price); ?> ETH</p>
                </div>
                <div>
                    <span class="text-content-tertiary text-xs">Volume</span>
                    <p class="font-semibold text-content-primary"><?php echo e($collection->total_volume); ?> ETH</p>
                </div>
                <?php if($collection->royalty_percent > 0): ?>
                    <div>
                        <span class="text-content-tertiary text-xs">Royalty</span>
                        <p class="font-semibold text-content-primary"><?php echo e($collection->royalty_percent); ?>%</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    
    <?php if($nfts->count()): ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
            <?php $__currentLoopData = $nfts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nft): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden hover:border-primary/50 transition-colors group">
                    <a href="<?php echo e(route('user.nfts.show', $nft->id)); ?>" class="block relative">
                        <div class="aspect-square overflow-hidden">
                            <img src="<?php echo e(asset('storage/app/public/' . $nft->image)); ?>" alt="<?php echo e($nft->name); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        </div>
                        <?php if($nft->is_featured): ?>
                            <span class="absolute top-2 left-2 px-2 py-0.5 rounded-full bg-warning/90 text-surface-base text-[10px] font-bold">Featured</span>
                        <?php endif; ?>
                    </a>
                    <div class="p-4">
                        <h4 class="text-sm font-semibold text-content-primary truncate mb-1"><?php echo e($nft->name); ?></h4>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm font-bold text-primary"><?php echo e($nft->price); ?> ETH</span>
                            <span class="text-[10px] text-content-tertiary flex items-center gap-0.5">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'eye','class' => 'w-3 h-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'eye','class' => 'w-3 h-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?> <?php echo e($nft->views_count); ?>

                            </span>
                        </div>
                        <a href="<?php echo e(route('user.nfts.show', $nft->id)); ?>" class="w-full block text-center py-2 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-medium transition-colors">View</a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if($nfts->hasPages()): ?>
            <div class="mt-6"><?php echo e($nfts->links()); ?></div>
        <?php endif; ?>
    <?php else: ?>
        <div class="rounded-xl bg-surface-raised border border-surface-border p-12 text-center">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'photo','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'photo','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <p class="text-content-secondary">No NFTs in this collection yet</p>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\nfts\collection.blade.php ENDPATH**/ ?>