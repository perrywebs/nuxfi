<?php $__env->startSection('preheader'); ?>Welcome to <?php echo e($settings->site_name ?? config('app.name')); ?>!<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">Welcome to <?php echo e($settings->site_name ?? config('app.name')); ?>!</h2>

<p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
    Your registration is successful and we are really excited to welcome you to the <?php echo e($settings->site_name ?? config('app.name')); ?> community!
</p>

<p style="margin: 0 0 8px; font-size: 14px; line-height: 1.5; color: #374151;">
    Your system-generated password:
</p>

<table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin: 0 0 20px;">
    <tr>
        <td style="background-color: #F3F4F6; border: 1px solid #E5E7EB; border-radius: 6px; padding: 12px 20px;">
            <span style="font-size: 18px; font-weight: 700; letter-spacing: 1px; color: #111827; font-family: 'Courier New', monospace;">
                <?php echo e($demo->password); ?>

            </span>
        </td>
    </tr>
</table>

<p style="margin: 0 0 16px; font-size: 14px; line-height: 1.5; color: #DC2626; font-weight: 500;">
    Please change this password to your preferred one as soon as possible.
</p>

<?php if(!empty($settings->contact_email)): ?>
<p style="margin: 0; font-size: 14px; line-height: 1.5; color: #374151;">
    If you need any help, do not hesitate to reach out to us at
    <a href="mailto:<?php echo e($settings->contact_email); ?>" style="color: #059669; text-decoration: none;"><?php echo e($settings->contact_email); ?></a>.
</p>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>


<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\demotext.blade.php ENDPATH**/ ?>