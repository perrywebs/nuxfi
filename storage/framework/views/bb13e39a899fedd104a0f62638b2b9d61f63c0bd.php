
<?php
    $value = $value ?? null;
    $size = $size ?? 'sm';
    $showSign = $showSign ?? true;
    $currency = $currency ?? ($userCurrencySymbol ?? '$');

    $sizeClass = match($size) {
        'lg' => 'text-xl font-bold',
        'base' => 'text-base font-semibold',
        default => 'text-sm font-medium',
    };

    if ($value === null) {
        $colorClass = 'text-content-tertiary';
        $display = '—';
    } elseif ($value >= 0) {
        $colorClass = 'text-gain';
        $sign = $showSign ? '+' : '';
        $display = $sign . $currency . number_format(abs($value), 2);
    } else {
        $colorClass = 'text-loss';
        $sign = $showSign ? '-' : '';
        $display = $sign . $currency . number_format(abs($value), 2);
    }
?>

<span class="<?php echo e($sizeClass); ?> <?php echo e($colorClass); ?>" aria-label="Profit and loss: <?php echo e($display); ?>">
    <?php echo e($display); ?>

</span>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\trades\partials\pnl-display.blade.php ENDPATH**/ ?>