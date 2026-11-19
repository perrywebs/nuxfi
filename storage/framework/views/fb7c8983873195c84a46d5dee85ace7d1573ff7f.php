<?php $__env->startSection('preheader'); ?>Credit card application update — <?php echo e($card->reference_number); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('greeting'); ?>Hello <?php echo e($user->username); ?>,<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;"><?php echo e($subjectText); ?></h2>

    <p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
        <?php if($card->status === \App\Models\Card::STATUS_REQUESTED): ?>
            We have received your credit card request. Our team will review your application and keep you updated at every step.
        <?php elseif($card->status === \App\Models\Card::STATUS_APPROVED): ?>
            Good news! Your credit card request has been <span style="color: #059669; font-weight: 600;">approved</span>. We are now preparing your card for shipment.
        <?php elseif($card->status === \App\Models\Card::STATUS_DENIED): ?>
            Unfortunately your credit card request was <span style="color: #DC2626; font-weight: 600;">denied</span>.
            <?php if($card->isRefunded()): ?>
                The application fee of <strong><?php echo e(\App\Helpers\CurrencyHelper::formatForUser($card->fee, $user)); ?></strong> has been refunded to your account.
            <?php endif; ?>
        <?php elseif($card->status === \App\Models\Card::STATUS_SHIPPED): ?>
            Your credit card has been <span style="color: #2563EB; font-weight: 600;">shipped</span> and is on its way to your delivery address.
        <?php elseif($card->status === \App\Models\Card::STATUS_DELIVERED): ?>
            Your credit card has been <span style="color: #059669; font-weight: 600;">delivered</span>. You can now activate and start using it.
        <?php endif; ?>
    </p>

    <?php echo $__env->make('emails.partials.transaction-details', ['details' => [
        ['label' => 'Application #', 'value' => $card->reference_number],
        ['label' => 'Status', 'value' => $card->statusLabel()],
        ['label' => 'Amount Charged', 'value' => \App\Helpers\CurrencyHelper::formatForUser($card->fee, $user)],
        ['label' => 'Delivery Address', 'value' => nl2br(e($card->delivery_address))],
    ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if($card->status === \App\Models\Card::STATUS_REQUESTED): ?>
        <p style="margin: 16px 0 0; font-size: 15px; line-height: 1.6; color: #374151;">
            You can track the status of your application anytime from your dashboard. Thank you for choosing <?php echo e($settings->site_name ?? config('app.name')); ?>.
        </p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\credit-card-status.blade.php ENDPATH**/ ?>