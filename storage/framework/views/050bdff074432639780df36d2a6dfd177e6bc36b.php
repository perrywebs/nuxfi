
<?php
    $avatarName = $user->username ?: ($user->name ?: 'User');
    $parts = preg_split('/\s+/', trim($avatarName));
    $first = mb_substr($parts[0] ?? 'U', 0, 1);
    $second = isset($parts[1]) ? mb_substr($parts[1], 0, 1) : (mb_strlen($parts[0] ?? '') > 1 ? mb_substr($parts[0], 1, 1) : '');
    $initials = strtoupper($first . $second);
?>
<?php if(!empty($user->profile_photo_path)): ?>
    <img src="<?php echo e(asset('storage/app/public/' . $user->profile_photo_path)); ?>" alt="<?php echo e($avatarName); ?>"
         class="<?php echo e($class ?? 'w-10 h-10 text-sm'); ?> rounded-full object-cover bg-surface-overlay ring-2 ring-surface-border shrink-0"
         loading="lazy">
<?php else: ?>
    <div class="<?php echo e($class ?? 'w-10 h-10 text-sm'); ?> rounded-full bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center font-semibold text-content-inverse ring-2 ring-surface-border shrink-0">
        <?php echo e($initials); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\partials\earner-avatar.blade.php ENDPATH**/ ?>