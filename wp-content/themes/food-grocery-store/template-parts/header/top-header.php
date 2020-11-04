<?php
/**
 * The template part for top header
 *
 * @package Food Grocery Store 
 * @subpackage food-grocery-store
 * @since food-grocery-store 1.0
 */
?>

<div class="top-bar pt-lg-2 pb-lg-4 pt-md-2 pb-md-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-3">
        <?php if( get_theme_mod( 'food_grocery_store_daily_deals_link') != '' || get_theme_mod( 'food_grocery_store_daily_deals_text') != ''){ ?>
          <a href="<?php echo esc_html(get_theme_mod('food_grocery_store_daily_deals_link',''));?>" ><i class="fas fa-rss mr-2"></i><?php echo esc_html(get_theme_mod('food_grocery_store_daily_deals_text',''));?></a>
        <?php } ?>
      </div>
      <div class="col-lg-2 col-md-3">
        <?php if( get_theme_mod( 'food_grocery_store_contact_link') != '' || get_theme_mod( 'food_grocery_store_contact_text') != '') { ?>
          <a href="<?php echo esc_html(get_theme_mod('food_grocery_store_contact_link',''));?>" ><i class="fas fa-headphones mr-2"></i><?php echo esc_html(get_theme_mod('food_grocery_store_contact_text',''));?></a>
        <?php } ?>
      </div>
      <div class="col-lg-8 col-md-6">
        <?php if( get_theme_mod( 'food_grocery_store_order_tracking') != '') { ?>
          <?php if(class_exists('woocommerce')){ ?>
            <div class="order-track text-right">
              <span><i class="fas fa-map-marker-alt mr-2"></i><?php esc_html_e('Order Tracking','food-grocery-store'); ?></span>
              <div class="order-track-hover text-left">
                <?php echo do_shortcode('[woocommerce_order_tracking]','food-grocery-store'); ?>
              </div>
            </div>
          <?php }?>
        <?php }?>
      </div>
    </div>
  </div>
</div>