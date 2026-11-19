
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<div class="space-y-6">

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => ''.e($company ? 'Holdings: ' . $company->name : 'All Pre-IPO Holdings').'','subtitle' => ''.e($company ? $company->symbol . ' — ' . number_format($company->shares_sold) . ' shares sold' : 'Cross-company shareholder overview').'']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e($company ? 'Holdings: ' . $company->name : 'All Pre-IPO Holdings').'','subtitle' => ''.e($company ? $company->symbol . ' — ' . number_format($company->shares_sold) . ' shares sold' : 'Cross-company shareholder overview').'']); ?>
         <?php $__env->slot('actions', null, []); ?> 
            <?php if($company): ?>
                <a href="<?php echo e(route('admin.pre-ipo.show', $company->id)); ?>"
                   class="bg-surface-alt text-content border border-border hover:bg-border rounded-lg px-4 py-2 text-sm font-medium transition-colors inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" /></svg>
                    Back to Company
                </a>
            <?php endif; ?>
            <a href="<?php echo e(route('admin.pre-ipo.index')); ?>"
               class="bg-surface-alt text-content border border-border hover:bg-border rounded-lg px-4 py-2 text-sm font-medium transition-colors inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6z" /></svg>
                All Companies
            </a>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.table-card','data' => ['title' => 'Holdings ('.e($holdings->total()).')']]); ?>
<?php $component->withName('admin.table-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Holdings ('.e($holdings->total()).')']); ?>
        <table class="w-full">
            <thead>
                <tr class="bg-surface-alt">
                    <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">User</th>
                    <?php if(!$company): ?>
                        <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-left">Company</th>
                    <?php endif; ?>
                    <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-right">Shares</th>
                    <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-right">Avg Cost</th>
                    <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-right">Total Invested</th>
                    <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-right">Current Value</th>
                    <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-right">P/L</th>
                    <th class="px-4 py-3 text-xs font-medium text-content-muted uppercase tracking-wide text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $holdings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $holding): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-b border-border last:border-0 hover:bg-surface-alt/50 transition-colors">
                        <td class="px-4 py-3.5">
                            <div class="text-sm font-medium text-content"><?php echo e($holding->user->name ?? 'N/A'); ?></div>
                            <div class="text-xs text-content-muted"><?php echo e($holding->user->email ?? ''); ?></div>
                        </td>
                        <?php if(!$company): ?>
                            <td class="px-4 py-3.5">
                                <a href="<?php echo e(route('admin.pre-ipo.show', $holding->pre_ipo_company_id)); ?>" class="text-sm text-primary hover:underline">
                                    <?php echo e($holding->company->name ?? 'N/A'); ?>

                                </a>
                            </td>
                        <?php endif; ?>
                        <td class="px-4 py-3.5 text-sm font-medium text-content text-right"><?php echo e(number_format($holding->shares)); ?></td>
                        <td class="px-4 py-3.5 text-sm text-content-secondary text-right">$<?php echo e(number_format($holding->purchase_price, 2)); ?></td>
                        <td class="px-4 py-3.5 text-sm text-content-secondary text-right">$<?php echo e(number_format($holding->total_cost, 2)); ?></td>
                        <td class="px-4 py-3.5 text-sm font-medium text-content text-right">$<?php echo e(number_format($holding->current_value, 2)); ?></td>
                        <td class="px-4 py-3.5 text-sm font-medium text-right <?php echo e($holding->unrealized_pnl >= 0 ? 'text-success' : 'text-danger'); ?>">
                            <?php echo e($holding->unrealized_pnl >= 0 ? '+' : ''); ?>$<?php echo e(number_format($holding->unrealized_pnl, 2)); ?>

                            <span class="text-xs">(<?php echo e($holding->unrealized_pnl_percent >= 0 ? '+' : ''); ?><?php echo e($holding->unrealized_pnl_percent); ?>%)</span>
                        </td>
                        <td class="px-4 py-3.5 text-center">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => $holding->status === 'active' ? 'success' : 'info']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($holding->status === 'active' ? 'success' : 'info')]); ?><?php echo e(ucfirst($holding->status)); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="<?php echo e($company ? 7 : 8); ?>" class="py-12 text-center text-content-muted">
                            No holdings found.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <?php if($holdings->hasPages()): ?>
            <div class="px-4 py-3 border-t border-border"><?php echo e($holdings->links()); ?></div>
        <?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\pre-ipo\holdings.blade.php ENDPATH**/ ?>