
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

    <?php echo $__env->make('user.partials.page-header', ['title' => 'Markets', 'subtitle' => 'Browse and trade available assets'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php
        $currentClass = request('class', 'all');
        $classes = ['all' => 'All', 'crypto' => 'Crypto', 'forex' => 'Forex', 'stock' => 'Stocks', 'etf' => 'ETFs', 'index' => 'Indices'];
    ?>

    
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <?php echo $__env->make('user.partials.stat-card-compact', [
            'label' => 'Total Assets',
            'value' => $totalAssets,
            'icon' => 'building-library',
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card-compact', [
            'label' => 'Top Gainer',
            'value' => $topGainer ? $topGainer->symbol : '—',
            'subvalue' => $topGainer && $topGainer->price_change_pct_24h ? '+' . number_format($topGainer->price_change_pct_24h, 2) . '%' : '',
            'icon' => 'arrow-trending-up',
            'color' => 'gain',
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card-compact', [
            'label' => 'Top Loser',
            'value' => $topLoser ? $topLoser->symbol : '—',
            'subvalue' => $topLoser && $topLoser->price_change_pct_24h ? number_format($topLoser->price_change_pct_24h, 2) . '%' : '',
            'icon' => 'arrow-trending-down',
            'color' => 'loss',
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card-compact', [
            'label' => 'Active Markets',
            'value' => $classCounts->count(),
            'icon' => 'chart-bar',
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        
        <div class="flex flex-wrap items-center gap-2" role="tablist" aria-label="Filter by asset class">
            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $count = $key === 'all' ? $totalAssets : ($classCounts[$key] ?? 0);
                    $isActive = $currentClass === $key;
                ?>
                <a href="<?php echo e(route('user.trades.markets', array_merge(request()->except('class'), $key !== 'all' ? ['class' => $key] : []))); ?>"
                   class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-medium rounded-lg transition-colors <?php echo e($isActive ? 'bg-primary text-content-inverse' : 'bg-surface-overlay text-content-secondary hover:text-content-primary hover:bg-surface-overlay/80'); ?>"
                   role="tab"
                   aria-selected="<?php echo e($isActive ? 'true' : 'false'); ?>">
                    <?php echo e($label); ?>

                    <span class="px-1.5 py-0.5 text-[10px] font-bold rounded <?php echo e($isActive ? 'bg-white/20 text-white' : 'bg-surface-base text-content-tertiary'); ?>"><?php echo e($count); ?></span>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
        <form method="GET" action="<?php echo e(route('user.trades.markets')); ?>" class="relative flex-shrink-0">
            <?php if($currentClass !== 'all'): ?>
                <input type="hidden" name="class" value="<?php echo e($currentClass); ?>">
            <?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'magnifying-glass','class' => 'w-4 h-4 text-content-tertiary absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'magnifying-glass','class' => 'w-4 h-4 text-content-tertiary absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <input type="text"
                   name="search"
                   value="<?php echo e(request('search')); ?>"
                   placeholder="Search by name or symbol..."
                   class="w-full sm:w-64 pl-9 pr-4 py-2 text-sm bg-surface-overlay border border-surface-border rounded-lg text-content-primary placeholder-content-tertiary focus:ring-2 focus:ring-primary focus:border-transparent focus:outline-none"
                   aria-label="Search assets">
        </form>
    </div>

    
    <?php if($assets->count() > 0): ?>
        
        <div class="hidden md:block bg-surface-raised border border-surface-border rounded-xl overflow-hidden mb-6">
            <table class="w-full text-sm" role="table">
                <caption class="sr-only">Available trading assets with prices and market data</caption>
                <thead>
                    <tr class="border-b border-surface-border">
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Asset</th>
                        <th scope="col" class="px-4 py-3 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">Price</th>
                        <th scope="col" class="px-4 py-3 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">24h Change</th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Class</th>
                        <th scope="col" class="px-4 py-3 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider"><span class="sr-only">Actions</span></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-border">
                    <?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-surface-overlay/50 transition-colors group">
                            
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                    <?php if($asset->logo_url): ?>
                                        <img src="<?php echo e($asset->logo_url); ?>" alt="" class="w-8 h-8 rounded-full bg-surface-overlay" loading="lazy">
                                    <?php else: ?>
                                        <div class="w-8 h-8 rounded-full bg-surface-overlay flex items-center justify-center text-xs font-bold text-content-secondary">
                                            <?php echo e(strtoupper(substr($asset->symbol ?? $asset->name, 0, 2))); ?>

                                        </div>
                                    <?php endif; ?>
                                    <div>
                                        <span class="text-sm font-semibold text-content-primary"><?php echo e($asset->name); ?></span>
                                        <?php if($asset->symbol): ?>
                                            <span class="text-xs text-content-tertiary ml-1"><?php echo e($asset->symbol); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                            
                            <td class="px-4 py-3 text-right">
                                <span class="text-sm font-medium text-content-primary">
                                    <?php echo e($asset->price ? \App\Helpers\CurrencyHelper::formatForUser($asset->price) : '—'); ?>

                                </span>
                            </td>
                            
                            <td class="px-4 py-3 text-right">
                                <?php if($asset->price_change_pct_24h !== null): ?>
                                    <span class="inline-flex items-center gap-1 text-xs font-semibold <?php echo e($asset->price_change_pct_24h >= 0 ? 'text-gain' : 'text-loss'); ?>">
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => ''.e($asset->price_change_pct_24h >= 0 ? 'arrow-trending-up' : 'arrow-trending-down').'','class' => 'w-3.5 h-3.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => ''.e($asset->price_change_pct_24h >= 0 ? 'arrow-trending-up' : 'arrow-trending-down').'','class' => 'w-3.5 h-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                        <?php echo e($asset->price_change_pct_24h >= 0 ? '+' : ''); ?><?php echo e(number_format($asset->price_change_pct_24h, 2)); ?>%
                                    </span>
                                <?php else: ?>
                                    <span class="text-xs text-content-tertiary">—</span>
                                <?php endif; ?>
                            </td>
                            
                            <td class="px-4 py-3">
                                <span class="px-2 py-0.5 text-[10px] font-medium rounded-full bg-surface-overlay text-content-secondary capitalize">
                                    <?php echo e($asset->asset_class ?? 'unknown'); ?>

                                </span>
                            </td>
                            
                            <td class="px-4 py-3 text-right">
                                <a href="<?php echo e(route('trade', ['asset' => $asset->id])); ?>"
                                   class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium rounded-lg bg-primary hover:bg-primary-dark text-content-inverse transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
                                    Trade
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'arrow-long-right','class' => 'w-3.5 h-3.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'arrow-long-right','class' => 'w-3.5 h-3.5']); ?>
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

        
        <div class="md:hidden grid grid-cols-1 sm:grid-cols-2 gap-3 mb-6">
            <?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('trade', ['asset' => $asset->id])); ?>"
                   class="bg-surface-raised border border-surface-border rounded-xl p-4 hover:bg-surface-overlay/50 transition-colors block">
                    <div class="flex items-center gap-3 mb-3">
                        <?php if($asset->logo_url): ?>
                            <img src="<?php echo e($asset->logo_url); ?>" alt="" class="w-10 h-10 rounded-full bg-surface-overlay" loading="lazy">
                        <?php else: ?>
                            <div class="w-10 h-10 rounded-full bg-surface-overlay flex items-center justify-center text-sm font-bold text-content-secondary">
                                <?php echo e(strtoupper(substr($asset->symbol ?? $asset->name, 0, 2))); ?>

                            </div>
                        <?php endif; ?>
                        <div class="min-w-0 flex-1">
                            <span class="text-sm font-semibold text-content-primary block truncate" title="<?php echo e($asset->name); ?>"><?php echo e($asset->name); ?></span>
                            <div class="flex items-center gap-2">
                                <?php if($asset->symbol): ?>
                                    <span class="text-xs text-content-tertiary"><?php echo e($asset->symbol); ?></span>
                                <?php endif; ?>
                                <span class="px-1.5 py-0.5 text-[10px] font-medium rounded bg-surface-overlay text-content-tertiary capitalize"><?php echo e($asset->asset_class ?? 'unknown'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-end justify-between">
                        <span class="text-lg font-bold text-content-primary">
                            <?php echo e($asset->price ? \App\Helpers\CurrencyHelper::formatForUser($asset->price) : '—'); ?>

                        </span>
                        <?php if($asset->price_change_pct_24h !== null): ?>
                            <span class="inline-flex items-center gap-0.5 px-2 py-0.5 text-xs font-semibold rounded-full <?php echo e($asset->price_change_pct_24h >= 0 ? 'bg-gain/10 text-gain' : 'bg-loss/10 text-loss'); ?>">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => ''.e($asset->price_change_pct_24h >= 0 ? 'arrow-trending-up' : 'arrow-trending-down').'','class' => 'w-3 h-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => ''.e($asset->price_change_pct_24h >= 0 ? 'arrow-trending-up' : 'arrow-trending-down').'','class' => 'w-3 h-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <?php echo e($asset->price_change_pct_24h >= 0 ? '+' : ''); ?><?php echo e(number_format($asset->price_change_pct_24h, 2)); ?>%
                            </span>
                        <?php endif; ?>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <?php echo $__env->make('user.trades.partials.empty-state', [
            'icon' => 'building-library',
            'title' => 'No market data available',
            'message' => request()->hasAny(['class', 'search'])
                ? 'No assets match your search. Try a different query or browse all assets.'
                : 'No active trading assets found. Contact your administrator.',
            'actionUrl' => request()->hasAny(['class', 'search']) ? route('user.trades.markets') : null,
            'actionLabel' => request()->hasAny(['class', 'search']) ? 'View All Assets' : null,
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\markets.blade.php ENDPATH**/ ?>