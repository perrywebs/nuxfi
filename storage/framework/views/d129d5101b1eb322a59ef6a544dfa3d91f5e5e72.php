<div>
    
    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-content-primary">All Courses</h2>
                <p class="text-content-secondary mt-1">Learning often happens in classrooms but it doesn't have to. Use <?php echo e($settings->site_name); ?> to facilitate learning experiences no matter the context.</p>
            </div>
            <a href="<?php echo e(route('user.mycourses')); ?>"
                class="inline-flex items-center gap-2 bg-surface-overlay border border-surface-border hover:border-primary/50 text-content-primary text-sm font-medium px-4 py-2 rounded-lg transition-colors whitespace-nowrap">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'academic-cap','class' => 'w-4 h-4 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'academic-cap','class' => 'w-4 h-4 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                My Course(s)
            </a>
        </div>
    </div>

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

    <?php if($courses && count($courses)): ?>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-surface-raised border border-surface-border rounded-xl overflow-hidden hover:border-primary/30 transition-all group">
                    <a href="<?php echo e(route('user.course.details', ['course' => str_replace(' ', '-', $item->title), 'id' => $item->id])); ?>">
                        <div class="aspect-video overflow-hidden">
                            <img src="<?php echo e($item->image && str_starts_with($item->image, 'http') ? $item->image : asset('storage/' . $item->image)); ?>"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                alt="<?php echo e($item->title); ?>">
                        </div>
                    </a>
                    <div class="p-4">
                        <a href="<?php echo e(route('user.course.details', ['course' => str_replace(' ', '-', $item->title), 'id' => $item->id])); ?>">
                            <h3 class="text-content-primary font-semibold hover:text-primary transition-colors line-clamp-2"><?php echo e($item->title); ?></h3>
                        </a>
                        <div class="flex items-center justify-between mt-3 text-sm text-content-secondary">
                            <div class="flex items-center gap-1.5">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'book-open','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'book-open','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <span><?php echo e($item->lessons->count()); ?> <?php echo e($item->lessons->count() === 1 ? 'Lesson' : 'Lessons'); ?></span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'users','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'users','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <span><?php echo e($item->users->count()); ?></span>
                            </div>
                        </div>
                        <div class="border-t border-dashed border-surface-border my-3"></div>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold <?php echo e($item->is_free ? 'text-gain' : 'text-content-primary'); ?>">
                                <?php echo e($item->is_free ? 'Free' : \App\Helpers\CurrencyHelper::formatForUser(intval($item->amount))); ?>

                            </span>
                            <a href="<?php echo e(route('user.course.details', ['course' => str_replace(' ', '-', $item->title), 'id' => $item->id])); ?>"
                                class="text-sm bg-primary/10 text-primary hover:bg-primary hover:text-white px-3 py-1.5 rounded-md transition-colors">
                                Get
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
        <?php if(count($categories) > 0): ?>
            <div class="mt-10 mb-6">
                <h3 class="text-xl font-bold text-content-primary">More Lessons</h3>
            </div>
            <div class="space-y-6">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-2">
                        <p class="text-xs text-content-tertiary uppercase tracking-wider mb-1">Category</p>
                        <h4 class="text-lg font-bold text-content-primary"><?php echo e($cat->name); ?></h4>
                    </div>
                    <div class="space-y-2">
                        <?php $__currentLoopData = $cat->standaloneLessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $less): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bg-surface-raised border border-surface-border rounded-lg px-4 py-3 flex items-center justify-between hover:border-primary/30 transition-colors">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-loss/10 flex items-center justify-center flex-shrink-0">
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'play','class' => 'w-5 h-5 text-loss']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'play','class' => 'w-5 h-5 text-loss']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    </div>
                                    <div>
                                        <h6 class="text-sm font-medium text-content-primary"><?php echo e($less->title); ?></h6>
                                        <p class="text-xs text-content-tertiary mt-0.5"><?php echo e($less->description); ?></p>
                                        <p class="text-xs text-content-tertiary"><?php echo e($less->length); ?></p>
                                    </div>
                                </div>
                                <a href="<?php echo e(route('user.learning', ['lesson' => $less->id])); ?>"
                                    class="text-sm bg-info/10 text-info hover:bg-info hover:text-white px-3 py-1.5 rounded-md transition-colors whitespace-nowrap">
                                    Watch
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="bg-surface-raised border border-surface-border rounded-xl p-12 text-center">
            <div class="w-16 h-16 mx-auto bg-surface-overlay rounded-full flex items-center justify-center mb-4">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'academic-cap','class' => 'w-8 h-8 text-content-tertiary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'academic-cap','class' => 'w-8 h-8 text-content-tertiary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
            <p class="text-content-secondary">No courses available yet.</p>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\livewire\user\system-courses.blade.php ENDPATH**/ ?>