
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

    
    <div class="bg-surface-raised border border-surface-border rounded-xl p-6 mb-6">
        <div class="flex items-start gap-5">
            
            <div class="relative flex-shrink-0">
                <?php if($expert->profile_picture): ?>
                    <img src="<?php echo e(asset('storage/app/public/' . $expert->profile_picture)); ?>" alt="<?php echo e($expert->name); ?>" class="w-20 h-20 rounded-2xl object-cover ring-2 ring-surface-border">
                <?php else: ?>
                    <div class="w-20 h-20 rounded-2xl bg-surface-overlay flex items-center justify-center ring-2 ring-surface-border">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'user-circle','class' => 'w-10 h-10 text-content-tertiary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'user-circle','class' => 'w-10 h-10 text-content-tertiary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                <?php endif; ?>
                <span class="absolute -bottom-1 -right-1 w-4 h-4 bg-gain rounded-full border-2 border-surface-raised" title="Active"></span>
            </div>

            
            <div class="flex-1 min-w-0">
                <div class="flex items-center gap-3 flex-wrap">
                    <h2 class="text-xl font-bold text-content-primary"><?php echo e($expert->name); ?></h2>
                    <span class="bg-primary/10 text-primary text-xs font-medium px-2 py-0.5 rounded"><?php echo e($expert->area_of_expertise); ?></span>
                </div>
                <?php if($expert->bio): ?>
                    <p class="text-sm text-content-secondary leading-relaxed mt-2 line-clamp-2"><?php echo e($expert->bio); ?></p>
                <?php endif; ?>
                <div class="flex items-center gap-4 mt-3 text-xs text-content-tertiary">
                    <span class="flex items-center gap-1">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'users','class' => 'w-3.5 h-3.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'users','class' => 'w-3.5 h-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php echo e(number_format($expert->followers_count)); ?> followers
                    </span>
                    <span class="flex items-center gap-1">
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
                        <?php echo e($expert->duration_days); ?>-day plan
                    </span>
                    <span class="flex items-center gap-1">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'chart-bar','class' => 'w-3.5 h-3.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'chart-bar','class' => 'w-3.5 h-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php echo e(number_format($expert->win_rate ?? 0)); ?>% win rate
                    </span>
                </div>
            </div>

            
            <div class="hidden sm:flex flex-col items-end flex-shrink-0">
                <p class="text-2xl font-bold text-gain"><?php echo e(number_format($expert->daily_roi, 2)); ?>%</p>
                <p class="text-[11px] text-content-tertiary">daily ROI</p>
            </div>
        </div>
    </div>

    
    <div class="grid grid-cols-3 sm:grid-cols-6 gap-3 mb-6">
        <div class="bg-surface-raised border border-surface-border rounded-xl p-3.5 text-center">
            <p class="text-[10px] text-content-tertiary uppercase tracking-wide mb-1">Daily ROI</p>
            <p class="text-base font-bold text-gain"><?php echo e(number_format($expert->daily_roi, 2)); ?>%</p>
        </div>
        <div class="bg-surface-raised border border-surface-border rounded-xl p-3.5 text-center">
            <p class="text-[10px] text-content-tertiary uppercase tracking-wide mb-1">Duration</p>
            <p class="text-base font-bold text-content-primary"><?php echo e($expert->duration_days); ?>d</p>
        </div>
        <div class="bg-surface-raised border border-surface-border rounded-xl p-3.5 text-center">
            <p class="text-[10px] text-content-tertiary uppercase tracking-wide mb-1">Min Capital</p>
            <p class="text-base font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($expert->min_startup_capital); ?></p>
        </div>
        <div class="bg-surface-raised border border-surface-border rounded-xl p-3.5 text-center">
            <p class="text-[10px] text-content-tertiary uppercase tracking-wide mb-1">Max Capital</p>
            <p class="text-base font-bold text-content-primary"><?php echo e($expert->max_capital ? \App\Helpers\CurrencyHelper::formatForUser($expert->max_capital) : '—'); ?></p>
        </div>
        <div class="bg-surface-raised border border-surface-border rounded-xl p-3.5 text-center">
            <p class="text-[10px] text-content-tertiary uppercase tracking-wide mb-1">Followers</p>
            <p class="text-base font-bold text-content-primary"><?php echo e(number_format($expert->followers_count)); ?></p>
        </div>
        <div class="bg-surface-raised border border-surface-border rounded-xl p-3.5 text-center">
            <p class="text-[10px] text-content-tertiary uppercase tracking-wide mb-1">Total ROI</p>
            <p class="text-base font-bold text-gain"><?php echo e(number_format($expert->total_roi, 2)); ?>%</p>
        </div>
    </div>

    
    <?php if($activePosition): ?>
        <div class="bg-surface-raised border border-primary/30 rounded-xl p-5 mb-6">
            <div class="flex items-center gap-2 mb-4">
                <span class="bg-gain/10 text-gain text-xs px-2.5 py-1 rounded-full">Active</span>
                <h3 class="text-base font-semibold text-content-primary">Your Active Position</h3>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-4">
                <div>
                    <p class="text-xs text-content-tertiary">Invested</p>
                    <p class="text-sm font-semibold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($activePosition->invested_amount); ?></p>
                </div>
                <div>
                    <p class="text-xs text-content-tertiary">Profit</p>
                    <p class="text-sm font-semibold text-gain"><?php echo \App\Helpers\CurrencyHelper::formatForUser($activePosition->accumulated_profit); ?></p>
                </div>
                <div>
                    <p class="text-xs text-content-tertiary">ROI Locked</p>
                    <p class="text-sm font-semibold text-gain"><?php echo e(number_format($activePosition->daily_roi_snapshot, 2)); ?>%</p>
                </div>
                <div>
                    <p class="text-xs text-content-tertiary">Expires</p>
                    <p class="text-sm font-semibold text-content-primary"><?php echo e($activePosition->expires_at->format('M d, Y')); ?></p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <a href="<?php echo e(route('copyTrading.position', $activePosition->id)); ?>" class="py-2 px-5 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-semibold transition-colors">
                    View Position
                </a>
                <form id="stop-expert-form" action="<?php echo e(route('copyTrading.stop', $activePosition->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="button" id="stopExpertBtn" class="py-2 px-5 rounded-lg bg-loss/10 hover:bg-loss/20 text-loss text-sm font-semibold transition-colors">
                        Stop Copying
                    </button>
                </form>
            </div>
        </div>
    <?php else: ?>
        <div class="bg-surface-raised border border-surface-border rounded-xl p-5 mb-6" x-data="{ amount: '' }">
            <h3 class="text-base font-semibold text-content-primary mb-4">Start Copying <?php echo e($expert->name); ?></h3>
            <form action="<?php echo e(route('copyTrading.start', $expert->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-4">
                    <label class="block text-sm text-content-secondary mb-1.5">Investment Amount (<?php echo \App\Helpers\CurrencyHelper::getUserCode(); ?>)</label>
                    <input type="number" name="invested_amount" x-model="amount" step="0.01"
                           min="<?php echo e(round(Auth::user()->convertToUserCurrency($expert->min_startup_capital), 2)); ?>"
                           <?php if($expert->max_capital): ?> max="<?php echo e(round(Auth::user()->convertToUserCurrency($expert->max_capital), 2)); ?>" <?php endif; ?>
                           class="w-full bg-surface-overlay border border-surface-border rounded-lg px-4 py-2.5 text-content-primary placeholder-content-tertiary focus:border-primary focus:ring-1 focus:ring-primary outline-none text-sm"
                           placeholder="Min <?php echo e(\App\Helpers\CurrencyHelper::formatForUser($expert->min_startup_capital)); ?>" required>
                    <?php $__errorArgs = ['invested_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-loss text-xs mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="flex items-center justify-between text-sm text-content-secondary mb-4">
                    <span>Estimated Daily Profit:</span>
                    <span class="font-semibold text-gain" x-text="amount ? '<?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?>' + (parseFloat(amount) * <?php echo e($expert->daily_roi); ?> / 100).toFixed(2) : '<?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?>' + '0.00'"></span>
                </div>
                <button type="submit" class="w-full py-2.5 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-semibold transition-colors">
                    Start Copying — <?php echo e($expert->duration_days); ?> Day Plan
                </button>
            </form>
        </div>
    <?php endif; ?>

    
    <?php if($recentTrades->count() > 0): ?>
        <div class="bg-surface-raised border border-surface-border rounded-xl overflow-hidden">
            <div class="p-5 border-b border-surface-border">
                <h3 class="text-base font-semibold text-content-primary">Recent Simulated Trades</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-content-tertiary text-xs border-b border-surface-border">
                            <th class="text-left px-5 py-3 font-medium">Asset</th>
                            <th class="text-left px-5 py-3 font-medium">Action</th>
                            <th class="text-right px-5 py-3 font-medium">Entry</th>
                            <th class="text-right px-5 py-3 font-medium">Exit</th>
                            <th class="text-right px-5 py-3 font-medium">P/L</th>
                            <th class="text-left px-5 py-3 font-medium">Result</th>
                            <th class="text-left px-5 py-3 font-medium">Time</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-border">
                        <?php $__currentLoopData = $recentTrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="text-content-secondary hover:bg-surface-overlay/50">
                                <td class="px-5 py-3 font-medium text-content-primary"><?php echo e($trade->asset_name); ?></td>
                                <td class="px-5 py-3">
                                    <span class="<?php echo e($trade->action === 'buy' ? 'text-gain' : 'text-loss'); ?>"><?php echo e(strtoupper($trade->action)); ?></span>
                                </td>
                                <td class="px-5 py-3 text-right"><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->entry_price); ?></td>
                                <td class="px-5 py-3 text-right"><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->exit_price); ?></td>
                                <td class="px-5 py-3 text-right font-semibold <?php echo e($trade->profit_loss >= 0 ? 'text-gain' : 'text-loss'); ?>">
                                    <?php echo e($trade->profit_loss >= 0 ? '+' : ''); ?><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->profit_loss); ?>
                                </td>
                                <td class="px-5 py-3">
                                    <span class="<?php echo e($trade->result === 'WIN' ? 'text-gain' : 'text-loss'); ?>"><?php echo e($trade->result); ?></span>
                                </td>
                                <td class="px-5 py-3 text-content-tertiary text-xs"><?php echo e($trade->executed_at->diffForHumans()); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
const stopBtn = document.getElementById('stopExpertBtn');
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
            if (result.isConfirmed) document.getElementById('stop-expert-form').submit();
        });
    });
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\copy_trading\show.blade.php ENDPATH**/ ?>