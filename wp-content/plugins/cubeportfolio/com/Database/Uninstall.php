<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 7/3/2017
 * Time: 4:00 PM
 */

namespace NextcodeGallery\Database;

class Uninstall
{
    public static function run()
    {
        global $wpdb;

        delete_option("nextcode_galleryversion");
        delete_option("nextcode_galleryremovetablesuninstall");

        $wpdb->query("DROP TABLE IF EXISTS `" . $wpdb->prefix . "nextcodegallerysettings`");
        $wpdb->query("DROP TABLE IF EXISTS `" . $wpdb->prefix . "nextcodegalleryimages`");
        $wpdb->query("DROP TABLE IF EXISTS `" . $wpdb->prefix . "nextcodegallerygalleries`");
    }
}
