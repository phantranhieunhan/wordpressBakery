<?php

/* Theme Widget sidebars. */
require get_template_directory() . '/inc/widgets/widget-sidebars.php';

/* Theme Widgets*/
require get_template_directory() . '/inc/widgets/tab-posts.php';
require get_template_directory() . '/inc/widgets/author-info.php';
require get_template_directory() . '/inc/widgets/social-menu.php';

/* Register site widgets */
if ( ! function_exists( 'magazine_elite_widgets' ) ) :
    /**
     * Load widgets.
     *
     * @since 1.0
     */
    function magazine_elite_widgets() {
        register_widget( 'Magazine_Elite_Tab_Posts' );
        register_widget( 'Magazine_Elite_Social_Menu' );
        register_widget( 'Magazine_Elite_Author_Info' );
    }
endif;
add_action( 'widgets_init', 'magazine_elite_widgets' );
