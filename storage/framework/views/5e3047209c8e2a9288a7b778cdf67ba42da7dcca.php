
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
            <h2 class="text-xl font-bold text-content-primary">My NFTs</h2>
            <p class="text-sm text-content-secondary mt-1">Manage your digital collection</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="<?php echo e(route('user.nfts.create')); ?>" class="px-4 py-2 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-medium transition-colors inline-flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                Mint NFT
            </a>
            <a href="<?php echo e(route('nft.gallery')); ?>" class="px-4 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary text-sm font-medium transition-colors">Gallery</a>
        </div>
    </div>

    
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6">
        <?php echo $__env->make('user.partials.stat-card', ['label' => 'Owned', 'value' => $stats['owned'], 'icon' => 'squares-2x2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card', ['label' => 'Created', 'value' => $stats['created'], 'icon' => 'sparkles'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card', ['label' => 'Favorites', 'value' => $stats['favorites'], 'icon' => 'heart'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card', ['label' => 'Total Value', 'value' => number_format($stats['total_value'], 4) . ' ETH', 'icon' => 'banknotes'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    
    <div class="flex items-center gap-1 border-b border-surface-border mb-6">
        <a href="<?php echo e(route('user.nfts.my', ['tab' => 'owned'])); ?>" class="px-4 py-2.5 text-sm font-medium transition-colors border-b-2 <?php echo e($tab == 'owned' ? 'border-primary text-primary' : 'border-transparent text-content-tertiary hover:text-content-primary'); ?>">
            Owned (<?php echo e($stats['owned']); ?>)
        </a>
        <a href="<?php echo e(route('user.nfts.my', ['tab' => 'created'])); ?>" class="px-4 py-2.5 text-sm font-medium transition-colors border-b-2 <?php echo e($tab == 'created' ? 'border-primary text-primary' : 'border-transparent text-content-tertiary hover:text-content-primary'); ?>">
            Created (<?php echo e($stats['created']); ?>)
        </a>
        <a href="<?php echo e(route('user.nfts.my', ['tab' => 'favorites'])); ?>" class="px-4 py-2.5 text-sm font-medium transition-colors border-b-2 <?php echo e($tab == 'favorites' ? 'border-primary text-primary' : 'border-transparent text-content-tertiary hover:text-content-primary'); ?>">
            Favorites (<?php echo e($stats['favorites']); ?>)
        </a>
    </div>

    
    <?php if($nfts->isEmpty()): ?>
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
            <?php if($tab == 'favorites'): ?>
                <p class="text-content-secondary mb-1">No favorited NFTs yet</p>
                <p class="text-xs text-content-tertiary mb-3">Browse the gallery and tap the heart icon to save NFTs here</p>
            <?php elseif($tab == 'created'): ?>
                <p class="text-content-secondary mb-1">You haven't minted any NFTs yet</p>
                <p class="text-xs text-content-tertiary mb-3">Create your first digital asset</p>
            <?php else: ?>
                <p class="text-content-secondary mb-1">No NFTs in your collection</p>
                <p class="text-xs text-content-tertiary mb-3">Browse the marketplace to find your first NFT</p>
            <?php endif; ?>
            <a href="<?php echo e($tab == 'created' ? route('user.nfts.create') : route('nft.gallery')); ?>" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-medium transition-colors">
                <?php echo e($tab == 'created' ? 'Mint NFT' : 'Browse Gallery'); ?>

            </a>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
            <?php $__currentLoopData = $nfts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nft): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden hover:border-primary/50 transition-colors group">
                    <a href="<?php echo e(route('user.nfts.show', $nft->id)); ?>" class="block relative">
                        <div class="aspect-square overflow-hidden">
                            <img src="<?php echo e(asset('storage/app/public/' . $nft->image)); ?>" alt="<?php echo e($nft->name); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        </div>
                        <?php if(!$nft->is_approved): ?>
                            <span class="absolute top-2 left-2 px-2 py-0.5 rounded-full bg-warning/90 text-surface-base text-[10px] font-bold">Pending</span>
                        <?php endif; ?>
                    </a>
                    <div class="p-4">
                        <h4 class="text-sm font-semibold text-content-primary truncate mb-1"><?php echo e($nft->name); ?></h4>
                        <div class="flex items-center justify-between text-xs mb-3">
                            <span class="font-bold text-primary"><?php echo e($nft->price); ?> ETH</span>
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-medium <?php echo e($nft->status == 'available' ? 'bg-gain/10 text-gain' : 'bg-warning/10 text-warning'); ?>"><?php echo e(ucfirst($nft->status)); ?></span>
                        </div>
                        <div class="flex gap-2">
                            <a href="<?php echo e(route('user.nfts.show', $nft->id)); ?>" class="flex-1 text-center py-2 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-xs font-medium transition-colors">View</a>
                            <?php if($tab == 'owned' && $nft->status == 'sold' && $nft->user_id == auth()->id()): ?>
                                <form action="<?php echo e(route('user.nfts.sell', $nft->id)); ?>" method="POST" class="flex-1">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="w-full py-2 rounded-lg bg-gain/10 text-gain hover:bg-gain/20 text-xs font-medium transition-colors">Relist</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if($nfts->hasPages()): ?>
            <div class="mt-6"><?php echo e($nfts->withQueryString()->links()); ?></div>
        <?php endif; ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\nfts\my.blade.php ENDPATH**/ ?>