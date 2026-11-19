
<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" class="detail-table"
       style="margin: 20px 0; border: 1px solid #E5E7EB; border-radius: 6px; border-collapse: separate; overflow: hidden;">
    <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr style="background-color: <?php echo e($i % 2 === 0 ? '#F9FAFB' : '#FFFFFF'); ?>;">
            <td style="padding: 10px 16px; font-size: 14px; line-height: 1.5; color: #6B7280; font-weight: 600; border-bottom: <?php echo e($loop->last ? 'none' : '1px solid #E5E7EB'); ?>; width: 40%; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">
                <?php echo e($detail['label']); ?>

            </td>
            <td style="padding: 10px 16px; font-size: 14px; line-height: 1.5; color: #111827; text-align: right; border-bottom: <?php echo e($loop->last ? 'none' : '1px solid #E5E7EB'); ?>; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">
                <?php echo $detail['value']; ?>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\partials\transaction-details.blade.php ENDPATH**/ ?>