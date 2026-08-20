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

    
    <div class="relative overflow-hidden rounded-2xl border border-surface-border bg-surface-raised px-6 py-8 lg:px-10">
        
        <div class="pointer-events-none absolute -top-24 -right-16 w-72 h-72 rounded-full bg-[radial-gradient(circle,rgba(246,196,83,0.16),transparent_70%)]"></div>
        <div class="pointer-events-none absolute -bottom-28 -left-16 w-80 h-80 rounded-full bg-[radial-gradient(circle,rgba(5,150,105,0.12),transparent_70%)]"></div>
        <div class="pointer-events-none absolute top-8 right-1/4 text-warning/25 te-twinkle" style="animation-delay:.4s">
            <svg class="w-3 h-3" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0l2.6 7.4L22 10l-7.4 2.6L12 20l-2.6-7.4L2 10l7.4-2.6L12 0z"/></svg>
        </div>
        <div class="pointer-events-none absolute top-16 right-10 text-warning/20 te-twinkle" style="animation-delay:1.1s">
            <svg class="w-2 h-2" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0l2.6 7.4L22 10l-7.4 2.6L12 20l-2.6-7.4L2 10l7.4-2.6L12 0z"/></svg>
        </div>

        <div class="relative flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 te-fade-up">
            
            <div class="flex items-start gap-4">
                <div class="flex items-center justify-center w-14 h-14 rounded-2xl bg-warning/10 border border-warning/25 shrink-0">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'trophy','class' => 'w-7 h-7 text-warning']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'trophy','class' => 'w-7 h-7 text-warning']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-content-primary">Top Earners</h2>
                    <p class="text-sm text-content-secondary mt-1">See the traders generating the highest earnings on <?php echo e($settings->site_name); ?>.</p>
                    <p class="text-xs text-content-tertiary mt-1.5">Ranked by total profit from live trades, investments, copy &amp; bot trading.</p>
                </div>
            </div>

            
            <div class="flex items-center gap-1 bg-surface-base border border-surface-border rounded-xl p-1 shrink-0">
                <?php $__currentLoopData = $periods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('top-earners', ['period' => $p['key']])); ?>"
                       class="px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200
                              <?php echo e($period === $p['key']
                                    ? 'bg-warning text-content-inverse shadow-[0_0_16px_rgba(245,158,11,0.35)]'
                                    : 'text-content-tertiary hover:text-content-primary hover:bg-surface-overlay'); ?>">
                        <?php echo e($p['label']); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <?php if($totalEarners > 0): ?>

        
        <?php
            $rankThemes = [
                1 => ['label' => 'Champion', 'gold' => true],
                2 => ['label' => 'Runner Up', 'gold' => false],
                3 => ['label' => 'Third Place', 'gold' => false],
                4 => ['label' => 'Fourth', 'gold' => false],
            ];
        ?>

        <section class="mt-8">
            <div class="flex items-center gap-2 mb-5">
                <h3 class="text-lg font-bold text-content-primary">Leaderboard Podium</h3>
                <span class="text-xs text-content-tertiary bg-surface-raised border border-surface-border rounded-full px-2.5 py-1"><?php echo e($totalEarners); ?> earners</span>
            </div>

            
            <?php if(isset($podium[0]) && ($champ = $podiumUsers[$podium[0]['user_id']] ?? null)): ?>
                <div class="te-champion relative overflow-hidden rounded-2xl border border-[#F6C453]/40 bg-surface-raised px-6 py-10 text-center shadow-[0_0_70px_-18px_rgba(246,196,83,0.45)] te-fade-up">
                    
                    <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_at_top,rgba(246,196,83,0.14),transparent_60%)]"></div>
                    <div class="pointer-events-none absolute inset-0 te-shine"></div>
                    <div class="pointer-events-none absolute top-4 left-6 text-[#F6C453]/25 te-twinkle">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0l2.6 7.4L22 10l-7.4 2.6L12 20l-2.6-7.4L2 10l7.4-2.6L12 0z"/></svg>
                    </div>
                    <div class="pointer-events-none absolute top-10 right-8 text-[#F6C453]/20 te-twinkle" style="animation-delay:.8s">
                        <svg class="w-2.5 h-2.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0l2.6 7.4L22 10l-7.4 2.6L12 20l-2.6-7.4L2 10l7.4-2.6L12 0z"/></svg>
                    </div>

                    <div class="relative flex flex-col items-center">
                        
                        <div class="te-float mb-3">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-b from-[#F6C453] to-[#D99A2B] flex items-center justify-center shadow-[0_0_30px_rgba(246,196,83,0.6)]">
                                <svg class="w-6 h-6 text-[#3A2E08]" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z"/>
                                </svg>
                            </div>
                        </div>

                        
                        <div class="relative">
                            <?php echo $__env->make('user.partials.earner-avatar', ['user' => $champ, 'class' => 'w-24 h-24 text-2xl'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <span class="absolute -bottom-1 left-1/2 -translate-x-1/2 text-[#F6C453]">
                                <svg class="w-6 h-6 drop-shadow-[0_0_8px_rgba(246,196,83,0.8)]" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21 12 17.27z"/></svg>
                            </span>
                        </div>

                        
                        <div class="flex items-center justify-center gap-2 mt-4">
                            <h4 class="text-xl font-bold text-content-primary"><?php echo e($champ->username ?: $champ->name); ?></h4>
                            <?php if($champ->account_verify == 'Verified'): ?>
                                <svg class="w-5 h-5 text-[#3B82F6]" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd"/>
                                </svg>
                            <?php endif; ?>
                        </div>

                        
                        <p class="mt-2 text-2xl font-extrabold text-gain">+<?php echo \App\Helpers\CurrencyHelper::formatForUser($podium[0]['earnings']); ?></p>
                        <span class="mt-3 inline-flex items-center gap-1.5 text-[11px] font-bold uppercase tracking-widest text-[#F6C453] bg-[#F6C453]/10 border border-[#F6C453]/30 rounded-full px-3 py-1">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z"/></svg>
                            #1 Champion
                        </span>
                    </div>
                </div>
            <?php endif; ?>

            
            <?php
                $cardThemes = [
                    2 => ['border' => 'border-[#CBD5E1]/30', 'ring' => 'ring-[#CBD5E1]/40', 'text' => 'text-[#CBD5E1]', 'glow' => 'shadow-[0_0_40px_-12px_rgba(203,213,225,0.35)]', 'medal' => 'from-[#CBD5E1] to-[#94A3B8]'],
                    3 => ['border' => 'border-[#E2A76F]/30', 'ring' => 'ring-[#E2A76F]/40', 'text' => 'text-[#E2A76F]', 'glow' => 'shadow-[0_0_40px_-12px_rgba(226,167,111,0.35)]', 'medal' => 'from-[#E2A76F] to-[#B97B3C]'],
                    4 => ['border' => 'border-[#A78BFA]/30', 'ring' => 'ring-[#A78BFA]/40', 'text' => 'text-[#A78BFA]', 'glow' => 'shadow-[0_0_40px_-12px_rgba(167,139,250,0.35)]', 'medal' => 'from-[#A78BFA] to-[#7C5CE0]'],
                ];
            ?>
            <?php if(count($podium) > 1): ?>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mt-5">
                    <?php $__currentLoopData = array_slice($podium, 1, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $rank = $index + 2;
                            $theme = $cardThemes[$rank];
                            $user = $podiumUsers[$entry['user_id']] ?? null;
                            if (!$user) continue;
                        ?>
                        <div class="relative overflow-hidden rounded-2xl border <?php echo e($theme['border']); ?> <?php echo e($theme['glow']); ?> bg-surface-raised px-5 py-7 text-center te-fade-up" style="animation-delay: <?php echo e(0.1 + $index * 0.12); ?>s">
                            <div class="pointer-events-none absolute -top-14 right-0 w-40 h-40 rounded-full bg-[radial-gradient(circle,rgba(167,139,250,0.1),transparent_70%)]"></div>

                            <div class="flex flex-col items-center">
                                
                                <div class="te-float mb-3" style="animation-delay: <?php echo e($index * 0.3); ?>s">
                                    <div class="w-9 h-9 rounded-full bg-gradient-to-br <?php echo e($theme['medal']); ?> flex items-center justify-center shadow-lg">
                                        <span class="text-sm font-black text-[#1A140B]"><?php echo e($rank); ?></span>
                                    </div>
                                </div>

                                <div class="relative">
                                    <?php echo $__env->make('user.partials.earner-avatar', ['user' => $user, 'class' => 'w-16 h-16 text-lg'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <span class="absolute -bottom-1 left-1/2 -translate-x-1/2 <?php echo e($theme['text']); ?>">
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21 12 17.27z"/></svg>
                                    </span>
                                </div>

                                <div class="flex items-center justify-center gap-1.5 mt-3">
                                    <h5 class="text-sm font-bold text-content-primary truncate max-w-[160px]"><?php echo e($user->username ?: $user->name); ?></h5>
                                    <?php if($user->account_verify == 'Verified'): ?>
                                        <svg class="w-4 h-4 text-[#3B82F6] shrink-0" viewBox="0 0 24 24" fill="currentColor">
                                            <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd"/>
                                        </svg>
                                    <?php endif; ?>
                                </div>
                                <p class="mt-1.5 text-base font-bold text-gain">+<?php echo \App\Helpers\CurrencyHelper::formatForUser($entry['earnings']); ?></p>
                                <span class="mt-2 text-[10px] font-semibold uppercase tracking-wider <?php echo e($theme['text']); ?>"><?php echo e($rankThemes[$rank]['label']); ?></span>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </section>

        
        <section class="mt-8 te-fade-up" style="animation-delay:.3s">
            <div class="rounded-2xl border border-primary/30 bg-surface-raised overflow-hidden relative">
                <div class="pointer-events-none absolute -top-20 -right-10 w-64 h-64 rounded-full bg-[radial-gradient(circle,rgba(5,150,105,0.15),transparent_70%)]"></div>
                <div class="relative flex flex-col sm:flex-row sm:items-center gap-5 px-6 py-6">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-primary-subtle border border-primary/30 shrink-0">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'user','class' => 'w-6 h-6 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'user','class' => 'w-6 h-6 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-content-tertiary">Your Position</p>
                            <?php if($myRank): ?>
                                <div class="flex items-baseline gap-2 mt-0.5">
                                    <span class="text-3xl font-black text-content-primary">#<?php echo e($myRank); ?></span>
                                    <span class="text-sm text-content-tertiary">of <?php echo e($totalEarners); ?></span>
                                </div>
                            <?php else: ?>
                                <p class="text-sm text-content-secondary mt-0.5">Not ranked yet</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="sm:ml-auto text-left sm:text-right">
                        <?php if($myRank): ?>
                            <p class="text-sm text-content-secondary"><?php echo e(auth()->user()->username ?: auth()->user()->name); ?></p>
                            <p class="mt-1 text-xl font-bold text-gain">+<?php echo \App\Helpers\CurrencyHelper::formatForUser($myEarnings); ?></p>
                            <p class="text-[11px] text-content-tertiary mt-0.5">eligible earnings</p>
                        <?php else: ?>
                            <p class="text-sm text-content-secondary max-w-sm">You haven't generated enough eligible earnings to appear on the leaderboard yet.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        
        <section class="mt-8 te-fade-up" style="animation-delay:.4s">
            <div class="rounded-2xl border border-surface-border bg-surface-raised overflow-hidden">
                <div class="flex items-center justify-between px-6 py-4 border-b border-surface-border">
                    <h3 class="text-base font-bold text-content-primary">Full Leaderboard</h3>
                    <span class="text-xs text-content-tertiary">Showing <?php echo e($rows->count()); ?> of <?php echo e($totalEarners); ?> traders</span>
                </div>

                
                <div class="hidden md:grid grid-cols-12 gap-4 px-6 py-3 border-b border-surface-border bg-surface-base/60">
                    <div class="col-span-1 text-[11px] font-semibold uppercase tracking-wider text-content-tertiary">Rank</div>
                    <div class="col-span-8 text-[11px] font-semibold uppercase tracking-wider text-content-tertiary">Trader</div>
                    <div class="col-span-3 text-right text-[11px] font-semibold uppercase tracking-wider text-content-tertiary">Earnings</div>
                </div>

                <div class="divide-y divide-surface-border">
                    <?php $__currentLoopData = $rows->items(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $user = $users[$entry['user_id']] ?? null;
                            if (!$user) continue;
                            $rank = (($rows->currentPage() - 1) * $rows->perPage()) + $index + 1;
                            $isMe = auth()->id() === $entry['user_id'];
                            $badge = match(true) {
                                $rank === 1 => 'bg-[#F6C453]/15 text-[#F6C453] border-[#F6C453]/30',
                                $rank === 2 => 'bg-[#CBD5E1]/10 text-[#CBD5E1] border-[#CBD5E1]/30',
                                $rank === 3 => 'bg-[#E2A76F]/10 text-[#E2A76F] border-[#E2A76F]/30',
                                default => 'bg-surface-overlay text-content-tertiary border-surface-border',
                            };
                        ?>
                        <div class="grid grid-cols-12 items-center gap-4 px-6 py-3.5 transition-colors duration-150 te-row <?php echo e($isMe ? 'bg-primary-subtle/60 border-l-2 border-primary' : 'hover:bg-surface-overlay'); ?>" style="--te-i: <?php echo e($index % 20); ?>" <?php echo e($isMe ? 'id="my-leaderboard-row"' : ''); ?>>
                            <div class="col-span-2 md:col-span-1">
                                <span class="inline-flex items-center justify-center min-w-[34px] h-[34px] rounded-lg border text-sm font-bold <?php echo e($badge); ?>"><?php echo e($rank); ?></span>
                            </div>
                            <div class="col-span-8 md:col-span-8 flex items-center gap-3 min-w-0">
                                <?php echo $__env->make('user.partials.earner-avatar', ['user' => $user, 'class' => 'w-9 h-9 text-sm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="min-w-0">
                                    <div class="flex items-center gap-1.5">
                                        <p class="text-sm font-semibold text-content-primary truncate <?php echo e($isMe ? 'text-primary' : ''); ?>"><?php echo e($user->username ?: $user->name); ?></p>
                                        <?php if($user->account_verify == 'Verified'): ?>
                                            <svg class="w-4 h-4 text-[#3B82F6] shrink-0" viewBox="0 0 24 24" fill="currentColor">
                                                <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd"/>
                                            </svg>
                                        <?php endif; ?>
                                        <?php if($isMe): ?>
                                            <span class="text-[10px] font-semibold uppercase tracking-wide text-primary bg-primary/10 rounded-full px-2 py-0.5">You</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-2 md:col-span-3 text-right">
                                <p class="text-sm font-bold text-gain">+<?php echo \App\Helpers\CurrencyHelper::formatForUser($entry['earnings']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if($rows->count() === 0): ?>
                        <div class="px-6 py-10 text-center">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'trophy','class' => 'w-10 h-10 text-content-tertiary mx-auto mb-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'trophy','class' => 'w-10 h-10 text-content-tertiary mx-auto mb-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <p class="text-sm text-content-secondary">No earners on this page.</p>
                        </div>
                    <?php endif; ?>
                </div>

                
                <?php if($rows->hasPages()): ?>
                    <div class="flex items-center justify-center gap-1.5 px-6 py-4 border-t border-surface-border">
                        <a href="<?php echo e($rows->previousPageUrl()); ?>"
                           class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-sm font-medium text-content-secondary border border-surface-border bg-surface-base hover:text-content-primary hover:border-surface-border-light transition-colors <?php echo e($rows->onFirstPage() ? 'opacity-40 pointer-events-none' : ''); ?>">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
                            Prev
                        </a>

                        <?php
                            $lastPage = $rows->lastPage();
                            $currentPage = $rows->currentPage();
                            $startPage = max(1, $currentPage - 2);
                            $endPage = min($lastPage, $currentPage + 2);
                        ?>
                        <?php if($startPage > 1): ?>
                            <a href="<?php echo e($rows->url(1)); ?>" class="w-9 h-9 inline-flex items-center justify-center rounded-lg text-sm font-medium border border-surface-border bg-surface-base text-content-secondary hover:text-content-primary hover:border-surface-border-light transition-colors">1</a>
                            <?php if($startPage > 2): ?>
                                <span class="text-content-tertiary px-1">…</span>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php for($page = $startPage; $page <= $endPage; $page++): ?>
                            <a href="<?php echo e($rows->url($page)); ?>"
                               class="w-9 h-9 inline-flex items-center justify-center rounded-lg text-sm font-medium border transition-colors
                                      <?php echo e($page === $currentPage
                                            ? 'border-primary bg-primary text-content-inverse shadow-[0_0_14px_rgba(5,150,105,0.35)]'
                                            : 'border-surface-border bg-surface-base text-content-secondary hover:text-content-primary hover:border-surface-border-light'); ?>">
                                <?php echo e($page); ?>

                            </a>
                        <?php endfor; ?>
                        <?php if($endPage < $lastPage): ?>
                            <?php if($endPage < $lastPage - 1): ?>
                                <span class="text-content-tertiary px-1">…</span>
                            <?php endif; ?>
                            <a href="<?php echo e($rows->url($lastPage)); ?>" class="w-9 h-9 inline-flex items-center justify-center rounded-lg text-sm font-medium border border-surface-border bg-surface-base text-content-secondary hover:text-content-primary hover:border-surface-border-light transition-colors"><?php echo e($lastPage); ?></a>
                        <?php endif; ?>

                        <a href="<?php echo e($rows->nextPageUrl()); ?>"
                           class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-sm font-medium text-content-secondary border border-surface-border bg-surface-base hover:text-content-primary hover:border-surface-border-light transition-colors <?php echo e(!$rows->hasMorePages() ? 'opacity-40 pointer-events-none' : ''); ?>">
                            Next
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </section>

    <?php else: ?>
        
        <div class="mt-8 rounded-2xl border border-surface-border bg-surface-raised px-6 py-16 text-center te-fade-up">
            <div class="flex items-center justify-center w-16 h-16 rounded-full bg-surface-overlay border border-surface-border mx-auto mb-4">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'trophy','class' => 'w-8 h-8 text-content-tertiary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'trophy','class' => 'w-8 h-8 text-content-tertiary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
            <h3 class="text-lg font-bold text-content-primary">No earners yet</h3>
            <p class="text-sm text-content-secondary mt-1.5 max-w-md mx-auto">No eligible earnings have been recorded for this period. Check back once trading activity picks up.</p>
        </div>
    <?php endif; ?>

    <style>
        .te-fade-up { animation: te-fade-up .55s ease-out both; }
        .te-row { animation: te-fade-up .45s ease-out both; animation-delay: calc(var(--te-i, 0) * 40ms); }
        .te-float { animation: te-float 3s ease-in-out infinite; }
        .te-shine { background: linear-gradient(115deg, transparent 30%, rgba(246,196,83,.10) 45%, rgba(246,196,83,.22) 50%, rgba(246,196,83,.10) 55%, transparent 70%); background-size: 250% 100%; animation: te-shine 6s linear infinite; }
        .te-twinkle { animation: te-twinkle 2.4s ease-in-out infinite; }
        .te-champion { animation: te-glow 4.5s ease-in-out infinite; }

        @keyframes  te-fade-up { from { opacity: 0; transform: translateY(14px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes  te-float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-5px); } }
        @keyframes  te-shine { 0% { background-position: 200% 0; } 100% { background-position: -50% 0; } }
        @keyframes  te-twinkle { 0%, 100% { opacity: .25; transform: scale(.9); } 50% { opacity: .7; transform: scale(1.1); } }
        @keyframes  te-glow { 0%, 100% { box-shadow: 0 0 70px -18px rgba(246,196,83,.45); } 50% { box-shadow: 0 0 90px -12px rgba(246,196,83,.65); } }

        @media (prefers-reduced-motion: reduce) {
            .te-fade-up, .te-row, .te-float, .te-shine, .te-twinkle, .te-champion { animation: none !important; }
        }
    </style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/user/top-earners.blade.php ENDPATH**/ ?>