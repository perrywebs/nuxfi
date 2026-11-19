
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.danger-alert','data' => []]); ?>
<?php $component->withName('danger-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.success-alert','data' => []]); ?>
<?php $component->withName('success-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    
    <?php echo $__env->make('user.partials.ticker-tape', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->make('user.partials.quick-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-content-primary">My Signal Subscriptions</h2>
            <p class="text-sm text-content-secondary mt-1">View your active signal plan subscriptions</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="<?php echo e(route('user.signal.payments')); ?>" class="px-4 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary text-sm font-medium transition-colors">Payment History</a>
            <a href="<?php echo e(route('user.signal.plans')); ?>" class="px-4 py-2 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-medium transition-colors">Browse Plans</a>
        </div>
    </div>

    
    <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden">
        <?php if($subscriptions->isEmpty()): ?>
            <div class="p-8 text-center">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'signal','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'signal','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <p class="text-content-secondary mb-3">You have no active subscriptions.</p>
                <a href="<?php echo e(route('user.signal.plans')); ?>" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-medium transition-colors">
                    Browse Plans
                </a>
            </div>
        <?php else: ?>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-surface-border">
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">#</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Plan</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Price</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Status</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Expires</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-border">
                        <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-surface-overlay/50 transition-colors">
                                <td class="px-5 py-3 text-content-tertiary"><?php echo e($key + 1); ?></td>
                                <td class="px-5 py-3 font-medium text-content-primary"><?php echo e($subscription->plan->name); ?></td>
                                <td class="px-5 py-3 text-content-primary"><?php echo e($settings->currency); ?><?php echo e(number_format($subscription->plan->price, 2)); ?></td>
                                <td class="px-5 py-3">
                                    <?php if(\Carbon\Carbon::parse($subscription->expires_at)->gt(now())): ?>
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gain/10 text-gain">Active</span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-loss/10 text-loss">Expired</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-5 py-3 text-content-tertiary text-xs"><?php echo e(\Carbon\Carbon::parse($subscription->expires_at)->toDayDateTimeString()); ?></td>
                                <td class="px-5 py-3">
                                    <form id="renew-form-<?php echo e($subscription->id); ?>" action="<?php echo e(route('renewsignals', $subscription->id)); ?>" method="POST" class="inline">
                                        <?php echo csrf_field(); ?>
                                        <button type="button" onclick="confirmRenewal(<?php echo e($subscription->id); ?>, '<?php echo e($subscription->plan->name); ?>', <?php echo e($subscription->plan->price); ?>)"
                                                class="px-3 py-1.5 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-xs font-medium transition-colors">
                                            Renew
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
    function confirmRenewal(subscriptionId, planName, price) {
        Swal.fire({
            title: 'Renew Subscription',
            html: 'Create a renewal payment request for <strong>' + planName + '</strong>?<br><br>' +
                  'Amount: <strong><?php echo e($settings->currency); ?>' + price.toLocaleString() + '</strong><br>' +
                  '<span style="font-size:12px;color:#9AA0AB;">You will be redirected to the crypto payment page. Your subscription renews after admin approval.</span>',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#059669',
            cancelButtonColor: '#2A2F36',
            confirmButtonText: 'Continue to Payment',
            cancelButtonText: 'Cancel',
            background: '#161A1E',
            color: '#E8EAED'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('renew-form-' + subscriptionId).submit();
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\signals\subscriptions.blade.php ENDPATH**/ ?>