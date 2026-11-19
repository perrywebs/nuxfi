
<?php
    $asset = $trade->tradingAsset ?? null;
    $tradeType = $trade->trade_type ?? 'binary';
    $isSpot = $tradeType === 'spot';
    $isClosed = $trade->status === 'closed';
    $detailUrl = route('user.trades.show', $trade->id);
?>

<a href="<?php echo e($detailUrl); ?>" class="block bg-surface-raised border border-surface-border rounded-xl overflow-hidden hover:border-primary/30 transition-colors focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-surface-base" aria-label="Trade <?php echo e($trade->asset_name); ?> — <?php echo e(ucfirst($trade->action)); ?> — <?php echo e(ucfirst($trade->status)); ?>">
    
    <div class="px-4 py-3 flex items-center justify-between border-b border-surface-border">
        <div class="flex items-center gap-2.5 min-w-0">
            <?php echo $__env->make('user.trades.partials.asset-cell', ['trade' => $trade], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="flex items-center gap-1.5 shrink-0">
            <span class="px-1.5 py-0.5 text-[10px] font-semibold rounded <?php echo e($tradeType === 'binary' ? 'bg-info/10 text-info' : 'bg-primary/10 text-primary'); ?>">
                <?php echo e(ucfirst($tradeType)); ?>

            </span>
            <?php if($trade->is_demo): ?>
                <span class="px-1.5 py-0.5 text-[10px] font-semibold rounded bg-warning/10 text-warning">DEMO</span>
            <?php endif; ?>
            <span class="px-1.5 py-0.5 text-[10px] font-semibold rounded uppercase <?php echo e($trade->action === 'buy' ? 'bg-gain/10 text-gain' : 'bg-loss/10 text-loss'); ?>">
                <?php echo e($trade->action); ?>

            </span>
        </div>
    </div>

    
    <div class="px-4 py-3">
        <div class="grid grid-cols-3 gap-3">
            
            <div>
                <p class="text-[10px] text-content-tertiary uppercase tracking-wider mb-0.5">Amount</p>
                <p class="text-sm font-semibold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->amount); ?></p>
            </div>
            
            <div>
                <p class="text-[10px] text-content-tertiary uppercase tracking-wider mb-0.5">Leverage</p>
                <p class="text-sm font-semibold text-content-primary"><?php echo e($trade->leverage); ?>x</p>
            </div>
            
            <div>
                <p class="text-[10px] text-content-tertiary uppercase tracking-wider mb-0.5">Entry</p>
                <p class="text-sm text-content-secondary">
                    <?php if($trade->entry_price): ?> <?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->entry_price); ?> <?php else: ?> — <?php endif; ?>
                </p>
            </div>
        </div>
    </div>

    
    <div class="px-4 py-2.5 bg-surface-overlay/30 border-t border-surface-border flex items-center justify-between">
        <div class="flex items-center gap-2">
            
            <span class="px-2 py-0.5 text-xs font-medium rounded-full <?php echo e($isClosed ? 'bg-surface-overlay text-content-tertiary' : 'bg-info/10 text-info'); ?>">
                <?php echo e(ucfirst($trade->status)); ?>

            </span>
            
            <?php if($trade->result === 'WIN'): ?>
                <span class="px-2 py-0.5 text-xs font-medium rounded-full bg-gain/10 text-gain">WIN</span>
            <?php elseif($trade->result === 'LOSS'): ?>
                <span class="px-2 py-0.5 text-xs font-medium rounded-full bg-loss/10 text-loss">LOSS</span>
            <?php else: ?>
                <span class="px-2 py-0.5 text-xs font-medium rounded-full bg-warning/10 text-warning">PENDING</span>
            <?php endif; ?>
        </div>
        
        <?php echo $__env->make('user.trades.partials.pnl-display', ['value' => $trade->profit_loss, 'size' => 'base'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    
    <div class="px-4 py-2 border-t border-surface-border/50 flex items-center justify-between text-xs text-content-tertiary">
        <span title="<?php echo e(\Carbon\Carbon::parse($trade->created_at)->format('Y-m-d H:i:s')); ?>"><?php echo e(\Carbon\Carbon::parse($trade->created_at)->diffForHumans()); ?></span>
        <?php if($isClosed && $trade->settled_by): ?>
            <span>Settled by <?php echo e(ucfirst($trade->settled_by)); ?></span>
        <?php elseif($isSpot && !$isClosed): ?>
            <?php if($trade->close_requested_at): ?>
                <span class="text-warning font-medium">Close Pending</span>
            <?php else: ?>
                <span class="italic">Open — No expiry</span>
            <?php endif; ?>
        <?php elseif(!$isClosed && $trade->expires_at): ?>
            <span class="countdown-timer text-warning font-medium" data-expiry="<?php echo e(\Carbon\Carbon::parse($trade->expires_at)->timestamp); ?>"></span>
        <?php endif; ?>
    </div>
</a>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\trades\partials\trade-card-mobile.blade.php ENDPATH**/ ?>