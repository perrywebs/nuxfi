
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'Bot Subscription #'.e($subscription->id).'','subtitle' => 'View subscription details and manage profit']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Bot Subscription #'.e($subscription->id).'','subtitle' => 'View subscription details and manage profit']); ?>
     <?php $__env->slot('actions', null, []); ?> 
        <a href="<?php echo e(route('admin.bot-trading.subscriptions')); ?>" class="bg-surface-alt text-content border border-border hover:bg-surface-alt/80 rounded-lg px-4 py-2 text-sm font-medium inline-flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
            Back
        </a>
        <a href="<?php echo e(route('admin.bot-trading.subscription-edit', $subscription->id)); ?>" class="bg-warning text-content-inverse hover:bg-warning/80 rounded-lg px-4 py-2 text-sm font-medium inline-flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125" /></svg>
            Edit / Backdate
        </a>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
    
    <div class="lg:col-span-2 space-y-6">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <h3 class="text-base font-semibold text-content mb-4">Subscription Details</h3>
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-3">
                    <div>
                        <p class="text-xs text-content-muted">User</p>
                        <p class="text-sm font-medium text-content"><?php echo e($subscription->user->name ?? 'N/A'); ?></p>
                        <p class="text-xs text-content-muted"><?php echo e($subscription->user->email ?? ''); ?></p>
                    </div>
                    <div>
                        <p class="text-xs text-content-muted">Bot</p>
                        <p class="text-sm font-medium text-content"><?php echo e($subscription->tradingBot->name ?? 'Deleted'); ?></p>
                    </div>
                    <div>
                        <p class="text-xs text-content-muted">Status</p>
                        <?php
                            $statusColors = ['active' => 'success', 'stopped' => 'warning', 'completed' => 'info', 'settled' => 'neutral'];
                        ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => ''.e($statusColors[$subscription->status] ?? 'neutral').'']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => ''.e($statusColors[$subscription->status] ?? 'neutral').'']); ?><?php echo e(ucfirst($subscription->status)); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                </div>
                <div class="space-y-3">
                    <div>
                        <p class="text-xs text-content-muted">Invested Amount</p>
                        <p class="text-sm font-semibold text-content">$<?php echo e(number_format($subscription->invested_amount, 2)); ?></p>
                    </div>
                    <div>
                        <p class="text-xs text-content-muted">Accumulated Profit</p>
                        <p class="text-sm font-semibold <?php echo e($subscription->accumulated_profit >= 0 ? 'text-success' : 'text-danger'); ?>">$<?php echo e(number_format($subscription->accumulated_profit, 2)); ?></p>
                    </div>
                    <div>
                        <p class="text-xs text-content-muted">Admin Adjustment</p>
                        <p class="text-sm font-semibold text-content">$<?php echo e(number_format($subscription->admin_profit_adjustment, 2)); ?></p>
                    </div>
                    <div>
                        <p class="text-xs text-content-muted">Total Payout</p>
                        <p class="text-lg font-bold text-primary">$<?php echo e(number_format($subscription->totalPayout(), 2)); ?></p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4 mt-4 pt-4 border-t border-border">
                <div>
                    <p class="text-xs text-content-muted">Daily ROI Snapshot</p>
                    <p class="text-sm font-medium text-content"><?php echo e(number_format($subscription->daily_roi_snapshot, 2)); ?>%</p>
                </div>
                <div>
                    <p class="text-xs text-content-muted">Started</p>
                    <p class="text-sm text-content"><?php echo e($subscription->started_at->format('M d, Y H:i')); ?></p>
                </div>
                <div>
                    <p class="text-xs text-content-muted">Expires</p>
                    <p class="text-sm text-content"><?php echo e($subscription->expires_at ? $subscription->expires_at->format('M d, Y H:i') : '—'); ?></p>
                </div>
            </div>

            <?php if($subscription->admin_notes): ?>
                <div class="mt-4 pt-4 border-t border-border">
                    <p class="text-xs text-content-muted mb-1">Admin Notes</p>
                    <p class="text-sm text-content"><?php echo e($subscription->admin_notes); ?></p>
                </div>
            <?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

        
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.table-card','data' => ['title' => 'Simulated Trades ('.e($trades->total()).')']]); ?>
<?php $component->withName('admin.table-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Simulated Trades ('.e($trades->total()).')']); ?>
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-surface-alt">
                        <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Asset</th>
                        <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Action</th>
                        <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Amount</th>
                        <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Entry</th>
                        <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Exit</th>
                        <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">P/L</th>
                        <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Result</th>
                        <th class="text-left text-xs font-medium text-content-muted uppercase tracking-wide px-5 py-3">Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="border-b border-border">
                            <td class="px-5 py-3">
                                <p class="font-medium text-content"><?php echo e($trade->asset_name); ?></p>
                                <p class="text-xs text-content-muted"><?php echo e($trade->asset_class); ?></p>
                            </td>
                            <td class="px-5 py-3">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => ''.e($trade->action === 'buy' ? 'success' : 'danger').'']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => ''.e($trade->action === 'buy' ? 'success' : 'danger').'']); ?><?php echo e(strtoupper($trade->action)); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </td>
                            <td class="px-5 py-3 text-content">$<?php echo e(number_format($trade->amount, 2)); ?></td>
                            <td class="px-5 py-3 text-content"><?php echo e(number_format($trade->entry_price, 4)); ?></td>
                            <td class="px-5 py-3 text-content"><?php echo e(number_format($trade->exit_price, 4)); ?></td>
                            <td class="px-5 py-3 font-medium <?php echo e($trade->profit_loss >= 0 ? 'text-success' : 'text-danger'); ?>">$<?php echo e(number_format($trade->profit_loss, 2)); ?></td>
                            <td class="px-5 py-3">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => ''.e($trade->result === 'WIN' ? 'success' : 'danger').'']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => ''.e($trade->result === 'WIN' ? 'success' : 'danger').'']); ?><?php echo e($trade->result); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </td>
                            <td class="px-5 py-3 text-content-muted text-xs"><?php echo e($trade->executed_at->format('M d, H:i')); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="8" class="px-5 py-8 text-center text-content-muted">No trades yet.</td></tr>
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

    
    <div class="space-y-6">
        <?php if($subscription->isSettleable()): ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                <h3 class="text-base font-semibold text-content mb-4">Settle Subscription</h3>
                <p class="text-sm text-content-muted mb-4">Credit <strong class="text-content">$<?php echo e(number_format($subscription->totalPayout(), 2)); ?></strong> to user's balance and mark as settled.</p>
                <form action="<?php echo e(route('admin.bot-trading.settle', $subscription->id)); ?>" method="POST" onsubmit="return confirm('Confirm settlement?')">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="w-full bg-success text-white hover:bg-success/90 rounded-lg px-4 py-2.5 text-sm font-medium">Settle Now</button>
                </form>
             <?php echo $__env->renderComponent(); ?>
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
            <h3 class="text-base font-semibold text-content mb-4">Profit Adjustment</h3>
            <form action="<?php echo e(route('admin.bot-trading.adjust', $subscription->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Adjustment Amount ($)','for' => 'admin_profit_adjustment','error' => $errors->first('admin_profit_adjustment')]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Adjustment Amount ($)','for' => 'admin_profit_adjustment','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('admin_profit_adjustment'))]); ?>
                    <input type="number" name="admin_profit_adjustment" id="admin_profit_adjustment" value="<?php echo e(old('admin_profit_adjustment', $subscription->admin_profit_adjustment)); ?>" step="0.01" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary">
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <div class="mt-3">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Notes','for' => 'admin_notes']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Notes','for' => 'admin_notes']); ?>
                        <textarea name="admin_notes" id="admin_notes" rows="3" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:ring-2 focus:ring-primary/30 focus:border-primary resize-y"><?php echo e(old('admin_notes', $subscription->admin_notes)); ?></textarea>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
                <button type="submit" class="mt-3 w-full bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2.5 text-sm font-medium">Save Adjustment</button>
            </form>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\bot-trading\subscription-show.blade.php ENDPATH**/ ?>