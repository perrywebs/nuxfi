<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <h3 class="text-lg font-semibold text-content mb-1">Preferences</h3>
    <p class="text-sm text-content-muted mb-6">Control platform behavior — toggles, currencies, verification, and feature flags.</p>

    <form method="post" action="javascript:void(0)" id="updatepreference">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Contact Email','for' => 'contact_email','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Contact Email','for' => 'contact_email','required' => true]); ?>
                <input type="text" name="contact_email" id="contact_email"
                    class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary"
                    value="<?php echo e($settings->contact_email); ?>" required>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            <div>
                <input name="s_currency" value="<?php echo e($settings->s_currency); ?>" id="s_c" type="hidden">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Website Currency','for' => 'select_c']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Website Currency','for' => 'select_c']); ?>
                    <select name="currency" id="select_c" class="select2 w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary"
                        onchange="changecurr()" style="width: 100%">
                        <option value="<?php echo e(htmlentities($settings->currency)); ?>"><?php echo e($settings->currency); ?></option>
                        <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option id="<?php echo e($key); ?>" value="<?php echo e(html_entity_decode($currency)); ?>">
                                <?php echo e($key . ' (' . html_entity_decode($currency) . ')'); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>

            <input type="hidden" value="<?php echo e($settings->site_preference); ?>" name="site_preference">

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'HomePage URL (Redirect)','for' => 'redirect_url','helper' => 'If you use a custom homepage, enter the URL here. If empty, the system uses the default pages.']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'HomePage URL (Redirect)','for' => 'redirect_url','helper' => 'If you use a custom homepage, enter the URL here. If empty, the system uses the default pages.']); ?>
                <input type="text" name="redirect_url" id="redirect_url" placeholder="eg https://myhomepage.com"
                    class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary"
                    value="<?php echo e($settings->redirect_url); ?>">
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>

        
        <div class="border-t border-border mt-6 pt-6">
            <h4 class="text-base font-medium text-content mb-5">Feature Toggles</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                
                <div class="bg-surface-alt/50 rounded-lg p-4 border border-border">
                    <label class="block text-sm font-medium text-content mb-2">Announcement</label>
                    <div class="flex items-center gap-4">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="annouc" value="on" class="text-primary focus:ring-primary"
                                <?php echo e($settings->enable_annoc == 'on' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">On</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="annouc" value="off" class="text-primary focus:ring-primary"
                                <?php echo e($settings->enable_annoc != 'on' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">Off</span>
                        </label>
                    </div>
                </div>

                
                <div class="bg-surface-alt/50 rounded-lg p-4 border border-border">
                    <label class="block text-sm font-medium text-content mb-2">Weekend Trade</label>
                    <div class="flex items-center gap-4">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="weekend_trade" value="on" class="text-primary focus:ring-primary"
                                <?php echo e($settings->weekend_trade == 'on' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">On</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="weekend_trade" value="off" class="text-primary focus:ring-primary"
                                <?php echo e($settings->weekend_trade != 'on' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">Off</span>
                        </label>
                    </div>
                    <p class="text-xs text-content-muted mt-2">If off, users won't receive ROI on weekends</p>
                </div>

                
                <div class="bg-surface-alt/50 rounded-lg p-4 border border-border">
                    <label class="block text-sm font-medium text-content mb-2">Withdrawals</label>
                    <div class="flex items-center gap-4">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="withdraw" value="true" class="text-primary focus:ring-primary"
                                <?php echo e($settings->enable_with == 'true' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">Enable</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="withdraw" value="false" class="text-primary focus:ring-primary"
                                <?php echo e($settings->enable_with != 'true' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">Disable</span>
                        </label>
                    </div>
                    <p class="text-xs text-content-muted mt-2">If disabled, users can't place withdrawal requests</p>
                </div>

                
                <div class="bg-surface-alt/50 rounded-lg p-4 border border-border">
                    <label class="block text-sm font-medium text-content mb-2">Google ReCaptcha</label>
                    <div class="flex items-center gap-4">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="captcha" value="true" class="text-primary focus:ring-primary"
                                <?php echo e($settings->captcha == 'true' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">On</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="captcha" value="false" class="text-primary focus:ring-primary"
                                <?php echo e($settings->captcha != 'true' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">Off</span>
                        </label>
                    </div>
                    <p class="text-xs text-content-muted mt-2">If on, users must pass Google reCAPTCHA on registration</p>
                </div>

                
                <div class="bg-surface-alt/50 rounded-lg p-4 border border-border">
                    <label class="block text-sm font-medium text-content mb-2">Translation</label>
                    <div class="flex items-center gap-4">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="googlet" value="on" class="text-primary focus:ring-primary"
                                <?php echo e($settings->google_translate == 'on' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">On</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="googlet" value="off" class="text-primary focus:ring-primary"
                                <?php echo e($settings->google_translate != 'on' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">Off</span>
                        </label>
                    </div>
                    <p class="text-xs text-content-muted mt-2">Enables language selection via Google Translate</p>
                </div>

                
                <div class="bg-surface-alt/50 rounded-lg p-4 border border-border">
                    <label class="block text-sm font-medium text-content mb-2">Trade Mode</label>
                    <div class="flex items-center gap-4">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="trade_mode" value="on" class="text-primary focus:ring-primary"
                                <?php echo e($settings->trade_mode == 'on' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">On</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="trade_mode" value="off" class="text-primary focus:ring-primary"
                                <?php echo e($settings->trade_mode != 'on' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">Off</span>
                        </label>
                    </div>
                    <p class="text-xs text-content-muted mt-2">If off, users won't receive any ROI</p>
                </div>

                
                <div class="bg-surface-alt/50 rounded-lg p-4 border border-border">
                    <label class="block text-sm font-medium text-content mb-2">KYC (Verification)</label>
                    <div class="flex items-center gap-4">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="enable_kyc" value="yes" class="text-primary focus:ring-primary"
                                <?php echo e($settings->enable_kyc == 'yes' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">On</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="enable_kyc" value="no" class="text-primary focus:ring-primary"
                                <?php echo e($settings->enable_kyc != 'yes' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">Off</span>
                        </label>
                    </div>
                    <p class="text-xs text-content-muted mt-2">Require document verification before withdrawals</p>
                </div>

                
                <div class="bg-surface-alt/50 rounded-lg p-4 border border-border">
                    <label class="block text-sm font-medium text-content mb-2">KYC on Registration</label>
                    <div class="flex items-center gap-4">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="enable_kyc_registration" value="yes" class="text-primary focus:ring-primary"
                                <?php echo e($settings->enable_kyc_registration == 'yes' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">On</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="enable_kyc_registration" value="no" class="text-primary focus:ring-primary"
                                <?php echo e($settings->enable_kyc_registration != 'yes' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">Off</span>
                        </label>
                    </div>
                    <p class="text-xs text-content-muted mt-2">Force KYC during registration. Blocks all operations until admin verifies.</p>
                </div>

                
                <div class="bg-surface-alt/50 rounded-lg p-4 border border-border">
                    <label class="block text-sm font-medium text-content mb-2">Google Login</label>
                    <div class="flex items-center gap-4">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="social" value="yes" class="text-primary focus:ring-primary"
                                <?php echo e($settings->enable_social_login == 'yes' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">On</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="social" value="no" class="text-primary focus:ring-primary"
                                <?php echo e($settings->enable_social_login != 'yes' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">Off</span>
                        </label>
                    </div>
                    <p class="text-xs text-content-muted mt-2">Allow login/register via Google account</p>
                </div>

                
                <div class="bg-surface-alt/50 rounded-lg p-4 border border-border">
                    <label class="block text-sm font-medium text-content mb-2">Email Verification</label>
                    <div class="flex items-center gap-4">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="enail_verify" value="true" class="text-primary focus:ring-primary"
                                <?php echo e($settings->enable_verification == 'true' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">Enable</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="enail_verify" value="false" class="text-primary focus:ring-primary"
                                <?php echo e($settings->enable_verification != 'true' ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">Disable</span>
                        </label>
                    </div>
                    <p class="text-xs text-content-muted mt-2">If disabled, users won't be asked to verify their email</p>
                </div>

                
                <div class="bg-surface-alt/50 rounded-lg p-4 border border-border">
                    <label class="block text-sm font-medium text-content mb-2">Return Capital</label>
                    <div class="flex items-center gap-4">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="return_capital" value="true" class="text-primary focus:ring-primary"
                                <?php echo e($settings->return_capital ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">Yes</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="return_capital" value="false" class="text-primary focus:ring-primary"
                                <?php echo e(!$settings->return_capital ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">No</span>
                        </label>
                    </div>
                    <p class="text-xs text-content-muted mt-2">If No, capital isn't returned after investment plan expires</p>
                </div>

                
                <div class="bg-surface-alt/50 rounded-lg p-4 border border-border">
                    <label class="block text-sm font-medium text-content mb-2">Plan Cancellation</label>
                    <div class="flex items-center gap-4">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="should_cancel_plan" value="1" class="text-primary focus:ring-primary"
                                <?php echo e($settings->should_cancel_plan ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">On</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="should_cancel_plan" value="0" class="text-primary focus:ring-primary"
                                <?php echo e(!$settings->should_cancel_plan ? 'checked' : ''); ?>>
                            <span class="text-sm text-content-secondary">Off</span>
                        </label>
                    </div>
                    <p class="text-xs text-content-muted mt-2">Allow users to cancel active investment plans (capital returned)</p>
                </div>

            </div>
        </div>

        
        <div class="mt-6 pt-4 border-t border-border">
            <button type="submit"
                class="bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-6 py-2.5 text-sm font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-primary/30">
                Save Preferences
            </button>
        </div>
    </form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/admin/Settings/AppSettings/webpreference.blade.php ENDPATH**/ ?>