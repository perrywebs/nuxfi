<?php $__env->startSection('title', 'Signal Payment Wallets'); ?>
<?php $__env->startSection('content'); ?>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'Signal Payment Wallets','subtitle' => 'Configure the cryptocurrency wallets shown to users on the signal payment page.']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Signal Payment Wallets','subtitle' => 'Configure the cryptocurrency wallets shown to users on the signal payment page.']); ?>
         <?php $__env->slot('actions', null, []); ?> 
            <a href="<?php echo e(route('signal-payment-methods.create')); ?>" class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                Add Payment Method
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

    <div class="mt-4">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.alert','data' => ['type' => 'info','dismissible' => true]]); ?>
<?php $component->withName('admin.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'info','dismissible' => true]); ?>
            Only <strong>active</strong> methods with a wallet address are shown on the user payment page.
            A QR code is generated automatically from the wallet address; upload a custom QR image to override it.
            Methods used by existing payment records are archived instead of permanently deleted.
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </div>

    <div class="mt-6">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.table-card','data' => ['title' => 'Configured Payment Methods']]); ?>
<?php $component->withName('admin.table-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Configured Payment Methods']); ?>
            <table class="w-full text-sm text-left">
                <thead>
                    <tr class="bg-surface-alt text-content-muted text-xs uppercase tracking-wide">
                        <th class="px-5 py-3 font-medium">#</th>
                        <th class="px-5 py-3 font-medium">Name</th>
                        <th class="px-5 py-3 font-medium">Currency / Network</th>
                        <th class="px-5 py-3 font-medium">Wallet Address</th>
                        <th class="px-5 py-3 font-medium">QR</th>
                        <th class="px-5 py-3 font-medium">Payments</th>
                        <th class="px-5 py-3 font-medium">Status</th>
                        <th class="px-5 py-3 font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    <?php $__empty_1 = true; $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-surface-alt/50 transition-colors align-top">
                            <td class="px-5 py-3 text-content"><?php echo e($loop->iteration); ?></td>
                            <td class="px-5 py-3">
                                <p class="text-content font-medium"><?php echo e($method->name); ?></p>
                                <?php if($method->instructions): ?>
                                    <p class="text-xs text-content-muted max-w-[260px]"><?php echo e(\Illuminate\Support\Str::limit($method->instructions, 90)); ?></p>
                                <?php endif; ?>
                            </td>
                            <td class="px-5 py-3">
                                <p class="text-content"><?php echo e($method->currency ?: '—'); ?></p>
                                <p class="text-xs text-content-muted"><?php echo e($method->network ?: '—'); ?></p>
                            </td>
                            <td class="px-5 py-3 max-w-[220px]">
                                <p class="font-mono text-xs text-content-secondary break-all"><?php echo e($method->wallet_address ?: '—'); ?></p>
                            </td>
                            <td class="px-5 py-3">
                                <?php if($method->qr_code): ?>
                                    <span class="inline-flex items-center gap-1 text-xs text-success font-medium">Uploaded</span>
                                <?php else: ?>
                                    <span class="text-xs text-content-muted">Auto-generated</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-5 py-3 text-content"><?php echo e($method->payments_count); ?></td>
                            <td class="px-5 py-3">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => $method->is_active ? 'success' : 'danger']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($method->is_active ? 'success' : 'danger')]); ?>
                                    <?php echo e($method->is_active ? 'Enabled' : 'Disabled'); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <a href="<?php echo e(route('signal-payment-methods.edit', $method->id)); ?>" class="inline-flex items-center gap-1 text-sm font-medium text-primary hover:text-primary-hover transition-colors">
                                        Edit
                                    </a>
                                    <form action="<?php echo e(route('signal-payment-methods.toggle', $method->id)); ?>" method="POST" class="inline">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="text-sm font-medium text-warning hover:text-warning/80 transition-colors">
                                            <?php echo e($method->is_active ? 'Disable' : 'Enable'); ?>

                                        </button>
                                    </form>
                                    <form action="<?php echo e(route('signal-payment-methods.destroy', $method->id)); ?>" method="POST" class="inline"
                                          onsubmit="return confirm('<?php echo e($method->payments_count > 0 ? 'This method is used by existing payment records and will be archived instead of deleted. Continue?' : 'Delete this payment method?'); ?>')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-sm font-medium text-danger hover:text-danger/80 transition-colors">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" class="px-5 py-10 text-center text-content-muted">
                                No signal payment methods configured yet.
                                <a href="<?php echo e(route('signal-payment-methods.create')); ?>" class="text-primary font-medium hover:underline">Add your first method</a>.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <?php if($methods->hasPages()): ?>
                <div class="px-5 py-4 border-t border-border">
                    <?php echo e($methods->links()); ?>

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

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/admin/signals/payment-methods/index.blade.php ENDPATH**/ ?>