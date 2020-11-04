<?php 

if ( ! function_exists( 'magazine_elite_display_posts_navigation' ) ) :

	/**
	 * Display Pagination.
	 *
	 * @since 1.0.0
	 */
	function magazine_elite_display_posts_navigation() {

        $pagination_type = magazine_elite_get_option( 'pagination_type', true );
        switch ( $pagination_type ) {

            case 'default':
                the_posts_navigation();
                break;

            case 'numeric':
                the_posts_pagination();
                break;

            case 'infinite_scroll_load':
                magazine_elite_ajax_pagination('scroll');
                break;

            case 'button_click_load':
                magazine_elite_ajax_pagination('click');
                break;

            default:
                break;
        }
		return;
	}

endif;

add_action( 'magazine_elite_posts_navigation', 'magazine_elite_display_posts_navigation' );
