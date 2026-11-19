
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
        <a href="<?php echo e(route('user.courses')); ?>" class="p-2 rounded-lg bg-surface-overlay hover:bg-surface-border text-content-secondary transition-colors">
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
        <h2 class="text-xl font-bold text-content-primary"><?php echo e($course->title); ?></h2>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2 space-y-6">
            
            <div class="rounded-xl bg-surface-raised border border-surface-border p-6">
                <div class="grid grid-cols-3 gap-4 text-sm mb-6">
                    <div>
                        <p class="text-xs text-content-tertiary mb-0.5">CREATED BY</p>
                        <p class="font-medium text-content-primary"><?php echo e($settings->site_name); ?></p>
                    </div>
                    <div>
                        <p class="text-xs text-content-tertiary mb-0.5">CATEGORY</p>
                        <p class="font-medium text-content-primary"><?php echo e($course->category->name ?? '—'); ?></p>
                    </div>
                    <div>
                        <p class="text-xs text-content-tertiary mb-0.5">LAST UPDATED</p>
                        <p class="font-medium text-content-primary"><?php echo e(\Carbon\Carbon::parse($course->updated_at)->toDayDateTimeString()); ?></p>
                    </div>
                </div>

                <h3 class="text-sm font-semibold text-content-primary mb-2">About Course</h3>
                <p class="text-sm text-content-secondary"><?php echo e($course->description); ?></p>
            </div>

            
            <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden">
                <div class="px-5 py-3 border-b border-surface-border">
                    <h3 class="text-sm font-semibold text-content-primary">Course Lessons</h3>
                </div>
                <div class="divide-y divide-surface-border">
                    <?php $__empty_1 = true; $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="flex items-center justify-between px-5 py-3">
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
                            <div>
                                <?php if($lesson->is_preview): ?>
                                    <button data-toggle="modal" data-target="#preview<?php echo e($lesson->id); ?>" class="px-3 py-1 rounded-lg bg-info/10 text-info text-xs font-medium hover:bg-info/20 transition-colors">Preview</button>
                                <?php else: ?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'lock-closed','class' => 'w-4 h-4 text-content-tertiary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'lock-closed','class' => 'w-4 h-4 text-content-tertiary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if($loop->iteration == 5 && $loop->remaining > 0): ?>
                            <div class="px-5 py-3 text-sm text-content-tertiary">
                                <?php echo e($loop->remaining); ?> More Lesson<?php echo e($loop->remaining > 1 ? 's' : ''); ?>

                            </div>
                        <?php endif; ?>
                        <?php if($loop->iteration == 5) break; ?>

                        
                        <?php if($lesson->is_preview): ?>
                            <div class="modal fade" tabindex="-1" id="preview<?php echo e($lesson->id); ?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content" style="background: #161A1E; border: 1px solid #2A2F36;">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="<?php echo e($lesson->video_link); ?>" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="px-5 py-8 text-center text-content-tertiary text-sm">No lessons available.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        
        <div>
            <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden sticky top-24">
                <img src="<?php echo e($course->image && str_starts_with($course->image, 'http') ? $course->image : asset('storage/' . $course->image)); ?>"
                     alt="course image" class="w-full h-48 object-cover">
                <div class="p-5">
                    <p class="text-2xl font-bold text-content-primary mb-4">
                        <?php echo e(!$course->amount ? 'Free' : \App\Helpers\CurrencyHelper::formatForUser($course->amount)); ?>

                    </p>
                    <button type="button" onclick="confirmBuy()" class="w-full py-2.5 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-semibold transition-colors">
                        Buy Now
                    </button>
                </div>
            </div>
        </div>
    </div>

    
    <form id="buyForm" action="<?php echo e(route('user.buycourse')); ?>" method="POST" class="hidden">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="course_id" value="<?php echo e($course->id); ?>">
    </form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
    function confirmBuy() {
        Swal.fire({
            title: 'Purchase Course?',
            text: '<?php echo e(!$course->amount ? \App\Helpers\CurrencyHelper::formatForUser(0) : \App\Helpers\CurrencyHelper::formatForUser($course->amount)); ?> will be deducted from your account balance.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#059669',
            cancelButtonColor: '#2A2F36',
            confirmButtonText: 'Confirm Purchase',
            cancelButtonText: 'Cancel',
            background: '#161A1E',
            color: '#E8EAED'
        }).then((result) => {
            if (result.isConfirmed) document.getElementById('buyForm').submit();
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\membership\courseDetails.blade.php ENDPATH**/ ?>