<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Magazine_Elite
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>

			<?php

			/* Start the Loop */
            $class = 'magazine-elite-posts-lists';

            /*Check for masonry settings*/
            $enable_masonry_post_archive = magazine_elite_get_option( 'enable_masonry_post_archive', true );
            if( $enable_masonry_post_archive ){
                $class = 'masonry-grid masonry-col';
            }
            /**/

            echo '<div class="'.esc_attr($class).'">';

			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;
            echo '</div>';

            /**
             * Hook - magazine_elite_posts_navigation.
             *
             * @hooked: magazine_elite_display_posts_navigation - 10
             */
            do_action( 'magazine_elite_posts_navigation' );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
$page_layout = magazine_elite_get_page_layout();
if( 'no-sidebar' != $page_layout ){
    get_sidebar();
}
get_footer();
