<?php
    $assets = [
        ['name' => 'Bitcoin',      'symbol' => 'BTC',  'key' => 'btc'],
        ['name' => 'Ethereum',     'symbol' => 'ETH',  'key' => 'eth'],
        ['name' => 'Litecoin',     'symbol' => 'LTC',  'key' => 'ltc'],
        ['name' => 'Chainlink',    'symbol' => 'LINK', 'key' => 'link'],
        ['name' => 'Binance Coin', 'symbol' => 'BNB',  'key' => 'bnb'],
        ['name' => 'Aave',         'symbol' => 'AAVE', 'key' => 'aave'],
        ['name' => 'Tether',       'symbol' => 'USDT', 'key' => 'usdt'],
        ['name' => 'Bitcoin Cash', 'symbol' => 'BCH',  'key' => 'bch'],
        ['name' => 'Ripple',       'symbol' => 'XRP',  'key' => 'xrp'],
        ['name' => 'Stellar',      'symbol' => 'XLM',  'key' => 'xlm'],
        ['name' => 'Ada',          'symbol' => 'ADA',  'key' => 'ada'],
    ];
?>

<?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="border-b border-border last:border-0 hover:bg-surface-alt/50 transition-colors">
        <td class="px-4 py-3.5 text-sm font-medium text-content"><?php echo e($asset['name']); ?></td>
        <td class="px-4 py-3.5 text-sm text-content-secondary"><?php echo e($asset['symbol']); ?></td>
        <td class="px-4 py-3.5 text-sm">
            <?php if($moresettings->{$asset['key']} == 'enabled'): ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.badge','data' => ['type' => 'success']]); ?>
<?php $component->withName('admin.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'success']); ?>enabled <?php echo $__env->renderComponent(); ?>
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
<?php $component->withAttributes(['type' => 'danger']); ?>disabled <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php endif; ?>
        </td>
        <td class="px-4 py-3.5">
            <?php if($moresettings->{$asset['key']} == 'enabled'): ?>
                <a href="<?php echo e(route('setassetstatus', ['asset' => $asset['key'], 'status' => 'disabled'])); ?>"
                    class="bg-danger text-white hover:bg-danger/90 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">Disable</a>
            <?php else: ?>
                <a href="<?php echo e(route('setassetstatus', ['asset' => $asset['key'], 'status' => 'enabled'])); ?>"
                    class="bg-success text-white hover:bg-success/90 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">Enable</a>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\admin\Settings\Crypto\assets.blade.php ENDPATH**/ ?>