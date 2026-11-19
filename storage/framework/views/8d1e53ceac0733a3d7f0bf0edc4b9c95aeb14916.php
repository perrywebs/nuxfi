<?php $__env->startSection('preheader'); ?>New ROI received on your investment@endsection

<?php $__env->startSection('greeting'); ?>Hello <?php echo e($user->name); ?>,<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">New Return on Investment</h2>

<p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
    This is a notification of a new return on investment (ROI) on your investment account.
</p>

<?php echo $__env->make('emails.partials.transaction-details', ['details' => [
    ['label' => 'Plan', 'value' => $plan],
    ['label' => 'Amount', 'value' => '<span style="color: #059669; font-weight: 600;">' . \App\Helpers\CurrencyHelper::formatForUser($amount, $user ?? null) . '</span>'],
    ['label' => 'Date', 'value' => $plandate],
]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>

<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\newroi.blade.php ENDPATH**/ ?>