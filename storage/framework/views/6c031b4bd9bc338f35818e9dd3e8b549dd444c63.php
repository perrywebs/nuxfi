

<?php $__env->startSection('preheader'); ?>Loan payment overdue@endsection

<?php $__env->startSection('greeting'); ?>Dear <?php echo e($user->name); ?>,<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">Loan Payment Overdue</h2>

<p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
    You have <span style="color: #DC2626; font-weight: 600;"><?php echo e($overdueCount); ?> overdue installment(s)</span> on your loan. Please make a payment as soon as possible to avoid additional late fees.
</p>

<?php $settings = \App\Models\Settings::find(1); ?>
<?php echo $__env->make('emails.partials.transaction-details', ['details' => [
    ['label' => 'Loan Plan', 'value' => $loan->loanPlan->name ?? 'N/A'],
    ['label' => 'Overdue Installments', 'value' => '<span style="color: #DC2626; font-weight: 600;">' . $overdueCount . '</span>'],
    ['label' => 'Remaining Balance', 'value' => \App\Helpers\CurrencyHelper::formatForUser($loan->remaining_balance, $user ?? null)],
    ['label' => 'Total Repaid', 'value' => \App\Helpers\CurrencyHelper::formatForUser($loan->total_repaid, $user ?? null)],
    ['label' => 'Progress', 'value' => $loan->progress_percentage . '% complete'],
]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<p style="margin: 16px 0 0; font-size: 15px; line-height: 1.6; color: #374151;">
    Late fees may be applied to overdue installments. Continued non-payment may result in your loan being marked as defaulted. Please log in to make your payment.
</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>

<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\loan_overdue.blade.php ENDPATH**/ ?>