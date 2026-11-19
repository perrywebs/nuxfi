
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'Exchange Rates','subtitle' => 'Manage currency exchange rates for user-selected currencies']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Exchange Rates','subtitle' => 'Manage currency exchange rates for user-selected currencies']); ?>
    <div class="flex items-center gap-3">
        <button onclick="fetchAllRates()" id="fetchBtn"
            class="inline-flex items-center gap-2 px-4 py-2 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg text-sm font-medium transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182M4.031 9.865l13.803-3.7" />
            </svg>
            Fetch Latest Rates
        </button>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>


<div class="mb-4">
    <form method="GET" action="<?php echo e(route('admin.exchange-rates.index')); ?>" class="flex items-center gap-3">
        <input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Search currency code or name..."
            class="w-full max-w-sm bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
        <button type="submit"
            class="px-4 py-2 bg-surface-alt text-content-secondary hover:text-content rounded-lg text-sm font-medium border border-border transition-colors">
            Search
        </button>
        <?php if($search): ?>
            <a href="<?php echo e(route('admin.exchange-rates.index')); ?>"
                class="px-4 py-2 text-content-muted hover:text-content text-sm transition-colors">
                Clear
            </a>
        <?php endif; ?>
    </form>
</div>


<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.table-card','data' => ['title' => 'Currency Exchange Rates','subtitle' => ''.e($rates->total()).' currencies']]); ?>
<?php $component->withName('admin.table-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Currency Exchange Rates','subtitle' => ''.e($rates->total()).' currencies']); ?>
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-border text-left">
                <th class="pb-3 font-medium text-content-secondary">Code</th>
                <th class="pb-3 font-medium text-content-secondary">Symbol</th>
                <th class="pb-3 font-medium text-content-secondary">Currency Name</th>
                <th class="pb-3 font-medium text-content-secondary">Rate (1 USD =)</th>
                <th class="pb-3 font-medium text-content-secondary">Source</th>
                <th class="pb-3 font-medium text-content-secondary">Status</th>
                <th class="pb-3 font-medium text-content-secondary">Last Updated</th>
                <th class="pb-3 font-medium text-content-secondary text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-border">
            <?php $__currentLoopData = $rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="hover:bg-surface-alt/50 transition-colors" id="rate-row-<?php echo e($rate->id); ?>">
                <td class="py-3 font-mono font-semibold text-content"><?php echo e($rate->currency_code); ?></td>
                <td class="py-3 text-content text-lg"><?php echo $rate->currency_symbol; ?></td>
                <td class="py-3 text-content-secondary"><?php echo e($rate->currency_name ?? '—'); ?></td>
                <td class="py-3">
                    <div class="flex items-center gap-2">
                        <input type="number" step="0.000001" min="0.000001"
                            id="rate-input-<?php echo e($rate->id); ?>"
                            value="<?php echo e($rate->rate_to_usd); ?>"
                            class="w-32 bg-surface-card border border-border rounded-lg px-2.5 py-1.5 text-sm text-content font-mono focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                        <button onclick="updateRate(<?php echo e($rate->id); ?>)"
                            class="p-1.5 text-primary hover:bg-primary-light rounded-lg transition-colors" title="Save rate">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </button>
                    </div>
                </td>
                <td class="py-3">
                    <?php if($rate->is_manual): ?>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-warning-light text-warning">Manual</span>
                    <?php else: ?>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-success-light text-success">API</span>
                    <?php endif; ?>
                </td>
                <td class="py-3">
                    <?php if($rate->is_active): ?>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-success-light text-success">Active</span>
                    <?php else: ?>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-danger-light text-danger">Disabled</span>
                    <?php endif; ?>
                </td>
                <td class="py-3 text-content-muted text-xs"><?php echo e($rate->updated_at ? $rate->updated_at->diffForHumans() : '—'); ?></td>
                <td class="py-3 text-right">
                    <div class="flex items-center justify-end gap-1">
                        <?php if($rate->is_manual): ?>
                            <button onclick="resetRate(<?php echo e($rate->id); ?>)"
                                class="p-1.5 text-info hover:bg-info-light rounded-lg transition-colors" title="Reset to API rate">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182M4.031 9.865l13.803-3.7" />
                                </svg>
                            </button>
                        <?php endif; ?>
                        <button onclick="toggleActive(<?php echo e($rate->id); ?>)"
                            class="p-1.5 <?php echo e($rate->is_active ? 'text-danger hover:bg-danger-light' : 'text-success hover:bg-success-light'); ?> rounded-lg transition-colors"
                            title="<?php echo e($rate->is_active ? 'Disable' : 'Enable'); ?>">
                            <?php if($rate->is_active): ?>
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            <?php else: ?>
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            <?php endif; ?>
                        </button>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="mt-4 pt-4 border-t border-border">
        <?php echo e($rates->appends(['search' => $search])->links()); ?>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<?php $__env->startPush('scripts'); ?>
<script>
function updateRate(id) {
    const rateInput = document.getElementById('rate-input-' + id);
    const rate = rateInput.value;

    $.ajax({
        url: '/admin/dashboard/settings/exchange-rates/' + id,
        type: 'PUT',
        data: { _token: '<?php echo e(csrf_token()); ?>', rate_to_usd: rate },
        success: function(response) {
            if (response.status === 200) {
                Swal.fire({ icon: 'success', title: 'Updated', text: response.success, timer: 2000, showConfirmButton: false });
                location.reload();
            }
        },
        error: function(xhr) {
            Swal.fire({ icon: 'error', title: 'Error', text: 'Failed to update rate' });
        }
    });
}

function toggleActive(id) {
    $.ajax({
        url: '/admin/dashboard/settings/exchange-rates/' + id + '/toggle',
        type: 'POST',
        data: { _token: '<?php echo e(csrf_token()); ?>' },
        success: function(response) {
            if (response.status === 200) {
                Swal.fire({ icon: 'success', title: 'Updated', text: response.success, timer: 2000, showConfirmButton: false });
                location.reload();
            }
        },
        error: function(xhr) {
            Swal.fire({ icon: 'error', title: 'Error', text: 'Failed to toggle status' });
        }
    });
}

function fetchAllRates() {
    const btn = document.getElementById('fetchBtn');
    btn.disabled = true;
    btn.innerHTML = '<svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg> Fetching...';

    $.ajax({
        url: '<?php echo e(route("admin.exchange-rates.fetch")); ?>',
        type: 'POST',
        data: { _token: '<?php echo e(csrf_token()); ?>' },
        success: function(response) {
            if (response.status === 200) {
                Swal.fire({ icon: 'success', title: 'Rates Updated', text: response.success, timer: 3000, showConfirmButton: false });
                location.reload();
            } else {
                Swal.fire({ icon: 'warning', title: 'Partial Update', text: response.message });
                btn.disabled = false;
                btn.innerHTML = 'Fetch Latest Rates';
            }
        },
        error: function(xhr) {
            Swal.fire({ icon: 'error', title: 'Error', text: 'Failed to fetch rates from API' });
            btn.disabled = false;
            btn.innerHTML = 'Fetch Latest Rates';
        }
    });
}

function resetRate(id) {
    Swal.fire({
        title: 'Reset to API Rate?',
        text: 'This will remove the manual override and fetch the latest rate from the API.',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#0d9488',
        confirmButtonText: 'Yes, reset it'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/admin/dashboard/settings/exchange-rates/' + id + '/reset',
                type: 'POST',
                data: { _token: '<?php echo e(csrf_token()); ?>' },
                success: function(response) {
                    if (response.status === 200) {
                        Swal.fire({ icon: 'success', title: 'Reset', text: response.success, timer: 2000, showConfirmButton: false });
                        location.reload();
                    }
                },
                error: function(xhr) {
                    Swal.fire({ icon: 'error', title: 'Error', text: 'Failed to reset rate' });
                }
            });
        }
    });
}
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\Settings\ExchangeRates\index.blade.php ENDPATH**/ ?>