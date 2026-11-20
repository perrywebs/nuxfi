<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('user.partials.page-header', ['title' => 'Compound Investment', 'subtitle' => $investment->reference], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

    <div class="grid grid-cols-1 xl:grid-cols-[1.2fr_0.8fr] gap-5">
        <section class="rounded-xl border border-surface-border bg-surface-raised p-4 sm:p-6">
            <div class="flex flex-wrap items-start justify-between gap-3">
                <div>
                    <p class="text-xs uppercase tracking-wide text-content-tertiary">Investment reference</p>
                    <p class="mt-1 font-mono text-sm font-semibold text-content-primary"><?php echo e($investment->reference); ?></p>
                </div>
                <span class="rounded-full px-3 py-1 text-xs font-semibold
                    <?php echo e($investment->statusBadgeType() === 'success' ? 'bg-gain/10 text-gain' : ($investment->statusBadgeType() === 'danger' ? 'bg-loss/10 text-loss' : ($investment->statusBadgeType() === 'info' ? 'bg-info/10 text-info' : 'bg-warning/10 text-warning'))); ?>">
                    <?php echo e($investment->statusLabel()); ?>

                </span>
            </div>

            <?php
                $lastCompletionActivity = $investment->activities->firstWhere('action', 'completed');
                $lastCompletionTransfer = data_get($lastCompletionActivity, 'meta.amount_transferred_this_completion', 0);
            ?>
            <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 gap-x-6">
                <?php $__currentLoopData = [
                    ['Starting Amount', '$' . number_format($investment->starting_amount, 2)],
                    ['Payment', trim(($investment->payment_currency ?: $investment->payment_method) . ($investment->payment_network ? ' / ' . $investment->payment_network : ''))],
                    ['Duration', $investment->durationLabel()],
                    ['Compounding Frequency', ['monthly' => 'Monthly', 'weekly' => 'Weekly', 'daily' => 'Daily'][$investment->recurring_frequency]],
                    [['monthly' => 'Monthly', 'weekly' => 'Weekly', 'daily' => 'Daily'][$investment->duration_unit] . ' Return', number_format($investment->period_return_rate, 2) . '%'],
                    ['Recurring Top-up', '$' . number_format($investment->recurring_topup, 2) . ' / ' . ['monthly' => 'month', 'weekly' => 'week', 'daily' => 'day'][$investment->duration_unit]],
                    ['Projected Final Amount', '$' . number_format($investment->projected_final_amount, 2)],
                    ['Projected Interest', '$' . number_format($investment->projected_interest, 2)],
                    ['Total Interest Accumulated', '$' . number_format($investment->total_interest_credited, 2)],
                    ['Total Transferred to Total Profit', '$' . number_format($investment->total_interest_transferred, 2)],
                    ['Amount Transferred at Last Completion', $lastCompletionActivity ? '$' . number_format($lastCompletionTransfer, 2) : '—'],
                    ['Submitted', $investment->created_at->format('M d, Y H:i')],
                    ['Approved', optional($investment->approved_at)->format('M d, Y H:i') ?: '—'],
                    ['Started', optional($investment->activated_at)->format('M d, Y H:i') ?: '—'],
                    ['Completion Date', optional($investment->completed_at)->format('M d, Y H:i') ?: optional($lastCompletionActivity ? $lastCompletionActivity->created_at : null)->format('M d, Y H:i') ?: '—'],
                    ['Completed By', $investment->completed_by_name ?: '—'],
                    ['Total Profit After Completion', $investment->total_profit_after_completion !== null ? '$' . number_format($investment->total_profit_after_completion, 2) : '—'],
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="border-b border-surface-border py-3">
                        <p class="text-xs text-content-tertiary"><?php echo e($detail[0]); ?></p>
                        <p class="mt-1 text-sm font-medium text-content-primary"><?php echo e($detail[1]); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php if($investment->rejection_reason): ?>
                <div class="mt-4 rounded-lg border border-loss/20 bg-loss/10 p-4">
                    <p class="text-xs font-semibold text-loss">Review note</p>
                    <p class="mt-1 text-sm text-content-secondary"><?php echo e($investment->rejection_reason); ?></p>
                </div>
            <?php endif; ?>
        </section>

        <section class="rounded-xl border border-surface-border bg-surface-raised p-4 sm:p-6">
            <h2 class="text-base font-semibold text-content-primary">Status tracking</h2>
            <div class="mt-4 space-y-4">
                <?php $__currentLoopData = $investment->activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="relative border-l border-surface-border pl-4 pb-1">
                        <span class="absolute -left-[5px] top-1 h-2.5 w-2.5 rounded-full bg-primary ring-4 ring-surface-raised"></span>
                        <p class="text-sm font-medium text-content-primary"><?php echo e(ucfirst(str_replace('_', ' ', $activity->action))); ?></p>
                        <p class="mt-1 text-xs leading-relaxed text-content-secondary"><?php echo e($activity->description); ?></p>
                        <p class="mt-1 text-[11px] text-content-tertiary">
                            <?php echo e($activity->created_at->format('M d, Y H:i')); ?>

                            <?php if($activity->actor_name): ?> · <?php echo e($activity->actor_name); ?> <?php endif; ?>
                        </p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($investment->activities->isEmpty()): ?>
                    <p class="text-sm text-content-tertiary">No status updates yet.</p>
                <?php endif; ?>
            </div>
        </section>
    </div>

    <section class="overflow-hidden rounded-xl border border-surface-border bg-surface-raised">
        <div class="border-b border-surface-border px-4 py-4 sm:px-6">
            <h2 class="font-semibold text-content-primary">Interest history</h2>
            <p class="mt-1 text-xs text-content-tertiary">Each admin top-up accumulates in this investment record. Total Profit is credited only when the investment is completed.</p>
        </div>
        <?php if($investment->credits->isNotEmpty()): ?>
            <div class="overflow-x-auto">
                <table class="w-full min-w-[620px] text-left text-sm">
                    <thead class="bg-surface-overlay text-xs uppercase tracking-wide text-content-tertiary">
                        <tr><th class="px-4 py-3 font-medium">Date</th><th class="px-4 py-3 font-medium">Reference</th><th class="px-4 py-3 font-medium">Description</th><th class="px-4 py-3 text-right font-medium">Amount</th><th class="px-4 py-3 text-right font-medium">Accumulated Interest</th><th class="px-4 py-3 font-medium">Credited By</th></tr>
                    </thead>
                    <tbody class="divide-y divide-surface-border">
                        <?php $__currentLoopData = $investment->credits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $credit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="px-4 py-3 text-content-secondary"><?php echo e(optional($credit->credited_at)->format('M d, Y H:i')); ?></td>
                                <td class="px-4 py-3 font-mono text-xs text-content-primary"><?php echo e($investment->reference); ?></td>
                                <td class="px-4 py-3 text-content-secondary"><?php echo e($credit->note ?: 'Compound interest credit'); ?></td>
                                <td class="px-4 py-3 text-right font-semibold text-gain">+$<?php echo e(number_format($credit->amount, 2)); ?></td>
                                <td class="px-4 py-3 text-right text-content-primary">$<?php echo e(number_format($credit->new_investment_interest, 2)); ?></td>
                                <td class="px-4 py-3 text-content-secondary"><?php echo e($credit->credited_by_name ?: 'Administrator'); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="px-5 py-8 text-center text-sm text-content-tertiary">No top-ups have been added to this investment.</p>
        <?php endif; ?>
    </section>

    <a href="<?php echo e(route('compound-investments.index')); ?>" class="inline-flex text-sm font-medium text-primary hover:underline">← Back to Compound Investments</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/user/compound-investments/show.blade.php ENDPATH**/ ?>