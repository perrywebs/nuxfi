
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'Copy Position #'.e($position->id).'','subtitle' => 'Manage copy trading position details']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Copy Position #'.e($position->id).'','subtitle' => 'Manage copy trading position details']); ?>
     <?php $__env->slot('actions', null, []); ?> 
        <a href="<?php echo e(route('admin.copy-trades.index')); ?>" class="bg-surface-alt text-content border border-border hover:bg-surface-alt/80 rounded-lg px-4 py-2 text-sm font-medium">
            <svg class="w-4 h-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
            Back to Copy Trades
        </a>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
        <h3 class="text-base font-semibold text-content mb-4">Position Details</h3>

        <div class="space-y-3">
            <div class="flex justify-between text-sm">
                <span class="text-content-secondary">User</span>
                <div class="text-right">
                    <div class="font-medium text-content"><?php echo e($position->user->name ?? 'N/A'); ?></div>
                    <div class="text-xs text-content-muted"><?php echo e($position->user->email ?? ''); ?></div>
                </div>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-content-secondary">Expert</span>
                <div class="flex items-center gap-2">
                    <?php if($position->expert && $position->expert->profile_picture): ?>
                        <img src="<?php echo e(asset('storage/app/public/' . $position->expert->profile_picture)); ?>" class="w-6 h-6 rounded-full object-cover">
                    <?php endif; ?>
                    <span class="font-medium text-content"><?php echo e($position->expert->name ?? 'N/A'); ?></span>
                </div>
            </div>
            <?php if($position->expert): ?>
            <div class="flex justify-between text-sm">
                <span class="text-content-secondary">Expertise</span>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => []]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?><?php echo e($position->expert->area_of_expertise); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
            <?php endif; ?>
            <div class="flex justify-between text-sm">
                <span class="text-content-secondary">Status</span>
                <?php
                    $badgeType = match($position->status) { 'active' => 'success', 'stopped' => 'danger', 'completed' => 'info', 'settled' => 'warning', default => 'neutral' };
                ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => $badgeType]]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($badgeType)]); ?><?php echo e(ucfirst($position->status)); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-content-secondary">Started</span>
                <span class="text-content"><?php echo e($position->started_at->format('M d, Y H:i')); ?></span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-content-secondary">Expires</span>
                <span class="text-content"><?php echo e($position->expires_at->format('M d, Y H:i')); ?></span>
            </div>
            <?php
                $totalDays = $position->started_at->diffInDays($position->expires_at);
                $elapsedDays = $position->started_at->diffInDays(now());
                $daysRemaining = max(0, $totalDays - $elapsedDays);
                $progressPct = $totalDays > 0 ? min(100, round(($elapsedDays / $totalDays) * 100)) : 100;
            ?>
            <div class="flex justify-between text-sm">
                <span class="text-content-secondary">Days Remaining</span>
                <span class="text-content font-medium"><?php echo e($daysRemaining); ?> of <?php echo e($totalDays); ?> days</span>
            </div>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
        <h3 class="text-base font-semibold text-content mb-4">Financial Summary</h3>

        <div class="space-y-3">
            <div class="flex justify-between text-sm">
                <span class="text-content-secondary">Invested Amount</span>
                <span class="font-medium text-content">$<?php echo e(number_format($position->invested_amount, 2)); ?></span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-content-secondary">Daily ROI</span>
                <span class="text-success font-medium"><?php echo e(number_format($position->daily_roi_snapshot, 2)); ?>%</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-content-secondary">Accumulated Profit</span>
                <span class="text-success font-medium">$<?php echo e(number_format($position->accumulated_profit, 2)); ?></span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-content-secondary">Admin Adjustment</span>
                <span class="<?php echo e($position->admin_profit_adjustment != 0 ? 'text-warning font-medium' : 'text-content-muted'); ?>">
                    <?php echo e($position->admin_profit_adjustment != 0 ? ($position->admin_profit_adjustment > 0 ? '+' : '') . '$' . number_format($position->admin_profit_adjustment, 2) : '—'); ?>

                </span>
            </div>
            <hr class="border-border">
            <div class="flex justify-between">
                <span class="text-content font-medium">Total Payout</span>
                <span class="text-stat text-content font-bold">$<?php echo e(number_format($position->totalPayout(), 2)); ?></span>
            </div>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
</div>


<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
        <h3 class="text-base font-semibold text-content mb-4">Adjust Profit</h3>
        <form action="<?php echo e(route('admin.copy-trades.adjust', $position->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Profit Adjustment ($)','for' => 'admin_profit_adjustment','error' => $errors->first('admin_profit_adjustment'),'helper' => 'Positive to add, negative to deduct']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Profit Adjustment ($)','for' => 'admin_profit_adjustment','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('admin_profit_adjustment')),'helper' => 'Positive to add, negative to deduct']); ?>
                <input type="number" name="admin_profit_adjustment" id="admin_profit_adjustment" value="<?php echo e(old('admin_profit_adjustment', $position->admin_profit_adjustment)); ?>" step="0.01" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary">
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <div class="mt-4">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Admin Notes','for' => 'admin_notes','error' => $errors->first('admin_notes')]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Admin Notes','for' => 'admin_notes','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('admin_notes'))]); ?>
                    <textarea name="admin_notes" id="admin_notes" rows="3" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:ring-2 focus:ring-primary/30 focus:border-primary resize-y"><?php echo e(old('admin_notes', $position->admin_notes)); ?></textarea>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
            <button type="submit" class="mt-4 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium">Save Adjustment</button>
        </form>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
        <h3 class="text-base font-semibold text-content mb-4">Position Actions</h3>

        <?php if($position->isSettleable()): ?>
            <form action="<?php echo e(route('admin.copy-trades.settle', $position->id)); ?>" method="POST" class="mb-4" onsubmit="return confirm('Settle this position? $<?php echo e(number_format($position->totalPayout(), 2)); ?> will be credited to the user.')">
                <?php echo csrf_field(); ?>
                <button type="submit" class="w-full bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2.5 text-sm font-medium">
                    Settle & Credit User — $<?php echo e(number_format($position->totalPayout(), 2)); ?>

                </button>
            </form>
        <?php endif; ?>

        <?php if($position->status === 'active'): ?>
            <form action="<?php echo e(route('admin.copy-trades.stop', $position->id)); ?>" method="POST" onsubmit="return confirm('Force stop this active position?')">
                <?php echo csrf_field(); ?>
                <button type="submit" class="w-full bg-danger text-white hover:bg-danger/90 rounded-lg px-4 py-2.5 text-sm font-medium">
                    Force Stop
                </button>
            </form>
        <?php endif; ?>

        <?php if($position->status === 'settled'): ?>
            <p class="text-sm text-content-muted">This position has been settled by <strong><?php echo e($position->settled_by); ?></strong> on <?php echo e($position->settled_at?->format('M d, Y H:i')); ?>.</p>
        <?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
</div>


<div class="mt-6">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.table-card','data' => ['title' => 'Simulated Trades']]); ?>
<?php $component->withName('admin.table-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Simulated Trades']); ?>
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-surface-alt">
                    <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Asset</th>
                    <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Class</th>
                    <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Direction</th>
                    <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Entry</th>
                    <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Exit</th>
                    <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Amount</th>
                    <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">P/L</th>
                    <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Result</th>
                    <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Time</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-b border-border hover:bg-surface-alt/50">
                        <td class="px-5 py-3 font-medium text-content"><?php echo e($trade->asset_name); ?></td>
                        <td class="px-5 py-3"><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => []]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?><?php echo e(ucfirst($trade->asset_class)); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?></td>
                        <td class="px-5 py-3 font-medium <?php echo e($trade->action === 'buy' ? 'text-success' : 'text-danger'); ?>"><?php echo e(strtoupper($trade->action)); ?></td>
                        <td class="px-5 py-3 text-content"><?php echo e(number_format($trade->entry_price, 2)); ?></td>
                        <td class="px-5 py-3 text-content"><?php echo e(number_format($trade->exit_price, 2)); ?></td>
                        <td class="px-5 py-3 text-content">$<?php echo e(number_format($trade->amount, 2)); ?></td>
                        <td class="px-5 py-3 font-medium <?php echo e($trade->profit_loss >= 0 ? 'text-success' : 'text-danger'); ?>">
                            <?php echo e($trade->profit_loss >= 0 ? '+' : ''); ?>$<?php echo e(number_format($trade->profit_loss, 2)); ?>

                        </td>
                        <td class="px-5 py-3">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => $trade->result === 'WIN' ? 'success' : 'danger']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($trade->result === 'WIN' ? 'success' : 'danger')]); ?><?php echo e($trade->result); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </td>
                        <td class="px-5 py-3 text-content-secondary text-xs"><?php echo e($trade->executed_at->format('M d, H:i')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="9" class="px-5 py-8 text-center text-content-muted">No simulated trades yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <div class="mt-4"><?php echo e($trades->links()); ?></div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\copy-trades\show.blade.php ENDPATH**/ ?>