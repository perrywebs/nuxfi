<?php $__env->startSection('preheader'); ?><?php echo e($foramin ? 'New withdrawal request' : 'Withdrawal ' . ($withdrawal->status == 'Processed' ? 'processed' : 'submitted')); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('greeting'); ?>Hello <?php echo e($foramin ? 'Admin' : $user->username); ?>,<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if($foramin): ?>
    
    <h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">New Withdrawal Request</h2>

    <p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
        <strong><?php echo e($user->name); ?></strong> has made a withdrawal request of <strong><?php echo e(\App\Helpers\CurrencyHelper::formatForUser($withdrawal->amount, $user)); ?></strong>. Please login to your account to review and take necessary action.
    </p>

    <?php echo $__env->make('emails.partials.transaction-details', ['details' => [
        ['label' => 'User', 'value' => $user->name],
        ['label' => 'Amount', 'value' => \App\Helpers\CurrencyHelper::formatForUser($withdrawal->amount, $user)],
        ['label' => 'Status', 'value' => '<span style="color: #D97706; font-weight: 600;">Pending Review</span>'],
    ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php if($withdrawal->status == 'Processed'): ?>
        
        <h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">Withdrawal Processed</h2>

        <p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
            Your withdrawal request has been <span style="color: #059669; font-weight: 600;">approved and processed</span> successfully.
        </p>

        <?php echo $__env->make('emails.partials.transaction-details', ['details' => [
            ['label' => 'Amount', 'value' => \App\Helpers\CurrencyHelper::formatForUser($withdrawal->amount, $user)],
            ['label' => 'Payment Method', 'value' => $withdrawal->payment_mode],
            ['label' => 'Status', 'value' => '<span style="color: #059669; font-weight: 600;">Processed</span>'],
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <p style="margin: 16px 0 0; font-size: 15px; line-height: 1.6; color: #374151;">
            You should receive your funds shortly. If you have any questions, feel free to contact our support team.
        </p>
    <?php else: ?>
        
        <h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">Withdrawal Submitted</h2>

        <p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
            Your withdrawal request has been submitted successfully. We will process your request shortly.
        </p>

        <?php echo $__env->make('emails.partials.transaction-details', ['details' => [
            ['label' => 'Amount', 'value' => \App\Helpers\CurrencyHelper::formatForUser($withdrawal->amount, $user)],
            ['label' => 'Payment Method', 'value' => $withdrawal->payment_mode],
            ['label' => 'Status', 'value' => '<span style="color: #D97706; font-weight: 600;">' . $withdrawal->status . '</span>'],
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>


<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\withdrawal-status.blade.php ENDPATH**/ ?>