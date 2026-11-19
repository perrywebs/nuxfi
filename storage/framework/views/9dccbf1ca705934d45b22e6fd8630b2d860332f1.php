<?php $__env->startSection('preheader'); ?><?php echo e($foramin ? 'New deposit notification' : 'Deposit ' . ($deposit->status == 'Processed' ? 'confirmed' : 'received')); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('greeting'); ?>Hello <?php echo e($foramin ? 'Admin' : $user->username); ?>,<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if($foramin): ?>
    
    <h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">New Deposit Notification</h2>

    <p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
        A deposit of <strong><?php echo e(\App\Helpers\CurrencyHelper::formatForUser($deposit->amount, $user)); ?></strong> has been made by <strong><?php echo e($user->name); ?></strong>.<?php echo e($deposit->status == 'Processed' ? '' : ' Please login to process it.'); ?>

    </p>

    <?php echo $__env->make('emails.partials.transaction-details', ['details' => [
        ['label' => 'User', 'value' => $user->name],
        ['label' => 'Amount', 'value' => \App\Helpers\CurrencyHelper::formatForUser($deposit->amount, $user)],
        ['label' => 'Status', 'value' => $deposit->status],
    ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php if($deposit->status == 'Processed'): ?>
        
        <h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">Deposit Confirmed</h2>

        <p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
            Your deposit of <strong><?php echo e(\App\Helpers\CurrencyHelper::formatForUser($deposit->amount, $user)); ?></strong> has been successfully
            <span style="color: #059669; font-weight: 600;">processed and confirmed</span>.
        </p>

        <?php echo $__env->make('emails.partials.transaction-details', ['details' => [
            ['label' => 'Amount', 'value' => \App\Helpers\CurrencyHelper::formatForUser($deposit->amount, $user)],
            ['label' => 'Payment Method', 'value' => $deposit->payment_mode],
            ['label' => 'Status', 'value' => '<span style="color: #059669; font-weight: 600;">&#10003; Confirmed</span>'],
            ['label' => 'Account Balance', 'value' => \App\Helpers\CurrencyHelper::formatForUser($user->account_bal, $user)],
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <p style="margin: 16px 0 0; font-size: 15px; line-height: 1.6; color: #374151;">
            You can now use these funds for transactions.
        </p>
    <?php else: ?>
        
        <h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">Deposit Received</h2>

        <p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
            Your deposit request has been received successfully. We will process it shortly.
        </p>

        <?php echo $__env->make('emails.partials.transaction-details', ['details' => [
            ['label' => 'Amount', 'value' => \App\Helpers\CurrencyHelper::formatForUser($deposit->amount, $user)],
            ['label' => 'Payment Method', 'value' => $deposit->payment_mode],
            ['label' => 'Status', 'value' => '<span style="color: #D97706; font-weight: 600;">Pending</span>'],
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <p style="margin: 16px 0 0; font-size: 15px; line-height: 1.6; color: #374151;">
            You will receive a confirmation once it's approved.
        </p>
    <?php endif; ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>Thank you for using <?php echo e($settings->site_name ?? config('app.name')); ?><?php $__env->stopSection(); ?>

<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\success-deposit.blade.php ENDPATH**/ ?>