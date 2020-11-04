<?php
/**
 * Template part for displaying posts
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
        if(is_singular()){
            if ( 'no-image' != $image_option ){
                if (has_post_thumbnail()) {
                    echo '<div class="saga-featured-image post-thumb">' . get_the_post_thumbnail(get_the_ID(), $image_option) . '</div>';
                }
            }
            the_content( sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'magazine-elite' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ) );
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'magazine-elite' ),
                'after'  => '</div>',
            ) );
        }else{
            if ( 'no-image' != $image_option ) {
                if (has_post_thumbnail()) {
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), $image_option);
                    ?>
                    <div class="post-thumb bg-image bg-quote" style="background-image: url(&quot;<?php echo esc_url($image_url);?>&quot;);">
                        <?php the_post_thumbnail(get_the_ID(), $image_option); ?>
                    </div>
                    <?php
                }else{
                    echo '<div class="post-thumb bg-quote"></div>';
                }
            }else{
                echo '<div class="post-thumb bg-quote"></div>';
            }
            the_content( sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'magazine-elite' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ) );
            echo '<h2 class="entry-title tertiary-font quote-entry-title">'.esc_html(get_the_title()).'</h2>';
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'magazine-elite' ),
                'after'  => '</div>',
            ) );
        }
		?>
	</div><!-- .entry-content -->
</article>