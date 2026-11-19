
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

    <?php echo $__env->make('user.partials.page-header', ['title' => 'Portfolio', 'subtitle' => 'Consolidated view of all your assets and positions'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php
        $tabLabels = [
            'overview'     => ['label' => 'Overview',      'icon' => 'squares-2x2'],
            'trading'      => ['label' => 'Trading',       'icon' => 'chart-bar'],
            'investments'  => ['label' => 'Investments',   'icon' => 'banknotes'],
            'copy_trading' => ['label' => 'Copy Trading',  'icon' => 'copy'],
            'bot_trading'  => ['label' => 'Bot Trading',   'icon' => 'cpu-chip'],
            'pre_ipo'      => ['label' => 'Pre-IPO',       'icon' => 'building-office'],
            'stocktrading' => ['label' => 'Stocks',         'icon' => 'chart-bar'],
            'nfts'         => ['label' => 'NFTs',          'icon' => 'gem'],
            'loans'        => ['label' => 'Loans',         'icon' => 'hand-raised'],
        ];
    ?>

    
    <div class="bg-surface-raised border border-surface-border rounded-xl p-6 mb-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div>
                <span class="text-xs text-content-tertiary uppercase tracking-wider block mb-1">Net Worth</span>
                <span class="text-2xl font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($netWorth); ?></span>
                <span class="text-xs text-content-tertiary block mt-0.5">All assets combined</span>
            </div>
            <div>
                <span class="text-xs text-content-tertiary uppercase tracking-wider block mb-1">Total Invested</span>
                <span class="text-xl font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($totalInvested); ?></span>
                <span class="text-xs text-content-tertiary block mt-0.5">Across all modules</span>
            </div>
            <div>
                <span class="text-xs text-content-tertiary uppercase tracking-wider block mb-1">Total P/L</span>
                <span class="text-xl font-bold <?php echo e($totalPL >= 0 ? 'text-gain' : 'text-loss'); ?>">
                    <?php echo \App\Helpers\CurrencyHelper::formatForUser($totalPL); ?>
                </span>
                <span class="text-xs text-content-tertiary block mt-0.5">Realized + unrealized</span>
            </div>
            <div>
                <span class="text-xs text-content-tertiary uppercase tracking-wider block mb-1">Account Balance</span>
                <span class="text-xl font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($user->account_bal ?? 0); ?></span>
                <span class="text-xs text-content-tertiary block mt-0.5">Available cash</span>
            </div>
        </div>
    </div>

    
    <div x-data="{ tab: 'overview' }">
        
        <div class="mb-6 -mx-1 overflow-x-auto scrollbar-none">
            <div class="flex items-center gap-1 min-w-max px-1" role="tablist" aria-label="Portfolio sections">
                <?php $__currentLoopData = $tabLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $meta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($tabs[$key])): ?>
                        <button @click="tab = '<?php echo e($key); ?>'"
                                :class="tab === '<?php echo e($key); ?>' ? 'bg-primary text-content-inverse' : 'bg-surface-overlay text-content-secondary hover:text-content-primary hover:bg-surface-overlay/80'"
                                class="inline-flex items-center gap-1.5 px-3 py-2 text-sm font-medium rounded-lg transition-colors whitespace-nowrap"
                                role="tab"
                                :aria-selected="tab === '<?php echo e($key); ?>' ? 'true' : 'false'">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => ''.e($meta['icon']).'','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => ''.e($meta['icon']).'','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php echo e($meta['label']); ?>

                        </button>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        
        <?php if(!empty($tabs['overview'])): ?>
            <div x-show="tab === 'overview'" x-cloak>
                <?php echo $__env->make('user.trades.partials.portfolio-tab-overview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>

        <?php if(!empty($tabs['trading'])): ?>
            <div x-show="tab === 'trading'" x-cloak>
                <?php echo $__env->make('user.trades.partials.portfolio-tab-trading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>

        <?php if(!empty($tabs['investments'])): ?>
            <div x-show="tab === 'investments'" x-cloak>
                <?php echo $__env->make('user.trades.partials.portfolio-tab-investments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>

        <?php if(!empty($tabs['copy_trading'])): ?>
            <div x-show="tab === 'copy_trading'" x-cloak>
                <?php echo $__env->make('user.trades.partials.portfolio-tab-copy-trading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>

        <?php if(!empty($tabs['bot_trading'])): ?>
            <div x-show="tab === 'bot_trading'" x-cloak>
                <?php echo $__env->make('user.trades.partials.portfolio-tab-bot-trading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>

        <?php if(!empty($tabs['pre_ipo'])): ?>
            <div x-show="tab === 'pre_ipo'" x-cloak>
                <?php echo $__env->make('user.trades.partials.portfolio-tab-pre-ipo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>

        <?php if(!empty($tabs['stocktrading'])): ?>
            <div x-show="tab === 'stocktrading'" x-cloak>
                <?php echo $__env->make('user.trades.partials.portfolio-tab-stocks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>

        <?php if(!empty($tabs['nfts'])): ?>
            <div x-show="tab === 'nfts'" x-cloak>
                <?php echo $__env->make('user.trades.partials.portfolio-tab-nfts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>

        <?php if(!empty($tabs['loans'])): ?>
            <div x-show="tab === 'loans'" x-cloak>
                <?php echo $__env->make('user.trades.partials.portfolio-tab-loans', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\trades\portfolio.blade.php ENDPATH**/ ?>