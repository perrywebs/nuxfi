<?php $__env->startSection('preheader'); ?>Your investment plan has expired@endsection

<?php $__env->startSection('greeting'); ?>Hello <?php echo e($demo->receiver_name); ?>,<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">Investment Plan Expired</h2>

<p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
    This is to notify you that your investment plan (<strong><?php echo e($demo->receiver_plan); ?></strong> plan) has expired and your capital for this plan has been added to your account for withdrawal.
</p>

<?php echo $__env->make('emails.partials.transaction-details', ['details' => [
    ['label' => 'Plan', 'value' => $demo->receiver_plan],
    ['label' => 'Amount', 'value' => $demo->received_amount],
    ['label' => 'Date', 'value' => $demo->date],
]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>

<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\endplan.blade.php ENDPATH**/ ?>