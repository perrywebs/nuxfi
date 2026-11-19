
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

    
    <?php echo $__env->make('user.partials.page-header', ['title' => 'Support Tickets', 'subtitle' => 'View and manage your support conversations'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="max-w-4xl mx-auto">
        
        <div class="flex justify-end mb-4">
            <a href="<?php echo e(route('support.create')); ?>"
               class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-semibold transition-colors">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'plus','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'plus','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                New Ticket
            </a>
        </div>

        <?php if($tickets->count() > 0): ?>
            <div class="space-y-3">
                <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('support.show', $ticket->ticket_id)); ?>"
                       class="block rounded-xl bg-surface-raised border border-surface-border p-5 hover:border-primary/40 transition-colors group">
                        <div class="flex items-start justify-between gap-4">
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="text-xs font-mono text-content-tertiary"><?php echo e($ticket->ticket_id); ?></span>
                                    <?php if($ticket->status === 'open'): ?>
                                        <span class="inline-flex items-center text-xs font-medium px-2 py-0.5 rounded-full bg-warning/10 text-warning">Open</span>
                                    <?php elseif($ticket->status === 'answered'): ?>
                                        <span class="inline-flex items-center text-xs font-medium px-2 py-0.5 rounded-full bg-gain/10 text-gain">Answered</span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center text-xs font-medium px-2 py-0.5 rounded-full bg-content-tertiary/10 text-content-tertiary">Closed</span>
                                    <?php endif; ?>
                                    <?php if($ticket->priority === 'high'): ?>
                                        <span class="inline-flex items-center text-xs font-medium px-2 py-0.5 rounded-full bg-loss/10 text-loss">High</span>
                                    <?php endif; ?>
                                </div>
                                <h3 class="text-sm font-semibold text-content-primary group-hover:text-primary transition-colors truncate">
                                    <?php echo e($ticket->subject); ?>

                                </h3>
                                <?php if($ticket->latestMessage): ?>
                                    <p class="text-xs text-content-tertiary mt-1 truncate">
                                        <?php echo e($ticket->latestMessage->sender_type === 'admin' ? 'Admin: ' : 'You: '); ?><?php echo e(Str::limit($ticket->latestMessage->message, 80)); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="text-right shrink-0">
                                <p class="text-xs text-content-tertiary"><?php echo e($ticket->updated_at->diffForHumans()); ?></p>
                                <p class="text-xs text-content-tertiary mt-0.5"><?php echo e($ticket->messages()->count()); ?> <?php echo e(Str::plural('message', $ticket->messages()->count())); ?></p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="mt-6">
                <?php echo e($tickets->links()); ?>

            </div>
        <?php else: ?>
            <div class="rounded-xl bg-surface-raised border border-surface-border p-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-primary/10 mb-4">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'chat-bubble-left-right','class' => 'w-7 h-7 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'chat-bubble-left-right','class' => 'w-7 h-7 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
                <h3 class="text-lg font-semibold text-content-primary mb-2">No Support Tickets</h3>
                <p class="text-sm text-content-secondary mb-4">You haven't created any support tickets yet.</p>
                <a href="<?php echo e(route('support.create')); ?>"
                   class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-semibold transition-colors">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'plus','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'plus','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    Create Your First Ticket
                </a>
            </div>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\support\index.blade.php ENDPATH**/ ?>