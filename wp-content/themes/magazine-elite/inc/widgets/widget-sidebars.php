<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function magazine_elite_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'magazine-elite'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Displays items on sidebar.', 'magazine-elite'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="saga-title-wrapper"><h2 class="widget-title saga-title saga-title-small">',
        'after_title' => '</h2></div>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Off-canvas Menu', 'magazine-elite'),
        'id' => 'offcanvas',
        'description' => esc_html__('Displays items on Off-canvas Menu.', 'magazine-elite'),
        'before_widget' => '<div id="%1$s" class="widget alt-font %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Column One', 'magazine-elite'),
        'id' => 'footer-col-one',
        'description' => esc_html__('Displays items on footer first column.', 'magazine-elite'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Column Two', 'magazine-elite'),
        'id' => 'footer-col-two',
        'description' => esc_html__('Displays items on footer second column.', 'magazine-elite'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Column Three', 'magazine-elite'),
        'id' => 'footer-col-three',
        'description' => esc_html__('Displays items on footer third column.', 'magazine-elite'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'magazine_elite_widgets_init');