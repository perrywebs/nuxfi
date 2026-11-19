<?php $__env->startSection('title', 'Sold NFTs'); ?>

<?php $__env->startSection('content'); ?>
    <div class="space-y-6">
        
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'Sold NFTs','subtitle' => 'View all purchased NFTs']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Sold NFTs','subtitle' => 'View all purchased NFTs']); ?>
             <?php $__env->slot('actions', null, []); ?> 
                <a href="<?php echo e(route('admin.nfts.index')); ?>"
                   class="bg-surface-alt text-content border border-border hover:bg-border rounded-lg px-4 py-2 text-sm font-medium transition-colors inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                    Back to NFTs
                </a>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

        
        <?php if(session('success')): ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.alert','data' => ['type' => 'success','dismissible' => true]]); ?>
<?php $component->withName('admin.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'success','dismissible' => true]); ?><?php echo e(session('success')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.alert','data' => ['type' => 'danger','dismissible' => true]]); ?>
<?php $component->withName('admin.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger','dismissible' => true]); ?><?php echo e(session('error')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php endif; ?>

        
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.table-card','data' => ['title' => 'Sold NFTs']]); ?>
<?php $component->withName('admin.table-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Sold NFTs']); ?>
            <table class="w-full">
                <thead>
                    <tr class="bg-surface-alt">
                        <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">NFT</th>
                        <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Token ID</th>
                        <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Collection</th>
                        <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Price</th>
                        <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Creator</th>
                        <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Owner</th>
                        <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Sold On</th>
                        <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $soldNFTs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nft): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="border-b border-border last:border-0 hover:bg-surface-alt/50 transition-colors">
                            <td class="px-4 py-3.5">
                                <div class="flex items-center gap-3">
                                    <img src="<?php echo e(asset('storage/app/public/' . $nft->image)); ?>" alt="<?php echo e($nft->name); ?>" class="w-10 h-10 rounded-lg object-cover border border-border">
                                    <span class="text-sm font-medium text-content"><?php echo e(Str::limit($nft->name, 25)); ?></span>
                                </div>
                            </td>
                            <td class="px-4 py-3.5 text-xs text-content-muted font-mono"><?php echo e($nft->token_id ?? '—'); ?></td>
                            <td class="px-4 py-3.5 text-sm text-content-secondary"><?php echo e($nft->collection->name ?? '—'); ?></td>
                            <td class="px-4 py-3.5 text-sm font-medium text-content"><?php echo e($nft->price); ?> ETH</td>
                            <td class="px-4 py-3.5 text-sm text-content-secondary"><?php echo e($nft->originalCreator->name ?? '—'); ?></td>
                            <td class="px-4 py-3.5 text-sm text-content-secondary"><?php echo e($nft->user->name ?? '—'); ?></td>
                            <td class="px-4 py-3.5 text-xs text-content-muted"><?php echo e($nft->updated_at->format('M d, Y H:i')); ?></td>
                            <td class="px-4 py-3.5">
                                <a href="<?php echo e(route('admin.nfts.edit', $nft->id)); ?>" class="bg-surface-alt text-content border border-border hover:bg-border rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="8" class="py-12 text-center text-content-muted">No sold NFTs found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <?php if($soldNFTs->hasPages()): ?>
                <div class="px-4 py-3 border-t border-border"><?php echo e($soldNFTs->links()); ?></div>
            <?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\nfts\sold.blade.php ENDPATH**/ ?>