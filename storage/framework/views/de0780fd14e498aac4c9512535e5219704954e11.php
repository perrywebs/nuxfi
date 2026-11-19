

<?php $__env->startSection('preheader'); ?>Congratulations! Your loan has been fully repaid@endsection

<?php $__env->startSection('greeting'); ?>Dear <?php echo e($user->name); ?>,<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">Loan Fully Repaid</h2>

<p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
    Congratulations! Your loan has been <span style="color: #059669; font-weight: 600;">fully repaid</span>. Your account is now clear of this obligation.
</p>

<?php $settings = \App\Models\Settings::find(1); ?>
<?php echo $__env->make('emails.partials.transaction-details', ['details' => [
    ['label' => 'Loan Plan', 'value' => $loan->loanPlan->name ?? 'N/A'],
    ['label' => 'Original Amount', 'value' => \App\Helpers\CurrencyHelper::formatForUser($loan->approved_amount ?? $loan->amount, $user ?? null)],
    ['label' => 'Total Repaid', 'value' => \App\Helpers\CurrencyHelper::formatForUser($loan->total_repaid, $user ?? null)],
    ['label' => 'Status', 'value' => '<span style="color: #059669; font-weight: 600;">Completed</span>'],
]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<p style="margin: 16px 0 0; font-size: 15px; line-height: 1.6; color: #374151;">
    You are now eligible to apply for a new loan. Thank you for your timely payments!
</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>

<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\loan_completed.blade.php ENDPATH**/ ?>