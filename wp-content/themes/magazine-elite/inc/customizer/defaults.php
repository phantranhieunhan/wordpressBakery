<?php
/**
 * Default customizer values.
 *
 * @package Magazine_Elite
 */
if ( ! function_exists( 'magazine_elite_get_default_customizer_values' ) ) :
	/**
	 * Get default customizer values.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default customizer values.
	 */
	function magazine_elite_get_default_customizer_values() {

		$defaults = array();

        $defaults['enable_slider_posts'] = true;
        $defaults['slider_cat']         = 1;

        $defaults['enable_ft_categories'] = false;
        $defaults['first_ft_cat'] = 1;
        $defaults['first_ft_cat_image'] = '';
        $defaults['second_ft_cat'] = 1;
        $defaults['second_ft_cat_image'] = '';
        $defaults['third_ft_cat'] = 1;
        $defaults['third_ft_cat_image'] = '';
        $defaults['fourth_ft_cat'] = 1;
        $defaults['fourth_ft_cat_image'] = '';

        $defaults['enable_full_width_grid_cat'] = false;
        $defaults['full_width_grid_cat'] = 1;

        $defaults['enable_panel_grid_cat'] = false;
        $defaults['first_panel_grid_cat'] = 1;
        $defaults['second_panel_grid_cat'] = 1;
        $defaults['third_panel_grid_cat'] = 1;

        // Front Page Layout
        $defaults['home_page_layout'] = 'no-sidebar';

        /* Preloader */
        $defaults['enable_preloader'] = false;

        // Top Bar.
        $defaults['show_top_bar']   = true;

        // Access Bar.
        $defaults['show_access_bar']   = false;
        $defaults['contact_form_shortcode'] = '';
        $defaults['google_map_shortcode'] = '';

        // Global Layout
        $defaults['enable_masonry_post_archive'] = true;
        $defaults['global_layout'] = 'right-sidebar';
        $defaults['site_layout'] = 'full-width';
        $defaults['archive_image'] = 'full';
        $defaults['single_post_image'] = 'full';
        $defaults['single_page_image'] = 'full';

        //Pagination
        $defaults['pagination_type'] = 'infinite_scroll_load';

        //BreadCrumbs
        $defaults['breadcrumb_type'] = 'simple';

        //Excerpt
        $defaults['excerpt_length'] = 40;

		// Footer.
		$defaults['copyright_text'] = esc_html__( 'Copyright &copy; All rights reserved.', 'magazine-elite' );

		$defaults = apply_filters( 'magazine_elite_default_customizer_values', $defaults );
		return $defaults;
	}
endif;
