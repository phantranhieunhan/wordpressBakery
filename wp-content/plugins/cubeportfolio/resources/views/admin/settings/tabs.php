<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 7/13/2017
 * Time: 2:13 PM
 */
?>

<div class="settings-wrap">
    <div class="settings-sections-wrap">
        <form id="settings_form" action="admin.php?page=nextcode_gallerystyles&action=save_settings" method="post">
            <?php if (!empty($title)): ?>
                <div class="settings-head">
                    <h1><?php echo $title; ?></h1>
                    <div class="settings-save-head">
                        <input type="submit" class="settings-save" value="<?php _e('Save Settings', 'nextcodegallery'); ?>"/>
                        <span class="spinner"></span>
                        <p class="pro_save_message">This action is available in PRO version</p>
                    </div>
                </div>


            <?php endif; ?>
            <input type="hidden" name="action" value="save_nextcode_lightbox_settings"/>
            <?php wp_nonce_field('nextcode_gallerysettings'); ?>
            <div id="settings_tab">
                <ul >
                    <?php foreach ($tabs as $key => $tab): ?>
                        <li><a href="#<?= $key ?>"><?= $tab["title"] ?></a></li>
                    <?php endforeach; ?>
                    <!--                    <a href="#" id="realtimepreview" data-enable="off">Real Time preview OFF</a>-->
                </ul>
                <div class="pro_message">These options are available in PRO version. Go PRO to open theme. <a href="https://pluginjungle.com/downloads/image-gallery/" target="_blank">Upgrade</a>
                </div>
                <div class="styles_wrapper">
                    <?php foreach ($tabs as $id => $tab): ?>
                        <?php \NextcodeGallery\Helpers\View::render('admin/settings/styles.php', compact('sections', 'id', 'fields')); ?>
                    <?php endforeach; ?>
                </div>
            </div>
           <!--<div class="settings-save-wrap">
                <input type="submit" class="settings-save" value="<?php _e('Save Settings', 'nextcodegallery'); ?>"/>
                <span class="spinner"></span>
                <p class="pro_save_message">This action is available in PRO version</p>
            </div>-->
        </form>

        <div class="nextcode_galleryscrollup"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
    </div>
</div>

