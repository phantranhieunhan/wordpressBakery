<?php

/*
 * Plugin Name: WordPress Image Gallery Plugin
 * Plugin URI:  https://pluginjungle.com/downloads/image-gallery/
 * Description: Image gallery you always wanted for your website. No more issues creating a beautiful photo gallery with our plugin.
 * Version:     1.1.6
 * Author:      NextCode Gallery
 * Author URI:  http://next-code.su/
 * License:     GPL-2.0+
 * Text Domain: nextcodegallery
 */

if (!defined('ABSPATH')) {
    exit();
}

if (get_option("nextcode_galleryremovetablesuninstall") == "on") {
    register_uninstall_hook(__FILE__, array('NextcodeGallery\Database\Uninstall', 'run'));
}

define('NEXTCODEGALLERY_PLUGIN_FILE', __FILE__);

require_once "vendor/autoload.php";

/**
 * Main instance of NextcodeGallery.
 *
 * Returns the main instance of NextcodeGallery to prevent the need to use globals.
 *
 * @return \NextcodeGallery\NextcodeGallery
 */

function NextcodeGallery()
{
    return \NextcodeGallery\NextcodeGallery::instance();
}

$GLOBALS['NextcodeGallery'] = NextcodeGallery();




