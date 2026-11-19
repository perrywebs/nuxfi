
<?php $__env->startSection('title', 'Manage Users'); ?>
<?php $__env->startSection('content'); ?>
<div x-data="{ showAddUser: false, showTrading: false, showTopup: false }">

    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => ''.e($settings->site_name ?? 'Site').' Users','subtitle' => 'Manage all registered users']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e($settings->site_name ?? 'Site').' Users','subtitle' => 'Manage all registered users']); ?>
         <?php $__env->slot('actions', null, []); ?> 
            <div class="flex items-center gap-2">
                <a href="<?php echo e(route('emailservices')); ?>" class="inline-flex items-center gap-1.5 bg-surface-alt text-content hover:bg-surface-alt/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors border border-border">
                    Send Message
                </a>
                <button type="button" @click="showAddUser = true" class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">
                    New User
                </button>
            </div>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    
    <?php if(session('success')): ?>
        <div class="mt-4 p-3 bg-success/10 border border-success/30 text-success rounded-lg text-sm"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="mt-4 p-3 bg-danger/10 border border-danger/30 text-danger rounded-lg text-sm"><?php echo e(session('error')); ?></div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div class="mt-4 p-3 bg-danger/10 border border-danger/30 text-danger rounded-lg text-sm">
            <ul class="list-disc pl-5">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    
    <form method="GET" action="<?php echo e(route('manageusers')); ?>" class="mt-6 mb-4 flex flex-col sm:flex-row sm:flex-wrap sm:items-center gap-3">
        <div class="relative max-w-sm w-full">
            <input type="search" name="q" value="<?php echo e($search); ?>" placeholder="Search by ID, name, username or email..."
                class="w-full pl-3 pr-4 py-2 bg-surface-card border border-border rounded-lg text-sm text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" />
        </div>

        <select name="per_page" class="bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
            <?php $__currentLoopData = [10, 20, 50, 100, 200]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($opt); ?>" @selected($perPage == $opt)><?php echo e($opt); ?> per page</option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <select name="orderby" class="bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
            <option value="id"          @selected($orderby === 'id')>Sort by ID</option>
            <option value="name"        @selected($orderby === 'name')>Sort by Name</option>
            <option value="email"       @selected($orderby === 'email')>Sort by Email</option>
            <option value="created_at"  @selected($orderby === 'created_at')>Sort by Sign up date</option>
        </select>

        <select name="direction" class="bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
            <option value="desc" @selected($direction === 'desc')>Descending</option>
            <option value="asc"  @selected($direction === 'asc')>Ascending</option>
        </select>

        <button type="submit" class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors">
            Apply
        </button>

        <?php if($search !== '' || $orderby !== 'id' || $direction !== 'desc' || $perPage !== 10): ?>
            <a href="<?php echo e(route('manageusers')); ?>" class="inline-flex items-center text-sm text-content-muted hover:text-content underline">Reset</a>
        <?php endif; ?>
    </form>

    
    <form id="bulkForm" method="POST" action="<?php echo e(route('users.bulkAction')); ?>" onsubmit="return confirmBulk();">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="bulk_action" id="bulk_action_input" value="Delete">

        <div class="mb-3 flex flex-wrap items-center gap-2">
            <span class="text-xs text-content-muted">With selected:</span>
            <button type="button" onclick="submitBulk('Activate')" class="inline-flex items-center gap-1.5 bg-success/10 text-success hover:bg-success/20 border border-success/30 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">Activate</button>
            <button type="button" onclick="submitBulk('Deactivate')" class="inline-flex items-center gap-1.5 bg-warning/10 text-warning hover:bg-warning/20 border border-warning/30 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">Deactivate</button>
            <button type="button" onclick="submitBulk('Delete')" class="inline-flex items-center gap-1.5 bg-danger text-content-inverse hover:bg-danger/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">Delete</button>
            <button type="button" onclick="submitBulk('Clear')" class="inline-flex items-center gap-1.5 bg-warning text-content-inverse hover:bg-warning/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">Clear Account</button>
            <button type="button" @click="showTrading = true" class="inline-flex items-center gap-1.5 bg-info text-content-inverse hover:bg-info/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">Add ROI</button>
            <button type="button" @click="showTopup = true" class="inline-flex items-center gap-1.5 bg-info text-content-inverse hover:bg-info/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">Topup</button>
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
                            <input type="checkbox" id="selectPage" onclick="toggleAll(this)" class="rounded border-border text-primary focus:ring-primary/30" />
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
                                <input type="checkbox" name="user_ids[]" value="<?php echo e($user->id); ?>" class="row-check rounded border-border text-primary focus:ring-primary/30" />
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
                            <td class="px-4 py-3 text-content-secondary whitespace-nowrap"><?php echo e(optional($user->created_at)->diffForHumans()); ?></td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <a href="<?php echo e(route('viewuser', $user->id)); ?>" class="inline-flex items-center gap-1.5 bg-secondary text-secondary-foreground hover:bg-secondary-hover rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">
                                        Manage
                                    </a>
                                    <?php if($user->isActive()): ?>
                                        <a href="<?php echo e(route('user.deactivate', $user->id)); ?>"
                                            onclick="return confirmStatus(event, 'deactivate', '<?php echo e(addslashes($user->name)); ?>', '<?php echo e(route('user.deactivate', $user->id)); ?>')"
                                            class="inline-flex items-center gap-1.5 bg-warning/10 text-warning hover:bg-warning/20 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors border border-warning/30">
                                            Deactivate
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('user.activate', $user->id)); ?>"
                                            onclick="return confirmStatus(event, 'activate', '<?php echo e(addslashes($user->name)); ?>', '<?php echo e(route('user.activate', $user->id)); ?>')"
                                            class="inline-flex items-center gap-1.5 bg-success/10 text-success hover:bg-success/20 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors border border-success/30">
                                            Activate
                                        </a>
                                    <?php endif; ?>
                                </div>
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

        <div class="mt-4">
            <?php if($users->hasPages()): ?>
                <nav class="flex items-center justify-between flex-wrap gap-3" role="navigation" aria-label="Pagination">
                    <p class="text-xs text-content-muted">
                        Showing <span class="font-medium text-content"><?php echo e($users->firstItem() ?? 0); ?></span>
                        to <span class="font-medium text-content"><?php echo e($users->lastItem() ?? 0); ?></span>
                        of <span class="font-medium text-content"><?php echo e($users->total()); ?></span> users
                    </p>

                    <ul class="inline-flex items-center gap-1">
                        
                        <?php if($users->onFirstPage()): ?>
                            <li>
                                <span class="inline-flex items-center px-3 py-1.5 text-xs rounded-lg border border-border bg-surface-card text-content-muted opacity-50 cursor-not-allowed">Prev</span>
                            </li>
                        <?php else: ?>
                            <li>
                                <a href="<?php echo e($users->previousPageUrl()); ?>" class="inline-flex items-center px-3 py-1.5 text-xs rounded-lg border border-border bg-surface-card text-content hover:bg-surface-alt transition-colors">Prev</a>
                            </li>
                        <?php endif; ?>

                        
                        <?php $__currentLoopData = $users->getUrlRange(max(1, $users->currentPage() - 3), min($users->lastPage(), $users->currentPage() + 3)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($page == $users->currentPage()): ?>
                                <li>
                                    <span class="inline-flex items-center px-3 py-1.5 text-xs rounded-lg border border-primary bg-primary text-primary-foreground font-medium"><?php echo e($page); ?></span>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="<?php echo e($url); ?>" class="inline-flex items-center px-3 py-1.5 text-xs rounded-lg border border-border bg-surface-card text-content hover:bg-surface-alt transition-colors"><?php echo e($page); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                        <?php if($users->hasMorePages()): ?>
                            <li>
                                <a href="<?php echo e($users->nextPageUrl()); ?>" class="inline-flex items-center px-3 py-1.5 text-xs rounded-lg border border-border bg-surface-card text-content hover:bg-surface-alt transition-colors">Next</a>
                            </li>
                        <?php else: ?>
                            <li>
                                <span class="inline-flex items-center px-3 py-1.5 text-xs rounded-lg border border-border bg-surface-card text-content-muted opacity-50 cursor-not-allowed">Next</span>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            <?php else: ?>
                <p class="text-xs text-content-muted">Showing <?php echo e($users->count()); ?> of <?php echo e($users->total()); ?> users</p>
            <?php endif; ?>
        </div>

        <input type="hidden" name="plan"        id="bulk_plan">
        <input type="hidden" name="datecreated" id="bulk_datecreated">
        <input type="hidden" name="topamount"   id="bulk_topamount">
        <input type="hidden" name="topcolumn"   id="bulk_topcolumn">
        <input type="hidden" name="toptype"     id="bulk_toptype">
    </form>

    
    <div x-show="showAddUser" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-4">
        <div x-show="showAddUser" x-transition.opacity class="absolute inset-0 bg-surface-overlay/60" @click="showAddUser = false"></div>
        <div x-show="showAddUser" x-transition class="relative w-full max-w-lg bg-surface-card rounded-2xl shadow-xl overflow-hidden">
            <div class="px-6 py-4 border-b border-border flex items-center justify-between">
                <h3 class="text-lg font-semibold text-content">Add User</h3>
                <button type="button" @click="showAddUser = false" class="text-content-muted hover:text-content transition-colors">&times;</button>
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
                        <input type="text" name="username" value="<?php echo e(old('username')); ?>" required
                            class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
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
                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" required
                            class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
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
                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" required
                            class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
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
                        <input type="text" name="password" required
                            class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
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
                <button type="button" @click="showTrading = false" class="text-content-muted hover:text-content transition-colors">&times;</button>
            </div>
            <div class="px-6 py-5">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Select Investment Plan','class' => 'mb-4','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Select Investment Plan','class' => 'mb-4','required' => true]); ?>
                    <select id="modal_plan" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
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
                    <input type="date" id="modal_datecreated" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <p class="text-xs text-content-muted mb-4">
                    The system will calculate ROI based on users' invested amount and the topup amount in the selected plan settings.
                    <strong class="text-content-secondary">The plan must use % as its topup-type, otherwise calculations will be wrong.</strong>
                </p>
                <button type="button" onclick="submitRoi()" class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                    Add History
                </button>
            </div>
        </div>
    </div>

    
    <div x-show="showTopup" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-4">
        <div x-show="showTopup" x-transition.opacity class="absolute inset-0 bg-surface-overlay/60" @click="showTopup = false"></div>
        <div x-show="showTopup" x-transition class="relative w-full max-w-lg bg-surface-card rounded-2xl shadow-xl overflow-hidden">
            <div class="px-6 py-4 border-b border-border flex items-center justify-between">
                <h3 class="text-lg font-semibold text-content">Credit/Debit Accounts</h3>
                <button type="button" @click="showTopup = false" class="text-content-muted hover:text-content transition-colors">&times;</button>
            </div>
            <div class="px-6 py-5">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Amount','class' => 'mb-4','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Amount','class' => 'mb-4','required' => true]); ?>
                    <input type="number" step="any" id="modal_topamount" placeholder="Enter amount"
                        class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
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
                    <select id="modal_topcolumn" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Credit to add, Debit to subtract','class' => 'mb-4','required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Credit to add, Debit to subtract','class' => 'mb-4','required' => true]); ?>
                    <select id="modal_toptype" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
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
                <button type="button" onclick="submitTopup()" class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleAll(source) {
        document.querySelectorAll('.row-check').forEach(cb => cb.checked = source.checked);
    }

    function hasSelection() {
        const selected = document.querySelectorAll('.row-check:checked').length;
        if (selected === 0) {
            alert('Please select at least one user.');
            return false;
        }
        return true;
    }

    function submitBulk(action) {
        if (!hasSelection()) return;
        document.getElementById('bulk_action_input').value = action;

        if (window.Swal) {
            const messages = {
                Delete: { title: 'Delete selected users?', text: 'This permanently removes the accounts and their records. This cannot be undone.', icon: 'error', confirm: 'Yes, delete' },
                Clear: { title: 'Clear selected accounts?', text: 'Balances will be reset and deposits/withdrawals removed.', icon: 'warning', confirm: 'Yes, clear' },
                Activate: { title: 'Activate selected users?', text: 'These users will be able to sign in again.', icon: 'question', confirm: 'Yes, activate' },
                Deactivate: { title: 'Deactivate selected users?', text: 'These users will be signed out and blocked from signing in. Their data is kept.', icon: 'warning', confirm: 'Yes, deactivate' }
            };
            const message = messages[action];
            if (message) {
                Swal.fire({
                    title: message.title,
                    text: message.text,
                    icon: message.icon,
                    showCancelButton: true,
                    confirmButtonColor: action === 'Delete' ? 'rgb(220,38,38)' : 'rgb(14,165,233)',
                    confirmButtonText: message.confirm
                }).then(function (result) {
                    if (result.isConfirmed) {
                        document.getElementById('bulkForm').submit();
                    }
                });
                return;
            }
        }

        document.getElementById('bulkForm').submit();
    }

    function confirmBulk() {
        const action = document.getElementById('bulk_action_input').value;
        if (action === 'Delete') {
            return confirm('Permanently delete the selected users? This cannot be undone.');
        }
        if (action === 'Clear') {
            return confirm('Clear balances and remove deposits/withdrawals for the selected users?');
        }
        if (action === 'Deactivate') {
            return confirm('Deactivate the selected users? They will be signed out and blocked from signing in.');
        }
        return true;
    }

    function confirmStatus(event, action, name, url) {
        event.preventDefault();
        const isDeactivate = action === 'deactivate';
        const go = function () { window.location.href = url; };

        if (!window.Swal) {
            if (confirm((isDeactivate ? 'Deactivate ' : 'Activate ') + name + '?')) go();
            return false;
        }

        Swal.fire({
            title: (isDeactivate ? 'Deactivate ' : 'Activate ') + name + '?',
            text: isDeactivate
                ? 'The account keeps all of its data but the user will be signed out and blocked from logging in.'
                : 'The user will be able to sign in again immediately.',
            icon: isDeactivate ? 'warning' : 'question',
            showCancelButton: true,
            confirmButtonColor: isDeactivate ? 'rgb(217,119,6)' : 'rgb(22,163,74)',
            confirmButtonText: isDeactivate ? 'Yes, deactivate' : 'Yes, activate'
        }).then(function (result) {
            if (result.isConfirmed) go();
        });

        return false;
    }

    function submitRoi() {
        if (!hasSelection()) return;
        const plan = document.getElementById('modal_plan').value;
        const date = document.getElementById('modal_datecreated').value;
        if (!plan || !date) { alert('Plan and date are required.'); return; }
        document.getElementById('bulk_plan').value = plan;
        document.getElementById('bulk_datecreated').value = date;
        document.getElementById('bulk_action_input').value = 'AddRoi';
        document.getElementById('bulkForm').submit();
    }

    function submitTopup() {
        if (!hasSelection()) return;
        const amount = document.getElementById('modal_topamount').value;
        const column = document.getElementById('modal_topcolumn').value;
        const type   = document.getElementById('modal_toptype').value;
        if (!amount || !column || !type) { alert('All topup fields are required.'); return; }
        document.getElementById('bulk_topamount').value = amount;
        document.getElementById('bulk_topcolumn').value = column;
        document.getElementById('bulk_toptype').value = type;
        document.getElementById('bulk_action_input').value = 'Topup';
        document.getElementById('bulkForm').submit();
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\Users\users.blade.php ENDPATH**/ ?>