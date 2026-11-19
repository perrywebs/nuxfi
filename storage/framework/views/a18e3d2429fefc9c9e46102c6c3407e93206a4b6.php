<?php $__env->startSection('title', 'Card Management'); ?>

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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'Card Management','subtitle' => 'Review and process credit card applications.']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Card Management','subtitle' => 'Review and process credit card applications.']); ?>
        <form method="GET" action="<?php echo e(route('admin.cards.index')); ?>" class="flex items-center gap-2">
            <select name="status"
                    class="rounded-lg border border-border bg-surface px-3 py-2 text-sm text-content focus:outline-none focus:border-primary">
                <option value="">All Statuses</option>
                <?php $__currentLoopData = App\Models\Card::statusLabels(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>" <?php echo e(request('status') == $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                   placeholder="Search ref / name / email"
                   class="rounded-lg border border-border bg-surface px-3 py-2 text-sm text-content focus:outline-none focus:border-primary w-56">
            <button type="submit"
                    class="rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-content-inverse hover:bg-primary-dark transition">
                Filter
            </button>
        </form>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.table-card','data' => ['title' => 'Applications ('.e($cards->total()).')']]); ?>
<?php $component->withName('admin.table-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Applications ('.e($cards->total()).')']); ?>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-surface-alt text-left text-xs font-medium uppercase tracking-wide text-content-muted">
                        <th class="px-4 py-3 border-b border-border">Reference</th>
                        <th class="px-4 py-3 border-b border-border">Customer</th>
                        <th class="px-4 py-3 border-b border-border">Email</th>
                        <th class="px-4 py-3 border-b border-border">Fee</th>
                        <th class="px-4 py-3 border-b border-border">Delivery Address</th>
                        <th class="px-4 py-3 border-b border-border">Requested</th>
                        <th class="px-4 py-3 border-b border-border">Status</th>
                        <th class="px-4 py-3 border-b border-border text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                        <tr class="border-b border-border last:border-0 hover:bg-surface-alt/50 transition-colors">
                            <td class="px-4 py-3 font-mono text-content"><?php echo e($card->reference_number); ?></td>
                            <td class="px-4 py-3 text-content"><?php echo e($card->user->name ?? 'N/A'); ?></td>
                            <td class="px-4 py-3 text-content-secondary"><?php echo e($card->user->email ?? 'N/A'); ?></td>
                            <td class="px-4 py-3 text-content"><?php echo \App\Helpers\CurrencyHelper::formatForUser($card->fee, $card->user); ?></td>
                            <td class="px-4 py-3 text-content-secondary max-w-xs">
                                <?php echo e(\Illuminate\Support\Str::limit($card->delivery_address, 60)); ?>

                            </td>
                            <td class="px-4 py-3 text-content-secondary"><?php echo e($card->created_at->format('M d, Y')); ?></td>
                            <td class="px-4 py-3">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => $badgeType]]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($badgeType)]); ?><?php echo e($card->statusLabel()); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex flex-wrap items-center justify-end gap-2">
                                    <?php if($card->status === 'requested'): ?>
                                        <form action="<?php echo e(route('admin.cards.approve', $card)); ?>" method="POST" class="inline">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit"
                                                class="rounded-lg bg-success-light px-3 py-1.5 text-xs font-medium text-success hover:opacity-80 transition">
                                                Approve
                                            </button>
                                        </form>
                                        <form action="<?php echo e(route('admin.cards.deny', $card)); ?>" method="POST" class="inline"
                                              onsubmit="return confirm('Deny this application and refund the fee?');">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit"
                                                class="rounded-lg bg-danger-light px-3 py-1.5 text-xs font-medium text-danger hover:opacity-80 transition">
                                                Deny
                                            </button>
                                        </form>
                                    <?php elseif($card->status === 'approved'): ?>
                                        <form action="<?php echo e(route('admin.cards.ship', $card)); ?>" method="POST" class="inline">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit"
                                                class="rounded-lg bg-info-light px-3 py-1.5 text-xs font-medium text-info hover:opacity-80 transition">
                                                Mark Shipped
                                            </button>
                                        </form>
                                    <?php elseif($card->status === 'shipped'): ?>
                                        <form action="<?php echo e(route('admin.cards.deliver', $card)); ?>" method="POST" class="inline">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit"
                                                class="rounded-lg bg-success-light px-3 py-1.5 text-xs font-medium text-success hover:opacity-80 transition">
                                                Mark Delivered
                                            </button>
                                        </form>
                                    <?php else: ?>
                                        <span class="text-xs text-content-muted">—</span>
                                    <?php endif; ?>

                                    <a href="<?php echo e(route('admin.cards.show', $card)); ?>"
                                       class="rounded-lg border border-border px-3 py-1.5 text-xs font-medium text-content-secondary hover:border-surface-border hover:text-content-primary transition">
                                        View
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" class="px-4 py-10 text-center text-content-muted">No card applications found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <?php echo e($cards->links()); ?>

        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\cards\index.blade.php ENDPATH**/ ?>