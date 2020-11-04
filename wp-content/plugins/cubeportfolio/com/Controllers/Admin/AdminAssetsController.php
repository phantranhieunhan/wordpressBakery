<?php

namespace NextcodeGallery\Controllers\Admin;

use NextcodeGallery;


class AdminAssetsController
{
    public static function init()
    {
        add_action('admin_enqueue_scripts', array(__CLASS__, 'adminStyles'));
        add_action('admin_enqueue_scripts', array(__CLASS__, 'adminScripts'));
    }

    /**
     * @param $hook
     */
    public static function adminStyles($hook)
    {

        if ($hook === \NextcodeGallery()->admin->Pages['main_page'] || $hook === \NextcodeGallery()->admin->Pages['styles'] || $hook === \NextcodeGallery()->admin->Pages['settings']) {


            wp_enqueue_style('jqueryUI', \NextcodeGallery()->pluginUrl() . '/resources/assets/css/jquery-ui.min.css');

            wp_enqueue_style('fontAwesome', \NextcodeGallery()->pluginUrl() . '/resources/assets/css/font-awesome.min.css', false);

            wp_enqueue_style('nextcodegallerytoastrjs', \NextcodeGallery()->pluginUrl() . '/resources/assets/css/admin/toastr.css');

            wp_enqueue_style('nextcodegalleryBannerStyle', \NextcodeGallery()->pluginUrl() . '/resources/assets/css/admin/banner.css');

            wp_enqueue_style('roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=cyrillic');

        }


        if ($hook === \NextcodeGallery()->admin->Pages['main_page'] || $hook === \NextcodeGallery()->admin->Pages['settings']) {
            wp_enqueue_style('nextcodegalleryAdminStyles', \NextcodeGallery()->pluginUrl() . '/resources/assets/css/admin/main.css');
        }

        if ($hook == \NextcodeGallery()->admin->Pages["main_page"]) {
            wp_enqueue_style('nextcode_gallerymodal', \NextcodeGallery()->pluginUrl() . '/resources/assets/css/admin/nextcodegallery-modal.css', false);
        }

        if ($hook === \NextcodeGallery()->admin->Pages['settings']) {
            wp_enqueue_style('nextcodegallerySettings', \NextcodeGallery()->pluginUrl() . '/resources/assets/css/admin/settings.css');
        }

        if ($hook === \NextcodeGallery()->admin->Pages['styles']) {
            wp_enqueue_style('nextcodegalleryStyleSettings', \NextcodeGallery()->pluginUrl() . '/resources/assets/css/admin/style_settings.css');
        }

    }

    /**
     * @param $hook
     */
    public static function adminScripts($hook)
    {
        wp_enqueue_script('jquery');

        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-tabs');


        wp_enqueue_script('masonry');


        wp_enqueue_script('nextcodegallerytoastrjs', \NextcodeGallery()->pluginUrl() . '/resources/assets/js/admin/toastr.min.js');

        if ($hook === \NextcodeGallery()->admin->Pages['main_page']) {

            wp_enqueue_media();


            if (isset($_GET['task']) && $_GET['task'] == 'edit_gallery') {
                wp_enqueue_script('nextcode_gallerymodal', \NextcodeGallery()->pluginUrl() . '/resources/assets/js/admin/nextcodegallery_modal.js', array('jquery'), false, true);
            }

            wp_enqueue_script('nextcodegalleryAdminJs', \NextcodeGallery()->pluginUrl() . '/resources/assets/js/admin/main.js', array('jquery', 'jquery-ui-core', 'jquery-ui-tabs'), false, true);
        }

        if (in_array($hook, array('post.php', 'post-new.php'))) {
            wp_enqueue_script("nextcodegalleryInlinePopup", \NextcodeGallery()->pluginUrl() . "/resources/assets/js/admin/inline-popup.js", array('jquery'), false, true);
        }

        if ($hook === \NextcodeGallery()->admin->Pages['settings']) {
            wp_enqueue_script('nextcodegallerySettings', \NextcodeGallery()->pluginUrl() . '/resources/assets/js/admin/settings.js', array('jquery'), false, true);
        }

        if ($hook === \NextcodeGallery()->admin->Pages['styles']) {
            wp_enqueue_script('nextcode_gallerystyles', \NextcodeGallery()->pluginUrl() . '/resources/assets/js/admin/styles_settings.js', array('jquery', 'jquery-ui-core', 'jquery-ui-tabs', 'nextcodegallerytoastrjs'), false, true);
            wp_enqueue_script('nextcode_galleryjscolor', \NextcodeGallery()->pluginUrl() . '/resources/assets/js/admin/jscolor.js', array(), false, true);
        }


        self::localizeScripts();

    }

    public static function localizeScripts()
    {

        wp_localize_script('nextcodegalleryAdminJs', 'nextcode_gallerysave', array(
            'nonce' => wp_create_nonce('nextcode_gallerysave_gallery'),
        ));

        wp_localize_script('nextcodegalleryInlinePopup', 'nextcode_galleryinlinePopup', array(
            'nonce' => wp_create_nonce('nextcode_gallerysave_shortcode_options'),
        ));

        wp_localize_script('nextcodegallerySettings', 'nextcode_gallerysettingsSave', array(
            'nonce' => wp_create_nonce('nextcode_gallerysave_plugin_settings'),
        ));

    }
}
