<?php
/* Display Breadcrumbs */
if ( ! function_exists( 'magazine_elite_get_breadcrumb' ) ) :

    /**
     * Simple breadcrumb.
     *
     * @since 1.0.0
     */
    function magazine_elite_get_breadcrumb() {

        if ( ! function_exists( 'breadcrumb_trail' ) ) {

            require_once get_template_directory() . '/assets/lib/breadcrumbs/breadcrumbs.php';
        }

        $breadcrumb_args = array(
            'container'   => 'div',
            'show_browse' => false,
        );
        breadcrumb_trail( $breadcrumb_args );

    }

endif;

/* Change default excerpt length */
if ( ! function_exists( 'magazine_elite_excerpt_length' ) ) :

    /**
     * Change excerpt Length.
     *
     * @since 1.0.0
     */
    function magazine_elite_excerpt_length($excerpt_length) {
        $excerpt_length = magazine_elite_get_option('excerpt_length',true);
        return absint($excerpt_length);
    }

endif;
add_filter( 'excerpt_length', 'magazine_elite_excerpt_length', 999 );

/* Get Page layout */
if ( ! function_exists( 'magazine_elite_get_page_layout' ) ) :

    /**
     * Get Page Layout based on the post meta or customizer value
     *
     * @since 1.0.0
     *
     * @return string Page Layout.
     */
    function magazine_elite_get_page_layout() {
        global $post;

        $page_layout = magazine_elite_get_option('home_page_layout',true);

        /*Fetch for homepage*/
        if( is_front_page() && is_home()){
            return $page_layout;
        }elseif ( is_front_page() ) {
            return $page_layout;
        }elseif ( is_home() ) {
            $page_layout_meta = get_post_meta( get_option( 'page_for_posts' ), 'magazine_elite_page_layout', true );
            if(!empty($page_layout_meta)){
                return $page_layout_meta;
            }else{
                return $page_layout;
            }
        }
        /**/

        /*Fetch from Post Meta*/
        if ( $post && is_singular() ) {
            $page_layout = get_post_meta( $post->ID, 'magazine_elite_page_layout', true );
        }
        /*Fetch from customizer*/
        if(empty($page_layout)){
            $page_layout = magazine_elite_get_option('global_layout',true);
        }
        return $page_layout;
    }

endif;

/* Get Image Option */
if ( ! function_exists( 'magazine_elite_get_image_option' ) ) :

    /**
     * Get Image Option on the post meta or customizer value
     *
     * @since 1.0.0
     *
     * @return string Image Option.
     */
    function magazine_elite_get_image_option() {
        global $post;

        if ( $post && is_singular() ) {
            /*Fetch from Post Meta*/
            $image_option = get_post_meta( $post->ID, 'magazine_elite_single_image', true );
            /*Fetch from customizer*/
            if( empty($image_option) ){
                if( is_single() ){
                    $image_option = magazine_elite_get_option('single_post_image',true);
                }
                if( is_page() ){
                    $image_option = magazine_elite_get_option('single_page_image',true);
                }
            }
        }else{
            /*Fetch from customizer for archive*/
            $image_option = magazine_elite_get_option('archive_image',true);
        }

        return $image_option;
    }

endif;

/* Quote Content */
if ( ! function_exists( 'magazine_elite_quote_content' ) ) :
    /**
     * Check for <blockquote> elements
     *
     * @since 1.0.0
     *
     * @return string Content
     */
    function magazine_elite_quote_content( $content ) {

        /* Check if we're displaying a 'quote' post. */
        if ( has_post_format( 'quote' ) ) {

            /* Match any <blockquote> elements. */
            preg_match( '/<blockquote.*?>/', $content, $matches );

            /* If no <blockquote> elements were found, wrap the entire content in one. */
            if ( empty( $matches ) )
                $content = "<blockquote>{$content}</blockquote>";
        }

        return $content;
    }
endif;
add_filter( 'the_content', 'magazine_elite_quote_content' );
