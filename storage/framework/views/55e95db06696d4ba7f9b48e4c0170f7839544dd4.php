<?php $__env->startSection('title', __('Page Expired')); ?>
<?php $__env->startSection('code', '419'); ?>
<?php $__env->startSection('message', __('Your session has expired. Please refresh the page and try again.')); ?>

<?php $__env->startSection('icon'); ?>

<svg class="w-10 h-10 text-warning" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('errors::minimal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\errors\419.blade.php ENDPATH**/ ?>