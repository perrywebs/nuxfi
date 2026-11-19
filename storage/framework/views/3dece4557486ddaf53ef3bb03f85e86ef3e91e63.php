
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

    
    <?php echo $__env->make('user.partials.page-header', ['title' => 'Notifications', 'subtitle' => 'Stay updated on all your account activity'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="flex items-center justify-between">
        <p class="text-sm text-content-secondary">
            <span class="font-medium text-content-primary"><?php echo e($unreadCount); ?></span> unread notification<?php echo e($unreadCount !== 1 ? 's' : ''); ?>

        </p>
        <?php if($unreadCount > 0): ?>
        <button type="button" onclick="markAllRead()" class="text-sm text-primary hover:text-primary-light transition-colors font-medium">
            Mark all as read
        </button>
        <?php endif; ?>
    </div>

    
    <div class="bg-surface-raised border border-surface-border rounded-xl overflow-hidden divide-y divide-surface-border">
        <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div id="notif-<?php echo e($notification->id); ?>" class="flex items-start gap-4 px-5 py-4 transition-colors <?php echo e($notification->read_at ? '' : 'bg-primary-subtle/30'); ?>">
                
                <div class="w-10 h-10 rounded-full <?php echo e($notification->read_at ? 'bg-surface-overlay' : 'bg-primary-subtle'); ?> flex items-center justify-center shrink-0 mt-0.5">
                    <?php $icon = $notification->data['icon'] ?? 'bell'; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => $icon,'class' => 'w-5 h-5 '.e($notification->read_at ? 'text-content-tertiary' : 'text-primary').'']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($icon),'class' => 'w-5 h-5 '.e($notification->read_at ? 'text-content-tertiary' : 'text-primary').'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>

                
                <div class="flex-1 min-w-0">
                    <div class="flex items-start justify-between gap-2">
                        <div class="min-w-0">
                            <p class="text-sm font-medium <?php echo e($notification->read_at ? 'text-content-secondary' : 'text-content-primary'); ?> truncate">
                                <?php echo e($notification->data['title'] ?? 'Notification'); ?>

                            </p>
                            <p class="text-sm text-content-tertiary mt-0.5 leading-relaxed">
                                <?php echo e($notification->data['message'] ?? ''); ?>

                            </p>
                            <p class="text-xs text-content-tertiary mt-1.5">
                                <?php echo e($notification->created_at->diffForHumans()); ?>

                            </p>
                        </div>
                        <div class="flex items-center gap-1 shrink-0">
                            <?php if(!$notification->read_at): ?>
                                <button onclick="markRead('<?php echo e($notification->id); ?>')" title="Mark as read"
                                        class="p-1.5 text-content-tertiary hover:text-primary rounded-lg hover:bg-surface-overlay transition-colors">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'check-circle','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'check-circle','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </button>
                            <?php endif; ?>
                            <button onclick="deleteNotif('<?php echo e($notification->id); ?>')" title="Delete"
                                    class="p-1.5 text-content-tertiary hover:text-loss rounded-lg hover:bg-surface-overlay transition-colors">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'x-mark','class' => 'w-4 h-4']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'x-mark','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </button>
                        </div>
                    </div>
                    <?php if(!empty($notification->data['action_url'])): ?>
                        <a href="<?php echo e($notification->data['action_url']); ?>" class="inline-flex items-center gap-1 text-xs text-primary hover:text-primary-light mt-2 font-medium transition-colors">
                            View details <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'chevron-right','class' => 'w-3 h-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'chevron-right','class' => 'w-3 h-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center py-16">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'bell','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'bell','class' => 'w-12 h-12 text-content-tertiary mx-auto mb-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <p class="text-content-secondary font-medium">No notifications yet</p>
                <p class="text-sm text-content-tertiary mt-1">You'll be notified about important account activity here.</p>
            </div>
        <?php endif; ?>
    </div>

    
    <?php if($notifications->hasPages()): ?>
        <div class="flex justify-center">
            <?php echo e($notifications->links()); ?>

        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    const csrfToken = '<?php echo e(csrf_token()); ?>';
    const headers = { 'X-CSRF-TOKEN': csrfToken, 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' };

    function markRead(id) {
        fetch(`/dashboard/notifications/${id}/read`, { method: 'POST', headers })
            .then(r => r.json())
            .then(() => {
                const el = document.getElementById('notif-' + id);
                if (el) {
                    el.classList.remove('bg-primary-subtle/30');
                    const btn = el.querySelector('button[title="Mark as read"]');
                    if (btn) btn.remove();
                }
            });
    }

    function markAllRead() {
        fetch('<?php echo e(route("notifications.readAll")); ?>', { method: 'POST', headers })
            .then(r => r.json())
            .then(() => location.reload());
    }

    function deleteNotif(id) {
        fetch(`/dashboard/notifications/${id}`, { method: 'DELETE', headers })
            .then(r => r.json())
            .then(() => {
                const el = document.getElementById('notif-' + id);
                if (el) el.remove();
            });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\notification.blade.php ENDPATH**/ ?>