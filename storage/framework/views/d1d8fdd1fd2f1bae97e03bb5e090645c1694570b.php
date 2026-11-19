

<?php $__env->startSection('preheader'); ?><?php echo e($company->name); ?> status update: <?php echo e(ucfirst($newStatus)); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('greeting'); ?>Hello <?php echo e($user->username); ?>,<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">
    <?php echo e($company->name); ?> — Status Update
</h2>

<?php if($newStatus === 'public'): ?>
<p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
    Great news! <strong><?php echo e($company->name); ?></strong> (<?php echo e($company->symbol); ?>) has officially gone public. Your Pre-IPO shares have been converted and are now trading at live market prices.
</p>

<p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
    You can now <strong>sell your shares</strong> at the current market price from your holdings page.
</p>
<?php elseif($newStatus === 'open'): ?>
<p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
    <strong><?php echo e($company->name); ?></strong> (<?php echo e($company->symbol); ?>) is now open for share purchases. Don't miss this opportunity to invest before the IPO.
</p>
<?php elseif($newStatus === 'closed'): ?>
<p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
    The Pre-IPO round for <strong><?php echo e($company->name); ?></strong> (<?php echo e($company->symbol); ?>) has been closed. No further purchases are available. Your existing holdings remain in your portfolio.
</p>
<?php elseif($newStatus === 'ipo'): ?>
<p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
    <strong><?php echo e($company->name); ?></strong> (<?php echo e($company->symbol); ?>) is now in the IPO transition period. Stay tuned — once the company goes public, you'll be able to trade your shares at live market prices.
</p>
<?php endif; ?>

<?php echo $__env->make('emails.partials.transaction-details', ['details' => [
    ['label' => 'Company', 'value' => $company->name . ' (' . $company->symbol . ')'],
    ['label' => 'Sector', 'value' => $company->sector ?? 'N/A'],
    ['label' => 'New Status', 'value' => '<strong>' . ucfirst($newStatus) . '</strong>'],
    ['label' => 'Share Price', 'value' => \App\Helpers\CurrencyHelper::formatForUser($company->share_price, $user)],
]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<p style="margin: 16px 0 0; font-size: 15px; line-height: 1.6; color: #374151;">
    Visit your dashboard to view your Pre-IPO holdings and the latest updates.
</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>

<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\pre_ipo_status.blade.php ENDPATH**/ ?>