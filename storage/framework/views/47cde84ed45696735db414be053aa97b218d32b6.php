<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <h3 class="text-lg font-semibold text-content mb-1">Website Information</h3>
    <p class="text-sm text-content-muted mb-6">Update your website name, description, logo, and other public-facing details.</p>

    <form method="post" action="<?php echo e(route('updatewebinfo')); ?>" id="appinfoform" enctype="multipart/form-data">
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>

        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Website Name','for' => 'site_name','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Website Name','for' => 'site_name','required' => true]); ?>
                <input type="text" name="site_name" id="site_name"
                    class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary"
                    value="<?php echo e($settings->site_name); ?>" required>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Website Title','for' => 'site_title','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Website Title','for' => 'site_title','required' => true]); ?>
                <input type="text" name="site_title" id="site_title"
                    class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary"
                    value="<?php echo e($settings->site_title); ?>" required>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Website Keywords','for' => 'keywords','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Website Keywords','for' => 'keywords','required' => true]); ?>
                <input type="text" name="keywords" id="keywords"
                    class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary"
                    value="<?php echo e($settings->keywords); ?>" required>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Website URL','for' => 'site_address','required' => true,'helper' => 'e.g. https://yoursite.com']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Website URL','for' => 'site_address','required' => true,'helper' => 'e.g. https://yoursite.com']); ?>
                <input type="text" name="site_address" id="site_address" placeholder="https://yoursite.com"
                    class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary"
                    value="<?php echo e($settings->site_address); ?>" required>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>

        <div class="mt-5">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Website Description','for' => 'description']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Website Description','for' => 'description']); ?>
                <textarea name="description" id="description" rows="3"
                    class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary"><?php echo e($settings->description); ?></textarea>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>

        
        <div class="border-t border-border mt-6 pt-6">
            <h4 class="text-base font-medium text-content mb-4">Announcements & Notifications</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="md:col-span-2">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Announcement','for' => 'update']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Announcement','for' => 'update']); ?>
                        <textarea name="update" id="update" rows="2"
                            class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary"><?php echo e($settings->newupdate); ?></textarea>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Welcome Message','for' => 'welcome_message','helper' => 'Displayed to users whose registration date is ≤ 3 days']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Welcome Message','for' => 'welcome_message','helper' => 'Displayed to users whose registration date is ≤ 3 days']); ?>
                    <textarea name="welcome_message" id="welcome_message" rows="2"
                        class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary"><?php echo e($settings->welcome_message); ?></textarea>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <div>
                    <label class="block text-sm font-medium text-content mb-1.5">Send Trades Email</label>
                    <div class="flex items-center gap-4 mt-2">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="trade_message" value="on"
                                class="text-primary focus:ring-primary"
                                <?php echo e($settings->trade_mode == 'on' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">On</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="trade_message" value="off"
                                class="text-primary focus:ring-primary"
                                <?php echo e($settings->trade_mode != 'on' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">Off</span>
                        </label>
                    </div>
                    <p class="text-xs text-content-muted mt-1">If off, users won't receive email when a trade is executed.</p>
                </div>
            </div>
        </div>

        
        <div class="border-t border-border mt-6 pt-6">
            <h4 class="text-base font-medium text-content mb-4">Contact & Miscellaneous</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'WhatsApp Number','for' => 'whatsapp']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'WhatsApp Number','for' => 'whatsapp']); ?>
                    <input type="text" name="whatsapp" id="whatsapp"
                        class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary"
                        value="<?php echo e($settings->whatsapp); ?>">
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'NFT Gas Fee (ETH)','for' => 'gasfee']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'NFT Gas Fee (ETH)','for' => 'gasfee']); ?>
                    <input type="text" name="gasfee" id="gasfee"
                        class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary"
                        value="<?php echo e($settings->gasfee); ?>"
                        pattern="^\d*(\.\d{0,8})?$"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Credit Card Application Fee (USD)','for' => 'card_fee','helper' => 'Charged to a customer when they apply for a physical credit card. Stored in USD.']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Credit Card Application Fee (USD)','for' => 'card_fee','helper' => 'Charged to a customer when they apply for a physical credit card. Stored in USD.']); ?>
                    <input type="text" name="card_fee" id="card_fee"
                        class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary"
                        value="<?php echo e($settings->card_fee ?? 600); ?>"
                        pattern="^\d*(\.\d{0,2})?$"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-5">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Timezone','for' => 'timezone']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Timezone','for' => 'timezone']); ?>
                    <select name="timezone" id="timezone" class="select2 w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                        <option><?php echo e($settings->timezone); ?></option>
                        <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($list); ?>"><?php echo e($list); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Installation Type','for' => 'install_type']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Installation Type','for' => 'install_type']); ?>
                    <select name="install_type" id="install_type"
                        class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                        <option><?php echo e($settings->install_type); ?></option>
                        <option>Main-Domain</option>
                        <option>Sub-Domain</option>
                        <option>Sub-Folder</option>
                    </select>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </div>

        
        <div class="border-t border-border mt-6 pt-6">
            <h4 class="text-base font-medium text-content mb-4">Branding</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Logo','for' => 'logo','helper' => 'Recommended: max 200×100px']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Logo','for' => 'logo','helper' => 'Recommended: max 200×100px']); ?>
                        <input type="file" name="logo" id="logo"
                            class="w-full text-sm text-content-secondary file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-primary-light file:text-primary hover:file:bg-primary/20 cursor-pointer">
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <div class="mt-3 p-3 border border-border rounded-lg text-center bg-surface-alt">
                        <img src="<?php echo e(asset('storage/app/public/' . $settings->logo)); ?>" alt="Logo" class="max-h-16 inline-block">
                    </div>
                </div>
                <div>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Favicon','for' => 'favicon','helper' => 'Recommended: max 32×32px']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Favicon','for' => 'favicon','helper' => 'Recommended: max 32×32px']); ?>
                        <input type="file" name="favicon" id="favicon"
                            class="w-full text-sm text-content-secondary file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-primary-light file:text-primary hover:file:bg-primary/20 cursor-pointer">
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <div class="mt-3 p-3 border border-border rounded-lg text-center bg-surface-alt">
                        <img src="<?php echo e(asset('storage/app/public/' . $settings->favicon)); ?>" alt="Favicon" class="max-h-8 inline-block">
                    </div>
                </div>
            </div>
        </div>

        
        <div class="mt-6 pt-4 border-t border-border">
            <button type="submit"
                class="bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-6 py-2.5 text-sm font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-primary/30">
                Update Information
            </button>
        </div>
    </form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/admin/Settings/AppSettings/webinfo.blade.php ENDPATH**/ ?>