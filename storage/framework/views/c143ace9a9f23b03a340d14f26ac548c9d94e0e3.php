
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.danger-alert','data' => []]); ?>
<?php $component->withName('danger-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.success-alert','data' => []]); ?>
<?php $component->withName('success-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, []); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>

    
    <?php echo $__env->make('user.partials.ticker-tape', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.partials.quick-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php
        $asset = $trade->tradingAsset;
        $isBinary = ($trade->trade_type ?? 'binary') === 'binary';
        $isOpen = $trade->status === 'open';
        $isBuy = $trade->action === 'buy';
        $direction = $isBuy ? 1 : -1;
        $currentPrice = $asset ? $asset->price : null;
        $entryPrice = $trade->entry_price;
        $exitPrice = $trade->exit_price;

        // Unrealized P/L for open trades
        $unrealizedPL = null;
        if ($isOpen && $currentPrice && $entryPrice > 0) {
            $priceChange = ($currentPrice - $entryPrice) / $entryPrice;
            $unrealizedPL = round($trade->amount * $priceChange * $direction, 2);
        }

        $displayPrice = $isOpen ? $currentPrice : $exitPrice;
        $displayPL = $isOpen ? $unrealizedPL : $trade->profit_loss;

        // Price movement direction
        $priceUp = null;
        if ($displayPrice && $entryPrice) {
            $priceUp = $isBuy
                ? ($displayPrice >= $entryPrice)
                : ($displayPrice <= $entryPrice);
        }

        // Duration formatting
        if ($isBinary && $trade->duration) {
            if ($trade->duration >= 1440) {
                $durationLabel = ($trade->duration / 1440) . 'd';
            } elseif ($trade->duration >= 60) {
                $durationLabel = ($trade->duration / 60) . 'h';
            } else {
                $durationLabel = $trade->duration . 'm';
            }
        } else {
            $durationLabel = null;
        }
    ?>

    
    <nav aria-label="Breadcrumb" class="mb-4">
        <ol class="flex items-center gap-2 text-sm text-content-tertiary">
            <li><a href="<?php echo e(route('user.trades.history')); ?>" class="hover:text-primary transition-colors">Trade History</a></li>
            <li><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'chevron-right','class' => 'w-3.5 h-3.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'chevron-right','class' => 'w-3.5 h-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?></li>
            <li class="text-content-primary font-medium" aria-current="page">Trade #<?php echo e($trade->id); ?></li>
        </ol>
    </nav>

    
    <div class="bg-surface-raised border border-surface-border rounded-xl p-5 mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <?php if($asset && $asset->logo_url): ?>
                    <img src="<?php echo e($asset->logo_url); ?>" alt="<?php echo e($asset->symbol); ?>" class="w-10 h-10 rounded-full bg-surface-overlay" loading="lazy">
                <?php else: ?>
                    <div class="w-10 h-10 rounded-full bg-surface-overlay flex items-center justify-center text-sm font-bold text-content-secondary">
                        <?php echo e($asset ? strtoupper(substr($asset->symbol ?? $asset->name, 0, 2)) : '?'); ?>

                    </div>
                <?php endif; ?>
                <div>
                    <h1 class="text-lg font-bold text-content-primary">
                        <?php echo e($asset ? $asset->name : ($trade->asset_name ?? 'Unknown Asset')); ?>

                        <?php if($asset && $asset->symbol): ?>
                            <span class="text-content-tertiary font-normal"><?php echo e($asset->symbol); ?></span>
                        <?php endif; ?>
                    </h1>
                    <div class="flex flex-wrap items-center gap-1.5 mt-1">
                        <span class="inline-flex items-center px-2 py-0.5 text-[10px] font-semibold rounded <?php echo e($isBinary ? 'bg-info/10 text-info' : 'bg-primary/10 text-primary'); ?>">
                            <?php echo e(ucfirst($trade->trade_type ?? 'binary')); ?>

                        </span>
                        <?php if($trade->is_demo): ?>
                            <span class="inline-flex items-center px-2 py-0.5 text-[10px] font-semibold rounded bg-warning/10 text-warning">DEMO</span>
                        <?php else: ?>
                            <span class="inline-flex items-center px-2 py-0.5 text-[10px] font-semibold rounded bg-gain/10 text-gain">LIVE</span>
                        <?php endif; ?>
                        <?php if($isOpen): ?>
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 text-[10px] font-semibold rounded bg-info/10 text-info">
                                <span class="w-1.5 h-1.5 rounded-full bg-info animate-pulse" aria-hidden="true"></span>
                                Open
                            </span>
                        <?php else: ?>
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 text-[10px] font-semibold rounded bg-surface-overlay text-content-tertiary">
                                <span class="w-1.5 h-1.5 rounded-full bg-content-tertiary" aria-hidden="true"></span>
                                Closed
                            </span>
                        <?php endif; ?>
                        <?php if(!$isOpen && $trade->result): ?>
                            <?php if($trade->result === 'WIN'): ?>
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 text-[10px] font-semibold rounded bg-gain/10 text-gain">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'arrow-trending-up','class' => 'w-3 h-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'arrow-trending-up','class' => 'w-3 h-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?> WIN
                                </span>
                            <?php elseif($trade->result === 'LOSS'): ?>
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 text-[10px] font-semibold rounded bg-loss/10 text-loss">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'arrow-trending-down','class' => 'w-3 h-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'arrow-trending-down','class' => 'w-3 h-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?> LOSS
                                </span>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            
            <div class="flex items-center gap-2">
                <?php if($isOpen && !$isBinary && !$trade->close_requested_at): ?>
                    <form method="POST" action="<?php echo e(route('trades.requestClose')); ?>" onsubmit="return confirm('Are you sure you want to close this position?')">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="trade_id" value="<?php echo e($trade->id); ?>">
                        <button type="submit" class="bg-loss/10 hover:bg-loss/20 text-loss px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            Request Close
                        </button>
                    </form>
                <?php elseif($isOpen && !$isBinary && $trade->close_requested_at): ?>
                    <span class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium text-warning bg-warning/10 rounded-lg">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'clock','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'clock','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        Close Pending
                    </span>
                <?php endif; ?>
                <a href="<?php echo e(route('trade')); ?>" class="bg-primary hover:bg-primary-dark text-content-inverse px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                    Trade Again
                </a>
            </div>
        </div>
    </div>

    
    <div class="bg-surface-raised border border-surface-border rounded-xl p-6 mb-6">
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-8">
            
            <div class="text-center">
                <span class="text-xs text-content-tertiary uppercase tracking-wider block mb-1">Entry Price</span>
                <span class="text-2xl font-bold text-content-primary">
                    <?php echo e($entryPrice ? \App\Helpers\CurrencyHelper::formatForUser($entryPrice) : '—'); ?>

                </span>
            </div>

            
            <div class="flex flex-col items-center gap-1">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'arrow-long-right','class' => 'w-8 h-8 '.e($priceUp === true ? 'text-gain' : ($priceUp === false ? 'text-loss' : 'text-content-tertiary')).'']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'arrow-long-right','class' => 'w-8 h-8 '.e($priceUp === true ? 'text-gain' : ($priceUp === false ? 'text-loss' : 'text-content-tertiary')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if($displayPL !== null): ?>
                    <span class="text-lg font-bold <?php echo e($displayPL >= 0 ? 'text-gain' : 'text-loss'); ?>" aria-label="Profit or loss: <?php echo e(\App\Helpers\CurrencyHelper::formatForUser($displayPL)); ?>">
                        <?php echo \App\Helpers\CurrencyHelper::formatForUser($displayPL); ?>
                    </span>
                    <?php if($isOpen): ?>
                        <span class="text-[10px] text-content-tertiary">(Unrealized)</span>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            
            <div class="text-center">
                <span class="text-xs text-content-tertiary uppercase tracking-wider block mb-1" aria-live="<?php echo e($isOpen ? 'polite' : 'off'); ?>">
                    <?php echo e($isOpen ? 'Current Price' : 'Exit Price'); ?>

                </span>
                <span class="text-2xl font-bold <?php echo e($priceUp === true ? 'text-gain' : ($priceUp === false ? 'text-loss' : 'text-content-primary')); ?>">
                    <?php echo e($displayPrice ? \App\Helpers\CurrencyHelper::formatForUser($displayPrice) : '—'); ?>

                </span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        
        <div class="lg:col-span-2 bg-surface-raised border border-surface-border rounded-xl p-5">
            <h2 class="text-sm font-semibold text-content-primary mb-4">Trade Parameters</h2>
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
                
                <div class="bg-surface-overlay rounded-lg p-3">
                    <span class="text-[10px] text-content-tertiary uppercase tracking-wider block mb-1">Direction</span>
                    <span class="inline-flex items-center gap-1.5 text-sm font-semibold uppercase <?php echo e($isBuy ? 'text-gain' : 'text-loss'); ?>">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => ''.e($isBuy ? 'arrow-trending-up' : 'arrow-trending-down').'','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => ''.e($isBuy ? 'arrow-trending-up' : 'arrow-trending-down').'','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php echo e($trade->action); ?>

                    </span>
                </div>
                
                <div class="bg-surface-overlay rounded-lg p-3">
                    <span class="text-[10px] text-content-tertiary uppercase tracking-wider block mb-1">Amount</span>
                    <span class="text-sm font-semibold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->amount); ?></span>
                </div>
                
                <div class="bg-surface-overlay rounded-lg p-3">
                    <span class="text-[10px] text-content-tertiary uppercase tracking-wider block mb-1">Leverage</span>
                    <span class="text-sm font-semibold text-content-primary"><?php echo e($trade->leverage); ?>x</span>
                </div>
                
                <div class="bg-surface-overlay rounded-lg p-3">
                    <span class="text-[10px] text-content-tertiary uppercase tracking-wider block mb-1">
                        <?php echo e($isBinary ? 'Duration' : 'Time Open'); ?>

                    </span>
                    <span class="text-sm font-semibold text-content-primary">
                        <?php if($isBinary && $durationLabel): ?>
                            <?php echo e($durationLabel); ?>

                        <?php elseif(!$isBinary): ?>
                            <?php echo e(\Carbon\Carbon::parse($trade->created_at)->diffForHumans(null, true)); ?>

                        <?php else: ?>
                            —
                        <?php endif; ?>
                    </span>
                </div>
                
                <div class="bg-surface-overlay rounded-lg p-3">
                    <span class="text-[10px] text-content-tertiary uppercase tracking-wider block mb-1">
                        <?php echo e($isOpen ? 'Unrealized P/L' : 'Realized P/L'); ?>

                    </span>
                    <?php echo $__env->make('user.trades.partials.pnl-display', ['value' => $displayPL], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                
                <?php if($trade->take_profit || $trade->stop_loss): ?>
                    <div class="bg-surface-overlay rounded-lg p-3">
                        <span class="text-[10px] text-content-tertiary uppercase tracking-wider block mb-1">TP / SL</span>
                        <span class="text-sm text-content-primary">
                            <span class="text-gain"><?php echo e($trade->take_profit ? \App\Helpers\CurrencyHelper::formatForUser($trade->take_profit) : '—'); ?></span>
                            /
                            <span class="text-loss"><?php echo e($trade->stop_loss ? \App\Helpers\CurrencyHelper::formatForUser($trade->stop_loss) : '—'); ?></span>
                        </span>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="bg-surface-raised border border-surface-border rounded-xl p-5">
            <h2 class="text-sm font-semibold text-content-primary mb-4">Timeline</h2>
            <div class="relative" role="list" aria-label="Trade timeline">
                <?php
                    $steps = [];
                    $steps[] = [
                        'label' => 'Trade Opened',
                        'time' => $trade->created_at,
                        'done' => true,
                    ];
                    if ($isBinary && $trade->expires_at) {
                        $expired = \Carbon\Carbon::parse($trade->expires_at)->isPast();
                        $steps[] = [
                            'label' => $expired ? 'Expired' : 'Expires At',
                            'time' => $trade->expires_at,
                            'done' => $expired,
                            'countdown' => !$expired && $isOpen,
                        ];
                    }
                    if (!$isBinary && $trade->close_requested_at) {
                        $steps[] = [
                            'label' => 'Close Requested',
                            'time' => $trade->close_requested_at,
                            'done' => true,
                        ];
                    } elseif (!$isBinary && $isOpen) {
                        $steps[] = [
                            'label' => 'Close Request',
                            'time' => null,
                            'done' => false,
                        ];
                    }
                    if (!$isOpen) {
                        $steps[] = [
                            'label' => 'Trade Settled',
                            'time' => $trade->settled_at ?? $trade->updated_at,
                            'done' => true,
                            'extra' => $trade->settled_by ? 'by ' . ucfirst($trade->settled_by) : null,
                        ];
                    } else {
                        $steps[] = [
                            'label' => 'Settlement',
                            'time' => null,
                            'done' => false,
                        ];
                    }
                ?>

                <?php $__currentLoopData = $steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex gap-3 <?php echo e(!$loop->last ? 'pb-5' : ''); ?>" role="listitem">
                        
                        <div class="flex flex-col items-center">
                            <div class="w-3 h-3 rounded-full mt-0.5 flex-shrink-0 <?php echo e($step['done'] ? 'bg-primary' : 'bg-surface-overlay border-2 border-surface-border'); ?>" aria-hidden="true"></div>
                            <?php if(!$loop->last): ?>
                                <div class="w-0.5 flex-1 mt-1 <?php echo e($step['done'] ? 'bg-primary/30' : 'bg-surface-border'); ?>" aria-hidden="true"></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="flex-1 min-w-0 pb-1">
                            <p class="text-sm font-medium <?php echo e($step['done'] ? 'text-content-primary' : 'text-content-tertiary'); ?>">
                                <?php echo e($step['label']); ?>

                            </p>
                            <?php if($step['time']): ?>
                                <p class="text-xs text-content-tertiary mt-0.5" title="<?php echo e(\Carbon\Carbon::parse($step['time'])->format('Y-m-d H:i:s')); ?>">
                                    <?php echo e(\Carbon\Carbon::parse($step['time'])->format('M d, Y H:i')); ?>

                                    <span class="text-content-tertiary">&middot; <?php echo e(\Carbon\Carbon::parse($step['time'])->diffForHumans()); ?></span>
                                </p>
                                <?php if(!empty($step['countdown'])): ?>
                                    <p class="text-xs text-warning font-medium mt-0.5 countdown-timer" data-expiry="<?php echo e(\Carbon\Carbon::parse($step['time'])->timestamp); ?>" aria-live="polite"></p>
                                <?php endif; ?>
                            <?php elseif(!$step['done']): ?>
                                <p class="text-xs text-content-tertiary italic mt-0.5">Pending</p>
                            <?php endif; ?>
                            <?php if(!empty($step['extra'])): ?>
                                <p class="text-[10px] text-content-tertiary mt-0.5"><?php echo e($step['extra']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    
    <?php if($asset && $asset->symbol): ?>
        <div class="bg-surface-raised border border-surface-border rounded-xl overflow-hidden mb-6">
            <div class="px-5 py-3 border-b border-surface-border">
                <h2 class="text-sm font-semibold text-content-primary">Price Chart</h2>
            </div>
            <div class="tradingview-widget-container" style="height:350px;">
                <div id="tradingview_chart" style="height:100%;"></div>
            </div>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    // Countdown timer for binary trades
    document.querySelectorAll('.countdown-timer').forEach(function(el) {
        const expiry = parseInt(el.dataset.expiry);
        function tick() {
            const now = Math.floor(Date.now() / 1000);
            const diff = expiry - now;
            if (diff <= 0) {
                el.textContent = 'Expired';
                return;
            }
            const h = Math.floor(diff / 3600);
            const m = Math.floor((diff % 3600) / 60);
            const s = diff % 60;
            el.textContent = (h > 0 ? h + ':' : '') + String(m).padStart(2, '0') + ':' + String(s).padStart(2, '0');
            if (diff <= 60) el.classList.add('animate-pulse');
            requestAnimationFrame(tick);
        }
        tick();
    });

    <?php if($asset && $asset->symbol): ?>
    // TradingView widget
    (function() {
        const script = document.createElement('script');
        script.src = 'https://s3.tradingview.com/tv.js';
        script.onload = function() {
            new TradingView.widget({
                "autosize": true,
                "symbol": "<?php echo e($asset->symbol); ?>",
                "interval": "15",
                "timezone": "Etc/UTC",
                "theme": "dark",
                "style": "1",
                "locale": "en",
                "toolbar_bg": "#0F1115",
                "enable_publishing": false,
                "hide_side_toolbar": true,
                "allow_symbol_change": false,
                "container_id": "tradingview_chart",
                "backgroundColor": "#0F1115",
                "gridColor": "rgba(255,255,255,0.04)"
            });
        };
        document.head.appendChild(script);
    })();
    <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\trades\show.blade.php ENDPATH**/ ?>