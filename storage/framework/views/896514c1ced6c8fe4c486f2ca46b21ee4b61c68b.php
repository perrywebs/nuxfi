
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

    <?php echo $__env->make('user.partials.page-header', ['title' => $company->name, 'subtitle' => $company->symbol . ' — ' . ($company->sector ?? 'Pre-IPO')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        
        <div class="lg:col-span-2 space-y-5">

            
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                <?php echo $__env->make('user.partials.stat-card', ['label' => 'Share Price', 'value' => \App\Helpers\CurrencyHelper::formatForUser($company->share_price), 'icon' => 'banknotes'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('user.partials.stat-card', ['label' => 'Initial Price', 'value' => \App\Helpers\CurrencyHelper::formatForUser($company->initial_price), 'icon' => 'clock'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('user.partials.stat-card', ['label' => 'Change', 'value' => ($company->price_change_percent >= 0 ? '+' : '') . $company->price_change_percent . '%', 'icon' => 'chart-bar'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('user.partials.stat-card', ['label' => 'Available', 'value' => number_format($company->shares_remaining), 'icon' => 'chart-pie'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            
            <?php if($company->description): ?>
                <div class="bg-surface-raised border border-surface-border rounded-xl p-5">
                    <h3 class="text-sm font-semibold text-content-primary mb-2">About <?php echo e($company->name); ?></h3>
                    <p class="text-sm text-content-secondary leading-relaxed"><?php echo e($company->description); ?></p>
                </div>
            <?php endif; ?>

            
            <?php if($priceHistory->count() > 1): ?>
                <div class="bg-surface-raised border border-surface-border rounded-xl p-5">
                    <h3 class="text-sm font-semibold text-content-primary mb-3">Price History</h3>
                    <div style="height: 250px;">
                        <canvas id="priceChart"></canvas>
                    </div>
                </div>
            <?php endif; ?>

            
            <div class="bg-surface-raised border border-surface-border rounded-xl p-5">
                <h3 class="text-sm font-semibold text-content-primary mb-3">Details</h3>
                <div class="grid grid-cols-2 gap-3 text-sm">
                    <div>
                        <p class="text-content-tertiary text-xs">Sector</p>
                        <p class="text-content-primary"><?php echo e($company->sector ?? '—'); ?></p>
                    </div>
                    <div>
                        <p class="text-content-tertiary text-xs">Total Shares</p>
                        <p class="text-content-primary"><?php echo e(number_format($company->total_shares)); ?></p>
                    </div>
                    <div>
                        <p class="text-content-tertiary text-xs">Shares Sold</p>
                        <p class="text-content-primary"><?php echo e(number_format($company->shares_sold)); ?></p>
                    </div>
                    <div>
                        <p class="text-content-tertiary text-xs">Min Purchase</p>
                        <p class="text-content-primary"><?php echo e($company->min_shares); ?> share<?php echo e($company->min_shares > 1 ? 's' : ''); ?></p>
                    </div>
                    <?php if($company->max_shares_per_user): ?>
                        <div>
                            <p class="text-content-tertiary text-xs">Max Per User</p>
                            <p class="text-content-primary"><?php echo e(number_format($company->max_shares_per_user)); ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if($company->expected_ipo_date): ?>
                        <div>
                            <p class="text-content-tertiary text-xs">Expected IPO</p>
                            <p class="text-content-primary"><?php echo e($company->expected_ipo_date->format('M d, Y')); ?></p>
                        </div>
                    <?php endif; ?>
                    <div>
                        <p class="text-content-tertiary text-xs">Status</p>
                        <?php
                            $statusColors = [
                                'upcoming' => 'bg-info/10 text-info',
                                'open' => 'bg-gain/10 text-gain',
                                'closed' => 'bg-warning/10 text-warning',
                                'ipo' => 'bg-primary/10 text-primary',
                                'public' => 'bg-gain/10 text-gain',
                            ];
                        ?>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium <?php echo e($statusColors[$company->status]); ?>">
                            <?php echo e(ucfirst($company->status)); ?>

                        </span>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="space-y-5">

            
            <?php if($company->status === 'open'): ?>
                <div class="bg-surface-raised border border-surface-border rounded-xl p-5" x-data="{ qty: <?php echo e($company->min_shares); ?>, price: <?php echo e(Auth::user()->convertToUserCurrency($company->share_price)); ?> }">
                    <h3 class="text-sm font-semibold text-content-primary mb-3">Buy Shares</h3>
                    <form action="<?php echo e(route('user.pre-ipo.buy', $company->id)); ?>" method="POST" class="space-y-4">
                        <?php echo csrf_field(); ?>
                        <div>
                            <label class="text-xs text-content-tertiary block mb-1">Quantity</label>
                            <input type="number" name="quantity" x-model.number="qty" min="<?php echo e($company->min_shares); ?>" max="<?php echo e($company->max_shares_per_user ?? $company->shares_remaining); ?>" required
                                   class="w-full bg-surface-overlay border border-surface-border rounded-lg px-3 py-2.5 text-sm text-content-primary focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                        <div class="flex items-center justify-between py-2 border-t border-surface-border">
                            <span class="text-xs text-content-tertiary">Price per Share</span>
                            <span class="text-sm font-medium text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($company->share_price); ?></span>
                        </div>
                        <div class="flex items-center justify-between pb-2">
                            <span class="text-xs text-content-tertiary">Total Cost</span>
                            <span class="text-sm font-bold text-primary" x-text="'<?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?>' + (qty * price).toFixed(2)"></span>
                        </div>
                        <div class="text-xs text-content-tertiary">
                            Available Balance: <span class="text-content-primary font-medium"><?php echo \App\Helpers\CurrencyHelper::formatForUser(Auth::user()->available_bal); ?></span>
                        </div>
                        <button type="submit"
                                class="w-full bg-primary hover:bg-primary-dark text-content-inverse rounded-lg py-2.5 text-sm font-medium transition-colors">
                            Buy Shares
                        </button>
                    </form>
                </div>
            <?php elseif($company->status === 'upcoming'): ?>
                <div class="bg-surface-raised border border-surface-border rounded-xl p-5 text-center">
                    <div class="text-info mb-2">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'clock','class' => 'w-8 h-8 mx-auto']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'clock','class' => 'w-8 h-8 mx-auto']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                    <p class="text-sm text-content-primary font-medium">Coming Soon</p>
                    <p class="text-xs text-content-tertiary mt-1">This offering is not yet open for purchases.</p>
                </div>
            <?php elseif($company->status === 'closed'): ?>
                <div class="bg-surface-raised border border-surface-border rounded-xl p-5 text-center">
                    <p class="text-sm text-warning font-medium">Pre-IPO Round Closed</p>
                    <p class="text-xs text-content-tertiary mt-1">This offering is no longer accepting new investments.</p>
                </div>
            <?php elseif(in_array($company->status, ['ipo', 'public'])): ?>
                <div class="bg-surface-raised border border-surface-border rounded-xl p-5 text-center">
                    <p class="text-sm text-gain font-medium">
                        <?php echo e($company->status === 'ipo' ? 'Going Public' : 'Now Public'); ?>

                    </p>
                    <p class="text-xs text-content-tertiary mt-1">
                        <?php echo e($company->status === 'ipo' ? 'This company is transitioning to public markets.' : 'This company is now publicly traded.'); ?>

                    </p>
                </div>
            <?php endif; ?>

            
            <?php if($holding): ?>
                <div class="bg-surface-raised border border-surface-border rounded-xl p-5">
                    <h3 class="text-sm font-semibold text-content-primary mb-3">My Position</h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-content-tertiary">Shares Held</span>
                            <span class="text-content-primary font-medium"><?php echo e(number_format($holding->shares)); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-content-tertiary">Avg Cost</span>
                            <span class="text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($holding->purchase_price); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-content-tertiary">Total Invested</span>
                            <span class="text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($holding->total_cost); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-content-tertiary">Current Value</span>
                            <span class="text-content-primary font-medium"><?php echo \App\Helpers\CurrencyHelper::formatForUser($holding->current_value); ?></span>
                        </div>
                        <div class="flex justify-between border-t border-surface-border pt-2">
                            <span class="text-content-tertiary">Unrealized P/L</span>
                            <span class="font-medium <?php echo e($holding->unrealized_pnl >= 0 ? 'text-gain' : 'text-loss'); ?>">
                                <?php echo e($holding->unrealized_pnl >= 0 ? '+' : ''); ?><?php echo \App\Helpers\CurrencyHelper::formatForUser($holding->unrealized_pnl); ?>
                                (<?php echo e($holding->unrealized_pnl_percent >= 0 ? '+' : ''); ?><?php echo e($holding->unrealized_pnl_percent); ?>%)
                            </span>
                        </div>
                    </div>

                    
                    <?php if($company->status === 'public'): ?>
                        <div class="mt-4 pt-4 border-t border-surface-border" x-data="{ sellQty: 1, currentPrice: <?php echo e(Auth::user()->convertToUserCurrency($company->current_price)); ?> }">
                            <form action="<?php echo e(route('user.pre-ipo.sell', $holding->id)); ?>" method="POST" class="space-y-3">
                                <?php echo csrf_field(); ?>
                                <div>
                                    <label class="text-xs text-content-tertiary block mb-1">Sell Quantity</label>
                                    <input type="number" name="quantity" x-model.number="sellQty" min="1" max="<?php echo e($holding->shares); ?>" required
                                           class="w-full bg-surface-overlay border border-surface-border rounded-lg px-3 py-2.5 text-sm text-content-primary focus:outline-none focus:ring-2 focus:ring-primary">
                                </div>
                                <div class="flex items-center justify-between text-xs">
                                    <span class="text-content-tertiary">Proceeds</span>
                                    <span class="text-gain font-medium" x-text="'<?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?>' + (sellQty * currentPrice).toFixed(2)"></span>
                                </div>
                                <button type="submit"
                                        class="w-full bg-loss/10 text-loss border border-loss/20 hover:bg-loss/20 rounded-lg py-2.5 text-sm font-medium transition-colors">
                                    Sell Shares
                                </button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <a href="<?php echo e(route('user.pre-ipo.index')); ?>"
               class="block text-center text-sm text-content-secondary hover:text-primary transition-colors">
                ← Back to Listings
            </a>
        </div>

    </div>

    
    <?php if($priceHistory->count() > 1): ?>
    <?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4"></script>
    <script>
        new Chart(document.getElementById('priceChart'), {
            type: 'line',
            data: {
                labels: <?php echo json_encode($priceHistory->pluck('created_at')->map(fn($d) => $d->format('M d'))); ?>,
                datasets: [{
                    label: 'Price ($)',
                    data: <?php echo json_encode($priceHistory->pluck('price')); ?>,
                    borderColor: '#059669',
                    backgroundColor: 'rgba(5, 150, 105, 0.1)',
                    fill: true,
                    tension: 0.3,
                    pointRadius: 3,
                    pointBackgroundColor: '#059669',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: false,
                        grid: { color: 'rgba(255,255,255,0.05)' },
                        ticks: { color: 'rgba(255,255,255,0.5)', callback: v => '<?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?>' + v }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: 'rgba(255,255,255,0.5)' }
                    }
                }
            }
        });
    </script>
    <?php $__env->stopPush(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\pre-ipo\show.blade.php ENDPATH**/ ?>