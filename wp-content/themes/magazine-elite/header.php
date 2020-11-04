<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Magazine_Elite
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php
$show_access_bar = magazine_elite_get_option('show_access_bar',true);
if($show_access_bar):
?>
    <div class="accessbar">
        <div class="accessbar-last">
            <div class="author-trigger">
                <span id="saga-reveal" class="trigger-bt-icon">
                    <i class="ion-ios-location"></i>
                </span>
            </div>
            <div id="scroll-up">
                <span class="trigger-bt-icon">
                    <i class="ion-ios-arrow-up"></i>
                </span>
            </div>
        </div>
        <div class="accessbar-first clearfix">
            <?php if (is_active_sidebar('offcanvas')) : ?>
                <div class="icon-sidr">
                    <div class="offcanvas-navigation trigger-nav">
                        <div id="widgets-nav" class="trigger-icon">
                            <span class="icon-bar top"></span>
                            <span class="icon-bar middle"></span>
                            <span class="icon-bar bottom"></span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="social-icons">
                <?php
                wp_nav_menu( array(
                        'theme_location' => 'social-nav',
                        'link_before' => '<span class="screen-reader-text">',
                        'link_after' => '</span>',
                        'menu_id' => 'social-menu',
                        'fallback_cb' => false,
                        'depth'        => 1,
                        'menu_class'=> false
                    )
                );
                ?>
            </div>
        </div>
    </div>
<?php endif;?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'magazine-elite'); ?></a>

    <?php
    $enable_preloader = magazine_elite_get_option('enable_preloader',true);
    $style = 'style="display:none"';
    if($enable_preloader) {
        $style = '';
    }
    ?>
    <div class="preloader" <?php echo $style; ?>>
        <div class="loader-wrapper">
            <div class="loader-content">
                <div class="loader-dot dot-1"></div>
                <div class="loader-dot dot-2"></div>
                <div class="loader-dot dot-3"></div>
                <div class="loader-dot dot-4"></div>
                <div class="loader-dot dot-5"></div>
                <div class="loader-dot dot-6"></div>
                <div class="loader-dot dot-7"></div>
                <div class="loader-dot dot-8"></div>
                <div class="loader-dot dot-center"></div>
            </div>
        </div>
    </div>

    <header id="saga-header" class="site-header">
        <?php
        $show_top_bar = magazine_elite_get_option('show_top_bar',true);
        if($show_top_bar){
            ?>
            <div class="saga-topnav">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-10 col-xs-10">
                            <div class="top-nav primary-font">
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'topbar-menu',
                                    'menu_id' => 'top-menu',
                                    'container' => 'div',
                                    'depth'        => 1,
                                    'menu_class'=> false,
                                    'fallback_cb'=> false,
                                    )
                                );
                                ?>
                            </div>
                        </div>
                        <div class="pull-right">
                            <a href="#" class="search-button">
                                <span class="saga-search-icon" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="search-box">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 col-xs-12">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
        </div><!--Searchbar Ends-->

        <div class="saga-midnav data-bg" data-background="<?php echo( get_header_image() ); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="site-branding text-center">
                            <?php
                            the_custom_logo();
    
                            if ( is_front_page() && is_home() ) : ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php else : ?>
                                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php
                            endif;

                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                                <p class="site-description primary-font">
                                    <span><?php echo $description; ?></span>
                                </p>
                                <?php
                            endif;
                            ?>
                        </div><!-- .site-branding -->
                    </div>
                </div>
            </div>
        </div>
        <div class="saga-navigation">
            <div class="navigation-wrapper">
                <nav id="site-navigation" class="main-navigation">
                <span class="toggle-menu" aria-controls="primary-menu" aria-expanded="false">
                     <span class="screen-reader-text">
                        <?php esc_html_e('Primary Menu', 'magazine-elite'); ?>
                    </span>
                    <i class="ham"></i>
                </span>
                <?php wp_nav_menu(array(
                    'theme_location' => 'menu-1',
                    'menu_id' => 'primary-menu',
                    'container' => 'div',
                    'container_class' => 'menu'
                )); ?>
                </nav><!-- #site-navigation -->
            </div>
        </div>
    </header><!-- #masthead -->

    <?php
    if( is_front_page() ) {
        /**
         * Hook - magazine_elite_home_section.
         *
         * @hooked magazine_elite_banner_content - 10
         * @hooked magazine_elite_featured_categories - 20
         * @hooked magazine_elite_home_full_grid_cat - 30
         * @hooked magazine_elite_home_panel_grid_cat - 40
         */
        do_action('magazine_elite_home_section');
    }else{
        /**
         * Hook - magazine_elite_inner_header.
         *
         * @hooked magazine_elite_display_inner_header - 10
         */
        do_action('magazine_elite_inner_header');
        ?>
            <div id="content" class="site-content">
        <?php
    }