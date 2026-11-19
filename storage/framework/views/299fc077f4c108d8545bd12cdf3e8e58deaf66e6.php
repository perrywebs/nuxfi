<?php $__env->startSection('preheader'); ?>New trading signal alert@endsection

<?php $__env->startSection('content'); ?>
<h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">New Trading Signal Alert</h2>

<?php echo $__env->make('emails.partials.transaction-details', ['details' => [
    ['label' => 'Signal Name', 'value' => $signal->name],
    ['label' => 'Entry Price', 'value' => $signal->entry_price],
    ['label' => 'Take Profit', 'value' => $signal->take_profit],
    ['label' => 'Stop Loss', 'value' => $signal->stop_loss],
    ['label' => 'Leverage', 'value' => $signal->leverage . 'x'],
]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action'); ?>
<?php echo $__env->make('emails.partials.button', ['url' => url('/dashboard/singalssubscriptions'), 'label' => 'View Signals'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>

<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\new_signal.blade.php ENDPATH**/ ?>