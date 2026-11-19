

<?php $__env->startSection('title', 'NFT Categories'); ?>

<?php $__env->startSection('content'); ?>
    <div class="space-y-6">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'NFT Categories','subtitle' => 'Manage marketplace categories']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'NFT Categories','subtitle' => 'Manage marketplace categories']); ?>
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

        
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <h3 class="text-sm font-semibold text-content mb-3">Add Category</h3>
            <form action="<?php echo e(route('admin.nft.categories.store')); ?>" method="POST" class="flex flex-wrap items-end gap-3">
                <?php echo csrf_field(); ?>
                <div class="flex-1 min-w-[200px]">
                    <label class="block text-xs font-medium text-content-muted mb-1">Name</label>
                    <input type="text" name="name" required class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors" placeholder="e.g. Digital Art">
                </div>
                <div class="w-32">
                    <label class="block text-xs font-medium text-content-muted mb-1">Sort Order</label>
                    <input type="number" name="sort_order" value="0" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors">
                </div>
                <div class="min-w-[160px]">
                    <label class="block text-xs font-medium text-content-muted mb-1">Icon (optional)</label>
                    <input type="text" name="icon" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors" placeholder="e.g. art">
                </div>
                <button type="submit" class="bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors">Add</button>
            </form>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

        
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.table-card','data' => ['title' => 'All Categories']]); ?>
<?php $component->withName('admin.table-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'All Categories']); ?>
            <table class="w-full">
                <thead>
                    <tr class="bg-surface-alt">
                        <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Name</th>
                        <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Slug</th>
                        <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-center">NFTs</th>
                        <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-center">Order</th>
                        <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-center">Status</th>
                        <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="border-b border-border last:border-0 hover:bg-surface-alt/50 transition-colors" x-data="{ editing: false }">
                            <td class="px-4 py-3.5 text-sm font-medium text-content">
                                <span x-show="!editing"><?php echo e($cat->name); ?></span>
                                <form x-show="editing" action="<?php echo e(route('admin.nft.categories.update', $cat->id)); ?>" method="POST" class="flex items-center gap-2" x-cloak>
                                    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                                    <input type="text" name="name" value="<?php echo e($cat->name); ?>" class="bg-surface-card border border-border rounded px-2 py-1 text-sm text-content w-36">
                                    <input type="number" name="sort_order" value="<?php echo e($cat->sort_order); ?>" class="bg-surface-card border border-border rounded px-2 py-1 text-sm text-content w-16">
                                    <label class="flex items-center gap-1 text-xs text-content-secondary">
                                        <input type="checkbox" name="is_active" value="1" <?php echo e($cat->is_active ? 'checked' : ''); ?> class="rounded">
                                        Active
                                    </label>
                                    <button type="submit" class="bg-primary text-primary-foreground rounded px-2 py-1 text-xs font-medium">Save</button>
                                    <button type="button" @click="editing = false" class="text-xs text-content-muted">Cancel</button>
                                </form>
                            </td>
                            <td class="px-4 py-3.5 text-sm text-content-secondary font-mono"><?php echo e($cat->slug); ?></td>
                            <td class="px-4 py-3.5 text-sm text-content-secondary text-center"><?php echo e($cat->nfts_count); ?></td>
                            <td class="px-4 py-3.5 text-sm text-content-secondary text-center"><?php echo e($cat->sort_order); ?></td>
                            <td class="px-4 py-3.5 text-center">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => $cat->is_active ? 'success' : 'neutral']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cat->is_active ? 'success' : 'neutral')]); ?><?php echo e($cat->is_active ? 'Active' : 'Inactive'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </td>
                            <td class="px-4 py-3.5">
                                <div class="flex items-center gap-1.5">
                                    <button @click="editing = !editing" class="bg-surface-alt text-content border border-border hover:bg-border rounded-lg px-2.5 py-1.5 text-xs font-medium transition-colors">Edit</button>
                                    <form action="<?php echo e(route('admin.nft.categories.destroy', $cat->id)); ?>" method="POST" onsubmit="return confirm('Delete this category?')">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="bg-danger text-white hover:bg-danger/90 rounded-lg px-2.5 py-1.5 text-xs font-medium transition-colors">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="6" class="py-8 text-center text-content-muted">No categories. Add one above.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\nfts\categories.blade.php ENDPATH**/ ?>