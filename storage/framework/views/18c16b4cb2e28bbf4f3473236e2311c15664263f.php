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
    <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, []); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>

    
    <?php echo $__env->make('user.partials.ticker-tape', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->make('user.partials.quick-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl font-bold text-content-primary">Signal Plan Payment</h2>
            <p class="text-sm text-content-secondary mt-1">Complete your cryptocurrency payment to activate your subscription</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="<?php echo e(route('user.signal.payments')); ?>" class="px-4 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary text-sm font-medium transition-colors">Payment History</a>
            <a href="<?php echo e(route('user.signal.plans')); ?>" class="px-4 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary text-sm font-medium transition-colors">Back to Plans</a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">

        
        <div class="lg:col-span-1 space-y-6">
            <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden">
                <div class="p-5 border-b border-surface-border">
                    <h3 class="text-sm font-semibold text-content-primary">Order Summary</h3>
                </div>
                <div class="p-5 space-y-4">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-content-tertiary">Order</span>
                        <span class="font-medium text-content-primary">#<?php echo e(str_pad($payment->id, 6, '0', STR_PAD_LEFT)); ?></span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-content-tertiary">Signal Plan</span>
                        <span class="font-medium text-content-primary text-right"><?php echo e($payment->plan_name); ?></span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-content-tertiary">Duration</span>
                        <span class="font-medium text-content-primary"><?php echo e($payment->duration); ?> <?php echo e(\Illuminate\Support\Str::plural('Week', $payment->duration)); ?></span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-content-tertiary">Requested</span>
                        <span class="font-medium text-content-primary"><?php echo e($payment->created_at ? $payment->created_at->toFormattedDateString() : '—'); ?></span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-content-tertiary">Status</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold capitalize <?php echo e($payment->statusBadgeClass()); ?>"><?php echo e($payment->status); ?></span>
                    </div>
                    <div class="border-t border-surface-border pt-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-content-tertiary">Amount Due</span>
                            <span class="text-2xl font-bold text-primary"><?php echo e($payment->currency); ?><?php echo e(number_format($payment->amount, 2)); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            
            <?php if($payment->isPending()): ?>
                <div class="rounded-xl bg-warning/10 border border-warning/30 p-4 flex items-start gap-3">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'clock','class' => 'w-5 h-5 text-warning mt-0.5 shrink-0']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'clock','class' => 'w-5 h-5 text-warning mt-0.5 shrink-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <div>
                        <p class="text-sm font-semibold text-warning">Payment status: Pending</p>
                        <p class="text-xs text-content-secondary mt-1 leading-relaxed">
                            Your signal subscription will only become active after an administrator verifies and approves your payment.
                            No money has been deducted from your internal wallet.
                        </p>
                    </div>
                </div>
            <?php elseif($payment->isApproved()): ?>
                <div class="rounded-xl bg-gain/10 border border-gain/30 p-4 flex items-start gap-3">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'check-circle','class' => 'w-5 h-5 text-gain mt-0.5 shrink-0']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'check-circle','class' => 'w-5 h-5 text-gain mt-0.5 shrink-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <div>
                        <p class="text-sm font-semibold text-gain">Payment approved</p>
                        <p class="text-xs text-content-secondary mt-1 leading-relaxed">
                            Your subscription to <?php echo e($payment->plan_name); ?> is active
                            <?php if($payment->subscription && $payment->subscription->expires_at): ?>
                                until <?php echo e($payment->subscription->expires_at->toDayDateTimeString()); ?>.
                            <?php else: ?>
                                .
                            <?php endif; ?>
                        </p>
                        <a href="<?php echo e(route('user.signal.subscriptions')); ?>" class="inline-flex items-center gap-1 text-xs font-semibold text-gain mt-2 hover:underline">
                            View my subscriptions <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'arrow-right','class' => 'w-3.5 h-3.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'arrow-right','class' => 'w-3.5 h-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <div class="rounded-xl bg-loss/10 border border-loss/30 p-4 flex items-start gap-3">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'x-circle','class' => 'w-5 h-5 text-loss mt-0.5 shrink-0']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'x-circle','class' => 'w-5 h-5 text-loss mt-0.5 shrink-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <div>
                        <p class="text-sm font-semibold text-loss">Payment rejected</p>
                        <p class="text-xs text-content-secondary mt-1 leading-relaxed">
                            <?php echo e($payment->rejection_reason ?: 'Your payment could not be verified. Please contact support or create a new payment request.'); ?>

                        </p>
                        <a href="<?php echo e(route('user.signal.plans')); ?>" class="inline-flex items-center gap-1 text-xs font-semibold text-loss mt-2 hover:underline">
                            Choose a plan again <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'arrow-right','class' => 'w-3.5 h-3.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'arrow-right','class' => 'w-3.5 h-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

            <div class="rounded-xl bg-surface-raised border border-surface-border p-4 flex items-start gap-3">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'shield-check','class' => 'w-5 h-5 text-primary mt-0.5 shrink-0']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'shield-check','class' => 'w-5 h-5 text-primary mt-0.5 shrink-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <p class="text-xs text-content-tertiary leading-relaxed">
                    Pay only to the wallet address shown on this page. Always double-check the
                    network before sending funds. Crypto payments are irreversible.
                </p>
            </div>
        </div>

        
        <div class="lg:col-span-2 space-y-6">
            <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden"
                 x-data="{ method: '<?php echo e(old('payment_method_id', $payment->signal_payment_method_id)); ?>' }">
                <div class="p-5 border-b border-surface-border">
                    <h3 class="text-sm font-semibold text-content-primary">Payment Method</h3>
                    <p class="text-xs text-content-tertiary mt-1">Select the cryptocurrency and network you paid with.</p>
                </div>

                <div class="p-5 space-y-5">
                    <?php if($errors->any()): ?>
                        <div class="rounded-lg bg-loss/10 border border-loss/30 p-3">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p class="text-xs text-loss"><?php echo e($error); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>

                    <?php if($methods->isEmpty()): ?>
                        <div class="rounded-lg bg-warning/10 border border-warning/30 p-4 text-sm text-content-secondary">
                            No cryptocurrency payment methods are configured right now. Please contact support.
                        </div>
                    <?php else: ?>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="relative flex items-center gap-3 p-4 rounded-xl border cursor-pointer transition-colors"
                                       :class="method == '<?php echo e($method->id); ?>' ? 'border-primary bg-primary/5' : 'border-surface-border bg-surface-overlay/40 hover:border-primary/40'">
                                    <input type="radio" name="payment_method_picker" value="<?php echo e($method->id); ?>"
                                           x-model="method" class="sr-only" <?php echo e($payment->isPending() ? '' : 'disabled'); ?>>
                                    <span class="w-9 h-9 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0">
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
                                    <span class="min-w-0">
                                        <span class="block text-sm font-semibold text-content-primary truncate"><?php echo e($method->name); ?></span>
                                        <span class="block text-xs text-content-tertiary truncate">
                                            <?php echo e($method->currency ?: $method->name); ?><?php if($method->network): ?> · <?php echo e($method->network); ?><?php endif; ?>
                                        </span>
                                    </span>
                                    <span class="ml-auto w-4 h-4 rounded-full border-2 shrink-0 flex items-center justify-center"
                                          :class="method == '<?php echo e($method->id); ?>' ? 'border-primary' : 'border-surface-border'">
                                        <span class="w-2 h-2 rounded-full bg-primary" x-show="method == '<?php echo e($method->id); ?>'"></span>
                                    </span>
                                </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        
                        <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div x-show="method == '<?php echo e($method->id); ?>'" x-cloak x-transition.opacity class="space-y-4">
                                <?php if($payment->isPending()): ?>
                                    <div class="rounded-xl border border-surface-border bg-surface-overlay/30 p-4 sm:p-5">
                                        <div class="flex flex-col sm:flex-row items-center gap-5">
                                            
                                            <div class="shrink-0">
                                                <?php if($method->qr_code): ?>
                                                    <div class="p-2 bg-white rounded-xl inline-block">
                                                        <img src="<?php echo e(asset('storage/' . $method->qr_code)); ?>" alt="<?php echo e($method->name); ?> QR code" class="w-40 h-40 object-contain">
                                                    </div>
                                                <?php else: ?>
                                                    <div class="p-2 bg-white rounded-xl inline-flex items-center justify-center w-[176px] h-[176px]">
                                                        <div class="signal-qr" data-qr-text="<?php echo e($method->wallet_address); ?>"></div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            
                                            <div class="flex-1 w-full space-y-3">
                                                <div>
                                                    <p class="text-xs uppercase tracking-wide text-content-tertiary mb-1">Send to <?php echo e($method->name); ?> address</p>
                                                    <div class="flex items-stretch gap-2">
                                                        <input type="text" readonly value="<?php echo e($method->wallet_address); ?>"
                                                               id="wallet-address-<?php echo e($method->id); ?>"
                                                               class="flex-1 min-w-0 bg-surface-overlay border border-surface-border rounded-lg px-3 py-2.5 text-xs sm:text-sm text-content-primary font-mono select-all focus:outline-none">
                                                        <button type="button"
                                                                x-data="{ copied: false }"
                                                                @click="
                                                                    const input = document.getElementById('wallet-address-<?php echo e($method->id); ?>');
                                                                    const done = () => { copied = true; setTimeout(() => copied = false, 2000); };
                                                                    if (navigator.clipboard && window.isSecureContext) {
                                                                        navigator.clipboard.writeText(input.value).then(done).catch(() => { input.select(); document.execCommand('copy'); done(); });
                                                                    } else { input.select(); document.execCommand('copy'); done(); }
                                                                "
                                                                class="px-3 rounded-lg border border-primary/30 bg-primary/10 text-primary hover:bg-primary/20 transition flex items-center gap-1.5">
                                                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'copy','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'copy','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                            <span class="text-xs font-semibold hidden sm:inline" x-text="copied ? 'Copied!' : 'Copy'">Copy</span>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="grid grid-cols-2 gap-3 text-xs">
                                                    <div>
                                                        <p class="text-content-tertiary">Network</p>
                                                        <p class="font-semibold text-content-primary"><?php echo e($method->network ?: '—'); ?></p>
                                                    </div>
                                                    <div>
                                                        <p class="text-content-tertiary">Amount to send</p>
                                                        <p class="font-semibold text-content-primary"><?php echo e($payment->currency); ?><?php echo e(number_format($payment->amount, 2)); ?></p>
                                                    </div>
                                                </div>

                                                <?php if($method->instructions): ?>
                                                    <div class="rounded-lg bg-primary/5 border border-primary/20 p-3">
                                                        <p class="text-xs text-content-secondary whitespace-pre-line"><?php echo e($method->instructions); ?></p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    
                    <?php if($payment->isPending() && $methods->isNotEmpty()): ?>
                        <form action="<?php echo e(route('user.signal.payment.confirm', $payment->id)); ?>" method="POST" class="border-t border-surface-border pt-5 space-y-4">
                            <?php echo csrf_field(); ?>
                            <div>
                                <label for="payment_method_id" class="block text-sm font-medium text-content-primary mb-1.5">Selected Payment Method</label>
                                <select name="payment_method_id" id="payment_method_id" x-model="method" required
                                        class="w-full bg-surface-overlay border border-surface-border rounded-lg px-3 py-2.5 text-sm text-content-primary focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                                    <option value="">Select payment method</option>
                                    <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($method->id); ?>"><?php echo e($method->name); ?><?php if($method->network): ?> — <?php echo e($method->network); ?><?php endif; ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div>
                                <label for="tx_hash" class="block text-sm font-medium text-content-primary mb-1.5">Transaction Hash / TXID</label>
                                <input type="text" name="tx_hash" id="tx_hash" required maxlength="191"
                                       value="<?php echo e(old('tx_hash', $payment->tx_hash)); ?>"
                                       placeholder="Paste the transaction hash or TXID of your payment"
                                       class="w-full bg-surface-overlay border border-surface-border rounded-lg px-3 py-2.5 text-sm text-content-primary font-mono focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                                <p class="text-xs text-content-tertiary mt-1.5">
                                    You can find the TXID in your wallet or on the blockchain explorer after sending the payment.
                                </p>
                            </div>

                            <div class="rounded-lg bg-primary/5 border border-primary/20 p-3 flex items-start gap-2">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'information-circle','class' => 'w-4 h-4 text-primary mt-0.5 shrink-0']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'information-circle','class' => 'w-4 h-4 text-primary mt-0.5 shrink-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <p class="text-xs text-content-secondary">
                                    After submitting, your payment status stays <strong>Pending</strong> until an administrator verifies it.
                                    Your subscription activates automatically once approved.
                                </p>
                            </div>

                            <button type="submit"
                                    class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-semibold transition-colors">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'check-circle','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'check-circle','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <?php echo e($payment->tx_hash ? 'Update Payment Confirmation' : 'Submit Payment Confirmation'); ?>

                            </button>
                        </form>
                    <?php elseif(!$payment->isPending()): ?>
                        <div class="border-t border-surface-border pt-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                            <div class="text-sm">
                                <p class="text-content-tertiary">Submitted TXID</p>
                                <p class="font-mono text-content-primary break-all"><?php echo e($payment->tx_hash ?: '—'); ?></p>
                            </div>
                            <a href="<?php echo e(route('user.signal.payments')); ?>" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-surface-overlay border border-surface-border text-sm font-medium text-content-secondary hover:text-content-primary transition-colors">
                                View all payments
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            
            <?php if($payment->tx_hash): ?>
                <div class="rounded-xl bg-surface-raised border border-surface-border p-5 space-y-3">
                    <div class="flex items-center justify-between gap-3">
                        <h3 class="text-sm font-semibold text-content-primary">Submitted Payment</h3>
                        <span class="text-xs text-content-tertiary"><?php echo e($payment->submitted_at ? $payment->submitted_at->toDayDateTimeString() : ''); ?></span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <div>
                            <p class="text-xs text-content-tertiary">Payment method</p>
                            <p class="font-medium text-content-primary"><?php echo e($payment->methodLabel()); ?></p>
                        </div>
                        <div>
                            <p class="text-xs text-content-tertiary">Transaction hash / TXID</p>
                            <p class="font-mono text-content-primary break-all"><?php echo e($payment->tx_hash); ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof QRCode === 'undefined') {
            return;
        }

        document.querySelectorAll('.signal-qr[data-qr-text]').forEach(function (el) {
            var text = el.getAttribute('data-qr-text');
            if (!text) {
                return;
            }
            el.innerHTML = '';
            new QRCode(el, {
                text: text,
                width: 160,
                height: 160,
                colorDark: '#111827',
                colorLight: '#ffffff',
                correctLevel: QRCode.CorrectLevel.M
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\signals\payment.blade.php ENDPATH**/ ?>