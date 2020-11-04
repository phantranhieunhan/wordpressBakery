<?php
/**
 * The template part for header
 *
 * @package Food Grocery Store 
 * @subpackage food-grocery-store
 * @since food-grocery-store 1.0
 */
?>

<div id="middle-header" class="pt-2 pb-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3">
        <div class="logo p-lg-0 p-3 mb-lg-0 mb-3 p-lg-0 p-3 mb-lg-0 p-md-0">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <?php if( get_theme_mod('food_grocery_store_logo_title_hide_show',true) != ''){ ?>
                  <h1 class="site-title py-1"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php } ?>
              <?php else : ?>
                <?php if( get_theme_mod('food_grocery_store_logo_title_hide_show',true) != ''){ ?>
                  <p class="site-title py-1 mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
            ?>
            <?php if( get_theme_mod('food_grocery_store_tagline_hide_show',true) != ''){ ?>
              <p class="site-description mb-0">
                <?php echo esc_html($description); ?>
              </p>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-7 col-md-7">
        <?php if(class_exists('woocommerce')){ ?>
          <div class="search-box">
            <?php get_product_search_form(); ?>
          </div>       
          <div class="product-cat-box">
            <button class="product-btn mt-3 mt-lg-0 mt-md-0"><?php esc_html_e('All Categories','food-grocery-store'); ?><i class="fas fa-chevron-down ml-2"></i></button>
            <div class="product-cat">
              <?php
                $args = array(
                  'orderby'    => 'title',
                  'order'      => 'ASC',
                  'hide_empty' => 0,
                  'parent'  => 0
                );
                $product_categories = get_terms( 'product_cat', $args );
                $count = count($product_categories);
                if ( $count > 0 ){
                    foreach ( $product_categories as $product_category ) {
                      $product_cat_id   = $product_category->term_id;
                      $cat_link = get_category_link( $product_cat_id );
                      if ($product_category->category_parent == 0) { ?>
                    <li class="drp_dwn_menu p-2"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
                    <?php
                  }
                  echo esc_html( $product_category->name ); ?></a></li>
              <?php } } ?>
            </div>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-2 col-md-2">
        <?php if(class_exists('woocommerce')){ ?>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-6 pl-md-0 pl-lg-0">
              <div class="account mt-2 mt-lg-0">
                <?php if ( is_user_logged_in() ) { ?>
                  <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','food-grocery-store'); ?>"><i class="fas fa-sign-in-alt"></i><span class="screen-reader-text"><?php esc_html_e( 'My Account','food-grocery-store' );?></span></a>
                <?php }
                else { ?>
                  <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','food-grocery-store'); ?>"><i class="fas fa-user"></i><span class="screen-reader-text"><?php esc_html_e( 'Login / Register','food-grocery-store' );?></span></a>
                <?php } ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-6 pl-md-0 pl-lg-0">
              <div class="cart_no mt-2 mt-lg-0">
                <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','food-grocery-store' ); ?>"><i class="fas fa-shopping-basket"></i><span class="screen-reader-text"><?php esc_html_e( 'shopping cart','food-grocery-store' );?></span></a>
                <span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
              </div>
            </div>
          </div>
        <?php }?>
      </div>
    </div>
  </div>
</div>