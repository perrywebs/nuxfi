

<?php if($trades->count() > 0): ?>
    
    <div class="hidden md:block overflow-x-auto">
        <table class="w-full text-sm" role="table">
            <caption class="sr-only">Trade history table showing your binary and spot trades</caption>
            <thead>
                <tr class="border-b border-surface-border">
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Asset</th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Type</th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Direction</th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Amount</th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Leverage</th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">
                        <span class="hidden lg:inline">Entry</span>
                        <span class="lg:hidden">Entry</span>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'arrow-long-right','class' => 'w-3 h-3 inline text-content-tertiary mx-0.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'arrow-long-right','class' => 'w-3 h-3 inline text-content-tertiary mx-0.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <span>Exit</span>
                    </th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-content-tertiary uppercase tracking-wider">Result</th>
                    <th scope="col" class="px-4 py-3 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">P/L</th>
                    <th scope="col" class="px-4 py-3 text-right text-xs font-medium text-content-tertiary uppercase tracking-wider">Time</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-surface-border">
                <?php $__currentLoopData = $trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr data-trade-id="<?php echo e($trade->id); ?>"
                        class="hover:bg-surface-overlay/50 transition-colors cursor-pointer group"
                        onclick="window.location='<?php echo e(route('user.trades.show', $trade->id)); ?>'"
                        role="link"
                        tabindex="0"
                        aria-label="View trade <?php echo e($trade->asset_name); ?>">
                        
                        <td class="px-4 py-3">
                            <?php echo $__env->make('user.trades.partials.asset-cell', ['trade' => $trade], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </td>
                        
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-1">
                                <span class="inline-flex items-center px-1.5 py-0.5 text-[10px] font-semibold rounded <?php echo e(($trade->trade_type ?? 'binary') === 'binary' ? 'bg-info/10 text-info' : 'bg-primary/10 text-primary'); ?>">
                                    <?php echo e(ucfirst($trade->trade_type ?? 'binary')); ?>

                                </span>
                                <?php if($trade->is_demo): ?>
                                    <span class="inline-flex items-center px-1.5 py-0.5 text-[10px] font-semibold rounded bg-warning/10 text-warning">DEMO</span>
                                <?php endif; ?>
                            </div>
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
                        </td>
                        
                        <td class="px-4 py-3 text-content-primary font-medium"><?php echo \App\Helpers\CurrencyHelper::formatForUser($trade->amount); ?></td>
                        
                        <td class="px-4 py-3">
                            <span class="px-1.5 py-0.5 text-xs font-medium rounded bg-surface-overlay text-content-secondary"><?php echo e($trade->leverage); ?>x</span>
                        </td>
                        
                        <td class="px-4 py-3 text-xs">
                            <?php
                                $entryStr = $trade->entry_price ? \App\Helpers\CurrencyHelper::formatForUser($trade->entry_price) : '—';
                                $exitStr = $trade->exit_price ? \App\Helpers\CurrencyHelper::formatForUser($trade->exit_price) : '—';
                                $priceGain = $trade->exit_price && $trade->entry_price
                                    ? ($trade->action === 'buy'
                                        ? $trade->exit_price >= $trade->entry_price
                                        : $trade->exit_price <= $trade->entry_price)
                                    : null;
                            ?>
                            <span class="text-content-secondary"><?php echo e($entryStr); ?></span>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'arrow-long-right','class' => 'w-3 h-3 inline text-content-tertiary mx-0.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'arrow-long-right','class' => 'w-3 h-3 inline text-content-tertiary mx-0.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <span class="<?php echo e($priceGain === true ? 'text-gain' : ($priceGain === false ? 'text-loss' : 'text-content-secondary')); ?>"><?php echo e($exitStr); ?></span>
                        </td>
                        
                        <td class="px-4 py-3 trade-status">
                            <?php if($trade->status === 'closed'): ?>
                                <span class="inline-flex items-center px-2 py-0.5 text-xs font-medium rounded-full bg-surface-overlay text-content-tertiary">
                                    <span class="w-1.5 h-1.5 rounded-full bg-content-tertiary mr-1.5" aria-hidden="true"></span>
                                    Closed
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center px-2 py-0.5 text-xs font-medium rounded-full bg-info/10 text-info">
                                    <span class="w-1.5 h-1.5 rounded-full bg-info mr-1.5 animate-pulse" aria-hidden="true"></span>
                                    Open
                                </span>
                            <?php endif; ?>
                        </td>
                        
                        <td class="px-4 py-3 trade-result">
                            <?php if($trade->result === 'WIN'): ?>
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 text-xs font-medium rounded-full bg-gain/10 text-gain">
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
<?php endif; ?>
                                    WIN
                                </span>
                            <?php elseif($trade->result === 'LOSS'): ?>
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 text-xs font-medium rounded-full bg-loss/10 text-loss">
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
<?php endif; ?>
                                    LOSS
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 text-xs font-medium rounded-full bg-warning/10 text-warning">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'clock','class' => 'w-3 h-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'clock','class' => 'w-3 h-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    PENDING
                                </span>
                            <?php endif; ?>
                        </td>
                        
                        <td class="px-4 py-3 text-right trade-profit">
                            <?php echo $__env->make('user.trades.partials.pnl-display', ['value' => $trade->profit_loss], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </td>
                        
                        <td class="px-4 py-3 text-right text-xs">
                            <?php if($trade->status === 'closed'): ?>
                                <span class="text-content-tertiary" title="<?php echo e(\Carbon\Carbon::parse($trade->created_at)->format('Y-m-d H:i:s')); ?>">
                                    <?php echo e(\Carbon\Carbon::parse($trade->created_at)->diffForHumans()); ?>

                                </span>
                                <?php if($trade->settled_by): ?>
                                    <span class="block text-[10px] text-content-tertiary mt-0.5">by <?php echo e(ucfirst($trade->settled_by)); ?></span>
                                <?php endif; ?>
                            <?php elseif(($trade->trade_type ?? 'binary') === 'spot'): ?>
                                <?php if($trade->close_requested_at): ?>
                                    <span class="text-warning font-medium">Close Pending</span>
                                <?php else: ?>
                                    <span class="text-content-tertiary italic">No expiry</span>
                                <?php endif; ?>
                            <?php elseif($trade->expires_at): ?>
                                <span class="countdown-timer text-warning font-medium" data-expiry="<?php echo e(\Carbon\Carbon::parse($trade->expires_at)->timestamp); ?>" aria-live="polite"></span>
                            <?php else: ?>
                                <span class="text-content-tertiary">—</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    
    <div class="md:hidden divide-y divide-surface-border">
        <?php $__currentLoopData = $trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('user.trades.partials.trade-card-mobile', ['trade' => $trade], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>
    <?php echo $__env->make('user.trades.partials.empty-state', [
        'icon' => 'chart-bar',
        'title' => 'No trades found',
        'message' => request()->hasAny(['type', 'status', 'demo', 'search'])
            ? 'No trades match your current filters. Try adjusting or clearing your filters.'
            : 'You haven\'t placed any trades yet. Start trading to see your history here.',
        'actionUrl' => request()->hasAny(['type', 'status', 'demo', 'search'])
            ? route('user.trades.history')
            : route('trade'),
        'actionLabel' => request()->hasAny(['type', 'status', 'demo', 'search'])
            ? 'Clear Filters'
            : 'Place a Trade',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\trades\partials\history_table.blade.php ENDPATH**/ ?>