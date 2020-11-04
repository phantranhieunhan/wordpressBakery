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
    <?php if( !is_singular() ): ?>
        <header class="entry-header">
            <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );?>
        </header><!-- .entry-header -->
    <?php endif;?>

    <?php
    $image_option = magazine_elite_get_image_option();
    if(is_singular()){
        if ( 'no-image' != $image_option ){
            if (has_post_thumbnail()) {
                echo '<div class="saga-featured-image post-thumb">' . get_the_post_thumbnail(get_the_ID(), $image_option) . '</div>';
            }
        }
        $raw_content = get_the_content();
        $final_content = apply_filters( 'the_content', $raw_content );

        /*Get first word of content*/
        $first_word = substr($raw_content, 0, 1);
        /*only allow alphabets*/
        if(preg_match("/[A-Za-z]+/", $first_word) != TRUE){
            $first_word = '';
        }
        echo '<div class="entry-content" data-initials="'.esc_attr($first_word).'">';
        /*Excerpt*/
        global $post;
        if(!empty($post->post_excerpt)){
            echo '<div class="prime-excerpt">'.esc_html($post->post_excerpt).'</div>';
        }
        /**/
        echo $final_content;
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'magazine-elite' ),
            'after'  => '</div>',
        ) );
        echo '</div>';
    }else{
        echo '<div class="entry-content">';
        if ( 'no-image' != $image_option ){
            if (has_post_thumbnail()) {
                echo '<div class="post-thumb">' . get_the_post_thumbnail(get_the_ID(), $image_option) . '<div class="grid-item-overlay"><a href="' . esc_url(get_permalink()) . '"><span><i class="ion-ios-paperplane"></i></span></a></div></div>';
            }
        }
        echo '</div>';
    }
    ?>

    <footer class="entry-footer">
        <div class="entry-meta">
            <?php
            if ( is_single() ) {
                magazine_elite_entry_footer();
            }else{
                magazine_elite_posted_on();
            }
            ?>
        </div>
    </footer><!-- .entry-footer -->
</article>