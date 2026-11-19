<div>
    <?php if($errors->any()): ?>
        <div x-data="{ show: true }" x-show="show" x-transition class="p-4 rounded-lg bg-loss/10 border border-loss/20 mb-4" role="alert">
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center gap-2">
                    <?php echo $__env->make('components.icons.exclamation-triangle', ['class' => 'w-5 h-5 text-loss'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <p class="text-sm font-medium text-loss">Please fix the following errors:</p>
                </div>
                <button @click="show = false" class="text-loss/60 hover:text-loss transition">
                    <?php echo $__env->make('components.icons.x-mark', ['class' => 'w-4 h-4'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </button>
            </div>
            <ul class="list-disc list-inside space-y-1 pl-7">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="text-sm text-loss/90"><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\components\error-alert.blade.php ENDPATH**/ ?>