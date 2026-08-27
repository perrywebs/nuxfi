<div>
    <?php if(count($plans) > 0): ?>
        <div class="mt-6 grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-surface-raised border border-surface-border rounded-xl p-6">
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

                    
                    <div x-data="{ open: false }" class="relative mb-6">
                        <label class="block text-sm font-medium text-content-secondary mb-2">Select Investment Plan</label>
                        <button type="button" @click="open = !open"
                            class="w-full flex items-center justify-between bg-surface-overlay border border-surface-border rounded-lg px-4 py-3 text-left hover:border-primary/50 transition-colors">
                            <div class="flex items-center gap-3">
                                <?php if($planSelected): ?>
                                    <span class="text-primary">
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'chart-bar','class' => 'w-5 h-5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'chart-bar','class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    </span>
                                    <span class="text-content-primary font-medium"><?php echo e($planSelected->name); ?></span>
                                <?php else: ?>
                                    <span class="text-content-tertiary">Select a plan</span>
                                <?php endif; ?>
                            </div>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'chevron-down','class' => 'w-5 h-5 text-content-tertiary transition-transform','xBind:class' => 'open ? \'rotate-180\' : \'\'']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'chevron-down','class' => 'w-5 h-5 text-content-tertiary transition-transform','x-bind:class' => 'open ? \'rotate-180\' : \'\'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </button>
                        <ul x-show="open" @click.outside="open = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="absolute z-20 mt-2 w-full bg-surface-overlay border border-surface-border rounded-lg shadow-xl max-h-60 overflow-y-auto">
                            <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li wire:click="selectPlan(<?php echo e($plan->id); ?>)" @click="open = false"
                                    class="flex items-center gap-3 px-4 py-3 cursor-pointer hover:bg-primary/10 transition-colors">
                                    <span class="text-primary">
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
                                    </span>
                                    <span class="text-content-primary"><?php echo e($plan->name); ?></span>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                    
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-content-secondary mb-3">Choose Quick Amount to Invest</label>
                        <div class="flex flex-wrap gap-2">
                            <?php $__currentLoopData = [100, 250, 500, 1000, 1500, 2000]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <button wire:click="selectAmount('<?php echo e($amt); ?>')"
                                    class="px-4 py-2 bg-surface-overlay border border-surface-border rounded-lg text-sm text-content-primary hover:border-primary/50 hover:bg-primary/10 transition-all">
                                    <?php echo \App\Helpers\CurrencyHelper::formatForUser($amt); ?>
                                </button>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-content-secondary mb-2">Or Enter Your Amount</label>
                        <input type="number" required wire:model="amountToInvest" wire:keyup="checkIfAmountIsEmpty"
                            placeholder="1000"
                            min="<?php echo e($planSelected ? $planSelected->min_price : '0'); ?>"
                            max="<?php echo e($planSelected ? $planSelected->max_price : '10000000000'); ?>"
                            class="w-full bg-surface-overlay border border-surface-border rounded-lg px-4 py-3 text-content-primary placeholder-content-tertiary focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors">
                    </div>

                    
                    <div>
                        <label class="block text-sm font-medium text-content-secondary mb-3">Choose Payment Method</label>
                        <button wire:click="chanegePaymentMethod('Account Balance')"
                            class="w-full flex items-center gap-4 p-4 rounded-lg border transition-all cursor-pointer
                                <?php echo e($paymentMethod == 'Account Balance'
                                    ? 'bg-primary/10 border-primary/50'
                                    : 'bg-surface-overlay border-surface-border hover:border-primary/30'); ?>">
                            <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                                <span class="text-primary">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'wallet','class' => 'w-5 h-5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'wallet','class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </span>
                            </div>
                            <div class="text-left">
                                <p class="text-content-primary font-medium">Account Balance</p>
                                <p class="text-sm text-content-secondary"><?php echo \App\Helpers\CurrencyHelper::formatForUser(Auth::user()->account_bal); ?></p>
                            </div>
                            <?php if($paymentMethod == 'Account Balance'): ?>
                                <div class="ml-auto">
                                    <span class="text-primary">
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'check-circle','class' => 'w-5 h-5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'check-circle','class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </button>
                    </div>
                </div>
            </div>

            
            <div>
                <div class="bg-surface-raised border border-surface-border rounded-xl p-6 sticky top-24">
                    <h3 class="text-content-primary font-semibold mb-4">Your Investment Details</h3>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <p class="text-xs text-content-tertiary mb-1">Name of Plan</p>
                            <p class="text-sm text-primary font-medium"><?php echo e($planSelected ? $planSelected->name : '-'); ?></p>
                        </div>
                        <div>
                            <p class="text-xs text-content-tertiary mb-1">Plan Price</p>
                            <p class="text-sm text-primary font-medium"><?php echo e($planSelected ? \App\Helpers\CurrencyHelper::formatForUser($planSelected->price) : '-'); ?></p>
                        </div>
                        <div>
                            <p class="text-xs text-content-tertiary mb-1">Duration</p>
                            <p class="text-sm text-primary font-medium"><?php echo e($planSelected ? $planSelected->expiration : '-'); ?></p>
                        </div>
                        <div>
                            <p class="text-xs text-content-tertiary mb-1">Profit</p>
                            <p class="text-sm text-primary font-medium">
                                <?php if($planSelected): ?>
                                    <?php if($planSelected->increment_type == 'Fixed'): ?>
                                        <?php echo e(\App\Helpers\CurrencyHelper::formatForUser($planSelected->increment_amount)); ?>

                                        <?php echo e($planSelected->increment_interval); ?>

                                    <?php else: ?>
                                        <?php echo e($planSelected->increment_amount); ?>%
                                        <?php echo e($planSelected->increment_interval); ?>

                                    <?php endif; ?>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </p>
                        </div>
                        <div>
                            <p class="text-xs text-content-tertiary mb-1">Minimum Deposit</p>
                            <p class="text-sm text-primary font-medium"><?php echo e($planSelected ? \App\Helpers\CurrencyHelper::formatForUser($planSelected->min_price) : '-'); ?></p>
                        </div>
                        <div>
                            <p class="text-xs text-content-tertiary mb-1">Maximum Deposit</p>
                            <p class="text-sm text-primary font-medium"><?php echo e($planSelected ? \App\Helpers\CurrencyHelper::formatForUser($planSelected->max_price) : '-'); ?></p>
                        </div>
                        <div>
                            <p class="text-xs text-content-tertiary mb-1">Minimum Return</p>
                            <p class="text-sm text-primary font-medium"><?php echo e($planSelected ? $planSelected->minr . '%' : '-'); ?></p>
                        </div>
                        <div>
                            <p class="text-xs text-content-tertiary mb-1">Maximum Return</p>
                            <p class="text-sm text-primary font-medium"><?php echo e($planSelected ? $planSelected->maxr . '%' : '-'); ?></p>
                        </div>
                        <div class="col-span-2">
                            <p class="text-xs text-content-tertiary mb-1">Bonus</p>
                            <p class="text-sm text-primary font-medium"><?php echo e($planSelected ? \App\Helpers\CurrencyHelper::formatForUser($planSelected->gift) : '-'); ?></p>
                        </div>
                    </div>

                    <div class="border-t border-surface-border pt-4 mb-3">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm text-content-secondary">Payment method</span>
                            <span class="text-sm text-primary"><?php echo e($paymentMethod ? $paymentMethod : '-'); ?></span>
                        </div>
                    </div>

                    <div class="border-t border-surface-border pt-4 mb-6">
                        <div class="flex items-center justify-between">
                            <span class="text-content-primary font-semibold">Amount to Invest</span>
                            <span class="text-primary font-bold text-lg"><?php echo e(\App\Helpers\CurrencyHelper::formatForUser($amountToInvest ?? 0)); ?></span>
                        </div>
                    </div>

                    <form wire:submit.prevent="joinPlan">
                        <button type="submit" <?php echo e($disabled); ?>

                            class="w-full bg-primary hover:bg-primary-dark disabled:opacity-50 disabled:cursor-not-allowed text-content-inverse font-semibold py-3 px-4 rounded-lg transition-colors">
                            Confirm & Invest
                        </button>
                    </form>
                    <p class="text-center mt-3 text-sm text-primary" wire:loading wire:target="joinPlan">
                        Processing...
                    </p>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="mt-6">
            <div class="bg-surface-raised border border-surface-border rounded-xl p-8 text-center">
                <div class="w-16 h-16 mx-auto bg-surface-overlay rounded-full flex items-center justify-center mb-4">
                    <span class="text-content-tertiary">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'chart-bar','class' => 'w-8 h-8']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'chart-bar','class' => 'w-8 h-8']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </span>
                </div>
                <p class="text-content-secondary">No investment plan at the moment, please contact our support for more information.</p>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/livewire/user/investment-plan.blade.php ENDPATH**/ ?>