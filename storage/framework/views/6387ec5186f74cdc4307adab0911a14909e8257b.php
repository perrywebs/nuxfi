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

    <?php echo $__env->make('user.partials.page-header', [
        'title' => 'Credit Card',
        'subtitle' => 'Apply for your physical card and track its delivery',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        
        <div
            class="rounded-2xl bg-neutral-950 p-5 sm:p-8 flex flex-col items-center justify-center border border-amber-500/10 shadow-2xl">

            <div class="w-full max-w-md">

                
                <div class="w-full aspect-[1.586/1]" style="perspective: 1200px;">

                    <div id="platinumCard" class="relative w-full h-full"
                        style="
                    transform-style: preserve-3d;
                    transition: transform 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                ">

                        
                        <div class="absolute inset-0 rounded-[22px] overflow-hidden select-none border border-white/20"
                            style="
                        backface-visibility: hidden;
                        -webkit-backface-visibility: hidden;
                        transform: rotateY(0deg);

                        background:
                            radial-gradient(
                                circle at 12% 8%,
                                rgba(245, 158, 11, 0.28),
                                transparent 30%
                            ),
                            radial-gradient(
                                circle at 90% 90%,
                                rgba(180, 83, 9, 0.30),
                                transparent 38%
                            ),
                            linear-gradient(
                                135deg,
                                #071a3a 0%,
                                #0c2857 25%,
                                #163b78 48%,
                                #0a2550 72%,
                                #050f24 100%
                            );

                        box-shadow:
                            0 30px 70px rgba(0,0,0,.65),
                            inset 0 1px 1px rgba(255,255,255,.35),
                            inset 0 -1px 2px rgba(0,0,0,.7);
                    ">

                            
                            <div class="absolute inset-0 pointer-events-none"
                                style="
                                    background:
                                        linear-gradient(
                                            115deg,
                                            transparent 15%,
                                            rgba(255,255,255,.03) 30%,
                                            rgba(255,255,255,.18) 40%,
                                            rgba(255,255,255,.06) 46%,
                                            transparent 62%
                                        );
                                ">
                            </div>

                            
                            <div class="absolute inset-0 opacity-[0.06] pointer-events-none"
                                style="
                            background-image:
                                linear-gradient(
                                    135deg,
                                    rgba(251,191,36,.7) 1px,
                                    transparent 1px
                                );
                            background-size: 14px 14px;
                        ">
                            </div>

                            
                            <div class="absolute inset-[1px] rounded-[21px] pointer-events-none"
                                style="
                            box-shadow:
                                inset 0 0 25px rgba(245,158,11,.06),
                                inset 0 1px 0 rgba(253,230,138,.15);
                        ">
                            </div>


                            
                            <div class="relative z-10 h-full p-5 sm:p-7 flex flex-col justify-between">

                                
                                <div class="flex items-start justify-between">

                                    
                                    <div class="flex items-center gap-2.5">

                                        <div class="w-9 h-9 rounded-xl flex items-center justify-center shadow-lg border border-amber-300/60"
                                            style="
                                        background:
                                            linear-gradient(
                                                145deg,
                                                #fff7c2,
                                                #fbbf24,
                                                #d97706,
                                                #fde68a,
                                                #b45309
                                            );
                                        box-shadow:
                                            0 4px 15px rgba(245,158,11,.25),
                                            inset 0 1px 1px rgba(255,255,255,.8);
                                    ">

                                            <span class="text-[10px] font-black text-[#071a3a] tracking-tight">
                                                <?php echo e(strtoupper(substr($settings->site_name ?? 'NFI', 0, 3))); ?>

                                            </span>

                                        </div>

                                        <div>

                                            <p class="text-[9px] font-black tracking-[0.25em] uppercase text-white">
                                                <?php echo e($settings->site_name ?? 'NFI'); ?>

                                            </p>

                                            <p
                                                class="text-[7px] tracking-[0.2em] uppercase text-amber-300/80 font-semibold">
                                                Platinum Member
                                            </p>

                                        </div>

                                    </div>


                                    
                                    <div class="text-amber-300" style="filter: drop-shadow(0 0 5px rgba(245,158,11,.35));">

                                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="1.6">

                                            <path d="M8.5 4.5a11 11 0 0 1 0 15" stroke-linecap="round" />

                                            <path d="M12 2a14 14 0 0 1 0 20" stroke-linecap="round" />

                                            <path d="M15.5 4.5a11 11 0 0 0 0 15" stroke-linecap="round" />

                                        </svg>

                                    </div>

                                </div>


                                
                                <div class="flex items-center justify-between">

                                    
                                    <div class="w-[53px] h-[41px] rounded-lg p-[1.5px] shadow-xl"
                                        style="
                                    background:
                                        linear-gradient(
                                            135deg,
                                            #fff7c2,
                                            #f59e0b,
                                            #b45309,
                                            #fde68a,
                                            #d97706,
                                            #fff7c2
                                        );
                                    box-shadow:
                                        0 6px 18px rgba(245,158,11,.25),
                                        inset 0 1px 1px rgba(255,255,255,.8);
                                ">

                                        <div class="w-full h-full rounded-[7px] overflow-hidden"
                                            style="
                                        background:
                                            linear-gradient(
                                                135deg,
                                                #fef3a8,
                                                #d97706,
                                                #f59e0b,
                                                #92400e,
                                                #fbbf24
                                            );
                                    ">

                                            <div class="grid grid-cols-3 grid-rows-2 w-full h-full p-1 gap-[1px]">

                                                <div class="border border-amber-900/70 rounded-sm"></div>
                                                <div class="border border-amber-900/70 rounded-sm"></div>
                                                <div class="border border-amber-900/70 rounded-sm"></div>

                                                <div class="border border-amber-900/70 rounded-sm"></div>
                                                <div class="border border-amber-900/70 rounded-sm"></div>
                                                <div class="border border-amber-900/70 rounded-sm"></div>

                                            </div>

                                        </div>

                                    </div>


                                    
                                    <div class="text-right">

                                        <p class="text-[8px] uppercase tracking-[0.3em] text-amber-300/70 font-bold">
                                            Card
                                        </p>

                                        <p class="text-sm sm:text-base font-black tracking-[0.2em]"
                                            style="
                                        background: linear-gradient(
                                            90deg,
                                            #fde68a,
                                            #fbbf24,
                                            #fff7c2,
                                            #d97706
                                        );
                                        -webkit-background-clip: text;
                                        background-clip: text;
                                        color: transparent;
                                    ">
                                            PLATINUM
                                        </p>

                                    </div>

                                </div>


                                
                                <div>

                                    <p class="text-[7px] uppercase tracking-[0.3em] text-amber-300/70 font-bold mb-1">
                                        Card Number
                                    </p>

                                    <div
                                        class="text-[18px] sm:text-[22px] tracking-[0.18em] font-mono font-bold text-white drop-shadow-lg">

                                        •••• •••• ••••
                                        <?php echo e(str_pad(substr((string) Auth::user()->id, -4), 4, '0', STR_PAD_LEFT)); ?>


                                    </div>


                                    
                                    <div class="mt-3 flex items-end justify-between">

                                        <div class="min-w-0">

                                            <p class="text-[7px] uppercase tracking-[0.25em] text-amber-300/70 font-bold">
                                                Card Holder
                                            </p>

                                            <p
                                                class="text-[11px] sm:text-xs font-black tracking-wider text-white uppercase truncate">
                                                <?php echo e(Auth::user()->name); ?>

                                            </p>

                                        </div>


                                        <div class="text-right ml-4">

                                            <p class="text-[7px] uppercase tracking-[0.25em] text-amber-300/70 font-bold">
                                                Valid Thru
                                            </p>

                                            <p
                                                class="text-[11px] sm:text-xs font-bold tracking-widest text-white font-mono">
                                                12/28
                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        
                        <div class="absolute inset-0 rounded-[22px] overflow-hidden select-none border border-amber-400/30"
                            style="
                        backface-visibility: hidden;
                        -webkit-backface-visibility: hidden;
                        transform: rotateY(180deg);

                        background:
                            radial-gradient(
                                circle at 80% 10%,
                                rgba(245,158,11,.18),
                                transparent 30%
                            ),
                            linear-gradient(
                                145deg,
                                #071a3a,
                                #102f62 35%,
                                #0a234b 65%,
                                #050f24 100%
                            );

                        box-shadow:
                            0 30px 70px rgba(0,0,0,.65),
                            inset 0 1px 1px rgba(251,191,36,.3);
                    ">

                            
                            <div class="absolute inset-0 pointer-events-none"
                                style="
                            background:
                                linear-gradient(
                                    115deg,
                                    transparent 20%,
                                    rgba(245,158,11,.04) 38%,
                                    rgba(251,191,36,.15) 46%,
                                    rgba(255,255,255,.05) 50%,
                                    transparent 62%
                                );
                        ">
                            </div>


                            
                            <div class="absolute inset-[1px] rounded-[21px] pointer-events-none"
                                style="
                            box-shadow:
                                inset 0 0 25px rgba(245,158,11,.05),
                                inset 0 1px 0 rgba(253,230,138,.12);
                        ">
                            </div>


                            
                            <div class="relative z-10 h-full flex flex-col justify-between py-5 sm:py-6">

                                
                                <div class="w-full h-11 sm:h-12 bg-[#020817] shadow-inner border-y border-amber-500/20">
                                </div>


                                
                                <div class="px-5 sm:px-7">

                                    <div class="flex items-end gap-3">

                                        
                                        <div class="flex-1">

                                            <p
                                                class="text-[7px] uppercase tracking-[0.2em] text-amber-300/60 font-bold mb-1">
                                                Authorized Signature
                                            </p>

                                            <div
                                                class="h-8 sm:h-9 bg-white rounded-md border border-amber-300/30 relative overflow-hidden">

                                                <div class="absolute inset-0 opacity-20"
                                                    style="
                                                background-image:
                                                repeating-linear-gradient(
                                                    0deg,
                                                    transparent 0px,
                                                    transparent 5px,
                                                    #64748b 6px
                                                );
                                            ">
                                                </div>

                                            </div>

                                        </div>


                                        
                                        <div class="w-[68px] sm:w-[76px]">

                                            <p
                                                class="text-[7px] uppercase tracking-[0.2em] text-amber-300/70 font-bold mb-1 text-center">
                                                CVV
                                            </p>

                                            <div
                                                class="h-8 sm:h-9 bg-white rounded-md border border-amber-300/40 flex items-center justify-center shadow-md">

                                                <span
                                                    class="font-mono font-black text-sm sm:text-base tracking-[0.25em] text-[#071a3a]">
                                                    ***
                                                </span>

                                            </div>

                                        </div>

                                    </div>


                                    
                                    <div class="mt-3">

                                        <p class="text-[7px] leading-relaxed text-blue-100/60">

                                            This card remains the property of

                                            <span class="font-bold text-amber-200/80">
                                                <?php echo e($settings->site_name ?? 'NFI'); ?>

                                            </span>.

                                            Use of this card is subject to the applicable cardholder terms.
                                            If found, please return it to the issuing institution.

                                        </p>

                                    </div>

                                </div>


                                
                                <div class="px-5 sm:px-7 flex items-center justify-between">

                                    <div>

                                        <p class="text-[7px] uppercase tracking-[0.2em] text-amber-300/50 font-bold">
                                            Customer Support
                                        </p>

                                        <p class="text-[9px] font-bold text-white/80">
                                            +1 (800) 555-0199
                                        </p>

                                    </div>


                                    <div class="text-right">

                                        <p class="text-[10px] font-black tracking-[0.3em]"
                                            style="
                                        background: linear-gradient(
                                            90deg,
                                            #fde68a,
                                            #fbbf24,
                                            #fff7c2,
                                            #d97706
                                        );
                                        -webkit-background-clip: text;
                                        background-clip: text;
                                        color: transparent;
                                    ">
                                            PLATINUM
                                        </p>

                                        <p class="text-[6px] tracking-[0.25em] text-amber-300/50 uppercase">
                                            Premium Card
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                
                <div class="mt-6 flex justify-center">

                    <button type="button" id="platinumCardFlipBtn"
                        class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-amber-500/10 border border-amber-400/25 text-xs font-bold text-amber-200 hover:text-white hover:bg-amber-500/20 hover:border-amber-300/50 transition-all duration-300 shadow-xl active:scale-95">

                        <svg id="platinumCardFlipIcon" class="w-4 h-4 text-amber-300" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7h12m0 0l-4-4m4 4l-4 4m-4 10H4m0 0l4-4m-4 4l4 4" />

                        </svg>

                        <span id="platinumCardFlipText">
                            View Back Side
                        </span>

                    </button>

                </div>

            </div>
        </div>


        
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const card = document.getElementById('platinumCard');
                const button = document.getElementById('platinumCardFlipBtn');
                const text = document.getElementById('platinumCardFlipText');

                if (!card || !button || !text) {
                    return;
                }

                let isFlipped = false;

                button.addEventListener('click', function() {

                    isFlipped = !isFlipped;

                    if (isFlipped) {

                        card.style.transform = 'rotateY(180deg)';
                        text.textContent = 'View Front Side';

                    } else {

                        card.style.transform = 'rotateY(0deg)';
                        text.textContent = 'View Back Side';

                    }

                });

            });
        </script>


        
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const card = document.getElementById('platinumCard');
                const button = document.getElementById('platinumCardFlipBtn');
                const text = document.getElementById('platinumCardFlipText');

                if (!card || !button || !text) {
                    return;
                }

                let isFlipped = false;

                button.addEventListener('click', function() {

                    isFlipped = !isFlipped;

                    if (isFlipped) {

                        card.style.transform = 'rotateY(180deg)';
                        text.textContent = 'View Front Side';

                    } else {

                        card.style.transform = 'rotateY(0deg)';
                        text.textContent = 'View Back Side';

                    }

                });

            });
        </script>

        
        <div class="rounded-xl bg-surface-raised border border-surface-border p-6">
            <?php if($canApply): ?>
                <?php if($card && $card->status === 'denied'): ?>
                    <div class="mb-5 rounded-lg bg-danger/10 border border-danger/20 px-4 py-3 text-sm text-danger">
                        Your previous application (<span class="font-mono"><?php echo e($card->reference_number); ?></span>) was
                        denied.
                        <?php if($card->isRefunded()): ?>
                            The application fee of <span class="font-semibold"><?php echo \App\Helpers\CurrencyHelper::formatForUser($card->fee); ?></span> has been refunded
                            to
                            your account.
                        <?php endif; ?>
                        You may submit a new application below.
                    </div>
                <?php endif; ?>

                <h3 class="text-lg font-semibold text-content-primary mb-1">Credit Card Application</h3>
                <p class="text-sm text-content-tertiary mb-6">Complete the form below to request your physical card.</p>

                <div
                    class="flex items-center justify-between rounded-lg bg-surface-overlay border border-surface-border-light px-4 py-3 mb-6">
                    <span class="text-sm text-content-secondary">Application Fee</span>
                    <span class="text-lg font-bold text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($cardFee); ?></span>
                </div>

                <form method="POST" action="<?php echo e(route('card.apply')); ?>" x-data="{ submitting: false }"
                    @submit="submitting = true" class="space-y-4">
                    <?php echo csrf_field(); ?>

                    <div>
                        <label
                            class="block text-xs font-medium text-content-tertiary uppercase tracking-wide mb-1.5">Delivery
                            Address</label>
                        <textarea name="delivery_address" rows="4" required
                            class="w-full bg-surface-overlay border border-surface-border-light rounded-lg px-4 py-3 text-sm text-content-primary focus:outline-none focus:border-primary transition resize-none"
                            placeholder="Enter the full address where your card should be shipped"><?php echo e(old('delivery_address', $card && $card->status === 'denied' ? $card->delivery_address : '')); ?></textarea>
                        <?php $__errorArgs = ['delivery_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1.5 text-xs text-danger"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="flex items-center justify-between pt-2">
                        <p class="text-xs text-content-tertiary max-w-[60%]">The fee will be deducted from your available
                            balance.</p>
                        <button type="submit" :disabled="submitting"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-primary text-content-inverse font-semibold hover:bg-primary-dark transition disabled:opacity-60 disabled:cursor-not-allowed">
                            <span x-show="!submitting">Apply for Credit Card</span>
                            <span x-show="submitting" x-cloak>Processing…</span>
                        </button>
                    </div>
                </form>
            <?php else: ?>
                
                <?php
                    $statusStyles = [
                        'requested' => 'bg-warning/10 text-warning',
                        'approved' => 'bg-info/10 text-info',
                        'denied' => 'bg-danger/10 text-danger',
                        'shipped' => 'bg-info/10 text-info',
                        'delivered' => 'bg-gain/10 text-gain',
                    ];
                    $badge = $statusStyles[$card->status] ?? 'bg-surface-overlay text-content-secondary';
                ?>

                <h3 class="text-lg font-semibold text-content-primary mb-1">Your Card Application</h3>
                <p class="text-sm text-content-tertiary mb-5">Track the status of your credit card request.</p>

                <div class="flex items-center gap-3 mb-6">
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold <?php echo e($badge); ?>">
                        <?php echo e($card->statusLabel()); ?>

                    </span>
                </div>

                <dl class="space-y-3 text-sm">
                    <div class="flex items-center justify-between border-b border-surface-border pb-3">
                        <dt class="text-content-tertiary">Application #</dt>
                        <dd class="font-mono font-medium text-content-primary"><?php echo e($card->reference_number); ?></dd>
                    </div>
                    <div class="flex items-center justify-between border-b border-surface-border pb-3">
                        <dt class="text-content-tertiary">Fee Paid</dt>
                        <dd class="font-medium text-content-primary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($card->fee); ?></dd>
                    </div>
                    <div class="flex items-start justify-between border-b border-surface-border pb-3">
                        <dt class="text-content-tertiary pt-1">Delivery Address</dt>
                        <dd class="text-right max-w-[65%] text-content-primary"><?php echo e($card->delivery_address); ?></dd>
                    </div>
                    <div class="flex items-center justify-between">
                        <dt class="text-content-tertiary">Date Requested</dt>
                        <dd class="font-medium text-content-primary"><?php echo e($card->created_at->format('M d, Y H:i')); ?></dd>
                    </div>
                </dl>

                <?php if($card->status === 'delivered'): ?>
                    <div class="mt-6 rounded-lg bg-gain/10 border border-gain/20 px-4 py-3 text-sm text-gain">
                        Your card has been delivered. You can now activate it from your dashboard.
                    </div>
                <?php elseif($card->status === 'shipped'): ?>
                    <div class="mt-6 rounded-lg bg-info/10 border border-info/20 px-4 py-3 text-sm text-info">
                        Your card is on the way. We'll notify you once it's delivered.
                    </div>
                <?php elseif($card->status === 'approved'): ?>
                    <div class="mt-6 rounded-lg bg-info/10 border border-info/20 px-4 py-3 text-sm text-info">
                        Your application has been approved and your card is being prepared for shipping.
                    </div>
                <?php elseif($card->status === 'requested'): ?>
                    <div class="mt-6 rounded-lg bg-warning/10 border border-warning/20 px-4 py-3 text-sm text-warning">
                        Your request has been received and is awaiting review by our team.
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/user/credit-card.blade.php ENDPATH**/ ?>