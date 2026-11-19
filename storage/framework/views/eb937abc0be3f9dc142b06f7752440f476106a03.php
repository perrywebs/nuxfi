
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

    <?php echo $__env->make('user.partials.page-header', ['title' => 'Trade Analytics', 'subtitle' => 'Performance breakdown and insights across your trading history'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-6">
        <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Total Trades', 'value' => $totalCount, 'icon' => 'chart-bar'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Win Rate', 'value' => $winRate . '%', 'icon' => 'trophy', 'color' => 'gain'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Total Profit', 'value' => \App\Helpers\CurrencyHelper::formatForUser($totalProfit), 'icon' => 'arrow-trending-up', 'color' => 'gain'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Total Loss', 'value' => \App\Helpers\CurrencyHelper::formatForUser(-$totalLoss), 'icon' => 'arrow-trending-down', 'color' => 'loss'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-6">
        <?php echo $__env->make('user.partials.stat-card-compact', [
            'label' => 'Net P/L',
            'value' => \App\Helpers\CurrencyHelper::formatForUser($netPL),
            'icon' => 'banknotes',
            'color' => $netPL >= 0 ? 'gain' : 'loss',
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Avg Trade Size', 'value' => \App\Helpers\CurrencyHelper::formatForUser($avgTradeSize), 'icon' => 'calculator'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card-compact', [
            'label' => 'Best Trade',
            'value' => $bestTrade ? \App\Helpers\CurrencyHelper::formatForUser($bestTrade->profit_loss) : '—',
            'icon' => 'trophy',
            'color' => 'gain',
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card-compact', [
            'label' => 'Worst Trade',
            'value' => $worstTrade ? \App\Helpers\CurrencyHelper::formatForUser($worstTrade->profit_loss) : '—',
            'icon' => 'exclamation-triangle',
            'color' => 'loss',
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    
    <?php if(count($timelineData) > 1): ?>
        <div class="bg-surface-raised border border-surface-border rounded-xl p-5 mb-6">
            <h2 class="text-sm font-semibold text-content-primary mb-4">Cumulative P/L Over Time</h2>
            <div style="height: 250px;" aria-label="Profit and loss chart over time">
                <canvas id="plChart"></canvas>
            </div>
            
            <details class="mt-2">
                <summary class="text-xs text-content-tertiary cursor-pointer hover:text-content-secondary">View data table</summary>
                <table class="w-full text-xs mt-2 sr-only focus-within:not-sr-only">
                    <thead>
                        <tr><th class="text-left">Date</th><th class="text-right">Cumulative P/L</th></tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $timelineData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($dp['date']); ?></td>
                                <td class="text-right"><?php echo \App\Helpers\CurrencyHelper::formatForUser($dp['cumulative_pl']); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </details>
        </div>
    <?php endif; ?>

    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        
        <div class="bg-surface-raised border border-surface-border rounded-xl p-5">
            <h2 class="text-sm font-semibold text-content-primary mb-4">By Trade Type</h2>
            <div class="grid grid-cols-2 gap-4">
                <?php $__currentLoopData = ['binary' => 'Binary', 'spot' => 'Spot']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $data = $byType[$type]; ?>
                    <div class="bg-surface-overlay rounded-lg p-4">
                        <div class="flex items-center gap-2 mb-3">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => ''.e($type === 'binary' ? 'bolt' : 'chart-bar').'','class' => 'w-5 h-5 '.e($type === 'binary' ? 'text-info' : 'text-primary').'']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => ''.e($type === 'binary' ? 'bolt' : 'chart-bar').'','class' => 'w-5 h-5 '.e($type === 'binary' ? 'text-info' : 'text-primary').'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <span class="text-sm font-semibold text-content-primary"><?php echo e($label); ?></span>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-content-tertiary">Trades</span>
                                <span class="text-sm font-medium text-content-primary"><?php echo e($data['count']); ?></span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-content-tertiary">Win Rate</span>
                                <span class="text-sm font-medium <?php echo e($data['win_rate'] >= 50 ? 'text-gain' : 'text-loss'); ?>"><?php echo e($data['win_rate']); ?>%</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-content-tertiary">P/L</span>
                                <?php echo $__env->make('user.trades.partials.pnl-display', ['value' => $data['pl'], 'size' => 'sm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            
                            <div class="h-1.5 rounded-full bg-surface-base overflow-hidden">
                                <div class="h-full rounded-full <?php echo e($data['win_rate'] >= 50 ? 'bg-gain' : 'bg-loss'); ?>" style="width: <?php echo e($data['win_rate']); ?>%"></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        
        <div class="bg-surface-raised border border-surface-border rounded-xl p-5">
            <h2 class="text-sm font-semibold text-content-primary mb-4">By Direction</h2>
            <div class="grid grid-cols-2 gap-4">
                <?php $__currentLoopData = ['buy' => 'Buy (Long)', 'sell' => 'Sell (Short)']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dir => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $data = $byDirection[$dir]; ?>
                    <div class="bg-surface-overlay rounded-lg p-4">
                        <div class="flex items-center gap-2 mb-3">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => ''.e($dir === 'buy' ? 'arrow-trending-up' : 'arrow-trending-down').'','class' => 'w-5 h-5 '.e($dir === 'buy' ? 'text-gain' : 'text-loss').'']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => ''.e($dir === 'buy' ? 'arrow-trending-up' : 'arrow-trending-down').'','class' => 'w-5 h-5 '.e($dir === 'buy' ? 'text-gain' : 'text-loss').'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <span class="text-sm font-semibold text-content-primary"><?php echo e($label); ?></span>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-content-tertiary">Trades</span>
                                <span class="text-sm font-medium text-content-primary"><?php echo e($data['count']); ?></span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-content-tertiary">Win Rate</span>
                                <span class="text-sm font-medium <?php echo e($data['win_rate'] >= 50 ? 'text-gain' : 'text-loss'); ?>"><?php echo e($data['win_rate']); ?>%</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-content-tertiary">P/L</span>
                                <?php echo $__env->make('user.trades.partials.pnl-display', ['value' => $data['pl'], 'size' => 'sm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="h-1.5 rounded-full bg-surface-base overflow-hidden">
                                <div class="h-full rounded-full <?php echo e($data['win_rate'] >= 50 ? 'bg-gain' : 'bg-loss'); ?>" style="width: <?php echo e($data['win_rate']); ?>%"></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    
    <div class="bg-surface-raised border border-surface-border rounded-xl p-5 mb-6">
        <h2 class="text-sm font-semibold text-content-primary mb-4">By Asset Class</h2>
        <?php if($byClass->count() > 0): ?>
            <div class="overflow-x-auto">
                <table class="w-full text-sm" role="table">
                    <caption class="sr-only">Trading performance broken down by asset class</caption>
                    <thead>
                        <tr class="border-b border-surface-border">
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Class</th>
                            <th scope="col" class="px-4 py-2 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">Trades</th>
                            <th scope="col" class="px-4 py-2 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">Win Rate</th>
                            <th scope="col" class="px-4 py-2 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">P/L</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-border">
                        <?php $__currentLoopData = $byClass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-surface-overlay/50 transition-colors">
                                <td class="px-4 py-2.5">
                                    <span class="text-sm font-medium text-content-primary capitalize"><?php echo e($class); ?></span>
                                </td>
                                <td class="px-4 py-2.5 text-right text-content-secondary"><?php echo e($data['count']); ?></td>
                                <td class="px-4 py-2.5 text-right">
                                    <span class="inline-flex items-center gap-1.5">
                                        <span class="text-sm font-medium <?php echo e($data['win_rate'] >= 50 ? 'text-gain' : 'text-loss'); ?>"><?php echo e($data['win_rate']); ?>%</span>
                                        <span class="inline-block w-12 h-1.5 rounded-full bg-surface-overlay overflow-hidden">
                                            <span class="block h-full rounded-full <?php echo e($data['win_rate'] >= 50 ? 'bg-gain' : 'bg-loss'); ?>" style="width: <?php echo e($data['win_rate']); ?>%"></span>
                                        </span>
                                    </span>
                                </td>
                                <td class="px-4 py-2.5 text-right">
                                    <?php echo $__env->make('user.trades.partials.pnl-display', ['value' => $data['pl'], 'size' => 'sm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-xs text-content-tertiary text-center py-4">No closed trades to analyze</p>
        <?php endif; ?>
    </div>

    
    <div class="bg-surface-raised border border-surface-border rounded-xl p-5 mb-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-sm font-semibold text-content-primary">Recent Trades</h2>
            <a href="<?php echo e(route('user.trades.history')); ?>" class="text-xs text-primary hover:text-primary-light transition-colors font-medium">View Full History</a>
        </div>

        <?php if($recentTrades->count() > 0): ?>
            <div class="space-y-2">
                <?php $__currentLoopData = $recentTrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $asset = $trade->tradingAsset; ?>
                    <a href="<?php echo e(route('user.trades.show', $trade->id)); ?>"
                       class="flex items-center justify-between p-2.5 rounded-lg hover:bg-surface-overlay/50 transition-colors group">
                        <div class="flex items-center gap-3 min-w-0">
                            <?php if($asset && $asset->logo_url): ?>
                                <img src="<?php echo e($asset->logo_url); ?>" alt="" class="w-7 h-7 rounded-full bg-surface-overlay flex-shrink-0" loading="lazy">
                            <?php else: ?>
                                <div class="w-7 h-7 rounded-full bg-surface-overlay flex items-center justify-center text-[10px] font-bold text-content-secondary flex-shrink-0">
                                    <?php echo e(strtoupper(substr(($asset ? $asset->symbol : $trade->asset_name) ?? '?', 0, 2))); ?>

                                </div>
                            <?php endif; ?>
                            <div class="min-w-0">
                                <div class="flex items-center gap-2">
                                    <span class="text-sm font-medium text-content-primary truncate" title="<?php echo e($asset ? $asset->name : $trade->asset_name); ?>">
                                        <?php echo e($asset ? $asset->name : $trade->asset_name); ?>

                                    </span>
                                    <span class="inline-flex items-center gap-0.5 text-[10px] font-semibold uppercase <?php echo e($trade->action === 'buy' ? 'text-gain' : 'text-loss'); ?>">
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => ''.e($trade->action === 'buy' ? 'arrow-trending-up' : 'arrow-trending-down').'','class' => 'w-3 h-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => ''.e($trade->action === 'buy' ? 'arrow-trending-up' : 'arrow-trending-down').'','class' => 'w-3 h-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                        <?php echo e($trade->action); ?>

                                    </span>
                                </div>
                                <span class="text-[10px] text-content-tertiary">
                                    <?php echo e(\Carbon\Carbon::parse($trade->settled_at ?? $trade->updated_at)->diffForHumans()); ?>

                                    &middot; <?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->amount); ?>
                                </span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 flex-shrink-0">
                            <?php if($trade->result === 'WIN'): ?>
                                <span class="inline-flex items-center gap-0.5 px-2 py-0.5 text-[10px] font-semibold rounded-full bg-gain/10 text-gain">
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
                                <span class="inline-flex items-center gap-0.5 px-2 py-0.5 text-[10px] font-semibold rounded-full bg-loss/10 text-loss">
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
                            <?php echo $__env->make('user.trades.partials.pnl-display', ['value' => $trade->profit_loss, 'size' => 'sm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <p class="text-xs text-content-tertiary text-center py-4">No closed trades yet</p>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php if(count($timelineData) > 1): ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4/dist/chart.umd.min.js"></script>
<script>
    (function() {
        const data = <?php echo json_encode($timelineData, 15, 512) ?>;
        const ctx = document.getElementById('plChart').getContext('2d');

        const gradient = ctx.createLinearGradient(0, 0, 0, 250);
        const lastValue = data[data.length - 1].cumulative_pl;
        const color = lastValue >= 0 ? '16, 185, 129' : '239, 68, 68'; // gain/loss RGB
        gradient.addColorStop(0, 'rgba(' + color + ', 0.15)');
        gradient.addColorStop(1, 'rgba(' + color + ', 0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.map(d => d.date),
                datasets: [{
                    label: 'Cumulative P/L',
                    data: data.map(d => d.cumulative_pl),
                    borderColor: 'rgb(' + color + ')',
                    backgroundColor: gradient,
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3,
                    pointRadius: 0,
                    pointHoverRadius: 4,
                    pointHoverBackgroundColor: 'rgb(' + color + ')',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: { intersect: false, mode: 'index' },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#1C1F26',
                        titleColor: '#9CA3AF',
                        bodyColor: '#F9FAFB',
                        borderColor: '#374151',
                        borderWidth: 1,
                        padding: 10,
                        callbacks: {
                            label: function(ctx) {
                                const v = ctx.parsed.y;
                                return (v >= 0 ? '+' : '-') + '<?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?>' + Math.abs(v).toFixed(2);
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: { color: 'rgba(255,255,255,0.04)' },
                        ticks: { color: '#6B7280', maxRotation: 0, maxTicksLimit: 8 },
                        border: { display: false }
                    },
                    y: {
                        grid: { color: 'rgba(255,255,255,0.04)' },
                        ticks: {
                            color: '#6B7280',
                            callback: function(v) { return (v >= 0 ? '+' : '-') + '<?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?>' + Math.abs(v).toFixed(0); }
                        },
                        border: { display: false }
                    }
                }
            }
        });
    })();
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\trades\analytics.blade.php ENDPATH**/ ?>