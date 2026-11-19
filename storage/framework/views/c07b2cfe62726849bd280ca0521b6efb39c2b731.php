
<?php $__env->startSection('title', 'Active Investments'); ?>
<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'Active Investments','subtitle' => 'Monitor currently active investment plans']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Active Investments','subtitle' => 'Monitor currently active investment plans']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <?php if(($orphanedUserCount ?? 0) > 0 || ($orphanedPlanCount ?? 0) > 0): ?>
        <div class="mt-5 rounded-xl border border-warning/30 bg-warning/10 px-4 py-3 text-sm text-warning">
            <p class="font-semibold">Some active investments reference records that no longer exist.</p>
            <p class="mt-1 text-warning/90">
                <?php if(($orphanedUserCount ?? 0) > 0): ?>
                    <?php echo e($orphanedUserCount); ?> investment<?php echo e($orphanedUserCount === 1 ? '' : 's'); ?> reference a deleted user.
                <?php endif; ?>
                <?php if(($orphanedPlanCount ?? 0) > 0): ?>
                    <?php echo e($orphanedPlanCount); ?> investment<?php echo e($orphanedPlanCount === 1 ? '' : 's'); ?> reference a deleted plan.
                <?php endif; ?>
                The records are still shown below so they can be reviewed or removed from the plan actions.
            </p>
        </div>
    <?php endif; ?>

    <div class="mt-6">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.table-card','data' => []]); ?>
<?php $component->withName('admin.table-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <table id="ShipTable" class="display w-full">
                <thead>
                    <tr>
                        <th>Client name</th>
                        <th>Investment Plan</th>
                        <th>Amount Invested</th>
                        <th>Duration</th>
                        <th>ROI</th>
                        <th>Start Date</th>
                        <th>Expiration Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php if($plan->duser): ?>
                                    <?php echo e($plan->duser->name); ?>

                                <?php else: ?>
                                    <span class="text-warning" title="The user linked to this investment no longer exists.">
                                        Deleted user <?php echo e($plan->user ? '#'.$plan->user : '(unknown id)'); ?>

                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($plan->dplan): ?>
                                    <?php echo e($plan->dplan->name); ?>

                                <?php else: ?>
                                    <span class="text-warning" title="The investment plan linked to this record no longer exists.">
                                        Deleted plan <?php echo e($plan->plan ? '#'.$plan->plan : '(unknown id)'); ?>

                                    </span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e(($settings->currency ?? '$')); ?><?php echo e(number_format((float) $plan->amount)); ?></td>
                            <td><?php echo e($plan->inv_duration ?: '—'); ?></td>
                            <td><?php echo e(($settings->currency ?? '$')); ?><?php echo e(number_format((float) ($plan->profit_earned ?: 0))); ?></td>
                            <td><?php echo e(optional($plan->created_at)->toDayDateTimeString() ?? '—'); ?></td>
                            <td><?php echo e(optional($plan->expire_date)->toDayDateTimeString() ?? '—'); ?></td>
                            <td>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.dropdown','data' => []]); ?>
<?php $component->withName('admin.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                                     <?php $__env->slot('trigger', null, []); ?> 
                                        <button type="button" class="inline-flex items-center gap-1.5 bg-surface-alt text-content hover:bg-surface-card rounded-lg px-3 py-1.5 text-xs font-medium transition-colors border border-border">
                                            Action
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                                        </button>
                                     <?php $__env->endSlot(); ?>
                                    <a class="block px-4 py-2 text-sm text-danger hover:bg-surface-alt transition-colors" href="<?php echo e(route('deleteplan', $plan->id)); ?>">Delete</a>
                                    <?php if($plan->duser): ?>
                                        <a class="block px-4 py-2 text-sm text-content hover:bg-surface-alt transition-colors" href="<?php echo e(route('user.plans', $plan->duser->id)); ?>">More actions</a>
                                    <?php else: ?>
                                        <span class="block px-4 py-2 text-sm text-content-muted" title="The linked user no longer exists.">No linked user</span>
                                    <?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
    $('#ShipTable').DataTable({
        responsive: true,
        pageLength: 25,
        order: [[5, 'desc']],
        language: { search: '', searchPlaceholder: 'Search...' }
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\Plans\activeinv.blade.php ENDPATH**/ ?>