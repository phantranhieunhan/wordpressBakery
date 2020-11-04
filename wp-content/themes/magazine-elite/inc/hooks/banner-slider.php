<?php

if (!function_exists('magazine_elite_banner_content')) :
    /**
     * Banner Slider Content.
     *
     * @since 1.0.0
     */
    function magazine_elite_banner_content(){

        $enable_banner_slider = magazine_elite_get_option('enable_slider_posts', true);
        $slider_cat = magazine_elite_get_option('slider_cat', true);
        if ($enable_banner_slider) {
            if (!empty($slider_cat)) {
                $post_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 4,
                    'post_status' => 'publish',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field' => 'term_id',
                            'terms' => $slider_cat,
                        ),
                    ),
                );
                $slider_post = new WP_Query($post_args);
                if ($slider_post->have_posts()):
                    $slider_nav = '';
                    ?>
                    <section class="section-block section-jumbotron">
                        <div class="container">
                            <div class="saga-slide">
                                <?php
                                while ($slider_post->have_posts()):$slider_post->the_post();
                                    $slider_img = $slider_img_class = '';
                                    ?>
                                        <div class="slide item">
                                            <div class="slider-wrapper primary-background">
                                                <?php
                                                if(has_post_thumbnail()){
                                                    $slider_img_class = 'bg-image ';
                                                    $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                                    $slider_img = '<img src="' . esc_url($image) . '">';
                                                }
                                                ?>
                                                <div class="<?php echo esc_attr($slider_img_class);?> slide-bg">
                                                    <?php echo $slider_img; ?>
                                                </div>
                                                <div class="slide-text">
                                                    <div class="slide-text-wrapper">
                                                        <div class="tertiary-font slide-categories visible hidden-xs">
                                                        <?php the_category(' ');?>
                                                        </div>
                                                        <h2 class="slide-title">
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    /*Slider nav*/
                                    $slider_nav .= '<div class="slider-nav-item"><figure class="slider-article clearfix">';
                                    $slider_nav .= '<span class="slider-nav-image">'.$slider_img.'</span>';
                                    $slider_nav .= '<figcaption class="navtitle-wrapper"><h4 class="slide-nav-title">';
                                    $slider_nav .=  esc_html(wp_trim_words( get_the_title(), 8, ' ...' ));
                                    $slider_nav .= '</h4></figcaption>';
                                    $slider_nav .= '</figure></div>';
                                    /**/
                                    ?>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </section>
                    <section class="section-block section-slidesnav">
                        <div class="container">
                            <div class="slider-nav">
                                <?php echo $slider_nav;?>
                            </div>
                        </div>
                    </section>
                    <?php
                endif;
            }
        }
    }
endif;
add_action('magazine_elite_home_section', 'magazine_elite_banner_content', 10);
