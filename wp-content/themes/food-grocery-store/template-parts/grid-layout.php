<?php
/**
 * The template part for displaying grid post
 *
 * @package Food Grocery Store
 * @subpackage food-grocery-store
 * @since food-grocery-store 1.0
 */
?>

<div class="col-lg-4 col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="post-main-box p-3 mb-3">
	      	<div class="box-image">
	          	<?php 
		            if(has_post_thumbnail()) { 
		              the_post_thumbnail(); 
		            }
	          	?>
	        </div>
	        <h2 class="section-title mt-0 pt-0"><a href="<?php the_permalink(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
	        <div class="new-text">
	        	<p>
			        <?php $excerpt = get_the_excerpt(); echo esc_html( food_grocery_store_string_limit_words( $excerpt, esc_attr(get_theme_mod('food_grocery_store_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('food_grocery_store_excerpt_suffix','') ); ?>
	        	</p>
	        </div>
	        <?php if( get_theme_mod('food_grocery_store_button_text','Read More') != ''){ ?>
	          <div class="more-btn mt-4 mb-4">
	            <a class="p-3" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('food_grocery_store_button_text',__('Read More','food-grocery-store')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('food_grocery_store_button_text',__('Read More','food-grocery-store')));?></span></a>
	          </div>
	        <?php } ?>
	    </div>
	    <div class="clearfix"></div>
  	</article>
</div>