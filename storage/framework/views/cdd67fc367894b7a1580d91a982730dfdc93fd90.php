
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

    
    <?php echo $__env->make('user.partials.quick-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
        <div>
            <h2 class="text-xl font-bold text-content-primary">Trade History</h2>
            <p class="text-sm text-content-secondary mt-1">Review all your open and closed trades</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="<?php echo e(route('user.trades.positions')); ?>" class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary text-sm font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-primary">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'bolt','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'bolt','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <span class="hidden sm:inline">Positions</span>
            </a>
            <a href="<?php echo e(route('trade')); ?>" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-surface-base">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'chart-bar','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'chart-bar','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                Trade Now
            </a>
        </div>
    </div>

    
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 mb-6">
        <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Total Trades', 'value' => $stats['total'], 'icon' => 'chart-bar', 'color' => 'info'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Open', 'value' => $stats['open_count'], 'icon' => 'folder-open', 'color' => 'primary'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Closed', 'value' => $stats['closed_count'], 'icon' => 'folder', 'color' => 'warning'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Wins', 'value' => $stats['wins'], 'icon' => 'arrow-trending-up', 'color' => 'gain'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card-compact', ['label' => 'Losses', 'value' => $stats['losses'], 'icon' => 'arrow-trending-down', 'color' => 'loss'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card-compact', [
            'label' => 'Net P/L',
            'value' => \App\Helpers\CurrencyHelper::formatForUser($stats['net_pl']),
            'icon' => 'banknotes',
            'color' => $stats['net_pl'] >= 0 ? 'gain' : 'loss'
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    
    <?php echo $__env->make('user.trades.partials.trade-filters', [
        'currentType' => request('type', 'all'),
        'currentStatus' => request('status', 'all'),
        'currentDemo' => request('demo', 'all'),
        'currentSearch' => request('search', ''),
        'baseUrl' => route('user.trades.history'),
        'stats' => $stats,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="mt-6 rounded-xl bg-surface-raised border border-surface-border overflow-hidden">
        <div class="px-5 py-3 border-b border-surface-border flex items-center justify-between">
            <div class="flex items-center gap-2">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'clock','class' => 'w-5 h-5 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'clock','class' => 'w-5 h-5 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <h3 class="text-sm font-semibold text-content-primary">
                    Trades
                    <span class="text-content-tertiary font-normal">(<?php echo e($trades->total()); ?>)</span>
                </h3>
            </div>
            <p class="text-xs text-content-tertiary hidden sm:block">
                Showing <?php echo e($trades->firstItem() ?? 0); ?>–<?php echo e($trades->lastItem() ?? 0); ?> of <?php echo e($trades->total()); ?>

            </p>
        </div>

        <div id="trade-history-container">
            <?php echo $__env->make('user.trades.partials.history_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        
        <?php if($trades->hasPages()): ?>
            <div class="px-5 py-3 border-t border-surface-border">
                <?php echo e($trades->links()); ?>

            </div>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
    function updateCountdowns() {
        document.querySelectorAll('.countdown-timer').forEach((el) => {
            const expiryTimestamp = parseInt(el.getAttribute('data-expiry')) * 1000;
            const now = Date.now();
            const timeLeft = expiryTimestamp - now;

            if (timeLeft > 0) {
                const hours = Math.floor(timeLeft / 3600000);
                const minutes = Math.floor((timeLeft % 3600000) / 60000);
                const seconds = Math.floor((timeLeft % 60000) / 1000);
                el.textContent = hours > 0 ? `${hours}h ${minutes}m ${seconds}s` : `${minutes}m ${seconds}s`;

                // Pulse when <= 1 minute
                if (timeLeft <= 60000) {
                    el.classList.add('animate-pulse');
                }
            } else {
                el.textContent = "Settling...";
                el.classList.remove('text-warning', 'animate-pulse');
                el.classList.add('text-content-tertiary');

                const row = el.closest('[data-trade-id]');
                const tradeId = row?.getAttribute('data-trade-id');
                if (tradeId && !el.dataset.processing) {
                    el.dataset.processing = '1';
                    processExpiredTrade(tradeId, row);
                }
            }
        });
    }

    function processExpiredTrade(tradeId, row) {
        fetch("<?php echo e(route('trades.process')); ?>", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ trade_id: tradeId })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // Refresh the page to show updated data
                window.location.reload();
            }
        })
        .catch(err => console.error('Trade processing error:', err));
    }

    setInterval(updateCountdowns, 1000);
    updateCountdowns();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\trades\history.blade.php ENDPATH**/ ?>