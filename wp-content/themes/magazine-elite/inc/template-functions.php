<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Magazine_Elite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function magazine_elite_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

    $site_layout = magazine_elite_get_option('site_layout',true);

    if( 'full-width' == $site_layout){
        $classes[] = 'saga-full-layout';
    }

    $show_access_bar = magazine_elite_get_option('show_access_bar',true);
	if(empty($show_access_bar)){
        $classes[] = 'accessbar-disabled';
    }

    $page_layout = magazine_elite_get_page_layout();
    $classes[] = esc_attr($page_layout);

	return $classes;
}
add_filter( 'body_class', 'magazine_elite_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function magazine_elite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'magazine_elite_pingback_header' );
