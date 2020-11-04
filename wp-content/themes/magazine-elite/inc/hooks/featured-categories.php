<?php

if (!function_exists('magazine_elite_featured_categories')) :
    /**
     * Featured Categories.
     *
     * @since 1.0.0
     */
    function magazine_elite_featured_categories(){

        $enable_ft_categories = magazine_elite_get_option('enable_ft_categories', true);
        $cats_array = array( 'first', 'second', 'third', 'fourth' );

        if ($enable_ft_categories) {
            ?>
            <section class="section-block section-featured">
                <div class="container">
                <?php
                foreach ($cats_array as $cat){
                    $ft_cat = magazine_elite_get_option($cat.'_ft_cat', true);
                    $ft_cat_image = magazine_elite_get_option($cat.'_ft_cat_image', true);
                    if( !empty($ft_cat) ){
                        $cat_link = get_category_link( $ft_cat );
                        ?>
                        <div class="col-md-3 col-sm-6 featured-item">
                            <figure class="post-img">
                                <?php if( !empty($ft_cat_image)): ?>
                                    <img src="<?php echo esc_url($ft_cat_image); ?>" alt="post image">
                                    <div class="overlay-img"></div>
                                <?php endif;?>
                            </figure>
                            <h3 class="featured-item-title entry-title tertiary-font">
                                <a href="<?php echo esc_url( $cat_link ); ?>"><?php echo esc_html(get_cat_name($ft_cat))?></a>
                            </h3>
                            <div class="meta-description">
                                <?php echo esc_html(wp_trim_words(category_description($ft_cat),18, '')); ?>
                            </div>
                            <a href="<?php echo esc_url( $cat_link ); ?>" class="featured-item-more tertiary-font">
                                <?php _e('Find Out more', 'magazine-elite')?>
                            </a>
                        </div>
                        <?php
                    }
                }
                ?>
                </div>
            </section>
            <?php
        }
    }
endif;
add_action('magazine_elite_home_section', 'magazine_elite_featured_categories', 20);