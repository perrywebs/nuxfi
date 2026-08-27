<?php $__env->startSection('title', 'Referral & Bonus Settings'); ?>

<?php $__env->startSection('content'); ?>
    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'Referral & Bonus Settings','subtitle' => 'Configure referral commissions and user bonuses.']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Referral & Bonus Settings','subtitle' => 'Configure referral commissions and user bonuses.']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    
    <?php if(count($errors) > 0): ?>
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
    <?php endif; ?>

    
    <div x-data="{ activeTab: 'referral' }" class="mt-6">
        
        <div class="flex gap-1 border-b border-border overflow-x-auto">
            <button @click="activeTab = 'referral'"
                :class="activeTab === 'referral' ? 'border-primary text-primary' : 'border-transparent text-content-muted hover:text-content-secondary hover:border-border-strong'"
                class="px-4 py-2.5 text-sm font-medium border-b-2 transition-colors whitespace-nowrap -mb-px">
                Referral Bonus
            </button>
            <button @click="activeTab = 'other'"
                :class="activeTab === 'other' ? 'border-primary text-primary' : 'border-transparent text-content-muted hover:text-content-secondary hover:border-border-strong'"
                class="px-4 py-2.5 text-sm font-medium border-b-2 transition-colors whitespace-nowrap -mb-px">
                Other Bonus(es)
            </button>
        </div>

        
        <div class="mt-6">
            <div x-show="activeTab === 'referral'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <?php echo $__env->make('admin.Settings.ReferralSettings.referral', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div x-show="activeTab === 'other'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <?php echo $__env->make('admin.Settings.ReferralSettings.other-bonus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    function showToast(message, type = 'success') {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: type,
            title: message,
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            background: type === 'success' ? 'rgb(var(--success-light))' : 'rgb(var(--danger-light))',
            color: type === 'success' ? 'rgb(var(--success))' : 'rgb(var(--danger))',
        });
    }

    function ajaxSubmit(formId, url) {
        $(formId).on('submit', function() {
            $.ajax({
                url: url,
                type: 'POST',
                data: $(formId).serialize(),
                success: function(response) {
                    if (response.status === 200) {
                        showToast(response.success, 'success');
                    }
                },
                error: function(error) {
                    showToast('An error occurred. Please try again.', 'error');
                    console.log(error);
                },
            });
        });
    }

    ajaxSubmit('#refform', "<?php echo e(route('updaterefbonus')); ?>");
    ajaxSubmit('#bonusform', "<?php echo e(route('otherbonus')); ?>");
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/admin/Settings/ReferralSettings/show.blade.php ENDPATH**/ ?>