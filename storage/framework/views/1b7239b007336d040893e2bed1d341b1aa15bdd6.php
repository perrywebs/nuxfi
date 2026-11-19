

<?php $__env->startSection('preheader'); ?>Your Pre-IPO share purchase has been confirmed@endsection

<?php $__env->startSection('greeting'); ?>Hello <?php echo e($user->username); ?>,<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">Pre-IPO Share Purchase Confirmed</h2>

<p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
    Your purchase of <strong><?php echo e($company->name); ?></strong> (<?php echo e($company->symbol); ?>) shares has been successfully processed. Here are the details:
</p>

<?php echo $__env->make('emails.partials.transaction-details', ['details' => [
    ['label' => 'Company', 'value' => $company->name . ' (' . $company->symbol . ')'],
    ['label' => 'Sector', 'value' => $company->sector ?? 'N/A'],
    ['label' => 'Shares Purchased', 'value' => number_format($quantity)],
    ['label' => 'Price Per Share', 'value' => \App\Helpers\CurrencyHelper::formatForUser($company->share_price, $user)],
    ['label' => 'Total Cost', 'value' => \App\Helpers\CurrencyHelper::formatForUser($totalCost, $user)],
]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<p style="margin: 16px 0 0; font-size: 15px; line-height: 1.6; color: #374151;">
    Your shares are now held in your Pre-IPO portfolio. You can view your holdings anytime from your dashboard.
</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>

<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\pre_ipo_purchase.blade.php ENDPATH**/ ?>