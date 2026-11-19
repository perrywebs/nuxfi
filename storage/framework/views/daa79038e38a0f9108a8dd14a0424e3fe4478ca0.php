
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

    
    <?php echo $__env->make('user.partials.page-header', ['title' => 'Fund Transfer', 'subtitle' => 'Send funds to another user on the platform'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="max-w-2xl mx-auto">
        
        <div class="rounded-xl bg-surface-raised border border-surface-border p-5 mb-6 flex items-center justify-center gap-4">
            <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'banknotes','class' => 'w-6 h-6 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'banknotes','class' => 'w-6 h-6 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
            <div>
                <p class="text-2xl font-bold text-content-primary">
                    <?php echo \App\Helpers\CurrencyHelper::formatForUser(Auth::user()->account_bal); ?>
                </p>
                <p class="text-xs text-content-tertiary">Your Account Balance</p>
            </div>
        </div>

        
        <div class="rounded-xl bg-surface-raised border border-surface-border p-6" x-data="transferForm()">
            <form @submit.prevent="submitTransfer()" id="transferform">
                <?php echo csrf_field(); ?>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-content-primary mb-1.5">
                            Recipient Email or Username <span class="text-loss">*</span>
                        </label>
                        <input type="text" name="email" required
                               class="w-full px-4 py-2.5 rounded-lg bg-surface-overlay border border-surface-border text-content-primary text-sm placeholder-content-tertiary focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary transition-colors"
                               placeholder="Enter recipient email or username">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-content-primary mb-1.5">
                            Amount (<?php echo \App\Helpers\CurrencyHelper::getUserSymbol(); ?>) <span class="text-loss">*</span>
                        </label>
                        <input type="number" name="amount" min="<?php echo e($moresettings->min_transfer); ?>" required
                               class="w-full px-4 py-2.5 rounded-lg bg-surface-overlay border border-surface-border text-content-primary text-sm placeholder-content-tertiary focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary transition-colors"
                               placeholder="Enter amount you want to transfer">
                    </div>

                    <div class="flex items-center gap-2 p-3 rounded-lg bg-warning/10 border border-warning/20">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'information-circle','class' => 'w-5 h-5 text-warning flex-shrink-0']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'information-circle','class' => 'w-5 h-5 text-warning flex-shrink-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <span class="text-sm text-warning">Transfer Charges: <strong><?php echo e($moresettings->transfer_charges); ?>%</strong></span>
                    </div>

                    <input type="hidden" name="password" x-ref="acntpass">

                    <button type="submit" :disabled="loading"
                            class="w-full py-2.5 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-semibold transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                        <span x-show="!loading">Proceed</span>
                        <span x-show="loading" class="flex items-center justify-center gap-2">
                            <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                            Processing...
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
function transferForm() {
    return {
        loading: false,
        async submitTransfer() {
            const { value: password } = await Swal.fire({
                title: 'Confirm Transfer',
                input: 'password',
                inputLabel: 'Enter your account password to complete transfer',
                inputPlaceholder: 'Enter your account password',
                background: '#161A1E',
                color: '#E8EAED',
                confirmButtonColor: '#059669',
                showCancelButton: true,
                cancelButtonColor: '#2A2F36'
            });

            if (!password) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Password is required',
                    icon: 'error',
                    background: '#161A1E',
                    color: '#E8EAED',
                    confirmButtonColor: '#059669'
                });
                return;
            }

            this.$refs.acntpass.value = password;
            this.loading = true;

            const form = document.getElementById('transferform');
            const formData = new FormData(form);

            try {
                const res = await fetch("<?php echo e(route('transfertouser')); ?>", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: formData
                });
                const data = await res.json();

                if (data.status === 200) {
                    Swal.fire({
                        title: 'Success!',
                        text: data.message,
                        icon: 'success',
                        background: '#161A1E',
                        color: '#E8EAED',
                        confirmButtonColor: '#059669'
                    });
                    setTimeout(() => {
                        window.location.href = "<?php echo e(url('/dashboard/transfer-funds')); ?>";
                    }, 3000);
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: data.message,
                        icon: 'error',
                        background: '#161A1E',
                        color: '#E8EAED',
                        confirmButtonColor: '#059669'
                    });
                }
            } catch (err) {
                console.error(err);
                Swal.fire({
                    title: 'Error!',
                    text: 'An unexpected error occurred.',
                    icon: 'error',
                    background: '#161A1E',
                    color: '#E8EAED',
                    confirmButtonColor: '#059669'
                });
            } finally {
                this.loading = false;
            }
        }
    };
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\transfer.blade.php ENDPATH**/ ?>