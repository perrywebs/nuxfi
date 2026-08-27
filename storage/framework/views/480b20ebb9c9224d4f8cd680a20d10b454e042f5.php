<?php $__env->startSection('title', 'Card Application — ' . $card->reference_number); ?>

<?php $__env->startSection('content'); ?>

<div class="space-y-6">

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
    <?php if(session('error') || session('message')): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.alert','data' => ['type' => 'danger','dismissible' => true]]); ?>
<?php $component->withName('admin.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger','dismissible' => true]); ?><?php echo e(session('error') ?? session('message')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'Card Application','subtitle' => ''.e($card->reference_number).'']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Card Application','subtitle' => ''.e($card->reference_number).'']); ?>
        <a href="<?php echo e(route('admin.cards.index')); ?>"
           class="rounded-lg border border-border px-4 py-2 text-sm font-medium text-content-secondary hover:border-surface-border hover:text-content-primary transition">
            Back to list
        </a>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 rounded-xl bg-surface-raised border border-surface-border p-6">
            <h3 class="text-base font-semibold text-content mb-4">Application Details</h3>

            <?php
                $badgeType = match($card->status) {
                    'requested' => 'warning',
                    'approved'  => 'info',
                    'denied'    => 'danger',
                    'shipped'   => 'info',
                    'delivered' => 'success',
                    default     => 'neutral',
                };
            ?>

            <dl class="space-y-3 text-sm">
                <div class="flex justify-between border-b border-border pb-3">
                    <dt class="text-content-muted">Reference</dt>
                    <dd class="font-mono text-content"><?php echo e($card->reference_number); ?></dd>
                </div>
                <div class="flex justify-between border-b border-border pb-3">
                    <dt class="text-content-muted">Customer</dt>
                    <dd class="text-content"><?php echo e($card->user->name ?? 'N/A'); ?></dd>
                </div>
                <div class="flex justify-between border-b border-border pb-3">
                    <dt class="text-content-muted">Email</dt>
                    <dd class="text-content"><?php echo e($card->user->email ?? 'N/A'); ?></dd>
                </div>
                <div class="flex justify-between border-b border-border pb-3">
                    <dt class="text-content-muted">Fee Charged</dt>
                    <dd class="text-content"><?php echo \App\Helpers\CurrencyHelper::formatForUser($card->fee, $card->user); ?></dd>
                </div>
                <div class="flex justify-between border-b border-border pb-3">
                    <dt class="text-content-muted">Status</dt>
                    <dd><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => $badgeType]]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($badgeType)]); ?><?php echo e($card->statusLabel()); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?></dd>
                </div>
                <div class="flex justify-between border-b border-border pb-3">
                    <dt class="text-content-muted">Refunded</dt>
                    <dd class="text-content"><?php echo e($card->isRefunded() ? 'Yes' : 'No'); ?></dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-content-muted">Requested</dt>
                    <dd class="text-content"><?php echo e($card->created_at->format('M d, Y H:i')); ?></dd>
                </div>
            </dl>

            <div class="mt-5">
                <p class="text-xs font-medium uppercase tracking-wide text-content-muted mb-1.5">Delivery Address</p>
                <p class="text-sm text-content whitespace-pre-line"><?php echo e($card->delivery_address); ?></p>
            </div>
        </div>

        <div class="rounded-xl bg-surface-raised border border-surface-border p-6">
            <h3 class="text-base font-semibold text-content mb-4">Actions</h3>

            <div class="space-y-3">
                <?php if($card->status === 'requested'): ?>
                    <form action="<?php echo e(route('admin.cards.approve', $card)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit"
                            class="w-full rounded-lg bg-success-light px-4 py-2.5 text-sm font-semibold text-success hover:opacity-80 transition">
                            Approve Application
                        </button>
                    </form>
                    <form action="<?php echo e(route('admin.cards.deny', $card)); ?>" method="POST"
                          onsubmit="return confirm('Deny this application and refund the fee?');">
                        <?php echo csrf_field(); ?>
                        <button type="submit"
                            class="w-full rounded-lg bg-danger-light px-4 py-2.5 text-sm font-semibold text-danger hover:opacity-80 transition">
                            Deny &amp; Refund
                        </button>
                    </form>
                <?php elseif($card->status === 'approved'): ?>
                    <form action="<?php echo e(route('admin.cards.ship', $card)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit"
                            class="w-full rounded-lg bg-info-light px-4 py-2.5 text-sm font-semibold text-info hover:opacity-80 transition">
                            Mark as Shipped
                        </button>
                    </form>
                <?php elseif($card->status === 'shipped'): ?>
                    <form action="<?php echo e(route('admin.cards.deliver', $card)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit"
                            class="w-full rounded-lg bg-success-light px-4 py-2.5 text-sm font-semibold text-success hover:opacity-80 transition">
                            Mark as Delivered
                        </button>
                    </form>
                <?php else: ?>
                    <p class="text-sm text-content-muted">No further actions available for this application.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/admin/cards/show.blade.php ENDPATH**/ ?>