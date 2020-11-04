<?php

namespace NextcodeGallery\Controllers\Admin;

use NextcodeGallery\Models\Gallery;
use NextcodeGallery\Models\Settings;
use NextcodeGallery\Core\Model;

/**
 * Class AjaxController
 * @package NEXTCODEGALLERY\Controllers\Admin
 */
class AjaxController
{
    public static function init()
    {
        add_action('wp_ajax_nextcode_gallerysave_gallery', array(__CLASS__, 'saveGallery'));

        add_action('wp_ajax_nextcode_gallerysave_gallery_images', array(__CLASS__, 'saveGalleryImages'));

        add_action('wp_ajax_nextcode_galleryremove_gallery_items', array(__CLASS__, 'removeGalleryItems'));

        add_action('wp_ajax_nextcode_galleryadd_gallery_image', array(__CLASS__, 'AddGalleryImage'));

        add_action('wp_ajax_nextcode_galleryedit_thumbnail', array(__CLASS__, 'EditGalleryThumbnail'));

        add_action('wp_ajax_nextcode_galleryadd_gallery_video', array(__CLASS__, 'AddGalleryVideo'));

        add_action('wp_ajax_nextcode_gallerysave_settings', array(__CLASS__, 'saveGallerySettings'));

        add_action('wp_ajax_nextcode_gallerysave_plugin_settings', array(__CLASS__, 'savePluginSettings'));

    }


    public static function saveGallery()
    {
        if (!isset($_REQUEST['nonce']) || !wp_verify_nonce($_REQUEST['nonce'], 'nextcode_gallerysave_gallery')) {
            die('security check failed');
        }

        $gallery_id = absint($_REQUEST['gallery_id']);



        $gallery = new Gallery(array('id_gallery' => $gallery_id));
        $gallery_data_arr = array();
        $data = str_replace("nextcode_galleryimages_", "", $_REQUEST["formdata"]);
        $data = str_replace("nextcode_gallery", "", $data);
        self::sanitize_data(parse_str($data, $gallery_data_arr));

        if (isset($gallery_data_arr["items"])) {
            unset($gallery_data_arr["items"]);
        }

        if (isset($gallery_data_arr["select_all_items"])) {
            unset($gallery_data_arr["select_all_items"]);
        }

        $gallery_data_arr["custom_css"] = str_replace("#container", "#nextcode_gallerycontainer", $gallery_data_arr["custom_css"]);
        $gallery_data_arr["custom_css"] = sanitize_text_field($gallery_data_arr["custom_css"]);

        if (Model::isset_table_column(Gallery::getTableName(), "show_title")) {
            $gallery_data_arr["show_title"] = (isset($gallery_data_arr["show_title"])) ? 1 : 0;
        }


        $ordering = (isset($gallery_data_arr["ordering"])) ? $gallery_data_arr["ordering"] : array();
        unset($gallery_data_arr["ordering"]);

        if (!empty($ordering)) {
            $gallery->updateImageOrdering($ordering);
        }

        $updated = $gallery->saveGallery($gallery_data_arr);
        if ($updated) {
            echo 1;
            die();
        } else {
            die('something went wrong');
        }
    }

    public static function saveGalleryImages()
    {
        if (!isset($_REQUEST['nonce']) || !wp_verify_nonce($_REQUEST['nonce'], 'nextcode_gallerysave_gallery')) {
            die('security check failed');
        }

        $gallery_id = absint($_REQUEST['gallery_id']);

        $gallery = new Gallery(array('id_gallery' => $gallery_id));
        $gallery_data_arr = array();
        self::sanitize_data(parse_str(str_replace("nextcode_galleryimages_", "", $_REQUEST["formdata"]), $gallery_data_arr));


        $updated = null;

        $updated = $gallery->saveGalleryImages($gallery_data_arr);


        if ($updated) {
            echo 1;
            die();
        } else {
            die('something went wrong');
        }
    }

    public static function removeGalleryItems()
    {
        if (!isset($_REQUEST['nonce']) || !wp_verify_nonce($_REQUEST['nonce'], 'nextcode_gallerysave_gallery')) {
            die('security check failed');
        }

        $gallery_id = absint($_REQUEST['gallery_id']);

        $gallery = new Gallery(array('id_gallery' => $gallery_id));

        $updated = null;
        if (!empty($_REQUEST["formdata"])) {
            $updated = $gallery->removeGalleryItems(array_map(array(__CLASS__, 'sanitize_data'),$_REQUEST["formdata"]));
        }

        if ($updated) {
            echo 1;
            die();
        } else {
            die('something went wrong');
        }
    }


    public static function AddGalleryImage()
    {
        if (!isset($_REQUEST['nonce']) || !wp_verify_nonce($_REQUEST['nonce'], 'nextcode_gallerysave_gallery')) {
            die('security check failed');
        }

        $gallery_id = absint($_REQUEST['gallery_id']);

        $gallery_data = array_map(array(__CLASS__, 'sanitize_data'),$_REQUEST["formdata"]);

        $gallery = new Gallery(array('id_gallery' => $gallery_id));

        $inserted = null;
        $inserted = $gallery->addGalleryImage($gallery_data, $gallery_id);

        if ($inserted) {
            echo 1;
            die();
        } else {
            die('something went wrong');
        }
    }

    public static function EditGalleryThumbnail()
    {
        if (!isset($_REQUEST['nonce']) || !wp_verify_nonce($_REQUEST['nonce'], 'nextcode_gallerysave_gallery')) {
            die('security check failed');
        }

        $gallery_id = absint($_REQUEST['gallery_id']);
        $image_id = absint($_REQUEST['image_id']);
        $gallery_data = array_map(array(__CLASS__, 'sanitize_data'),$_REQUEST["formdata"]);
        $gallery = new Gallery(array('id_gallery' => $gallery_id));

        $edited = null;
        $edited = $gallery->EditGalleryThumbnail($gallery_data, $image_id);

        if ($edited == 1) {
            echo $edited;
            die();
        } else {
            die('something went wrong');
        }

    }

    public static function AddGalleryVideo()
    {
        if (!isset($_REQUEST['nonce']) || !wp_verify_nonce($_REQUEST['nonce'], 'nextcode_gallerysave_gallery')) {
            die('security check failed');
        }


        $gallery_id = absint($_REQUEST['gallery_id']);

        $gallery_data = array_map(array(__CLASS__, 'sanitize_data'),$_REQUEST["formdata"]);

        $gallery = new Gallery(array('id_gallery' => $gallery_id));
        $gallery_data_arr = array();
        parse_str($gallery_data, $gallery_data_arr);

        $gallery_data_arr["nextcode_galleryid_gallery"] = $gallery_id;


        $inserted = null;
        $inserted = $gallery->addGalleryVideo($gallery_data_arr);


        if ($inserted) {
            echo 1;
            die();
        } else {
            die('something went wrong');
        }
    }


    public static function saveGallerySettings()
    {

        $settings_arr = array();
        self::sanitize_data(parse_str($_REQUEST["formdata"], $settings_arr));
        $settings = new Settings();
        foreach ($settings_arr["settings"] as $key => $item) {
            $settings->setOption($key, $item);
        }

        echo 'ok';
        die;
    }


    public static function savePluginSettings()
    {
        if (!isset($_REQUEST['nonce']) || !wp_verify_nonce($_REQUEST['nonce'], 'nextcode_gallerysave_plugin_settings')) {
            die('security check failed');
        }


        $settings_data = $_REQUEST['formData'];

        foreach ($settings_data as $input) {
            //$saved[] = \NextcodeGallery()->settings->setOption($input['name'], $input['value']);
            $saved[] = update_option($input["name"], $input["value"]);
        }

        if (!empty($saved)) {
            echo json_encode(array("success" => 1));
            die();
        } else {
            die('something went wrong');
        }

    }

    public static function sanitize_data($data, $type = 'array')
    {
        switch($type) {
            case 'text':
                return sanitize_text_field($data);
                break;
            case 'absint':
                return absint($data);
                break;
            case 'email':
                return sanitize_email($data);
                break;
            case 'html':
                return wp_kses_post($data);
                break;
            case 'textarea':
                return sanitize_textarea_field($data);
                break;
            case 'title':
                return sanitize_title($data);
                break;
            case 'key':
                return sanitize_key($data);
                break;
            case 'file_name':
                return sanitize_file_name($data);
                break;
            default:
                return $data;
                break;
        }
    }


}
