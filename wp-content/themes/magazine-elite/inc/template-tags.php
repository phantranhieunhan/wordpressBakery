<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Magazine_Elite
 */

if ( ! function_exists( 'magazine_elite_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function magazine_elite_posted_on() {
        global $post;
        $author_id = $post->post_author;
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		if(is_single()){
            $posted_on = sprintf(
            /* translators: %s: post date. */
                esc_html_x( 'Published on %s', 'post date', 'magazine-elite' ),
                '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
            );
        }else{
            $posted_on = sprintf(
            /* translators: %s: post date. */
                esc_html_x( '%s', 'post date', 'magazine-elite' ),
                '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
            );
        }

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'magazine-elite' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( $author_id ) ) . '">' . esc_html( get_the_author_meta( 'display_name', $author_id ) ) . '</a></span>'
		);

		if(is_single()){
            echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
        }else{

            $categories_list = '';

            // Hide category and tag text for pages.
            if ( 'post' === get_post_type() ) {
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list( esc_html__( ', ', 'magazine-elite' ) );
            }
		    ?>
            <span class="posted-on">
                <span class="saga-icon ion-android-alarm-clock"></span>
                <?php echo $posted_on;?>
            </span>
            <?php
            if ( $categories_list ) {
                /* translators: 1: list of categories. */
                printf( '<span class="cat-links"><span class="saga-icon ion-ios-folder-outline"></span>' . esc_html__( '%1$s', 'magazine-elite' ) . '</span>', $categories_list ); // WPCS: XSS OK.
            }
        }
	}
endif;

if ( ! function_exists( 'magazine_elite_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function magazine_elite_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'magazine-elite' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links"> <span class="saga-icon ion-ios-folder-outline"></span>' . esc_html__( '%1$s', 'magazine-elite' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'magazine-elite' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links"><span class="saga-icon ion-ios-pricetags-outline"></span>' . esc_html__( '%1$s', 'magazine-elite' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

        if ( is_single() ){
            edit_post_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Edit <span class="screen-reader-text">%s</span>', 'magazine-elite' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link">',
                '</span>'
            );
        }

	}
endif;

if ( ! function_exists( 'magazine_elite_archive_title' ) ) :
    /**
     * Modifies post archive titles
     */
    function magazine_elite_archive_title( $title) {
        if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>';
        } elseif ( is_post_type_archive() ) {
            $title = post_type_archive_title( '', false );
        } elseif ( is_tax() ) {
            $title = single_term_title( '', false );
        }
        return $title;
    }
endif;
add_filter( 'get_the_archive_title', 'magazine_elite_archive_title' );
