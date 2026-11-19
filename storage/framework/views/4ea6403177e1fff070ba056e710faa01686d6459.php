
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

    
    <?php echo $__env->make('user.partials.ticker-tape', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->make('user.partials.quick-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="flex items-center gap-3 mb-6">
        <a href="<?php echo e(route('user.mycourses')); ?>" class="p-2 rounded-lg bg-surface-overlay hover:bg-surface-border text-content-secondary transition-colors">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'arrow-left','class' => 'w-5 h-5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'arrow-left','class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </a>
        <div>
            <h2 class="text-xl font-bold text-primary"><?php echo e($course->title); ?></h2>
            <p class="text-sm text-content-secondary mt-0.5"><?php echo e($course->category->name ?? '—'); ?> &middot; Purchased <?php echo e(\Carbon\Carbon::parse($course->pivot->created_at ?? $course->created_at)->toDayDateTimeString()); ?></p>
        </div>
    </div>

    
    <div class="rounded-xl bg-surface-raised border border-surface-border p-6 mb-6">
        <div class="grid grid-cols-3 gap-4 text-sm">
            <div>
                <p class="text-xs text-content-tertiary mb-0.5">CREATED BY</p>
                <p class="font-medium text-content-primary"><?php echo e($settings->site_name); ?></p>
            </div>
            <div>
                <p class="text-xs text-content-tertiary mb-0.5">CATEGORY</p>
                <p class="font-medium text-content-primary"><?php echo e($course->category->name ?? '—'); ?></p>
            </div>
            <div>
                <p class="text-xs text-content-tertiary mb-0.5">PURCHASED</p>
                <p class="font-medium text-content-primary"><?php echo e(\Carbon\Carbon::parse($course->pivot->created_at ?? $course->created_at)->toDayDateTimeString()); ?></p>
            </div>
        </div>
    </div>

    
    <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden">
        <div class="px-5 py-3 border-b border-surface-border">
            <h3 class="text-sm font-semibold text-content-primary">Course Lessons</h3>
        </div>
        <div class="divide-y divide-surface-border">
            <?php $__empty_1 = true; $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="flex items-center justify-between px-5 py-3 hover:bg-surface-overlay/50 transition-colors">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-loss/10 flex items-center justify-center flex-shrink-0">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'play','class' => 'w-4 h-4 text-loss']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'play','class' => 'w-4 h-4 text-loss']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-content-primary"><?php echo e($lesson->title); ?></p>
                            <p class="text-xs text-content-tertiary"><?php echo e($lesson->description); ?> &middot; <?php echo e($lesson->length); ?></p>
                        </div>
                    </div>
                    <a href="<?php echo e(route('user.learning', ['lesson' => $lesson->id, 'course' => $course->id])); ?>"
                       class="px-3 py-1.5 rounded-lg bg-info/10 text-info text-xs font-medium hover:bg-info/20 transition-colors">
                        Watch
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="px-5 py-8 text-center text-content-tertiary text-sm">No lessons available.</div>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\membership\mycourse-details.blade.php ENDPATH**/ ?>