
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

    
    <?php echo $__env->make('user.partials.ticker-tape', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->make('user.partials.quick-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->make('user.partials.page-header', ['title' => 'Courses', 'subtitle' => 'Browse and enroll in trading courses'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('user.system-courses', [])->html();
} elseif ($_instance->childHasBeenRendered('PHm8VUO')) {
    $componentId = $_instance->getRenderedChildComponentId('PHm8VUO');
    $componentTag = $_instance->getRenderedChildComponentTagName('PHm8VUO');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('PHm8VUO');
} else {
    $response = \Livewire\Livewire::mount('user.system-courses', []);
    $html = $response->html();
    $_instance->logRenderedChild('PHm8VUO', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\membership\courses.blade.php ENDPATH**/ ?>