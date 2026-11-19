
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

    
    <div class="flex items-center gap-3 mb-6">
        <a href="<?php echo e(route('nft.gallery')); ?>" class="p-2 rounded-lg bg-surface-overlay hover:bg-surface-border text-content-secondary transition-colors">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'arrow-left','class' => 'w-5 h-5']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'arrow-left','class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </a>
        <div>
            <h2 class="text-xl font-bold text-content-primary"><?php echo e($nft->name); ?></h2>
            <?php if($nft->token_id): ?>
                <p class="text-xs text-content-tertiary font-mono"><?php echo e($nft->token_id); ?></p>
            <?php endif; ?>
        </div>
        <div class="ml-auto">
            <form action="<?php echo e(route('user.nfts.like', $nft->id)); ?>" method="POST" class="inline">
                <?php echo csrf_field(); ?>
                <button type="submit" class="p-2 rounded-lg <?php echo e($isLiked ? 'bg-loss/10 text-loss' : 'bg-surface-overlay text-content-tertiary hover:text-loss'); ?> transition-colors" title="<?php echo e($isLiked ? 'Unlike' : 'Like'); ?>">
                    <svg class="w-5 h-5" fill="<?php echo e($isLiked ? 'currentColor' : 'none'); ?>" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" /></svg>
                </button>
            </form>
        </div>
    </div>

    
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 mb-6">
        
        <div class="lg:col-span-3 rounded-xl bg-surface-raised border border-surface-border overflow-hidden">
            <img src="<?php echo e(asset('storage/app/public/' . $nft->image)); ?>" alt="<?php echo e($nft->name); ?>" class="w-full h-auto max-h-[600px] object-contain">
        </div>

        
        <div class="lg:col-span-2 space-y-4">
            
            <div class="rounded-xl bg-surface-raised border border-surface-border p-5">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-xs text-content-tertiary mb-1">Current Price</p>
                        <p class="text-2xl font-bold text-primary"><?php echo e($nft->price); ?> ETH</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-content-tertiary mb-1">Blockchain</p>
                        <p class="text-sm font-medium text-content-primary"><?php echo e($nft->blockchain ?? 'Ethereum'); ?></p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3 mb-4 text-xs">
                    <div class="bg-surface-overlay rounded-lg p-2.5">
                        <span class="text-content-tertiary">Owner</span>
                        <p class="font-medium text-content-primary truncate"><?php echo e($nft->user->name); ?></p>
                    </div>
                    <div class="bg-surface-overlay rounded-lg p-2.5">
                        <span class="text-content-tertiary">Creator</span>
                        <p class="font-medium text-content-primary truncate"><?php echo e($nft->originalCreator->name ?? $nft->user->name); ?></p>
                    </div>
                    <div class="bg-surface-overlay rounded-lg p-2.5">
                        <span class="text-content-tertiary">Views</span>
                        <p class="font-medium text-content-primary"><?php echo e(number_format($nft->views_count)); ?></p>
                    </div>
                    <div class="bg-surface-overlay rounded-lg p-2.5">
                        <span class="text-content-tertiary">Likes</span>
                        <p class="font-medium text-content-primary"><?php echo e(number_format($nft->likes_count)); ?></p>
                    </div>
                </div>

                <?php if($nft->status == 'available' && $nft->user_id != auth()->id()): ?>
                    <form id="buy-form" action="<?php echo e(route('nfts.buy', $nft->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="button" id="buy-button" class="w-full py-3 rounded-lg bg-primary hover:bg-primary-dark text-content-inverse text-sm font-semibold transition-colors">Buy Now</button>
                    </form>
                <?php elseif($nft->user_id == auth()->id()): ?>
                    <div class="py-3 text-center text-sm text-content-tertiary bg-surface-overlay rounded-lg">You own this NFT</div>
                <?php else: ?>
                    <div class="py-3 text-center text-sm text-content-tertiary bg-surface-overlay rounded-lg">Not available for purchase</div>
                <?php endif; ?>
            </div>

            
            <?php if($nft->status == 'available' && $nft->user_id != auth()->id()): ?>
                <div class="rounded-xl bg-surface-raised border border-surface-border p-5">
                    <h4 class="text-sm font-semibold text-content-primary mb-3">Place a Bid (ETH)</h4>
                    <form id="bid-form" action="<?php echo e(route('bids.place', $nft->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="number" name="amount" step="0.01" min="0.01" required placeholder="Enter bid amount"
                               class="w-full px-3 py-2.5 rounded-lg bg-surface-overlay border border-surface-border text-content-primary text-sm placeholder-content-tertiary focus:outline-none focus:ring-2 focus:ring-primary mb-3">
                        <button type="button" id="bid-button" class="w-full py-2.5 rounded-lg bg-info hover:bg-info/80 text-white text-sm font-semibold transition-colors">Submit Bid</button>
                    </form>
                </div>
            <?php endif; ?>

            
            <div class="rounded-xl bg-surface-raised border border-surface-border p-5">
                <h4 class="text-sm font-semibold text-content-primary mb-2">Description</h4>
                <p class="text-sm text-content-secondary leading-relaxed"><?php echo e($nft->description ?: 'No description provided.'); ?></p>
            </div>

            
            <div class="rounded-xl bg-surface-raised border border-surface-border p-5">
                <h4 class="text-sm font-semibold text-content-primary mb-3">Details</h4>
                <dl class="space-y-2 text-sm">
                    <?php if($nft->nftCategory): ?>
                        <div class="flex justify-between"><dt class="text-content-tertiary">Category</dt><dd class="text-content-primary"><?php echo e($nft->nftCategory->name); ?></dd></div>
                    <?php endif; ?>
                    <?php if($nft->collection): ?>
                        <div class="flex justify-between"><dt class="text-content-tertiary">Collection</dt><dd><a href="<?php echo e(route('user.nfts.collection', $nft->collection->id)); ?>" class="text-primary hover:underline"><?php echo e($nft->collection->name); ?></a></dd></div>
                    <?php endif; ?>
                    <?php if($nft->royalty_percent > 0): ?>
                        <div class="flex justify-between"><dt class="text-content-tertiary">Royalty</dt><dd class="text-content-primary"><?php echo e($nft->royalty_percent); ?>%</dd></div>
                    <?php endif; ?>
                    <?php if($nft->minted_at): ?>
                        <div class="flex justify-between"><dt class="text-content-tertiary">Minted</dt><dd class="text-content-primary"><?php echo e($nft->minted_at->format('M d, Y')); ?></dd></div>
                    <?php endif; ?>
                </dl>
            </div>
        </div>
    </div>

    
    <?php if($nft->properties && count($nft->properties)): ?>
        <div class="rounded-xl bg-surface-raised border border-surface-border p-5 mb-6">
            <h3 class="text-sm font-semibold text-content-primary mb-3 flex items-center gap-1.5">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'tag','class' => 'w-4 h-4 text-content-tertiary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'tag','class' => 'w-4 h-4 text-content-tertiary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?> Properties
            </h3>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
                <?php $__currentLoopData = $nft->properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-primary/5 border border-primary/20 rounded-lg p-3 text-center">
                        <p class="text-[10px] text-primary uppercase font-semibold tracking-wide"><?php echo e($key); ?></p>
                        <p class="text-sm font-medium text-content-primary mt-0.5"><?php echo e($value); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        
        <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden">
            <div class="px-5 py-3 border-b border-surface-border">
                <h3 class="text-sm font-semibold text-content-primary">Bid History</h3>
            </div>
            <?php if($nft->bids->count()): ?>
                <div class="divide-y divide-surface-border max-h-64 overflow-y-auto">
                    <?php $__currentLoopData = $nft->bids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-center justify-between px-5 py-3">
                            <div class="flex items-center gap-2">
                                <div class="w-7 h-7 rounded-full bg-surface-overlay flex items-center justify-center">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon','data' => ['name' => 'user','class' => 'w-3.5 h-3.5 text-content-tertiary']]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'user','class' => 'w-3.5 h-3.5 text-content-tertiary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                                <div>
                                    <span class="text-sm text-content-primary"><?php echo e($bid->user->name ?? $bid->user->username); ?></span>
                                    <span class="text-xs text-content-tertiary ml-1"><?php echo e($bid->created_at->diffForHumans()); ?></span>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-sm font-semibold text-primary"><?php echo e($bid->amount); ?> ETH</span>
                                <?php if($bid->status != 'pending'): ?>
                                    <span class="block text-[10px] <?php echo e($bid->status == 'accepted' ? 'text-gain' : 'text-loss'); ?>"><?php echo e(ucfirst($bid->status)); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="p-5 text-center text-content-tertiary text-sm">No bids yet.</div>
            <?php endif; ?>
        </div>

        
        <div class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden">
            <div class="px-5 py-3 border-b border-surface-border">
                <h3 class="text-sm font-semibold text-content-primary">Ownership History</h3>
            </div>
            <?php if($nft->transfers->count()): ?>
                <div class="divide-y divide-surface-border max-h-64 overflow-y-auto">
                    <?php $__currentLoopData = $nft->transfers->sortByDesc('created_at'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transfer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-center justify-between px-5 py-3">
                            <div class="flex items-center gap-2">
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold <?php echo e($transfer->type == 'mint' ? 'bg-gain/10 text-gain' : ($transfer->type == 'sale' ? 'bg-info/10 text-info' : 'bg-warning/10 text-warning')); ?>"><?php echo e(ucfirst(str_replace('_', ' ', $transfer->type))); ?></span>
                                <div class="text-xs text-content-secondary">
                                    <?php echo e($transfer->fromUser->name ?? 'Minted'); ?> → <?php echo e($transfer->toUser->name ?? '?'); ?>

                                </div>
                            </div>
                            <div class="text-right text-xs">
                                <?php if($transfer->price > 0): ?>
                                    <span class="font-medium text-content-primary"><?php echo e($transfer->price); ?> ETH</span>
                                <?php endif; ?>
                                <span class="block text-content-tertiary"><?php echo e($transfer->created_at->format('M d, Y')); ?></span>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="p-5 text-center text-content-tertiary text-sm">No history.</div>
            <?php endif; ?>
        </div>
    </div>

    
    <?php if($relatedNfts->count()): ?>
        <div class="mb-6">
            <h3 class="text-sm font-semibold text-content-primary mb-3">More Like This</h3>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <?php $__currentLoopData = $relatedNfts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('user.nfts.show', $related->id)); ?>" class="rounded-xl bg-surface-raised border border-surface-border overflow-hidden hover:border-primary/50 transition-colors group">
                        <div class="aspect-square overflow-hidden">
                            <img src="<?php echo e(asset('storage/app/public/' . $related->image)); ?>" alt="<?php echo e($related->name); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        </div>
                        <div class="p-3">
                            <p class="text-xs font-medium text-content-primary truncate"><?php echo e($related->name); ?></p>
                            <p class="text-xs text-primary font-semibold"><?php echo e($related->price); ?> ETH</p>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buyBtn = document.getElementById('buy-button');
        if (buyBtn) {
            buyBtn.addEventListener('click', function() {
                Swal.fire({
                    title: 'Confirm Purchase',
                    text: 'Are you sure you want to buy this NFT for <?php echo e($nft->price); ?> ETH?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#059669',
                    cancelButtonColor: '#2A2F36',
                    confirmButtonText: 'Yes, Buy Now',
                    cancelButtonText: 'Cancel',
                    background: '#161A1E',
                    color: '#E8EAED'
                }).then((result) => {
                    if (result.isConfirmed) document.getElementById('buy-form').submit();
                });
            });
        }

        const bidBtn = document.getElementById('bid-button');
        if (bidBtn) {
            bidBtn.addEventListener('click', function() {
                const amount = document.querySelector('#bid-form input[name="amount"]').value;
                if (!amount || amount <= 0) {
                    Swal.fire({ title: 'Error', text: 'Please enter a valid bid amount.', icon: 'error', background: '#161A1E', color: '#E8EAED', confirmButtonColor: '#059669' });
                    return;
                }
                Swal.fire({
                    title: 'Confirm Bid',
                    text: 'Place a bid of ' + amount + ' ETH?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#059669',
                    cancelButtonColor: '#2A2F36',
                    confirmButtonText: 'Yes, Place Bid',
                    cancelButtonText: 'Cancel',
                    background: '#161A1E',
                    color: '#E8EAED'
                }).then((result) => {
                    if (result.isConfirmed) document.getElementById('bid-form').submit();
                });
            });
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\nfts\details.blade.php ENDPATH**/ ?>