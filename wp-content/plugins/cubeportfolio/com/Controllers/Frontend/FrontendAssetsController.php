<?php

namespace NextcodeGallery\Controllers\Frontend;

use NextcodeGallery\Models\Gallery;
use NextcodeGallery\Models\Settings;

class FrontendAssetsController
{

    public static function init()
    {
        add_action('nextcodegalleryShortcodeScripts', array(__CLASS__, 'addScripts'));

        add_action('nextcodegalleryShortcodeScripts', array(__CLASS__, 'addStyles'));

        add_action('wp_head', array(__CLASS__, 'addAjaxUrlJs'));

    }

    /**
     * Add Scripts
     *
     */
    public static function addScripts($GalleryId)
    {
        $gallery = new Gallery(array('id_gallery' => $GalleryId));

        wp_enqueue_script('nextcodegallery_me', \NextcodeGallery()->pluginUrl() . "/resources/assets/js/me.js");
        wp_enqueue_script('nextcodegallery_vimeo', \NextcodeGallery()->pluginUrl() . "/resources/assets/js/vimeo.js");
        wp_enqueue_script("nextcodegalleryunite", \NextcodeGallery()->pluginUrl() . "/resources/assets/js/frontend/unitegallery.js", array('jquery'), false, true);
        wp_enqueue_script('nextcodegalleryFrontJs', \NextcodeGallery()->pluginUrl() . '/resources/assets/js/frontend/main.js', array('jquery'), false, true);


        wp_enqueue_style('nextcodegallery_me_player', \NextcodeGallery()->pluginUrl() . "/resources/assets/css/meplayer.css");

        self::localizeScripts($GalleryId);

    }


    /**
     * Define the 'ajaxurl' JS variable, used by themes and plugins as an AJAX endpoint.
     *
     */
    public static function addAjaxUrlJs()
    {
        ?>

        <script
                type="text/javascript">var ajaxurl = '<?php echo admin_url('admin-ajax.php', is_ssl() ? 'admin' : 'http'); ?>';</script>
        <?php
    }

    /**
     * Add Styles
     */
    public static function addStyles()
    {
        wp_enqueue_style('fontAwesome', \NextcodeGallery()->pluginUrl() . '/resources/assets/css/font-awesome.min.css', false);
        wp_enqueue_style('nextcodegalleryunit', \NextcodeGallery()->pluginUrl() . '/resources/assets/css/frontend/unite-gallery.css');
    }

    public static function localizeScripts($id)
    {

        $gallery = new Gallery(array("id_gallery" => $id));
        $data = $gallery->getGallery();
        $view = null;
        $options = array();
        if ($data->view_type == 0) {
            $view = "justified";
        } elseif ($data->view_type == 1) {
            $view = "tiles";
        }
        elseif ($data->view_type == 2) {
	        $view = "carousel";
        }
        elseif ($data->view_type == 3) {
	        $view = "slider";
        }else {
	        $view = "grid";
        }

	    if (!is_null($view)) {

            $options = \NextcodeGallery()->settings->getOptionsByView($view);
        }

        wp_localize_script('nextcodegalleryFrontJs', 'mainjs', array(
            'options' => $options
        ));
    }

}
