<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'Create New Expert','subtitle' => 'Add a new expert trader for copy trading']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Create New Expert','subtitle' => 'Add a new expert trader for copy trading']); ?>
     <?php $__env->slot('actions', null, []); ?> 
        <a href="<?php echo e(route('admin.experts.index')); ?>" class="bg-surface-alt text-content border border-border hover:bg-surface-alt/80 rounded-lg px-4 py-2 text-sm font-medium">Cancel</a>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<form action="<?php echo e(route('admin.experts.store')); ?>" method="POST" enctype="multipart/form-data" class="mt-6">
    <?php echo csrf_field(); ?>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
        
        <fieldset class="mb-8">
            <legend class="text-base font-semibold text-content mb-4">Basic Information</legend>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Name','for' => 'name','error' => $errors->first('name'),'required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Name','for' => 'name','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('name')),'required' => true]); ?>
                    <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Area of Expertise','for' => 'area_of_expertise','error' => $errors->first('area_of_expertise'),'required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Area of Expertise','for' => 'area_of_expertise','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('area_of_expertise')),'required' => true]); ?>
                    <select name="area_of_expertise" id="area_of_expertise" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary">
                        <?php $__currentLoopData = ['Crypto', 'Forex', 'Stocks', 'Indices', 'Commodities', 'Mixed']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($area); ?>" <?php echo e(old('area_of_expertise') === $area ? 'selected' : ''); ?>><?php echo e($area); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>

            <div class="mt-5">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Bio','for' => 'bio','error' => $errors->first('bio')]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Bio','for' => 'bio','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('bio'))]); ?>
                    <textarea name="bio" id="bio" rows="4" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:ring-2 focus:ring-primary/30 focus:border-primary min-h-[120px] resize-y" placeholder="Expert description..."><?php echo e(old('bio')); ?></textarea>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>

            <div class="mt-5">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Profile Picture','for' => 'profile_picture','error' => $errors->first('profile_picture')]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Profile Picture','for' => 'profile_picture','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('profile_picture'))]); ?>
                    <div class="border-2 border-dashed border-border hover:border-primary rounded-lg p-6 text-center transition-colors">
                        <input type="file" name="profile_picture" id="profile_picture" accept="image/jpeg,image/png,image/jpg" class="w-full text-sm text-content-secondary">
                        <p class="text-xs text-content-muted mt-2">JPG, JPEG, PNG — Max 2MB</p>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </fieldset>

        
        <fieldset class="mb-8">
            <legend class="text-base font-semibold text-content mb-4">Trading Configuration</legend>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Daily ROI (%)','for' => 'daily_roi','error' => $errors->first('daily_roi'),'required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Daily ROI (%)','for' => 'daily_roi','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('daily_roi')),'required' => true]); ?>
                    <input type="number" name="daily_roi" id="daily_roi" value="<?php echo e(old('daily_roi')); ?>" step="0.01" min="0.01" max="100" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Duration (days)','for' => 'duration_days','error' => $errors->first('duration_days'),'required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Duration (days)','for' => 'duration_days','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('duration_days')),'required' => true]); ?>
                    <input type="number" name="duration_days" id="duration_days" value="<?php echo e(old('duration_days')); ?>" min="1" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Win Rate (%)','for' => 'win_rate','error' => $errors->first('win_rate'),'required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Win Rate (%)','for' => 'win_rate','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('win_rate')),'required' => true]); ?>
                    <input type="number" name="win_rate" id="win_rate" value="<?php echo e(old('win_rate')); ?>" step="0.01" min="0" max="100" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Min Capital ($)','for' => 'min_startup_capital','error' => $errors->first('min_startup_capital'),'required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Min Capital ($)','for' => 'min_startup_capital','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('min_startup_capital')),'required' => true]); ?>
                    <input type="number" name="min_startup_capital" id="min_startup_capital" value="<?php echo e(old('min_startup_capital')); ?>" step="0.01" min="0" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Max Capital ($)','for' => 'max_capital','error' => $errors->first('max_capital'),'helper' => 'Leave empty for no limit']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Max Capital ($)','for' => 'max_capital','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('max_capital')),'helper' => 'Leave empty for no limit']); ?>
                    <input type="number" name="max_capital" id="max_capital" value="<?php echo e(old('max_capital')); ?>" step="0.01" min="0" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary">
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Profit Share (%)','for' => 'profit_share_percentage','error' => $errors->first('profit_share_percentage'),'required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Profit Share (%)','for' => 'profit_share_percentage','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('profit_share_percentage')),'required' => true]); ?>
                    <input type="number" name="profit_share_percentage" id="profit_share_percentage" value="<?php echo e(old('profit_share_percentage')); ?>" step="0.01" min="0" max="100" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </fieldset>

        
        <fieldset class="mb-8">
            <legend class="text-base font-semibold text-content mb-4">Display Stats (Admin-Controlled)</legend>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Followers Count','for' => 'followers_count','error' => $errors->first('followers_count')]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Followers Count','for' => 'followers_count','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('followers_count'))]); ?>
                    <input type="number" name="followers_count" id="followers_count" value="<?php echo e(old('followers_count', 0)); ?>" min="0" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary">
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Total ROI (%)','for' => 'total_roi','error' => $errors->first('total_roi')]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Total ROI (%)','for' => 'total_roi','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('total_roi'))]); ?>
                    <input type="number" name="total_roi" id="total_roi" value="<?php echo e(old('total_roi', 0)); ?>" step="0.01" min="0" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary">
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </fieldset>

        
        <fieldset class="mb-6">
            <legend class="text-base font-semibold text-content mb-4">Status</legend>
            <label class="flex items-center gap-3 cursor-pointer" x-data="{ on: <?php echo e(old('is_active', true) ? 'true' : 'false'); ?> }">
                <input type="checkbox" name="is_active" class="sr-only" x-model="on" :checked="on">
                <div class="relative w-11 h-6 rounded-full transition-colors" :class="on ? 'bg-primary' : 'bg-surface-alt'" @click="on = !on">
                    <div class="absolute top-0.5 left-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform" :class="on ? 'translate-x-5' : ''"></div>
                </div>
                <span class="text-sm text-content" x-text="on ? 'Active' : 'Inactive'"></span>
            </label>
        </fieldset>

        
        <div class="flex items-center gap-3 pt-4 border-t border-border">
            <button type="submit" class="bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-6 py-2.5 text-sm font-medium">Create Expert</button>
            <a href="<?php echo e(route('admin.experts.index')); ?>" class="bg-surface-alt text-content border border-border hover:bg-surface-alt/80 rounded-lg px-6 py-2.5 text-sm font-medium">Cancel</a>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\experts\create.blade.php ENDPATH**/ ?>