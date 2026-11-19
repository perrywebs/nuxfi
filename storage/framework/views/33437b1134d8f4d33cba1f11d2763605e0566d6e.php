

<?php $__env->startSection('preheader'); ?>Loan payment reminder@endsection

<?php $__env->startSection('greeting'); ?>Hello <?php echo e($user->name); ?>,<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">Payment Reminder</h2>

<p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
    This is a friendly reminder that your next loan payment is due on <strong><?php echo e($schedule->due_date->format('M d, Y')); ?></strong>.
</p>

<?php $settings = \App\Models\Settings::find(1); ?>
<?php echo $__env->make('emails.partials.transaction-details', ['details' => [
    ['label' => 'Loan Plan', 'value' => $loan->loanPlan->name ?? 'N/A'],
    ['label' => 'Installment', 'value' => '#' . $schedule->installment_number],
    ['label' => 'Amount Due', 'value' => \App\Helpers\CurrencyHelper::formatForUser($schedule->total_amount, $user ?? null)],
    ['label' => 'Due Date', 'value' => $schedule->due_date->format('M d, Y')],
]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<p style="margin: 16px 0 0; font-size: 15px; line-height: 1.6; color: #374151;">
    Please ensure your account has sufficient balance. You can make your payment from the Loans section of your dashboard.
</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>

<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\loan_payment_reminder.blade.php ENDPATH**/ ?>