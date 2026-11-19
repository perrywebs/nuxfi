<?php $__env->startSection('title', 'Trade #' . $trade->id); ?>

<?php $__env->startSection('content'); ?>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'Trade #'.e($trade->id).' Details']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Trade #'.e($trade->id).' Details']); ?>
         <?php $__env->slot('actions', null, []); ?> 
            <a href="<?php echo e(route('admin.trades.index')); ?>" class="inline-flex items-center gap-2 bg-secondary-light text-content-secondary rounded-lg px-4 py-2 text-sm font-medium hover:bg-surface-alt transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                Back to Trades
            </a>
            <a href="<?php echo e(route('admin.trades.edit', $trade->id)); ?>" class="inline-flex items-center gap-2 bg-primary text-primary-foreground rounded-lg px-4 py-2 text-sm font-medium hover:bg-primary-hover transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z" /></svg>
                Edit Trade
            </a>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">

        
        <div class="lg:col-span-2">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                <div class="flex items-center justify-between mb-5">
                    <h3 class="text-base font-semibold text-content">Trade Information</h3>
                    <div class="flex items-center gap-2">
                        <?php if(($trade->trade_type ?? 'binary') == 'binary'): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'info']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'info']); ?>Binary <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'neutral']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'neutral']); ?>Spot <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endif; ?>
                        <?php if($trade->is_demo): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'warning']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'warning']); ?>DEMO <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'success']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'success']); ?>LIVE <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="divide-y divide-border">
                    <div class="flex justify-between py-3">
                        <span class="text-sm text-content-muted">User</span>
                        <span class="text-sm font-medium text-content"><?php echo e($trade->user->name ?? 'N/A'); ?> (<?php echo e($trade->user->email ?? ''); ?>)</span>
                    </div>
                    <div class="flex justify-between py-3">
                        <span class="text-sm text-content-muted">Asset</span>
                        <span class="text-sm text-content"><?php echo e($trade->asset_name); ?></span>
                    </div>
                    <div class="flex justify-between py-3">
                        <span class="text-sm text-content-muted">Asset Type</span>
                        <span class="text-sm text-content"><?php echo e(ucfirst($trade->asset_type)); ?></span>
                    </div>
                    <div class="flex justify-between py-3">
                        <span class="text-sm text-content-muted">Action</span>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => $trade->action == 'buy' ? 'success' : 'danger']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($trade->action == 'buy' ? 'success' : 'danger')]); ?><?php echo e(ucfirst($trade->action)); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                    <div class="flex justify-between py-3">
                        <span class="text-sm text-content-muted">Amount</span>
                        <span class="text-sm font-medium text-content">$<?php echo e(number_format($trade->amount, 2)); ?></span>
                    </div>
                    <div class="flex justify-between py-3">
                        <span class="text-sm text-content-muted">Leverage</span>
                        <span class="text-sm text-content"><?php echo e($trade->leverage); ?>x</span>
                    </div>
                    <div class="flex justify-between py-3">
                        <span class="text-sm text-content-muted">Entry Price</span>
                        <span class="text-sm text-content"><?php echo e($trade->entry_price ? '$' . number_format($trade->entry_price, 2) : '—'); ?></span>
                    </div>
                    <div class="flex justify-between py-3">
                        <span class="text-sm text-content-muted">Exit Price</span>
                        <span class="text-sm text-content"><?php echo e($trade->exit_price ? '$' . number_format($trade->exit_price, 2) : '—'); ?></span>
                    </div>
                    <div class="flex justify-between py-3">
                        <span class="text-sm text-content-muted">Status</span>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => $trade->status == 'open' ? 'info' : 'neutral']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($trade->status == 'open' ? 'info' : 'neutral')]); ?><?php echo e(ucfirst($trade->status)); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                    <div class="flex justify-between py-3">
                        <span class="text-sm text-content-muted">Result</span>
                        <?php if($trade->result == 'WIN'): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'success']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'success']); ?>WIN <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php elseif($trade->result == 'LOSS'): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'danger']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger']); ?>LOSS <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'warning']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'warning']); ?><?php echo e($trade->result ?? 'PENDING'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <div class="flex justify-between py-3">
                        <span class="text-sm text-content-muted">Profit/Loss</span>
                        <?php if($trade->profit_loss !== null): ?>
                            <span class="text-sm font-semibold <?php echo e($trade->profit_loss >= 0 ? 'text-success' : 'text-danger'); ?>">
                                <?php echo e($trade->profit_loss >= 0 ? '+' : '-'); ?>$<?php echo e(number_format(abs($trade->profit_loss), 2)); ?>

                            </span>
                        <?php else: ?>
                            <span class="text-sm text-content-muted">—</span>
                        <?php endif; ?>
                    </div>
                    <div class="flex justify-between py-3">
                        <span class="text-sm text-content-muted">Opened At</span>
                        <span class="text-sm text-content"><?php echo e($trade->created_at->format('Y-m-d H:i:s')); ?></span>
                    </div>
                    <div class="flex justify-between py-3">
                        <span class="text-sm text-content-muted">Expires At</span>
                        <span class="text-sm text-content"><?php echo e($trade->expires_at ? $trade->expires_at->format('Y-m-d H:i:s') : 'No expiry (spot)'); ?></span>
                    </div>
                    <?php if($trade->settled_by): ?>
                    <div class="flex justify-between py-3">
                        <span class="text-sm text-content-muted">Settled By</span>
                        <span class="text-sm text-content"><?php echo e(ucfirst($trade->settled_by)); ?> <?php echo e($trade->settled_at ? '— ' . $trade->settled_at->format('Y-m-d H:i') : ''); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if($trade->close_requested_at): ?>
                    <div class="flex justify-between py-3">
                        <span class="text-sm text-content-muted">Close Requested</span>
                        <span class="text-sm text-warning font-medium"><?php echo e(\Carbon\Carbon::parse($trade->close_requested_at)->format('Y-m-d H:i')); ?></span>
                    </div>
                    <?php endif; ?>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>

        
        <div>
            <?php if($trade->status === 'open'): ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                    <h3 class="text-base font-semibold text-content mb-4">Settle Trade</h3>

                    <?php if($trade->close_requested_at): ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.alert','data' => ['type' => 'warning','class' => 'mb-4']]); ?>
<?php $component->withName('admin.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'warning','class' => 'mb-4']); ?>
                            <strong>Close Requested</strong> by user on <?php echo e(\Carbon\Carbon::parse($trade->close_requested_at)->format('M d, H:i')); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endif; ?>

                    <form action="<?php echo e(route('admin.trades.updateProfitLoss', $trade->id)); ?>" method="POST" class="space-y-4">
                        <?php echo csrf_field(); ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Result','for' => 'result','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Result','for' => 'result','required' => true]); ?>
                            <select name="result" id="result" required
                                    class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                                <option value="">Select</option>
                                <option value="WIN">WIN</option>
                                <option value="LOSS">LOSS</option>
                            </select>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Profit/Loss (USD)','for' => 'profit_loss','required' => true,'helper' => 'Suggested ('.e($trade->leverage).'x on $'.e(number_format($trade->amount, 2)).'): $'.e(number_format($trade->amount * ($trade->leverage / 100), 2)).'']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Profit/Loss (USD)','for' => 'profit_loss','required' => true,'helper' => 'Suggested ('.e($trade->leverage).'x on $'.e(number_format($trade->amount, 2)).'): $'.e(number_format($trade->amount * ($trade->leverage / 100), 2)).'']); ?>
                            <input type="number" step="0.01" name="profit_loss" id="profit_loss" required
                                   class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <button type="submit" class="w-full bg-primary text-primary-foreground rounded-lg px-4 py-2.5 text-sm font-medium hover:bg-primary-hover transition-colors">
                            Settle Trade
                        </button>
                    </form>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php else: ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                    <h3 class="text-base font-semibold text-content mb-4">Settlement Info</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-sm text-content-muted">Result</span>
                            <span class="text-sm font-semibold <?php echo e($trade->result == 'WIN' ? 'text-success' : 'text-danger'); ?>"><?php echo e($trade->result); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-content-muted">P/L</span>
                            <span class="text-sm font-semibold <?php echo e(($trade->profit_loss ?? 0) >= 0 ? 'text-success' : 'text-danger'); ?>">
                                <?php echo e(($trade->profit_loss ?? 0) >= 0 ? '+' : '-'); ?>$<?php echo e(number_format(abs($trade->profit_loss ?? 0), 2)); ?>

                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-content-muted">Settled By</span>
                            <span class="text-sm text-content"><?php echo e(ucfirst($trade->settled_by ?? 'system')); ?></span>
                        </div>
                        <?php if($trade->settled_at): ?>
                        <div class="flex justify-between">
                            <span class="text-sm text-content-muted">Settled At</span>
                            <span class="text-sm text-content"><?php echo e($trade->settled_at->format('Y-m-d H:i')); ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\trades\show.blade.php ENDPATH**/ ?>