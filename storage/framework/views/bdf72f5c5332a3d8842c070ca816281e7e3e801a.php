<?php $__env->startSection('title', 'IP Address Blacklist'); ?>

<?php $__env->startSection('content'); ?>
    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'IP Address Blacklist','subtitle' => 'Block specific IP addresses from accessing your website.']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'IP Address Blacklist','subtitle' => 'Block specific IP addresses from accessing your website.']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => ['class' => 'mb-6']]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mb-6']); ?>
        <div class="max-w-xl mx-auto">
            <form method="post" action="javascript:void(0)" id="ipform">
                <?php echo csrf_field(); ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'IP Address','for' => 'ipaddress','helper' => 'This IP Address won\'t be able to access your website.']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'IP Address','for' => 'ipaddress','helper' => 'This IP Address won\'t be able to access your website.']); ?>
                    <input type="text" name="ipaddress" id="ipaddress"
                        class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors">
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <div class="mt-4">
                    <button type="submit"
                        class="bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-5 py-2.5 text-sm font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-primary/30">
                        Blacklist
                    </button>
                </div>
            </form>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => ['padding' => 'p-0']]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['padding' => 'p-0']); ?>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="bg-surface-alt px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left border-b border-border">IP Address</th>
                        <th class="bg-surface-alt px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left border-b border-border">Date Blacklisted</th>
                        <th class="bg-surface-alt px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left border-b border-border">Actions</th>
                    </tr>
                </thead>
                <tbody id="showipaddress">
                </tbody>
            </table>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    let textinput = document.getElementById('ipaddress');
    getallips();

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

    function getallips() {
        fetch("<?php echo e(route('allipaddress')); ?>")
            .then(res => res.json())
            .then(response => {
                if (response.status === 200) {
                    document.getElementById('showipaddress').innerHTML = response.data;
                }
            })
            .catch(err => console.log(err));
    }

    function deleteip(id) {
        fetch("<?php echo e(url('admin/dashboard/delete-ip')); ?>" + '/' + id)
            .then(res => res.json())
            .then(response => {
                if (response.status === 200) {
                    showToast(response.success, 'success');
                    getallips();
                }
            })
            .catch(err => console.log(err));
    }

    $('#ipform').on('submit', function() {
        $.ajax({
            url: "<?php echo e(route('addipaddress')); ?>",
            type: 'POST',
            data: $('#ipform').serialize(),
            success: function(response) {
                if (response.status === 200) {
                    textinput.value = "";
                    showToast(response.success, 'success');
                    getallips();
                }
            },
            error: function(error) {
                showToast('An error occurred. Please try again.', 'error');
                console.log(error);
            },
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\Settings\Ipaddress\ipaddress.blade.php ENDPATH**/ ?>