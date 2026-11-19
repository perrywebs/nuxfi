
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.page-header','data' => ['title' => 'Create Trading Bot','subtitle' => 'Configure a new AI trading bot']]); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Create Trading Bot','subtitle' => 'Configure a new AI trading bot']); ?>
     <?php $__env->slot('actions', null, []); ?> 
        <a href="<?php echo e(route('admin.bot-trading.index')); ?>" class="bg-surface-alt text-content border border-border hover:bg-surface-alt/80 rounded-lg px-4 py-2 text-sm font-medium">Cancel</a>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<form action="<?php echo e(route('admin.bot-trading.store')); ?>" method="POST" class="mt-6">
    <?php echo csrf_field(); ?>

    <?php if($errors->any()): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.alert','data' => ['type' => 'danger']]); ?>
<?php $component->withName('admin.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'danger']); ?>
            <ul class="list-disc list-inside text-sm">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.card','data' => []]); ?>
<?php $component->withName('admin.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
        
        <fieldset class="mb-8">
            <legend class="text-base font-semibold text-content mb-4">Basic Information</legend>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Bot Name','for' => 'name','error' => $errors->first('name'),'required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Bot Name','for' => 'name','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('name')),'required' => true]); ?>
                    <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" placeholder="e.g. Quantum Trader AI" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Strategy Type','for' => 'strategy_type','error' => $errors->first('strategy_type'),'required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Strategy Type','for' => 'strategy_type','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('strategy_type')),'required' => true]); ?>
                    <select name="strategy_type" id="strategy_type" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary">
                        <option value="scalping" <?php echo e(old('strategy_type') === 'scalping' ? 'selected' : ''); ?>>Scalping</option>
                        <option value="day_trading" <?php echo e(old('strategy_type', 'day_trading') === 'day_trading' ? 'selected' : ''); ?>>Day Trading</option>
                        <option value="swing" <?php echo e(old('strategy_type') === 'swing' ? 'selected' : ''); ?>>Swing Trading</option>
                    </select>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>

            <div class="mt-5">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Description','for' => 'description','error' => $errors->first('description')]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Description','for' => 'description','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('description'))]); ?>
                    <textarea name="description" id="description" rows="4" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content placeholder:text-content-muted focus:ring-2 focus:ring-primary/30 focus:border-primary min-h-[120px] resize-y" placeholder="Describe the bot's trading strategy..."><?php echo e(old('description')); ?></textarea>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </fieldset>

        
        <fieldset class="mb-8">
            <legend class="text-base font-semibold text-content mb-4">Performance Configuration</legend>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Win Rate (%)','for' => 'win_rate','error' => $errors->first('win_rate'),'required' => true,'helper' => 'Recommended: 60-90%']]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Win Rate (%)','for' => 'win_rate','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('win_rate')),'required' => true,'helper' => 'Recommended: 60-90%']); ?>
                    <input type="number" name="win_rate" id="win_rate" value="<?php echo e(old('win_rate', 70)); ?>" step="0.01" min="1" max="100" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Expected Daily ROI (%)','for' => 'expected_roi','error' => $errors->first('expected_roi'),'required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Expected Daily ROI (%)','for' => 'expected_roi','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('expected_roi')),'required' => true]); ?>
                    <input type="number" name="expected_roi" id="expected_roi" value="<?php echo e(old('expected_roi', 2.5)); ?>" step="0.01" min="0.01" max="100" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Trade Interval (minutes)','for' => 'trade_interval_minutes','error' => $errors->first('trade_interval_minutes'),'required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Trade Interval (minutes)','for' => 'trade_interval_minutes','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('trade_interval_minutes')),'required' => true]); ?>
                    <input type="number" name="trade_interval_minutes" id="trade_interval_minutes" value="<?php echo e(old('trade_interval_minutes', 5)); ?>" min="1" max="1440" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </fieldset>

        
        <fieldset class="mb-8">
            <legend class="text-base font-semibold text-content mb-4">Investment Limits</legend>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Min Investment ($)','for' => 'min_investment','error' => $errors->first('min_investment'),'required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Min Investment ($)','for' => 'min_investment','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('min_investment')),'required' => true]); ?>
                    <input type="number" name="min_investment" id="min_investment" value="<?php echo e(old('min_investment', 100)); ?>" step="0.01" min="1" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Max Investment ($)','for' => 'max_investment','error' => $errors->first('max_investment'),'required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Max Investment ($)','for' => 'max_investment','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('max_investment')),'required' => true]); ?>
                    <input type="number" name="max_investment" id="max_investment" value="<?php echo e(old('max_investment', 50000)); ?>" step="0.01" min="1" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Max Duration (days)','for' => 'max_duration_days','error' => $errors->first('max_duration_days'),'required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Max Duration (days)','for' => 'max_duration_days','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('max_duration_days')),'required' => true]); ?>
                    <input type="number" name="max_duration_days" id="max_duration_days" value="<?php echo e(old('max_duration_days', 90)); ?>" min="1" max="365" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </fieldset>

        
        <fieldset class="mb-8">
            <legend class="text-base font-semibold text-content mb-4">Profit/Loss Ranges (per-trade %)</legend>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="bg-success-light/30 border border-success/20 rounded-lg p-4">
                    <h4 class="text-sm font-semibold text-success mb-3">Profit Range</h4>
                    <div class="grid grid-cols-2 gap-4">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Min Profit (%)','for' => 'profit_min_pct','error' => $errors->first('profit_min_pct'),'required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Min Profit (%)','for' => 'profit_min_pct','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('profit_min_pct')),'required' => true]); ?>
                            <input type="number" name="profit_min_pct" id="profit_min_pct" value="<?php echo e(old('profit_min_pct', 0.5)); ?>" step="0.01" min="0.01" max="100" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Max Profit (%)','for' => 'profit_max_pct','error' => $errors->first('profit_max_pct'),'required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Max Profit (%)','for' => 'profit_max_pct','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('profit_max_pct')),'required' => true]); ?>
                            <input type="number" name="profit_max_pct" id="profit_max_pct" value="<?php echo e(old('profit_max_pct', 3.0)); ?>" step="0.01" min="0.01" max="100" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                </div>
                <div class="bg-danger-light/30 border border-danger/20 rounded-lg p-4">
                    <h4 class="text-sm font-semibold text-danger mb-3">Loss Range</h4>
                    <div class="grid grid-cols-2 gap-4">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Min Loss (%)','for' => 'loss_min_pct','error' => $errors->first('loss_min_pct'),'required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Min Loss (%)','for' => 'loss_min_pct','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('loss_min_pct')),'required' => true]); ?>
                            <input type="number" name="loss_min_pct" id="loss_min_pct" value="<?php echo e(old('loss_min_pct', 0.2)); ?>" step="0.01" min="0.01" max="100" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.form-group','data' => ['label' => 'Max Loss (%)','for' => 'loss_max_pct','error' => $errors->first('loss_max_pct'),'required' => true]]); ?>
<?php $component->withName('admin.form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Max Loss (%)','for' => 'loss_max_pct','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('loss_max_pct')),'required' => true]); ?>
                            <input type="number" name="loss_max_pct" id="loss_max_pct" value="<?php echo e(old('loss_max_pct', 1.5)); ?>" step="0.01" min="0.01" max="100" class="w-full bg-surface-card border border-border rounded-lg px-3.5 py-2.5 text-sm text-content focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                </div>
            </div>
        </fieldset>

        
        <fieldset class="mb-6">
            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_active" id="is_active" value="1" <?php echo e(old('is_active', true) ? 'checked' : ''); ?> class="w-4 h-4 rounded border-border text-primary focus:ring-primary/30">
                <label for="is_active" class="text-sm font-medium text-content">Active (visible to users)</label>
            </div>
        </fieldset>

        <div class="flex items-center gap-3 pt-4 border-t border-border">
            <button type="submit" class="bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-6 py-2.5 text-sm font-medium">Create Bot</button>
            <a href="<?php echo e(route('admin.bot-trading.index')); ?>" class="text-content-secondary hover:text-content text-sm">Cancel</a>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\bot-trading\create.blade.php ENDPATH**/ ?>