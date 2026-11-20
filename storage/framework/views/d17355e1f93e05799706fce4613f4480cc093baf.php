<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'Compound Investment','subtitle' => ''.e($investment->reference).'']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Compound Investment','subtitle' => ''.e($investment->reference).'']); ?>
         <?php $__env->slot('actions', null, []); ?> <a href="<?php echo e(route('admin.compound-investments.index')); ?>" class="rounded-lg border border-border px-3 py-2 text-sm text-content-secondary">Back to requests</a> <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <?php if(session('success')): ?><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.alert','data' => ['type' => 'success','dismissible' => true]]); ?>
<?php $component->withName('admin.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'success','dismissible' => true]); ?><?php echo e(session('success')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php endif; ?>
    <?php if(session('error')): ?><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.alert','data' => ['type' => 'danger','dismissible' => true]]); ?>
<?php $component->withName('admin.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger','dismissible' => true]); ?><?php echo e(session('error')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php endif; ?>
    <?php if($errors->any()): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.alert','data' => ['type' => 'danger','dismissible' => true]]); ?>
<?php $component->withName('admin.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger','dismissible' => true]); ?><ul class="list-disc pl-5"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endif; ?>

    <div class="mt-5 grid grid-cols-1 xl:grid-cols-[1fr_340px] gap-5">
        <div class="space-y-5">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                <div class="flex flex-wrap items-start justify-between gap-3">
                    <div>
                        <p class="text-xs uppercase tracking-wide text-content-muted">Investment Request</p>
                        <h2 class="mt-1 font-mono text-lg font-semibold text-content"><?php echo e($investment->reference); ?></h2>
                        <p class="mt-1 text-sm text-content-secondary">
                            <a class="text-primary hover:underline" href="<?php echo e(route('viewuser', $investment->user)); ?>"><?php echo e(optional($investment->customer)->name ?? 'Deleted user'); ?></a>
                            · <?php echo e(optional($investment->customer)->email); ?>

                        </p>
                    </div>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => ''.e($investment->statusBadgeType()).'']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => ''.e($investment->statusBadgeType()).'']); ?><?php echo e($investment->statusLabel()); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
                <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php $__currentLoopData = [
                        ['Starting Amount', '$' . number_format($investment->starting_amount, 2)],
                        ['Payment Currency', $investment->payment_currency ?: $investment->payment_method],
                        ['Payment Network', $investment->payment_network ?: '—'],
                        ['Deposit Wallet', $investment->wallet_address ?: '—'],
                        ['Deposit Amount', '$' . number_format($investment->deposit_amount, 2)],
                        ['Payment Reference', $investment->payment_reference ?: '—'],
                        ['Duration', $investment->durationLabel()],
                        ['Compounding Frequency', ['monthly' => 'Monthly', 'weekly' => 'Weekly', 'daily' => 'Daily'][$investment->recurring_frequency] ?? '—'],
                        [['monthly' => 'Monthly', 'weekly' => 'Weekly', 'daily' => 'Daily'][$investment->duration_unit] . ' Return', number_format($investment->period_return_rate, 2) . '%'],
                        ['Recurring Top-up', '$' . number_format($investment->recurring_topup, 2) . ' / ' . ['monthly' => 'month', 'weekly' => 'week', 'daily' => 'day'][$investment->duration_unit]],
                        ['Projected Final Amount', '$' . number_format($investment->projected_final_amount, 2)],
                        ['Projected Interest', '$' . number_format($investment->projected_interest, 2)],
                        ['Total Interest Accumulated', '$' . number_format($investment->total_interest_credited, 2)],
                        ['Total Transferred To Total Profit', '$' . number_format($investment->total_interest_transferred, 2)],
                        ['Total Profit Before Completion', $investment->total_profit_before_completion !== null ? '$' . number_format($investment->total_profit_before_completion, 2) : '—'],
                        ['Total Profit After Completion', $investment->total_profit_after_completion !== null ? '$' . number_format($investment->total_profit_after_completion, 2) : '—'],
                        ['Submitted', $investment->created_at->format('M d, Y H:i')],
                        ['Approved', optional($investment->approved_at)->format('M d, Y H:i') ?: '—'],
                        ['Started', optional($investment->activated_at)->format('M d, Y H:i') ?: '—'],
                        ['Completion Date', optional($investment->completed_at)->format('M d, Y H:i') ?: '—'],
                        ['Completed By', $investment->completed_by_name ?: '—'],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="rounded-lg bg-surface-alt/50 p-3">
                            <p class="text-xs text-content-muted"><?php echo e($detail[0]); ?></p>
                            <p class="mt-1 break-words text-sm font-medium text-content"><?php echo e($detail[1]); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php if($investment->proof): ?>
                    <div class="mt-4"><a class="text-sm font-medium text-primary hover:underline" target="_blank" rel="noopener" href="<?php echo e(\Illuminate\Support\Facades\Storage::disk('public')->url($investment->proof)); ?>">View payment proof</a></div>
                <?php endif; ?>
                <?php if($investment->user_note): ?><p class="mt-4 text-sm text-content-secondary"><strong>User note:</strong> <?php echo e($investment->user_note); ?></p><?php endif; ?>
                <?php if($investment->rejection_reason): ?><p class="mt-4 text-sm text-danger"><strong>Rejection reason:</strong> <?php echo e($investment->rejection_reason); ?></p><?php endif; ?>
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
                <h2 class="text-base font-semibold text-content">Interest / top-up history</h2>
                <?php if($investment->credits->isNotEmpty()): ?>
                    <div class="mt-4 overflow-x-auto">
                        <table class="w-full min-w-[600px] text-left">
                            <thead><tr class="border-b border-border text-xs uppercase text-content-muted"><th class="py-2">Top-up Date</th><th class="py-2">Amount</th><th class="py-2">Investment interest total</th><th class="py-2">Admin / note</th></tr></thead>
                            <tbody class="divide-y divide-border">
                                <?php $__currentLoopData = $investment->credits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $credit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="text-sm">
                                        <td class="py-3 text-content-secondary"><?php echo e(optional($credit->credited_at)->format('M d, Y H:i')); ?></td>
                                        <td class="py-3 font-semibold text-success">$<?php echo e(number_format($credit->amount, 2)); ?></td>
                                        <td class="py-3 text-content-secondary">$<?php echo e(number_format($credit->new_investment_interest, 2)); ?></td>
                                        <td class="py-3 text-xs text-content-secondary"><?php echo e($credit->credited_by_name); ?><br><?php echo e($credit->note); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="mt-3 text-sm text-content-muted">No interest credits have been recorded.</p>
                <?php endif; ?>
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
                <h2 class="text-base font-semibold text-content">Complete audit history</h2>
                <div class="mt-4 space-y-3">
                    <?php $__empty_1 = true; $__currentLoopData = $investment->activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="border-l-2 border-primary/40 pl-3">
                            <div class="flex flex-wrap justify-between gap-2">
                                <p class="text-sm font-medium text-content"><?php echo e(ucfirst(str_replace('_', ' ', $activity->action))); ?></p>
                                <p class="text-xs text-content-muted"><?php echo e($activity->created_at->format('M d, Y H:i:s')); ?></p>
                            </div>
                            <p class="mt-1 text-sm text-content-secondary"><?php echo e($activity->description); ?></p>
                            <?php if($activity->actor_name): ?><p class="mt-1 text-xs text-content-muted">By <?php echo e($activity->actor_name); ?> (<?php echo e($activity->actor_type); ?>)</p><?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-sm text-content-muted">No activity recorded.</p>
                    <?php endif; ?>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>

        <aside class="space-y-5">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                <h2 class="text-base font-semibold text-content">Request review</h2>
                <?php if(in_array($investment->status, [\App\Models\CompoundInvestment::STATUS_PENDING, \App\Models\CompoundInvestment::STATUS_APPROVED], true)): ?>
                    <?php if($investment->isPending()): ?>
                        <form method="POST" action="<?php echo e(route('admin.compound-investments.approve', $investment->id)); ?>" class="mt-4"><?php echo csrf_field(); ?>
                            <button class="w-full rounded-lg bg-success px-4 py-2.5 text-sm font-semibold text-white">Approve & Activate</button>
                        </form>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('admin.compound-investments.reject', $investment->id)); ?>" class="mt-3 space-y-3"><?php echo csrf_field(); ?>
                        <label class="block text-xs font-medium text-content-secondary">Reject / revoke reason
                            <textarea name="reason" required maxlength="1000" rows="3" class="mt-1 w-full rounded-lg border border-border bg-surface-card p-3 text-sm text-content"><?php echo e(old('reason')); ?></textarea>
                        </label>
                        <button class="w-full rounded-lg border border-danger/40 px-4 py-2.5 text-sm font-semibold text-danger">Reject Request</button>
                    </form>
                <?php endif; ?>
                <?php if($investment->isApproved()): ?>
                    <form method="POST" action="<?php echo e(route('admin.compound-investments.activate', $investment->id)); ?>" class="mt-4 space-y-3"><?php echo csrf_field(); ?>
                        <label class="block text-xs font-medium text-content-secondary">Investment start date
                            <input type="date" name="start_date" value="<?php echo e(now()->toDateString()); ?>" class="mt-1 w-full rounded-lg border border-border bg-surface-card px-3 py-2 text-sm text-content">
                        </label>
                        <button class="w-full rounded-lg bg-primary px-4 py-2.5 text-sm font-semibold text-primary-foreground">Mark Active</button>
                    </form>
                <?php endif; ?>
                <?php if($investment->isCompleted() && $investment->canBeReopened()): ?>
                    <form method="POST" action="<?php echo e(route('admin.compound-investments.reopen', $investment->id)); ?>" class="mt-4 space-y-3"><?php echo csrf_field(); ?>
                        <input name="note" maxlength="1000" placeholder="Reason for reopening" class="w-full rounded-lg border border-border bg-surface-card px-3 py-2 text-sm text-content">
                        <button class="w-full rounded-lg bg-warning px-4 py-2.5 text-sm font-semibold text-white">Reopen Investment</button>
                    </form>
                <?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            <?php if($investment->isActive()): ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                    <h2 class="text-base font-semibold text-content">Add period interest / top-up</h2>
                    <p class="mt-1 text-xs text-content-muted">This admin-controlled top-up accumulates in the investment record. It is transferred to Total Profit only when the investment is completed.</p>
                    <?php if($investment->canReceiveInterest()): ?>
                    <form method="POST" action="<?php echo e(route('admin.compound-investments.credit-interest', $investment->id)); ?>" class="mt-4 space-y-3"><?php echo csrf_field(); ?>
                        <label class="block text-xs font-medium text-content-secondary">
                            Adding each <?php echo e(['monthly' => 'month', 'weekly' => 'week', 'daily' => 'day'][$investment->duration_unit] ?? 'period'); ?> (USD)
                            <input type="number" name="amount" min="0.01" max="100000000" step="0.01" required value="<?php echo e(old('amount', number_format($investment->recurring_topup, 2, '.', ''))); ?>" class="mt-1 w-full rounded-lg border border-border bg-surface-card px-3 py-2.5 text-sm text-content">
                        </label>
                        <label class="block text-xs font-medium text-content-secondary">Description (optional)
                            <textarea name="note" maxlength="1000" rows="2" class="mt-1 w-full rounded-lg border border-border bg-surface-card p-3 text-sm text-content"></textarea>
                        </label>
                        <input type="hidden" name="idempotency_key" value="<?php echo e(\Illuminate\Support\Str::uuid()); ?>">
                        <button class="w-full rounded-lg bg-primary px-4 py-2.5 text-sm font-semibold text-primary-foreground">Add Top-up to Investment</button>
                    </form>
                    <?php else: ?>
                        <p class="mt-4 rounded-lg bg-warning/10 p-3 text-xs text-warning">The investment duration has ended. No further top-ups can be added; complete the investment to transfer its accumulated interest.</p>
                    <?php endif; ?>
                    <?php if(!$investment->end_date || today()->gte($investment->end_date)): ?>
                        <form method="POST" action="<?php echo e(route('admin.compound-investments.complete', $investment->id)); ?>" class="mt-5 border-t border-border pt-4 space-y-3"><?php echo csrf_field(); ?>
                            <input name="note" maxlength="1000" placeholder="Completion note (optional)" class="w-full rounded-lg border border-border bg-surface-card px-3 py-2 text-sm text-content">
                            <button class="w-full rounded-lg border border-warning/40 px-4 py-2.5 text-sm font-semibold text-warning">Complete Investment</button>
                        </form>
                    <?php else: ?>
                        <p class="mt-5 border-t border-border pt-4 text-xs text-content-muted">Completion becomes available on <?php echo e($investment->end_date->format('M d, Y')); ?>.</p>
                    <?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php endif; ?>

            <?php if($investment->isCompleted()): ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                    <h2 class="text-sm font-semibold text-content">Reopen permission</h2>
                    <p class="mt-1 text-xs text-content-muted">Completed investments cannot receive credits. An authorized admin may reopen only when this permission is enabled.</p>
                    <form method="POST" action="<?php echo e(route('admin.compound-investments.reopen-setting', $investment->id)); ?>" class="mt-3 flex items-center justify-between gap-3"><?php echo csrf_field(); ?>
                        <label class="inline-flex items-center gap-2 text-sm text-content"><input type="hidden" name="reopen_allowed" value="0"><input type="checkbox" name="reopen_allowed" value="1" <?php echo e($investment->reopen_allowed ? 'checked' : ''); ?> class="rounded border-border text-primary">Allow reopening</label>
                        <button class="rounded-lg border border-border px-3 py-2 text-xs font-medium text-content">Save</button>
                    </form>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php endif; ?>
        </aside>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/admin/compound-investments/show.blade.php ENDPATH**/ ?>