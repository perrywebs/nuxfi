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

    
    <?php echo $__env->make('user.partials.page-header', [
        'title' => 'Investment Plans',
        'subtitle' => count($plans) . ' plans available' . ($activePlanCount > 0 ? ' &middot; ' . $activePlanCount . ' active' : '')
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="flex items-center justify-end gap-3 mb-6">
        <a href="<?php echo e(route('myplans', 'All')); ?>" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary text-sm font-medium transition-colors">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'folder','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'folder','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            My Plans
        </a>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                // Tier config based on plan tag
                $tag = strtolower($plan->tag ?? '');
                if (in_array($tag, ['elite', 'platinum', 'vip'])) {
                    $tierBorder = 'border-gain hover:border-gain';
                    $tierBadge = 'bg-gain/10 text-gain';
                    $tierIcon = 'sparkles';
                    $tierGlow = 'shadow-gain/5 shadow-lg';
                    $tierHeaderBg = 'bg-gain/5';
                } elseif (in_array($tag, ['premium', 'gold', 'best value'])) {
                    $tierBorder = 'border-warning hover:border-warning';
                    $tierBadge = 'bg-warning/10 text-warning';
                    $tierIcon = 'trophy';
                    $tierGlow = 'shadow-warning/5 shadow-lg';
                    $tierHeaderBg = 'bg-warning/5';
                } elseif (in_array($tag, ['popular', 'silver', 'recommended'])) {
                    $tierBorder = 'border-primary hover:border-primary';
                    $tierBadge = 'bg-primary/10 text-primary';
                    $tierIcon = 'bolt';
                    $tierGlow = 'shadow-primary/5 shadow-lg';
                    $tierHeaderBg = 'bg-primary/5';
                } else {
                    $tierBorder = 'border-surface-border hover:border-primary/50';
                    $tierBadge = 'bg-info/10 text-info';
                    $tierIcon = 'banknotes';
                    $tierGlow = '';
                    $tierHeaderBg = '';
                }
            ?>
            <div class="rounded-xl bg-surface-raised border <?php echo e($tierBorder); ?> overflow-hidden transition-all <?php echo e($tierGlow); ?>"
                 x-data="{
                    amount: <?php echo e($plan->min_price); ?>,
                    min: <?php echo e($plan->min_price); ?>,
                    max: <?php echo e($plan->max_price); ?>,
                    rate: <?php echo e($plan->increment_amount); ?>,
                    type: '<?php echo e($plan->increment_type); ?>',
                    interval: '<?php echo e($plan->increment_interval); ?>',
                    get roi() {
                        let amt = Math.max(this.min, Math.min(this.max, this.amount || this.min));
                        return this.type === 'Percentage' ? (amt * this.rate / 100).toFixed(2) : parseFloat(this.rate).toFixed(2);
                    },
                    get projected() {
                        let r = parseFloat(this.roi);
                        let multipliers = {'Monthly': 1, 'Weekly': 4.3, 'Daily': 30, 'Hourly': 720, 'Every 30 Minutes': 1440};
                        let m = multipliers[this.interval] || 30;
                        return (r * m).toFixed(2);
                    }
                 }">
                
                <div class="p-6 text-center border-b border-surface-border <?php echo e($tierHeaderBg); ?>">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-primary/10 mb-3">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => ''.e($tierIcon).'','class' => 'w-6 h-6 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => ''.e($tierIcon).'','class' => 'w-6 h-6 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                    <h3 class="text-lg font-bold text-content-primary"><?php echo e($plan->name); ?></h3>
                    <?php if($plan->tag): ?>
                        <span class="inline-block mt-1 px-2.5 py-0.5 text-xs font-semibold rounded-full <?php echo e($tierBadge); ?>"><?php echo e($plan->tag); ?></span>
                    <?php endif; ?>
                    <div class="mt-3">
                        <span class="text-3xl font-bold text-primary"><?php echo e($plan->increment_amount); ?><?php echo e($plan->increment_type == 'Percentage' ? '%' : \App\Helpers\CurrencyHelper::getUserSymbol()); ?></span>
                        <span class="text-sm text-content-secondary ml-1"><?php echo e($plan->increment_interval); ?></span>
                    </div>
                </div>

                
                <div class="p-6 space-y-3">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-content-tertiary flex items-center gap-1.5">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'arrow-down','class' => 'w-3.5 h-3.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'arrow-down','class' => 'w-3.5 h-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?> Minimum
                        </span>
                        <span class="text-content-primary font-semibold"><?php echo \App\Helpers\CurrencyHelper::formatForUser($plan->min_price); ?></span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-content-tertiary flex items-center gap-1.5">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'arrow-up-right','class' => 'w-3.5 h-3.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'arrow-up-right','class' => 'w-3.5 h-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?> Maximum
                        </span>
                        <span class="text-content-primary font-semibold"><?php echo \App\Helpers\CurrencyHelper::formatForUser($plan->max_price); ?></span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-content-tertiary flex items-center gap-1.5">
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
<?php endif; ?> Duration
                        </span>
                        <span class="text-content-primary font-semibold"><?php echo e($plan->expiration); ?></span>
                    </div>
                    <?php if($plan->gift > 0): ?>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-content-tertiary flex items-center gap-1.5">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'gift','class' => 'w-3.5 h-3.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'gift','class' => 'w-3.5 h-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?> Bonus
                            </span>
                            <span class="text-gain font-semibold"><?php echo \App\Helpers\CurrencyHelper::formatForUser($plan->gift); ?></span>
                        </div>
                    <?php endif; ?>
                </div>

                
                <div class="px-6 pb-4">
                    <div class="rounded-lg bg-surface-overlay border border-surface-border p-3">
                        <label class="block text-xs font-medium text-content-tertiary mb-1.5">Calculate Your Returns</label>
                        <input type="number" x-model.number="amount"
                               :min="min" :max="max"
                               :placeholder="'<?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?>' + min + ' - <?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?>' + max"
                               class="w-full px-3 py-2 rounded-md bg-surface-base border border-surface-border text-content-primary text-sm placeholder-content-tertiary focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary mb-2">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-content-tertiary">Per <?php echo e($plan->increment_interval); ?></span>
                            <span class="text-gain font-semibold" x-text="'<?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?>' + roi"></span>
                        </div>
                        <div class="flex items-center justify-between text-xs mt-1">
                            <span class="text-content-tertiary">Est. Monthly</span>
                            <span class="text-primary font-semibold" x-text="'<?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?>' + projected"></span>
                        </div>
                    </div>
                </div>

                
                <div class="px-6 pb-6">
                    <button type="button"
                            onclick="openInvestDrawer(<?php echo e($plan->id); ?>)"
                            class="w-full py-2.5 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-semibold transition-colors">
                        Invest Now
                    </button>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php if(count($plans) == 0): ?>
        <div class="rounded-xl bg-surface-raised border border-surface-border p-8 text-center">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'chart-bar','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'chart-bar','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <p class="text-content-secondary">No investment plans available at the moment.</p>
        </div>
    <?php endif; ?>

    
    <div x-data="{ open: false }"
         x-on:open-invest-drawer.window="open = true"
         x-on:keydown.escape.window="open = false">
        
        <div x-show="open" x-cloak
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black/60 z-40" @click="open = false"></div>
        
        <div x-show="open" x-cloak
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full"
             class="fixed inset-y-0 right-0 z-50 w-full max-w-2xl bg-surface-base border-l border-surface-border overflow-y-auto">
            
            <div class="sticky top-0 z-10 bg-surface-base border-b border-surface-border px-6 py-4 flex items-center justify-between">
                <h2 class="text-lg font-bold text-content-primary">Invest in Plan</h2>
                <button @click="open = false" class="p-2 rounded-lg hover:bg-surface-overlay text-content-tertiary hover:text-content-primary transition-colors">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'x-mark','class' => 'w-5 h-5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'x-mark','class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </button>
            </div>
            
            <div class="px-6 pb-6">
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('user.investment-plan', [])->html();
} elseif ($_instance->childHasBeenRendered('p9OAhmE')) {
    $componentId = $_instance->getRenderedChildComponentId('p9OAhmE');
    $componentTag = $_instance->getRenderedChildComponentTagName('p9OAhmE');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('p9OAhmE');
} else {
    $response = \Livewire\Livewire::mount('user.investment-plan', []);
    $html = $response->html();
    $_instance->logRenderedChild('p9OAhmE', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
    function openInvestDrawer(planId) {
        Livewire.emit('selectPlanById', planId);
        window.dispatchEvent(new CustomEvent('open-invest-drawer'));
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/user/mplans.blade.php ENDPATH**/ ?>