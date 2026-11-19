
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

    <?php echo $__env->make('user.partials.page-header', ['title' => 'Open Positions', 'subtitle' => 'Manage your currently active trades'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <?php echo $__env->make('user.partials.stat-card-compact', [
            'label' => 'Total Open',
            'value' => $stats['total'],
            'icon' => 'briefcase',
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card-compact', [
            'label' => 'Binary Open',
            'value' => $stats['binary'],
            'icon' => 'bolt',
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card-compact', [
            'label' => 'Spot Open',
            'value' => $stats['spot'],
            'icon' => 'chart-bar',
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card-compact', [
            'label' => 'Capital at Risk',
            'value' => \App\Helpers\CurrencyHelper::formatForUser($stats['capital_at_risk']),
            'icon' => 'exclamation-triangle',
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    
    <?php
        $currentType = request('type', 'all');
        $currentDemo = request('demo', 'all');
    ?>
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
        <div class="flex items-center gap-2" role="group" aria-label="Filter by trade type">
            <?php $__currentLoopData = ['all' => 'All Positions', 'binary' => 'Binary', 'spot' => 'Spot']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $count = $key === 'all' ? $stats['total'] : ($key === 'binary' ? $stats['binary'] : $stats['spot']);
                    $isActive = $currentType === $key;
                ?>
                <a href="<?php echo e(route('user.trades.positions', array_merge(request()->except('type'), $key !== 'all' ? ['type' => $key] : []))); ?>"
                   class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-medium rounded-lg transition-colors <?php echo e($isActive ? 'bg-primary text-content-inverse' : 'bg-surface-overlay text-content-secondary hover:text-content-primary hover:bg-surface-overlay/80'); ?>"
                   aria-pressed="<?php echo e($isActive ? 'true' : 'false'); ?>">
                    <?php echo e($label); ?>

                    <span class="px-1.5 py-0.5 text-[10px] font-bold rounded <?php echo e($isActive ? 'bg-white/20 text-white' : 'bg-surface-base text-content-tertiary'); ?>"><?php echo e($count); ?></span>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="flex items-center gap-2" role="group" aria-label="Filter demo or live">
            <?php $__currentLoopData = ['all' => 'All', 'live' => 'Live', 'demo' => 'Demo']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $isActive = $currentDemo === $key; ?>
                <a href="<?php echo e(route('user.trades.positions', array_merge(request()->except('demo'), $key !== 'all' ? ['demo' => $key] : []))); ?>"
                   class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-lg transition-colors <?php echo e($isActive ? 'bg-surface-overlay text-content-primary ring-1 ring-primary' : 'bg-surface-overlay text-content-tertiary hover:text-content-secondary'); ?>"
                   aria-pressed="<?php echo e($isActive ? 'true' : 'false'); ?>">
                    <?php echo e($label); ?>

                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <?php if($openTrades->count() > 0): ?>

        
        <?php if($spotTrades->count() > 0 && ($currentType === 'all' || $currentType === 'spot')): ?>
            <div class="mb-6">
                <h2 class="text-sm font-semibold text-content-secondary uppercase tracking-wider mb-3 flex items-center gap-2">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'chart-bar','class' => 'w-4 h-4 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'chart-bar','class' => 'w-4 h-4 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    Spot Positions
                    <span class="px-1.5 py-0.5 text-[10px] font-bold rounded bg-primary/10 text-primary"><?php echo e($spotTrades->count()); ?></span>
                </h2>
                <div class="space-y-3">
                    <?php $__currentLoopData = $spotTrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $asset = $trade->tradingAsset;
                            $currentPrice = $asset ? $asset->price : null;
                            $isBuy = $trade->action === 'buy';
                            $priceUp = $currentPrice && $trade->entry_price
                                ? ($isBuy ? $currentPrice >= $trade->entry_price : $currentPrice <= $trade->entry_price)
                                : null;
                        ?>
                        <article class="bg-surface-raised border border-surface-border rounded-xl overflow-hidden <?php echo e($trade->close_requested_at ? 'border-l-4 border-l-warning' : ''); ?>"
                                 aria-label="Spot position for <?php echo e($asset ? $asset->name : $trade->asset_name); ?>">
                            <div class="p-4">
                                
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
                                    <div class="flex items-center gap-3">
                                        <?php if($asset && $asset->logo_url): ?>
                                            <img src="<?php echo e($asset->logo_url); ?>" alt="" class="w-10 h-10 rounded-full bg-surface-overlay" loading="lazy">
                                        <?php else: ?>
                                            <div class="w-10 h-10 rounded-full bg-surface-overlay flex items-center justify-center text-sm font-bold text-content-secondary">
                                                <?php echo e(strtoupper(substr(($asset ? $asset->symbol : $trade->asset_name) ?? '?', 0, 2))); ?>

                                            </div>
                                        <?php endif; ?>
                                        <div>
                                            <div class="flex items-center gap-2">
                                                <span class="text-sm font-bold text-content-primary"><?php echo e($asset ? $asset->name : $trade->asset_name); ?></span>
                                                <?php if($asset && $asset->symbol): ?>
                                                    <span class="text-xs text-content-tertiary"><?php echo e($asset->symbol); ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="flex items-center gap-1.5 mt-0.5">
                                                <span class="inline-flex items-center gap-1 text-xs font-semibold uppercase <?php echo e($isBuy ? 'text-gain' : 'text-loss'); ?>">
                                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => ''.e($isBuy ? 'arrow-trending-up' : 'arrow-trending-down').'','class' => 'w-3.5 h-3.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => ''.e($isBuy ? 'arrow-trending-up' : 'arrow-trending-down').'','class' => 'w-3.5 h-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    <?php echo e($trade->action); ?>

                                                </span>
                                                <?php if($trade->is_demo): ?>
                                                    <span class="px-1.5 py-0.5 text-[10px] font-semibold rounded bg-warning/10 text-warning">DEMO</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="text-left sm:text-right" aria-live="polite">
                                        <span class="text-xs text-content-tertiary block">Unrealized P/L</span>
                                        <span class="text-lg font-bold <?php echo e($trade->unrealized_pl >= 0 ? 'text-gain' : 'text-loss'); ?>">
                                            <?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->unrealized_pl); ?>
                                        </span>
                                    </div>
                                </div>

                                
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-4">
                                    <div class="bg-surface-overlay rounded-lg p-2.5">
                                        <span class="text-[10px] text-content-tertiary uppercase tracking-wider block mb-0.5">Entry</span>
                                        <span class="text-sm font-medium text-content-primary"><?php echo e($trade->entry_price ? \App\Helpers\CurrencyHelper::formatForUser($trade->entry_price) : '—'); ?></span>
                                    </div>
                                    <div class="bg-surface-overlay rounded-lg p-2.5">
                                        <span class="text-[10px] text-content-tertiary uppercase tracking-wider block mb-0.5">Current</span>
                                        <span class="text-sm font-medium <?php echo e($priceUp === true ? 'text-gain' : ($priceUp === false ? 'text-loss' : 'text-content-primary')); ?>">
                                            <?php echo e($currentPrice ? \App\Helpers\CurrencyHelper::formatForUser($currentPrice) : '—'); ?>

                                        </span>
                                    </div>
                                    <div class="bg-surface-overlay rounded-lg p-2.5">
                                        <span class="text-[10px] text-content-tertiary uppercase tracking-wider block mb-0.5">Amount</span>
                                        <span class="text-sm font-medium text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->amount); ?></span>
                                    </div>
                                    <div class="bg-surface-overlay rounded-lg p-2.5">
                                        <span class="text-[10px] text-content-tertiary uppercase tracking-wider block mb-0.5">Leverage</span>
                                        <span class="text-sm font-medium text-content-primary"><?php echo e($trade->leverage); ?>x</span>
                                    </div>
                                </div>

                                
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 pt-3 border-t border-surface-border">
                                    <span class="text-xs text-content-tertiary">
                                        Opened <?php echo e(\Carbon\Carbon::parse($trade->created_at)->diffForHumans()); ?>

                                        &middot; <?php echo e(\Carbon\Carbon::parse($trade->created_at)->diffForHumans(null, true)); ?> ago
                                    </span>
                                    <div class="flex items-center gap-2">
                                        <a href="<?php echo e(route('user.trades.show', $trade->id)); ?>" class="text-xs text-primary hover:text-primary-light transition-colors font-medium">
                                            View Details
                                        </a>
                                        <?php if(!$trade->close_requested_at): ?>
                                            <form method="POST" action="<?php echo e(route('trades.requestClose')); ?>" onsubmit="return confirm('Close this spot position?')">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="trade_id" value="<?php echo e($trade->id); ?>">
                                                <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium rounded-lg bg-loss/10 text-loss hover:bg-loss/20 transition-colors">
                                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'x-circle','class' => 'w-3.5 h-3.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'x-circle','class' => 'w-3.5 h-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    Request Close
                                                </button>
                                            </form>
                                        <?php else: ?>
                                            <span class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium rounded-lg bg-warning/10 text-warning">
                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'clock','class' => 'w-3.5 h-3.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'clock','class' => 'w-3.5 h-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                Close Pending
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>

        
        <?php if($binaryTrades->count() > 0 && ($currentType === 'all' || $currentType === 'binary')): ?>
            <div class="mb-6">
                <h2 class="text-sm font-semibold text-content-secondary uppercase tracking-wider mb-3 flex items-center gap-2">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'bolt','class' => 'w-4 h-4 text-info']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'bolt','class' => 'w-4 h-4 text-info']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    Binary Positions
                    <span class="px-1.5 py-0.5 text-[10px] font-bold rounded bg-info/10 text-info"><?php echo e($binaryTrades->count()); ?></span>
                </h2>

                
                <div class="hidden md:block bg-surface-raised border border-surface-border rounded-xl overflow-hidden">
                    <table class="w-full text-sm" role="table">
                        <caption class="sr-only">Open binary trades with countdown timers</caption>
                        <thead>
                            <tr class="border-b border-surface-border">
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Asset</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Direction</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Amount</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Leverage</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Entry</th>
                                <th scope="col" class="px-4 py-3 text-center text-xs font-medium text-content-tertiary uppercase tracking-wider">Time Left</th>
                                <th scope="col" class="px-4 py-3 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">Unrealized P/L</th>
                                <th scope="col" class="px-4 py-3 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider"><span class="sr-only">Actions</span></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-surface-border">
                            <?php $__currentLoopData = $binaryTrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-surface-overlay/50 transition-colors cursor-pointer"
                                    onclick="window.location='<?php echo e(route('user.trades.show', $trade->id)); ?>'"
                                    role="link" tabindex="0"
                                    data-trade-id="<?php echo e($trade->id); ?>">
                                    <td class="px-4 py-3">
                                        <?php echo $__env->make('user.trades.partials.asset-cell', ['trade' => $trade], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="inline-flex items-center gap-1 text-xs font-semibold uppercase <?php echo e($trade->action === 'buy' ? 'text-gain' : 'text-loss'); ?>">
                                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => ''.e($trade->action === 'buy' ? 'arrow-trending-up' : 'arrow-trending-down').'','class' => 'w-3.5 h-3.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => ''.e($trade->action === 'buy' ? 'arrow-trending-up' : 'arrow-trending-down').'','class' => 'w-3.5 h-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                            <?php echo e($trade->action); ?>

                                        </span>
                                        <?php if($trade->is_demo): ?>
                                            <span class="ml-1 px-1 py-0.5 text-[10px] font-semibold rounded bg-warning/10 text-warning">DEMO</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-4 py-3 text-content-primary font-medium"><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->amount); ?></td>
                                    <td class="px-4 py-3">
                                        <span class="px-1.5 py-0.5 text-xs font-medium rounded bg-surface-overlay text-content-secondary"><?php echo e($trade->leverage); ?>x</span>
                                    </td>
                                    <td class="px-4 py-3 text-content-secondary text-xs"><?php echo e($trade->entry_price ? \App\Helpers\CurrencyHelper::formatForUser($trade->entry_price) : '—'); ?></td>
                                    <td class="px-4 py-3 text-center">
                                        <?php if($trade->expires_at): ?>
                                            <span class="countdown-timer text-base font-bold text-warning" data-expiry="<?php echo e(\Carbon\Carbon::parse($trade->expires_at)->timestamp); ?>" aria-live="polite"></span>
                                        <?php else: ?>
                                            <span class="text-content-tertiary">—</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-4 py-3 text-right">
                                        <?php echo $__env->make('user.trades.partials.pnl-display', ['value' => $trade->unrealized_pl], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </td>
                                    <td class="px-4 py-3 text-right">
                                        <a href="<?php echo e(route('user.trades.show', $trade->id)); ?>" class="text-xs text-primary hover:text-primary-light font-medium" onclick="event.stopPropagation()">
                                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'eye','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'eye','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                
                <div class="md:hidden space-y-3">
                    <?php $__currentLoopData = $binaryTrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('user.trades.partials.trade-card-mobile', ['trade' => $trade], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>

    <?php else: ?>
        <?php echo $__env->make('user.trades.partials.empty-state', [
            'icon' => 'briefcase',
            'title' => 'No open positions',
            'message' => 'You don\'t have any active trades right now. Open a position to get started.',
            'actionUrl' => route('trade'),
            'actionLabel' => 'Start Trading',
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    // Countdown timers for binary trades
    document.querySelectorAll('.countdown-timer').forEach(function(el) {
        const expiry = parseInt(el.dataset.expiry);
        const tradeRow = el.closest('[data-trade-id]');

        function tick() {
            const now = Math.floor(Date.now() / 1000);
            const diff = expiry - now;
            if (diff <= 0) {
                el.textContent = 'Settling...';
                el.classList.add('animate-pulse');
                // Auto-settle
                if (tradeRow) {
                    const tradeId = tradeRow.dataset.tradeId;
                    fetch('<?php echo e(route("trades.process")); ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ trade_id: tradeId })
                    }).then(function() {
                        setTimeout(function() { window.location.reload(); }, 1500);
                    });
                }
                return;
            }

            const h = Math.floor(diff / 3600);
            const m = Math.floor((diff % 3600) / 60);
            const s = diff % 60;
            el.textContent = (h > 0 ? h + ':' : '') + String(m).padStart(2, '0') + ':' + String(s).padStart(2, '0');

            if (diff <= 60) {
                el.classList.add('animate-pulse', 'text-loss');
            }
            requestAnimationFrame(tick);
        }
        tick();
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\trades\positions.blade.php ENDPATH**/ ?>