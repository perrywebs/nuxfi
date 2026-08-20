<div class="bg-surface-raised border border-surface-border rounded-xl p-5">
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-2">
            <h3 class="text-sm font-semibold text-content-primary">Support</h3>
            <?php if($openTicketCount > 0): ?>
                <span class="min-w-[18px] h-[18px] flex items-center justify-center bg-loss text-white text-[10px] font-bold rounded-full px-1"><?php echo e($openTicketCount); ?></span>
            <?php endif; ?>
        </div>
        <a href="<?php echo e(route('support.create')); ?>" class="inline-flex items-center gap-1 text-xs font-medium text-primary hover:text-primary-dark transition-colors">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'plus','class' => 'w-3.5 h-3.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'plus','class' => 'w-3.5 h-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?> New Ticket
        </a>
    </div>

    <?php if($recentTickets->count() > 0): ?>
        <div class="space-y-2">
            <?php $__currentLoopData = $recentTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('support.show', $ticket->ticket_id)); ?>"
                   class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg bg-surface-overlay hover:bg-surface-border/40 transition-colors group">
                    <div class="min-w-0 flex-1">
                        <p class="text-xs font-medium text-content-primary truncate group-hover:text-primary transition-colors"><?php echo e($ticket->subject); ?></p>
                        <p class="text-[10px] text-content-tertiary mt-0.5"><?php echo e($ticket->ticket_id); ?> · <?php echo e($ticket->updated_at->diffForHumans()); ?></p>
                    </div>
                    <?php if($ticket->status === 'answered'): ?>
                        <span class="shrink-0 inline-flex items-center text-[10px] font-medium px-1.5 py-0.5 rounded-full bg-gain/10 text-gain">Reply</span>
                    <?php elseif($ticket->status === 'open'): ?>
                        <span class="shrink-0 inline-flex items-center text-[10px] font-medium px-1.5 py-0.5 rounded-full bg-warning/10 text-warning">Open</span>
                    <?php else: ?>
                        <span class="shrink-0 inline-flex items-center text-[10px] font-medium px-1.5 py-0.5 rounded-full bg-content-tertiary/10 text-content-tertiary">Closed</span>
                    <?php endif; ?>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <a href="<?php echo e(route('support')); ?>" class="block text-center text-xs text-primary hover:text-primary-dark mt-3 transition-colors">View all tickets</a>
    <?php else: ?>
        <div class="text-center py-4">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'chat-bubble-left-right','class' => 'w-8 h-8 text-content-tertiary mx-auto mb-2']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'chat-bubble-left-right','class' => 'w-8 h-8 text-content-tertiary mx-auto mb-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <p class="text-xs text-content-tertiary mb-3">Need help? Open a support ticket.</p>
            <a href="<?php echo e(route('support.create')); ?>"
               class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-xs font-semibold transition-colors">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'plus','class' => 'w-3.5 h-3.5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'plus','class' => 'w-3.5 h-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?> Create Ticket
            </a>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/user/partials/support-widget.blade.php ENDPATH**/ ?>