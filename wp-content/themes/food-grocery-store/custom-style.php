<?php

/*---------------------------First highlight color-------------------*/

	$food_grocery_store_color = get_theme_mod('food_grocery_store_color');

	$food_grocery_store_custom_css= "";

	if($food_grocery_store_color != false){
		$food_grocery_store_custom_css .='.search-box button, span.cart-value, .more-btn a, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, input[type="submit"], #footer-2, #comments a.comment-reply-link, #comments input[type="submit"], #sidebar h3, .pagination span, .pagination a, nav.woocommerce-MyAccount-navigation ul li, .toggle-nav i, .scrollup i,.widget_product_search button{';
			$food_grocery_store_custom_css .='background: '.esc_html($food_grocery_store_color).';';
		$food_grocery_store_custom_css .='}';

		$food_grocery_store_custom_css .='@media screen and (max-width:720px){
				.logo{';
			$food_grocery_store_custom_css .='background: '.esc_html($food_grocery_store_color).';';
		$food_grocery_store_custom_css .='} }';
	}
	if($food_grocery_store_color != false){
		$food_grocery_store_custom_css .='a, .main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a, .main-navigation a:hover, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .main-navigation ul.sub-menu a:hover{';
			$food_grocery_store_custom_css .='color: '.esc_html($food_grocery_store_color).';';
		$food_grocery_store_custom_css .='}';
	}	
	if($food_grocery_store_color != false){
		$food_grocery_store_custom_css .='.search-box form.woocommerce-product-search, .product-cat, .main-navigation ul ul{';
			$food_grocery_store_custom_css .='border-color: '.esc_html($food_grocery_store_color).';';
		$food_grocery_store_custom_css .='}';

		$food_grocery_store_custom_css .='@media screen and (max-width:720px){
				button.product-btn{';
			$food_grocery_store_custom_css .='border-color: '.esc_html($food_grocery_store_color).';';
		$food_grocery_store_custom_css .='} }';
	}

	/*---------------------------Width Layout -------------------*/

	$food_grocery_store_theme_lay = get_theme_mod( 'food_grocery_store_width_option','Full Width');
    if($food_grocery_store_theme_lay == 'Boxed'){
		$food_grocery_store_custom_css .='body{';
			$food_grocery_store_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$food_grocery_store_custom_css .='}';
		$food_grocery_store_custom_css .='#middle-header input[type="search"]{';
			$food_grocery_store_custom_css .='width:84.5%';
		$food_grocery_store_custom_css .='}';
		$food_grocery_store_custom_css .='#slider{';
			$food_grocery_store_custom_css .='right: 1%;';
		$food_grocery_store_custom_css .='}';
	}else if($food_grocery_store_theme_lay == 'Wide Width'){
		$food_grocery_store_custom_css .='body{';
			$food_grocery_store_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$food_grocery_store_custom_css .='}';
	}else if($food_grocery_store_theme_lay == 'Full Width'){
		$food_grocery_store_custom_css .='body{';
			$food_grocery_store_custom_css .='max-width: 100%;';
		$food_grocery_store_custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/

	$food_grocery_store_theme_lay = get_theme_mod( 'food_grocery_store_slider_content_option','Center');
    if($food_grocery_store_theme_lay == 'Left'){
		$food_grocery_store_custom_css .='#slider .carousel-caption{';
			$food_grocery_store_custom_css .='text-align:left; right: 45%; left: 10%;';
		$food_grocery_store_custom_css .='}';
	}else if($food_grocery_store_theme_lay == 'Center'){
		$food_grocery_store_custom_css .='#slider .carousel-caption{';
			$food_grocery_store_custom_css .='text-align:center; right: 25%; left: 25%;';
		$food_grocery_store_custom_css .='}';
	}else if($food_grocery_store_theme_lay == 'Right'){
		$food_grocery_store_custom_css .='#slider .carousel-caption{';
			$food_grocery_store_custom_css .='text-align:right; right: 10%; left: 45%;';
		$food_grocery_store_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$food_grocery_store_theme_lay = get_theme_mod( 'food_grocery_store_blog_layout_option','Default');
    if($food_grocery_store_theme_lay == 'Default'){
		$food_grocery_store_custom_css .='.post-main-box{';
			$food_grocery_store_custom_css .='';
		$food_grocery_store_custom_css .='}';
	}else if($food_grocery_store_theme_lay == 'Center'){
		$food_grocery_store_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p{';
			$food_grocery_store_custom_css .='text-align:center;';
		$food_grocery_store_custom_css .='}';
		$food_grocery_store_custom_css .='.post-info{';
			$food_grocery_store_custom_css .='margin-top:10px;';
		$food_grocery_store_custom_css .='}';
	}else if($food_grocery_store_theme_lay == 'Left'){
		$food_grocery_store_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, #our-services p{';
			$food_grocery_store_custom_css .='text-align:Left;';
		$food_grocery_store_custom_css .='}';
		$food_grocery_store_custom_css .='.post-main-box h2{';
			$food_grocery_store_custom_css .='margin-top:10px;';
		$food_grocery_store_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$food_grocery_store_resp_slider = get_theme_mod( 'food_grocery_store_resp_slider_hide_show',false);
    if($food_grocery_store_resp_slider == true){
    	$food_grocery_store_custom_css .='@media screen and (max-width:575px) {';
		$food_grocery_store_custom_css .='#slider{';
			$food_grocery_store_custom_css .='display:block;';
		$food_grocery_store_custom_css .='} }';
	}else if($food_grocery_store_resp_slider == false){
		$food_grocery_store_custom_css .='@media screen and (max-width:575px) {';
		$food_grocery_store_custom_css .='#slider{';
			$food_grocery_store_custom_css .='display:none;';
		$food_grocery_store_custom_css .='} }';
	}

	$food_grocery_store_resp_metabox = get_theme_mod( 'food_grocery_store_metabox_hide_show',true);
    if($food_grocery_store_resp_metabox == true){
    	$food_grocery_store_custom_css .='@media screen and (max-width:575px) {';
		$food_grocery_store_custom_css .='.post-info{';
			$food_grocery_store_custom_css .='display:block;';
		$food_grocery_store_custom_css .='} }';
	}else if($food_grocery_store_resp_metabox == false){
		$food_grocery_store_custom_css .='@media screen and (max-width:575px) {';
		$food_grocery_store_custom_css .='.post-info{';
			$food_grocery_store_custom_css .='display:none;';
		$food_grocery_store_custom_css .='} }';
	}

	$food_grocery_store_resp_sidebar = get_theme_mod( 'food_grocery_store_sidebar_hide_show',true);
    if($food_grocery_store_resp_sidebar == true){
    	$food_grocery_store_custom_css .='@media screen and (max-width:575px) {';
		$food_grocery_store_custom_css .='#sidebar{';
			$food_grocery_store_custom_css .='display:block;';
		$food_grocery_store_custom_css .='} }';
	}else if($food_grocery_store_resp_sidebar == false){
		$food_grocery_store_custom_css .='@media screen and (max-width:575px) {';
		$food_grocery_store_custom_css .='#sidebar{';
			$food_grocery_store_custom_css .='display:none;';
		$food_grocery_store_custom_css .='} }';
	}

	$food_grocery_store_resp_scroll_top = get_theme_mod( 'food_grocery_store_resp_scroll_top_hide_show',false);
    if($food_grocery_store_resp_scroll_top == true){
    	$food_grocery_store_custom_css .='@media screen and (max-width:575px) {';
		$food_grocery_store_custom_css .='.scrollup i{';
			$food_grocery_store_custom_css .='display:block;';
		$food_grocery_store_custom_css .='} }';
	}else if($food_grocery_store_resp_scroll_top == false){
		$food_grocery_store_custom_css .='@media screen and (max-width:575px) {';
		$food_grocery_store_custom_css .='.scrollup i{';
			$food_grocery_store_custom_css .='display:none !important;';
		$food_grocery_store_custom_css .='} }';
	}

	/*---------------- Button Settings ------------------*/

	$food_grocery_store_button_padding_top_bottom = get_theme_mod('food_grocery_store_button_padding_top_bottom');
	$food_grocery_store_button_padding_left_right = get_theme_mod('food_grocery_store_button_padding_left_right');
	if($food_grocery_store_button_padding_top_bottom != false || $food_grocery_store_button_padding_left_right != false){
		$food_grocery_store_custom_css .='.post-main-box .more-btn a{';
			$food_grocery_store_custom_css .='padding-top: '.esc_html($food_grocery_store_button_padding_top_bottom).'; padding-bottom: '.esc_html($food_grocery_store_button_padding_top_bottom).';padding-left: '.esc_html($food_grocery_store_button_padding_left_right).';padding-right: '.esc_html($food_grocery_store_button_padding_left_right).';';
		$food_grocery_store_custom_css .='}';
	}

	$food_grocery_store_button_border_radius = get_theme_mod('food_grocery_store_button_border_radius');
	if($food_grocery_store_button_border_radius != false){
		$food_grocery_store_custom_css .='.post-main-box .more-btn a{';
			$food_grocery_store_custom_css .='border-radius: '.esc_html($food_grocery_store_button_border_radius).'px;';
		$food_grocery_store_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$food_grocery_store_copyright_alingment = get_theme_mod('food_grocery_store_copyright_alingment');
	if($food_grocery_store_copyright_alingment != false){
		$food_grocery_store_custom_css .='.copyright p{';
			$food_grocery_store_custom_css .='text-align: '.esc_html($food_grocery_store_copyright_alingment).';';
		$food_grocery_store_custom_css .='}';
	}