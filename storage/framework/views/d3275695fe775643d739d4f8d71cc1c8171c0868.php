
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'Bot Trading Subscriptions','subtitle' => 'Manage user subscriptions to trading bots']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Bot Trading Subscriptions','subtitle' => 'Manage user subscriptions to trading bots']); ?>
     <?php $__env->slot('actions', null, []); ?> 
        <a href="<?php echo e(route('admin.bot-trading.index')); ?>" class="bg-surface-alt text-content border border-border hover:bg-surface-alt/80 rounded-lg px-4 py-2 text-sm font-medium inline-flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
            Back to Bots
        </a>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>


<div class="grid grid-cols-1 sm:grid-cols-4 gap-4 mt-6">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.stat-card','data' => ['label' => 'Active Subscriptions','value' => $totalActive,'icon' => '<svg class="w-5 h-5 text-success" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>']]); ?>
<?php $component->withName('admin.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Active Subscriptions','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($totalActive),'icon' => '<svg class="w-5 h-5 text-success" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.stat-card','data' => ['label' => 'Total Invested','value' => '$' . number_format($totalInvested, 2),'icon' => '<svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>']]); ?>
<?php $component->withName('admin.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Total Invested','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('$' . number_format($totalInvested, 2)),'icon' => '<svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.stat-card','data' => ['label' => 'Total Profit','value' => '$' . number_format($totalProfit, 2),'icon' => '<svg class="w-5 h-5 text-warning" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" /></svg>']]); ?>
<?php $component->withName('admin.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Total Profit','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('$' . number_format($totalProfit, 2)),'icon' => '<svg class="w-5 h-5 text-warning" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" /></svg>']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.stat-card','data' => ['label' => 'Settled','value' => $totalSettled,'icon' => '<svg class="w-5 h-5 text-info" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" /></svg>']]); ?>
<?php $component->withName('admin.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Settled','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($totalSettled),'icon' => '<svg class="w-5 h-5 text-info" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" /></svg>']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
</div>


<div class="mt-6 flex items-center gap-4">
    <form method="GET" class="flex items-center gap-3">
        <select name="status" onchange="this.form.submit()" class="bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:ring-2 focus:ring-primary/30">
            <option value="all" <?php echo e($currentStatus === 'all' ? 'selected' : ''); ?>>All Status</option>
            <option value="active" <?php echo e($currentStatus === 'active' ? 'selected' : ''); ?>>Active</option>
            <option value="stopped" <?php echo e($currentStatus === 'stopped' ? 'selected' : ''); ?>>Stopped</option>
            <option value="completed" <?php echo e($currentStatus === 'completed' ? 'selected' : ''); ?>>Completed</option>
            <option value="settled" <?php echo e($currentStatus === 'settled' ? 'selected' : ''); ?>>Settled</option>
        </select>
        <input type="text" name="search" value="<?php echo e($currentSearch); ?>" placeholder="Search user or bot..." class="bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content placeholder:text-content-muted focus:ring-2 focus:ring-primary/30 w-64">
        <button type="submit" class="bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium">Filter</button>
    </form>
</div>


<div class="mt-4">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.table-card','data' => ['title' => 'Subscriptions']]); ?>
<?php $component->withName('admin.table-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Subscriptions']); ?>
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-surface-alt">
                    <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">ID</th>
                    <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">User</th>
                    <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Bot</th>
                    <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Invested</th>
                    <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Profit</th>
                    <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Payout</th>
                    <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Expires</th>
                    <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Status</th>
                    <th class="text-right text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-b border-border hover:bg-surface-alt/50">
                        <td class="px-5 py-3 text-content-muted">#<?php echo e($sub->id); ?></td>
                        <td class="px-5 py-3">
                            <p class="font-medium text-content"><?php echo e($sub->user->name ?? 'N/A'); ?></p>
                            <p class="text-xs text-content-muted"><?php echo e($sub->user->email ?? ''); ?></p>
                        </td>
                        <td class="px-5 py-3 font-medium text-content"><?php echo e($sub->tradingBot->name ?? 'Deleted'); ?></td>
                        <td class="px-5 py-3 text-content">$<?php echo e(number_format($sub->invested_amount, 2)); ?></td>
                        <td class="px-5 py-3 <?php echo e($sub->accumulated_profit >= 0 ? 'text-success' : 'text-danger'); ?> font-medium">$<?php echo e(number_format($sub->accumulated_profit, 2)); ?></td>
                        <td class="px-5 py-3 text-content font-medium">$<?php echo e(number_format($sub->totalPayout(), 2)); ?></td>
                        <td class="px-5 py-3 text-content-muted text-xs"><?php echo e($sub->expires_at ? $sub->expires_at->format('M d, Y') : '—'); ?></td>
                        <td class="px-5 py-3">
                            <?php
                                $statusColors = [
                                    'active' => 'success',
                                    'stopped' => 'warning',
                                    'completed' => 'info',
                                    'settled' => 'neutral',
                                ];
                            ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => ''.e($statusColors[$sub->status] ?? 'neutral').'']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => ''.e($statusColors[$sub->status] ?? 'neutral').'']); ?><?php echo e(ucfirst($sub->status)); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </td>
                        <td class="px-5 py-3 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="<?php echo e(route('admin.bot-trading.subscription', $sub->id)); ?>" class="text-content-secondary hover:text-content transition-colors" title="View">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                </a>
                                <a href="<?php echo e(route('admin.bot-trading.subscription-edit', $sub->id)); ?>" class="text-content-secondary hover:text-warning transition-colors" title="Edit / Backdate">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125" /></svg>
                                </a>
                                <?php if($sub->isSettleable()): ?>
                                    <form action="<?php echo e(route('admin.bot-trading.settle', $sub->id)); ?>" method="POST" class="inline" onsubmit="return confirm('Settle this subscription? $<?php echo e(number_format($sub->totalPayout(), 2)); ?> will be credited.')">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="text-content-secondary hover:text-success transition-colors" title="Settle">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="9" class="px-5 py-8 text-center text-content-muted">No subscriptions found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <div class="mt-4"><?php echo e($subscriptions->appends(request()->query())->links()); ?></div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\bot-trading\subscriptions.blade.php ENDPATH**/ ?>