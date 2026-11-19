
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
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.error-alert','data' => []]); ?>
<?php $component->withName('error-alert'); ?>
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

    
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-content-primary">Apply for a Loan</h2>
            <p class="text-sm text-content-secondary mt-1">Choose a plan, enter your details, and preview your repayment</p>
        </div>
        <a href="<?php echo e(route('loans.my')); ?>" class="px-4 py-2 rounded-lg bg-surface-overlay border border-surface-border text-content-secondary hover:text-content-primary text-sm font-medium transition-colors">
            My Loans
        </a>
    </div>

    
    <?php if($errors->any()): ?>
        <div class="mb-6 rounded-xl bg-loss/10 border border-loss/20 p-4">
            <ul class="list-disc list-inside text-sm text-loss space-y-1">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if($plans->isEmpty()): ?>
        <div class="rounded-xl bg-surface-raised border border-surface-border p-8 text-center">
            <p class="text-content-tertiary">No loan plans are currently available. Please check back later.</p>
        </div>
    <?php else: ?>
    <div x-data="loanCalculator()" class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        
        <div class="lg:col-span-2 space-y-4">
            <h3 class="text-sm font-semibold text-content-secondary uppercase tracking-wider">Available Plans</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div @click="selectPlan(<?php echo e($plan->toJson()); ?>)"
                     :class="selectedPlan && selectedPlan.id === <?php echo e($plan->id); ?> ? 'ring-2 ring-primary border-primary' : 'border-surface-border hover:border-primary/50'"
                     class="cursor-pointer rounded-xl bg-surface-raised border p-5 transition-all">
                    <div class="flex items-start justify-between mb-3">
                        <h4 class="font-semibold text-content-primary"><?php echo e($plan->name); ?></h4>
                        <span class="text-xs font-medium px-2 py-1 rounded-full bg-primary-subtle text-primary">
                            <?php echo e($plan->interest_rate); ?>% <?php echo e(ucfirst($plan->interest_type)); ?>

                        </span>
                    </div>
                    <?php if($plan->description): ?>
                        <p class="text-xs text-content-tertiary mb-3"><?php echo e($plan->description); ?></p>
                    <?php endif; ?>
                    <div class="grid grid-cols-2 gap-2 text-xs">
                        <div>
                            <span class="text-content-tertiary">Amount:</span>
                            <span class="text-content-secondary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($plan->min_amount); ?> – <?php echo e(number_format($plan->max_amount)); ?></span>
                        </div>
                        <div>
                            <span class="text-content-tertiary">Duration:</span>
                            <span class="text-content-secondary"><?php echo e($plan->min_duration); ?> – <?php echo e($plan->max_duration); ?> mo</span>
                        </div>
                        <div>
                            <span class="text-content-tertiary">Fee:</span>
                            <span class="text-content-secondary"><?php echo e($plan->processing_fee); ?>%</span>
                        </div>
                        <div>
                            <span class="text-content-tertiary">Min Balance:</span>
                            <span class="text-content-secondary"><?php echo \App\Helpers\CurrencyHelper::formatForUser($plan->min_account_balance); ?></span>
                        </div>
                    </div>
                    <?php if($plan->requires_collateral): ?>
                        <div class="mt-2 text-xs text-warning">
                            Requires <?php echo e($plan->collateral_percentage); ?>% collateral
                        </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            
            <div x-show="selectedPlan" x-cloak class="rounded-xl bg-surface-raised border border-surface-border p-6">
                <h3 class="text-sm font-semibold text-content-secondary uppercase tracking-wider mb-4">Loan Details</h3>
                <form action="<?php echo e(route('loans.store')); ?>" method="POST" class="space-y-4">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="loan_plan_id" :value="selectedPlan ? selectedPlan.id : ''">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-content-secondary mb-1">Loan Amount (<?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?>)</label>
                            <input type="number" name="amount" x-model="amount" @input.debounce.300ms="fetchPreview()"
                                   :min="selectedPlan ? selectedPlan.min_amount : 0"
                                   :max="selectedPlan ? selectedPlan.max_amount : 0"
                                   step="0.01" required
                                   class="w-full px-3 py-2.5 rounded-lg bg-surface-overlay border border-surface-border text-content-primary text-sm placeholder-content-tertiary focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary"
                                   :placeholder="selectedPlan ? 'Min: ' + Number(selectedPlan.min_amount).toLocaleString() : ''">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-content-secondary mb-1">Duration (Months)</label>
                            <input type="number" name="duration" x-model="duration" @input.debounce.300ms="fetchPreview()"
                                   :min="selectedPlan ? selectedPlan.min_duration : 1"
                                   :max="selectedPlan ? selectedPlan.max_duration : 60"
                                   required
                                   class="w-full px-3 py-2.5 rounded-lg bg-surface-overlay border border-surface-border text-content-primary text-sm placeholder-content-tertiary focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary"
                                   :placeholder="selectedPlan ? selectedPlan.min_duration + ' – ' + selectedPlan.max_duration + ' months' : ''">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-content-secondary mb-1">Purpose of Loan</label>
                        <textarea name="purpose" rows="3" required
                                  class="w-full px-3 py-2.5 rounded-lg bg-surface-overlay border border-surface-border text-content-primary text-sm placeholder-content-tertiary focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary"
                                  placeholder="Describe why you need this loan..."></textarea>
                    </div>

                    <button type="submit" :disabled="!previewLoaded"
                            class="w-full py-2.5 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-semibold transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                        Submit Application
                    </button>
                </form>
            </div>
        </div>

        
        <div class="space-y-4">
            <h3 class="text-sm font-semibold text-content-secondary uppercase tracking-wider">Repayment Preview</h3>
            <div class="rounded-xl bg-surface-raised border border-surface-border p-5 sticky top-4">
                <template x-if="!selectedPlan">
                    <p class="text-sm text-content-tertiary text-center py-4">Select a loan plan to see the preview.</p>
                </template>
                <template x-if="selectedPlan && !previewLoaded">
                    <div class="text-center py-4">
                        <p class="text-sm text-content-tertiary" x-show="loading">Calculating...</p>
                        <p class="text-sm text-content-tertiary" x-show="!loading && !previewLoaded">Enter amount and duration to see preview.</p>
                    </div>
                </template>
                <template x-if="selectedPlan && previewLoaded">
                    <div class="space-y-3">
                        <div class="text-center pb-3 border-b border-surface-border">
                            <p class="text-xs text-content-tertiary">Monthly Payment</p>
                            <p class="text-2xl font-bold text-primary"><?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?><span x-text="Number(preview.monthly_payment).toLocaleString(undefined, {minimumFractionDigits:2, maximumFractionDigits:2})"></span></p>
                        </div>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-content-tertiary">Loan Amount</span>
                                <span class="text-content-primary font-medium"><?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?><span x-text="Number(amount).toLocaleString(undefined, {minimumFractionDigits:2, maximumFractionDigits:2})"></span></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-content-tertiary">Interest (<span x-text="preview.interest_rate"></span>% <span x-text="preview.interest_type"></span>)</span>
                                <span class="text-content-primary font-medium"><?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?><span x-text="Number(preview.total_interest).toLocaleString(undefined, {minimumFractionDigits:2, maximumFractionDigits:2})"></span></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-content-tertiary">Processing Fee</span>
                                <span class="text-content-primary font-medium"><?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?><span x-text="Number(preview.processing_fee).toLocaleString(undefined, {minimumFractionDigits:2, maximumFractionDigits:2})"></span></span>
                            </div>
                            <div class="flex justify-between pt-2 border-t border-surface-border">
                                <span class="text-content-secondary font-semibold">Total Repayable</span>
                                <span class="text-content-primary font-bold"><?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?><span x-text="Number(preview.total_repayable).toLocaleString(undefined, {minimumFractionDigits:2, maximumFractionDigits:2})"></span></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-content-tertiary">Duration</span>
                                <span class="text-content-primary font-medium"><span x-text="duration"></span> months</span>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            
            <div class="rounded-xl bg-surface-raised border border-surface-border p-5">
                <h4 class="text-xs font-semibold text-content-tertiary uppercase tracking-wider mb-3">Your Account</h4>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-content-tertiary">Balance</span>
                        <span class="text-content-primary font-medium"><?php echo \App\Helpers\CurrencyHelper::formatForUser(Auth::user()->account_bal); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function loanCalculator() {
        return {
            selectedPlan: null,
            amount: '',
            duration: '',
            preview: {},
            previewLoaded: false,
            loading: false,

            selectPlan(plan) {
                this.selectedPlan = plan;
                this.amount = '';
                this.duration = '';
                this.preview = {};
                this.previewLoaded = false;
            },

            async fetchPreview() {
                if (!this.selectedPlan || !this.amount || !this.duration) {
                    this.previewLoaded = false;
                    return;
                }
                this.loading = true;
                try {
                    const resp = await fetch('<?php echo e(route("loans.calculate")); ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({
                            loan_plan_id: this.selectedPlan.id,
                            amount: this.amount,
                            duration: this.duration,
                        }),
                    });
                    if (resp.ok) {
                        this.preview = await resp.json();
                        this.previewLoaded = true;
                    } else {
                        this.previewLoaded = false;
                    }
                } catch (e) {
                    this.previewLoaded = false;
                }
                this.loading = false;
            }
        }
    }
    </script>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\loans\apply.blade.php ENDPATH**/ ?>