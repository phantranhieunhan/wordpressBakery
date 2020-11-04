<div class="wrap nextcode_gallerylist_container " id="nextcodegallery-settings">

    <div class="nextcode_gallerycontent" style="padding:0px;">

        <div class="nextcodegallery-list-header">
            <button id="save-form-button"><?php _e('Save'); ?></button>
        </div>

        <form id="nextcode-gallery">
            <div class="one-third">
                <div class="setting-block">
                    <div class="setting-block-title">
                        <img src="<?php echo NEXTCODEGALLERY_IMAGES_URL . 'icons/uninstall.png'; ?>">
                        <?php _e('Uninstall', NEXTCODEGALLERY_TEXT_DOMAIN); ?>
                    </div>

                    <div class="setting-row">
                        <p><?php _e('The option is switched OFF by default.', NEXTCODEGALLERY_TEXT_DOMAIN); ?></p>
                        <label class="switcher switch-checkbox" for="remove-tables-uninstall">
                            <div class="three-fourth">
                                <?php _e('Turn the option ON before uninstalling the plugin, if you want to remove all plugin related data (Database tables)', NEXTCODEGALLERY_TEXT_DOMAIN); ?>
                            </div>
                            <div class="one-fourth">
                                <input type="hidden"
                                       name="nextcode_galleryremovetablesuninstall"
                                       value="off"/>
                                <input type="checkbox"
                                       class="switch-checkbox" <?php checked('on', get_option("nextcode_galleryremovetablesuninstall")) ?>
                                       name="nextcode_galleryremovetablesuninstall" id="remove-tables-uninstall"><span
                                        class="switch"></span>
                            </div>
                        </label>
                    </div>
                </div>

            </div>
        </form>
    </div>

</div>
<?php
?>
