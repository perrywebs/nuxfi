

<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <div class="space-y-6">
        
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => $title,'subtitle' => 'Configure loan plan parameters']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($title),'subtitle' => 'Configure loan plan parameters']); ?>
             <?php $__env->slot('actions', null, []); ?> 
                <a href="<?php echo e(route('admin.loans.index', ['tab' => 'plans'])); ?>"
                   class="bg-surface-alt text-content border border-border hover:bg-border rounded-lg px-4 py-2 text-sm font-medium transition-colors inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                    Back to Plans
                </a>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
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
        <?php if(session('error')): ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.alert','data' => ['type' => 'danger','dismissible' => true]]); ?>
<?php $component->withName('admin.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger','dismissible' => true]); ?><?php echo e(session('error')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.alert','data' => ['type' => 'danger','dismissible' => true]]); ?>
<?php $component->withName('admin.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger','dismissible' => true]); ?>
                <ul class="list-disc list-inside space-y-1">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php endif; ?>

        
        <div class="max-w-3xl">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                <form action="<?php echo e($plan ? route('admin.loan-plans.update', $plan) : route('admin.loan-plans.store')); ?>" method="POST" class="space-y-6">
                    <?php echo csrf_field(); ?>
                    <?php if($plan): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Plan Name','for' => 'name','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Plan Name','for' => 'name','required' => true]); ?>
                        <input type="text" id="name" name="name" value="<?php echo e(old('name', $plan->name ?? '')); ?>"
                               class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors"
                               required>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Description','for' => 'description']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Description','for' => 'description']); ?>
                        <textarea id="description" name="description" rows="3"
                                  class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors min-h-[80px] resize-y"><?php echo e(old('description', $plan->description ?? '')); ?></textarea>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Minimum Amount ('.e($settings->currency).')','for' => 'min_amount','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Minimum Amount ('.e($settings->currency).')','for' => 'min_amount','required' => true]); ?>
                            <input type="number" step="0.01" id="min_amount" name="min_amount" value="<?php echo e(old('min_amount', $plan->min_amount ?? '100')); ?>"
                                   class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors"
                                   required>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Maximum Amount ('.e($settings->currency).')','for' => 'max_amount','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Maximum Amount ('.e($settings->currency).')','for' => 'max_amount','required' => true]); ?>
                            <input type="number" step="0.01" id="max_amount" name="max_amount" value="<?php echo e(old('max_amount', $plan->max_amount ?? '50000')); ?>"
                                   class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors"
                                   required>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Interest Rate (APR %)','for' => 'interest_rate','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Interest Rate (APR %)','for' => 'interest_rate','required' => true]); ?>
                            <input type="number" step="0.01" id="interest_rate" name="interest_rate" value="<?php echo e(old('interest_rate', $plan->interest_rate ?? '5')); ?>"
                                   class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors"
                                   required>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Interest Type','for' => 'interest_type','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Interest Type','for' => 'interest_type','required' => true]); ?>
                            <select id="interest_type" name="interest_type"
                                    class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors appearance-none"
                                    required>
                                <option value="simple" <?php echo e(old('interest_type', $plan->interest_type ?? '') === 'simple' ? 'selected' : ''); ?>>Simple</option>
                                <option value="compound" <?php echo e(old('interest_type', $plan->interest_type ?? '') === 'compound' ? 'selected' : ''); ?>>Compound</option>
                            </select>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Min Duration (months)','for' => 'min_duration','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Min Duration (months)','for' => 'min_duration','required' => true]); ?>
                            <input type="number" id="min_duration" name="min_duration" value="<?php echo e(old('min_duration', $plan->min_duration ?? '1')); ?>"
                                   class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors"
                                   required>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Max Duration (months)','for' => 'max_duration','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Max Duration (months)','for' => 'max_duration','required' => true]); ?>
                            <input type="number" id="max_duration" name="max_duration" value="<?php echo e(old('max_duration', $plan->max_duration ?? '60')); ?>"
                                   class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors"
                                   required>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>

                    
                    <div class="border-t border-border pt-5">
                        <h3 class="text-lg font-semibold text-content mb-4">Eligibility & Limits</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Max Active Loans Per User','for' => 'max_active_loans','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Max Active Loans Per User','for' => 'max_active_loans','required' => true]); ?>
                                <input type="number" id="max_active_loans" name="max_active_loans" value="<?php echo e(old('max_active_loans', $plan->max_active_loans ?? '1')); ?>"
                                       class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors"
                                       required>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Min Account Balance ('.e($settings->currency).')','for' => 'min_account_balance','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Min Account Balance ('.e($settings->currency).')','for' => 'min_account_balance','required' => true]); ?>
                                <input type="number" step="0.01" id="min_account_balance" name="min_account_balance" value="<?php echo e(old('min_account_balance', $plan->min_account_balance ?? '0')); ?>"
                                       class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors"
                                       required>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                    </div>

                    
                    <div class="border-t border-border pt-5">
                        <h3 class="text-lg font-semibold text-content mb-4">Fees & Penalties</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Processing Fee (%)','for' => 'processing_fee','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Processing Fee (%)','for' => 'processing_fee','required' => true]); ?>
                                <input type="number" step="0.01" id="processing_fee" name="processing_fee" value="<?php echo e(old('processing_fee', $plan->processing_fee ?? '0')); ?>"
                                       class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors"
                                       required>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Grace Period (days)','for' => 'grace_period_days','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Grace Period (days)','for' => 'grace_period_days','required' => true]); ?>
                                <input type="number" id="grace_period_days" name="grace_period_days" value="<?php echo e(old('grace_period_days', $plan->grace_period_days ?? '0')); ?>"
                                       class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors"
                                       required>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Late Fee (%)','for' => 'late_fee_percentage','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Late Fee (%)','for' => 'late_fee_percentage','required' => true]); ?>
                                <input type="number" step="0.01" id="late_fee_percentage" name="late_fee_percentage" value="<?php echo e(old('late_fee_percentage', $plan->late_fee_percentage ?? '0')); ?>"
                                       class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors"
                                       required>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                    </div>

                    
                    <div class="border-t border-border pt-5">
                        <h3 class="text-lg font-semibold text-content mb-4">Collateral</h3>

                        <div class="flex items-center gap-3 mb-4">
                            <input type="checkbox" name="requires_collateral" value="1" id="collateralCheck"
                                   class="w-4 h-4 rounded border-border text-primary focus:ring-primary/30"
                                <?php echo e(old('requires_collateral', $plan->requires_collateral ?? false) ? 'checked' : ''); ?>>
                            <label for="collateralCheck" class="text-sm font-medium text-content">Requires Collateral</label>
                        </div>

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Collateral Percentage (%)','for' => 'collateral_percentage','helper' => 'Percentage of loan amount frozen from user\'s balance']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Collateral Percentage (%)','for' => 'collateral_percentage','helper' => 'Percentage of loan amount frozen from user\'s balance']); ?>
                            <input type="number" step="0.01" id="collateral_percentage" name="collateral_percentage" value="<?php echo e(old('collateral_percentage', $plan->collateral_percentage ?? '')); ?>"
                                   class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors">
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>

                    
                    <div class="flex items-center gap-3 pt-2 border-t border-border">
                        <button type="submit"
                                class="bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-primary/30">
                            <?php echo e($plan ? 'Update Plan' : 'Create Plan'); ?>

                        </button>
                        <a href="<?php echo e(route('admin.loans.index', ['tab' => 'plans'])); ?>"
                           class="bg-surface-alt text-content border border-border hover:bg-border rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                            Cancel
                        </a>
                    </div>
                </form>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\loans\plan_form.blade.php ENDPATH**/ ?>