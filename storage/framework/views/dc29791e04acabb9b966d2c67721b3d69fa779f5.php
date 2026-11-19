<turbo-stream <?php echo e($targetTag); ?>="<?php echo e($targetValue); ?>" action="<?php echo e($action); ?>">
<?php if($action !== "remove"): ?>
    <template><?php echo e($slot); ?></template>
<?php endif; ?>
</turbo-stream>
<?php /**PATH C:\xampp\htdocs\nuxfi\vendor\tonysm\turbo-laravel\resources\views\components\stream.blade.php ENDPATH**/ ?>