<?php $__env->startSection('preheader'); ?>Your loan application has been approved@endsection

<?php $__env->startSection('greeting'); ?>Dear <?php echo e($user->name); ?>,<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">Loan Application Approved</h2>

<p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
    We are pleased to inform you that your loan application has been <span style="color: #059669; font-weight: 600;">approved</span> and the funds have been credited to your account.
</p>

<?php $settings = \App\Models\Settings::find(1); ?>
<?php echo $__env->make('emails.partials.transaction-details', ['details' => [
    ['label' => 'Loan Plan', 'value' => $loan->loanPlan->name ?? 'N/A'],
    ['label' => 'Approved Amount', 'value' => \App\Helpers\CurrencyHelper::formatForUser($loan->approved_amount ?? $loan->amount, $user)],
    ['label' => 'Total Repayable', 'value' => \App\Helpers\CurrencyHelper::formatForUser($loan->total_repayable, $user)],
    ['label' => 'Duration', 'value' => $loan->duration . ' months'],
    ['label' => 'Interest Rate', 'value' => $loan->interest_rate . '% ' . ucfirst($loan->interest_type ?? '')],
    ['label' => 'First Payment', 'value' => $loan->first_payment_date ? $loan->first_payment_date->format('M d, Y') : 'N/A'],
    ['label' => 'Status', 'value' => '<span style="color: #059669; font-weight: 600;">Approved &amp; Disbursed</span>'],
]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<p style="margin: 16px 0 0; font-size: 15px; line-height: 1.6; color: #374151;">
    You can view your repayment schedule and make payments from your dashboard. If you have any questions, please contact us.
</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>

<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\loan_approved.blade.php ENDPATH**/ ?>