
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

    
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-6">
        <div>
            <h2 class="text-xl font-bold text-content-primary">NFT Marketplace</h2>
            <p class="text-sm text-content-secondary mt-1">Discover, collect, and trade unique digital assets</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="<?php echo e(route('user.nfts.create')); ?>" class="px-4 py-2 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-medium transition-colors inline-flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                Mint NFT
            </a>
            <a href="<?php echo e(route('user.nfts.my')); ?>" class="px-4 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary text-sm font-medium transition-colors">My NFTs</a>
        </div>
    </div>

    
    <?php if($featuredNfts->count()): ?>
        <div class="mb-6">
            <h3 class="text-sm font-semibold text-content-primary mb-3 flex items-center gap-1.5">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'star','class' => 'w-4 h-4 text-warning']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'star','class' => 'w-4 h-4 text-warning']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?> Featured
            </h3>
            <div class="flex gap-4 overflow-x-auto pb-2 scrollbar-thin">
                <?php $__currentLoopData = $featuredNfts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('user.nfts.show', $feat->id)); ?>" class="flex-shrink-0 w-56 rounded-xl bg-surface-raised border border-surface-border overflow-hidden hover:border-primary/50 transition-colors group">
                        <div class="aspect-[4/3] overflow-hidden">
                            <img src="<?php echo e(asset('storage/app/public/' . $feat->image)); ?>" alt="<?php echo e($feat->name); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="p-3">
                            <p class="text-sm font-medium text-content-primary truncate"><?php echo e($feat->name); ?></p>
                            <p class="text-xs text-primary font-semibold"><?php echo e($feat->price); ?> ETH</p>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>

    
    <?php if($collections->count()): ?>
        <div class="mb-6">
            <h3 class="text-sm font-semibold text-content-primary mb-3 flex items-center gap-1.5">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'folder','class' => 'w-4 h-4 text-content-tertiary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'folder','class' => 'w-4 h-4 text-content-tertiary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?> Collections
            </h3>
            <div class="flex gap-3 overflow-x-auto pb-2 scrollbar-thin">
                <?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('user.nfts.collection', $col->id)); ?>" class="flex-shrink-0 px-4 py-2.5 rounded-xl bg-surface-raised border border-surface-border hover:border-primary/50 transition-colors text-center min-w-[120px]">
                        <p class="text-sm font-medium text-content-primary truncate"><?php echo e($col->name); ?></p>
                        <p class="text-xs text-content-tertiary"><?php echo e($col->nfts_count); ?> items</p>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>

    
    <div class="rounded-xl bg-surface-raised border border-surface-border p-4 mb-6" x-data="{ showFilters: false }">
        <form method="GET" action="<?php echo e(route('nft.gallery')); ?>">
            <div class="flex flex-wrap items-center gap-2 mb-3">
                
                <a href="<?php echo e(route('nft.gallery')); ?>" class="px-3 py-1.5 rounded-lg text-xs font-medium transition-colors <?php echo e(!request('category_id') ? 'bg-primary text-content-inverse' : 'bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary'); ?>">All</a>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('nft.gallery', ['category_id' => $cat->id])); ?>" class="px-3 py-1.5 rounded-lg text-xs font-medium transition-colors <?php echo e(request('category_id') == $cat->id ? 'bg-primary text-content-inverse' : 'bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary'); ?>"><?php echo e($cat->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <button type="button" @click="showFilters = !showFilters" class="ml-auto px-3 py-1.5 rounded-lg bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary text-xs font-medium transition-colors inline-flex items-center gap-1">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'funnel','class' => 'w-3.5 h-3.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'funnel','class' => 'w-3.5 h-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?> Filters
                </button>
            </div>

            
            <div class="flex gap-2">
                <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Search by name, description, or token ID..."
                       class="flex-1 px-3 py-2.5 rounded-lg bg-surface-overlay border border-surface-border text-content-primary text-sm placeholder-content-tertiary focus:outline-none focus:ring-2 focus:ring-primary">
                <button type="submit" class="px-4 py-2.5 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-medium transition-colors">Search</button>
            </div>

            
            <div x-show="showFilters" x-transition x-cloak class="grid grid-cols-2 sm:grid-cols-4 gap-3 mt-3 pt-3 border-t border-surface-border">
                <div>
                    <label class="block text-xs text-content-tertiary mb-1">Min Price (ETH)</label>
                    <input type="number" name="min_price" step="0.01" value="<?php echo e(request('min_price')); ?>" class="w-full px-3 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-primary text-sm focus:outline-none focus:ring-2 focus:ring-primary" placeholder="0">
                </div>
                <div>
                    <label class="block text-xs text-content-tertiary mb-1">Max Price (ETH)</label>
                    <input type="number" name="max_price" step="0.01" value="<?php echo e(request('max_price')); ?>" class="w-full px-3 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-primary text-sm focus:outline-none focus:ring-2 focus:ring-primary" placeholder="100">
                </div>
                <div>
                    <label class="block text-xs text-content-tertiary mb-1">Collection</label>
                    <select name="collection_id" class="w-full px-3 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-primary text-sm focus:outline-none focus:ring-2 focus:ring-primary">
                        <option value="">All</option>
                        <?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($col->id); ?>" <?php echo e(request('collection_id') == $col->id ? 'selected' : ''); ?>><?php echo e($col->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-content-tertiary mb-1">Sort By</label>
                    <select name="sort" class="w-full px-3 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-primary text-sm focus:outline-none focus:ring-2 focus:ring-primary">
                        <option value="latest" <?php echo e(request('sort') == 'latest' ? 'selected' : ''); ?>>Latest</option>
                        <option value="price_asc" <?php echo e(request('sort') == 'price_asc' ? 'selected' : ''); ?>>Price: Low → High</option>
                        <option value="price_desc" <?php echo e(request('sort') == 'price_desc' ? 'selected' : ''); ?>>Price: High → Low</option>
                        <option value="popular" <?php echo e(request('sort') == 'popular' ? 'selected' : ''); ?>>Most Viewed</option>
                        <option value="liked" <?php echo e(request('sort') == 'liked' ? 'selected' : ''); ?>>Most Liked</option>
                    </select>
                </div>
            </div>
        </form>
    </div>

    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
        <?php $__empty_1 = true; $__currentLoopData = $nfts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nft): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                    <div class="flex items-start justify-between mb-1">
                        <h4 class="text-sm font-semibold text-content-primary truncate flex-1"><?php echo e($nft->name); ?></h4>
                        <form action="<?php echo e(route('user.nfts.like', $nft->id)); ?>" method="POST" class="ml-2 flex-shrink-0">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="text-content-tertiary hover:text-loss transition-colors" title="Like">
                                <svg class="w-4 h-4" fill="<?php echo e($nft->isLikedBy(auth()->id()) ? 'currentColor' : 'none'); ?>" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" /></svg>
                            </button>
                        </form>
                    </div>
                    <?php if($nft->collection): ?>
                        <p class="text-[10px] text-content-tertiary mb-1"><?php echo e($nft->collection->name); ?></p>
                    <?php endif; ?>
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
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full rounded-xl bg-surface-raised border border-surface-border p-12 text-center">
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
                <p class="text-content-secondary mb-1">No NFTs found</p>
                <p class="text-xs text-content-tertiary">Try adjusting your search or filters</p>
            </div>
        <?php endif; ?>
    </div>

    <?php if($nfts->hasPages()): ?>
        <div class="mt-6"><?php echo e($nfts->withQueryString()->links()); ?></div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\nfts\gallery.blade.php ENDPATH**/ ?>