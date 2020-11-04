<?php

/*Get default values to set while building customizer elements*/
$default_options = magazine_elite_get_default_customizer_values();

/*Add Home Page Options Panel.*/
$wp_customize->add_panel(
    'theme_home_option_panel',
    array(
        'title' => __( 'Front Page Options', 'magazine-elite' ),
        'description' => __( 'Contains all front page settings', 'magazine-elite')
    )
);
/**/

/* ========== Home Page Slider Section ========== */
$wp_customize->add_section(
    'home_banner_options' ,
    array(
        'title' => __( 'Slider Options', 'magazine-elite' ),
        'panel' => 'theme_home_option_panel',
    )
);

/*Enable Slider Section*/
$wp_customize->add_setting(
    'theme_options[enable_slider_posts]',
    array(
        'default'           => $default_options['enable_slider_posts'],
        'sanitize_callback' => 'magazine_elite_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'theme_options[enable_slider_posts]',
    array(
        'label'    => __( 'Enable Banner Slider', 'magazine-elite' ),
        'section'  => 'home_banner_options',
        'type'     => 'checkbox',
    )
);

/*Slider Category.*/
$wp_customize->add_setting(
    'theme_options[slider_cat]',
    array(
        'default'           => $default_options['slider_cat'],
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(
    new Magazine_Elite_Dropdown_Taxonomies_Control(
        $wp_customize,
        'theme_options[slider_cat]',
        array(
            'label'    => __( 'Choose Slider category', 'magazine-elite' ),
            'section'  => 'home_banner_options',
            'active_callback'  => 'magazine_elite_is_banner_slider_enabled',
        )
    )
);

/* ========== Home Page Slider Section Close ========== */

/* ========== Home Page Featured Categories Section ========== */
$wp_customize->add_section(
    'home_featured_categories_options' ,
    array(
        'title' => __( 'Featured Categories Options', 'magazine-elite' ),
        'panel' => 'theme_home_option_panel',
    )
);

/*Enable Featured Categories Section*/
$wp_customize->add_setting(
    'theme_options[enable_ft_categories]',
    array(
        'default'           => $default_options['enable_ft_categories'],
        'sanitize_callback' => 'magazine_elite_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'theme_options[enable_ft_categories]',
    array(
        'label'    => __( 'Enable Featured Categories', 'magazine-elite' ),
        'section'  => 'home_featured_categories_options',
        'type'     => 'checkbox',
    )
);

/*1st Featured Category*/
$wp_customize->add_setting(
    'theme_options[first_ft_cat]',
    array(
        'default'           => $default_options['first_ft_cat'],
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(
    new Magazine_Elite_Dropdown_Taxonomies_Control(
        $wp_customize,
        'theme_options[first_ft_cat]',
        array(
            'label'    => __( 'Choose First Category', 'magazine-elite' ),
            'section'  => 'home_featured_categories_options',
            'active_callback'  => 'magazine_elite_is_ft_cats_enabled',
        )
    )
);

/*1st Featured Category Image*/
$wp_customize->add_setting(
    'theme_options[first_ft_cat_image]',
    array(
        'default'           => $default_options['first_ft_cat_image'],
        'sanitize_callback' => 'magazine_elite_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'theme_options[first_ft_cat_image]',
        array(
            'label'           => __( 'First Category Image', 'magazine-elite' ),
            'description'	  => sprintf( esc_html__( 'Recommended Size %1$s px X %2$s px', 'magazine-elite' ), 750, 90 ),
            'section'         => 'home_featured_categories_options',
            'active_callback'  => 'magazine_elite_is_ft_cats_enabled',
        )
    )
);

/*2nd Featured Category*/
$wp_customize->add_setting(
    'theme_options[second_ft_cat]',
    array(
        'default'           => $default_options['second_ft_cat'],
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(
    new Magazine_Elite_Dropdown_Taxonomies_Control(
        $wp_customize,
        'theme_options[second_ft_cat]',
        array(
            'label'    => __( 'Choose Second Category', 'magazine-elite' ),
            'section'  => 'home_featured_categories_options',
            'active_callback'  => 'magazine_elite_is_ft_cats_enabled',
        )
    )
);

/*2nd Featured Category Image*/
$wp_customize->add_setting(
    'theme_options[second_ft_cat_image]',
    array(
        'default'           => $default_options['second_ft_cat_image'],
        'sanitize_callback' => 'magazine_elite_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'theme_options[second_ft_cat_image]',
        array(
            'label'           => __( 'Second Category Image', 'magazine-elite' ),
            'description'	  => sprintf( esc_html__( 'Recommended Size %1$s px X %2$s px', 'magazine-elite' ), 750, 90 ),
            'section'         => 'home_featured_categories_options',
            'active_callback'  => 'magazine_elite_is_ft_cats_enabled',
        )
    )
);

/*3rd Featured Category*/
$wp_customize->add_setting(
    'theme_options[third_ft_cat]',
    array(
        'default'           => $default_options['third_ft_cat'],
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(
    new Magazine_Elite_Dropdown_Taxonomies_Control(
        $wp_customize,
        'theme_options[third_ft_cat]',
        array(
            'label'    => __( 'Choose Third Category', 'magazine-elite' ),
            'section'  => 'home_featured_categories_options',
            'active_callback'  => 'magazine_elite_is_ft_cats_enabled',
        )
    )
);

/*3rd Featured Category Image*/
$wp_customize->add_setting(
    'theme_options[third_ft_cat_image]',
    array(
        'default'           => $default_options['third_ft_cat_image'],
        'sanitize_callback' => 'magazine_elite_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'theme_options[third_ft_cat_image]',
        array(
            'label'           => __( 'Third Category Image', 'magazine-elite' ),
            'description'	  => sprintf( esc_html__( 'Recommended Size %1$s px X %2$s px', 'magazine-elite' ), 750, 90 ),
            'section'         => 'home_featured_categories_options',
            'active_callback'  => 'magazine_elite_is_ft_cats_enabled',
        )
    )
);

/*4th Featured Category*/
$wp_customize->add_setting(
    'theme_options[fourth_ft_cat]',
    array(
        'default'           => $default_options['fourth_ft_cat'],
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(
    new Magazine_Elite_Dropdown_Taxonomies_Control(
        $wp_customize,
        'theme_options[fourth_ft_cat]',
        array(
            'label'    => __( 'Choose Fourth Category', 'magazine-elite' ),
            'section'  => 'home_featured_categories_options',
            'active_callback'  => 'magazine_elite_is_ft_cats_enabled',
        )
    )
);

/*4th Featured Category Image*/
$wp_customize->add_setting(
    'theme_options[fourth_ft_cat_image]',
    array(
        'default'           => $default_options['fourth_ft_cat_image'],
        'sanitize_callback' => 'magazine_elite_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'theme_options[fourth_ft_cat_image]',
        array(
            'label'           => __( 'Fourth Category Image', 'magazine-elite' ),
            'description'	  => sprintf( esc_html__( 'Recommended Size %1$s px X %2$s px', 'magazine-elite' ), 750, 90 ),
            'section'         => 'home_featured_categories_options',
            'active_callback'  => 'magazine_elite_is_ft_cats_enabled',
        )
    )
);

/* ========== Home Page Featured Categories Section Close ========== */

/* ========== Home Page Full Width Grid Section ========== */
$wp_customize->add_section(
    'home_full_width_grid_cat_options' ,
    array(
        'title' => __( 'Full Width Grid Category Options', 'magazine-elite' ),
        'panel' => 'theme_home_option_panel',
    )
);

/*Enable Full Width Grid Category Section*/
$wp_customize->add_setting(
    'theme_options[enable_full_width_grid_cat]',
    array(
        'default'           => $default_options['enable_full_width_grid_cat'],
        'sanitize_callback' => 'magazine_elite_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'theme_options[enable_full_width_grid_cat]',
    array(
        'label'    => __( 'Enable Full Width Grid Category', 'magazine-elite' ),
        'section'  => 'home_full_width_grid_cat_options',
        'type'     => 'checkbox',
    )
);

/*Full Width Grid Category.*/
$wp_customize->add_setting(
    'theme_options[full_width_grid_cat]',
    array(
        'default'           => $default_options['full_width_grid_cat'],
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(
    new Magazine_Elite_Dropdown_Taxonomies_Control(
        $wp_customize,
        'theme_options[full_width_grid_cat]',
        array(
            'label'    => __( 'Choose Full Width Grid category', 'magazine-elite' ),
            'section'  => 'home_full_width_grid_cat_options',
            'active_callback'  => 'magazine_elite_is_full_grid_enabled',
        )
    )
);

/* ========== Home Page Full Width Grid Close ========== */


/* ========== Home Page Panel Grid Section ========== */
$wp_customize->add_section(
    'home_panel_grid_cat_options' ,
    array(
        'title' => __( 'Panel Grid Category Options', 'magazine-elite' ),
        'panel' => 'theme_home_option_panel',
    )
);

/*Enable Panel Grid Category Section*/
$wp_customize->add_setting(
    'theme_options[enable_panel_grid_cat]',
    array(
        'default'           => $default_options['enable_panel_grid_cat'],
        'sanitize_callback' => 'magazine_elite_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'theme_options[enable_panel_grid_cat]',
    array(
        'label'    => __( 'Enable Panel Grid Category', 'magazine-elite' ),
        'section'  => 'home_panel_grid_cat_options',
        'type'     => 'checkbox',
    )
);

/*Panel Grid Category.*/
$wp_customize->add_setting(
    'theme_options[first_panel_grid_cat]',
    array(
        'default'           => $default_options['first_panel_grid_cat'],
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(
    new Magazine_Elite_Dropdown_Taxonomies_Control(
        $wp_customize,
        'theme_options[first_panel_grid_cat]',
        array(
            'label'    => __( 'Choose First Panel Grid Category', 'magazine-elite' ),
            'section'  => 'home_panel_grid_cat_options',
            'active_callback'  => 'magazine_elite_is_panel_grid_enabled',
        )
    )
);
$wp_customize->add_setting(
    'theme_options[second_panel_grid_cat]',
    array(
        'default'           => $default_options['second_panel_grid_cat'],
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(
    new Magazine_Elite_Dropdown_Taxonomies_Control(
        $wp_customize,
        'theme_options[second_panel_grid_cat]',
        array(
            'label'    => __( 'Choose Second Panel Grid Category', 'magazine-elite' ),
            'section'  => 'home_panel_grid_cat_options',
            'active_callback'  => 'magazine_elite_is_panel_grid_enabled',
        )
    )
);
$wp_customize->add_setting(
    'theme_options[third_panel_grid_cat]',
    array(
        'default'           => $default_options['third_panel_grid_cat'],
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(
    new Magazine_Elite_Dropdown_Taxonomies_Control(
        $wp_customize,
        'theme_options[third_panel_grid_cat]',
        array(
            'label'    => __( 'Choose Third Panel Grid Category', 'magazine-elite' ),
            'section'  => 'home_panel_grid_cat_options',
            'active_callback'  => 'magazine_elite_is_panel_grid_enabled',
        )
    )
);

/* ========== Home Page Panel Grid Close ========== */

/* ========== Home Page Layout Section ========== */
$wp_customize->add_section(
    'home_page_layout_options',
    array(
        'title'      => __( 'Front Page Layout Options', 'magazine-elite' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'theme_options[home_page_layout]',
    array(
        'default'           => $default_options['home_page_layout'],
        'sanitize_callback' => 'magazine_elite_sanitize_select',
    )
);
$wp_customize->add_control(
    'theme_options[home_page_layout]',
    array(
        'label'       => __( 'Front Page Layout', 'magazine-elite' ),
        'section'     => 'home_page_layout_options',
        'type'        => 'select',
        'choices'     => array(
            'right-sidebar' => __( 'Content - Primary Sidebar', 'magazine-elite' ),
            'left-sidebar' => __( 'Primary Sidebar - Content', 'magazine-elite' ),
            'no-sidebar' => __( 'No Sidebar', 'magazine-elite' )
        ),
    )
);

/* ========== Home Page Layout Section Close ========== */

/*Add Theme Options Panel.*/
$wp_customize->add_panel(
    'theme_option_panel',
    array(
        'title' => __( 'Theme Options', 'magazine-elite' ),
        'description' => __( 'Contains all theme settings', 'magazine-elite')
    )
);
/**/

/* ========== Preloader Section  ========== */
$wp_customize->add_section(
    'preloader_options',
    array(
        'title'      => __( 'Preloader Options', 'magazine-elite' ),
        'panel'      => 'theme_option_panel',
    )
);
/*Enable Preloader*/
$wp_customize->add_setting(
    'theme_options[enable_preloader]',
    array(
        'default'           => $default_options['enable_preloader'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'magazine_elite_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'theme_options[enable_preloader]',
    array(
        'label'    => __( 'Enable Preloader', 'magazine-elite' ),
        'section'  => 'preloader_options',
        'type'     => 'checkbox',
    )
);
/* ========== Preloader Section Close ========== */

/* ========== Top Bar Section. ==========*/
$wp_customize->add_section(
    'top_bar_options',
    array(
        'title'      => __( 'TopBar Options', 'magazine-elite' ),
        'panel'      => 'theme_option_panel',
    )
);

/*Show Top Bar*/
$wp_customize->add_setting(
    'theme_options[show_top_bar]',
    array(
        'default'           => $default_options['show_top_bar'],
        'sanitize_callback' => 'magazine_elite_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'theme_options[show_top_bar]',
    array(
        'label'    => __( 'Show TopBar', 'magazine-elite' ),
        'section'  => 'top_bar_options',
        'type'     => 'checkbox',
    )
);

/* ========== Top Bar Section Close========== */


/* ========== AccessBar Section. ==========*/
$wp_customize->add_section(
    'access_bar_options',
    array(
        'title'      => __( 'AccessBar Options', 'magazine-elite' ),
        'panel'      => 'theme_option_panel',
    )
);

/*Show Access Bar*/
$wp_customize->add_setting(
    'theme_options[show_access_bar]',
    array(
        'default'           => $default_options['show_access_bar'],
        'sanitize_callback' => 'magazine_elite_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'theme_options[show_access_bar]',
    array(
        'label'    => __( 'Show AccessBar', 'magazine-elite' ),
        'section'  => 'access_bar_options',
        'type'     => 'checkbox',
    )
);

/*Contact Form Shortcode*/
$wp_customize->add_setting(
    'theme_options[contact_form_shortcode]',
    array(
        'default'           => $default_options['contact_form_shortcode'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'theme_options[contact_form_shortcode]',
    array(
        'label'    => __( 'Contact Form Shortcode', 'magazine-elite' ),
        'section'  => 'access_bar_options',
        'type'     => 'text',
        'active_callback' => 'magazine_elite_is_accessbar_enabled',
    )
);

/*Google Map Shortcode*/
$wp_customize->add_setting(
    'theme_options[google_map_shortcode]',
    array(
        'default'           => $default_options['google_map_shortcode'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'theme_options[google_map_shortcode]',
    array(
        'label'    => __( 'Google Map Shortcode', 'magazine-elite' ),
        'section'  => 'access_bar_options',
        'type'     => 'text',
        'active_callback' => 'magazine_elite_is_accessbar_enabled',
    )
);

/* ========== AccessBar Section Close========== */


/* ========== Layout Section ========== */
$wp_customize->add_section(
    'layout_options',
    array(
        'title'      => __( 'Layout Options', 'magazine-elite' ),
        'panel'      => 'theme_option_panel',
    )
);

$wp_customize->add_setting(
    'theme_options[enable_masonry_post_archive]',
    array(
        'default'           => $default_options['enable_masonry_post_archive'],
        'sanitize_callback' => 'magazine_elite_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'theme_options[enable_masonry_post_archive]',
    array(
        'label'    => esc_html__( 'Enable Masonry for Posts Listings', 'magazine-elite' ),
        'section'  => 'layout_options',
        'type'     => 'checkbox',
    )
);

/* Site Layout*/
$wp_customize->add_setting(
    'theme_options[site_layout]',
    array(
        'default'           => $default_options['site_layout'],
        'sanitize_callback' => 'magazine_elite_sanitize_select',
    )
);
$wp_customize->add_control(
    'theme_options[site_layout]',
    array(
        'label'       => __( 'Site Layout', 'magazine-elite' ),
        'section'     => 'layout_options',
        'type'        => 'select',
        'choices'     => array(
            'full-width' => __( 'FullWidth', 'magazine-elite' ),
            'semi-boxed' => __( 'Semi-Boxed', 'magazine-elite' )
        ),
    )
);

/* Global Layout*/
$wp_customize->add_setting(
    'theme_options[global_layout]',
    array(
        'default'           => $default_options['global_layout'],
        'sanitize_callback' => 'magazine_elite_sanitize_select',
    )
);
$wp_customize->add_control(
    'theme_options[global_layout]',
    array(
        'label'       => __( 'Global Layout', 'magazine-elite' ),
        'section'     => 'layout_options',
        'type'        => 'select',
        'choices'     => array(
            'right-sidebar' => __( 'Content - Primary Sidebar', 'magazine-elite' ),
            'left-sidebar' => __( 'Primary Sidebar - Content', 'magazine-elite' ),
            'no-sidebar' => __( 'No Sidebar', 'magazine-elite' )
        ),
    )
);


/* Image in Archive Page */
$wp_customize->add_setting(
    'theme_options[archive_image]',
    array(
        'default'           => $default_options['archive_image'],
        'sanitize_callback' => 'magazine_elite_sanitize_select',
    )
);
$wp_customize->add_control(
    'theme_options[archive_image]',
    array(
        'label'       => __( 'Image in Archive Page', 'magazine-elite' ),
        'section'     => 'layout_options',
        'type'        => 'select',
        'choices'     => array(
            'full' => __( 'Full', 'magazine-elite' ),
            'no-image' => __( 'No Image', 'magazine-elite' )
        ),
    )
);

/* Image in Single Post*/
$wp_customize->add_setting(
    'theme_options[single_post_image]',
    array(
        'default'           => $default_options['single_post_image'],
        'sanitize_callback' => 'magazine_elite_sanitize_select',
    )
);
$wp_customize->add_control(
    'theme_options[single_post_image]',
    array(
        'label'       => __( 'Image in Single Posts', 'magazine-elite' ),
        'section'     => 'layout_options',
        'type'        => 'select',
        'choices'     => array(
            'full' => __( 'Full', 'magazine-elite' ),
            'no-image' => __( 'No Image', 'magazine-elite' )
        ),
    )
);

/* Image in Single Page*/
$wp_customize->add_setting(
    'theme_options[single_page_image]',
    array(
        'default'           => $default_options['single_page_image'],
        'sanitize_callback' => 'magazine_elite_sanitize_select',
    )
);
$wp_customize->add_control(
    'theme_options[single_page_image]',
    array(
        'label'       => __( 'Image in Single Page', 'magazine-elite' ),
        'section'     => 'layout_options',
        'type'        => 'select',
        'choices'     => array(
            'full' => __( 'Full', 'magazine-elite' ),
            'no-image' => __( 'No Image', 'magazine-elite' )
        ),
    )
);

/* ========== Layout Section Close ========== */

/* ========== Pagination Section ========== */
$wp_customize->add_section(
    'pagination_options',
    array(
        'title'      => __( 'Pagination Options', 'magazine-elite' ),
        'panel'      => 'theme_option_panel',
    )
);

/*Pagination Type*/
$wp_customize->add_setting( 
    'theme_options[pagination_type]',
    array(
        'default'           => $default_options['pagination_type'],
        'sanitize_callback' => 'magazine_elite_sanitize_select',
    )
);
$wp_customize->add_control( 
    'theme_options[pagination_type]',
    array(
        'label'       => __( 'Pagination Type', 'magazine-elite' ),
        'section'     => 'pagination_options',
        'type'        => 'select',
        'choices'     => array(
            'default' => esc_html__( 'Default (Older / Newer Post)', 'magazine-elite' ),
            'numeric' => esc_html__( 'Numeric', 'magazine-elite' ),
            'button_click_load' => esc_html__( 'Button Click Ajax Load', 'magazine-elite' ),
            'infinite_scroll_load' => esc_html__( 'Infinite Scroll Ajax Load', 'magazine-elite' ),
        ),
    )
);
/* ========== Pagination Section Close========== */

/* ========== Breadcrumb Section ========== */
$wp_customize->add_section(
    'breadcrumb_options',
    array(
        'title'      => __( 'Breadcrumb Options', 'magazine-elite' ),
        'panel'      => 'theme_option_panel',
    )
);

/* Breadcrumb Type*/
$wp_customize->add_setting(
    'theme_options[breadcrumb_type]',
    array(
        'default'           => $default_options['breadcrumb_type'],
        'sanitize_callback' => 'magazine_elite_sanitize_select',
    )
);
$wp_customize->add_control(
    'theme_options[breadcrumb_type]',
    array(
        'label'       => __( 'Breadcrumb Type', 'magazine-elite' ),
        'description' => sprintf( esc_html__( 'Advanced: Requires %1$sBreadcrumb NavXT%2$s plugin', 'magazine-elite' ), '<a href="https://wordpress.org/plugins/breadcrumb-navxt/" target="_blank">','</a>' ),
        'section'     => 'breadcrumb_options',
        'type'        => 'select',
        'choices'     => array(
            'disabled' => __( 'Disabled', 'magazine-elite' ),
            'simple' => __( 'Simple', 'magazine-elite' ),
            'advanced' => __( 'Advanced', 'magazine-elite' ),
        ),
    )
);
/* ========== Breadcrumb Section Close ========== */

/* ========== Excerpt Section ========== */
$wp_customize->add_section(
    'excerpt_options',
    array(
        'title'      => __( 'Excerpt Options', 'magazine-elite' ),
        'panel'      => 'theme_option_panel',
    )
);

/* Excerpt Length */
$wp_customize->add_setting(
    'theme_options[excerpt_length]',
    array(
        'default'           => $default_options['excerpt_length'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'theme_options[excerpt_length]',
    array(
        'label'       => __( 'Excerpt Length', 'magazine-elite' ),
        'section'     => 'excerpt_options',
        'type'        => 'number',
    )
);

/* ========== Excerpt Section Close ========== */

/* ========== Footer Section ========== */
$wp_customize->add_section(
    'footer_options' ,
    array(
        'title' => __( 'Footer Options', 'magazine-elite' ),
        'panel' => 'theme_option_panel',
    )
);
/*Copyright Text.*/
$wp_customize->add_setting(
    'theme_options[copyright_text]',
    array(
        'default'           => $default_options['copyright_text'],
        'sanitize_callback' => 'sanitize_text_field',
        'transport'           => 'postMessage',
    )
);
$wp_customize->add_control(
    'theme_options[copyright_text]',
    array(
        'label'    => __( 'Copyright Text', 'magazine-elite' ),
        'section'  => 'footer_options',
        'type'     => 'textarea',
    )
);
/* ========== Footer Section Close========== */
