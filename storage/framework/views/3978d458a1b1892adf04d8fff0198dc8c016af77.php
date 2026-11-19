
<?php $__env->startSection('title', "Ticket {$ticket->ticket_id}"); ?>

<?php $__env->startSection('content'); ?>
    
    <?php if(session('success')): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.alert','data' => ['type' => 'success','dismissible' => true,'class' => 'mb-6']]); ?>
<?php $component->withName('admin.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'success','dismissible' => true,'class' => 'mb-6']); ?>
            <?php echo e(session('success')); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.alert','data' => ['type' => 'danger','dismissible' => true,'class' => 'mb-6']]); ?>
<?php $component->withName('admin.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger','dismissible' => true,'class' => 'mb-6']); ?>
            <?php echo e(session('error')); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endif; ?>

    
    <div class="mb-4">
        <a href="<?php echo e(route('admin.support.index')); ?>" class="inline-flex items-center gap-1 text-sm text-content-muted hover:text-primary transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
            Back to Tickets
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2">
            <div class="bg-surface-card rounded-xl border border-border shadow-card">
                <div class="px-5 py-4 border-b border-border">
                    <h3 class="text-base font-medium text-content"><?php echo e($ticket->subject); ?></h3>
                </div>

                <div class="p-5 space-y-4 max-h-[600px] overflow-y-auto">
                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex <?php echo e($msg->sender_type === 'admin' ? 'justify-end' : 'justify-start'); ?>">
                            <div class="max-w-[80%] <?php echo e($msg->sender_type === 'admin' ? 'bg-primary/10 border-primary/20' : 'bg-surface-alt border-border'); ?> border rounded-xl p-4">
                                <div class="flex items-center gap-2 mb-2">
                                    <?php if($msg->sender_type === 'admin'): ?>
                                        <div class="w-6 h-6 rounded-full bg-primary/20 flex items-center justify-center">
                                            <svg class="w-3.5 h-3.5 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" /></svg>
                                        </div>
                                        <span class="text-xs font-semibold text-primary">Admin</span>
                                    <?php else: ?>
                                        <div class="w-6 h-6 rounded-full bg-warning/20 flex items-center justify-center">
                                            <svg class="w-3.5 h-3.5 text-warning" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                                        </div>
                                        <span class="text-xs font-semibold text-warning"><?php echo e($ticket->user->name ?? 'User'); ?></span>
                                    <?php endif; ?>
                                    <span class="text-xs text-content-muted"><?php echo e($msg->created_at->format('M d, Y h:i A')); ?></span>
                                </div>
                                <p class="text-sm text-content whitespace-pre-wrap"><?php echo e($msg->message); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                
                <?php if($ticket->status !== 'closed'): ?>
                    <div class="border-t border-border p-5">
                        <form method="POST" action="<?php echo e(route('admin.support.reply', $ticket->ticket_id)); ?>" class="space-y-3">
                            <?php echo csrf_field(); ?>
                            <textarea name="message" rows="4" required minlength="5"
                                      class="w-full px-4 py-2.5 rounded-lg bg-surface-alt border border-border text-sm text-content placeholder-content-muted focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary transition-colors"
                                      placeholder="Type your reply to the user..."></textarea>
                            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-xs text-danger mt-1"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="flex justify-end">
                                <button type="submit"
                                        class="px-6 py-2.5 rounded-lg bg-primary hover:bg-primary-hover text-white text-sm font-medium transition-colors">
                                    Send Reply
                                </button>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="space-y-4">
            
            <div class="bg-surface-card rounded-xl border border-border shadow-card p-5">
                <h4 class="text-sm font-medium text-content mb-4">Ticket Details</h4>
                <dl class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <dt class="text-content-muted">Ticket ID</dt>
                        <dd class="font-mono text-content"><?php echo e($ticket->ticket_id); ?></dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-content-muted">Status</dt>
                        <dd>
                            <?php if($ticket->status === 'open'): ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'warning']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'warning']); ?>Open <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php elseif($ticket->status === 'answered'): ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'success']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'success']); ?>Answered <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php else: ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'neutral']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'neutral']); ?>Closed <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php endif; ?>
                        </dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-content-muted">Priority</dt>
                        <dd>
                            <?php if($ticket->priority === 'high'): ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'danger']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger']); ?>High <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php elseif($ticket->priority === 'medium'): ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'warning']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'warning']); ?>Medium <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php else: ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'neutral']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'neutral']); ?>Low <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php endif; ?>
                        </dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-content-muted">Created</dt>
                        <dd class="text-content"><?php echo e($ticket->created_at->format('M d, Y')); ?></dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-content-muted">Updated</dt>
                        <dd class="text-content"><?php echo e($ticket->updated_at->diffForHumans()); ?></dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-content-muted">Messages</dt>
                        <dd class="text-content"><?php echo e($messages->count()); ?></dd>
                    </div>
                </dl>
            </div>

            
            <div class="bg-surface-card rounded-xl border border-border shadow-card p-5">
                <h4 class="text-sm font-medium text-content mb-4">User Info</h4>
                <dl class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <dt class="text-content-muted">Name</dt>
                        <dd class="text-content"><?php echo e($ticket->user->name ?? 'N/A'); ?></dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-content-muted">Email</dt>
                        <dd class="text-content text-xs"><?php echo e($ticket->user->email ?? 'N/A'); ?></dd>
                    </div>
                    <?php if($ticket->user): ?>
                        <div class="pt-2">
                            <a href="<?php echo e(route('viewuser', $ticket->user->id)); ?>"
                               class="text-xs font-medium text-primary hover:text-primary-hover transition-colors">
                                View User Profile →
                            </a>
                        </div>
                    <?php endif; ?>
                </dl>
            </div>

            
            <div class="bg-surface-card rounded-xl border border-border shadow-card p-5">
                <h4 class="text-sm font-medium text-content mb-4">Actions</h4>
                <div class="space-y-2">
                    <?php if($ticket->status !== 'closed'): ?>
                        <form method="POST" action="<?php echo e(route('admin.support.status', $ticket->ticket_id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="hidden" name="status" value="closed" />
                            <button type="submit"
                                    class="w-full px-4 py-2 rounded-lg bg-danger/10 text-danger hover:bg-danger/20 text-sm font-medium transition-colors">
                                Close Ticket
                            </button>
                        </form>
                    <?php else: ?>
                        <form method="POST" action="<?php echo e(route('admin.support.status', $ticket->ticket_id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="hidden" name="status" value="open" />
                            <button type="submit"
                                    class="w-full px-4 py-2 rounded-lg bg-warning/10 text-warning hover:bg-warning/20 text-sm font-medium transition-colors">
                                Reopen Ticket
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\support\show.blade.php ENDPATH**/ ?>