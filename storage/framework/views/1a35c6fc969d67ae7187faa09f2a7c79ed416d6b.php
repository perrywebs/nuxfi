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

    
    <?php echo $__env->make('user.partials.page-header', ['title' => 'My Plans', 'subtitle' => 'Manage your active investment plans'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <?php echo $__env->make('user.partials.stat-card', [
            'label' => 'Total Invested',
            'value' => \App\Helpers\CurrencyHelper::formatForUser($totalInvested),
            'icon' => 'banknotes',
            'color' => 'primary',
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card', [
            'label' => 'Total Profit',
            'value' => \App\Helpers\CurrencyHelper::formatForUser($totalProfit),
            'icon' => 'arrow-trending-up',
            'color' => 'gain',
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.partials.stat-card', [
            'label' => 'Active Plans',
            'value' => $activePlanCount,
            'icon' => 'chart-bar',
            'color' => 'info',
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    
    <?php if($numOfPlan > 0): ?>
        <div class="flex items-center justify-between gap-2 mb-4">
            <a href="<?php echo e(route('mplans')); ?>" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-medium transition-colors">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'banknotes','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'banknotes','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                Browse Plans
            </a>
            <div class="flex items-center gap-2">
                <select name="sortplan" id="sortvalue"
                        class="px-3 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-primary text-sm focus:outline-none focus:ring-1 focus:ring-primary">
                    <option value="All">All</option>
                    <option value="yes">Active</option>
                    <option value="cancelled">Cancelled/Inactive</option>
                    <option value="expired">Expired</option>
                </select>
                <a href="javascript:;" id="sortform" class="px-4 py-2 rounded-lg bg-surface-overlay border border-surface-border hover:bg-surface-border text-content-secondary text-sm font-medium transition-colors">
                    Sort
                </a>
            </div>
        </div>
    <?php endif; ?>

    
    <div class="space-y-3">
        <?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                // Calculate time progress for active plans
                $progressPercent = 0;
                $daysLeft = 0;
                $totalDays = 0;
                if ($plan->active == 'yes' && $plan->created_at && $plan->expire_date) {
                    $start = $plan->created_at;
                    $end = $plan->expire_date;
                    $now = now();
                    $totalDays = max(1, $start->diffInDays($end));
                    $elapsed = $start->diffInDays($now->min($end));
                    $progressPercent = round(($elapsed / $totalDays) * 100, 1);
                    $daysLeft = max(0, $end->diffInDays($now));
                }
            ?>
            <div class="rounded-xl bg-surface-raised border border-surface-border p-5 hover:border-primary/30 transition-colors">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    
                    <div class="flex items-center gap-4 min-w-0">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'banknotes','class' => 'w-5 h-5 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'banknotes','class' => 'w-5 h-5 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                        <div class="min-w-0">
                            <h4 class="text-sm font-semibold text-content-primary truncate"><?php echo e($plan->dplan->name); ?></h4>
                            <p class="text-xs text-content-tertiary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($plan->amount); ?> invested</p>
                        </div>
                    </div>

                    
                    <?php if($plan->active == 'yes'): ?>
                        <div class="hidden md:block flex-1 max-w-xs mx-4">
                            <div class="flex items-center justify-between text-xs text-content-tertiary mb-1">
                                <span>Progress</span>
                                <span><?php echo e($daysLeft); ?> days left</span>
                            </div>
                            <div class="w-full h-1.5 bg-surface-overlay rounded-full overflow-hidden">
                                <div class="h-full bg-primary rounded-full transition-all" style="width: <?php echo e(min(100, $progressPercent)); ?>%"></div>
                            </div>
                        </div>
                    <?php endif; ?>

                    
                    <div class="hidden md:flex items-center gap-6 text-xs">
                        <div class="text-center">
                            <p class="text-gain font-semibold"><?php echo \App\Helpers\CurrencyHelper::formatForUser($plan->profit_earned ?? 0); ?></p>
                            <p class="text-content-tertiary">Profit</p>
                        </div>
                        <div class="text-center">
                            <p class="text-content-primary font-medium"><?php echo e($plan->created_at->format('M d, Y')); ?></p>
                            <p class="text-content-tertiary">Start Date</p>
                        </div>
                        <div class="text-center">
                            <p class="text-content-primary font-medium"><?php echo e(\Carbon\Carbon::parse($plan->expire_date)->format('M d, Y')); ?></p>
                            <p class="text-content-tertiary">End Date</p>
                        </div>
                    </div>

                    
                    <div class="flex items-center gap-3">
                        <?php if($plan->active == 'yes'): ?>
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-gain/10 text-gain">Active</span>
                        <?php elseif($plan->active == 'expired'): ?>
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-loss/10 text-loss">Expired</span>
                        <?php else: ?>
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-loss/10 text-loss">Inactive</span>
                        <?php endif; ?>
                        <a href="<?php echo e(route('plandetails', $plan->id)); ?>" class="text-content-tertiary hover:text-primary transition-colors">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'chevron-right','class' => 'w-5 h-5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'chevron-right','class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </a>
                    </div>
                </div>

                
                <?php if($plan->active == 'yes'): ?>
                    <div class="md:hidden mt-3 pt-3 border-t border-surface-border">
                        <div class="flex items-center justify-between text-xs text-content-tertiary mb-1">
                            <span>Progress &middot; <?php echo e($daysLeft); ?> days left</span>
                            <span class="text-gain font-semibold"><?php echo \App\Helpers\CurrencyHelper::formatForUser($plan->profit_earned ?? 0); ?> earned</span>
                        </div>
                        <div class="w-full h-1.5 bg-surface-overlay rounded-full overflow-hidden">
                            <div class="h-full bg-primary rounded-full transition-all" style="width: <?php echo e(min(100, $progressPercent)); ?>%"></div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="rounded-xl bg-surface-raised border border-surface-border p-8 text-center">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'folder','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'folder','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <p class="text-content-secondary mb-3">You do not have an investment plan at the moment.</p>
                <a href="<?php echo e(route('mplans')); ?>" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-medium transition-colors">
                    Browse Plans
                </a>
            </div>
        <?php endif; ?>
    </div>

    <?php if(count($plans) > 0): ?>
        <div class="mt-4"><?php echo e($plans->links()); ?></div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
    const sortvalue = document.getElementById('sortvalue');
    const sortform = document.getElementById('sortform');
    if (sortvalue && sortform) {
        sortform.href = "<?php echo e(url('/dashboard/sort-plans/All')); ?>";
        sortvalue.addEventListener('change', function() {
            sortform.href = "<?php echo e(url('/dashboard/sort-plans/')); ?>" + '/' + sortvalue.value;
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\myplans.blade.php ENDPATH**/ ?>