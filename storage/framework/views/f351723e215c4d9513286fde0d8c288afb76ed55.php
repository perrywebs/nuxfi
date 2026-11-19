
<?php $__env->startSection('title', $user->name . ' Investment Plans'); ?>
<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => ''.e($user->name).' Investment Plans']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e($user->name).' Investment Plans']); ?>
         <?php $__env->slot('actions', null, []); ?> 
            <a class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-3 py-1.5 text-xs font-medium transition-colors" href="<?php echo e(route('viewuser', $user->id)); ?>">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                back
            </a>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
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
                        <th>Plan</th>
                        <th>Amount</th>
                        <th>Active</th>
                        <th>Duration</th>
                        <th>Created on</th>
                        <th>Expire At</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($plan->dplan->name); ?></td>
                            <td><?php echo e($settings->currency); ?><?php echo e(number_format($plan->amount)); ?></td>
                            <td>
                                <?php if($plan->active == 'yes'): ?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'success']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'success']); ?><?php echo e($plan->active); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component->withAttributes(['type' => 'danger']); ?><?php echo e($plan->active); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($plan->inv_duration); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($plan->created_at)->toDayDateTimeString()); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($plan->expire_date)->toDayDateTimeString()); ?></td>
                            <td>
                                <div class="flex items-center gap-1">
                                    <a href="<?php echo e(route('deleteplan', $plan->id)); ?>"
                                       class="inline-flex items-center gap-1.5 bg-info text-content-inverse hover:bg-info/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">
                                        Delete Plan
                                    </a>
                                    <a href="<?php echo e(route('admin.investments.edit', $plan->id)); ?>"
                                       class="inline-flex items-center gap-1.5 bg-warning text-content-inverse hover:bg-warning/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors"
                                       title="Edit / Backdate">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125" /></svg>
                                        Edit
                                    </a>
                                    <?php if($plan->active == 'yes'): ?>
                                        <a href="<?php echo e(route('markas', ['id' => $plan->id, 'status' => 'expired'])); ?>"
                                           class="inline-flex items-center gap-1.5 bg-danger text-content-inverse hover:bg-danger/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">
                                            Mark as expired
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('markas', ['id' => $plan->id, 'status' => 'yes'])); ?>"
                                           class="inline-flex items-center gap-1.5 bg-success text-content-inverse hover:bg-success/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">
                                            Mark as active
                                        </a>
                                    <?php endif; ?>
                                </div>
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
        order: [[0, 'desc']],
        language: { search: '', searchPlaceholder: 'Search...' }
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\Users\user_plans.blade.php ENDPATH**/ ?>