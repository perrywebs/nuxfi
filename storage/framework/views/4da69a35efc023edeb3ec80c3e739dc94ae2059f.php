<?php $__env->startSection('title', 'App Settings'); ?>

<?php $__env->startSection('content'); ?>
    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'App Settings','subtitle' => 'Configure your website information, preferences, email, and integrations.']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'App Settings','subtitle' => 'Configure your website information, preferences, email, and integrations.']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    
    <?php if(count($errors) > 0): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.alert','data' => ['type' => 'danger','dismissible' => true]]); ?>
<?php $component->withName('admin.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger','dismissible' => true]); ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div><?php echo e($error); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endif; ?>

    
    <div x-data="{ activeTab: 'info' }" class="mt-6">
        
        <div class="flex gap-1 border-b border-border overflow-x-auto">
            <button @click="activeTab = 'module'"
                :class="activeTab === 'module' ? 'border-primary text-primary' : 'border-transparent text-content-muted hover:text-content-secondary hover:border-border-strong'"
                class="px-4 py-2.5 text-sm font-medium border-b-2 transition-colors whitespace-nowrap -mb-px">
                Modules
            </button>
            <button @click="activeTab = 'info'"
                :class="activeTab === 'info' ? 'border-primary text-primary' : 'border-transparent text-content-muted hover:text-content-secondary hover:border-border-strong'"
                class="px-4 py-2.5 text-sm font-medium border-b-2 transition-colors whitespace-nowrap -mb-px">
                Website Information
            </button>
            <button @click="activeTab = 'pref'"
                :class="activeTab === 'pref' ? 'border-primary text-primary' : 'border-transparent text-content-muted hover:text-content-secondary hover:border-border-strong'"
                class="px-4 py-2.5 text-sm font-medium border-b-2 transition-colors whitespace-nowrap -mb-px">
                Preferences
            </button>
            <button @click="activeTab = 'email'"
                :class="activeTab === 'email' ? 'border-primary text-primary' : 'border-transparent text-content-muted hover:text-content-secondary hover:border-border-strong'"
                class="px-4 py-2.5 text-sm font-medium border-b-2 transition-colors whitespace-nowrap -mb-px">
                Email / Auth
            </button>
            <button @click="activeTab = 'display'"
                :class="activeTab === 'display' ? 'border-primary text-primary' : 'border-transparent text-content-muted hover:text-content-secondary hover:border-border-strong'"
                class="px-4 py-2.5 text-sm font-medium border-b-2 transition-colors whitespace-nowrap -mb-px">
                Theme / Display
            </button>
            <button @click="activeTab = 'apiconfig'"
                :class="activeTab === 'apiconfig' ? 'border-primary text-primary' : 'border-transparent text-content-muted hover:text-content-secondary hover:border-border-strong'"
                class="px-4 py-2.5 text-sm font-medium border-b-2 transition-colors whitespace-nowrap -mb-px">
                API Configuration
            </button>
        </div>

        
        <div class="mt-6">
            
            <div x-show="activeTab === 'module'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.software-module', [])->html();
} elseif ($_instance->childHasBeenRendered('hmTOrNp')) {
    $componentId = $_instance->getRenderedChildComponentId('hmTOrNp');
    $componentTag = $_instance->getRenderedChildComponentTagName('hmTOrNp');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('hmTOrNp');
} else {
    $response = \Livewire\Livewire::mount('admin.software-module', []);
    $html = $response->html();
    $_instance->logRenderedChild('hmTOrNp', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>

            
            <div x-show="activeTab === 'info'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <?php echo $__env->make('admin.Settings.AppSettings.webinfo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            
            <div x-show="activeTab === 'pref'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <?php echo $__env->make('admin.Settings.AppSettings.webpreference', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            
            <div x-show="activeTab === 'email'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <?php echo $__env->make('admin.Settings.AppSettings.email', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            
            <div x-show="activeTab === 'display'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <?php echo $__env->make('admin.Settings.AppSettings.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            
            <div x-show="activeTab === 'apiconfig'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <?php echo $__env->make('admin.Settings.AppSettings.apiconfig', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Select2 initialization
    $(document).ready(function() {
        $('.select2').select2({
            width: '100%'
        });
    });

    // Theme form submit handler
    document.getElementById("themeForm")?.addEventListener('submit', function(){
        document.getElementById("themeBtn").disabled = true;
        var element = document.getElementById("loadingTheme");
        element.classList.remove("hidden");
    });

    // Currency select handler
    function changecurr() {
        var e = document.getElementById("select_c");
        var selected = e.options[e.selectedIndex].id;
        document.getElementById("s_c").value = selected;
    }

    // AJAX: Preferences form
    $('#updatepreference').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('updatepreference')); ?>",
            type: 'POST',
            data: $('#updatepreference').serialize(),
            success: function(response) {
                if (response.status === 200) {
                    Swal.fire({ icon: 'success', title: 'Success', text: response.success, timer: 3000, showConfirmButton: false });
                }
            },
            error: function(error) {
                Swal.fire({ icon: 'error', title: 'Error', text: 'Something went wrong.' });
            },
        });
    });

    // SMTP toggle logic
    let sendmail = document.querySelector('#sendmailserver');
    let smtp = document.querySelector('#smtpserver');
    let smtptext = document.querySelectorAll('.smtp-field');

    if (sendmail && smtp) {
        sendmail.addEventListener('click', sortform);
        smtp.addEventListener('click', sortform);

        if (smtp.checked) {
            smtptext.forEach(el => { el.classList.remove('hidden'); el.setAttribute('required', ''); });
        }

        function sortform() {
            if (sendmail.checked) {
                smtptext.forEach(el => { el.classList.add('hidden'); el.removeAttribute('required'); });
            }
            if (smtp.checked) {
                smtptext.forEach(el => { el.classList.remove('hidden'); el.setAttribute('required', ''); });
            }
        }
    }

    // AJAX: Email settings form
    $('#emailform').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('updateemailpreference')); ?>",
            type: 'POST',
            data: $('#emailform').serialize(),
            success: function(response) {
                if (response.status === 200) {
                    Swal.fire({ icon: 'success', title: 'Success', text: response.success, timer: 3000, showConfirmButton: false });
                }
            },
            error: function(error) {
                Swal.fire({ icon: 'error', title: 'Error', text: 'Something went wrong.' });
            },
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\Settings\AppSettings\show.blade.php ENDPATH**/ ?>