<?php $__env->startSection('greeting'); ?><?php echo e($salutaion ? $salutaion : 'Hello'); ?> <?php echo e($recipient); ?>,<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if($attachment != null): ?>
<p style="margin: 0 0 16px;">
    <img src="<?php echo e($message->embed(asset('storage/'. $attachment))); ?>" alt="Attachment" style="max-width: 100%; height: auto; border-radius: 6px;" />
</p>
<?php endif; ?>

<div style="font-size: 15px; line-height: 1.6; color: #374151;">
    <?php echo nl2br(e($body)); ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>

<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/emails/NewNotification.blade.php ENDPATH**/ ?>