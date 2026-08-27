<?php $uc = app('App\Http\Controllers\User\UsersController'); ?>
<?php
    $array = \App\Models\User::all();
    $usr = Auth::user()->id;
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

    
    <?php echo $__env->make('user.partials.page-header', ['title' => 'Referral Program', 'subtitle' => 'Invite friends and earn rewards'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="rounded-xl bg-surface-raised border border-surface-border p-6 mb-6">
        <div class="max-w-2xl mx-auto text-center">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-primary/10 mb-4">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'user-group','class' => 'w-7 h-7 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'user-group','class' => 'w-7 h-7 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
            <h3 class="text-lg font-semibold text-content-primary mb-2">Share Your Referral Link</h3>
            <p class="text-sm text-content-secondary mb-5">Invite friends using your unique link or referral ID below.</p>

            
            <div class="flex items-center gap-2 max-w-lg mx-auto mb-4">
                <input type="text" id="reflink" value="<?php echo e(Auth::user()->ref_link); ?>" readonly
                       class="flex-1 px-4 py-2.5 rounded-lg bg-surface-overlay border border-surface-border text-content-primary text-sm focus:outline-none">
                <button onclick="copyReferralLink()" class="px-4 py-2.5 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-medium transition-colors flex items-center gap-1.5">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'clipboard','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'clipboard','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    Copy
                </button>
            </div>

            
            <p class="text-sm text-content-secondary mb-1">or share your Referral ID</p>
            <span class="text-lg font-bold text-primary"><?php echo e(Auth::user()->username); ?></span>

            
            <div class="mt-5 pt-5 border-t border-surface-border">
                <p class="text-xs text-content-tertiary mb-1">You were referred by</p>
                <div class="inline-flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-surface-overlay flex items-center justify-center">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'user','class' => 'w-4 h-4 text-content-secondary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'user','class' => 'w-4 h-4 text-content-secondary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                    <span class="text-sm font-medium text-content-primary"><?php echo e($uc->getUserParent($usr)); ?></span>
                </div>
            </div>
        </div>
    </div>

    
    <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden">
        <div class="px-5 py-3 border-b border-surface-border flex items-center gap-2">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'user-group','class' => 'w-5 h-5 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'user-group','class' => 'w-5 h-5 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <h3 class="text-sm font-semibold text-content-primary">Your Referrals</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-surface-border">
                        <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Client Name</th>
                        <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Ref. Level</th>
                        <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Parent</th>
                        <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Status</th>
                        <th class="px-5 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Date Registered</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-border text-content-secondary">
                    <?php echo $uc->getdownlines($array, $usr); ?>

                </tbody>
            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
    function copyReferralLink() {
        const refInput = document.getElementById('reflink');
        refInput.select();
        refInput.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(refInput.value).then(() => {
            Swal.fire({
                title: 'Copied!',
                text: 'Referral link copied to clipboard.',
                icon: 'success',
                background: '#161A1E',
                color: '#E8EAED',
                confirmButtonColor: '#059669',
                timer: 2000,
                timerProgressBar: true
            });
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/user/referuser.blade.php ENDPATH**/ ?>