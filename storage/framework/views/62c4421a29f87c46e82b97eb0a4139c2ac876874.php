<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light" />
    <meta name="supported-color-schemes" content="light" />
    <title><?php echo $__env->yieldContent('title', $settings->site_name ?? config('app.name')); ?></title>
    <style>
        /* Reset */
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        body { margin: 0 !important; padding: 0 !important; width: 100% !important; }

        /* Responsive */
        @media  only screen and (max-width: 620px) {
            .email-container { width: 100% !important; max-width: 100% !important; }
            .email-body-inner { padding: 24px 20px !important; }
            .email-header-inner { padding: 16px 20px !important; }
            .email-footer-inner { padding: 20px !important; }
            .detail-table { width: 100% !important; }
            .btn-td { padding: 12px 24px !important; }
        }
    </style>
    <!--[if mso]>
    <style type="text/css">
        body, table, td { font-family: Arial, Helvetica, sans-serif !important; }
    </style>
    <![endif]-->
</head>
<body style="margin: 0; padding: 0; background-color: #F5F7F9; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

    
    <?php if (! empty(trim($__env->yieldContent('preheader')))): ?>
    <div style="display: none; max-height: 0; overflow: hidden; mso-hide: all;">
        <?php echo $__env->yieldContent('preheader'); ?>
    </div>
    <?php endif; ?>

    
    <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color: #F5F7F9;">
        <tr>
            <td align="center" style="padding: 24px 0;">

                
                <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="600" class="email-container" style="max-width: 600px; width: 100%; border-radius: 8px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.08);">

                    
                    <tr>
                        <td align="center" class="email-header-inner" style="background-color: #059669; padding: 24px 32px;">
                            <?php if(!empty($settings->logo)): ?>
                                <a href="<?php echo e(config('app.url')); ?>" target="_blank" style="text-decoration: none;">
                                    <img src="<?php echo e(asset('storage/app/public/' . $settings->logo)); ?>"
                                         alt="<?php echo e($settings->site_name ?? config('app.name')); ?>"
                                         height="48"
                                         style="display: block; max-height: 48px; width: auto; border: 0;" />
                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(config('app.url')); ?>" target="_blank" style="text-decoration: none;">
                                    <span style="color: #FFFFFF; font-size: 22px; font-weight: 700; letter-spacing: -0.5px;">
                                        <?php echo e($settings->site_name ?? config('app.name')); ?>

                                    </span>
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>

                    
                    <tr>
                        <td class="email-body-inner" style="background-color: #FFFFFF; padding: 32px 40px;">

                            
                            <?php if (! empty(trim($__env->yieldContent('greeting')))): ?>
                                <p style="margin: 0 0 20px; font-size: 16px; line-height: 1.5; color: #374151;">
                                    <?php echo $__env->yieldContent('greeting'); ?>
                                </p>
                            <?php endif; ?>

                            
                            <?php echo $__env->yieldContent('content'); ?>

                            
                            <?php if (! empty(trim($__env->yieldContent('action')))): ?>
                                <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin: 28px 0;">
                                    <tr>
                                        <td>
                                            <?php echo $__env->yieldContent('action'); ?>
                                        </td>
                                    </tr>
                                </table>
                            <?php endif; ?>

                            
                            <p style="margin: 28px 0 0; font-size: 15px; line-height: 1.6; color: #374151;">
                                <?php echo $__env->yieldContent('signoff', 'Best regards'); ?>,<br />
                                <strong><?php echo e($settings->site_name ?? config('app.name')); ?> Team</strong>
                            </p>

                        </td>
                    </tr>

                    
                    <tr>
                        <td class="email-footer-inner" style="background-color: #0F1115; padding: 28px 32px; text-align: center;">

                            <?php if(!empty($settings->site_address)): ?>
                                <p style="margin: 0 0 8px; font-size: 13px; line-height: 1.5; color: #9CA3AF;">
                                    <?php echo e($settings->site_address); ?>

                                </p>
                            <?php endif; ?>

                            <?php if(!empty($settings->contact_email)): ?>
                                <p style="margin: 0 0 16px; font-size: 13px; line-height: 1.5; color: #9CA3AF;">
                                    <a href="mailto:<?php echo e($settings->contact_email); ?>" style="color: #059669; text-decoration: none;">
                                        <?php echo e($settings->contact_email); ?>

                                    </a>
                                </p>
                            <?php endif; ?>

                            <p style="margin: 0; font-size: 12px; line-height: 1.5; color: #6B7280;">
                                &copy; <?php echo e(date('Y')); ?> <?php echo e($settings->site_name ?? config('app.name')); ?>. All rights reserved.
                            </p>

                        </td>
                    </tr>

                </table>
                

            </td>
        </tr>
    </table>
    

</body>
</html>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\emails\layouts\master.blade.php ENDPATH**/ ?>