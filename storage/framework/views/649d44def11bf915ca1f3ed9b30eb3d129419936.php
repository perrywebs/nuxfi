
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
    <?php echo $__env->make('user.partials.page-header', ['title' => 'Bot Trading', 'subtitle' => 'Subscribe to automated trading bots and earn passive profits'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div x-data="{ tab: 'bots' }">
        <div class="flex items-center gap-1 border-b border-surface-border mb-6">
            <button @click="tab = 'bots'" :class="tab === 'bots' ? 'border-b-2 border-primary text-primary font-medium' : 'text-content-tertiary hover:text-content-secondary'" class="px-4 py-2.5 text-sm transition-colors">
                Available Bots
            </button>
            <button @click="tab = 'subscriptions'" :class="tab === 'subscriptions' ? 'border-b-2 border-primary text-primary font-medium' : 'text-content-tertiary hover:text-content-secondary'" class="px-4 py-2.5 text-sm transition-colors">
                My Subscriptions
                <?php if($subscriptions->where('status', 'active')->count() > 0): ?>
                    <span class="ml-1 bg-primary/20 text-primary text-xs px-1.5 py-0.5 rounded-full"><?php echo e($subscriptions->where('status', 'active')->count()); ?></span>
                <?php endif; ?>
            </button>
        </div>

        
        <div x-show="tab === 'bots'">
            <?php if($bots->count() > 0): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
                    <?php $__currentLoopData = $bots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('botTrading.bot', $bot->id)); ?>" class="group block bg-surface-raised border border-surface-border rounded-xl p-5 hover:border-primary/40 hover:shadow-lg hover:shadow-primary/5 transition-all duration-200">
                            
                            <div class="flex items-center gap-3.5 mb-4">
                                <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center ring-2 ring-surface-border group-hover:ring-primary/40 transition-all">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'cpu-chip','class' => 'w-6 h-6 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'cpu-chip','class' => 'w-6 h-6 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h4 class="text-sm font-semibold text-content-primary truncate group-hover:text-primary transition-colors"><?php echo e($bot->name); ?></h4>
                                    <div class="flex items-center gap-2 mt-0.5">
                                        <?php
                                            $strategyColors = ['scalping' => 'bg-warning/10 text-warning', 'day_trading' => 'bg-info/10 text-info', 'swing' => 'bg-primary/10 text-primary'];
                                        ?>
                                        <span class="<?php echo e($strategyColors[$bot->strategy_type] ?? 'bg-surface-overlay text-content-tertiary'); ?> text-[10px] font-medium px-1.5 py-0.5 rounded"><?php echo e($bot->strategy_label); ?></span>
                                        <span class="text-content-tertiary text-[10px]"><?php echo e($bot->subscribers_count); ?> subscribers</span>
                                    </div>
                                </div>
                                <div class="text-right flex-shrink-0">
                                    <p class="text-base font-bold text-gain"><?php echo e(number_format($bot->expected_roi, 2)); ?>%</p>
                                    <p class="text-[10px] text-content-tertiary">daily ROI</p>
                                </div>
                            </div>

                            
                            <div class="grid grid-cols-4 gap-3 py-3 border-t border-surface-border">
                                <div class="text-center">
                                    <p class="text-xs font-semibold text-content-primary"><?php echo e($bot->max_duration_days); ?>d</p>
                                    <p class="text-[10px] text-content-tertiary mt-0.5">Max Duration</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs font-semibold text-gain"><?php echo e(number_format($bot->win_rate)); ?>%</p>
                                    <p class="text-[10px] text-content-tertiary mt-0.5">Win Rate</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs font-semibold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($bot->min_investment); ?></p>
                                    <p class="text-[10px] text-content-tertiary mt-0.5">Min Invest</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs font-semibold text-content-primary"><?php echo e($bot->trade_interval_minutes); ?>m</p>
                                    <p class="text-[10px] text-content-tertiary mt-0.5">Trade Interval</p>
                                </div>
                            </div>

                            
                            <div class="mt-3 flex items-center justify-center gap-1.5 py-2 rounded-lg bg-primary/10 text-primary text-xs font-semibold group-hover:bg-primary group-hover:text-content-inverse transition-all duration-200">
                                View Bot
                                <svg class="w-3.5 h-3.5 opacity-0 -ml-1 group-hover:opacity-100 group-hover:ml-0 transition-all" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" /></svg>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="mt-6"><?php echo e($bots->links()); ?></div>
            <?php else: ?>
                <div class="bg-surface-raised border border-surface-border rounded-xl p-8 text-center">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'cpu-chip','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'cpu-chip','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <p class="text-content-secondary">No trading bots available at the moment.</p>
                </div>
            <?php endif; ?>
        </div>

        
        <div x-show="tab === 'subscriptions'" x-cloak>
            <?php if($subscriptions->count() > 0): ?>
                <div class="space-y-4">
                    <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-surface-raised border border-surface-border rounded-xl p-5">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'cpu-chip','class' => 'w-5 h-5 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'cpu-chip','class' => 'w-5 h-5 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                                <div>
                                    <h5 class="font-semibold text-content-primary"><?php echo e($sub->tradingBot->name ?? 'Deleted Bot'); ?></h5>
                                    <?php if($sub->tradingBot): ?>
                                        <?php
                                            $strategyColors = ['scalping' => 'bg-warning/10 text-warning', 'day_trading' => 'bg-info/10 text-info', 'swing' => 'bg-primary/10 text-primary'];
                                        ?>
                                        <span class="<?php echo e($strategyColors[$sub->tradingBot->strategy_type] ?? 'bg-surface-overlay text-content-tertiary'); ?> text-xs px-2 py-0.5 rounded-full"><?php echo e($sub->tradingBot->strategy_label); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="ml-auto">
                                    <?php
                                        $statusClass = match($sub->status) {
                                            'active' => 'bg-gain/10 text-gain',
                                            'stopped' => 'bg-loss/10 text-loss',
                                            'completed' => 'bg-primary-subtle text-primary',
                                            'settled' => 'bg-warning/10 text-warning',
                                            default => 'bg-surface-overlay text-content-tertiary',
                                        };
                                    ?>
                                    <span class="<?php echo e($statusClass); ?> text-xs font-medium px-2.5 py-1 rounded-full"><?php echo e(ucfirst($sub->status)); ?></span>
                                </div>
                            </div>

                            <div class="grid grid-cols-4 gap-4 py-3 border-t border-surface-border">
                                <div>
                                    <p class="text-[10px] text-content-tertiary">Invested</p>
                                    <p class="text-sm font-semibold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($sub->invested_amount); ?></p>
                                </div>
                                <div>
                                    <p class="text-[10px] text-content-tertiary">Profit</p>
                                    <p class="text-sm font-semibold <?php echo e($sub->accumulated_profit >= 0 ? 'text-gain' : 'text-loss'); ?>"><?php echo \App\Helpers\CurrencyHelper::formatForUser($sub->accumulated_profit); ?></p>
                                </div>
                                <div>
                                    <p class="text-[10px] text-content-tertiary">Daily ROI</p>
                                    <p class="text-sm font-semibold text-gain"><?php echo e(number_format($sub->daily_roi_snapshot, 2)); ?>%</p>
                                </div>
                                <div>
                                    <p class="text-[10px] text-content-tertiary">Expires</p>
                                    <p class="text-sm text-content-primary"><?php echo e($sub->expires_at ? $sub->expires_at->format('M d, Y') : '—'); ?></p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 mt-4">
                                <a href="<?php echo e(route('botTrading.subscription', $sub->id)); ?>" class="text-xs font-medium text-primary hover:text-primary-dark transition-colors">View Details →</a>
                                <?php if($sub->status === 'active'): ?>
                                    <form action="<?php echo e(route('botTrading.stop', $sub->id)); ?>" method="POST" class="ml-auto" onsubmit="return confirm('Stop this subscription? Your balance (invested + profit) will be credited back.')">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="text-xs font-medium text-loss hover:text-loss/80 transition-colors">Stop & Withdraw</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="bg-surface-raised border border-surface-border rounded-xl p-8 text-center">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'cpu-chip','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'cpu-chip','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <p class="text-content-secondary mb-2">You haven't subscribed to any bots yet.</p>
                    <button @click="tab = 'bots'" class="text-sm font-medium text-primary hover:text-primary-dark transition-colors">Browse Available Bots →</button>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\bot-trading\index.blade.php ENDPATH**/ ?>