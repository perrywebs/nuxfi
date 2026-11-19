<?php $__env->startSection('preheader'); ?>Update on your loan application@endsection

<?php $__env->startSection('greeting'); ?>Dear <?php echo e($loan->user->name); ?>,<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">Loan Application Rejected</h2>

<p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
    We regret to inform you that your loan application has been <span style="color: #DC2626; font-weight: 600;">rejected</span>.
</p>

<p style="margin: 0; font-size: 15px; line-height: 1.6; color: #374151;">
    If you have any questions, please feel free to contact us.
</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>

<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\loan_rejected.blade.php ENDPATH**/ ?>