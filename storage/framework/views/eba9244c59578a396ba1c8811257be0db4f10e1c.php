

<?php $__env->startSection('title', 'Transfer History'); ?>

<?php $__env->startSection('content'); ?>
    <div class="space-y-6">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'NFT Transfer History','subtitle' => 'All ownership transfers']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'NFT Transfer History','subtitle' => 'All ownership transfers']); ?>
             <?php $__env->slot('actions', null, []); ?> 
                <a href="<?php echo e(route('admin.nfts.index')); ?>" class="bg-surface-alt text-content border border-border hover:bg-border rounded-lg px-4 py-2 text-sm font-medium transition-colors inline-flex items-center gap-2">
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

        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.table-card','data' => ['title' => 'Transfers']]); ?>
<?php $component->withName('admin.table-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Transfers']); ?>
            <table class="w-full">
                <thead>
                    <tr class="bg-surface-alt">
                        <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">NFT</th>
                        <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Type</th>
                        <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">From</th>
                        <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">To</th>
                        <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Price</th>
                        <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $transfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="border-b border-border last:border-0 hover:bg-surface-alt/50 transition-colors">
                            <td class="px-4 py-3.5">
                                <div class="flex items-center gap-2">
                                    <?php if($t->nft): ?>
                                        <img src="<?php echo e(asset('storage/app/public/' . $t->nft->image)); ?>" class="w-8 h-8 rounded object-cover border border-border">
                                        <span class="text-sm font-medium text-content"><?php echo e(Str::limit($t->nft->name, 20)); ?></span>
                                    <?php else: ?>
                                        <span class="text-sm text-content-muted">Deleted</span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="px-4 py-3.5">
                                <?php
                                    $typeColor = match($t->type) {
                                        'mint' => 'success',
                                        'sale' => 'info',
                                        'bid_accept' => 'warning',
                                        default => 'neutral',
                                    };
                                ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => $typeColor]]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($typeColor)]); ?><?php echo e(ucfirst(str_replace('_', ' ', $t->type))); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </td>
                            <td class="px-4 py-3.5 text-sm text-content-secondary"><?php echo e($t->fromUser->name ?? '—'); ?></td>
                            <td class="px-4 py-3.5 text-sm text-content-secondary"><?php echo e($t->toUser->name ?? '—'); ?></td>
                            <td class="px-4 py-3.5 text-sm font-medium text-content"><?php echo e($t->price > 0 ? $t->price . ' ETH' : '—'); ?></td>
                            <td class="px-4 py-3.5 text-xs text-content-muted"><?php echo e($t->created_at->format('M d, Y H:i')); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="6" class="py-8 text-center text-content-muted">No transfers recorded.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <?php if($transfers->hasPages()): ?>
                <div class="px-4 py-3 border-t border-border"><?php echo e($transfers->links()); ?></div>
            <?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\nfts\transfers.blade.php ENDPATH**/ ?>