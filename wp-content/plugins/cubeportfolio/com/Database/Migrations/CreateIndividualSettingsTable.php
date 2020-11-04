<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/6/2017
 * Time: 10:19 AM
 */

namespace NextcodeGallery\Database\Migrations;

use NextcodeGallery\Models\Gallery;
use NextcodeGallery\Models\Settings;


class CreateIndividualSettingsTable
{

    public static function run()
    {

        global $wpdb;

        $wpdb->query(
            "CREATE TABLE IF NOT EXISTS " . $wpdb->prefix . "nextcodegalleryindividualsettingslist (
                `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                `option_key` VARCHAR(200) NOT NULL,
                `option_title` VARCHAR(200) NOT NULL,
                `option_type` ENUM('text','number','select','checkbox','radio','color') DEFAULT 'text',
                `select_options_val` VARCHAR(200) NULL,
                `select_options_title` VARCHAR(200) NULL,
                PRIMARY KEY (id),
                UNIQUE KEY(`option_key`)
            ) ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci "
        );

        $wpdb->query(
            "CREATE TABLE IF NOT EXISTS " . Gallery::getIndividualSettingsTableName() . "(
                `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                `id_gallery` int(11) UNSIGNED NOT NULL,
                `id_option` int(11) UNSIGNED NOT NULL,
                `option_value` TEXT,
                PRIMARY KEY (id),
                UNIQUE KEY `unique_index` (`id_gallery`, `id_option`),
				FOREIGN KEY (id_gallery) REFERENCES " . Gallery::getTableName() . " (id_gallery) ON DELETE CASCADE,
				FOREIGN KEY (id_option) REFERENCES " . $wpdb->prefix . "nextcodegalleryindividualsettingslist (id) ON DELETE CASCADE
            ) ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci "
        );

    }

}
