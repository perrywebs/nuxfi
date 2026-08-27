
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


<?php echo $__env->make('user.partials.page-header', ['title' => 'Account Settings', 'subtitle' => 'Manage your profile & security'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="rounded-xl bg-surface-raised border border-surface-border p-6 mb-6">
    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">
        
        <div class="relative shrink-0">
            <?php if(Auth::user()->profile_photo_path): ?>
                <img src="<?php echo e(asset('storage/app/public/' . Auth::user()->profile_photo_path)); ?>"
                     alt="<?php echo e(Auth::user()->name); ?>"
                     class="w-20 h-20 rounded-full border-2 border-primary object-cover bg-surface-overlay">
            <?php else: ?>
                <div class="w-20 h-20 rounded-full border-2 border-primary bg-surface-overlay flex items-center justify-center">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'user-circle','class' => 'w-12 h-12 text-content-tertiary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'user-circle','class' => 'w-12 h-12 text-content-tertiary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if($settings->enable_kyc == 'yes' && Auth::user()->account_verify == 'Verified'): ?>
                <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-primary rounded-full flex items-center justify-center border-2 border-surface-raised">
                    <?php echo $__env->make('components.icons.check-circle', ['class' => 'w-4 h-4 text-content-inverse'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endif; ?>
        </div>

        
        <div class="flex-1 min-w-0">
            <h2 class="text-xl font-bold text-content-primary"><?php echo e(Auth::user()->name); ?></h2>
            <p class="text-sm text-content-secondary mt-0.5"><?php echo e(Auth::user()->email); ?></p>
            <?php if($settings->enable_kyc == 'yes'): ?>
            <div class="flex items-center gap-2 mt-2">
                <?php if(Auth::user()->account_verify == 'Verified'): ?>
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-gain/10 text-gain text-xs font-medium">
                        <?php echo $__env->make('components.icons.shield-check', ['class' => 'w-3.5 h-3.5'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        Verified
                    </span>
                <?php else: ?>
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-warning/10 text-warning text-xs font-medium">
                        <?php echo $__env->make('components.icons.exclamation-triangle', ['class' => 'w-3.5 h-3.5'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        Not Verified
                    </span>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>

        
        <div class="flex gap-6 text-center sm:text-right">
            <div>
                <p class="text-xs text-content-tertiary font-medium uppercase tracking-wide">Profit</p>
                <p class="text-lg font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser(Auth::user()->roi); ?></p>
            </div>
            <div>
                <p class="text-xs text-content-tertiary font-medium uppercase tracking-wide">Balance</p>
                <p class="text-lg font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser(Auth::user()->account_bal); ?></p>
            </div>
            <div>
                <p class="text-xs text-content-tertiary font-medium uppercase tracking-wide">Bonus</p>
                <p class="text-lg font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser(Auth::user()->bonus); ?></p>
            </div>
        </div>
    </div>
</div>


<div x-data="{ tab: 'profile' }" class="space-y-6">

    
    <div class="flex gap-1 border-b border-surface-border">
        <button @click="tab = 'profile'"
                :class="tab === 'profile' ? 'border-primary text-primary' : 'border-transparent text-content-tertiary hover:text-content-secondary'"
                class="px-4 py-3 text-sm font-medium border-b-2 transition-colors -mb-px">
            Personal Profile
        </button>
        <button @click="tab = 'records'"
                :class="tab === 'records' ? 'border-primary text-primary' : 'border-transparent text-content-tertiary hover:text-content-secondary'"
                class="px-4 py-3 text-sm font-medium border-b-2 transition-colors -mb-px">
            Account Records
        </button>
        <button @click="tab = 'settings'"
                :class="tab === 'settings' ? 'border-primary text-primary' : 'border-transparent text-content-tertiary hover:text-content-secondary'"
                class="px-4 py-3 text-sm font-medium border-b-2 transition-colors -mb-px">
            Account Settings
        </button>
    </div>

    
    
    
    <div x-show="tab === 'profile'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
        <form method="POST" action="<?php echo e(route('profile.update')); ?>" class="rounded-xl bg-surface-raised border border-surface-border p-6">
            <?php echo csrf_field(); ?>
            <h3 class="text-lg font-semibold text-content-primary mb-6">Personal Information</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                
                <div class="md:col-span-2">
                    <label class="block text-xs font-medium text-content-tertiary uppercase tracking-wide mb-1.5">Full Name</label>
                    <input type="text" name="name" value="<?php echo e(Auth::user()->name); ?>" readonly
                           class="w-full bg-surface-overlay border border-surface-border-light rounded-lg px-4 py-3 text-sm text-content-primary focus:outline-none focus:border-primary transition">
                </div>

                
                <div>
                    <label class="block text-xs font-medium text-content-tertiary uppercase tracking-wide mb-1.5">Username</label>
                    <input type="text" value="<?php echo e(Auth::user()->username); ?>" readonly
                           class="w-full bg-surface-overlay border border-surface-border-light rounded-lg px-4 py-3 text-sm text-content-primary/60 focus:outline-none">
                </div>

                
                <div>
                    <label class="block text-xs font-medium text-content-tertiary uppercase tracking-wide mb-1.5">Email Address</label>
                    <input type="email" value="<?php echo e(Auth::user()->email); ?>" readonly
                           class="w-full bg-surface-overlay border border-surface-border-light rounded-lg px-4 py-3 text-sm text-content-primary/60 focus:outline-none">
                </div>

                
                <div>
                    <label class="block text-xs font-medium text-content-tertiary uppercase tracking-wide mb-1.5">Phone Number</label>
                    <input type="text" value="<?php echo e(Auth::user()->phone); ?>" readonly
                           class="w-full bg-surface-overlay border border-surface-border-light rounded-lg px-4 py-3 text-sm text-content-primary/60 focus:outline-none">
                </div>

                
                <div>
                    <label class="block text-xs font-medium text-content-tertiary uppercase tracking-wide mb-1.5">Country</label>
                    <input type="text" name="country" value="<?php echo e(Auth::user()->country); ?>"
                           class="w-full bg-surface-overlay border border-surface-border-light rounded-lg px-4 py-3 text-sm text-content-primary focus:outline-none focus:border-primary transition">
                </div>

                
                <div>
                    <label class="block text-xs font-medium text-content-tertiary uppercase tracking-wide mb-1.5">Preferred Currency</label>
                    <select name="currency_code"
                            class="w-full bg-surface-overlay border border-surface-border-light rounded-lg px-4 py-3 text-sm text-content-primary focus:outline-none focus:border-primary transition">
                        <?php $__currentLoopData = \App\Models\ExchangeRate::where('is_active', true)->orderBy('currency_code')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($rate->currency_code); ?>" <?php echo e(Auth::user()->currency_code == $rate->currency_code ? 'selected' : ''); ?>>
                                <?php echo e($rate->currency_code); ?> (<?php echo e(html_entity_decode($rate->currency_symbol)); ?>)<?php echo e($rate->currency_name ? ' — ' . $rate->currency_name : ''); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <p class="mt-1 text-xs text-content-tertiary">Amounts will be displayed in this currency</p>
                </div>

                
                <div>
                    <label class="block text-xs font-medium text-content-tertiary uppercase tracking-wide mb-1.5">State / Province</label>
                    <input type="text" name="state" value="<?php echo e(Auth::user()->state); ?>"
                           class="w-full bg-surface-overlay border border-surface-border-light rounded-lg px-4 py-3 text-sm text-content-primary focus:outline-none focus:border-primary transition">
                </div>

                
                <div>
                    <label class="block text-xs font-medium text-content-tertiary uppercase tracking-wide mb-1.5">Postal / Zip Code</label>
                    <input type="text" name="zipcode" value="<?php echo e(Auth::user()->zipcode); ?>"
                           class="w-full bg-surface-overlay border border-surface-border-light rounded-lg px-4 py-3 text-sm text-content-primary focus:outline-none focus:border-primary transition">
                </div>

                
                <div class="md:col-span-2">
                    <label class="block text-xs font-medium text-content-tertiary uppercase tracking-wide mb-1.5">Address</label>
                    <textarea name="address" rows="3"
                              class="w-full bg-surface-overlay border border-surface-border-light rounded-lg px-4 py-3 text-sm text-content-primary focus:outline-none focus:border-primary transition resize-none"><?php echo e(Auth::user()->address); ?></textarea>
                </div>
            </div>

            
            <div class="mt-6 p-4 rounded-lg bg-surface-overlay border border-surface-border-light">
                <div class="flex flex-wrap gap-6">
                    <?php if($settings->enable_kyc == 'yes'): ?>
                    <div>
                        <p class="text-xs text-content-tertiary font-medium uppercase tracking-wide mb-1">Account Status</p>
                        <?php if(Auth::user()->account_verify == 'Verified'): ?>
                            <span class="inline-flex items-center gap-1 text-sm text-gain font-medium">
                                <?php echo $__env->make('components.icons.check-circle', ['class' => 'w-4 h-4'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> Verified
                            </span>
                        <?php else: ?>
                            <span class="text-sm text-warning font-medium">Not Verified</span>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    
                </div>
            </div>

            <div class="flex items-center justify-between mt-6 pt-6 border-t border-surface-border">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <button type="submit" name="client_update_info"
                        class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-primary text-content-inverse font-semibold hover:bg-primary-dark transition">
                    Update Profile
                </button>
            </div>
        </form>
    </div>

    
    
    
    <div x-show="tab === 'records'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
        <div class="space-y-6">

            
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                <?php echo $__env->make('user.partials.stat-card', [
                    'label' => 'Net Worth',
                    'value' => \App\Helpers\CurrencyHelper::formatForUser($netWorth),
                    'icon'  => 'wallet',
                    'color' => 'primary',
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('user.partials.stat-card', [
                    'label' => 'Total Invested',
                    'value' => \App\Helpers\CurrencyHelper::formatForUser($totalInvested),
                    'icon'  => 'banknotes',
                    'color' => 'info',
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('user.partials.stat-card', [
                    'label' => 'Total P/L',
                    'value' => ($totalPL >= 0 ? '+' : '-') . \App\Helpers\CurrencyHelper::formatForUser(abs($totalPL)),
                    'icon'  => 'arrow-trending-up',
                    'color' => $totalPL >= 0 ? 'gain' : 'loss',
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('user.partials.stat-card', [
                    'label' => 'Win Rate',
                    'value' => $winRate !== null ? $winRate . '%' : 'N/A',
                    'icon'  => 'chart-bar',
                    'color' => ($winRate !== null && $winRate >= 50) ? 'gain' : (($winRate !== null) ? 'loss' : 'primary'),
                    'sub'   => ($winCount + $lossCount) > 0 ? $winCount . 'W / ' . $lossCount . 'L' : '',
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
                
                <div class="lg:col-span-2 rounded-xl bg-surface-raised border border-surface-border p-5">
                    <h4 class="text-sm font-semibold text-content-primary mb-4">Portfolio Allocation</h4>
                    <?php if(count($categoryAllocation) > 0): ?>
                        <div class="flex items-center justify-center">
                            <div class="relative w-48 h-48">
                                <canvas id="allocationChart"></canvas>
                                <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                                    <span class="text-xs text-content-tertiary">Total</span>
                                    <span class="text-lg font-bold text-content-primary"><?php echo e(\App\Helpers\CurrencyHelper::formatForUser(array_sum($categoryAllocation), null, 0)); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="flex items-center justify-center h-48">
                            <div class="text-center">
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
                                <p class="text-sm text-content-tertiary">No allocations yet</p>
                                <p class="text-xs text-content-tertiary mt-1">Start trading or investing to see your breakdown</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                
                <div class="lg:col-span-3 rounded-xl bg-surface-raised border border-surface-border p-5">
                    <h4 class="text-sm font-semibold text-content-primary mb-4">Breakdown</h4>

                    <?php
                        $allocTotal = array_sum($categoryAllocation) ?: 1;
                        $colorMap = [
                            'Trading'      => ['bg' => 'bg-primary',   'text' => 'text-primary'],
                            'Investments'  => ['bg' => 'bg-info',      'text' => 'text-info'],
                            'Copy Trading' => ['bg' => 'bg-warning',   'text' => 'text-warning'],
                            'Pre-IPO'      => ['bg' => 'bg-gain',      'text' => 'text-gain'],
                            'Stocks'       => ['bg' => 'bg-[#8B5CF6]', 'text' => 'text-[#8B5CF6]'],
                            'NFTs'         => ['bg' => 'bg-[#EC4899]', 'text' => 'text-[#EC4899]'],
                        ];
                    ?>

                    <?php if(count($categoryAllocation) > 0): ?>
                        <div class="space-y-3">
                            <?php $__currentLoopData = $categoryAllocation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat => $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $pct = round(($amount / $allocTotal) * 100, 1);
                                    $colors = $colorMap[$cat] ?? ['bg' => 'bg-content-tertiary', 'text' => 'text-content-tertiary'];
                                ?>
                                <div>
                                    <div class="flex items-center justify-between mb-1">
                                        <div class="flex items-center gap-2">
                                            <span class="w-3 h-3 rounded-full <?php echo e($colors['bg']); ?> shrink-0"></span>
                                            <span class="text-sm text-content-primary"><?php echo e($cat); ?></span>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <span class="text-sm font-medium text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($amount); ?></span>
                                            <span class="text-xs <?php echo e($colors['text']); ?> font-medium min-w-[40px] text-right"><?php echo e($pct); ?>%</span>
                                        </div>
                                    </div>
                                    <div class="w-full bg-surface-overlay rounded-full h-1.5">
                                        <div class="<?php echo e($colors['bg']); ?> h-1.5 rounded-full transition-all duration-500" style="width: <?php echo e($pct); ?>%"></div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <p class="text-sm text-content-tertiary">No active allocations to display.</p>
                    <?php endif; ?>

                    
                    <div class="mt-5 pt-4 border-t border-surface-border grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div>
                            <p class="text-[10px] text-content-tertiary font-medium uppercase tracking-widest mb-0.5">Balance</p>
                            <p class="text-sm font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser(Auth::user()->account_bal); ?></p>
                        </div>
                        <div>
                            <p class="text-[10px] text-content-tertiary font-medium uppercase tracking-widest mb-0.5">Profit</p>
                            <p class="text-sm font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser(Auth::user()->roi); ?></p>
                        </div>
                        <div>
                            <p class="text-[10px] text-content-tertiary font-medium uppercase tracking-widest mb-0.5">Bonus</p>
                            <p class="text-sm font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser(Auth::user()->bonus); ?></p>
                        </div>
                        <div>
                            <p class="text-[10px] text-content-tertiary font-medium uppercase tracking-widest mb-0.5">Referral</p>
                            <p class="text-sm font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser(Auth::user()->ref_bonus); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                
                <?php if(!empty($mod['trading'])): ?>
                <div class="rounded-xl bg-surface-raised border border-surface-border p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 rounded-lg bg-primary-subtle">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'chart-bar','class' => 'w-5 h-5 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'chart-bar','class' => 'w-5 h-5 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-content-primary">Trading</h4>
                            <p class="text-xs text-content-tertiary"><?php echo e($totalTrades); ?> total trades</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-surface-overlay rounded-lg p-3">
                            <p class="text-[10px] text-content-tertiary uppercase tracking-widest mb-0.5">Open</p>
                            <p class="text-base font-bold text-content-primary"><?php echo e($openTradesCount); ?></p>
                        </div>
                        <div class="bg-surface-overlay rounded-lg p-3">
                            <p class="text-[10px] text-content-tertiary uppercase tracking-widest mb-0.5">Invested</p>
                            <p class="text-base font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($totalTradeInvested); ?></p>
                        </div>
                        <div class="bg-surface-overlay rounded-lg p-3">
                            <p class="text-[10px] text-content-tertiary uppercase tracking-widest mb-0.5">Total Profit</p>
                            <p class="text-base font-bold text-gain">+<?php echo \App\Helpers\CurrencyHelper::formatForUser($totalTradeProfit); ?></p>
                        </div>
                        <div class="bg-surface-overlay rounded-lg p-3">
                            <p class="text-[10px] text-content-tertiary uppercase tracking-widest mb-0.5">Total Loss</p>
                            <p class="text-base font-bold text-loss">-<?php echo \App\Helpers\CurrencyHelper::formatForUser($totalTradeLoss); ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                
                <?php if(!empty($mod['copy_trading'])): ?>
                <div class="rounded-xl bg-surface-raised border border-surface-border p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 rounded-lg bg-warning/10">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'copy','class' => 'w-5 h-5 text-warning']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'copy','class' => 'w-5 h-5 text-warning']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-content-primary">Copy Trading</h4>
                            <p class="text-xs text-content-tertiary"><?php echo e($activeCopyCount); ?> active positions</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-surface-overlay rounded-lg p-3">
                            <p class="text-[10px] text-content-tertiary uppercase tracking-widest mb-0.5">Invested</p>
                            <p class="text-base font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($totalCopyInvested); ?></p>
                        </div>
                        <div class="bg-surface-overlay rounded-lg p-3">
                            <p class="text-[10px] text-content-tertiary uppercase tracking-widest mb-0.5">Profit</p>
                            <p class="text-base font-bold <?php echo e($totalCopyProfit >= 0 ? 'text-gain' : 'text-loss'); ?>"><?php echo e($totalCopyProfit >= 0 ? '+' : '-'); ?><?php echo \App\Helpers\CurrencyHelper::formatForUser(abs($totalCopyProfit)); ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                
                <?php if(!empty($mod['investment'])): ?>
                <div class="rounded-xl bg-surface-raised border border-surface-border p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 rounded-lg bg-info/10">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'banknotes','class' => 'w-5 h-5 text-info']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'banknotes','class' => 'w-5 h-5 text-info']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-content-primary">Investment Plans</h4>
                            <p class="text-xs text-content-tertiary"><?php echo e($activePlansCount); ?> active plans</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-surface-overlay rounded-lg p-3">
                            <p class="text-[10px] text-content-tertiary uppercase tracking-widest mb-0.5">Invested</p>
                            <p class="text-base font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($totalPlanInvested); ?></p>
                        </div>
                        <div class="bg-surface-overlay rounded-lg p-3">
                            <p class="text-[10px] text-content-tertiary uppercase tracking-widest mb-0.5">Earned</p>
                            <p class="text-base font-bold <?php echo e($totalPlanProfit >= 0 ? 'text-gain' : 'text-loss'); ?>">+<?php echo \App\Helpers\CurrencyHelper::formatForUser($totalPlanProfit); ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                
                <?php if(!empty($mod['pre_ipo'])): ?>
                <div class="rounded-xl bg-surface-raised border border-surface-border p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 rounded-lg bg-gain/10">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'building-office','class' => 'w-5 h-5 text-gain']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'building-office','class' => 'w-5 h-5 text-gain']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-content-primary">Pre-IPO</h4>
                            <p class="text-xs text-content-tertiary"><?php echo e($preIpoCount); ?> holdings</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-surface-overlay rounded-lg p-3">
                            <p class="text-[10px] text-content-tertiary uppercase tracking-widest mb-0.5">Cost</p>
                            <p class="text-base font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($totalPreIpoCost); ?></p>
                        </div>
                        <div class="bg-surface-overlay rounded-lg p-3">
                            <p class="text-[10px] text-content-tertiary uppercase tracking-widest mb-0.5">Value</p>
                            <?php $preIpoGain = $totalPreIpoValue - $totalPreIpoCost; ?>
                            <p class="text-base font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($totalPreIpoValue); ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                
                <?php if(!empty($mod['stocktrading'])): ?>
                <div class="rounded-xl bg-surface-raised border border-surface-border p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 rounded-lg bg-[#8B5CF6]/10">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'chart-bar','class' => 'w-5 h-5 text-[#8B5CF6]']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'chart-bar','class' => 'w-5 h-5 text-[#8B5CF6]']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-content-primary">Stock Shares</h4>
                            <p class="text-xs text-content-tertiary"><?php echo e($stockCount); ?> positions</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-surface-overlay rounded-lg p-3">
                            <p class="text-[10px] text-content-tertiary uppercase tracking-widest mb-0.5">Invested</p>
                            <p class="text-base font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($totalStockInvested); ?></p>
                        </div>
                        <div class="bg-surface-overlay rounded-lg p-3">
                            <p class="text-[10px] text-content-tertiary uppercase tracking-widest mb-0.5">Value</p>
                            <p class="text-base font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($totalStockValue); ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                
                <?php if(!empty($mod['nft'])): ?>
                <div class="rounded-xl bg-surface-raised border border-surface-border p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 rounded-lg bg-[#EC4899]/10">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'gem','class' => 'w-5 h-5 text-[#EC4899]']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'gem','class' => 'w-5 h-5 text-[#EC4899]']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-content-primary">NFTs</h4>
                            <p class="text-xs text-content-tertiary"><?php echo e($nftCount); ?> owned</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-surface-overlay rounded-lg p-3">
                            <p class="text-[10px] text-content-tertiary uppercase tracking-widest mb-0.5">Collection Value</p>
                            <p class="text-base font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($totalNftValue); ?></p>
                        </div>
                        <div class="bg-surface-overlay rounded-lg p-3">
                            <p class="text-[10px] text-content-tertiary uppercase tracking-widest mb-0.5">Items</p>
                            <p class="text-base font-bold text-content-primary"><?php echo e($nftCount); ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            
            <div class="grid grid-cols-1 <?php echo e(!empty($mod['loan']) ? 'md:grid-cols-3' : 'md:grid-cols-2'); ?> gap-4">
                
                <div class="rounded-xl bg-surface-raised border border-surface-border p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 rounded-lg bg-gain/10">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'arrow-down-tray','class' => 'w-5 h-5 text-gain']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'arrow-down-tray','class' => 'w-5 h-5 text-gain']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-content-primary">Deposits</h4>
                            <p class="text-xs text-content-tertiary"><?php echo e($depositCount); ?> transactions</p>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($totalDeposited); ?></p>
                    <p class="text-xs text-content-tertiary mt-1">Total deposited (processed)</p>
                </div>

                
                <div class="rounded-xl bg-surface-raised border border-surface-border p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 rounded-lg bg-loss/10">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'arrow-up-tray','class' => 'w-5 h-5 text-loss']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'arrow-up-tray','class' => 'w-5 h-5 text-loss']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-content-primary">Withdrawals</h4>
                            <p class="text-xs text-content-tertiary"><?php echo e($withdrawalCount); ?> transactions</p>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($totalWithdrawn); ?></p>
                    <p class="text-xs text-content-tertiary mt-1">Total withdrawn (processed)</p>
                </div>

                
                <?php if(!empty($mod['loan'])): ?>
                <div class="rounded-xl bg-surface-raised border border-surface-border p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 rounded-lg bg-warning/10">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'hand-raised','class' => 'w-5 h-5 text-warning']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'hand-raised','class' => 'w-5 h-5 text-warning']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-content-primary">Loans</h4>
                            <p class="text-xs text-content-tertiary"><?php echo e($activeLoansCount); ?> active</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-[10px] text-content-tertiary uppercase tracking-widest mb-0.5">Outstanding</p>
                            <p class="text-base font-bold text-warning"><?php echo \App\Helpers\CurrencyHelper::formatForUser($totalLoanOutstanding); ?></p>
                        </div>
                        <div>
                            <p class="text-[10px] text-content-tertiary uppercase tracking-widest mb-0.5">Repaid</p>
                            <p class="text-base font-bold text-gain"><?php echo \App\Helpers\CurrencyHelper::formatForUser($totalRepaid); ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

        </div>
    </div>

    
    
    
    <div x-show="tab === 'settings'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            
            <div class="rounded-xl bg-surface-raised border border-surface-border p-6">
                <h3 class="text-lg font-semibold text-content-primary mb-1">Change Password</h3>
                <p class="text-xs text-content-tertiary mb-5">You will be logged out after changing your password.</p>

                <form method="POST" action="<?php echo e(route('updateuserpass')); ?>" class="space-y-4">
                    <?php echo method_field('PUT'); ?>
                    <?php echo csrf_field(); ?>

                    <div>
                        <label class="block text-xs font-medium text-content-tertiary uppercase tracking-wide mb-1.5">Current Password</label>
                        <input type="password" name="current_password" required autocomplete="off"
                               class="w-full bg-surface-overlay border border-surface-border-light rounded-lg px-4 py-3 text-sm text-content-primary focus:outline-none focus:border-primary transition">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-content-tertiary uppercase tracking-wide mb-1.5">New Password</label>
                        <input type="password" name="password" required autocomplete="off"
                               class="w-full bg-surface-overlay border border-surface-border-light rounded-lg px-4 py-3 text-sm text-content-primary focus:outline-none focus:border-primary transition">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-content-tertiary uppercase tracking-wide mb-1.5">Confirm New Password</label>
                        <input type="password" name="password_confirmation" required autocomplete="off"
                               class="w-full bg-surface-overlay border border-surface-border-light rounded-lg px-4 py-3 text-sm text-content-primary focus:outline-none focus:border-primary transition">
                    </div>

                    <div class="flex items-center gap-3 pt-2">
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-primary text-content-inverse text-sm font-semibold hover:bg-primary-dark transition">
                            Change Password
                        </button>
                        <button type="reset"
                                class="px-5 py-2.5 rounded-lg border border-surface-border-light text-content-secondary text-sm font-medium hover:border-surface-border hover:text-content-primary transition">
                            Clear
                        </button>
                    </div>
                </form>
            </div>

            
            <div class="rounded-xl bg-surface-raised border border-surface-border p-6">
                <h3 class="text-lg font-semibold text-content-primary mb-1">Change Profile Image</h3>
                <p class="text-xs text-content-tertiary mb-5">Upload a new profile photo.</p>

                <form method="POST" action="<?php echo e(route('updateprofileimage')); ?>" enctype="multipart/form-data" class="space-y-4">
                    <?php echo csrf_field(); ?>

                    <div class="flex justify-center">
                        <?php if(Auth::user()->profile_photo_path): ?>
                            <img src="<?php echo e(asset('storage/app/public/' . Auth::user()->profile_photo_path)); ?>"
                                 alt="<?php echo e(Auth::user()->name); ?>"
                                 class="w-32 h-32 rounded-full border-2 border-surface-border-light object-cover bg-surface-overlay">
                        <?php else: ?>
                            <div class="w-32 h-32 rounded-full border-2 border-surface-border-light bg-surface-overlay flex items-center justify-center">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'user-circle','class' => 'w-20 h-20 text-content-tertiary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'user-circle','class' => 'w-20 h-20 text-content-tertiary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <input type="file" name="profileimage"
                           class="block w-full text-sm text-content-secondary file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-primary/10 file:text-primary hover:file:bg-primary/20 transition cursor-pointer">

                    <div class="pt-2">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-primary text-content-inverse text-sm font-semibold hover:bg-primary-dark transition">
                            Change Profile Image
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="rounded-xl bg-surface-raised border border-surface-border p-6">
        <h3 class="text-sm font-semibold text-content-primary mb-3">Your Referral Link</h3>
        <div x-data="{ copied: false }" class="flex items-stretch gap-2">
            <input type="text" id="referral_link" value="<?php echo e(Auth::user()->ref_link); ?>" readonly
                   class="flex-1 bg-surface-overlay border border-surface-border-light rounded-lg px-4 py-3 text-sm text-content-primary font-mono select-all focus:outline-none">
            <button @click="navigator.clipboard.writeText(document.getElementById('referral_link').value); copied = true; setTimeout(() => copied = false, 2000)"
                    class="px-5 rounded-lg bg-primary text-content-inverse text-sm font-semibold hover:bg-primary-dark transition flex items-center gap-2">
                <?php echo $__env->make('components.icons.copy', ['class' => 'w-4 h-4'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <span x-text="copied ? 'Copied!' : 'Copy Link'"></span>
            </button>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php if(count($categoryAllocation) > 0): ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4/dist/chart.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('allocationChart');
    if (!ctx) return;

    const data = <?php echo json_encode($categoryAllocation, 15, 512) ?>;
    const labels = Object.keys(data);
    const values = Object.values(data);

    const colorMap = {
        'Trading':      '#059669',
        'Investments':  '#3B82F6',
        'Copy Trading': '#F59E0B',
        'Pre-IPO':      '#22C55E',
        'Stocks':       '#8B5CF6',
        'NFTs':         '#EC4899',
    };
    const defaultColor = '#6B7280';
    const colors = labels.map(l => colorMap[l] || defaultColor);

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: values,
                backgroundColor: colors,
                borderColor: '#161A1E',
                borderWidth: 2,
                hoverBorderColor: '#2A2F36',
                hoverOffset: 6,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            cutout: '65%',
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1C2127',
                    titleColor: '#E8EAED',
                    bodyColor: '#9AA0AB',
                    borderColor: '#2A2F36',
                    borderWidth: 1,
                    cornerRadius: 8,
                    padding: 10,
                    callbacks: {
                        label: function(context) {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const pct = ((context.raw / total) * 100).toFixed(1);
                            return context.label + ': <?php echo e($userCurrencySymbol); ?>' + context.raw.toLocaleString(undefined, {minimumFractionDigits: 2}) + ' (' + pct + '%)';
                        }
                    }
                }
            },
            animation: {
                animateRotate: true,
                duration: 800,
            }
        }
    });
});
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/user/profile.blade.php ENDPATH**/ ?>