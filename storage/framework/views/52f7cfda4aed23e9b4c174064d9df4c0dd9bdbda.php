
<?php $btnColor = $color ?? '#059669'; ?>
<table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin: 0 auto;">
    <tr>
        <td align="center" class="btn-td" style="background-color: <?php echo e($btnColor); ?>; border-radius: 6px; padding: 14px 28px;">
            <!--[if mso]>
            <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word"
                href="<?php echo e($url); ?>" style="height:44px;v-text-anchor:middle;width:200px;" arcsize="14%"
                fillcolor="<?php echo e($btnColor); ?>" stroke="f">
            <w:anchorlock/>
            <center style="color:#ffffff;font-family:Arial,sans-serif;font-size:15px;font-weight:bold;">
                <?php echo e($label); ?>

            </center>
            </v:roundrect>
            <![endif]-->
            <!--[if !mso]><!-->
            <a href="<?php echo e($url); ?>" target="_blank"
               style="display: inline-block; color: #FFFFFF; font-size: 15px; font-weight: 600; text-decoration: none; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">
                <?php echo e($label); ?>

            </a>
            <!--<![endif]-->
        </td>
    </tr>
</table>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/emails/partials/button.blade.php ENDPATH**/ ?>