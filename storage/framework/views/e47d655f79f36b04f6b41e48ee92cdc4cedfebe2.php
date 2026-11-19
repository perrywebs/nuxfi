<?php
    $sub_link = 'https://trade.mql5.com/trade';
?>

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

    
    <?php echo $__env->make('user.partials.page-header', ['title' => 'Trading Accounts', 'subtitle' => 'Manage your trading accounts and subscriptions'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="rounded-xl bg-surface-raised border border-surface-border p-6 mb-6">
        <div class="flex items-start gap-4">
            <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'chart-bar','class' => 'w-5 h-5 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'chart-bar','class' => 'w-5 h-5 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
            <div>
                <h3 class="text-lg font-bold text-content-primary mb-2"><?php echo e($settings->site_name); ?> Account Manager</h3>
                <p class="text-sm text-content-secondary mb-3">
                    Don't have time to trade or learn how to trade? Our Account Management Service is the best profitable trading option for you. We can help manage your account in the financial market with a simple subscription model.
                </p>
                <p class="text-xs text-content-tertiary mb-4">Terms and Conditions apply. Reach us at <?php echo e($settings->contact_email); ?> for more info.</p>
                <button data-toggle="modal" data-target="#submitmt4modal"
                        class="px-4 py-2 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-semibold transition-colors">
                    Subscribe Now
                </button>
            </div>
        </div>
    </div>

    
    <h3 class="text-sm font-semibold text-content-primary mb-4">My Trading Accounts</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
        <?php $__empty_1 = true; $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="rounded-xl bg-surface-raised border border-surface-border p-5">
                <h4 class="text-sm font-semibold text-content-primary mb-3"><?php echo e($sub->mt4_id); ?> / <?php echo e($sub->account_type); ?></h4>
                <div class="space-y-2 text-sm">
                    <?php $__currentLoopData = ['Currency' => $sub->currency, 'Leverage' => $sub->leverage, 'Server' => $sub->server, 'Duration' => $sub->duration, 'Password' => 'xxxxxxx', 'Status' => $sub->status]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex justify-between">
                            <span class="text-content-tertiary"><?php echo e($label); ?></span>
                            <span class="text-content-primary font-medium"><?php echo e($val); ?></span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="mt-3 pt-3 border-t border-surface-border space-y-1 text-xs text-content-tertiary">
                    <p>Submitted: <?php echo e(\Carbon\Carbon::parse($sub->created_at)->toDayDateTimeString()); ?></p>
                    <p>Started: <?php echo e(!empty($sub->start_date) ? \Carbon\Carbon::parse($sub->start_date)->toDayDateTimeString() : 'Not started yet'); ?></p>
                    <p>Expire: <?php echo e(!empty($sub->end_date) ? \Carbon\Carbon::parse($sub->end_date)->toDayDateTimeString() : 'Not started yet'); ?></p>
                </div>

                <div class="mt-4 flex gap-2">
                    <button onclick="deletemt4()" class="px-3 py-1.5 rounded-lg bg-loss/10 text-loss text-xs font-medium hover:bg-loss/20 transition-colors">Cancel</button>
                    <?php
                        $remindAt = \Carbon\Carbon::parse($sub->reminded_at);
                    ?>
                    <?php if(($sub->status != 'Pending' && now()->isSameDay($remindAt)) || $sub->status == 'Expired'): ?>
                        <a href="<?php echo e(route('renewsub', $sub->id)); ?>" class="px-3 py-1.5 rounded-lg bg-gain/10 text-gain text-xs font-medium hover:bg-gain/20 transition-colors">Renew</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full rounded-xl bg-surface-raised border border-surface-border p-8 text-center">
                <p class="text-content-tertiary">You do not have a trading account at the moment.</p>
            </div>
        <?php endif; ?>
    </div>

    
    <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden">
        <div class="px-5 py-3 border-b border-surface-border">
            <h3 class="text-sm font-semibold text-content-primary">Web Trader</h3>
        </div>
        <iframe src="<?php echo e($sub_link); ?>" name="WebTrader" title="<?php echo e($title); ?>" frameborder="0"
                class="w-full" style="height: 76vh;"></iframe>
    </div>

    <?php echo $__env->make('user.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
    function deletemt4() {
        Swal.fire({
            title: 'Cancel Account',
            text: 'Send an email to <?php echo e($settings->contact_email); ?> to have your MT4 details cancelled.',
            icon: 'info',
            background: '#161A1E',
            color: '#E8EAED',
            confirmButtonColor: '#059669',
            confirmButtonText: 'Okay'
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\subtrade.blade.php ENDPATH**/ ?>