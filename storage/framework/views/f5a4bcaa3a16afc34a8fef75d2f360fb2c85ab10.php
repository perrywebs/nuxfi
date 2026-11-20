
<?php $__env->startSection('title', $user->name . ' - User Details'); ?>
<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => ''.e($user->name).'']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e($user->name).'']); ?>
         <?php $__env->slot('actions', null, []); ?> 
            <a class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-3 py-1.5 text-xs font-medium transition-colors" href="<?php echo e(route('manageusers')); ?>">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                back
            </a>
            
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.dropdown','data' => ['align' => 'right','width' => 'w-56']]); ?>
<?php $component->withName('admin.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['align' => 'right','width' => 'w-56']); ?>
                 <?php $__env->slot('trigger', null, []); ?> 
                    <button type="button" class="inline-flex items-center gap-1.5 bg-surface-alt text-content hover:bg-surface-alt/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors border border-border">
                        Actions
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                    </button>
                 <?php $__env->endSlot(); ?>

                <a class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors" href="<?php echo e(route('loginactivity', $user->id)); ?>">Login Activity</a>

                <?php if($user->isProtectedAccount() || (int) Auth::guard('web')->id() === (int) $user->id): ?>
                    <span class="block px-4 py-2 text-sm text-content-muted cursor-not-allowed"
                        title="This account is protected from deactivation.">Protected account</span>
                <?php elseif($user->isActive()): ?>
                    <a class="block px-4 py-2 text-sm text-warning hover:bg-surface-alt transition-colors"
                        href="<?php echo e(route('user.deactivate', $user->id)); ?>"
                        onclick="event.preventDefault(); Swal.fire({ title: 'Deactivate <?php echo e(addslashes($user->name)); ?>?', text: 'The account keeps all of its data but the user will be signed out and blocked from logging in.', icon: 'warning', showCancelButton: true, confirmButtonColor: 'rgb(217,119,6)', confirmButtonText: 'Yes, deactivate' }).then(function (result) { if (result.isConfirmed) { window.location.href = '<?php echo e(route('user.deactivate', $user->id)); ?>'; } });">
                        Deactivate Account
                    </a>
                <?php else: ?>
                    <a class="block px-4 py-2 text-sm text-success hover:bg-surface-alt transition-colors"
                        href="<?php echo e(route('user.activate', $user->id)); ?>"
                        onclick="event.preventDefault(); Swal.fire({ title: 'Activate <?php echo e(addslashes($user->name)); ?>?', text: 'The user will be able to sign in again immediately.', icon: 'question', showCancelButton: true, confirmButtonColor: 'rgb(22,163,74)', confirmButtonText: 'Yes, activate' }).then(function (result) { if (result.isConfirmed) { window.location.href = '<?php echo e(route('user.activate', $user->id)); ?>'; } });">
                        Activate Account
                    </a>
                <?php endif; ?>

                <?php if($user->trade_mode == 'on'): ?>
                    <a class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors" href="<?php echo e(url('admin/dashboard/usertrademode')); ?>/<?php echo e($user->id); ?>/off">Turn off trade</a>
                <?php else: ?>
                    <a class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors" href="<?php echo e(url('admin/dashboard/usertrademode')); ?>/<?php echo e($user->id); ?>/on">Turn on trade</a>
                <?php endif; ?>

                <?php if(!$user->email_verified_at): ?>
                    <a href="<?php echo e(url('admin/dashboard/email-verify')); ?>/<?php echo e($user->id); ?>" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Verify Email</a>
                <?php endif; ?>

                <a href="#" @click.prevent="$dispatch('open-topupmodal'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Credit/Debit</a>
                <a href="#" @click.prevent="$dispatch('open-winrate'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Set User Win Rate</a>
                <a href="#" @click.prevent="$dispatch('open-signalstrength'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Set Signal Strength</a>
                <a href="#" @click.prevent="$dispatch('open-tradesignal'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Set Trade Progress</a>
                <a href="#" @click.prevent="$dispatch('open-withdrawalcode'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Set Withdrawal Code</a>
                <a href="#" @click.prevent="$dispatch('open-notify'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Notify User Dashboard</a>
                <a href="#" @click.prevent="$dispatch('open-resetpswdmodal'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Reset Password</a>
                <a href="#" @click.prevent="$dispatch('open-clearacctmodal'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Clear Account</a>
                <a href="#" @click.prevent="$dispatch('open-tradingmodal'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Add Trading History</a>
                <a href="#" @click.prevent="$dispatch('open-edituser'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Edit</a>
                <a href="<?php echo e(route('showusers', $user->id)); ?>" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Add Referral</a>
                <a href="#" @click.prevent="$dispatch('open-sendmailtooneusermodal'); open = false" class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors">Send Email</a>
                <a href="#" @click.prevent="$dispatch('open-switchusermodal'); open = false" class="block px-4 py-2 text-sm text-success hover:bg-surface-alt transition-colors">Login as <?php echo e($user->name); ?></a>
                <?php if($user->isProtectedAccount() || (int) Auth::guard('web')->id() === (int) $user->id): ?>
                    <span class="block px-4 py-2 text-sm text-content-muted cursor-not-allowed"
                        title="This account is protected from deletion.">Delete (protected)</span>
                <?php else: ?>
                    <a href="#" @click.prevent="$dispatch('open-deletemodal'); open = false" class="block px-4 py-2 text-sm text-danger hover:bg-surface-alt transition-colors">Delete <?php echo e($user->name); ?></a>
                <?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <div class="mt-6 space-y-6">
        
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div>
                    <h5 class="text-sm font-semibold text-content">Account Balance</h5>
                    <p class="mt-1 text-content-secondary"><?php echo e($settings->currency); ?><?php echo e(number_format($user->account_bal, 2, '.', ',')); ?></p>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">Profit</h5>
                    <p class="mt-1 text-content-secondary"><?php echo e($settings->currency); ?><?php echo e(number_format($user->roi, 2, '.', ',')); ?></p>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">Referral Bonus</h5>
                    <p class="mt-1 text-content-secondary"><?php echo e($settings->currency); ?><?php echo e(number_format($user->ref_bonus, 2, '.', ',')); ?></p>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">Bonus</h5>
                    <p class="mt-1 text-content-secondary"><?php echo e($settings->currency); ?><?php echo e(number_format($user->bonus, 2, '.', ',')); ?></p>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">User Account Status</h5>
                    <div class="mt-1 flex items-center gap-2">
                        <?php if($user->isActive()): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'success']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'success']); ?>Active <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <span class="text-xs text-content-muted">Can sign in</span>
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'danger']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger']); ?>Inactive <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <span class="text-xs text-content-muted">Sign-in blocked</span>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">Inv. Plans</h5>
                    <div class="mt-1">
                        <?php if($user->plan != null): ?>
                            <a class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-3 py-1.5 text-xs font-medium transition-colors"
                               href="<?php echo e(route('user.plans', $user->id)); ?>">View Plans</a>
                        <?php else: ?>
                            <p class="text-content-secondary">No Investment Plan</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">KYC</h5>
                    <div class="mt-1">
                        <?php if($user->account_verify == 'Verified'): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'success']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'success']); ?>Verified <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'danger']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger']); ?>Not Verified <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">Trade Mode</h5>
                    <div class="mt-1">
                        <?php if($user->trade_mode == 'off' || $user->trade_mode == null): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'danger']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger']); ?>Off <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'success']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'success']); ?>On <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">Wallet Connect</h5>
                    <div class="mt-1 flex items-center gap-2">
                        <?php if($user->wallet_connect_status == 'on'): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'success']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'success']); ?>On <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <a href="<?php echo e(url('admin/dashboard/userwalletstatus')); ?>/<?php echo e($user->id); ?>/off"
                               class="text-xs text-danger hover:underline">Turn Off</a>
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'danger']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger']); ?>Off <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <a href="<?php echo e(url('admin/dashboard/userwalletstatus')); ?>/<?php echo e($user->id); ?>/on"
                               class="text-xs text-success hover:underline">Turn On</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">Signal Strength</h5>
                    <div class="mt-1 flex items-center gap-2">
                        <?php if($user->signal_strength_enabled): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'success']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'success']); ?>On <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <span class="text-sm text-content-secondary"><?php echo e($user->signal_strength_score ?? 0); ?>%</span>
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'danger']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger']); ?>Off <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">Trade Progress</h5>
                    <div class="mt-1 flex items-center gap-2">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => ''.e($user->trade_signal >= 50 ? 'success' : 'danger').'']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => ''.e($user->trade_signal >= 50 ? 'success' : 'danger').'']); ?><?php echo e($user->trade_signal ?? 50); ?>% <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <a href="#" @click.prevent="$dispatch('open-tradesignal')" class="text-xs text-primary hover:underline">Edit</a>
                    </div>
                </div>
                <div>
                    <h5 class="text-sm font-semibold text-content">Dashboard Banner</h5>
                    <div class="mt-1 flex items-center gap-2">
                        <?php if($user->dashboard_banner_enabled): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => ''.e($user->dashboard_banner_type == 'success' ? 'success' : ($user->dashboard_banner_type == 'danger' ? 'danger' : 'warning')).'']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => ''.e($user->dashboard_banner_type == 'success' ? 'success' : ($user->dashboard_banner_type == 'danger' ? 'danger' : 'warning')).'']); ?><?php echo e(ucfirst($user->dashboard_banner_type ?? 'warning')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <span class="text-sm text-content-secondary truncate max-w-[200px]" title="<?php echo e($user->dashboard_banner_message); ?>"><?php echo e(Str::limit($user->dashboard_banner_message, 40)); ?></span>
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'danger']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger']); ?>Off <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

        
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <h5 class="text-sm font-semibold text-content-secondary uppercase tracking-wider mb-4">User Information</h5>
            <div class="divide-y divide-border">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2 py-3">
                    <div class="text-sm font-medium text-content">Fullname</div>
                    <div class="md:col-span-2 text-sm text-content-secondary"><?php echo e($user->name); ?></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2 py-3">
                    <div class="text-sm font-medium text-content">Email Address</div>
                    <div class="md:col-span-2 text-sm text-content-secondary"><?php echo e($user->email); ?></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2 py-3">
                    <div class="text-sm font-medium text-content">Mobile Number</div>
                    <div class="md:col-span-2 text-sm text-content-secondary"><?php echo e($user->phone); ?></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2 py-3">
                    <div class="text-sm font-medium text-content">Date of birth</div>
                    <div class="md:col-span-2 text-sm text-content-secondary"><?php echo e($user->dob); ?></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2 py-3">
                    <div class="text-sm font-medium text-content">Nationality</div>
                    <div class="md:col-span-2 text-sm text-content-secondary"><?php echo e($user->country); ?></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2 py-3">
                    <div class="text-sm font-medium text-content">Registered</div>
                    <div class="md:col-span-2 text-sm text-content-secondary"><?php echo e(\Carbon\Carbon::parse($user->created_at)->toDayDateTimeString()); ?></div>
                </div>
            </div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

        
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <?php
                $activeCount = 0;
                for ($i = 1; $i <= 5; $i++) {
                    if ($user->{"code{$i}_enabled"}) $activeCount++;
                }
                $defaultLabels = [
                    1 => 'Withdrawal Verification Code',
                    2 => 'Anti-Theft Security Code',
                    3 => 'IMF Code',
                    4 => 'Cost of Transfer Code',
                    5 => 'Taxation Code',
                ];
            ?>
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h5 class="text-sm font-semibold text-content-secondary uppercase tracking-wider">Withdrawal Verification Codes</h5>
                    <p class="text-xs text-content-muted mt-1"><?php echo e($activeCount); ?> of 5 verification steps active</p>
                </div>
            </div>

            <form method="POST" action="<?php echo e(route('withdrawalcode')); ?>" x-data="{
                <?php for($i = 1; $i <= 5; $i++): ?>
                    code<?php echo e($i); ?>_enabled: <?php echo e($user->{"code{$i}_enabled"} ? 'true' : 'false'); ?><?php echo e($i < 5 ? ',' : ''); ?>

                <?php endfor; ?>
            }">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">

                <div class="space-y-3">
                    <?php for($i = 1; $i <= 5; $i++): ?>
                        <div class="flex items-center gap-4 p-3 rounded-lg border transition-colors"
                             :class="code<?php echo e($i); ?>_enabled ? 'border-primary/30 bg-primary/5' : 'border-border bg-surface-alt/30'">

                            
                            <label class="relative inline-flex items-center cursor-pointer flex-shrink-0">
                                <input type="checkbox" name="code<?php echo e($i); ?>_enabled" value="1"
                                       x-model="code<?php echo e($i); ?>_enabled"
                                       class="sr-only peer">
                                <div class="w-9 h-5 bg-surface-alt peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-primary"></div>
                            </label>

                            
                            <span class="text-xs font-bold w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0"
                                  :class="code<?php echo e($i); ?>_enabled ? 'bg-primary text-primary-foreground' : 'bg-surface-alt text-content-muted'">
                                <?php echo e($i); ?>

                            </span>

                            
                            <div class="flex-1 min-w-0">
                                <input type="text" name="code<?php echo e($i); ?>_label"
                                       value="<?php echo e($user->{"code{$i}_label"} ?: $defaultLabels[$i]); ?>"
                                       placeholder="Step label"
                                       :disabled="!code<?php echo e($i); ?>_enabled"
                                       class="w-full bg-transparent border-0 border-b border-border px-0 py-1 text-sm text-content placeholder-content-muted focus:outline-none focus:border-primary disabled:opacity-40">
                            </div>

                            
                            <div class="w-36 flex-shrink-0">
                                <input type="text" name="code<?php echo e($i); ?>"
                                       value="<?php echo e($user->{"code{$i}"}); ?>"
                                       placeholder="Code value"
                                       :disabled="!code<?php echo e($i); ?>_enabled"
                                       class="w-full bg-surface-card border border-border rounded-lg px-3 py-1.5 text-sm text-content font-mono tracking-wide placeholder-content-muted focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary disabled:opacity-40 disabled:cursor-not-allowed">
                            </div>

                            
                            <template x-if="code<?php echo e($i); ?>_enabled">
                                <span class="text-xs font-medium px-2 py-0.5 rounded-full bg-success-light text-success flex-shrink-0">Active</span>
                            </template>
                            <template x-if="!code<?php echo e($i); ?>_enabled">
                                <span class="text-xs font-medium px-2 py-0.5 rounded-full bg-surface-alt text-content-muted flex-shrink-0">Disabled</span>
                            </template>
                        </div>
                    <?php endfor; ?>
                </div>

                <div class="mt-4 flex justify-end">
                    <button type="submit" class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" /></svg>
                        Save Verification Settings
                    </button>
                </div>
            </form>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

        
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3 mb-5">
                <div>
                    <h5 class="text-sm font-semibold text-content-secondary uppercase tracking-wider">Broker Withdrawal Commission</h5>
                    <p class="text-xs text-content-muted mt-1">Shown as the final requirement in this user's withdrawal flow. Existing withdrawals keep the settings captured when they were created.</p>
                </div>
                <?php if($user->broker_commission_enabled): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'success']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'success']); ?>Enabled <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php else: ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'danger']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger']); ?>Disabled <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endif; ?>
            </div>

            <form method="POST" action="<?php echo e(route('admin.users.broker-commission')); ?>" class="space-y-4">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">

                <label class="inline-flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="broker_commission_enabled" value="1"
                        <?php echo e(old('broker_commission_enabled', $user->broker_commission_enabled) ? 'checked' : ''); ?>

                        class="w-4 h-4 rounded border-border text-primary focus:ring-primary/30">
                    <span class="text-sm font-medium text-content">Require broker commission for this user's withdrawals</span>
                </label>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Commission Amount','for' => 'broker_commission_amount','helper' => 'Amount is denominated in the selected cryptocurrency.']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Commission Amount','for' => 'broker_commission_amount','helper' => 'Amount is denominated in the selected cryptocurrency.']); ?>
                        <input type="number" id="broker_commission_amount" name="broker_commission_amount" min="0.00000001" step="0.00000001"
                            value="<?php echo e(old('broker_commission_amount', $user->broker_commission_amount)); ?>"
                            class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                        <?php $__errorArgs = ['broker_commission_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Cryptocurrency','for' => 'broker_commission_currency']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Cryptocurrency','for' => 'broker_commission_currency']); ?>
                        <select id="broker_commission_currency" name="broker_commission_currency"
                            class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                            <option value="">Select currency</option>
                            <?php $__currentLoopData = $commissionCurrencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($currency); ?>" <?php echo e(old('broker_commission_currency', $user->broker_commission_currency) === $currency ? 'selected' : ''); ?>><?php echo e($currency); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['broker_commission_currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Receiving Wallet Address','for' => 'broker_commission_wallet']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Receiving Wallet Address','for' => 'broker_commission_wallet']); ?>
                    <input type="text" id="broker_commission_wallet" name="broker_commission_wallet" maxlength="191"
                        value="<?php echo e(old('broker_commission_wallet', $user->broker_commission_wallet)); ?>"
                        class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm font-mono text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                    <?php $__errorArgs = ['broker_commission_wallet'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Payment Instructions (Optional)','for' => 'broker_commission_note']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Payment Instructions (Optional)','for' => 'broker_commission_note']); ?>
                    <input type="text" id="broker_commission_note" name="broker_commission_note" maxlength="255"
                        value="<?php echo e(old('broker_commission_note', $user->broker_commission_note)); ?>"
                        class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <div class="flex justify-end">
                    <button type="submit" class="bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                        Save Commission Settings
                    </button>
                </div>
            </form>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

        
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-sm font-semibold text-content-secondary uppercase tracking-wider">Connected Wallets</h5>
                <?php if($wallets->count() > 0): ?>
                    <span class="text-xs text-content-muted"><?php echo e($wallets->count()); ?> wallet<?php echo e($wallets->count() !== 1 ? 's' : ''); ?></span>
                <?php endif; ?>
            </div>

            <?php if($wallets->count() > 0): ?>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-surface-alt">
                                <th class="px-4 py-2.5 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Wallet</th>
                                <th class="px-4 py-2.5 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Status</th>
                                <th class="px-4 py-2.5 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Connected</th>
                                <th class="px-4 py-2.5 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-border">
                            <?php $__currentLoopData = $wallets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wallet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $slug = \Illuminate\Support\Str::slug($wallet->wallet_name);
                                    $logoPath = 'img/wallets/' . $slug . '.svg';
                                    $hasLogo = file_exists(public_path($logoPath));
                                ?>
                                <tr class="hover:bg-surface-alt/50 transition-colors">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg overflow-hidden bg-surface-alt flex items-center justify-center flex-shrink-0">
                                                <img src="<?php echo e(asset($hasLogo ? $logoPath : 'img/wallets/generic.svg')); ?>" alt="<?php echo e($wallet->wallet_name); ?>" class="w-8 h-8">
                                            </div>
                                            <span class="text-sm font-medium text-content"><?php echo e($wallet->wallet_name); ?></span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'success']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'success']); ?>Active <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-content-secondary">
                                        <?php echo e($wallet->created_at->format('M d, Y H:i')); ?>

                                    </td>
                                    <td class="px-4 py-3">
                                        <button
                                            onclick="Swal.fire({ title: 'Disconnect wallet?', text: 'This will remove <?php echo e($wallet->wallet_name); ?> from <?php echo e($user->name); ?>\'s account.', icon: 'warning', showCancelButton: true, confirmButtonColor: 'rgb(220,38,38)', confirmButtonText: 'Yes, disconnect' }).then((result) => { if(result.isConfirmed) window.location.href='<?php echo e(route('admin.wallet.disconnect', $wallet->id)); ?>' })"
                                            class="bg-danger text-white hover:bg-danger/90 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors inline-flex items-center gap-1">
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.181 8.68a4.503 4.503 0 0 1 1.903 6.405m-9.768-2.782L3.56 14.06a4.5 4.5 0 0 0 6.364 6.365l.552-.552m0 0L14.06 16.29m0 0-2.122-2.122m2.122 2.122L16.29 14.06m-7.071-7.071 2.122 2.122M7.757 7.757 6 6" /></svg>
                                            Disconnect
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center py-6">
                    <p class="text-sm text-content-muted">No wallets connected</p>
                </div>
            <?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </div>

    <?php echo $__env->make('admin.Users.users_actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/admin/Users/userdetails.blade.php ENDPATH**/ ?>