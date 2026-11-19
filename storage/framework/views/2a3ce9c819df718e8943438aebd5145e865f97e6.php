
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

    
    <div class="mb-4">
        <a href="<?php echo e(route('copyTrading')); ?>" class="inline-flex items-center gap-1.5 text-sm text-content-secondary hover:text-primary transition-colors">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'arrow-left','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'arrow-left','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            Back to Copy Trading
        </a>
    </div>

    <?php echo $__env->make('user.partials.page-header', ['title' => 'Position Details', 'subtitle' => 'Tracking your copy of ' . ($position->expert->name ?? 'Unknown Expert')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="bg-surface-raised border border-surface-border rounded-xl p-5 mb-6">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
                <?php if($position->expert && $position->expert->profile_picture): ?>
                    <img src="<?php echo e(asset('storage/app/public/' . $position->expert->profile_picture)); ?>" class="w-12 h-12 rounded-full object-cover">
                <?php else: ?>
                    <div class="w-12 h-12 rounded-full bg-surface-overlay flex items-center justify-center">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'user','class' => 'w-6 h-6 text-content-tertiary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'user','class' => 'w-6 h-6 text-content-tertiary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                <?php endif; ?>
                <div>
                    <h3 class="font-semibold text-content-primary"><?php echo e($position->expert->name ?? 'Unknown'); ?></h3>
                    <a href="<?php echo e(route('copyTrading.expert', $position->expert_id)); ?>" class="text-xs text-primary hover:text-primary-dark">View Expert Profile</a>
                </div>
            </div>
            <?php
                $statusClass = match($position->status) {
                    'active' => 'bg-gain/10 text-gain',
                    'stopped' => 'bg-loss/10 text-loss',
                    'completed' => 'bg-primary-subtle text-primary',
                    'settled' => 'bg-warning/10 text-warning',
                    default => 'bg-surface-overlay text-content-tertiary',
                };
            ?>
            <span class="text-xs px-2.5 py-1 rounded-full <?php echo e($statusClass); ?>"><?php echo e(ucfirst($position->status)); ?></span>
        </div>

        
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 mb-5">
            <div class="bg-surface-overlay rounded-lg p-3 text-center">
                <p class="text-xs text-content-tertiary mb-0.5">Invested</p>
                <p class="text-sm font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($position->invested_amount); ?></p>
            </div>
            <div class="bg-surface-overlay rounded-lg p-3 text-center">
                <p class="text-xs text-content-tertiary mb-0.5">Profit</p>
                <p class="text-sm font-bold text-gain"><?php echo \App\Helpers\CurrencyHelper::formatForUser($position->accumulated_profit); ?></p>
            </div>
            <div class="bg-surface-overlay rounded-lg p-3 text-center">
                <p class="text-xs text-content-tertiary mb-0.5">Daily ROI</p>
                <p class="text-sm font-bold text-gain"><?php echo e(number_format($position->daily_roi_snapshot, 2)); ?>%</p>
            </div>
            <div class="bg-surface-overlay rounded-lg p-3 text-center">
                <p class="text-xs text-content-tertiary mb-0.5">Total Payout</p>
                <p class="text-sm font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($position->totalPayout()); ?></p>
            </div>
            <div class="bg-surface-overlay rounded-lg p-3 text-center">
                <p class="text-xs text-content-tertiary mb-0.5">Started</p>
                <p class="text-sm font-bold text-content-primary"><?php echo e($position->started_at->format('M d, Y')); ?></p>
            </div>
            <div class="bg-surface-overlay rounded-lg p-3 text-center">
                <p class="text-xs text-content-tertiary mb-0.5">Expires</p>
                <p class="text-sm font-bold text-content-primary"><?php echo e($position->expires_at->format('M d, Y')); ?></p>
            </div>
        </div>

        
        <?php
            $totalDays = $position->started_at->diffInDays($position->expires_at);
            $elapsed = $position->started_at->diffInDays(now());
            $pct = $totalDays > 0 ? min(100, round(($elapsed / $totalDays) * 100)) : 100;
            $remaining = max(0, $totalDays - $elapsed);
        ?>
        <div class="mb-5">
            <div class="flex items-center justify-between text-xs text-content-tertiary mb-1.5">
                <span>Day <?php echo e(min($elapsed, $totalDays)); ?> of <?php echo e($totalDays); ?></span>
                <span><?php echo e($pct); ?>% complete &mdash; <?php echo e($remaining); ?> days remaining</span>
            </div>
            <div class="bg-surface-overlay rounded-full h-2.5">
                <div class="bg-primary rounded-full h-2.5 transition-all" style="width: <?php echo e($pct); ?>%"></div>
            </div>
        </div>

        
        <?php if($position->status === 'active'): ?>
            <form id="stop-position-form" action="<?php echo e(route('copyTrading.stop', $position->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="button" id="stopPositionBtn" class="py-2 px-6 rounded-lg bg-loss/10 hover:bg-loss/20 text-loss text-sm font-semibold transition-colors">
                    Stop Copying
                </button>
            </form>
        <?php endif; ?>

        <?php if($position->settled_at): ?>
            <p class="text-xs text-content-tertiary mt-3">
                Settled on <?php echo e($position->settled_at->format('M d, Y H:i')); ?> by <?php echo e($position->settled_by ?? 'system'); ?>

                <?php if($position->admin_profit_adjustment): ?>
                    &mdash; Admin adjustment: <?php echo \App\Helpers\CurrencyHelper::formatForUser($position->admin_profit_adjustment); ?>
                <?php endif; ?>
            </p>
        <?php endif; ?>
    </div>

    
    <div class="bg-surface-raised border border-surface-border rounded-xl overflow-hidden">
        <div class="p-5 border-b border-surface-border flex items-center justify-between">
            <h3 class="text-base font-semibold text-content-primary"> Trades</h3>
            <span class="text-xs text-content-tertiary"><?php echo e($trades->total()); ?> trades</span>
        </div>
        <?php if($trades->count() > 0): ?>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-content-tertiary text-xs border-b border-surface-border">
                            <th class="text-left px-5 py-3 font-medium">Asset</th>
                            <th class="text-left px-5 py-3 font-medium">Class</th>
                            <th class="text-left px-5 py-3 font-medium">Action</th>
                            <th class="text-right px-5 py-3 font-medium">Entry</th>
                            <th class="text-right px-5 py-3 font-medium">Exit</th>
                            <th class="text-right px-5 py-3 font-medium">Amount</th>
                            <th class="text-right px-5 py-3 font-medium">P/L</th>
                            <th class="text-left px-5 py-3 font-medium">Result</th>
                            <th class="text-left px-5 py-3 font-medium">Time</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-border">
                        <?php $__currentLoopData = $trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="text-content-secondary hover:bg-surface-overlay/50">
                                <td class="px-5 py-3 font-medium text-content-primary">
                                    <div class="flex items-center gap-2">
                                        <?php if($trade->tradingAsset && $trade->tradingAsset->logo_url): ?>
                                            <img src="<?php echo e($trade->tradingAsset->logo_url); ?>" alt="<?php echo e($trade->asset_name); ?>" class="w-6 h-6 rounded-full bg-surface-overlay flex-shrink-0" loading="lazy">
                                        <?php else: ?>
                                            <span class="w-6 h-6 rounded-full bg-primary/20 text-primary text-[10px] font-bold flex items-center justify-center flex-shrink-0"><?php echo e(strtoupper(substr($trade->asset_name, 0, 2))); ?></span>
                                        <?php endif; ?>
                                        <span><?php echo e($trade->asset_name); ?></span>
                                    </div>
                                </td>
                                <td class="px-5 py-3 text-xs"><?php echo e($trade->asset_class); ?></td>
                                <td class="px-5 py-3">
                                    <span class="<?php echo e($trade->action === 'buy' ? 'text-gain' : 'text-loss'); ?>"><?php echo e(strtoupper($trade->action)); ?></span>
                                </td>
                                <td class="px-5 py-3 text-right"><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->entry_price); ?></td>
                                <td class="px-5 py-3 text-right"><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->exit_price); ?></td>
                                <td class="px-5 py-3 text-right"><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->amount); ?></td>
                                <td class="px-5 py-3 text-right font-semibold <?php echo e($trade->profit_loss >= 0 ? 'text-gain' : 'text-loss'); ?>">
                                    <?php echo e($trade->profit_loss >= 0 ? '+' : ''); ?><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->profit_loss); ?>
                                </td>
                                <td class="px-5 py-3">
                                    <span class="<?php echo e($trade->result === 'WIN' ? 'text-gain' : 'text-loss'); ?>"><?php echo e($trade->result); ?></span>
                                </td>
                                <td class="px-5 py-3 text-content-tertiary text-xs"><?php echo e($trade->executed_at->format('M d H:i')); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="p-5 border-t border-surface-border"><?php echo e($trades->links()); ?></div>
        <?php else: ?>
            <div class="p-8 text-center">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'chart-bar','class' => 'w-10 h-10 text-content-tertiary mx-auto mb-2']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'chart-bar','class' => 'w-10 h-10 text-content-tertiary mx-auto mb-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <p class="text-content-secondary text-sm">No trades yet. Trades are generated automatically.</p>
            </div>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
const stopBtn = document.getElementById('stopPositionBtn');
if (stopBtn) {
    stopBtn.addEventListener('click', function() {
        Swal.fire({
            title: 'Stop Copying?',
            text: 'Your invested amount plus accumulated profit will be credited to your balance.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#2A2F36',
            confirmButtonText: 'Yes, Stop',
            cancelButtonText: 'Cancel',
            background: '#161A1E',
            color: '#E8EAED'
        }).then((result) => {
            if (result.isConfirmed) document.getElementById('stop-position-form').submit();
        });
    });
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\copy_trading\position.blade.php ENDPATH**/ ?>