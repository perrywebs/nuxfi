<?php $__env->startSection('preheader'); ?>Your trade for <?php echo e($trade->asset_name); ?> has been updated@endsection

<?php $__env->startSection('greeting'); ?>Dear <?php echo e($trade->user->name); ?>,<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">Trade Update Notification</h2>

<p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
    Your trade for <strong><?php echo e($trade->asset_name); ?></strong> has been updated.
</p>

<?php
    $plColor = $trade->profit_loss >= 0 ? '#059669' : '#DC2626';
    $plSign = $trade->profit_loss >= 0 ? '+' : '-';
?>

<?php echo $__env->make('emails.partials.transaction-details', ['details' => [
    ['label' => 'Trade Result', 'value' => $trade->result],
    ['label' => 'Profit/Loss', 'value' => '<span style="color: ' . $plColor . '; font-weight: 700;">' . $plSign . \App\Helpers\CurrencyHelper::formatForUser(abs($trade->profit_loss), $trade->user ?? null) . '</span>'],
    ['label' => 'Status', 'value' => ucfirst($trade->status)],
]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action'); ?>
<?php echo $__env->make('emails.partials.button', ['url' => route('user.trades.history'), 'label' => 'View Trade History'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>

<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\trade_update.blade.php ENDPATH**/ ?>