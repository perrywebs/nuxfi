
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

    
    <?php echo $__env->make('user.partials.page-header', ['title' => $ticket->subject, 'subtitle' => "Ticket {$ticket->ticket_id}"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="max-w-3xl mx-auto">
        
        <div class="mb-4">
            <a href="<?php echo e(route('support')); ?>" class="inline-flex items-center gap-1 text-sm text-content-tertiary hover:text-primary transition-colors">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'arrow-left','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'arrow-left','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                Back to Tickets
            </a>
        </div>

        
        <div class="rounded-xl bg-surface-raised border border-surface-border p-4 mb-4 flex flex-wrap items-center gap-4 text-sm">
            <div>
                <span class="text-content-tertiary">Status:</span>
                <?php if($ticket->status === 'open'): ?>
                    <span class="inline-flex items-center text-xs font-medium px-2 py-0.5 rounded-full bg-warning/10 text-warning ml-1">Open</span>
                <?php elseif($ticket->status === 'answered'): ?>
                    <span class="inline-flex items-center text-xs font-medium px-2 py-0.5 rounded-full bg-gain/10 text-gain ml-1">Answered</span>
                <?php else: ?>
                    <span class="inline-flex items-center text-xs font-medium px-2 py-0.5 rounded-full bg-content-tertiary/10 text-content-tertiary ml-1">Closed</span>
                <?php endif; ?>
            </div>
            <div>
                <span class="text-content-tertiary">Priority:</span>
                <span class="text-content-primary font-medium ml-1 capitalize"><?php echo e($ticket->priority); ?></span>
            </div>
            <div>
                <span class="text-content-tertiary">Created:</span>
                <span class="text-content-primary ml-1"><?php echo e($ticket->created_at->format('M d, Y h:i A')); ?></span>
            </div>
        </div>

        
        <div class="space-y-4 mb-6">
            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex <?php echo e($msg->sender_type === 'user' ? 'justify-end' : 'justify-start'); ?>">
                    <div class="max-w-[80%] <?php echo e($msg->sender_type === 'user' ? 'bg-primary/10 border-primary/20' : 'bg-surface-raised border-surface-border'); ?> border rounded-xl p-4">
                        <div class="flex items-center gap-2 mb-2">
                            <?php if($msg->sender_type === 'admin'): ?>
                                <div class="w-6 h-6 rounded-full bg-gain/20 flex items-center justify-center">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'shield-check','class' => 'w-3.5 h-3.5 text-gain']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'shield-check','class' => 'w-3.5 h-3.5 text-gain']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                                <span class="text-xs font-semibold text-gain">Support Team</span>
                            <?php else: ?>
                                <div class="w-6 h-6 rounded-full bg-primary/20 flex items-center justify-center">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'user','class' => 'w-3.5 h-3.5 text-primary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'user','class' => 'w-3.5 h-3.5 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                                <span class="text-xs font-semibold text-primary">You</span>
                            <?php endif; ?>
                            <span class="text-xs text-content-tertiary"><?php echo e($msg->created_at->format('M d, Y h:i A')); ?></span>
                        </div>
                        <p class="text-sm text-content-primary whitespace-pre-wrap"><?php echo e($msg->message); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
        <?php if($ticket->status !== 'closed'): ?>
            <div class="rounded-xl bg-surface-raised border border-surface-border p-5">
                <h4 class="text-sm font-semibold text-content-primary mb-3">Reply</h4>
                <form method="POST" action="<?php echo e(route('support.reply', $ticket->ticket_id)); ?>" class="space-y-4">
                    <?php echo csrf_field(); ?>
                    <textarea name="message" rows="4" required minlength="5"
                              class="w-full px-4 py-2.5 rounded-lg bg-surface-overlay border border-surface-border text-content-primary text-sm placeholder-content-tertiary focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary transition-colors"
                              placeholder="Type your reply..."></textarea>
                    <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-xs text-loss mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="flex justify-end">
                        <button type="submit"
                                class="px-6 py-2.5 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-semibold transition-colors">
                            Send Reply
                        </button>
                    </div>
                </form>
            </div>
        <?php else: ?>
            <div class="rounded-xl bg-surface-raised border border-surface-border p-5 text-center">
                <p class="text-sm text-content-tertiary">This ticket has been closed. If you need further assistance, please create a new ticket.</p>
            </div>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\support\show.blade.php ENDPATH**/ ?>