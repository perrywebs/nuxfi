
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

    
    <style>
        @keyframes  preloader-progress {
            from { width: 0% }
            to   { width: 100% }
        }
    </style>
    <div x-data="{ loading: true }"
         x-show="loading"
         x-init="setTimeout(() => loading = false, 2000)"
         @chart-ready.window="loading = false"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-[60] bg-surface-base flex items-center justify-center">
        <div class="flex flex-col items-center gap-5">
            
            <div class="relative">
                <div class="w-12 h-12 rounded-full border-[3px] border-surface-border border-t-primary animate-spin"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-2 h-2 rounded-full bg-primary animate-pulse"></div>
                </div>
            </div>
            
            <div class="text-center">
                <p class="text-content-primary text-sm font-semibold tracking-wide">Loading Trading Platform</p>
                <p class="text-content-tertiary text-xs mt-1.5">Preparing your trading environment&hellip;</p>
            </div>
            
            <div class="w-48 h-[3px] rounded-full bg-surface-overlay overflow-hidden">
                <div class="h-full bg-primary rounded-full" style="animation: preloader-progress 2.5s ease-in-out forwards"></div>
            </div>
        </div>
    </div>

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
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.error-alert','data' => []]); ?>
<?php $component->withName('error-alert'); ?>
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

    
    <?php echo $__env->make('user.partials.quick-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-content-primary">Trading</h2>
            <p class="text-sm text-content-secondary mt-1">Execute binary & spot trades on live markets</p>
        </div>
        <a href="<?php echo e(route('user.trades.history')); ?>" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary text-sm font-medium transition-colors">
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
            Trade History
        </a>
    </div>

    
    <div x-data="tradePanel()" x-init="init()" class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        
        <div class="lg:col-span-4 space-y-4">

            
            <?php if(Auth::user()->trade_signal != 0): ?>
            <?php echo $__env->make('user.partials.trade-signal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            
            <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden">
                <div class="px-5 py-3 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <button @click="isDemo = false" :class="!isDemo ? 'bg-primary text-content-inverse' : 'bg-surface-overlay text-content-secondary'" class="px-3 py-1.5 text-xs font-semibold rounded-lg transition-colors">
                            Live
                        </button>
                        <button @click="isDemo = true" :class="isDemo ? 'bg-warning text-surface-base' : 'bg-surface-overlay text-content-secondary'" class="px-3 py-1.5 text-xs font-semibold rounded-lg transition-colors">
                            Demo
                        </button>
                    </div>
                    <div class="text-right">
                        <span class="text-xs text-content-tertiary" x-text="isDemo ? 'Demo Balance' : 'Live Balance'"></span>
                        <div class="text-sm font-bold" :class="isDemo ? 'text-warning' : 'text-gain'">
                            <span x-show="!isDemo"><?php echo \App\Helpers\CurrencyHelper::formatForUser(Auth::user()->account_bal); ?></span>
                            <span x-show="isDemo" x-cloak><?php echo \App\Helpers\CurrencyHelper::formatForUser(Auth::user()->demo_bal); ?></span>
                        </div>
                    </div>
                </div>
                <template x-if="isDemo">
                    <div class="px-5 py-2 bg-warning/10 border-t border-warning/20 text-xs text-warning font-medium text-center">
                        Demo Mode — Virtual funds, no real money at risk
                    </div>
                </template>
            </div>

            
            <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden">
                <div class="px-5 py-3 border-b border-surface-border flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 rounded-full animate-pulse" :class="isDemo ? 'bg-warning' : 'bg-gain'"></div>
                        <span class="text-sm font-semibold" :class="isDemo ? 'text-warning' : 'text-gain'" x-text="isDemo ? 'Demo Trading' : 'Live Trading'"></span>
                    </div>
                    
                    <div class="flex gap-1">
                        <button @click="tradeType = 'binary'" :class="tradeType === 'binary' ? 'bg-primary text-content-inverse' : 'bg-surface-overlay text-content-secondary'" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors">
                            Stock
                        </button>
                        <button @click="tradeType = 'spot'" :class="tradeType === 'spot' ? 'bg-primary text-content-inverse' : 'bg-surface-overlay text-content-secondary'" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors">
                            Spot
                        </button>
                    </div>
                </div>

                <form id="tradeForm" action="<?php echo e(route('trades.store')); ?>" method="POST" class="p-5 space-y-4">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="trade_type" :value="tradeType">
                    <input type="hidden" name="is_demo" :value="isDemo ? 1 : 0">
                    <input type="hidden" name="action" x-ref="tradeAction">

                    
                    <div>
                        <label class="block text-xs font-medium text-content-secondary mb-1.5">Asset Class</label>
                        <div class="flex flex-wrap gap-1">
                            <template x-for="cls in assetClasses" :key="cls.key">
                                <button type="button" @click="filterClass = cls.key; filterAssets()"
                                        :class="filterClass === cls.key ? 'bg-primary text-content-inverse border-primary' : 'bg-surface-overlay text-content-secondary border-surface-border hover:text-content-primary'"
                                        class="px-2.5 py-1 text-xs font-medium rounded-lg border transition-colors"
                                        x-text="cls.label">
                                </button>
                            </template>
                        </div>
                    </div>

                    
                    <div x-data="{ pickerOpen: false }" @click.outside="pickerOpen = false" class="relative">
                        <label class="block text-xs font-medium text-content-secondary mb-1.5">Select Asset</label>
                        <input type="hidden" name="trading_asset_id" :value="selectedAssetId">
                        <button type="button" @click="pickerOpen = !pickerOpen"
                                class="w-full flex items-center gap-2.5 px-3 py-2.5 rounded-lg bg-surface-overlay border border-surface-border text-sm text-content-primary focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary transition-colors text-left">
                            <template x-if="selectedAsset && selectedAsset.logo_url">
                                <img :src="selectedAsset.logo_url" class="w-5 h-5 rounded-full flex-shrink-0" :alt="selectedAsset.symbol">
                            </template>
                            <template x-if="selectedAsset && !selectedAsset.logo_url">
                                <span class="w-5 h-5 rounded-full bg-primary/20 text-primary text-[10px] font-bold flex items-center justify-center flex-shrink-0" x-text="selectedAsset.symbol.substring(0,2)"></span>
                            </template>
                            <template x-if="!selectedAsset">
                                <span class="w-5 h-5 rounded-full bg-surface-border flex-shrink-0"></span>
                            </template>
                            <span class="flex-1 truncate" x-text="selectedAsset ? selectedAsset.symbol + ' — ' + selectedAsset.name : '— Choose an asset —'"
                                  :class="selectedAsset ? 'text-content-primary' : 'text-content-tertiary'"></span>
                            <svg class="w-4 h-4 text-content-tertiary flex-shrink-0 transition-transform" :class="pickerOpen && 'rotate-180'" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                        </button>
                        <div x-show="pickerOpen" x-cloak x-transition.opacity
                             class="absolute z-50 mt-1 w-full max-h-56 overflow-y-auto rounded-lg bg-surface-overlay border border-surface-border shadow-xl">
                            <template x-for="asset in filteredAssets" :key="asset.id">
                                <button type="button" @click="selectedAssetId = asset.id; onAssetChange(); pickerOpen = false"
                                        class="w-full flex items-center gap-2.5 px-3 py-2 hover:bg-surface-border/40 transition-colors"
                                        :class="selectedAssetId == asset.id && 'bg-primary/10'">
                                    <template x-if="asset.logo_url">
                                        <img :src="asset.logo_url" class="w-5 h-5 rounded-full flex-shrink-0" :alt="asset.symbol">
                                    </template>
                                    <template x-if="!asset.logo_url">
                                        <span class="w-5 h-5 rounded-full bg-primary/20 text-primary text-[10px] font-bold flex items-center justify-center flex-shrink-0" x-text="asset.symbol.substring(0,2)"></span>
                                    </template>
                                    <span class="text-sm text-content-primary font-medium" x-text="asset.symbol"></span>
                                    <span class="text-xs text-content-tertiary truncate" x-text="asset.name"></span>
                                    <span class="ml-auto text-xs font-medium" :class="(asset.price_change_pct_24h ?? 0) >= 0 ? 'text-gain' : 'text-loss'"
                                          x-text="'<?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?>' + formatPrice(asset.price)"></span>
                                </button>
                            </template>
                            <div x-show="filteredAssets.length === 0" class="px-3 py-4 text-xs text-content-tertiary text-center">No assets in this class</div>
                        </div>
                    </div>

                    
                    <div x-show="selectedAsset" x-cloak class="flex items-center justify-between px-3 py-2 rounded-lg bg-surface-overlay border border-surface-border">
                        <div class="flex items-center gap-2">
                            <template x-if="selectedAsset && selectedAsset.logo_url">
                                <img :src="selectedAsset.logo_url" class="w-5 h-5 rounded-full" :alt="selectedAsset.symbol">
                            </template>
                            <span class="text-xs text-content-secondary">Entry Price</span>
                        </div>
                        <div class="text-right">
                            <span class="text-sm font-bold text-content-primary" x-text="'<?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?>' + formatPrice(selectedAsset?.price)"></span>
                            <span class="text-xs ml-1" :class="(selectedAsset?.price_change_pct_24h ?? 0) >= 0 ? 'text-gain' : 'text-loss'"
                                  x-text="((selectedAsset?.price_change_pct_24h ?? 0) >= 0 ? '+' : '') + Number(selectedAsset?.price_change_pct_24h ?? 0).toFixed(2) + '%'">
                            </span>
                        </div>
                    </div>

                    
                    <div>
                        <label class="block text-xs font-medium text-content-secondary mb-1.5">Leverage</label>
                        <input type="hidden" name="leverage" :value="leverage">
                        <div class="grid grid-cols-6 gap-1.5">
                            <template x-for="lev in leverageOptions" :key="lev">
                                <button type="button" @click="leverage = lev"
                                        :class="leverage === lev ? 'bg-primary text-content-inverse border-primary' : 'bg-surface-overlay text-content-secondary border-surface-border hover:bg-primary/10 hover:text-primary'"
                                        class="py-2 text-xs font-semibold rounded-lg border transition-colors text-center"
                                        x-text="lev + 'x'">
                                </button>
                            </template>
                        </div>
                    </div>

                    
                    <div x-show="tradeType === 'binary'" x-cloak>
                        <label class="block text-xs font-medium text-content-secondary mb-1.5">Duration</label>
                        <input type="hidden" name="duration" :value="duration">
                        <div class="grid grid-cols-7 gap-1.5">
                            <template x-for="d in durationOptions" :key="d.value">
                                <button type="button" @click="duration = d.value"
                                        :class="duration === d.value ? 'bg-primary text-content-inverse border-primary' : 'bg-surface-overlay text-content-secondary border-surface-border hover:bg-primary/10 hover:text-primary'"
                                        class="py-2 text-xs font-semibold rounded-lg border transition-colors text-center"
                                        x-text="d.label">
                                </button>
                            </template>
                        </div>
                    </div>
                    <template x-if="tradeType === 'spot'">
                        <p class="text-xs text-content-tertiary italic">Spot trades have no expiry — request close anytime, settled by admin.</p>
                    </template>

                    
                    <div>
                        <label class="block text-xs font-medium text-content-secondary mb-1.5">Amount (<?php echo \App\Helpers\CurrencyHelper::getUserCode(); ?>)</label>
                        <input type="number" name="amount" x-model.number="amount" step="0.01" min="1" required placeholder="Enter trade amount"
                               class="w-full px-3 py-2.5 rounded-lg bg-surface-overlay border border-surface-border text-content-primary text-sm placeholder-content-tertiary focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary transition-colors">
                    </div>

                    
                    <div x-show="amount > 0 && leverage > 0" x-cloak class="rounded-lg bg-surface-overlay border border-surface-border p-3">
                        <div class="text-xs text-content-tertiary mb-2">Potential Outcome Preview</div>
                        <div class="grid grid-cols-2 gap-3 text-center">
                            <div>
                                <div class="text-xs text-content-secondary mb-0.5">If WIN</div>
                                <span class="text-sm font-bold text-gain" x-text="'+<?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?>' + (amount * leverage / 100).toFixed(2)"></span>
                            </div>
                            <div>
                                <div class="text-xs text-content-secondary mb-0.5">If LOSS</div>
                                <span class="text-sm font-bold text-loss" x-text="'-<?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?>' + (amount * leverage / 100).toFixed(2)"></span>
                            </div>
                        </div>
                    </div>

                    
                    <div class="grid grid-cols-2 gap-3 pt-2">
                        <button type="button" @click="confirmTrade('buy')"
                                class="py-3 rounded-lg bg-gain hover:bg-gain/80 text-white text-sm font-bold transition-colors flex items-center justify-center gap-1.5">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'arrow-trending-up','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'arrow-trending-up','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            Buy / Long
                        </button>
                        <button type="button" @click="confirmTrade('sell')"
                                class="py-3 rounded-lg bg-loss hover:bg-loss/80 text-white text-sm font-bold transition-colors flex items-center justify-center gap-1.5">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'arrow-trending-down','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'arrow-trending-down','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            Sell / Short
                        </button>
                    </div>
                </form>
            </div>
        </div>

        
        <div class="lg:col-span-8 rounded-xl bg-surface-raised border border-surface-border overflow-hidden">
            <div class="px-5 py-3 border-b border-surface-border flex items-center gap-2">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'chart-bar','class' => 'w-5 h-5 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'chart-bar','class' => 'w-5 h-5 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <h3 class="text-sm font-semibold text-content-primary">Live Chart</h3>
                <span class="text-xs text-content-tertiary ml-auto" x-text="selectedAsset ? selectedAsset.symbol : ''"></span>
            </div>
            <div id="tv_chart_wrapper" style="height:685px;">
                <div class="tradingview-widget-container" style="height:100%;width:100%">
                    <div class="tradingview-widget-container__widget" style="height:100%;width:100%"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
                    {
                        "autosize": true,
                        "symbol": "NASDAQ:AAPL",
                        "interval": "1",
                        "timezone": "Etc/UTC",
                        "theme": "dark",
                        "style": "1",
                        "locale": "en",
                        "backgroundColor": "rgba(22, 26, 30, 1)",
                        "gridColor": "rgba(42, 47, 54, 0.3)",
                        "allow_symbol_change": true,
                        "hide_side_toolbar": false,
                        "calendar": false,
                        "studies": ["MACD@tv-basicstudies"],
                        "support_host": "https://www.tradingview.com"
                    }
                    </script>
                </div>
            </div>
        </div>
    </div>

    
    <div class="mt-6 rounded-xl bg-surface-raised border border-surface-border overflow-hidden" x-data="{ tradeTab: 'open' }">
        <div class="px-5 py-3 border-b border-surface-border flex items-center justify-between">
            <h3 class="text-sm font-semibold text-content-primary">Active Trades</h3>
            <div class="flex gap-1">
                <button @click="tradeTab = 'open'"
                        :class="tradeTab === 'open' ? 'bg-primary text-content-inverse' : 'bg-surface-overlay text-content-secondary hover:text-content-primary'"
                        class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors">
                    Open (<?php echo e($tradesopen->total()); ?>)
                </button>
                <button @click="tradeTab = 'closed'"
                        :class="tradeTab === 'closed' ? 'bg-primary text-content-inverse' : 'bg-surface-overlay text-content-secondary hover:text-content-primary'"
                        class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors">
                    Closed (<?php echo e($tradesclosed->total()); ?>)
                </button>
            </div>
        </div>

        
        <div x-show="tradeTab === 'open'" class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-surface-border">
                        <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">#</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Type</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Asset</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Action</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Amount</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Leverage</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Entry</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Expires</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-border">
                    <?php $__empty_1 = true; $__currentLoopData = $tradesopen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-surface-overlay/50 transition-colors">
                            <td class="px-4 py-3 text-content-secondary"><?php echo e($loop->iteration); ?></td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-1">
                                    <span class="px-1.5 py-0.5 text-xs font-medium rounded <?php echo e($trade->trade_type == 'binary' ? 'bg-info/10 text-info' : 'bg-primary/10 text-primary'); ?>">
                                        <?php echo e(ucfirst($trade->trade_type ?? 'binary')); ?>

                                    </span>
                                    <?php if($trade->is_demo): ?>
                                        <span class="px-1.5 py-0.5 text-xs font-medium rounded bg-warning/10 text-warning">DEMO</span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-content-primary font-medium"><?php echo e($trade->asset_name); ?></td>
                            <td class="px-4 py-3">
                                <span class="uppercase text-xs font-semibold <?php echo e($trade->action == 'buy' ? 'text-gain' : 'text-loss'); ?>"><?php echo e($trade->action); ?></span>
                            </td>
                            <td class="px-4 py-3 text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->amount); ?></td>
                            <td class="px-4 py-3 text-content-secondary"><?php echo e($trade->leverage); ?>x</td>
                            <td class="px-4 py-3 text-content-secondary text-xs">
                                <?php if($trade->entry_price): ?>
                                    <?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->entry_price); ?>
                                <?php else: ?> — <?php endif; ?>
                            </td>
                            <td class="px-4 py-3 text-content-tertiary text-xs">
                                <?php if($trade->trade_type == 'spot' || !$trade->expires_at): ?>
                                    <span class="text-content-tertiary italic">No expiry</span>
                                <?php else: ?>
                                    <span class="trade-countdown" data-expires="<?php echo e($trade->expires_at); ?>" data-trade-id="<?php echo e($trade->id); ?>">
                                        <?php echo e(\Carbon\Carbon::parse($trade->expires_at)->format('H:i:s')); ?>

                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-3">
                                <?php if(($trade->trade_type ?? 'binary') == 'spot' && !$trade->close_requested_at): ?>
                                    <button type="button" onclick="requestCloseSpot(<?php echo e($trade->id); ?>)"
                                            class="px-2 py-1 text-xs font-medium rounded bg-loss/10 text-loss hover:bg-loss/20 transition-colors">
                                        Request Close
                                    </button>
                                <?php elseif(($trade->trade_type ?? 'binary') == 'spot' && $trade->close_requested_at): ?>
                                    <span class="px-2 py-1 text-xs font-medium rounded bg-warning/10 text-warning">Close Pending</span>
                                <?php else: ?>
                                    <span class="text-content-tertiary text-xs">Auto-settle</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="9" class="px-4 py-8 text-center text-content-tertiary">No open trades found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="px-5 py-3"><?php echo e($tradesopen->links()); ?></div>
        </div>

        
        <div x-show="tradeTab === 'closed'" x-cloak class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-surface-border">
                        <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">#</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Type</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Asset</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Action</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Amount</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Leverage</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Entry</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Exit</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Result</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">P/L</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Settled</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-border">
                    <?php $__empty_1 = true; $__currentLoopData = $tradesclosed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-surface-overlay/50 transition-colors">
                            <td class="px-4 py-3 text-content-secondary"><?php echo e($loop->iteration); ?></td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-1">
                                    <span class="px-1.5 py-0.5 text-xs font-medium rounded <?php echo e($trade->trade_type == 'binary' ? 'bg-info/10 text-info' : 'bg-primary/10 text-primary'); ?>">
                                        <?php echo e(ucfirst($trade->trade_type ?? 'binary')); ?>

                                    </span>
                                    <?php if($trade->is_demo): ?>
                                        <span class="px-1.5 py-0.5 text-xs font-medium rounded bg-warning/10 text-warning">DEMO</span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-content-primary font-medium"><?php echo e($trade->asset_name); ?></td>
                            <td class="px-4 py-3">
                                <span class="uppercase text-xs font-semibold <?php echo e($trade->action == 'buy' ? 'text-gain' : 'text-loss'); ?>"><?php echo e($trade->action); ?></span>
                            </td>
                            <td class="px-4 py-3 text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->amount); ?></td>
                            <td class="px-4 py-3 text-content-secondary"><?php echo e($trade->leverage); ?>x</td>
                            <td class="px-4 py-3 text-content-secondary text-xs">
                                <?php if($trade->entry_price): ?> <?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->entry_price); ?> <?php else: ?> — <?php endif; ?>
                            </td>
                            <td class="px-4 py-3 text-content-secondary text-xs">
                                <?php if($trade->exit_price): ?> <?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->exit_price); ?> <?php else: ?> — <?php endif; ?>
                            </td>
                            <td class="px-4 py-3">
                                <?php if($trade->result == 'WIN'): ?>
                                    <span class="px-2 py-0.5 text-xs font-medium rounded-full bg-gain/10 text-gain">WIN</span>
                                <?php elseif($trade->result == 'LOSS'): ?>
                                    <span class="px-2 py-0.5 text-xs font-medium rounded-full bg-loss/10 text-loss">LOSS</span>
                                <?php else: ?>
                                    <span class="px-2 py-0.5 text-xs font-medium rounded-full bg-warning/10 text-warning"><?php echo e($trade->result ?? 'PENDING'); ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-3">
                                <?php if($trade->profit_loss !== null): ?>
                                    <span class="<?php echo e($trade->profit_loss >= 0 ? 'text-gain' : 'text-loss'); ?> font-medium">
                                        <?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->profit_loss); ?>
                                    </span>
                                <?php else: ?> — <?php endif; ?>
                            </td>
                            <td class="px-4 py-3 text-content-tertiary text-xs">
                                <?php echo e($trade->settled_by ? ucfirst($trade->settled_by) : '—'); ?>

                                <?php if($trade->settled_at): ?>
                                    <br><?php echo e(\Carbon\Carbon::parse($trade->settled_at)->format('M d, H:i')); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="11" class="px-4 py-8 text-center text-content-tertiary">No closed trades found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="px-5 py-3"><?php echo e($tradesclosed->links()); ?></div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>

<script type="text/javascript">
    function initChart(symbol) {
        symbol = symbol || 'NASDAQ:AAPL';
        const wrapper = document.getElementById('tv_chart_wrapper');
        if (!wrapper) return;

        // Clear existing content
        wrapper.innerHTML = '';

        // Build container
        var container = document.createElement('div');
        container.className = 'tradingview-widget-container';
        container.style.cssText = 'height:100%;width:100%';

        var widgetDiv = document.createElement('div');
        widgetDiv.className = 'tradingview-widget-container__widget';
        widgetDiv.style.cssText = 'height:100%;width:100%';
        container.appendChild(widgetDiv);

        // Create script element programmatically so the browser executes it
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js';
        script.async = true;
        script.textContent = JSON.stringify({
            autosize: true,
            symbol: symbol,
            interval: '1',
            timezone: 'Etc/UTC',
            theme: 'dark',
            style: '1',
            locale: 'en',
            backgroundColor: 'rgba(22, 26, 30, 1)',
            gridColor: 'rgba(42, 47, 54, 0.3)',
            allow_symbol_change: true,
            hide_side_toolbar: false,
            calendar: false,
            studies: ['MACD@tv-basicstudies'],
            support_host: 'https://www.tradingview.com'
        });
        container.appendChild(script);
        wrapper.appendChild(container);

        window.dispatchEvent(new Event('chart-ready'));
    }

    // Fire chart-ready once the initial widget loads
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            window.dispatchEvent(new Event('chart-ready'));
        }, 1500);
    });
</script>


<script>
    function tradePanel() {
        return {
            // State
            isDemo: false,
            tradeType: 'binary',
            filterClass: 'crypto',
            selectedAssetId: '',
            selectedAsset: null,
            leverage: 5,
            duration: 5,
            amount: 0,

            // Options
            leverageOptions: [2, 5, 10, 25, 50, 100],
            durationOptions: [
                { value: 1, label: '1m' },
                { value: 5, label: '5m' },
                { value: 15, label: '15m' },
                { value: 30, label: '30m' },
                { value: 60, label: '1h' },
                { value: 240, label: '4h' },
                { value: 1440, label: '1d' },
            ],
            assetClasses: [
                { key: 'crypto', label: 'Crypto' },
                { key: 'forex', label: 'Forex' },
                { key: 'stock', label: 'Stocks' },
                { key: 'etf', label: 'ETFs' },
                { key: 'index', label: 'Indices' },
            ],

            // Asset data from server
            allAssets: <?php echo json_encode($assets, 15, 512) ?>,
            filteredAssets: [],

            init() {
                this.filterAssets();
            },

            filterAssets() {
                this.filteredAssets = this.allAssets.filter(a => a.asset_class === this.filterClass);
                // If current selection not in filtered list, clear it
                if (this.selectedAssetId && !this.filteredAssets.find(a => a.id == this.selectedAssetId)) {
                    this.selectedAssetId = '';
                    this.selectedAsset = null;
                }
            },

            onAssetChange() {
                const id = parseInt(this.selectedAssetId);
                this.selectedAsset = this.allAssets.find(a => a.id === id) || null;
                if (this.selectedAsset) {
                    this.updateChart(this.selectedAsset);
                }
            },

            updateChart(asset) {
                let cleanSymbol = asset.symbol
                    .toUpperCase()
                    .replace(/\//g, '')
                    .replace(/-/g, '')
                    .replace(/\s+/g, '');

                let tvSymbol = '';

                if (asset.asset_class === 'crypto') {
                    if (!cleanSymbol.endsWith('USDT')) {
                        cleanSymbol += 'USDT';
                    }
                    tvSymbol = 'BINANCE:' + cleanSymbol;
                } else if (asset.asset_class === 'forex') {
                    tvSymbol = 'FX:' + cleanSymbol;
                } else if (asset.asset_class === 'index') {
                    tvSymbol = 'TVC:' + cleanSymbol;
                } else if (asset.asset_class === 'etf') {
                    tvSymbol = 'AMEX:' + cleanSymbol;
                } else {
                    tvSymbol = 'NASDAQ:' + cleanSymbol;
                }

                console.log('Loading symbol:', tvSymbol);
                initChart(tvSymbol);
            },

            formatPrice(price) {
                if (!price) return '0.00';
                price = parseFloat(price);
                if (price >= 1) return price.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                if (price >= 0.01) return price.toFixed(4);
                return price.toFixed(6);
            },

            confirmTrade(action) {
                if (!this.selectedAssetId) {
                    Swal.fire({ title: 'Select an Asset', text: 'Please choose an asset before placing a trade.', icon: 'info', background: '#161A1E', color: '#E8EAED' });
                    return;
                }
                if (!this.amount || this.amount <= 0) {
                    Swal.fire({ title: 'Enter Amount', text: 'Please enter a valid trade amount.', icon: 'info', background: '#161A1E', color: '#E8EAED' });
                    return;
                }

                const modeLabel = this.isDemo ? ' (DEMO)' : '';
                const typeLabel = this.tradeType === 'binary' ? 'Binary' : 'Spot';
                const profitLoss = (this.amount * this.leverage / 100).toFixed(2);

                const cs = '<?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?>';

                Swal.fire({
                    title: `Confirm ${action.toUpperCase()} ${typeLabel}${modeLabel}`,
                    html: `
                        <div style="text-align:left; font-size:13px; color:#9BA1A6;">
                            <p><strong>Asset:</strong> ${this.selectedAsset.symbol} — ${this.selectedAsset.name}</p>
                            <p><strong>Entry Price:</strong> ${cs}${this.formatPrice(this.selectedAsset.price)}</p>
                            <p><strong>Amount:</strong> ${cs}${Number(this.amount).toFixed(2)}</p>
                            <p><strong>Leverage:</strong> ${this.leverage}x</p>
                            ${this.tradeType === 'binary' ? '<p><strong>Duration:</strong> ' + this.durationOptions.find(d => d.value === this.duration)?.label + '</p>' : '<p><strong>Duration:</strong> No expiry (spot)</p>'}
                            <p><strong>Potential P/L:</strong> <span style="color:#22C55E">+${cs}${profitLoss}</span> / <span style="color:#EF4444">-${cs}${profitLoss}</span></p>
                        </div>
                    `,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: action === 'buy' ? '#22C55E' : '#EF4444',
                    cancelButtonColor: '#2A2F36',
                    confirmButtonText: `${action.toUpperCase()} Now`,
                    cancelButtonText: "Cancel",
                    background: '#161A1E',
                    color: '#E8EAED'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.$refs.tradeAction.value = action;
                        document.getElementById('tradeForm').submit();
                    }
                });
            }
        };
    }
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const countdowns = document.querySelectorAll('.trade-countdown');
        if (countdowns.length === 0) return;

        setInterval(function() {
            countdowns.forEach(function(el) {
                const expires = new Date(el.dataset.expires).getTime();
                const now = Date.now();
                const diff = expires - now;

                if (diff <= 0) {
                    el.textContent = 'Settling...';
                    el.classList.add('text-warning');
                    // Auto-process expired binary trade
                    const tradeId = el.dataset.tradeId;
                    if (!el.dataset.processing) {
                        el.dataset.processing = 'true';
                        fetch("<?php echo e(route('trades.process')); ?>", {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>' },
                            body: JSON.stringify({ trade_id: tradeId })
                        })
                        .then(r => r.json())
                        .then(data => {
                            if (data.success) {
                                setTimeout(() => location.reload(), 1500);
                            }
                        });
                    }
                    return;
                }

                const h = Math.floor(diff / 3600000);
                const m = Math.floor((diff % 3600000) / 60000);
                const s = Math.floor((diff % 60000) / 1000);
                el.textContent = (h > 0 ? h + 'h ' : '') + m + 'm ' + s + 's';
            });
        }, 1000);
    });
</script>


<script>
    function requestCloseSpot(tradeId) {
        Swal.fire({
            title: 'Request Close?',
            text: 'This will send a close request to admin for settlement.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#2A2F36',
            confirmButtonText: 'Yes, Request Close',
            background: '#161A1E',
            color: '#E8EAED'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch("<?php echo e(route('trades.requestClose')); ?>", {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>' },
                    body: JSON.stringify({ trade_id: tradeId })
                })
                .then(r => r.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({ title: 'Submitted', text: data.message, icon: 'success', background: '#161A1E', color: '#E8EAED' })
                            .then(() => location.reload());
                    } else {
                        Swal.fire({ title: 'Error', text: data.message, icon: 'error', background: '#161A1E', color: '#E8EAED' });
                    }
                });
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/user/trades/trade.blade.php ENDPATH**/ ?>