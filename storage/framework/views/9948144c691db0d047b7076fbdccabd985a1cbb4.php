<?php $__env->startSection('preheader'); ?>A new trade has been placed for you@endsection

<?php $__env->startSection('greeting'); ?>Dear <?php echo e($trade->user->name); ?>,<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">New Trade Placed for You</h2>

<p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
    A new trade has been placed for you by the system. Here are the details:
</p>

<?php echo $__env->make('emails.partials.transaction-details', ['details' => [
    ['label' => 'Asset', 'value' => $trade->asset_name],
    ['label' => 'Amount', 'value' => \App\Helpers\CurrencyHelper::formatForUser($trade->amount, $user ?? null)],
    ['label' => 'Leverage', 'value' => $trade->leverage . 'x'],
    ['label' => 'Trade Action', 'value' => ucfirst($trade->action)],
    ['label' => 'Take Profit', 'value' => $trade->take_profit ? \App\Helpers\CurrencyHelper::formatForUser($trade->take_profit, $user ?? null) : 'Not Set'],
    ['label' => 'Stop Loss', 'value' => $trade->stop_loss ? \App\Helpers\CurrencyHelper::formatForUser($trade->stop_loss, $user ?? null) : 'Not Set'],
    ['label' => 'Expires At', 'value' => \Carbon\Carbon::parse($trade->expires_at)->format('Y-m-d H:i')],
]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action'); ?>
<?php echo $__env->make('emails.partials.button', ['url' => route('user.trades.history'), 'label' => 'View Trade History'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>

<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\admin_placed_trade.blade.php ENDPATH**/ ?>