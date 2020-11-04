<?php
/**
 * The template for displaying search forms in food-grocery-store
 *
 * @package Food Grocery Store
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_attr_x( 'Search for:', 'label', 'food-grocery-store' ); ?></span>
		<input type="search" class="search-field p-3" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder','food-grocery-store' ); ?>" value="<?php echo get_search_query() ?>" name="s">
	</label>
	<input type="submit" class="search-submit p-3" value="<?php echo esc_attr_x( 'Search', 'submit button','food-grocery-store' ); ?>">
</form>