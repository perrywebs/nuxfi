

<?php $__env->startSection('preheader'); ?>Your loan has been marked as defaulted@endsection

<?php $__env->startSection('greeting'); ?>Dear <?php echo e($user->name); ?>,<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">Loan Defaulted</h2>

<p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
    We regret to inform you that your loan has been <span style="color: #DC2626; font-weight: 600;">marked as defaulted</span> due to prolonged non-payment.
</p>

<?php $settings = \App\Models\Settings::find(1); ?>
<?php echo $__env->make('emails.partials.transaction-details', ['details' => [
    ['label' => 'Loan Plan', 'value' => $loan->loanPlan->name ?? 'N/A'],
    ['label' => 'Original Amount', 'value' => \App\Helpers\CurrencyHelper::formatForUser($loan->approved_amount ?? $loan->amount, $user ?? null)],
    ['label' => 'Total Repaid', 'value' => \App\Helpers\CurrencyHelper::formatForUser($loan->total_repaid, $user ?? null)],
    ['label' => 'Remaining Balance', 'value' => \App\Helpers\CurrencyHelper::formatForUser($loan->remaining_balance, $user ?? null)],
    ['label' => 'Status', 'value' => '<span style="color: #DC2626; font-weight: 600;">Defaulted</span>'],
]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<p style="margin: 16px 0 0; font-size: 15px; line-height: 1.6; color: #374151;">
    A defaulted loan may affect your eligibility for future loans. Please contact support if you wish to discuss repayment options.
</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>

<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\loan_defaulted.blade.php ENDPATH**/ ?>