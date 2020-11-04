<?php

namespace NextcodeGallery\Controllers\Admin;

use NextcodeGallery\Helpers\View;
use NextcodeGallery\Models\Gallery;


class AdminController
{
    /**
     * Array of pages in admin
     *
     * @var array
     */
    public $Pages;

    public function __construct()
    {


        add_action('admin_footer', array('NextcodeGallery\Controllers\Admin\ShortcodeController', 'showInlinePopup'));

        add_action('media_buttons_context', array('NextcodeGallery\Controllers\Admin\ShortcodeController', 'showEditorMediaButton'));

        add_action('admin_menu', array($this, 'adminMenu'), 1);

        add_action('admin_init', array(__CLASS__, 'deleteGallery'), 1);

        add_action('admin_init', array(__CLASS__, 'duplicateGallery'), 1);

        add_action('admin_init', array(__CLASS__, 'createGallery'), 1);

    }


    public static function isRequest($page, $task, $method = 'GET')
    {
        return ($_SERVER['REQUEST_METHOD'] === $method && isset($_GET['page']) && $_GET['page'] === $page && isset($_GET['task']) && $_GET['task'] === $task);
    }

    /**
     * Add admin menu pages
     */
    public function adminMenu()
    {
        $this->Pages['main_page'] = add_menu_page(__('NextCode Gallery', NEXTCODEGALLERY_TEXT_DOMAIN), __('NextCode Gallery', NEXTCODEGALLERY_TEXT_DOMAIN), 'manage_options', 'nextcodegallery', array(
            $this,
            'mainPage'
        ), \NextcodeGallery()->pluginUrl() . '/resources/assets/images/icons/logo_small.png');

        $this->Pages['main_page'] = add_submenu_page('nextcodegallery', __('Galleries', NEXTCODEGALLERY_TEXT_DOMAIN), __('Galleries', NEXTCODEGALLERY_TEXT_DOMAIN), 'manage_options', 'nextcodegallery', array(
            $this,
            'mainPage'
        ));

        $this->Pages['styles'] = add_submenu_page('nextcodegallery', __('Views / Styles (Pro)', NEXTCODEGALLERY_TEXT_DOMAIN), __('Views / Styles (Pro)', NEXTCODEGALLERY_TEXT_DOMAIN), 'manage_options', 'nextcode_gallerystyles', array(
            $this,
            'stylesPage'
        ));

        $this->Pages['settings'] = add_submenu_page('nextcodegallery', __('Settings', NEXTCODEGALLERY_TEXT_DOMAIN), __('Settings', NEXTCODEGALLERY_TEXT_DOMAIN), 'manage_options', 'nextcode_gallerysettings', array(
            $this,
            'settingsPage'
        ));
    }


    /**
     * Initialize main page
     */
    public function mainPage()
    {
        View::render('admin/header-banner.php');

        if (!isset($_GET['task'])) {

            View::render('admin/galleries-list.php');

        } else {

            $task = $_GET['task'];

            switch ($task) {
                case 'edit_gallery':


                    if (!isset($_GET['id'])) {

                        \NextcodeGallery()->admin->printError(__('Missing "id" parameter.', NEXTCODEGALLERY_TEXT_DOMAIN));

                    }

                    $id = absint($_GET['id']);

                    if (!$id) {

                        \NextcodeGallery()->admin->printError(__('"id" parameter must be not negative integer.', NEXTCODEGALLERY_TEXT_DOMAIN));

                    }

                    $gallery = new Gallery(array('id_gallery' => $id));

                    View::render('admin/edit-gallery.php', array('gallery' => $gallery));

                    break;
            }

        }

    }

    public function settingsPage()
    {
        View::render('admin/header-banner.php');
        View::render('admin/settings.php');
    }

    public function stylesPage()
    {
        View::render('admin/header-banner.php');

        $builder = new SettingsController();

        $builder->settingsFileds();
    }


    public function printError($error_message, $die = true)
    {

        $str = sprintf('<div class="error"><p>%s&nbsp;<a href="#" onclick="window.history.back()">%s</a></p></div>', $error_message, __('Go back', NEXTCODEGALLERY_TEXT_DOMAIN));

        if ($die) {

            wp_die($str);

        } else {
            echo $str;
        }

    }

    public static function deleteGallery()
    {
        if (!self::isRequest('nextcodegallery', 'remove_gallery', 'GET')) {
            return;
        }

        if (!isset($_GET['id'])) {
            wp_die(__('"id" parameter is required', NEXTCODEGALLERY_TEXT_DOMAIN));
        }

        $id = absint($_GET['id']);

        if (absint($id) != $id) {
            wp_die(__('"id" parameter must be non negative integer', NEXTCODEGALLERY_TEXT_DOMAIN));
        }

        if (!isset($_GET['_wpnonce']) || !wp_verify_nonce($_GET['_wpnonce'], 'nextcode_galleryremove_gallery_' . $id)) {
            wp_die(__('Security check failed', NEXTCODEGALLERY_TEXT_DOMAIN));
        }

        Gallery::delete($id);

        $location = admin_url('admin.php?page=nextcodegallery');

        header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        header("Location: $location");

        exit;

    }


    public static function duplicateGallery()
    {


        if (!self::isRequest('nextcodegallery', 'duplicate_gallery', 'GET')) {
            return;
        }

        if (!isset($_GET['id'])) {

            \NextcodeGallery()->admin->printError(__('Missing "id" parameter.', NEXTCODEGALLERY_TEXT_DOMAIN));

        }

        $id = absint($_GET['id']);

        if (!$id) {

            \NextcodeGallery()->admin->printError(__('"id" parameter must be not negative integer.', NEXTCODEGALLERY_TEXT_DOMAIN));

        }

        if (!isset($_GET['_wpnonce']) || !wp_verify_nonce($_GET['_wpnonce'], 'nextcode_galleryduplicate_gallery_' . $id)) {

            \NextcodeGallery()->admin->printError(__('Security check failed.', NEXTCODEGALLERY_TEXT_DOMAIN));

        }

        ////  continue here

        $gallery = new Gallery(array('id_gallery' => $id));

        $gallery->setName('Copy of ' . $gallery->getName());

        $gallery = $gallery->duplicateGallery();

        /**
         * after the gallery is created we need to redirect user to the edit page
         */

        if ($gallery && is_int($gallery)) {

            $location = admin_url('admin.php?page=nextcodegallery&task=edit_gallery&id=' . $gallery);

            $location = wp_nonce_url($location, 'nextcode_galleryedit_gallery_' . $gallery);

            $location = html_entity_decode($location);

            header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
            header("Location: $location");

            exit;

        } else {

            wp_die(__('Problems occured while creating new Gallery.', NEXTCODEGALLERY_TEXT_DOMAIN));

        }

    }

    public static function createGallery()
    {
        if (!self::isRequest('nextcodegallery', 'create_new_gallery', 'GET')) {
            return;
        }

        if (!isset($_GET['_wpnonce']) || !wp_verify_nonce($_GET['_wpnonce'], 'nextcode_gallerycreate_new_gallery')) {
            \NextcodeGallery()->admin->printError(__('Security check failed.', NEXTCODEGALLERY_TEXT_DOMAIN));
        }

        $gallery = new Gallery();

        $gallery = $gallery->setName('')->save();

        /**
         * after the gallery is created we need to redirect user to the edit page
         */
        if ($gallery && is_int($gallery)) {

            $location = admin_url('admin.php?page=nextcodegallery&task=edit_gallery&id=' . $gallery);

            $location = wp_nonce_url($location, 'nextcode_galleryedit_gallery_' . $gallery);

            $location = html_entity_decode($location);

            header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
            header("Location: $location");

            exit;

        } else {

            wp_die(__('Problems occured while creating new gallery.', NEXTCODEGALLERY_TEXT_DOMAIN));

        }

    }


}
