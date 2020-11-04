<?php
namespace NextcodeGallery;

use NextcodeGallery\Models\Gallery;
use NextcodeGallery\Models\Settings;
use NextcodeGallery\Controllers\Admin\AdminController;
use NextcodeGallery\Controllers\Frontend\FrontendController;
use NextcodeGallery\Controllers\Admin\AdminAssetsController;
use NextcodeGallery\Controllers\Admin\AjaxController as AdminAjax;
use NextcodeGallery\Controllers\Frontend\AjaxController as FrontAjax;

if (!defined('ABSPATH')) {
    exit();
}

if (!class_exists('NextcodeGallery')) :
    class NextcodeGallery
    {
        /**
         * Version of plugin
         * @var string
         */
        public $version = "1.1.6";

        /**
         * Instance of AdminController to manage admin
         * @var AdminController instance
         */
        public $admin;

        /**
         * Classnames of migration classes
         *
         * @var array
         */
        private $migrationClasses;

        /**
         * @var Settings
         */
        public $settings;

        public $galleryinfo;

        protected static $_instance = null;

        public static function instance()
        {
            if (is_null(self::$_instance)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }


        private function __construct()
        {

            $this->constants();
            $this->migrationClasses = array(
                'NextcodeGallery\Database\Migrations\CreateGalleryTable',
                'NextcodeGallery\Database\Migrations\CreateImageTable',
                'NextcodeGallery\Database\Migrations\CreateSettingsTable',
                'NextcodeGallery\Database\Migrations\CreateDefaultGallery'
            );

            add_action('init', array($this, 'init'), 0);
            add_action('widgets_init', array('NextcodeGallery\Controllers\Widgets\WidgetsController', 'init'));

        }

        public function constants()
        {
            define('NEXTCODEGALLERY_PLUGIN_BASENAME', plugin_basename(NEXTCODEGALLERY_PLUGIN_FILE));
            define('NEXTCODEGALLERY_VERSION', $this->version);
            define('NEXTCODEGALLERY_IMAGES_PATH', $this->pluginPath() . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR);
            define('NEXTCODEGALLERY_IMAGES_URL', untrailingslashit($this->pluginUrl()) . '/resources/assets/images/');
            define('NEXTCODEGALLERY_FONTS_URL', untrailingslashit($this->pluginUrl()) . '/resources/assets/fonts/');
            define('NEXTCODEGALLERY_FONTS_PATH', $this->pluginPath() . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'fonts' . DIRECTORY_SEPARATOR);
            define('NEXTCODEGALLERY_TEMPLATES_PATH', $this->pluginPath() . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
            define('NEXTCODEGALLERY_TEMPLATES_URL', untrailingslashit($this->pluginUrl()) . '/resources/views');
            define('NEXTCODEGALLERY_TEXT_DOMAIN', 'NEXTCODEGALLERY');
            define("NEXTCODEGALLERY_DEBUG_ENABLE", true);
            define("NEXTCODEGALLERY_ACCESS_IP", "127.0.0.1");
        }


        /**
         * Initialize the plugin
         */
        public function init()
        {

            $this->checkVersion();

            $this->settings = new Settings();

            if (defined('DOING_AJAX')) {

                AdminAjax::init();
                FrontAjax::init();
            }

            if (is_admin()) {
                $this->admin = new AdminController();
                AdminAssetsController::init();

            } else {
                new FrontendController();
            }
        }


        public function checkVersion()
        {
            if (get_option('nextcode_galleryversion') !== $this->version) {
                $this->runMigrations();
                global $wpdb;
                $rowcount = (int) $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."nextcodegallerysettings");
                if($rowcount === 0) {
                    $this->setDefaultGallerySettings();
                }

                update_option('nextcode_galleryversion', $this->version);
            }
        }

        private function runMigrations()
        {
            if (empty($this->migrationClasses)) {
                return;
            }

            foreach ($this->migrationClasses as $className) {
                if (method_exists($className, 'run')) {
                    call_user_func(array($className, 'run'));
                } else {
                    throw new \Exception('Specified migration class ' . $className . ' does not have "run" method');
                }
            }
        }

        public function setDefaultGallerySettings()
        {
            $settings = new Settings();
            $default_settings = $settings->getDefaultOptions();
            set_time_limit(100);

            foreach ($default_settings as $key => $value) {
                $settings->setOption($key, $value);
            }
        }

        /**
         * @return string
         */
        public function viewPath()
        {
            return apply_filters('nextcode_galleryview_path', 'NextcodeGallery/');
        }

        /**
         * @return string
         */
        public function pluginPath()
        {
            return plugin_dir_path(NEXTCODEGALLERY_PLUGIN_FILE);
        }

        /**
         * @return string
         */
        public function pluginUrl()
        {
            return plugins_url('', NEXTCODEGALLERY_PLUGIN_FILE);
        }
    }

endif;
