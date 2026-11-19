<div>
    <?php if($hasSubscribe): ?>
        
        <div class="text-center py-4">
            <div class="w-16 h-16 mx-auto bg-emerald-500/10 rounded-full flex items-center justify-center mb-4">
                <?php echo $__env->make('components.icons.check-circle', ['class' => 'w-10 h-10 text-emerald-400'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <p class="text-sm text-[#E8EAED] font-medium">Subscription activated successfully!</p>
            <p class="text-xs text-[#6B7280] mt-2">
                You now have access to premium trading signals. Visit the signals page to view them.
            </p>
        </div>
    <?php else: ?>
        
        <form wire:submit.prevent="subscribe" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-[#9AA0AB] mb-2">Choose Plan</label>
                <select wire:model="planId" wire:change="calculate"
                    class="w-full bg-[#1C2127] border border-[#2A2F36] rounded-lg px-4 py-2.5 text-[#E8EAED] focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-colors">
                    <option value="Choose">Select a Plan</option>
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($plan->id); ?>"><?php echo e($plan->name); ?> — <?php echo e($plan->duration); ?> days</option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-[#9AA0AB] mb-2">Amount</label>
                <input type="number" wire:model="amount" readonly
                    class="w-full bg-[#1C2127] border border-[#2A2F36] rounded-lg px-4 py-2.5 text-[#E8EAED] opacity-75 cursor-not-allowed focus:outline-none">
                <p class="text-xs text-[#6B7280] mt-1.5">You will be redirected to a crypto payment page. Your wallet balance is not used.</p>
            </div>
            <div>
                <button type="submit"
                    class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-6 py-2.5 rounded-lg transition-colors">
                    Subscribe
                </button>
            </div>
        </form>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\livewire\user\subscribe-to-signal.blade.php ENDPATH**/ ?>