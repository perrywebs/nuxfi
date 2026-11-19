
<?php $__env->startSection('title', 'Lessons — ' . $course->title); ?>

<?php $__env->startSection('content'); ?>

    <div class="flex items-center gap-3 mb-6">
        <a href="<?php echo e(route('courses')); ?>" class="p-2 rounded-lg bg-surface-alt hover:bg-surface-raised text-content-secondary transition-colors">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
        </a>
        <div>
            <h1 class="text-2xl font-semibold text-content tracking-tight">Lessons</h1>
            <p class="text-sm text-content-secondary mt-0.5"><?php echo e($course->title); ?></p>
        </div>
    </div>

    <?php if(session('message')): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.alert','data' => ['type' => 'danger','dismissible' => true]]); ?>
<?php $component->withName('admin.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger','dismissible' => true]); ?><?php echo e(session('message')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endif; ?>
    <?php if(session('success')): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.alert','data' => ['type' => 'success','dismissible' => true]]); ?>
<?php $component->withName('admin.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'success','dismissible' => true]); ?><?php echo e(session('success')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endif; ?>

    <div class="flex justify-end mb-4">
        <button @click="$dispatch('open-add-lesson-modal')" class="inline-flex items-center gap-2 bg-primary hover:bg-primary-hover text-primary-foreground text-sm font-medium px-4 py-2 rounded-lg transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
            New Lesson
        </button>
    </div>

    <?php if($lessons->count()): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.table-card','data' => ['title' => 'Course Lessons ('.e($lessons->count()).')']]); ?>
<?php $component->withName('admin.table-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Course Lessons ('.e($lessons->count()).')']); ?>
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="bg-surface-alt px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wider text-left">#</th>
                        <th class="bg-surface-alt px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wider text-left">Thumbnail</th>
                        <th class="bg-surface-alt px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wider text-left">Title</th>
                        <th class="bg-surface-alt px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wider text-left">Duration</th>
                        <th class="bg-surface-alt px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wider text-left">Preview</th>
                        <th class="bg-surface-alt px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wider text-left">Order</th>
                        <th class="bg-surface-alt px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b border-border hover:bg-surface-alt/50 transition-colors">
                            <td class="px-4 py-3.5 text-sm text-content"><?php echo e($loop->iteration); ?></td>
                            <td class="px-4 py-3.5">
                                <img src="<?php echo e($lesson->thumbnail && str_starts_with($lesson->thumbnail, 'http') ? $lesson->thumbnail : asset('storage/' . $lesson->thumbnail)); ?>"
                                     class="w-16 h-10 rounded object-cover" alt="">
                            </td>
                            <td class="px-4 py-3.5">
                                <p class="text-sm font-medium text-content"><?php echo e($lesson->title); ?></p>
                                <p class="text-xs text-content-muted mt-0.5 line-clamp-1"><?php echo e($lesson->description); ?></p>
                            </td>
                            <td class="px-4 py-3.5 text-sm text-content-secondary"><?php echo e($lesson->length ?? '—'); ?></td>
                            <td class="px-4 py-3.5">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => $lesson->is_preview ? 'success' : 'neutral']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($lesson->is_preview ? 'success' : 'neutral')]); ?>
                                    <?php echo e($lesson->is_preview ? 'Yes' : 'No'); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </td>
                            <td class="px-4 py-3.5">
                                <div class="flex items-center gap-1">
                                    <?php if(!$loop->first): ?>
                                        <form action="<?php echo e(route('reorderlesson')); ?>" method="POST">
                                            <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                            <input type="hidden" name="lesson_id" value="<?php echo e($lesson->id); ?>">
                                            <input type="hidden" name="direction" value="up">
                                            <button type="submit" class="p-1 rounded hover:bg-surface-alt text-content-muted hover:text-content transition-colors" title="Move up">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" /></svg>
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                    <?php if(!$loop->last): ?>
                                        <form action="<?php echo e(route('reorderlesson')); ?>" method="POST">
                                            <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                            <input type="hidden" name="lesson_id" value="<?php echo e($lesson->id); ?>">
                                            <input type="hidden" name="direction" value="down">
                                            <button type="submit" class="p-1 rounded hover:bg-surface-alt text-content-muted hover:text-content transition-colors" title="Move down">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="px-4 py-3.5 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button @click="$dispatch('open-edit-lesson-modal-<?php echo e($lesson->id); ?>')" class="px-3 py-1 text-xs font-medium rounded-lg bg-surface-alt text-content-secondary hover:text-content transition-colors">Edit</button>
                                    <button @click="$dispatch('open-delete-lesson-modal-<?php echo e($lesson->id); ?>')" class="px-3 py-1 text-xs font-medium rounded-lg bg-danger-light text-danger hover:bg-danger hover:text-primary-foreground transition-colors">Delete</button>
                                </div>
                            </td>
                        </tr>

                        
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.modal','data' => ['id' => 'edit-lesson-modal-'.e($lesson->id).'','title' => 'Update Lesson','maxWidth' => 'max-w-xl']]); ?>
<?php $component->withName('admin.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'edit-lesson-modal-'.e($lesson->id).'','title' => 'Update Lesson','maxWidth' => 'max-w-xl']); ?>
                            <form method="POST" action="<?php echo e(route('updatedlesson')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                <input type="hidden" name="lesson_id" value="<?php echo e($lesson->id); ?>">
                                <input type="hidden" name="course_id" value="<?php echo e($course->id); ?>">
                                <div class="space-y-4">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Lesson Title','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Lesson Title','required' => true]); ?>
                                        <input type="text" name="title" value="<?php echo e($lesson->title); ?>" required class="w-full bg-surface-card border border-border rounded-lg px-3 py-2.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary">
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Description']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Description']); ?>
                                        <textarea name="desc" rows="3" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary"><?php echo e($lesson->description); ?></textarea>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Video Link','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Video Link','required' => true]); ?>
                                        <input type="text" name="videolink" value="<?php echo e($lesson->video_link); ?>" required class="w-full bg-surface-card border border-border rounded-lg px-3 py-2.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary">
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Duration','helper' => 'e.g. 10:30']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Duration','helper' => 'e.g. 10:30']); ?>
                                        <input type="text" name="length" value="<?php echo e($lesson->length); ?>" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary">
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Allow Preview']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Allow Preview']); ?>
                                        <select name="preview" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary">
                                            <option value="true" <?php echo e($lesson->is_preview ? 'selected' : ''); ?>>Yes — users can watch before purchase</option>
                                            <option value="false" <?php echo e(!$lesson->is_preview ? 'selected' : ''); ?>>No — locked until purchased</option>
                                        </select>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Thumbnail (File)','error' => $errors->first('image')]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Thumbnail (File)','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('image'))]); ?>
                                        <input type="file" name="image" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content file:mr-3 file:rounded file:border-0 file:bg-primary-light file:px-3 file:py-1 file:text-sm file:text-primary">
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Thumbnail (URL)','helper' => 'File upload takes priority.']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Thumbnail (URL)','helper' => 'File upload takes priority.']); ?>
                                        <input type="text" name="image_url" value="<?php echo e($lesson->thumbnail); ?>" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary">
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                                <div class="mt-6 flex justify-end">
                                    <button type="submit" class="bg-primary hover:bg-primary-hover text-primary-foreground text-sm font-medium px-5 py-2 rounded-lg transition-colors">Update Lesson</button>
                                </div>
                            </form>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                        
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.modal','data' => ['id' => 'delete-lesson-modal-'.e($lesson->id).'','title' => 'Delete Lesson']]); ?>
<?php $component->withName('admin.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'delete-lesson-modal-'.e($lesson->id).'','title' => 'Delete Lesson']); ?>
                            <p class="text-sm text-content-secondary mb-4">Are you sure you want to delete <strong class="text-content"><?php echo e($lesson->title); ?></strong>?</p>
                            <form action="<?php echo e(route('deletelesson', $lesson->id)); ?>" method="POST" class="flex justify-end gap-3">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="button" @click="open = false" class="px-4 py-2 text-sm font-medium rounded-lg bg-surface-alt text-content-secondary hover:text-content transition-colors">Cancel</button>
                                <button type="submit" class="px-4 py-2 text-sm font-medium rounded-lg bg-danger hover:bg-danger/90 text-primary-foreground transition-colors">Delete</button>
                            </form>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php else: ?>
        <div class="bg-surface-card rounded-xl border border-border shadow-card p-12 text-center">
            <svg class="w-12 h-12 mx-auto text-content-muted mb-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
            <h5 class="text-content font-medium mb-2">No lessons yet</h5>
            <p class="text-sm text-content-secondary mb-4">Add the first lesson to this course.</p>
            <button @click="$dispatch('open-add-lesson-modal')" class="inline-flex items-center gap-2 bg-primary hover:bg-primary-hover text-primary-foreground text-sm font-medium px-4 py-2 rounded-lg transition-colors">
                Add Lesson
            </button>
        </div>
    <?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.modal','data' => ['id' => 'add-lesson-modal','title' => 'Add Lesson','maxWidth' => 'max-w-xl']]); ?>
<?php $component->withName('admin.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'add-lesson-modal','title' => 'Add Lesson','maxWidth' => 'max-w-xl']); ?>
        <form method="POST" action="<?php echo e(route('addlesson')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="course_id" value="<?php echo e($course->id); ?>">
            <div class="space-y-4">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Lesson Title','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Lesson Title','required' => true]); ?>
                    <input type="text" name="title" required class="w-full bg-surface-card border border-border rounded-lg px-3 py-2.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary">
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Description']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Description']); ?>
                    <textarea name="desc" rows="3" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Video Link','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Video Link','required' => true]); ?>
                    <input type="text" name="videolink" required class="w-full bg-surface-card border border-border rounded-lg px-3 py-2.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary">
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Duration','helper' => 'e.g. 10:30']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Duration','helper' => 'e.g. 10:30']); ?>
                    <input type="text" name="length" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary">
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Allow Preview']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Allow Preview']); ?>
                    <div class="flex items-center gap-4">
                        <label class="flex items-center gap-2 text-sm text-content">
                            <input type="radio" value="true" name="preview" class="accent-primary"> Allow
                        </label>
                        <label class="flex items-center gap-2 text-sm text-content">
                            <input type="radio" value="false" name="preview" checked class="accent-primary"> Don't Allow
                        </label>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Thumbnail (File)','error' => $errors->first('image')]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Thumbnail (File)','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('image'))]); ?>
                    <input type="file" name="image" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content file:mr-3 file:rounded file:border-0 file:bg-primary-light file:px-3 file:py-1 file:text-sm file:text-primary">
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Thumbnail (URL)','helper' => 'File upload takes priority.']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Thumbnail (URL)','helper' => 'File upload takes priority.']); ?>
                    <input type="text" name="image_url" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary">
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
            <div class="mt-6 flex justify-end">
                <button type="submit" class="bg-primary hover:bg-primary-hover text-primary-foreground text-sm font-medium px-5 py-2 rounded-lg transition-colors">Add Lesson</button>
            </div>
        </form>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    
    <?php if(isset($enrollments) && $enrollments->count()): ?>
    <div class="mt-8">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.table-card','data' => ['title' => 'Enrolled Students ('.e($enrollments->count()).')']]); ?>
<?php $component->withName('admin.table-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Enrolled Students ('.e($enrollments->count()).')']); ?>
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="bg-surface-alt px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wider text-left">#</th>
                        <th class="bg-surface-alt px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wider text-left">Student</th>
                        <th class="bg-surface-alt px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wider text-left">Email</th>
                        <th class="bg-surface-alt px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wider text-left">Enrolled</th>
                        <th class="bg-surface-alt px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $enrollments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-b border-border hover:bg-surface-alt/50 transition-colors">
                        <td class="px-4 py-3.5 text-sm text-content"><?php echo e($loop->iteration); ?></td>
                        <td class="px-4 py-3.5 text-sm text-content"><?php echo e($student->name); ?></td>
                        <td class="px-4 py-3.5 text-sm text-content-secondary"><?php echo e($student->email); ?></td>
                        <td class="px-4 py-3.5 text-sm text-content-secondary"><?php echo e(\Carbon\Carbon::parse($student->pivot->created_at)->format('M d, Y')); ?></td>
                        <td class="px-4 py-3.5 text-right">
                            <a href="<?php echo e(route('admin.enrollments.edit', $student->pivot->id)); ?>"
                               class="inline-flex items-center gap-1 bg-warning text-content-inverse hover:bg-warning/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors"
                               title="Edit / Backdate enrollment">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125" /></svg>
                                Edit
                            </a>
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
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\memebership\lessons.blade.php ENDPATH**/ ?>