

<?php $__env->startSection('preheader'); ?>Loan payment received@endsection

<?php $__env->startSection('greeting'); ?>Hello <?php echo e($user->name); ?>,<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">Loan Payment Received</h2>

<p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
    Your payment for <strong>Installment #<?php echo e($schedule->installment_number); ?></strong> has been successfully recorded.
</p>

<?php $settings = \App\Models\Settings::find(1); ?>
<?php echo $__env->make('emails.partials.transaction-details', ['details' => [
    ['label' => 'Loan Plan', 'value' => $loan->loanPlan->name ?? 'N/A'],
    ['label' => 'Installment', 'value' => '#' . $schedule->installment_number . ' of ' . ($loan->num_installments ?? $loan->duration)],
    ['label' => 'Amount Paid', 'value' => \App\Helpers\CurrencyHelper::formatForUser($schedule->paid_amount, $user ?? null)],
    ['label' => 'Remaining Balance', 'value' => \App\Helpers\CurrencyHelper::formatForUser($loan->remaining_balance, $user ?? null)],
    ['label' => 'Progress', 'value' => $loan->progress_percentage . '% complete'],
]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<p style="margin: 16px 0 0; font-size: 15px; line-height: 1.6; color: #374151;">
    You can view your full repayment schedule from your dashboard.
</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>

<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\loan_repayment.blade.php ENDPATH**/ ?>