
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

    
    <?php echo $__env->make('user.partials.page-header', ['title' => 'ID Verification', 'subtitle' => 'Complete your KYC to unlock all platform features'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="max-w-3xl mx-auto">
        <?php if(Auth::user()->account_verify == 'Under review'): ?>
            
            <div class="rounded-xl bg-surface-raised border border-warning/30 p-8 text-center">
                <div class="w-16 h-16 rounded-full bg-warning/10 flex items-center justify-center mx-auto mb-4">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'clock','class' => 'w-8 h-8 text-warning']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'clock','class' => 'w-8 h-8 text-warning']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>

                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-warning/10 text-warning text-xs font-semibold mb-4">
                    <span class="w-1.5 h-1.5 rounded-full bg-warning animate-pulse"></span>
                    Under Review
                </span>

                <h3 class="text-lg font-bold text-content-primary mb-2">KYC Application Submitted</h3>
                <p class="text-sm text-content-secondary mb-4">
                    Your identity documents have been submitted successfully and are currently being reviewed by our compliance team.
                </p>
                <p class="text-sm text-content-tertiary mb-6">
                    This process typically takes 1–3 business days. You will be notified once your verification is complete.
                </p>

                <div class="p-4 rounded-lg bg-surface-overlay border border-surface-border mb-6">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-content-tertiary">Status</span>
                        <span class="text-warning font-medium">Pending Review</span>
                    </div>
                </div>

                <a href="<?php echo e(route('account.verify')); ?>" class="text-sm text-primary hover:text-primary-dark transition-colors">
                    &larr; Back to verification overview
                </a>
            </div>
        <?php else: ?>
        <div class="rounded-xl bg-surface-raised border border-surface-border p-6">
            
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-primary/10 mb-4">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'shield-check','class' => 'w-7 h-7 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'shield-check','class' => 'w-7 h-7 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
                <h3 class="text-xl font-bold text-content-primary">Begin Your ID Verification</h3>
                <p class="text-sm text-content-secondary mt-2 max-w-md mx-auto">
                    To comply with regulation, each participant must go through identity verification (KYC/AML) to prevent fraud.
                </p>
            </div>

            
            <form action="<?php echo e(route('kycsubmit')); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                <?php echo csrf_field(); ?>

                
                <div>
                    <h4 class="text-sm font-semibold text-content-primary mb-1">Document Type</h4>
                    <p class="text-xs text-content-tertiary mb-3">Select the type of identification document</p>

                    <div x-data="{ docType: 'Int\'l Passport' }" class="flex flex-wrap gap-3">
                        <label @click="docType = 'Int\'l Passport'"
                               :class="docType === 'Int\'l Passport' ? 'bg-primary text-content-inverse border-primary' : 'bg-surface-overlay text-content-secondary border-surface-border hover:border-primary/50'"
                               class="flex items-center gap-2 px-4 py-2.5 rounded-lg border cursor-pointer transition-colors text-sm font-medium">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'globe-alt','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'globe-alt','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <input type="radio" name="document_type" value="Int'l Passport" class="sr-only" checked>
                            Int'l Passport
                        </label>
                        <label @click="docType = 'National ID'"
                               :class="docType === 'National ID' ? 'bg-primary text-content-inverse border-primary' : 'bg-surface-overlay text-content-secondary border-surface-border hover:border-primary/50'"
                               class="flex items-center gap-2 px-4 py-2.5 rounded-lg border cursor-pointer transition-colors text-sm font-medium">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'identification','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'identification','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <input type="radio" name="document_type" value="National ID" class="sr-only">
                            National ID
                        </label>
                        <label @click="docType = 'Drivers License'"
                               :class="docType === 'Drivers License' ? 'bg-primary text-content-inverse border-primary' : 'bg-surface-overlay text-content-secondary border-surface-border hover:border-primary/50'"
                               class="flex items-center gap-2 px-4 py-2.5 rounded-lg border cursor-pointer transition-colors text-sm font-medium">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'credit-card','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'credit-card','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <input type="radio" name="document_type" value="Drivers License" class="sr-only">
                            Driver's License
                        </label>
                    </div>
                </div>

                
                <div class="p-4 rounded-lg bg-info/10 border border-info/20">
                    <h5 class="text-sm font-semibold text-info mb-2">Document Requirements</h5>
                    <ul class="space-y-1.5 text-xs text-content-secondary">
                        <li class="flex items-center gap-2">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'check-circle','class' => 'w-4 h-4 text-gain flex-shrink-0']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'check-circle','class' => 'w-4 h-4 text-gain flex-shrink-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            Chosen credential must not have expired.
                        </li>
                        <li class="flex items-center gap-2">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'check-circle','class' => 'w-4 h-4 text-gain flex-shrink-0']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'check-circle','class' => 'w-4 h-4 text-gain flex-shrink-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            Document should be in good condition and clearly visible.
                        </li>
                        <li class="flex items-center gap-2">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'check-circle','class' => 'w-4 h-4 text-gain flex-shrink-0']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'check-circle','class' => 'w-4 h-4 text-gain flex-shrink-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            Make sure that there is no light glare on the document.
                        </li>
                    </ul>
                </div>

                
                <div>
                    <label class="block text-sm font-medium text-content-primary mb-1.5">
                        Upload Front Side <span class="text-loss">*</span>
                    </label>
                    <div class="flex items-center gap-4 p-4 rounded-lg border-2 border-dashed border-surface-border hover:border-primary/50 transition-colors">
                        <div class="flex-1">
                            <input type="file" name="frontimg" required
                                   class="block w-full text-sm text-content-secondary file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer">
                        </div>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'identification','class' => 'w-10 h-10 text-content-tertiary hidden sm:block']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'identification','class' => 'w-10 h-10 text-content-tertiary hidden sm:block']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                </div>

                
                <div>
                    <label class="block text-sm font-medium text-content-primary mb-1.5">
                        Upload Back Side <span class="text-loss">*</span>
                    </label>
                    <div class="flex items-center gap-4 p-4 rounded-lg border-2 border-dashed border-surface-border hover:border-primary/50 transition-colors">
                        <div class="flex-1">
                            <input type="file" name="backimg" required
                                   class="block w-full text-sm text-content-secondary file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer">
                        </div>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'credit-card','class' => 'w-10 h-10 text-content-tertiary hidden sm:block']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'credit-card','class' => 'w-10 h-10 text-content-tertiary hidden sm:block']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                </div>

                
                <div class="flex items-start gap-3">
                    <input type="checkbox" id="kycAgree" required
                           class="mt-1 w-4 h-4 rounded border-surface-border bg-surface-overlay text-primary focus:ring-primary">
                    <label for="kycAgree" class="text-sm text-content-secondary">
                        All the information I have entered is correct.
                    </label>
                </div>

                
                    <button type="submit"
                            class="w-full py-2.5 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-semibold transition-colors">
                        Submit Application
                    </button>
            </form>
        </div>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\verification.blade.php ENDPATH**/ ?>