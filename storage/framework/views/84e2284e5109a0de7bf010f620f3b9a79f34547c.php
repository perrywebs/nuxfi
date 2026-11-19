
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<div class="space-y-6">

    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'All Stock Trades','subtitle' => 'View all user stock buy/sell activity']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'All Stock Trades','subtitle' => 'View all user stock buy/sell activity']); ?>
         <?php $__env->slot('actions', null, []); ?> 
            <a href="<?php echo e(route('admin.stocks.index')); ?>"
               class="bg-surface-alt text-content border border-border hover:bg-border rounded-lg px-4 py-2 text-sm font-medium transition-colors inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" /></svg>
                Back to Stocks
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

    
    <div class="flex items-center gap-2">
        <a href="<?php echo e(route('admin.stocks.trades')); ?>"
           class="px-3 py-1.5 text-sm font-medium rounded-lg transition-colors <?php echo e($filter === 'all' ? 'bg-primary text-primary-foreground' : 'bg-surface-alt text-content-secondary hover:text-content'); ?>">
            All
        </a>
        <a href="<?php echo e(route('admin.stocks.trades', ['type' => 'buy'])); ?>"
           class="px-3 py-1.5 text-sm font-medium rounded-lg transition-colors <?php echo e($filter === 'buy' ? 'bg-success text-white' : 'bg-surface-alt text-content-secondary hover:text-content'); ?>">
            Buys
        </a>
        <a href="<?php echo e(route('admin.stocks.trades', ['type' => 'sell'])); ?>"
           class="px-3 py-1.5 text-sm font-medium rounded-lg transition-colors <?php echo e($filter === 'sell' ? 'bg-danger text-white' : 'bg-surface-alt text-content-secondary hover:text-content'); ?>">
            Sells
        </a>
    </div>

    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.table-card','data' => ['title' => 'Trade History']]); ?>
<?php $component->withName('admin.table-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Trade History']); ?>
        <table class="w-full">
            <thead>
                <tr class="bg-surface-alt">
                    <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">User</th>
                    <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Stock</th>
                    <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-center">Type</th>
                    <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-right">Shares</th>
                    <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-right">Price</th>
                    <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-right">Total</th>
                    <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-right">Fee</th>
                    <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-right">Date</th>
                    <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-b border-border last:border-0 hover:bg-surface-alt/50 transition-colors">
                        <td class="px-4 py-3.5">
                            <div>
                                <span class="text-sm font-medium text-content"><?php echo e($trade->user->name ?? 'N/A'); ?></span>
                                <p class="text-xs text-content-muted"><?php echo e($trade->user->email ?? ''); ?></p>
                            </div>
                        </td>
                        <td class="px-4 py-3.5">
                            <div class="flex items-center gap-2">
                                <?php if($trade->asset && $trade->asset->logo_url): ?>
                                    <img src="<?php echo e($trade->asset->logo_url); ?>" alt="<?php echo e($trade->asset->symbol); ?>" class="w-6 h-6 rounded object-cover">
                                <?php endif; ?>
                                <span class="text-sm font-medium text-content"><?php echo e($trade->asset->symbol ?? 'N/A'); ?></span>
                            </div>
                        </td>
                        <td class="px-4 py-3.5 text-center">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => $trade->type === 'buy' ? 'success' : 'danger']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($trade->type === 'buy' ? 'success' : 'danger')]); ?><?php echo e(strtoupper($trade->type)); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </td>
                        <td class="px-4 py-3.5 text-sm text-content text-right"><?php echo e(number_format($trade->shares, 4)); ?></td>
                        <td class="px-4 py-3.5 text-sm text-content-secondary text-right">$<?php echo e(number_format($trade->price_per_share, 2)); ?></td>
                        <td class="px-4 py-3.5 text-sm text-content text-right font-medium">$<?php echo e(number_format($trade->total_amount, 2)); ?></td>
                        <td class="px-4 py-3.5 text-sm text-content-muted text-right">$<?php echo e(number_format($trade->fee_amount, 2)); ?></td>
                        <td class="px-4 py-3.5 text-sm text-content-muted text-right"><?php echo e($trade->created_at->format('M d, Y H:i')); ?></td>
                        <td class="px-4 py-3.5 text-right">
                            <a href="<?php echo e(route('admin.stocks.user-positions', $trade->user_id)); ?>" class="bg-surface-alt text-content border border-border hover:bg-border rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">Portfolio</a>
                            <a href="<?php echo e(route('admin.stocks.edit-trade', $trade->id)); ?>" class="bg-warning text-content-inverse hover:bg-warning/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors inline-flex items-center gap-1" title="Edit / Backdate">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125" /></svg>
                                Edit
                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="9" class="py-12 text-center text-content-muted">No stock trades found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <?php if($trades->hasPages()): ?>
            <div class="px-4 py-3 border-t border-border">
                <?php echo e($trades->withQueryString()->links()); ?>

            </div>
        <?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\stocks\trades.blade.php ENDPATH**/ ?>