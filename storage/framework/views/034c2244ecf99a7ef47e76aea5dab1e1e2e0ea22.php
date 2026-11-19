
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'Manage Copy Trades','subtitle' => 'View and manage all user copy trading positions']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Manage Copy Trades','subtitle' => 'View and manage all user copy trading positions']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>


<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.stat-card','data' => ['label' => 'Active Copies','value' => $totalActive,'icon' => '<svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" /></svg>']]); ?>
<?php $component->withName('admin.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Active Copies','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($totalActive),'icon' => '<svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" /></svg>']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.stat-card','data' => ['label' => 'Total Invested','value' => '$' . number_format($totalInvested, 2),'icon' => '<svg class="w-5 h-5 text-success" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>']]); ?>
<?php $component->withName('admin.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Total Invested','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('$' . number_format($totalInvested, 2)),'icon' => '<svg class="w-5 h-5 text-success" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.stat-card','data' => ['label' => 'Total Profit','value' => '$' . number_format($totalProfit, 2),'icon' => '<svg class="w-5 h-5 text-info" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" /></svg>']]); ?>
<?php $component->withName('admin.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Total Profit','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('$' . number_format($totalProfit, 2)),'icon' => '<svg class="w-5 h-5 text-info" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" /></svg>']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.stat-card','data' => ['label' => 'Settled Positions','value' => $totalSettled,'icon' => '<svg class="w-5 h-5 text-warning" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>']]); ?>
<?php $component->withName('admin.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Settled Positions','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($totalSettled),'icon' => '<svg class="w-5 h-5 text-warning" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
</div>


<div class="mt-6 flex flex-col sm:flex-row sm:items-center gap-4" x-data>
    
    <div class="flex items-center gap-1 bg-surface-card border border-border rounded-lg p-1">
        <?php $__currentLoopData = ['all' => 'All', 'active' => 'Active', 'stopped' => 'Stopped', 'completed' => 'Completed', 'settled' => 'Settled']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('admin.copy-trades.index', ['status' => $key, 'search' => $currentSearch])); ?>"
               class="px-3 py-1.5 text-sm rounded-md font-medium transition-colors <?php echo e($currentStatus === $key ? 'bg-primary text-primary-foreground' : 'text-content-muted hover:text-content'); ?>">
                <?php echo e($label); ?>

            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <form action="<?php echo e(route('admin.copy-trades.index')); ?>" method="GET" class="flex-1 max-w-sm">
        <input type="hidden" name="status" value="<?php echo e($currentStatus); ?>">
        <input type="text" name="search" value="<?php echo e($currentSearch); ?>" placeholder="Search user or expert..."
               class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2 text-sm text-content placeholder:text-content-muted focus:ring-2 focus:ring-primary/30 focus:border-primary">
    </form>
</div>


<form id="bulkSettleForm" action="<?php echo e(route('admin.copy-trades.bulk-settle')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <div class="mt-4">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.table-card','data' => ['title' => 'Copy Positions']]); ?>
<?php $component->withName('admin.table-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Copy Positions']); ?>
             <?php $__env->slot('actions', null, []); ?> 
                <button type="submit" onclick="return confirm('Settle all selected positions?')" class="bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium">
                    Settle Selected
                </button>
             <?php $__env->endSlot(); ?>
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-surface-alt">
                        <th class="px-5 py-3 w-8"><input type="checkbox" id="selectAll" class="rounded"></th>
                        <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">User</th>
                        <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Expert</th>
                        <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Invested</th>
                        <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Profit</th>
                        <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Adjustment</th>
                        <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Total Payout</th>
                        <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Status</th>
                        <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Started</th>
                        <th class="text-right text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="border-b border-border hover:bg-surface-alt/50">
                            <td class="px-5 py-3"><input type="checkbox" name="position_ids[]" value="<?php echo e($pos->id); ?>" class="bulk-check rounded"></td>
                            <td class="px-5 py-3">
                                <div class="font-medium text-content"><?php echo e($pos->user->name ?? 'N/A'); ?></div>
                                <div class="text-xs text-content-muted"><?php echo e($pos->user->email ?? ''); ?></div>
                            </td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-2">
                                    <?php if($pos->expert && $pos->expert->profile_picture): ?>
                                        <img src="<?php echo e(asset('storage/app/public/' . $pos->expert->profile_picture)); ?>" class="w-6 h-6 rounded-full object-cover">
                                    <?php endif; ?>
                                    <span class="text-content"><?php echo e($pos->expert->name ?? 'N/A'); ?></span>
                                </div>
                            </td>
                            <td class="px-5 py-3 text-content">$<?php echo e(number_format($pos->invested_amount, 2)); ?></td>
                            <td class="px-5 py-3 text-success font-medium">$<?php echo e(number_format($pos->accumulated_profit, 2)); ?></td>
                            <td class="px-5 py-3 <?php echo e($pos->admin_profit_adjustment != 0 ? 'text-warning font-medium' : 'text-content-muted'); ?>">
                                <?php echo e($pos->admin_profit_adjustment != 0 ? ($pos->admin_profit_adjustment > 0 ? '+' : '') . '$' . number_format($pos->admin_profit_adjustment, 2) : '—'); ?>

                            </td>
                            <td class="px-5 py-3 font-medium text-content">$<?php echo e(number_format($pos->totalPayout(), 2)); ?></td>
                            <td class="px-5 py-3">
                                <?php
                                    $badgeType = match($pos->status) { 'active' => 'success', 'stopped' => 'danger', 'completed' => 'info', 'settled' => 'warning', default => 'neutral' };
                                ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => $badgeType]]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($badgeType)]); ?><?php echo e(ucfirst($pos->status)); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </td>
                            <td class="px-5 py-3 text-content-secondary text-xs"><?php echo e($pos->started_at->format('M d, Y')); ?></td>
                            <td class="px-5 py-3 text-right">
                                <a href="<?php echo e(route('admin.copy-trades.show', $pos->id)); ?>" class="text-primary hover:text-primary-hover text-sm font-medium">View</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="10" class="px-5 py-8 text-center text-content-muted">No copy positions found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <div class="mt-4"><?php echo e($positions->appends(request()->query())->links()); ?></div>
    </div>
</form>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.getElementById('selectAll')?.addEventListener('change', function() {
    document.querySelectorAll('.bulk-check').forEach(cb => cb.checked = this.checked);
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\copy-trades\index.blade.php ENDPATH**/ ?>