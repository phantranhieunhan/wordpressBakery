<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Magazine_Elite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php
        $image_option = magazine_elite_get_image_option();
        if ( 'no-image' != $image_option ){
            if (has_post_thumbnail()) {
                echo '<div class="magazine-elite-ft-img">' . get_the_post_thumbnail(get_the_ID(), $image_option) . '</div>';
            }
        }
        the_content();

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'magazine-elite' ),
            'after'  => '</div>',
        ) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<div class="entry-meta">
			<?php
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
			?>
			</div>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article>