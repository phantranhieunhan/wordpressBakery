<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 7/3/2017
 * Time: 4:09 PM
 */

namespace NextcodeGallery\Database\Migrations;

use NextcodeGallery\Models\Gallery as Gallery;

class CreateDefaultGallery
{
    public static function run()
    {
        global $wpdb;

        $galleries = $wpdb->get_var("SELECT COUNT(*) FROM " . Gallery::getTableName());
        if ($galleries == 0) {
            $new_gallery = $wpdb->insert(Gallery::getTableName(), array("name" => "My First Gallery"));
            for ($i = 1; $i < 14; $i++) {
                $wpdb->insert(Gallery::getItemsTableName(), array(
                        "id_gallery" => $new_gallery,
                        "name" => $i,
                        "ordering" => $i,
                        "url" => NEXTCODEGALLERY_IMAGES_URL . "project/" . $i . ".jpg")
                );
            }
        }
    }
}
