
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

    
    <?php echo $__env->make('user.partials.ticker-tape', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="mb-4">
        <a href="<?php echo e(route('user.stocks.index')); ?>" class="inline-flex items-center gap-1 text-sm text-content-tertiary hover:text-content-primary transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
            Back to Stocks
        </a>
    </div>

    
    <div class="bg-surface-raised border border-surface-border rounded-xl p-6 mb-6">
        <div class="flex items-center gap-4 mb-4">
            <?php if($asset->logo_url): ?>
                <img src="<?php echo e($asset->logo_url); ?>" alt="<?php echo e($asset->symbol); ?>" class="w-14 h-14 rounded-full object-cover bg-surface-overlay">
            <?php else: ?>
                <div class="w-14 h-14 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-lg">
                    <?php echo e(substr($asset->symbol, 0, 2)); ?>

                </div>
            <?php endif; ?>
            <div>
                <h1 class="text-xl font-bold text-content-primary"><?php echo e($asset->name); ?></h1>
                <p class="text-sm text-content-tertiary"><?php echo e($asset->symbol); ?></p>
            </div>
        </div>
        <div class="flex items-end gap-3">
            <span class="text-3xl font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($asset->price); ?></span>
            <?php if($asset->price_change_pct_24h): ?>
                <span class="text-sm font-medium px-2 py-0.5 rounded <?php echo e($asset->price_change_pct_24h >= 0 ? 'bg-gain/10 text-gain' : 'bg-loss/10 text-loss'); ?>">
                    <?php echo e($asset->price_change_pct_24h >= 0 ? '+' : ''); ?><?php echo e(number_format($asset->price_change_pct_24h, 2)); ?>%
                    <?php if($asset->price_change_24h): ?>
                        (<?php echo \App\Helpers\CurrencyHelper::formatForUser(abs($asset->price_change_24h)); ?>)
                    <?php endif; ?>
                </span>
            <?php endif; ?>
        </div>
        <?php if($asset->high_24h || $asset->low_24h || $asset->volume_24h): ?>
        <div class="flex items-center gap-6 mt-3 text-xs text-content-tertiary">
            <?php if($asset->high_24h): ?> <span>High: <?php echo \App\Helpers\CurrencyHelper::formatForUser($asset->high_24h); ?></span> <?php endif; ?>
            <?php if($asset->low_24h): ?> <span>Low: <?php echo \App\Helpers\CurrencyHelper::formatForUser($asset->low_24h); ?></span> <?php endif; ?>
            <?php if($asset->volume_24h): ?> <span>Vol: <?php echo e(number_format($asset->volume_24h)); ?></span> <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2">
            <div x-data="{ tab: 'buy', buyAmount: '', sellShares: '' }" class="bg-surface-raised border border-surface-border rounded-xl p-6">
                
                <div class="flex gap-1 mb-6 bg-surface-overlay rounded-lg p-1">
                    <button @click="tab = 'buy'" :class="tab === 'buy' ? 'bg-gain text-white' : 'text-content-secondary hover:text-content-primary'"
                            class="flex-1 py-2 text-sm font-medium rounded-md transition-colors">Buy</button>
                    <button @click="tab = 'sell'" :class="tab === 'sell' ? 'bg-loss text-white' : 'text-content-secondary hover:text-content-primary'"
                            class="flex-1 py-2 text-sm font-medium rounded-md transition-colors">Sell</button>
                </div>

                
                <div x-show="tab === 'buy'" x-cloak>
                    <form action="<?php echo e(route('user.stocks.buy')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="trading_asset_id" value="<?php echo e($asset->id); ?>">

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-content-secondary mb-1.5">Amount (<?php echo \App\Helpers\CurrencyHelper::getUserCode(); ?>)</label>
                            <input type="number" name="amount" x-model="buyAmount" step="0.01" min="1" required
                                   class="w-full bg-surface-overlay border border-surface-border rounded-lg px-3 py-2.5 text-sm text-content-primary focus:outline-none focus:ring-2 focus:ring-primary"
                                   placeholder="Enter dollar amount..." />
                        </div>

                        <div class="bg-surface-overlay rounded-lg p-4 mb-4">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-content-tertiary">You will receive</span>
                                <span class="text-content-primary font-medium" x-text="buyAmount > 0 ? (buyAmount / <?php echo e($asset->price); ?>).toFixed(6) + ' shares' : '—'"></span>
                            </div>
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-content-tertiary">Price per share</span>
                                <span class="text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($asset->price); ?></span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-content-tertiary">Available balance</span>
                                <span class="text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser(Auth::user()->account_bal - (Auth::user()->frozen_bal ?? 0)); ?></span>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-gain hover:bg-gain/90 text-white rounded-lg py-2.5 text-sm font-medium transition-colors">
                            Buy <?php echo e($asset->symbol); ?>

                        </button>
                    </form>
                </div>

                
                <div x-show="tab === 'sell'" x-cloak>
                    <?php if($position && $position->shares > 0): ?>
                        <form action="<?php echo e(route('user.stocks.sell')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="trading_asset_id" value="<?php echo e($asset->id); ?>">

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-content-secondary mb-1.5">Shares to sell</label>
                                <div class="relative">
                                    <input type="number" name="shares" x-model="sellShares" step="0.00000001" min="0.00000001" max="<?php echo e($position->shares); ?>" required
                                           class="w-full bg-surface-overlay border border-surface-border rounded-lg px-3 py-2.5 text-sm text-content-primary focus:outline-none focus:ring-2 focus:ring-primary pr-16"
                                           placeholder="Enter shares..." />
                                    <button type="button" @click="sellShares = <?php echo e($position->shares); ?>"
                                            class="absolute right-2 top-1/2 -translate-y-1/2 text-xs font-medium text-primary hover:text-primary-dark px-2 py-1">MAX</button>
                                </div>
                                <p class="text-xs text-content-tertiary mt-1">Available: <?php echo e(number_format($position->shares, 6)); ?> shares</p>
                            </div>

                            <div class="bg-surface-overlay rounded-lg p-4 mb-4">
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="text-content-tertiary">You will receive</span>
                                    <span class="text-content-primary font-medium" x-text="sellShares > 0 ? '<?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?>' + (sellShares * <?php echo e(Auth::user()->convertToUserCurrency($asset->price)); ?>).toFixed(2) : '—'"></span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-content-tertiary">Current price</span>
                                    <span class="text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($asset->price); ?></span>
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-loss hover:bg-loss/90 text-white rounded-lg py-2.5 text-sm font-medium transition-colors">
                                Sell <?php echo e($asset->symbol); ?>

                            </button>
                        </form>
                    <?php else: ?>
                        <div class="text-center py-8">
                            <p class="text-content-tertiary text-sm">You don't hold any shares of <?php echo e($asset->symbol); ?>.</p>
                            <p class="text-content-tertiary text-xs mt-1">Buy some shares first to start selling.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        
        <div>
            <?php if($position && $position->shares > 0): ?>
                <div class="bg-surface-raised border border-surface-border rounded-xl p-5 mb-6">
                    <h3 class="text-sm font-semibold text-content-primary mb-4">Your Position</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-content-tertiary">Shares</span>
                            <span class="text-content-primary font-medium"><?php echo e(number_format($position->shares, 6)); ?></span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-content-tertiary">Avg Cost</span>
                            <span class="text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($position->avg_buy_price); ?></span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-content-tertiary">Total Invested</span>
                            <span class="text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($position->total_invested); ?></span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-content-tertiary">Market Value</span>
                            <span class="text-content-primary font-medium"><?php echo \App\Helpers\CurrencyHelper::formatForUser($position->current_value); ?></span>
                        </div>
                        <div class="border-t border-surface-border pt-3 flex justify-between text-sm">
                            <span class="text-content-tertiary">Unrealized P/L</span>
                            <span class="font-semibold <?php echo e($position->unrealized_pnl >= 0 ? 'text-gain' : 'text-loss'); ?>">
                                <?php echo e($position->unrealized_pnl >= 0 ? '+' : '-'); ?><?php echo \App\Helpers\CurrencyHelper::formatForUser(abs($position->unrealized_pnl)); ?>
                                (<?php echo e($position->unrealized_pnl_percent >= 0 ? '+' : ''); ?><?php echo e(number_format($position->unrealized_pnl_percent, 2)); ?>%)
                            </span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            
            <?php if($recentTrades->count() > 0): ?>
                <div class="bg-surface-raised border border-surface-border rounded-xl p-5">
                    <h3 class="text-sm font-semibold text-content-primary mb-4">Recent Trades</h3>
                    <div class="space-y-2">
                        <?php $__currentLoopData = $recentTrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-center justify-between text-xs py-2 border-b border-surface-border last:border-0">
                                <div class="flex items-center gap-2">
                                    <span class="px-1.5 py-0.5 rounded font-medium <?php echo e($trade->type === 'buy' ? 'bg-gain/10 text-gain' : 'bg-loss/10 text-loss'); ?>">
                                        <?php echo e(strtoupper($trade->type)); ?>

                                    </span>
                                    <span class="text-content-secondary"><?php echo e(number_format($trade->shares, 4)); ?> @ <?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->price_per_share); ?></span>
                                </div>
                                <span class="text-content-tertiary"><?php echo e($trade->created_at->format('M d')); ?></span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\stocks\show.blade.php ENDPATH**/ ?>