<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Magazine_Elite
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

            $format = get_post_format();
            $format = (false === $format) ? 'single' : $format;

			get_template_part( 'template-parts/content', $format );

			the_post_navigation(array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'magazine-elite' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Next post:', 'magazine-elite' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'magazine-elite' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Previous post:', 'magazine-elite' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
            ));

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
$page_layout = magazine_elite_get_page_layout();
if( 'no-sidebar' != $page_layout ){
    get_sidebar();
}
get_footer();
