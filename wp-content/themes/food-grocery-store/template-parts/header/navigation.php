<?php
/**
 * The template part for header
 *
 * @package Food Grocery Store 
 * @subpackage food-grocery-store
 * @since food-grocery-store 1.0
 */
?>

<div id="header">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-3 col-3">
        <?php if(has_nav_menu('primary')){ ?>
          <div class="toggle-nav mobile-menu">
            <button role="tab" onclick="food_grocery_store_menu_open_nav()" class="responsivetoggle"><i class="fas fa-bars p-3"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','food-grocery-store'); ?></span></button>
          </div>
        <?php } ?>
        <div id="mySidenav" class="nav sidenav">
          <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'food-grocery-store' ); ?>">
            <?php 
              if(has_nav_menu('primary')){
                wp_nav_menu( array( 
                  'theme_location' => 'primary',
                  'container_class' => 'main-menu clearfix' ,
                  'menu_class' => 'clearfix',
                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                  'fallback_cb' => 'wp_page_menu',
                ) ); 
              }
            ?>
            <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="food_grocery_store_menu_close_nav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','food-grocery-store'); ?></span></a>
          </nav>
        </div>
      </div>
      <div class="col-lg-3 col-md-9 col-9">
        <?php if( get_theme_mod('food_grocery_store_phone_text') != ''){ ?>
          <p class="phone_no py-3 mb-0 text-md-right"><i class="fas fa-phone mr-2"></i><?php esc_html_e('Hotline:','food-grocery-store');?> <strong><?php echo esc_html(get_theme_mod('food_grocery_store_phone_number',''));?></strong></p>
        <?php } ?>
      </div>
    </div>
  </div>
</div>