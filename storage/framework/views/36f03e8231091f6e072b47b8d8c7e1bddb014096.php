


<div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'NFTs Owned', 'value' => $ownedNfts->count(), 'icon' => 'gem'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Estimated Value', 'value' => \App\Helpers\CurrencyHelper::formatForUser($totalNftValue), 'icon' => 'banknotes', 'color' => 'info'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Listed', 'value' => $ownedNfts->where('status', 'listed')->count(), 'icon' => 'tag', 'color' => 'gain'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php if($ownedNfts->count() > 0): ?>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        <?php $__currentLoopData = $ownedNfts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nft): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('user.nfts.show', $nft->id)); ?>" class="bg-surface-raised border border-surface-border rounded-xl overflow-hidden hover:border-primary/30 transition-colors group">
                
                <div class="aspect-square bg-surface-overlay overflow-hidden">
                    <?php if($nft->image): ?>
                        <img src="<?php echo e(asset('storage/app/public/' . $nft->image)); ?>" alt="<?php echo e($nft->name); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                    <?php else: ?>
                        <div class="w-full h-full flex items-center justify-center">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'gem','class' => 'w-12 h-12 text-content-tertiary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'gem','class' => 'w-12 h-12 text-content-tertiary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

                
                <div class="p-3">
                    <div class="flex items-start justify-between gap-2 mb-2">
                        <span class="text-sm font-semibold text-content-primary truncate"><?php echo e($nft->name); ?></span>
                        <span class="px-1.5 py-0.5 text-[10px] font-medium rounded-full shrink-0 <?php echo e($nft->status === 'listed' ? 'bg-gain/10 text-gain' : 'bg-surface-overlay text-content-tertiary'); ?>">
                            <?php echo e(ucfirst($nft->status)); ?>

                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($nft->price); ?></span>
                        <?php if($nft->category): ?>
                            <span class="text-[10px] text-content-tertiary"><?php echo e($nft->category); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>
    <?php echo $__env->make('user.trades.partials.empty-state', [
        'icon' => 'gem',
        'title' => 'No NFTs in collection',
        'message' => 'You don\'t own any NFTs yet. Browse the gallery or mint your own.',
        'actionUrl' => route('nft.gallery'),
        'actionLabel' => 'Browse Gallery',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\trades\partials\portfolio-tab-nfts.blade.php ENDPATH**/ ?>