<?php
/**
 * Magazine Elite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Magazine_Elite
 */

if ( ! function_exists( 'magazine_elite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function magazine_elite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Magazine Elite, use a find and replace
		 * to change 'magazine-elite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'magazine-elite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'topbar-menu' => esc_html__( 'Top Bar Menu', 'magazine-elite' ),
			'menu-1' => esc_html__( 'Primary', 'magazine-elite' ),
			'social-nav' => esc_html__( 'Social Nav', 'magazine-elite' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'magazine_elite_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

         /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array(
            'image',
            'video',
            'quote',
            'gallery',
            'audio',
        ) );

        add_image_size( 'magazine-elite-medium-img', 640, 640, true );
    }
endif;
add_action( 'after_setup_theme', 'magazine_elite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function magazine_elite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'magazine_elite_content_width', 640 );
}
add_action( 'after_setup_theme', 'magazine_elite_content_width', 0 );

/**
 * function for google fonts
 */
if (!function_exists('magazine_elite_fonts_url')) :

    /**
     * Return fonts URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function magazine_elite_fonts_url()
    {

        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Poppins: on or off', 'magazine-elite')) {
            $fonts[] = 'Poppins:400,400i,700,700i';
        }
        /* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Roboto font: on or off', 'magazine-elite')) {
            $fonts[] = 'Roboto:400,700';
        }

        /* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Montserrat font: on or off', 'magazine-elite')) {
            $fonts[] = 'Montserrat';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urldecode(implode('|', $fonts)),
                'subset' => urldecode($subsets),
            ), 'https://fonts.googleapis.com/css');
        }
        return $fonts_url;
    }
endif;

/**
 * Enqueue scripts and styles.
 *
 * @since Magazine Elite 1.0
 *
 */
function magazine_elite_scripts() {

    $min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

    wp_enqueue_style('ionicons', get_template_directory_uri() . '/assets/lib/ionicons/css/ionicons' . $min . '.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/lib/bootstrap/css/bootstrap' . $min . '.css');
    wp_enqueue_style('slick', get_template_directory_uri() . '/assets/lib/slick/css/slick' . $min . '.css');
    wp_enqueue_style('jquery-sidr-css', get_template_directory_uri() . '/assets/lib/sidr/css/jquery.sidr.dark.css');
    wp_enqueue_style( 'wp-mediaelement' );
    wp_enqueue_style( 'magazine-elite-style', get_stylesheet_uri() );
    $fonts_url = magazine_elite_fonts_url();
    if (!empty($fonts_url)) {
        wp_enqueue_style('magazine-elite-google-fonts', $fonts_url, array(), null);
    }

    wp_enqueue_script( 'magazine-elite-skip-link-focus-fix', get_template_directory_uri() . '/assets/saga/js/skip-link-focus-fix.js', array(), '20151215', true );
    wp_enqueue_script('jquery-bootstrap', get_template_directory_uri() . '/assets/lib/bootstrap/js/bootstrap' . $min . '.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-slick', get_template_directory_uri() . '/assets/lib/slick/js/slick' . $min . '.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-sidr', get_template_directory_uri() . '/assets/lib/sidr/js/jquery.sidr' . $min . '.js', '', '', true);
    wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script('masonry');

	$args = magazine_elite_get_localized_variables();

	wp_enqueue_script('script', get_template_directory_uri() . '/assets/saga/js/script.js', array( 'jquery', 'wp-mediaelement' ), '', true);
    wp_localize_script( 'script', 'magazineElite', $args );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'magazine_elite_scripts' );

/**
 * Enqueue admin scripts and styles.
 *
 * @since Magazine Elite 1.0
 */
function magazine_elite_admin_scripts($hook){
    if ('widgets.php' === $hook) {
        wp_enqueue_media();
        wp_enqueue_script('magazine_elitewidgets', get_template_directory_uri() . '/assets/saga/js/widgets.js', array('jquery'), '1.0.0', true);
    }
}
add_action('admin_enqueue_scripts', 'magazine_elite_admin_scripts');

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Magazine Elite 1.0
 *
 */
function magazine_elite_post_nav_background() {
    if ( ! is_single() ) {
        return;
    }

    $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );
    $css      = '';

    if ( is_attachment() && 'attachment' == $previous->post_type ) {
        return;
    }

    if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
        $prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
        $css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
    }

    if ( $next && has_post_thumbnail( $next->ID ) ) {
        $nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
        $css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
    }

    wp_add_inline_style( 'magazine-elite-style', $css );
}
add_action( 'wp_enqueue_scripts', 'magazine_elite_post_nav_background' );

function magazine_elite_get_customizer_value(){
    global $magazine_elite;
    $magazine_elite = magazine_elite_get_options();
}
add_action('init','magazine_elite_get_customizer_value');

/**
 * Load all required files.
 */
require get_template_directory() . '/inc/init.php';