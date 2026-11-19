<?php $__env->startSection('preheader'); ?>Your loan request has been received@endsection

<?php $__env->startSection('greeting'); ?>Hello <?php echo e($user->name); ?>,<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">Loan Request Received</h2>

<p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
    Your loan request has been received and is currently under review.
</p>

<?php $settings = \App\Models\Settings::find(1); ?>
<?php echo $__env->make('emails.partials.transaction-details', ['details' => [
    ['label' => 'Loan Plan', 'value' => $loan->loanPlan->name ?? 'N/A'],
    ['label' => 'Amount Requested', 'value' => \App\Helpers\CurrencyHelper::formatForUser($loan->amount, $user ?? null)],
    ['label' => 'Duration', 'value' => $loan->duration . ' months'],
    ['label' => 'Purpose', 'value' => $loan->purpose],
    ['label' => 'Status', 'value' => '<span style="color: #D97706; font-weight: 600;">Under Review</span>'],
]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<p style="margin: 16px 0 0; font-size: 15px; line-height: 1.6; color: #374151;">
    We will notify you once a decision has been made.
</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>

<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\loan_request.blade.php ENDPATH**/ ?>