<?php

if (!function_exists('magazine_elite_home_full_grid_cat')) :
    /**
     * Homepage Full width grid.
     *
     * @since 1.0.0
     */
    function magazine_elite_home_full_grid_cat()
    {
        $enable_full_width_grid_cat = magazine_elite_get_option('enable_full_width_grid_cat', true);
        if ($enable_full_width_grid_cat):
            $full_width_grid_cat = magazine_elite_get_option('full_width_grid_cat', true);
            if (!empty($full_width_grid_cat)):
                $post_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 4,
                    'post_status' => 'publish',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field' => 'term_id',
                            'terms' => $full_width_grid_cat,
                        ),
                    ),
                );
                $posts = new WP_Query($post_args);
                if ($posts->have_posts()):
                    ?>
                    <section class="section-block section-block-1 section-bg">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="section-heading">
                                        <h2 class="section-title tertiary-font">
                                            <?php echo esc_html(get_cat_name($full_width_grid_cat)); ?>
                                        </h2>
                                        <span>
                                            <a href="<?php echo esc_url(get_category_link($full_width_grid_cat)); ?>" class="tertiary-font">
                                                <?php _e('View All', 'magazine-elite') ?>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <?php
                                while ($posts->have_posts()): $posts->the_post();
                                    if (has_post_thumbnail()):
                                        ?>
                                        <article class="col-md-3 col-sm-6">
                                            <div class="entry-content">
                                                <div class="post-thumb">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_post_thumbnail('magazine-elite-medium-img') ?>
                                                    </a>
                                                </div>
                                                <div class="post-detail">
                                                    <h2 class="entry-title entry-title-1">
                                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </h2>
                                                    <div class="featured-meta tertiary-font">
                                                        <span class="entry-date">
                                                            <span class="saga-icon ion-android-alarm-clock"></span>
                                                            <?php echo esc_html(get_the_date()); ?>
                                                        </span>
                                                        <span><?php _e('/', 'magazine-elite')?></span>
                                                        <span class="post-author">
                                                            <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>">
                                                                <?php the_author(); ?>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <?php
                                    endif;
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </section>
                    <?php
                endif;
            endif;
        endif;
    }
endif;
add_action('magazine_elite_home_section', 'magazine_elite_home_full_grid_cat', 30);

if (!function_exists('magazine_elite_home_panel_grid_cat')) :
    /**
     * Homepage Panel grid.
     *
     * @since 1.0.0
     */
    function magazine_elite_home_panel_grid_cat()
    {
        $enable_panel_grid_cat = magazine_elite_get_option('enable_panel_grid_cat', true);
        if ($enable_panel_grid_cat):
            $cats_array = array('first', 'second', 'third');
            ?>
            <section class="section-block section-block-2">
                <div class="container">
                    <div class="row">
                        <?php
                        foreach ($cats_array as $cat) {
                            $panel_grid_cat_id = magazine_elite_get_option($cat . '_panel_grid_cat', true);
                            if (!empty($panel_grid_cat_id)) {
                                $post_args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 4,
                                    'post_status' => 'publish',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'category',
                                            'field' => 'term_id',
                                            'terms' => $panel_grid_cat_id,
                                        ),
                                    ),
                                );
                                $posts = new WP_Query($post_args);
                                if ($posts->have_posts()):
                                    ?>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="section-heading-1">
                                            <h2 class="section-title tertiary-font">
                                                <?php echo esc_html(get_cat_name($panel_grid_cat_id)); ?>
                                            </h2>
                                        </div>
                                        <div class="clearfix"></div>

                                        <?php
                                        $first = true;
                                        while ($posts->have_posts()): $posts->the_post();
                                            $class = (true == $first) ? 'panel-layout-first' : '';
                                            if (has_post_thumbnail()) {
                                                ?>
                                                <article class="panel-layout <?php echo esc_attr($class); ?>">
                                                    <div class="entry-content">
                                                        <a href="<?php the_permalink() ?>">
                                                            <div class="post-thumb bg-image featured-bg">
                                                                <?php
                                                                if( true == $first ){
                                                                    the_post_thumbnail('magazine-elite-medium-img');
                                                                }else{
                                                                    the_post_thumbnail('thumbnail');
                                                                }
                                                                ?>
                                                            </div>
                                                        </a>
                                                        <div class="post-detail">
                                                            <h2 class="entry-title entry-title-1">
                                                                <a href="<?php the_permalink() ?>">
                                                                    <?php the_title(); ?>
                                                                </a>
                                                            </h2>
                                                            <div class="featured-meta tertiary-font">
                                                                <span class="entry-date">
                                                                    <span class="saga-icon ion-android-alarm-clock"></span>
                                                                    <?php echo esc_html(get_the_date()); ?>
                                                                </span>
                                                                <span><?php _e('/', 'magazine-elite')?></span>
                                                                <span class="post-author">
                                                                    <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>">
                                                                        <?php the_author(); ?>
                                                                    </a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                                <?php
                                            }
                                            $first = false;
                                        endwhile;
                                        wp_reset_postdata();
                                        ?>
                                    </div>
                                    <?php
                                endif;
                            }
                        }
                        ?>
                    </div>
                </div>
            </section>
            <?php
        endif;
    }
endif;
add_action('magazine_elite_home_section', 'magazine_elite_home_panel_grid_cat', 40);