<?php
/**
 * Food Grocery Store Theme Customizer
 *
 * @package Food Grocery Store
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function food_grocery_store_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'food_grocery_store_custom_controls' );

function food_grocery_store_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'food_grocery_store_customize_partial_blogname',
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'food_grocery_store_customize_partial_blogdescription',
	));

	//add home page setting pannel
	$food_grocery_store_parent_panel = new Food_Grocery_Store_WP_Customize_Panel( $wp_customize, 'food_grocery_store_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'food-grocery-store' ),
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'food_grocery_store_left_right', array(
    	'title' => esc_html__( 'General Settings', 'food-grocery-store' ),
		'panel' => 'food_grocery_store_panel_id'
	) );

	$wp_customize->add_setting('food_grocery_store_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'food_grocery_store_sanitize_choices'
	));
	$wp_customize->add_control(new Food_Grocery_Store_Image_Radio_Control($wp_customize, 'food_grocery_store_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','food-grocery-store'),
        'description' => esc_html__('Here you can change the width layout of Website.','food-grocery-store'),
        'section' => 'food_grocery_store_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('food_grocery_store_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'food_grocery_store_sanitize_choices'
	));
	$wp_customize->add_control('food_grocery_store_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','food-grocery-store'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','food-grocery-store'),
        'section' => 'food_grocery_store_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','food-grocery-store'),
            'Right Sidebar' => esc_html__('Right Sidebar','food-grocery-store'),
            'One Column' => esc_html__('One Column','food-grocery-store'),
            'Three Columns' => esc_html__('Three Columns','food-grocery-store'),
            'Four Columns' => esc_html__('Four Columns','food-grocery-store'),
            'Grid Layout' => esc_html__('Grid Layout','food-grocery-store')
        ),
	) );

	$wp_customize->add_setting('food_grocery_store_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'food_grocery_store_sanitize_choices'
	));
	$wp_customize->add_control('food_grocery_store_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','food-grocery-store'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','food-grocery-store'),
        'section' => 'food_grocery_store_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','food-grocery-store'),
            'Right Sidebar' => esc_html__('Right Sidebar','food-grocery-store'),
            'One Column' => esc_html__('One Column','food-grocery-store')
        ),
	) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'food_grocery_store_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'food_grocery_store_switch_sanitization'
    ) );
    $wp_customize->add_control( new Food_Grocery_Store_Toggle_Switch_Custom_Control( $wp_customize, 'food_grocery_store_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','food-grocery-store' ),
		'section' => 'food_grocery_store_left_right'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'food_grocery_store_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'food_grocery_store_switch_sanitization'
    ) );
    $wp_customize->add_control( new Food_Grocery_Store_Toggle_Switch_Custom_Control( $wp_customize, 'food_grocery_store_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','food-grocery-store' ),
		'section' => 'food_grocery_store_left_right'
    )));

    //Pre-Loader
	$wp_customize->add_setting( 'food_grocery_store_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'food_grocery_store_switch_sanitization'
    ) );
    $wp_customize->add_control( new Food_Grocery_Store_Toggle_Switch_Custom_Control( $wp_customize, 'food_grocery_store_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','food-grocery-store' ),
        'section' => 'food_grocery_store_left_right'
    )));

	$wp_customize->add_setting('food_grocery_store_loader_icon',array(
        'default' => 'Two Way',
        'sanitize_callback' => 'food_grocery_store_sanitize_choices'
	));
	$wp_customize->add_control('food_grocery_store_loader_icon',array(
        'type' => 'select',
        'label' => esc_html__('Pre-Loader Type','food-grocery-store'),
        'section' => 'food_grocery_store_left_right',
        'choices' => array(
            'Two Way' => esc_html__('Two Way','food-grocery-store'),
            'Dots' => esc_html__('Dots','food-grocery-store'),
            'Rotate' => esc_html__('Rotate','food-grocery-store')
        ),
	) );

	//Top Header
	$wp_customize->add_section( 'food_grocery_store_top_header' , array(
    	'title' => esc_html__( 'Top Header', 'food-grocery-store' ),
		'panel' => 'food_grocery_store_panel_id'
	) );

	$wp_customize->add_setting('food_grocery_store_daily_deals_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('food_grocery_store_daily_deals_text',array(
		'label'	=> esc_html__('Daily Deals Text','food-grocery-store'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Daily Deals', 'food-grocery-store' ),
        ),
		'section'=> 'food_grocery_store_top_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('food_grocery_store_daily_deals_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('food_grocery_store_daily_deals_link',array(
		'label'	=> esc_html__('Daily Deals Link','food-grocery-store'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'https://example.com/page', 'food-grocery-store' ),
        ),
		'section'=> 'food_grocery_store_top_header',
		'type'=> 'url'
	));

	$wp_customize->add_setting('food_grocery_store_contact_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('food_grocery_store_contact_text',array(
		'label'	=> esc_html__('Help & Contact Text','food-grocery-store'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Help & Contact', 'food-grocery-store' ),
        ),
		'section'=> 'food_grocery_store_top_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('food_grocery_store_contact_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('food_grocery_store_contact_link',array(
		'label'	=> esc_html__('Help & Contact Link','food-grocery-store'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'https://example.com/page', 'food-grocery-store' ),
        ),
		'section'=> 'food_grocery_store_top_header',
		'type'=> 'url'
	));

	$wp_customize->add_setting( 'food_grocery_store_order_tracking',array(
		'default' =>  0,
		'transport' => 'refresh',
		'sanitize_callback' => 'food_grocery_store_switch_sanitization'
    ));
    $wp_customize->add_control( new Food_Grocery_Store_Toggle_Switch_Custom_Control( $wp_customize, 'food_grocery_store_order_tracking',array(
		'label' => esc_html__( 'On / Off Order Tracking','food-grocery-store' ),
		'section' => 'food_grocery_store_top_header'
    )));

	$wp_customize->add_setting('food_grocery_store_phone_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('food_grocery_store_phone_text',array(
		'label'	=> esc_html__('Phone Text','food-grocery-store'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Need Help Ordering ?', 'food-grocery-store' ),
        ),
		'section'=> 'food_grocery_store_top_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('food_grocery_store_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'food_grocery_store_sanitize_phone_number'
	));	
	$wp_customize->add_control('food_grocery_store_phone_number',array(
		'label'	=> esc_html__('Phone Number','food-grocery-store'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '+00 123 456 7890', 'food-grocery-store' ),
        ),
		'section'=> 'food_grocery_store_top_header',
		'type'=> 'text'
	));
    
	//Slider
	$wp_customize->add_section( 'food_grocery_store_slidersettings' , array(
    	'title' => esc_html__( 'Slider Settings', 'food-grocery-store' ),
		'panel' => 'food_grocery_store_panel_id'
	) );

	$wp_customize->add_setting( 'food_grocery_store_slider_arrows',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'food_grocery_store_switch_sanitization'
    ));  
    $wp_customize->add_control( new Food_Grocery_Store_Toggle_Switch_Custom_Control( $wp_customize, 'food_grocery_store_slider_arrows',array(
      	'label' => esc_html__( 'Show / Hide Slider','food-grocery-store' ),
      	'section' => 'food_grocery_store_slidersettings'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('food_grocery_store_slider_arrows',array(
		'selector'        => '#slider .carousel-caption h1',
		'render_callback' => 'food_grocery_store_customize_partial_food_grocery_store_slider_arrows',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'food_grocery_store_slider_page' . $count, array(
			'default'  => '',
			'sanitize_callback' => 'food_grocery_store_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'food_grocery_store_slider_page' . $count, array(
			'label'    => esc_html__( 'Select Slider Page', 'food-grocery-store' ),
			'description' => esc_html__('Slider image size (1400 x 550)','food-grocery-store'),
			'section'  => 'food_grocery_store_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//content layout
	$wp_customize->add_setting('food_grocery_store_slider_content_option',array(
        'default' => 'Center',
        'sanitize_callback' => 'food_grocery_store_sanitize_choices'
	));
	$wp_customize->add_control(new Food_Grocery_Store_Image_Radio_Control($wp_customize, 'food_grocery_store_slider_content_option', array(
        'type' => 'select',
        'label' => esc_html__('Slider Content Layouts','food-grocery-store'),
        'section' => 'food_grocery_store_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'food_grocery_store_slider_excerpt_number', array(
		'default'              => 25,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'food_grocery_store_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'food_grocery_store_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','food-grocery-store' ),
		'section'     => 'food_grocery_store_slidersettings',
		'type'        => 'range',
		'settings'    => 'food_grocery_store_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );
 
	//Product Section
	$wp_customize->add_section('food_grocery_store_product_section',array(
		'title'	=> esc_html__('Trending Product Section','food-grocery-store'),
		'panel' => 'food_grocery_store_panel_id',
	));

	$wp_customize->add_setting( 'food_grocery_store_product_settings' , array(
		'default' => '',
		'sanitize_callback' => 'food_grocery_store_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'food_grocery_store_product_settings' , array(
		'label'    => esc_html__( 'Select Product Page', 'food-grocery-store' ),
		'section'  => 'food_grocery_store_product_section',
		'type'     => 'dropdown-pages'
	) );

	//Blog Post
	$wp_customize->add_panel( $food_grocery_store_parent_panel );

	$BlogPostParentPanel = new Food_Grocery_Store_WP_Customize_Panel( $wp_customize, 'food_grocery_store_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'food-grocery-store' ),
		'panel' => 'food_grocery_store_panel_id',
		'priority' => 20,
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'food_grocery_store_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'food-grocery-store' ),
		'panel' => 'food_grocery_store_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('food_grocery_store_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'food_grocery_store_customize_partial_food_grocery_store_toggle_postdate', 
	));

	$wp_customize->add_setting( 'food_grocery_store_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'food_grocery_store_switch_sanitization'
    ) );
    $wp_customize->add_control( new Food_Grocery_Store_Toggle_Switch_Custom_Control( $wp_customize, 'food_grocery_store_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','food-grocery-store' ),
        'section' => 'food_grocery_store_post_settings'
    )));

    $wp_customize->add_setting( 'food_grocery_store_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'food_grocery_store_switch_sanitization'
    ) );
    $wp_customize->add_control( new Food_Grocery_Store_Toggle_Switch_Custom_Control( $wp_customize, 'food_grocery_store_toggle_author',array(
		'label' => esc_html__( 'Author','food-grocery-store' ),
		'section' => 'food_grocery_store_post_settings'
    )));

    $wp_customize->add_setting( 'food_grocery_store_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'food_grocery_store_switch_sanitization'
    ) );
    $wp_customize->add_control( new Food_Grocery_Store_Toggle_Switch_Custom_Control( $wp_customize, 'food_grocery_store_toggle_comments',array(
		'label' => esc_html__( 'Comments','food-grocery-store' ),
		'section' => 'food_grocery_store_post_settings'
    )));

    $wp_customize->add_setting( 'food_grocery_store_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'food_grocery_store_switch_sanitization'
	));
    $wp_customize->add_control( new Food_Grocery_Store_Toggle_Switch_Custom_Control( $wp_customize, 'food_grocery_store_toggle_tags', array(
		'label' => esc_html__( 'Tags','food-grocery-store' ),
		'section' => 'food_grocery_store_post_settings'
    )));

    $wp_customize->add_setting( 'food_grocery_store_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'food_grocery_store_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'food_grocery_store_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','food-grocery-store' ),
		'section'     => 'food_grocery_store_post_settings',
		'type'        => 'range',
		'settings'    => 'food_grocery_store_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('food_grocery_store_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'food_grocery_store_sanitize_choices'
    ));
    $wp_customize->add_control(new Food_Grocery_Store_Image_Radio_Control($wp_customize, 'food_grocery_store_blog_layout_option', array(
        'type' => 'select',
        'label' => esc_html__('Blog Layouts','food-grocery-store'),
        'section' => 'food_grocery_store_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('food_grocery_store_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'food_grocery_store_sanitize_choices'
	));
	$wp_customize->add_control('food_grocery_store_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','food-grocery-store'),
        'section' => 'food_grocery_store_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','food-grocery-store'),
            'Excerpt' => esc_html__('Excerpt','food-grocery-store'),
            'No Content' => esc_html__('No Content','food-grocery-store')
        ),
	) );

    // Button Settings
	$wp_customize->add_section( 'food_grocery_store_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'food-grocery-store' ),
		'panel' => 'food_grocery_store_blog_post_parent_panel',
	));

	$wp_customize->add_setting('food_grocery_store_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('food_grocery_store_button_padding_top_bottom',array(
		'label'	=> esc_html__('Padding Top Bottom','food-grocery-store'),
		'description' => esc_html__('Enter a value in pixels. Example:20px','food-grocery-store'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '10px', 'food-grocery-store' ),
        ),
		'section' => 'food_grocery_store_button_settings',
		'type' => 'text'
	));

	$wp_customize->add_setting('food_grocery_store_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('food_grocery_store_button_padding_left_right',array(
		'label'	=> esc_html__('Padding Left Right','food-grocery-store'),
		'description' => esc_html__('Enter a value in pixels. Example:20px','food-grocery-store'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '10px', 'food-grocery-store' ),
        ),
		'section' => 'food_grocery_store_button_settings',
		'type' => 'text'
	));

	$wp_customize->add_setting( 'food_grocery_store_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'food_grocery_store_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'food_grocery_store_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','food-grocery-store' ),
		'section'     => 'food_grocery_store_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('food_grocery_store_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'food_grocery_store_customize_partial_food_grocery_store_button_text', 
	));

    $wp_customize->add_setting('food_grocery_store_button_text',array(
		'default'=> esc_html__('READ MORE','food-grocery-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('food_grocery_store_button_text',array(
		'label'	=> esc_html__('Add Button Text','food-grocery-store'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'READ MORE', 'food-grocery-store' ),
        ),
		'section'=> 'food_grocery_store_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'food_grocery_store_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'food-grocery-store' ),
		'panel' => 'food_grocery_store_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('food_grocery_store_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'food_grocery_store_customize_partial_food_grocery_store_related_post_title', 
	));

    $wp_customize->add_setting( 'food_grocery_store_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'food_grocery_store_switch_sanitization'
    ) );
    $wp_customize->add_control( new Food_Grocery_Store_Toggle_Switch_Custom_Control( $wp_customize, 'food_grocery_store_related_post',array(
		'label' => esc_html__( 'Related Post','food-grocery-store' ),
		'section' => 'food_grocery_store_related_posts_settings'
    )));

    $wp_customize->add_setting('food_grocery_store_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('food_grocery_store_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','food-grocery-store'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'food-grocery-store' ),
        ),
		'section'=> 'food_grocery_store_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('food_grocery_store_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('food_grocery_store_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','food-grocery-store'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'food-grocery-store' ),
        ),
		'section'=> 'food_grocery_store_related_posts_settings',
		'type'=> 'number'
	));

	//Responsive Media Settings
	$wp_customize->add_section('food_grocery_store_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','food-grocery-store'),
		'panel' => 'food_grocery_store_panel_id',
	));

    $wp_customize->add_setting( 'food_grocery_store_resp_slider_hide_show',array(
      	'default' => 0,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'food_grocery_store_switch_sanitization'
    ));  
    $wp_customize->add_control( new Food_Grocery_Store_Toggle_Switch_Custom_Control( $wp_customize, 'food_grocery_store_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','food-grocery-store' ),
      	'section' => 'food_grocery_store_responsive_media'
    )));

	$wp_customize->add_setting( 'food_grocery_store_metabox_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'food_grocery_store_switch_sanitization'
    ));  
    $wp_customize->add_control( new Food_Grocery_Store_Toggle_Switch_Custom_Control( $wp_customize, 'food_grocery_store_metabox_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Metabox','food-grocery-store' ),
      	'section' => 'food_grocery_store_responsive_media'
    )));

    $wp_customize->add_setting( 'food_grocery_store_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'food_grocery_store_switch_sanitization'
    ));  
    $wp_customize->add_control( new Food_Grocery_Store_Toggle_Switch_Custom_Control( $wp_customize, 'food_grocery_store_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','food-grocery-store' ),
      	'section' => 'food_grocery_store_responsive_media'
    )));

    $wp_customize->add_setting( 'food_grocery_store_resp_scroll_top_hide_show',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'food_grocery_store_switch_sanitization'
    ));  
    $wp_customize->add_control( new Food_Grocery_Store_Toggle_Switch_Custom_Control( $wp_customize, 'food_grocery_store_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','food-grocery-store' ),
      	'section' => 'food_grocery_store_responsive_media'
    )));

	//Footer Text
	$wp_customize->add_section('food_grocery_store_footer',array(
		'title'	=> esc_html__('Footer Settings','food-grocery-store'),
		'panel' => 'food_grocery_store_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('food_grocery_store_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'food_grocery_store_customize_partial_food_grocery_store_footer_text', 
	));
	
	$wp_customize->add_setting('food_grocery_store_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('food_grocery_store_footer_text',array(
		'label'	=> esc_html__('Copyright Text','food-grocery-store'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2020, .....', 'food-grocery-store' ),
        ),
		'section'=> 'food_grocery_store_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('food_grocery_store_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'food_grocery_store_sanitize_choices'
	));
	$wp_customize->add_control(new Food_Grocery_Store_Image_Radio_Control($wp_customize, 'food_grocery_store_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','food-grocery-store'),
        'section' => 'food_grocery_store_footer',
        'settings' => 'food_grocery_store_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting( 'food_grocery_store_footer_scroll',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'food_grocery_store_switch_sanitization'
    ));  
    $wp_customize->add_control( new Food_Grocery_Store_Toggle_Switch_Custom_Control( $wp_customize, 'food_grocery_store_footer_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','food-grocery-store' ),
      	'section' => 'food_grocery_store_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('food_grocery_store_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'food_grocery_store_customize_partial_food_grocery_store_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('food_grocery_store_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'food_grocery_store_sanitize_choices'
	));
	$wp_customize->add_control(new Food_Grocery_Store_Image_Radio_Control($wp_customize, 'food_grocery_store_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','food-grocery-store'),
        'section' => 'food_grocery_store_footer',
        'settings' => 'food_grocery_store_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

    // Has to be at the top
	$wp_customize->register_panel_type( 'Food_Grocery_Store_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'Food_Grocery_Store_WP_Customize_Section' );
}

add_action( 'customize_register', 'food_grocery_store_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class Food_Grocery_Store_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'food_grocery_store_panel';
	    public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;
			return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class Food_Grocery_Store_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'food_grocery_store_section';
	    public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;

			if ( $this->panel ) {
			$array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
			} else {
			$array['customizeAction'] = 'Customizing';
			}
			return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function food_grocery_store_customize_controls_scripts() {
	wp_enqueue_script( 'food-grocery-store-customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'food_grocery_store_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Food_Grocery_Store_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Food_Grocery_Store_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Food_Grocery_Store_Customize_Section_Pro( $manager,'food_grocery_store_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Food Grocery Store Pro', 'food-grocery-store' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'food-grocery-store' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/grocery-store-wordpress-theme/'),
		) )	);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'food-grocery-store-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'food-grocery-store-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Food_Grocery_Store_Customize::get_instance();