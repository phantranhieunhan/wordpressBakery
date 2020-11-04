<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Magazine_Elite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->
    <?php
    $image_option = magazine_elite_get_image_option();
    if ( 'no-image' != $image_option ){
        if (has_post_thumbnail()) {
            echo '<div class="saga-featured-image post-thumb">' . get_the_post_thumbnail(get_the_ID(), $image_option) . '</div>';
        }
    }
    ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
        <?php if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php magazine_elite_posted_on(); ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
	</footer><!-- .entry-footer -->
</article>