

<?php $__env->startSection('preheader'); ?>P2P Order Notification@endsection

<?php $__env->startSection('greeting'); ?>Hello <?php echo e($name); ?>,<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">P2P Order Notification</h2>

<div style="font-size: 15px; line-height: 1.6; color: #374151;">
    <?php echo $message; ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>

<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\orders\p2porder.blade.php ENDPATH**/ ?>