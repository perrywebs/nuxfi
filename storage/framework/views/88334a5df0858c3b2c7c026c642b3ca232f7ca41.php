
<div class="grid grid-cols-2 gap-3 mb-6">
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Total Trades', 'value' => $totalTrades, 'icon' => 'chart-bar', 'color' => 'info'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Open Trades', 'value' => $openTrades, 'icon' => 'folder-open', 'color' => 'primary'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Closed Trades', 'value' => $closedTrades, 'icon' => 'folder', 'color' => 'warning'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Win/Loss Ratio', 'value' => $winLossRatio, 'icon' => 'trophy', 'color' => 'gain'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\tradeanalytics.blade.php ENDPATH**/ ?>