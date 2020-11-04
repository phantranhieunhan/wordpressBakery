<?php
/**
 * @package Food Grocery Store
 * Setup the WordPress core custom header feature.
 *
 * @uses food_grocery_store_header_style()
*/
function food_grocery_store_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'food_grocery_store_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1400,
		'height'                 => 202,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'food_grocery_store_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'food_grocery_store_custom_header_setup' );

if ( ! function_exists( 'food_grocery_store_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see food_grocery_store_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'food_grocery_store_header_style' );

function food_grocery_store_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .home-page-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'food-grocery-store-basic-style', $custom_css );
	endif;
}
endif;