<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <h3 class="text-lg font-semibold text-content mb-1">Social Login</h3>
    <p class="text-sm text-content-muted mb-6">Configure social login providers for your users.</p>

    <form action="" method="post">
        <?php echo csrf_field(); ?>

        
        <div class="mb-6">
            <label class="block text-sm font-medium text-content mb-3">Choose social login to use</label>
            <div class="flex items-center gap-4">
                <label class="inline-flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="social" id="both" value="both"
                        class="text-primary focus:ring-primary" checked>
                    <span class="text-sm text-content-secondary">Both</span>
                </label>
                <label class="inline-flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="social" id="facebook" value="facebook"
                        class="text-primary focus:ring-primary">
                    <span class="text-sm text-content-secondary">Facebook</span>
                </label>
                <label class="inline-flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="social" id="google" value="google"
                        class="text-primary focus:ring-primary">
                    <span class="text-sm text-content-secondary">Google</span>
                </label>
            </div>
        </div>

        
        <div class="border-t border-border mt-6 pt-6">
            <h4 class="text-base font-medium text-content mb-4">Facebook Credentials</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'App ID','for' => 'fb_app_id','helper' => 'From developer.facebook.com']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'App ID','for' => 'fb_app_id','helper' => 'From developer.facebook.com']); ?>
                    <input type="text" name="site_name" id="fb_app_id"
                        class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary"
                        value="<?php echo e($settings->site_name); ?>" required>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'App Secret','for' => 'fb_app_secret','helper' => 'From developer.facebook.com']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'App Secret','for' => 'fb_app_secret','helper' => 'From developer.facebook.com']); ?>
                    <input type="text" name="site_name" id="fb_app_secret"
                        class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary"
                        value="<?php echo e($settings->site_name); ?>" required>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <div class="md:col-span-2">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Redirect URL','for' => 'fb_redirect','helper' => 'Set this as Valid OAuth Redirect URI in developers.facebook.com']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Redirect URL','for' => 'fb_redirect','helper' => 'Set this as Valid OAuth Redirect URI in developers.facebook.com']); ?>
                        <input type="text" name="site_name" id="fb_redirect"
                            class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary"
                            value="<?php echo e($settings->site_name); ?>" required>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            </div>
        </div>

        
        <div class="mt-6 pt-4 border-t border-border">
            <button type="submit"
                class="bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-6 py-2.5 text-sm font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-primary/30">
                Save
            </button>
        </div>
    </form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\Settings\AppSettings\social.blade.php ENDPATH**/ ?>