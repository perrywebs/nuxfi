<?php $__env->startSection('preheader'); ?>Your 2FA verification code@endsection

<?php $__env->startSection('greeting'); ?>Hello,<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">Two-Factor Authentication Code</h2>

<p style="margin: 0 0 20px; font-size: 15px; line-height: 1.6; color: #374151;">
    A temporary 2FA code request has been made using your account. Please authenticate using the code below:
</p>

<table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin: 24px auto; text-align: center;">
    <tr>
        <td style="background-color: #F3F4F6; border: 1px solid #E5E7EB; border-radius: 8px; padding: 16px 32px;">
            <span style="font-size: 28px; font-weight: 700; letter-spacing: 4px; color: #059669; font-family: 'Courier New', monospace;">
                <?php echo $demo->message; ?>

            </span>
        </td>
    </tr>
</table>

<p style="margin: 0; font-size: 13px; line-height: 1.5; color: #6B7280;">
    If you did not request this code, please ignore this email or contact support immediately.
</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>

<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\2fa.blade.php ENDPATH**/ ?>