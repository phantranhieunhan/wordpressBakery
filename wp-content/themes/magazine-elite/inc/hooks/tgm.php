<?php
/**
 * Recommended plugins
 *
 * @package magazine-elite
 */
if ( ! function_exists( 'magazine_elite_recommended_plugins' ) ) :
	/**
	 * Recommend plugins.
	 *
	 * @since 1.0.0
	 */
	function magazine_elite_recommended_plugins() {
		$plugins = array(
            array(
                'name'     => esc_html__( 'Contact Form 7', 'magazine-elite' ),
                'slug'     => 'contact-form-7',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'WP Post Author', 'magazine-elite' ),
                'slug'     => 'wp-post-author',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'WP Google Maps', 'magazine-elite' ),
                'slug'     => 'wp-google-maps',
                'required' => false,
            ),
		);
		tgmpa( $plugins );
	}
endif;
add_action( 'tgmpa_register', 'magazine_elite_recommended_plugins' );
