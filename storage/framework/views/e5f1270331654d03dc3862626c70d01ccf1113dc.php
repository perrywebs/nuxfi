<div x-data="{ showAddUser: false, showTrading: false, showTopup: false }">
    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => ''.e($settings->site_name).' Users','subtitle' => 'Manage all registered users']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e($settings->site_name).' Users','subtitle' => 'Manage all registered users']); ?>
         <?php $__env->slot('actions', null, []); ?> 
            <?php if($checkrecord): ?>
                <div class="flex items-center gap-2">
                    <select wire:model='action' class="bg-surface-card border border-border rounded-lg px-3 py-1.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                        <option value="Delete">Delete</option>
                        <option value="Clear">Clear Account</option>
                    </select>
                    <button wire:click='delsystemuser' type="button" class="inline-flex items-center gap-1.5 bg-danger text-content-inverse hover:bg-danger/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">
                        Apply
                    </button>
                    <button @click="showTrading = true" type="button" class="inline-flex items-center gap-1.5 bg-info text-content-inverse hover:bg-info/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        Add ROI
                    </button>
                    <button @click="showTopup = true" type="button" class="inline-flex items-center gap-1.5 bg-info text-content-inverse hover:bg-info/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                        Topup
                    </button>
                </div>
            <?php else: ?>
                <div class="flex items-center gap-2">
                    <a href="<?php echo e(route('emailservices')); ?>" class="inline-flex items-center gap-1.5 bg-surface-alt text-content hover:bg-surface-alt/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors border border-border">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" /></svg>
                        Send Message
                    </a>
                    <button @click="showAddUser = true" type="button" class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" /></svg>
                        New User
                    </button>
                </div>
            <?php endif; ?>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <div class="mt-6">
        
        <div class="mb-4">
            <div class="relative max-w-sm">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-content-muted" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
                <input wire:model.debounce.500ms='searchvalue' type="search" placeholder="Search by name, username or email..."
                    class="w-full pl-10 pr-4 py-2 bg-surface-card border border-border rounded-lg text-sm text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" />
            </div>
        </div>

        
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.table-card','data' => []]); ?>
<?php $component->withName('admin.table-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-surface-alt text-left">
                        <th class="px-4 py-3 font-medium text-content-muted uppercase text-xs tracking-wider whitespace-nowrap">
                            <input type="checkbox" wire:model='selectPage' class="rounded border-border text-primary focus:ring-primary/30" />
                        </th>
                        <th class="px-4 py-3 font-medium text-content-muted uppercase text-xs tracking-wider">Client Name</th>
                        <th class="px-4 py-3 font-medium text-content-muted uppercase text-xs tracking-wider">Username</th>
                        <th class="px-4 py-3 font-medium text-content-muted uppercase text-xs tracking-wider">Email</th>
                        <th class="px-4 py-3 font-medium text-content-muted uppercase text-xs tracking-wider">Phone</th>
                        <th class="px-4 py-3 font-medium text-content-muted uppercase text-xs tracking-wider">Status</th>
                        <th class="px-4 py-3 font-medium text-content-muted uppercase text-xs tracking-wider">Registered</th>
                        <th class="px-4 py-3 font-medium text-content-muted uppercase text-xs tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-surface-alt/50 transition-colors">
                            <td class="px-4 py-3 align-middle">
                                <input type="checkbox" wire:model='checkrecord' value="<?php echo e($user->id); ?>" class="rounded border-border text-primary focus:ring-primary/30" />
                            </td>
                            <td class="px-4 py-3 text-content font-medium"><?php echo e($user->name); ?></td>
                            <td class="px-4 py-3 text-content-secondary"><?php echo e($user->username); ?></td>
                            <td class="px-4 py-3 text-content-secondary"><?php echo e($user->email); ?></td>
                            <td class="px-4 py-3 text-content-secondary"><?php echo e($user->phone); ?></td>
                            <td class="px-4 py-3">
                                <?php if($user->isActive()): ?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'success']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'success']); ?>Active <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <?php else: ?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'danger']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger']); ?>Inactive <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-3 text-content-secondary whitespace-nowrap"><?php echo e($user->created_at->diffForHumans()); ?></td>
                            <td class="px-4 py-3">
                                <a href="<?php echo e(route('viewuser', $user->id)); ?>" class="inline-flex items-center gap-1.5 bg-secondary text-secondary-foreground hover:bg-secondary-hover rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">
                                    Manage
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" class="px-4 py-8 text-center text-content-muted">No users found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

        
        <div class="mt-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <select wire:model='pagenum' class="bg-surface-card border border-border rounded-lg px-3 py-1.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                    <option>10</option>
                    <option>20</option>
                    <option>50</option>
                    <option>100</option>
                    <option>200</option>
                </select>
                <select wire:model='orderby' class="bg-surface-card border border-border rounded-lg px-3 py-1.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                    <option value="id">ID</option>
                    <option value="name">Name</option>
                    <option value="email">Email</option>
                    <option value="created_at">Sign up date</option>
                </select>
                <select wire:model='orderdirection' class="bg-surface-card border border-border rounded-lg px-3 py-1.5 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                    <option value="desc">Descending</option>
                    <option value="asc">Ascending</option>
                </select>
            </div>
            <div>
                <?php echo $users->links(); ?>

            </div>
        </div>
    </div>

    
    <div x-show="showAddUser" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-4">
        <div x-show="showAddUser" x-transition.opacity class="absolute inset-0 bg-surface-overlay/60" @click="showAddUser = false"></div>
        <div x-show="showAddUser" x-transition class="relative w-full max-w-lg bg-surface-card rounded-2xl shadow-xl overflow-hidden">
            <div class="px-6 py-4 border-b border-border flex items-center justify-between">
                <h3 class="text-lg font-semibold text-content">Add User</h3>
                <button @click="showAddUser = false" class="text-content-muted hover:text-content transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
            <div class="px-6 py-5">
                <form method="POST" action="<?php echo e(route('createuser')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Username','class' => 'mb-4','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Username','class' => 'mb-4','required' => true]); ?>
                        <input type="text" id="usernameinput" name="username" wire:model.defer='username'
                            class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Fullname','class' => 'mb-4','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Fullname','class' => 'mb-4','required' => true]); ?>
                        <input type="text" name="name" wire:model.defer='fullname'
                            class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Email','class' => 'mb-4','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Email','class' => 'mb-4','required' => true]); ?>
                        <input type="email" name="email" wire:model.defer='email'
                            class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Password','class' => 'mb-4','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Password','class' => 'mb-4','required' => true]); ?>
                        <input type="text" name="password" wire:model.defer='password'
                            class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <button type="submit" class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                        Add User
                    </button>
                </form>
            </div>
        </div>
    </div>

    
    <div x-show="showTrading" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-4">
        <div x-show="showTrading" x-transition.opacity class="absolute inset-0 bg-surface-overlay/60" @click="showTrading = false"></div>
        <div x-show="showTrading" x-transition class="relative w-full max-w-lg bg-surface-card rounded-2xl shadow-xl overflow-hidden">
            <div class="px-6 py-4 border-b border-border flex items-center justify-between">
                <h3 class="text-lg font-semibold text-content">Add ROI to Selected Users</h3>
                <button @click="showTrading = false" class="text-content-muted hover:text-content transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
            <div class="px-6 py-5">
                <form wire:submit.prevent='addRoi'>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Select Investment Plan','class' => 'mb-4','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Select Investment Plan','class' => 'mb-4','required' => true]); ?>
                        <select wire:model.defer='plan' name="plan"
                            class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                            <option value="" selected disabled>Select Plan</option>
                            <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($plan->id); ?>"><?php echo e($plan->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Date','class' => 'mb-4','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Date','class' => 'mb-4','required' => true]); ?>
                        <input type="date" wire:model.defer='datecreated'
                            class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <p class="text-xs text-content-muted mb-4">
                        The system will calculate the ROI based on users' invested amount and topup amount specified in this selected plan settings.
                        <strong class="text-content-secondary">The plan must be using % as its topup-type else the calculations will be wrong.</strong>
                    </p>
                    <button type="submit" class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                        Add History
                    </button>
                </form>
            </div>
        </div>
    </div>

    
    <div x-show="showTopup" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-4">
        <div x-show="showTopup" x-transition.opacity class="absolute inset-0 bg-surface-overlay/60" @click="showTopup = false"></div>
        <div x-show="showTopup" x-transition class="relative w-full max-w-lg bg-surface-card rounded-2xl shadow-xl overflow-hidden">
            <div class="px-6 py-4 border-b border-border flex items-center justify-between">
                <h3 class="text-lg font-semibold text-content">Credit/Debit Accounts</h3>
                <button @click="showTopup = false" class="text-content-muted hover:text-content transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
            <div class="px-6 py-5">
                <form wire:submit.prevent='topup'>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Amount','class' => 'mb-4','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Amount','class' => 'mb-4','required' => true]); ?>
                        <input type="number" step="any" name="amount" wire:model.defer='topamount' placeholder="Enter amount"
                            class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                        <?php if($topamount): ?>
                            <p class="text-xs text-content-muted mt-1"><?php echo e($topamount); ?></p>
                        <?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Select where to Credit/Debit','class' => 'mb-4','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Select where to Credit/Debit','class' => 'mb-4','required' => true]); ?>
                        <select wire:model.defer='topcolumn' name="type"
                            class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                            <option value="" selected disabled>Select Column</option>
                            <option value="Bonus">Bonus</option>
                            <option value="balance">Account Balance</option>
                        </select>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Select credit to add, debit to subtract','class' => 'mb-4','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Select credit to add, debit to subtract','class' => 'mb-4','required' => true]); ?>
                        <select wire:model.defer='toptype' name="t_type"
                            class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                            <option value="">Select type</option>
                            <option value="Credit">Credit</option>
                            <option value="Debit">Debit</option>
                        </select>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <button type="submit" class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\livewire\admin\manage-users.blade.php ENDPATH**/ ?>