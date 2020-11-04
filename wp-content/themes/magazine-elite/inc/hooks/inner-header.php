<?php
if (!function_exists('magazine_elite_display_inner_header')) :
    /**
     * Inner Pages Header.
     *
     * @since 1.0.0
     */
    function magazine_elite_display_inner_header()
    {
        if(is_singular()){
            ?>
            <div class="wrapper inner-banner">
                <div class="entry-header-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="primary-font saga-bredcrumb">
                                    <?php
                                    /**
                                     * Hook - magazine_elite_display_breadcrumb.
                                     *
                                     * @hooked magazine_elite_breadcrumb_content - 10
                                     */
                                    do_action('magazine_elite_display_breadcrumb');
                                    ?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                                <?php if (!is_page()) { ?>
                                    <header class="entry-header">
                                        <div class="entry-meta entry-inner primary-font small-font">
                                            <?php magazine_elite_posted_on(); ?>
                                        </div>
                                    </header>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }else{
            ?>
            <div class="wrapper inner-banner">
                <div class="entry-header-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="primary-font saga-bredcrumb">
                                    <?php
                                    /**
                                     * Hook - magazine_elite_display_breadcrumb.
                                     *
                                     * @hooked magazine_elite_breadcrumb_content - 10
                                     */
                                    do_action('magazine_elite_display_breadcrumb');
                                    ?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <?php if (is_404()) { ?>
                                    <h1 class="entry-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'magazine-elite'); ?></h1>
                                <?php } elseif (is_archive()) {
                                    the_archive_title('<h1 class="entry-title">', '</h1>');
                                    the_archive_description('<div class="taxonomy-description">', '</div>');
                                } elseif (is_search()) { ?>
                                    <h1 class="entry-title"><?php printf(esc_html__('Search Results for: %s', 'magazine-elite'), '<span>' . get_search_query() . '</span>'); ?></h1>
                                <?php } else { ?>
                                    <h1 class="entry-title"></h1>
                                <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
endif;
add_action('magazine_elite_inner_header', 'magazine_elite_display_inner_header');