

<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <div class="space-y-6">
        
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => $title,'subtitle' => 'Loan application details and actions']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($title),'subtitle' => 'Loan application details and actions']); ?>
             <?php $__env->slot('actions', null, []); ?> 
                <a href="<?php echo e(route('admin.loans.index', ['tab' => $loan->status === 'pending' ? 'pending' : 'all'])); ?>"
                   class="bg-surface-alt text-content border border-border hover:bg-border rounded-lg px-4 py-2 text-sm font-medium transition-colors inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                    Back to Loans
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

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                <h3 class="text-lg font-semibold text-content mb-4">Loan Summary</h3>
                <div class="space-y-3">
                    <div class="flex justify-between py-2 border-b border-border">
                        <span class="text-sm text-content-muted">Loan ID</span>
                        <span class="text-sm font-medium text-content">#<?php echo e($loan->id); ?></span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-border">
                        <span class="text-sm text-content-muted">Plan</span>
                        <span class="text-sm text-content-secondary"><?php echo e($loan->loanPlan->name ?? $loan->credit_facility); ?></span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-border">
                        <span class="text-sm text-content-muted">Requested Amount</span>
                        <span class="text-sm font-medium text-content"><?php echo e($settings->currency); ?><?php echo e(number_format($loan->amount, 2)); ?></span>
                    </div>
                    <?php if($loan->approved_amount): ?>
                    <div class="flex justify-between py-2 border-b border-border">
                        <span class="text-sm text-content-muted">Approved Amount</span>
                        <span class="text-sm font-medium text-success"><?php echo e($settings->currency); ?><?php echo e(number_format($loan->approved_amount, 2)); ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="flex justify-between py-2 border-b border-border">
                        <span class="text-sm text-content-muted">Interest Rate</span>
                        <span class="text-sm text-content-secondary"><?php echo e($loan->interest_rate); ?>% APR (<?php echo e(ucfirst($loan->interest_type)); ?>)</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-border">
                        <span class="text-sm text-content-muted">Duration</span>
                        <span class="text-sm text-content-secondary"><?php echo e($loan->duration); ?> months</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-border">
                        <span class="text-sm text-content-muted">Processing Fee</span>
                        <span class="text-sm text-content-secondary"><?php echo e($settings->currency); ?><?php echo e(number_format($loan->processing_fee, 2)); ?></span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-border">
                        <span class="text-sm text-content-muted">Total Repayable</span>
                        <span class="text-sm font-medium text-content"><?php echo e($settings->currency); ?><?php echo e(number_format($loan->total_repayable, 2)); ?></span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-border">
                        <span class="text-sm text-content-muted">Total Repaid</span>
                        <span class="text-sm text-content-secondary"><?php echo e($settings->currency); ?><?php echo e(number_format($loan->total_repaid, 2)); ?></span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-border">
                        <span class="text-sm text-content-muted">Status</span>
                        <span>
                            <?php
                                $statusType = match($loan->status) {
                                    'pending' => 'warning',
                                    'active', 'repaying' => 'info',
                                    'completed' => 'success',
                                    'defaulted', 'rejected' => 'danger',
                                    default => 'neutral',
                                };
                            ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => $statusType]]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($statusType)]); ?><?php echo e(ucfirst($loan->status)); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </span>
                    </div>
                    <?php if($loan->rejection_reason): ?>
                    <div class="flex justify-between py-2 border-b border-border">
                        <span class="text-sm text-content-muted">Rejection Reason</span>
                        <span class="text-sm text-danger"><?php echo e($loan->rejection_reason); ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="flex justify-between py-2 border-b border-border">
                        <span class="text-sm text-content-muted">Applied</span>
                        <span class="text-sm text-content-secondary"><?php echo e($loan->created_at->format('M d, Y H:i')); ?></span>
                    </div>
                    <?php if($loan->disbursed_at): ?>
                    <div class="flex justify-between py-2 border-b border-border">
                        <span class="text-sm text-content-muted">Disbursed</span>
                        <span class="text-sm text-content-secondary"><?php echo e($loan->disbursed_at->format('M d, Y H:i')); ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="flex justify-between py-2 border-b border-border">
                        <span class="text-sm text-content-muted">Monthly Income</span>
                        <span class="text-sm text-content-secondary"><?php echo e($loan->monthly_income); ?></span>
                    </div>
                    <div class="flex justify-between py-2">
                        <span class="text-sm text-content-muted">Purpose</span>
                        <span class="text-sm text-content-secondary"><?php echo e($loan->purpose); ?></span>
                    </div>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            <div class="space-y-6">
                
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                    <h3 class="text-lg font-semibold text-content mb-4">Applicant</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between py-2 border-b border-border">
                            <span class="text-sm text-content-muted">Name</span>
                            <span class="text-sm font-medium text-content"><?php echo e($loan->user->name ?? 'N/A'); ?></span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-border">
                            <span class="text-sm text-content-muted">Email</span>
                            <span class="text-sm text-content-secondary"><?php echo e($loan->user->email ?? 'N/A'); ?></span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-sm text-content-muted">Account Balance</span>
                            <span class="text-sm font-medium text-content"><?php echo e($settings->currency); ?><?php echo e(number_format($loan->user->account_bal ?? 0, 2)); ?></span>
                        </div>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                
                <?php if($eligibility): ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                    <h3 class="text-lg font-semibold text-content mb-4">Eligibility Checks</h3>
                    <div class="space-y-2">
                        <?php $__currentLoopData = $eligibility; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $check): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-center gap-3 py-2 <?php echo e(!$loop->last ? 'border-b border-border' : ''); ?>">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => $check['passed'] ? 'success' : 'danger']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($check['passed'] ? 'success' : 'danger')]); ?>
                                <?php echo e($check['passed'] ? 'PASS' : 'FAIL'); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <span class="text-sm text-content"><?php echo e($check['label']); ?></span>
                            <span class="text-xs text-content-muted ml-auto"><?php echo e($check['detail']); ?></span>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endif; ?>

                
                <?php if($loan->status === 'pending'): ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                    <h3 class="text-lg font-semibold text-content mb-4">Actions</h3>

                    
                    <form action="<?php echo e(route('admin.loans.approve', $loan)); ?>" method="POST" class="mb-5">
                        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Approved Amount','for' => 'approved_amount','helper' => 'Leave blank for requested amount']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Approved Amount','for' => 'approved_amount','helper' => 'Leave blank for requested amount']); ?>
                            <input type="number" step="0.01" id="approved_amount" name="approved_amount" placeholder="<?php echo e(number_format($loan->amount, 2)); ?>"
                                   class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors">
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <button type="submit"
                                class="mt-3 bg-success-light text-success hover:opacity-80 rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                            Approve & Disburse
                        </button>
                    </form>

                    <div class="border-t border-border pt-5">
                        
                        <form action="<?php echo e(route('admin.loans.reject', $loan)); ?>" method="POST">
                            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Rejection Reason','for' => 'rejection_reason','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Rejection Reason','for' => 'rejection_reason','required' => true]); ?>
                                <textarea id="rejection_reason" name="rejection_reason" rows="3" required
                                          class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors min-h-[80px] resize-y"></textarea>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <button type="submit"
                                    class="mt-3 bg-danger text-white hover:bg-danger/90 rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                                Reject Application
                            </button>
                        </form>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endif; ?>

                
                <?php if(in_array($loan->status, ['active', 'repaying'])): ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                    <h3 class="text-lg font-semibold text-content mb-4">Risk Actions</h3>
                    <form action="<?php echo e(route('admin.loans.default', $loan)); ?>" method="POST"
                          onsubmit="return confirm('Are you sure you want to mark this loan as defaulted?');">
                        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                        <button type="submit"
                                class="bg-danger text-white hover:bg-danger/90 rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                            Mark as Defaulted
                        </button>
                    </form>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

        
        <?php if($loan->repaymentSchedules->count() > 0): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <h3 class="text-lg font-semibold text-content mb-4">Repayment Schedule</h3>

            <?php if($loan->total_repayable > 0): ?>
            <div class="w-full bg-surface-alt rounded-full h-4 mb-5 overflow-hidden">
                <div class="bg-success h-4 rounded-full flex items-center justify-center text-[10px] font-medium text-white transition-all"
                     style="width: <?php echo e(min($loan->progress_percentage, 100)); ?>%">
                    <?php echo e($loan->progress_percentage); ?>%
                </div>
            </div>
            <?php endif; ?>

            <div class="overflow-x-auto rounded-xl border border-border">
                <table class="w-full">
                    <thead>
                        <tr class="bg-surface-alt">
                            <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">#</th>
                            <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Due Date</th>
                            <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Principal</th>
                            <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Interest</th>
                            <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Total</th>
                            <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Late Fee</th>
                            <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Paid</th>
                            <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Status</th>
                            <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Paid At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $loan->repaymentSchedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b border-border last:border-0 <?php echo e($schedule->status === 'overdue' ? 'bg-danger-light/30' : ($schedule->status === 'paid' ? 'bg-success-light/30' : '')); ?> hover:bg-surface-alt/50 transition-colors">
                            <td class="px-4 py-3.5 text-sm text-content-secondary"><?php echo e($schedule->installment_number); ?></td>
                            <td class="px-4 py-3.5 text-sm text-content-secondary"><?php echo e($schedule->due_date->format('M d, Y')); ?></td>
                            <td class="px-4 py-3.5 text-sm text-content-secondary"><?php echo e($settings->currency); ?><?php echo e(number_format($schedule->principal_amount, 2)); ?></td>
                            <td class="px-4 py-3.5 text-sm text-content-secondary"><?php echo e($settings->currency); ?><?php echo e(number_format($schedule->interest_amount, 2)); ?></td>
                            <td class="px-4 py-3.5 text-sm font-medium text-content"><?php echo e($settings->currency); ?><?php echo e(number_format($schedule->total_amount, 2)); ?></td>
                            <td class="px-4 py-3.5 text-sm text-content-secondary"><?php echo e($schedule->late_fee > 0 ? $settings->currency . number_format($schedule->late_fee, 2) : '—'); ?></td>
                            <td class="px-4 py-3.5 text-sm text-content-secondary"><?php echo e($schedule->paid_amount > 0 ? $settings->currency . number_format($schedule->paid_amount, 2) : '—'); ?></td>
                            <td class="px-4 py-3.5">
                                <?php
                                    $schedType = match($schedule->status) {
                                        'paid' => 'success',
                                        'overdue' => 'danger',
                                        'due' => 'warning',
                                        'partial' => 'info',
                                        default => 'neutral',
                                    };
                                ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => $schedType]]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($schedType)]); ?><?php echo e(ucfirst($schedule->status)); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </td>
                            <td class="px-4 py-3.5 text-sm text-content-muted"><?php echo e($schedule->paid_at ? $schedule->paid_at->format('M d, Y') : '—'); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\loans\show.blade.php ENDPATH**/ ?>