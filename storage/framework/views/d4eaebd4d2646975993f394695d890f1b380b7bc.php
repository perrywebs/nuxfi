<?php $__env->startSection('title', 'Signal Payment Details'); ?>
<?php $__env->startSection('content'); ?>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'Signal Payment #'.e($payment->id).'','subtitle' => 'Review the payment request and verify the submitted transaction.']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Signal Payment #'.e($payment->id).'','subtitle' => 'Review the payment request and verify the submitted transaction.']); ?>
         <?php $__env->slot('actions', null, []); ?> 
            <a href="<?php echo e(route('signal-payments.index')); ?>" class="inline-flex items-center gap-1.5 bg-surface-alt text-content hover:bg-surface-alt/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors border border-border">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                Back to payments
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
    <?php if($errors->any()): ?>
        <div class="mt-4">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.alert','data' => ['type' => 'danger','dismissible' => true]]); ?>
<?php $component->withName('admin.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger','dismissible' => true]); ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div><?php echo e($error); ?></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="mt-6 grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">

        
        <div class="lg:col-span-2 space-y-6">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                <div class="flex items-center justify-between mb-5">
                    <h3 class="text-base font-medium text-content">Payment details</h3>
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
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 text-sm">
                    <div>
                        <p class="text-xs font-medium text-content-muted uppercase tracking-wide">Signal plan</p>
                        <p class="mt-1 font-medium text-content"><?php echo e($payment->plan_name); ?></p>
                        <p class="text-xs text-content-secondary"><?php echo e($payment->duration); ?> <?php echo e(\Illuminate\Support\Str::plural('week', $payment->duration)); ?></p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-content-muted uppercase tracking-wide">Amount to pay</p>
                        <p class="mt-1 text-lg font-semibold text-primary"><?php echo e($payment->currency); ?><?php echo e(number_format($payment->amount, 2)); ?></p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-content-muted uppercase tracking-wide">Payment method</p>
                        <p class="mt-1 text-content"><?php echo e($payment->payment_method_name ?: 'Not selected'); ?></p>
                        <p class="text-xs text-content-secondary"><?php echo e($payment->payment_network ?: '—'); ?></p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-content-muted uppercase tracking-wide">Requested on</p>
                        <p class="mt-1 text-content"><?php echo e($payment->created_at ? $payment->created_at->toDayDateTimeString() : '—'); ?></p>
                    </div>
                    <div class="sm:col-span-2">
                        <p class="text-xs font-medium text-content-muted uppercase tracking-wide">Wallet address (snapshot)</p>
                        <p class="mt-1 font-mono text-xs text-content break-all"><?php echo e($payment->wallet_address ?: '—'); ?></p>
                    </div>
                    <div class="sm:col-span-2">
                        <p class="text-xs font-medium text-content-muted uppercase tracking-wide">Transaction hash / TXID</p>
                        <p class="mt-1 font-mono text-sm text-content break-all"><?php echo e($payment->tx_hash ?: 'Not submitted yet'); ?></p>
                        <?php if($payment->submitted_at): ?>
                            <p class="text-xs text-content-muted mt-1">Submitted <?php echo e($payment->submitted_at->toDayDateTimeString()); ?></p>
                        <?php endif; ?>
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
                <h3 class="text-base font-medium text-content mb-4">Verification actions</h3>

                <?php if($payment->isPending()): ?>
                    <div class="rounded-lg bg-warning-light border border-warning/30 p-4 mb-5">
                        <p class="text-sm text-warning font-medium">This payment is pending verification.</p>
                        <p class="text-xs text-content-secondary mt-1">
                            Verify the transaction hash on the blockchain before approving. Approval activates the
                            user's signal subscription immediately and cannot be undone.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <form action="<?php echo e(route('signal-payments.approve', $payment->id)); ?>" method="POST"
                                  onsubmit="return confirm('Approve this payment and activate the subscription?')">
                                <?php echo csrf_field(); ?>
                                <button type="submit"
                                        class="w-full inline-flex items-center justify-center gap-2 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2.5 text-sm font-semibold transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                                        <?php echo e($payment->tx_hash ? '' : 'disabled'); ?>>
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                                    Approve &amp; Activate
                                </button>
                            </form>
                            <?php if(!$payment->tx_hash): ?>
                                <p class="text-xs text-content-muted mt-2 text-center">The user has not submitted a TXID yet.</p>
                            <?php endif; ?>
                        </div>

                        <div x-data="{ open: false }">
                            <button type="button" @click="open = !open"
                                    class="w-full inline-flex items-center justify-center gap-2 border border-danger/40 text-danger hover:bg-danger-light rounded-lg px-4 py-2.5 text-sm font-semibold transition-colors">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                Reject Payment
                            </button>

                            <form x-show="open" x-cloak x-transition action="<?php echo e(route('signal-payments.reject', $payment->id)); ?>" method="POST"
                                  class="mt-3 space-y-3" onsubmit="return confirm('Reject this payment? The subscription will not be activated.')">
                                <?php echo csrf_field(); ?>
                                <textarea name="rejection_reason" rows="3" maxlength="1000"
                                          placeholder="Optional rejection reason (visible to the user)"
                                          class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-danger/30 focus:border-danger"><?php echo e(old('rejection_reason')); ?></textarea>
                                <button type="submit"
                                        class="w-full inline-flex items-center justify-center gap-2 bg-danger text-content-inverse hover:bg-danger/80 rounded-lg px-4 py-2.5 text-sm font-semibold transition-colors">
                                    Confirm Rejection
                                </button>
                            </form>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="rounded-lg <?php echo e($payment->isApproved() ? 'bg-success-light border-success/30' : 'bg-danger-light border-danger/30'); ?> border p-4">
                        <p class="text-sm font-medium <?php echo e($payment->isApproved() ? 'text-success' : 'text-danger'); ?>">
                            This payment was <?php echo e($payment->status); ?><?php if($payment->approved_at || $payment->rejected_at): ?>
                                on <?php echo e(optional($payment->approved_at ?? $payment->rejected_at)->toDayDateTimeString()); ?>

                            <?php endif; ?>.
                        </p>
                        <?php if($payment->isRejected() && $payment->rejection_reason): ?>
                            <p class="text-xs text-content-secondary mt-2"><strong>Reason:</strong> <?php echo e($payment->rejection_reason); ?></p>
                        <?php endif; ?>
                        <?php if($payment->isApproved() && $payment->subscription): ?>
                            <p class="text-xs text-content-secondary mt-2">
                                Subscription active from <?php echo e(optional($payment->subscription->starts_at)->toDayDateTimeString() ?: '—'); ?>

                                to <?php echo e(optional($payment->subscription->expires_at)->toDayDateTimeString() ?: '—'); ?>.
                            </p>
                        <?php endif; ?>
                        <p class="text-xs text-content-muted mt-2">
                            Handled by:
                            <?php echo e($payment->isApproved() ? optional($payment->approver)->firstName . ' ' . optional($payment->approver)->lastName : optional($payment->rejecter)->firstName . ' ' . optional($payment->rejecter)->lastName); ?>

                        </p>
                    </div>
                <?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>

        
        <div class="space-y-6">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                <h3 class="text-base font-medium text-content mb-4">User</h3>
                <?php if($payment->user): ?>
                    <div class="space-y-3 text-sm">
                        <div>
                            <p class="text-xs text-content-muted">Name</p>
                            <p class="font-medium text-content"><?php echo e($payment->user->name); ?></p>
                        </div>
                        <div>
                            <p class="text-xs text-content-muted">Email</p>
                            <p class="text-content break-all"><?php echo e($payment->user->email); ?></p>
                        </div>
                        <div>
                            <p class="text-xs text-content-muted">User ID</p>
                            <p class="text-content"><?php echo e($payment->user->id); ?></p>
                        </div>
                        <a href="<?php echo e(url('admin/dashboard/user-wallet/' . $payment->user->id)); ?>" class="inline-flex items-center gap-1 text-xs font-medium text-primary hover:underline">
                            View user wallet
                        </a>
                    </div>
                <?php else: ?>
                    <p class="text-sm text-content-muted">This user no longer exists.</p>
                <?php endif; ?>
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
                <h3 class="text-base font-medium text-content mb-4">Timeline</h3>
                <div class="space-y-4 text-sm">
                    <div class="flex gap-3">
                        <span class="mt-1 w-2 h-2 rounded-full bg-primary shrink-0"></span>
                        <div>
                            <p class="text-content font-medium">Request created</p>
                            <p class="text-xs text-content-muted"><?php echo e($payment->created_at ? $payment->created_at->toDayDateTimeString() : '—'); ?></p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <span class="mt-1 w-2 h-2 rounded-full <?php echo e($payment->submitted_at ? 'bg-info' : 'bg-content-muted'); ?> shrink-0"></span>
                        <div>
                            <p class="text-content font-medium">TXID submitted</p>
                            <p class="text-xs text-content-muted"><?php echo e($payment->submitted_at ? $payment->submitted_at->toDayDateTimeString() : 'Not yet'); ?></p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <span class="mt-1 w-2 h-2 rounded-full <?php echo e($payment->approved_at ? 'bg-success' : ($payment->rejected_at ? 'bg-danger' : 'bg-content-muted')); ?> shrink-0"></span>
                        <div>
                            <p class="text-content font-medium">Admin decision</p>
                            <p class="text-xs text-content-muted">
                                <?php if($payment->approved_at): ?>
                                    Approved <?php echo e($payment->approved_at->toDayDateTimeString()); ?>

                                <?php elseif($payment->rejected_at): ?>
                                    Rejected <?php echo e($payment->rejected_at->toDayDateTimeString()); ?>

                                <?php else: ?>
                                    Awaiting review
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/admin/signals/payments/show.blade.php ENDPATH**/ ?>