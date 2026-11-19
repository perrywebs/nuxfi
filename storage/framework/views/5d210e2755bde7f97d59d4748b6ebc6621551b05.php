
<?php $__env->startSection('title', 'Color Settings'); ?>

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'Color Settings','subtitle' => 'Customize the colors used across your website, dashboard, and auth pages.']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Color Settings','subtitle' => 'Customize the colors used across your website, dashboard, and auth pages.']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <?php if(count($errors) > 0): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.alert','data' => ['type' => 'danger','dismissible' => true]]); ?>
<?php $component->withName('admin.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger','dismissible' => true]); ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div><?php echo e($error); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endif; ?>

    <div x-data="colorSettings()" class="mt-6 space-y-6">

        
        <div class="bg-surface-card rounded-xl border border-border shadow-sm p-5">
            <h3 class="text-sm font-semibold text-content mb-3">Live Preview</h3>
            <div class="flex flex-wrap gap-3">
                <template x-for="(val, key) in colors" :key="key">
                    <div class="flex flex-col items-center gap-1">
                        <div class="w-10 h-10 rounded-lg border border-border shadow-sm" :style="'background-color:' + val"></div>
                        <span class="text-[10px] text-content-muted truncate max-w-[60px]" x-text="key.replace(/_/g, ' ')"></span>
                    </div>
                </template>
            </div>
        </div>

        
        <form @submit.prevent="saveColors()" id="colorForm">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            
            <div class="bg-surface-card rounded-xl border border-border shadow-sm p-5 mb-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-sm font-semibold text-content">Primary Colors</h3>
                        <p class="text-xs text-content-muted mt-0.5">Main accent color used for buttons, links, and highlights</p>
                    </div>
                    <button type="button" @click="resetGroup('primary')"
                        class="text-xs text-content-muted hover:text-danger transition-colors">Reset to Default</button>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.color-field','data' => ['xModel' => 'colors.primary_color','label' => 'Primary']]); ?>
<?php $component->withName('admin.color-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['x-model' => 'colors.primary_color','label' => 'Primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.color-field','data' => ['xModel' => 'colors.primary_light','label' => 'Primary Light']]); ?>
<?php $component->withName('admin.color-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['x-model' => 'colors.primary_light','label' => 'Primary Light']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.color-field','data' => ['xModel' => 'colors.primary_dark','label' => 'Primary Dark']]); ?>
<?php $component->withName('admin.color-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['x-model' => 'colors.primary_dark','label' => 'Primary Dark']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            </div>

            
            <div class="bg-surface-card rounded-xl border border-border shadow-sm p-5 mb-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-sm font-semibold text-content">Signal Colors</h3>
                        <p class="text-xs text-content-muted mt-0.5">Used for status indicators — profit, loss, warnings, and informational messages</p>
                    </div>
                    <button type="button" @click="resetGroup('signal')"
                        class="text-xs text-content-muted hover:text-danger transition-colors">Reset to Default</button>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.color-field','data' => ['xModel' => 'colors.gain_color','label' => 'Gain / Profit']]); ?>
<?php $component->withName('admin.color-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['x-model' => 'colors.gain_color','label' => 'Gain / Profit']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.color-field','data' => ['xModel' => 'colors.loss_color','label' => 'Loss / Danger']]); ?>
<?php $component->withName('admin.color-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['x-model' => 'colors.loss_color','label' => 'Loss / Danger']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.color-field','data' => ['xModel' => 'colors.warning_color','label' => 'Warning']]); ?>
<?php $component->withName('admin.color-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['x-model' => 'colors.warning_color','label' => 'Warning']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.color-field','data' => ['xModel' => 'colors.info_color','label' => 'Info']]); ?>
<?php $component->withName('admin.color-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['x-model' => 'colors.info_color','label' => 'Info']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            </div>

            
            <div class="bg-surface-card rounded-xl border border-border shadow-sm p-5 mb-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-sm font-semibold text-content">Surface Colors</h3>
                        <p class="text-xs text-content-muted mt-0.5">Dark background colors for the user dashboard and auth pages</p>
                    </div>
                    <button type="button" @click="resetGroup('surface')"
                        class="text-xs text-content-muted hover:text-danger transition-colors">Reset to Default</button>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.color-field','data' => ['xModel' => 'colors.surface_base','label' => 'Base Background']]); ?>
<?php $component->withName('admin.color-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['x-model' => 'colors.surface_base','label' => 'Base Background']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.color-field','data' => ['xModel' => 'colors.surface_raised','label' => 'Raised / Cards']]); ?>
<?php $component->withName('admin.color-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['x-model' => 'colors.surface_raised','label' => 'Raised / Cards']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.color-field','data' => ['xModel' => 'colors.surface_overlay','label' => 'Overlay / Modals']]); ?>
<?php $component->withName('admin.color-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['x-model' => 'colors.surface_overlay','label' => 'Overlay / Modals']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.color-field','data' => ['xModel' => 'colors.surface_border','label' => 'Border']]); ?>
<?php $component->withName('admin.color-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['x-model' => 'colors.surface_border','label' => 'Border']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.color-field','data' => ['xModel' => 'colors.surface_border_light','label' => 'Border Light']]); ?>
<?php $component->withName('admin.color-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['x-model' => 'colors.surface_border_light','label' => 'Border Light']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            </div>

            
            <div class="bg-surface-card rounded-xl border border-border shadow-sm p-5 mb-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-sm font-semibold text-content">Content / Text Colors</h3>
                        <p class="text-xs text-content-muted mt-0.5">Text colors used on dark backgrounds (dashboard, auth pages)</p>
                    </div>
                    <button type="button" @click="resetGroup('content')"
                        class="text-xs text-content-muted hover:text-danger transition-colors">Reset to Default</button>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.color-field','data' => ['xModel' => 'colors.content_primary','label' => 'Primary Text']]); ?>
<?php $component->withName('admin.color-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['x-model' => 'colors.content_primary','label' => 'Primary Text']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.color-field','data' => ['xModel' => 'colors.content_secondary','label' => 'Secondary Text']]); ?>
<?php $component->withName('admin.color-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['x-model' => 'colors.content_secondary','label' => 'Secondary Text']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.color-field','data' => ['xModel' => 'colors.content_tertiary','label' => 'Tertiary Text']]); ?>
<?php $component->withName('admin.color-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['x-model' => 'colors.content_tertiary','label' => 'Tertiary Text']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            </div>

            
            <div class="bg-surface-card rounded-xl border border-border shadow-sm p-5 mb-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-sm font-semibold text-content">Body Colors (Public Pages)</h3>
                        <p class="text-xs text-content-muted mt-0.5">Light-theme colors for the public marketing pages (homepage, about, etc.)</p>
                    </div>
                    <button type="button" @click="resetGroup('body')"
                        class="text-xs text-content-muted hover:text-danger transition-colors">Reset to Default</button>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.color-field','data' => ['xModel' => 'colors.body_bg','label' => 'Background']]); ?>
<?php $component->withName('admin.color-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['x-model' => 'colors.body_bg','label' => 'Background']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.color-field','data' => ['xModel' => 'colors.body_text','label' => 'Body Text']]); ?>
<?php $component->withName('admin.color-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['x-model' => 'colors.body_text','label' => 'Body Text']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.color-field','data' => ['xModel' => 'colors.body_muted','label' => 'Muted Text']]); ?>
<?php $component->withName('admin.color-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['x-model' => 'colors.body_muted','label' => 'Muted Text']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.color-field','data' => ['xModel' => 'colors.body_border','label' => 'Body Border']]); ?>
<?php $component->withName('admin.color-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['x-model' => 'colors.body_border','label' => 'Body Border']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            </div>

            
            <div class="flex items-center gap-3">
                <button type="submit"
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary text-primary-foreground text-sm font-medium rounded-lg hover:bg-primary-hover transition-colors"
                    :disabled="saving">
                    <svg x-show="saving" class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                    <span x-text="saving ? 'Saving...' : 'Save Colors'"></span>
                </button>
                <button type="button" @click="resetGroup('all')"
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-surface-alt text-content-secondary text-sm font-medium rounded-lg hover:bg-surface border border-border transition-colors">
                    Reset All to Defaults
                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
function colorSettings() {
    return {
        saving: false,
        defaults: <?php echo json_encode($defaults, 15, 512) ?>,
        colors: {
            primary_color: '<?php echo e($themeColors->primary_color ?? '#059669'); ?>',
            primary_light: '<?php echo e($themeColors->primary_light ?? '#34D399'); ?>',
            primary_dark: '<?php echo e($themeColors->primary_dark ?? '#047857'); ?>',
            gain_color: '<?php echo e($themeColors->gain_color ?? '#22C55E'); ?>',
            loss_color: '<?php echo e($themeColors->loss_color ?? '#EF4444'); ?>',
            warning_color: '<?php echo e($themeColors->warning_color ?? '#F59E0B'); ?>',
            info_color: '<?php echo e($themeColors->info_color ?? '#3B82F6'); ?>',
            surface_base: '<?php echo e($themeColors->surface_base ?? '#0F1115'); ?>',
            surface_raised: '<?php echo e($themeColors->surface_raised ?? '#161A1E'); ?>',
            surface_overlay: '<?php echo e($themeColors->surface_overlay ?? '#1C2127'); ?>',
            surface_border: '<?php echo e($themeColors->surface_border ?? '#2A2F36'); ?>',
            surface_border_light: '<?php echo e($themeColors->surface_border_light ?? '#363C44'); ?>',
            content_primary: '<?php echo e($themeColors->content_primary ?? '#E8EAED'); ?>',
            content_secondary: '<?php echo e($themeColors->content_secondary ?? '#9AA0AB'); ?>',
            content_tertiary: '<?php echo e($themeColors->content_tertiary ?? '#6B7280'); ?>',
            body_bg: '<?php echo e($themeColors->body_bg ?? '#F5F7F9'); ?>',
            body_text: '<?php echo e($themeColors->body_text ?? '#1F2937'); ?>',
            body_muted: '<?php echo e($themeColors->body_muted ?? '#6B7280'); ?>',
            body_border: '<?php echo e($themeColors->body_border ?? '#E5E7EB'); ?>',
        },

        saveColors() {
            this.saving = true;
            $.ajax({
                url: '<?php echo e(route("admin.update-colors")); ?>',
                type: 'POST',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    _method: 'PUT',
                    ...this.colors
                },
                success: (response) => {
                    this.saving = false;
                    if (response.status === 200) {
                        Swal.fire({ icon: 'success', title: 'Success', text: response.success, timer: 3000, showConfirmButton: false });
                    }
                },
                error: (xhr) => {
                    this.saving = false;
                    let msg = 'Something went wrong.';
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        msg = Object.values(xhr.responseJSON.errors).flat().join('\n');
                    }
                    Swal.fire({ icon: 'error', title: 'Error', text: msg });
                }
            });
        },

        resetGroup(group) {
            Swal.fire({
                title: 'Reset ' + (group === 'all' ? 'All Colors' : group.charAt(0).toUpperCase() + group.slice(1) + ' Colors') + '?',
                text: 'This will revert to the default color values.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(var(--primary))',
                cancelButtonColor: 'rgb(var(--secondary))',
                confirmButtonText: 'Yes, reset'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?php echo e(route("admin.reset-colors")); ?>',
                        type: 'POST',
                        data: {
                            _token: '<?php echo e(csrf_token()); ?>',
                            group: group
                        },
                        success: (response) => {
                            if (response.status === 200) {
                                // Update local state with returned defaults
                                for (const [key, val] of Object.entries(response.colors)) {
                                    if (this.colors.hasOwnProperty(key)) {
                                        this.colors[key] = val;
                                    }
                                }
                                Swal.fire({ icon: 'success', title: 'Reset', text: response.success, timer: 2000, showConfirmButton: false });
                            }
                        },
                        error: () => {
                            Swal.fire({ icon: 'error', title: 'Error', text: 'Could not reset colors.' });
                        }
                    });
                }
            });
        }
    }
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\Settings\ColorSettings\show.blade.php ENDPATH**/ ?>