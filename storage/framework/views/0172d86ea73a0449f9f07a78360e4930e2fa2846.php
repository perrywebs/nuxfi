
<?php
    $currentType = $currentType ?? 'all';
    $currentStatus = $currentStatus ?? 'all';
    $currentDemo = $currentDemo ?? 'all';
    $currentSearch = $currentSearch ?? '';
    $baseUrl = $baseUrl ?? request()->url();
    $stats = $stats ?? [];
?>

<div class="bg-surface-raised border border-surface-border rounded-xl overflow-hidden" x-data="{ showAdvanced: false }">
    
    <div class="px-5 py-3 border-b border-surface-border flex items-center justify-between">
        <div class="flex items-center gap-2">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'funnel','class' => 'w-4 h-4 text-content-tertiary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'funnel','class' => 'w-4 h-4 text-content-tertiary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <span class="text-sm font-semibold text-content-primary">Filters</span>
        </div>
        <button @click="showAdvanced = !showAdvanced"
                class="text-xs text-primary hover:text-primary-light font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-primary rounded"
                :aria-expanded="showAdvanced"
                aria-controls="advanced-filters">
            <span x-text="showAdvanced ? 'Less Filters' : 'More Filters'"></span>
        </button>
    </div>

    <form method="GET" action="<?php echo e($baseUrl); ?>" class="p-4 space-y-3">
        
        <div role="group" aria-label="Trade type filter">
            <p class="text-[10px] text-content-tertiary uppercase tracking-wider font-medium mb-2">Type</p>
            <div class="flex flex-wrap gap-1.5">
                <?php $__currentLoopData = ['all' => 'All', 'binary' => 'Binary', 'spot' => 'Spot']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button type="submit" name="type" value="<?php echo e($val); ?>"
                            class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-primary
                            <?php echo e($currentType === $val ? 'bg-primary text-content-inverse' : 'bg-surface-overlay text-content-secondary hover:bg-surface-border hover:text-content-primary'); ?>"
                            aria-pressed="<?php echo e($currentType === $val ? 'true' : 'false'); ?>">
                        <?php echo e($label); ?>

                        <?php if(isset($stats[$val . '_count'])): ?>
                            <span class="ml-1 opacity-70">(<?php echo e($stats[$val . '_count']); ?>)</span>
                        <?php endif; ?>
                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <input type="hidden" name="status" value="<?php echo e($currentStatus); ?>">
                <input type="hidden" name="demo" value="<?php echo e($currentDemo); ?>">
                <input type="hidden" name="search" value="<?php echo e($currentSearch); ?>">
            </div>
        </div>

        
        <div role="group" aria-label="Status filter">
            <p class="text-[10px] text-content-tertiary uppercase tracking-wider font-medium mb-2">Status</p>
            <div class="flex flex-wrap gap-1.5">
                <?php $__currentLoopData = ['all' => 'All', 'open' => 'Open', 'closed' => 'Closed']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button type="submit" name="status" value="<?php echo e($val); ?>"
                            class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-primary
                            <?php echo e($currentStatus === $val ? 'bg-primary text-content-inverse' : 'bg-surface-overlay text-content-secondary hover:bg-surface-border hover:text-content-primary'); ?>"
                            aria-pressed="<?php echo e($currentStatus === $val ? 'true' : 'false'); ?>">
                        <?php echo e($label); ?>

                        <?php if(isset($stats[$val . '_count'])): ?>
                            <span class="ml-1 opacity-70">(<?php echo e($stats[$val . '_count']); ?>)</span>
                        <?php endif; ?>
                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" name="type" value="<?php echo e($currentType); ?>">
                <input type="hidden" name="demo" value="<?php echo e($currentDemo); ?>">
                <input type="hidden" name="search" value="<?php echo e($currentSearch); ?>">
            </div>
        </div>

        
        <div x-show="showAdvanced" x-cloak x-transition id="advanced-filters" class="space-y-3 pt-2 border-t border-surface-border">
            
            <div role="group" aria-label="Demo or live filter">
                <p class="text-[10px] text-content-tertiary uppercase tracking-wider font-medium mb-2">Mode</p>
                <div class="flex flex-wrap gap-1.5">
                    <?php $__currentLoopData = ['all' => 'All', 'live' => 'Live', 'demo' => 'Demo']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button type="submit" name="demo" value="<?php echo e($val); ?>"
                                class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-primary
                                <?php echo e($currentDemo === $val ? 'bg-primary text-content-inverse' : 'bg-surface-overlay text-content-secondary hover:bg-surface-border hover:text-content-primary'); ?>"
                                aria-pressed="<?php echo e($currentDemo === $val ? 'true' : 'false'); ?>">
                            <?php echo e($label); ?>

                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <input type="hidden" name="type" value="<?php echo e($currentType); ?>">
                    <input type="hidden" name="status" value="<?php echo e($currentStatus); ?>">
                    <input type="hidden" name="search" value="<?php echo e($currentSearch); ?>">
                </div>
            </div>

            
            <div>
                <label for="trade-search" class="text-[10px] text-content-tertiary uppercase tracking-wider font-medium mb-2 block">Search Asset</label>
                <div class="relative">
                    <input type="text" id="trade-search" name="search" value="<?php echo e($currentSearch); ?>"
                           placeholder="Search by name or symbol..."
                           class="w-full bg-surface-overlay border border-surface-border rounded-lg pl-9 pr-3 py-2 text-sm text-content-primary placeholder-content-tertiary focus:outline-none focus:ring-2 focus:ring-primary" />
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'magnifying-glass','class' => 'w-4 h-4 text-content-tertiary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'magnifying-glass','class' => 'w-4 h-4 text-content-tertiary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                    
                    <input type="hidden" name="type" value="<?php echo e($currentType); ?>">
                    <input type="hidden" name="status" value="<?php echo e($currentStatus); ?>">
                    <input type="hidden" name="demo" value="<?php echo e($currentDemo); ?>">
                </div>
            </div>

            
            <button type="submit"
                    class="w-full bg-primary hover:bg-primary-dark text-content-inverse rounded-lg py-2 text-sm font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-surface-base">
                Apply Filters
            </button>
        </div>
    </form>

    
    <?php if($currentType !== 'all' || $currentStatus !== 'all' || $currentDemo !== 'all' || $currentSearch): ?>
        <div class="px-4 pb-3 flex flex-wrap gap-1.5" role="list" aria-label="Active filters">
            <?php if($currentType !== 'all'): ?>
                <a href="<?php echo e($baseUrl); ?>?<?php echo e(http_build_query(array_merge(request()->except('type'), ['type' => 'all']))); ?>"
                   class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-primary/10 text-primary text-xs font-medium hover:bg-primary/20 transition-colors"
                   role="listitem" aria-label="Remove type filter: <?php echo e($currentType); ?>">
                    Type: <?php echo e(ucfirst($currentType)); ?>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'x-mark','class' => 'w-3 h-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'x-mark','class' => 'w-3 h-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </a>
            <?php endif; ?>
            <?php if($currentStatus !== 'all'): ?>
                <a href="<?php echo e($baseUrl); ?>?<?php echo e(http_build_query(array_merge(request()->except('status'), ['status' => 'all']))); ?>"
                   class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-primary/10 text-primary text-xs font-medium hover:bg-primary/20 transition-colors"
                   role="listitem" aria-label="Remove status filter: <?php echo e($currentStatus); ?>">
                    Status: <?php echo e(ucfirst($currentStatus)); ?>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'x-mark','class' => 'w-3 h-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'x-mark','class' => 'w-3 h-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </a>
            <?php endif; ?>
            <?php if($currentDemo !== 'all'): ?>
                <a href="<?php echo e($baseUrl); ?>?<?php echo e(http_build_query(array_merge(request()->except('demo'), ['demo' => 'all']))); ?>"
                   class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-primary/10 text-primary text-xs font-medium hover:bg-primary/20 transition-colors"
                   role="listitem" aria-label="Remove mode filter: <?php echo e($currentDemo); ?>">
                    Mode: <?php echo e(ucfirst($currentDemo)); ?>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'x-mark','class' => 'w-3 h-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'x-mark','class' => 'w-3 h-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </a>
            <?php endif; ?>
            <?php if($currentSearch): ?>
                <a href="<?php echo e($baseUrl); ?>?<?php echo e(http_build_query(array_merge(request()->except('search'), ['search' => '']))); ?>"
                   class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-primary/10 text-primary text-xs font-medium hover:bg-primary/20 transition-colors"
                   role="listitem" aria-label="Remove search filter: <?php echo e($currentSearch); ?>">
                    "<?php echo e($currentSearch); ?>"
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'x-mark','class' => 'w-3 h-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'x-mark','class' => 'w-3 h-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </a>
            <?php endif; ?>
            <a href="<?php echo e($baseUrl); ?>"
               class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-loss/10 text-loss text-xs font-medium hover:bg-loss/20 transition-colors"
               role="listitem">
                Clear All
            </a>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\trades\partials\trade-filters.blade.php ENDPATH**/ ?>