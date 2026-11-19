<?php $__env->startSection('title', 'Signal Payments'); ?>
<?php $__env->startSection('content'); ?>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'Signal Subscription Payments','subtitle' => 'Review, approve or reject manual cryptocurrency payments for signal plans.']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Signal Subscription Payments','subtitle' => 'Review, approve or reject manual cryptocurrency payments for signal plans.']); ?>
         <?php $__env->slot('actions', null, []); ?> 
            <a href="<?php echo e(route('signal-payment-methods.index')); ?>" class="inline-flex items-center gap-1.5 bg-surface-card border border-border text-content hover:bg-surface-alt rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3" /></svg>
                Payment Wallets
            </a>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <?php if(session('success')): ?>
        <div class="mt-4"><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.alert','data' => ['type' => 'success','dismissible' => true]]); ?>
<?php $component->withName('admin.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'success','dismissible' => true]); ?><?php echo e(session('success')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?></div>
    <?php endif; ?>
    <?php if(session('message')): ?>
        <div class="mt-4"><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.alert','data' => ['type' => 'danger','dismissible' => true]]); ?>
<?php $component->withName('admin.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger','dismissible' => true]); ?><?php echo e(session('message')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?></div>
    <?php endif; ?>

    
    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.stat-card','data' => ['label' => 'Pending','value' => $stats['pending']]]); ?>
<?php $component->withName('admin.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Pending','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($stats['pending'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.stat-card','data' => ['label' => 'Approved','value' => $stats['approved']]]); ?>
<?php $component->withName('admin.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Approved','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($stats['approved'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.stat-card','data' => ['label' => 'Rejected','value' => $stats['rejected']]]); ?>
<?php $component->withName('admin.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Rejected','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($stats['rejected'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.stat-card','data' => ['label' => 'Pending Amount','value' => $currency . number_format($stats['pending_amount'], 2)]]); ?>
<?php $component->withName('admin.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Pending Amount','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($currency . number_format($stats['pending_amount'], 2))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </div>

    
    <div class="mt-6 bg-surface-card rounded-xl border border-border shadow-card p-4">
        <form method="GET" action="<?php echo e(route('signal-payments.index')); ?>" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">
            <div class="lg:col-span-2">
                <label class="block text-xs font-medium text-content-muted mb-1">Search</label>
                <input type="text" name="q" value="<?php echo e(request('q')); ?>" placeholder="User name, email, ID, plan or TXID"
                       class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
            </div>
            <div>
                <label class="block text-xs font-medium text-content-muted mb-1">Status</label>
                <select name="status" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                    <option value="all" <?php echo e($status === 'all' ? 'selected' : ''); ?>>All statuses</option>
                    <option value="pending" <?php echo e($status === 'pending' ? 'selected' : ''); ?>>Pending</option>
                    <option value="approved" <?php echo e($status === 'approved' ? 'selected' : ''); ?>>Approved</option>
                    <option value="rejected" <?php echo e($status === 'rejected' ? 'selected' : ''); ?>>Rejected</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-medium text-content-muted mb-1">Plan</label>
                <select name="plan_id" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                    <option value="">All plans</option>
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($plan->id); ?>" <?php echo e((string) request('plan_id') === (string) $plan->id ? 'selected' : ''); ?>><?php echo e($plan->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div>
                <label class="block text-xs font-medium text-content-muted mb-1">Payment method</label>
                <div class="flex gap-2">
                    <select name="method_id" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                        <option value="">All methods</option>
                        <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($method->id); ?>" <?php echo e((string) request('method_id') === (string) $method->id ? 'selected' : ''); ?>><?php echo e($method->name); ?><?php echo e($method->trashed() ? ' (archived)' : ''); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="lg:col-span-5 flex items-center gap-2">
                <button type="submit" class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                    Apply Filters
                </button>
                <a href="<?php echo e(route('signal-payments.index')); ?>" class="inline-flex items-center px-4 py-2 rounded-lg border border-border text-sm font-medium text-content-secondary hover:bg-surface-alt transition-colors">
                    Reset
                </a>
            </div>
        </form>
    </div>

    
    <div class="mt-6">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.table-card','data' => ['title' => 'Payment Requests']]); ?>
<?php $component->withName('admin.table-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Payment Requests']); ?>
            <table class="w-full text-sm text-left">
                <thead>
                    <tr class="bg-surface-alt text-content-muted text-xs uppercase tracking-wide">
                        <th class="px-5 py-3 font-medium">#</th>
                        <th class="px-5 py-3 font-medium">User</th>
                        <th class="px-5 py-3 font-medium">Plan</th>
                        <th class="px-5 py-3 font-medium">Amount</th>
                        <th class="px-5 py-3 font-medium">Method / Network</th>
                        <th class="px-5 py-3 font-medium">TXID</th>
                        <th class="px-5 py-3 font-medium">Status</th>
                        <th class="px-5 py-3 font-medium">Created</th>
                        <th class="px-5 py-3 font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-surface-alt/50 transition-colors align-top">
                            <td class="px-5 py-3 text-content">#<?php echo e($payment->id); ?></td>
                            <td class="px-5 py-3">
                                <?php if($payment->user): ?>
                                    <p class="text-content font-medium"><?php echo e($payment->user->name); ?></p>
                                    <p class="text-xs text-content-muted"><?php echo e($payment->user->email); ?></p>
                                    <p class="text-xs text-content-muted">ID: <?php echo e($payment->user->id); ?></p>
                                <?php else: ?>
                                    <span class="text-content-muted">Deleted user</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-5 py-3">
                                <p class="text-content"><?php echo e($payment->plan_name); ?></p>
                                <p class="text-xs text-content-muted"><?php echo e($payment->duration); ?> <?php echo e(\Illuminate\Support\Str::plural('week', $payment->duration)); ?></p>
                            </td>
                            <td class="px-5 py-3 text-content font-medium whitespace-nowrap"><?php echo e($payment->currency); ?><?php echo e(number_format($payment->amount, 2)); ?></td>
                            <td class="px-5 py-3">
                                <p class="text-content"><?php echo e($payment->payment_method_name ?: '—'); ?></p>
                                <?php if($payment->payment_network): ?>
                                    <p class="text-xs text-content-muted"><?php echo e($payment->payment_network); ?></p>
                                <?php endif; ?>
                            </td>
                            <td class="px-5 py-3 max-w-[200px]">
                                <?php if($payment->tx_hash): ?>
                                    <p class="font-mono text-xs text-content-secondary break-all" title="<?php echo e($payment->tx_hash); ?>"><?php echo e(\Illuminate\Support\Str::limit($payment->tx_hash, 22)); ?></p>
                                <?php else: ?>
                                    <span class="text-xs text-content-muted">Not submitted</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-5 py-3">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => $payment->status === 'approved' ? 'success' : ($payment->status === 'rejected' ? 'danger' : 'warning')]]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($payment->status === 'approved' ? 'success' : ($payment->status === 'rejected' ? 'danger' : 'warning'))]); ?>
                                    <?php echo e(ucfirst($payment->status)); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </td>
                            <td class="px-5 py-3 text-content-secondary text-xs whitespace-nowrap"><?php echo e($payment->created_at ? $payment->created_at->toDayDateTimeString() : '—'); ?></td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-2">
                                    <a href="<?php echo e(route('signal-payments.show', $payment->id)); ?>" class="inline-flex items-center gap-1 text-sm font-medium text-primary hover:text-primary-hover transition-colors">
                                        View
                                    </a>
                                    <?php if($payment->isPending() && $payment->tx_hash): ?>
                                        <form action="<?php echo e(route('signal-payments.approve', $payment->id)); ?>" method="POST" onsubmit="return confirm('Approve this payment and activate the subscription?')">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="inline-flex items-center gap-1 text-sm font-medium text-success hover:text-success/80 transition-colors">
                                                Approve
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="9" class="px-5 py-10 text-center text-content-muted">No signal payment requests found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <?php if($payments->hasPages()): ?>
                <div class="px-5 py-4 border-t border-border">
                    <?php echo e($payments->links()); ?>

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

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\signals\payments\index.blade.php ENDPATH**/ ?>