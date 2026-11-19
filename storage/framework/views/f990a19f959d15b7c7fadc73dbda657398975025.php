<?php $__env->startSection('preheader'); ?>Your NFT bid has been approved!<?php $__env->stopSection(); ?>

<?php $__env->startSection('greeting'); ?>Dear <?php echo e($bid->user->name); ?>,<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: #111827;">Congratulations! Your Bid Was Approved</h2>

<p style="margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #374151;">
    Your bid of <strong><?php echo e(number_format($bid->amount, 2)); ?> ETH</strong> for the NFT
    <strong>&ldquo;<?php echo e($nft->name); ?>&rdquo;</strong> has been <span style="color: #059669; font-weight: 600;">approved</span>!
</p>

<p style="margin: 0; font-size: 15px; line-height: 1.6; color: #374151;">
    The NFT is now yours. You can view it in your collection.
</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action'); ?>
<?php echo $__env->make('emails.partials.button', ['url' => route('user.nfts.my'), 'label' => 'View My NFTs'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('signoff'); ?>

<?php echo $__env->make('emails.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\bid_approved.blade.php ENDPATH**/ ?>