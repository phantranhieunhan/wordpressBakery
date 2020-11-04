<?php
/**
 * Implement posts metabox.
 *
 * @package Magazine Elite
 */

if ( ! function_exists( 'magazine_elite_add_theme_meta_box' ) ) :

	/**
	 * Add the Meta Box
	 *
	 * @since 1.0.0
	 */
	function magazine_elite_add_theme_meta_box() {

		$post_types = array( 'post', 'page' );

		foreach ( $post_types as $post_type ) {
			add_meta_box(
				'magazine-elite-custom-box',
                sprintf( esc_html__( '%1s Settings', 'magazine-elite' ), ucwords($post_type) ),
				'magazine_elite_custom_box_html',
                $post_type
			);
		}

	}

endif;
add_action( 'add_meta_boxes', 'magazine_elite_add_theme_meta_box' );

if ( ! function_exists( 'magazine_elite_custom_box_html' ) ) :

	/**
	 * Render theme settings meta box.
	 *
	 * @since 1.0.0
	 */
	function magazine_elite_custom_box_html( $post ) {

        wp_nonce_field( basename( __FILE__ ), 'magazine_elite_meta_box_nonce' );
        $page_layout = get_post_meta($post->ID,'magazine_elite_page_layout',true);
        $image_settings = get_post_meta($post->ID,'magazine_elite_single_image',true);
        ?>
        <div id="magazine-elite-settings-metabox-container" class='inside'>
            <h3><label for="page-layout"><?php echo __( 'Page Layout', 'magazine-elite' ); ?></label></h3>
            <p>
                <select name="magazine_elite_page_layout" id="page-layout">
                    <option value=""><?php _e( '&mdash; Select &mdash;', 'magazine-elite' )?></option>
                    <option value="left-sidebar" <?php selected('left-sidebar',$page_layout);?>>
                        <?php _e( 'Primary Sidebar - Content', 'magazine-elite' )?>
                    </option>
                    <option value="right-sidebar" <?php selected('right-sidebar',$page_layout);?>>
                        <?php _e( 'Content - Primary Sidebar', 'magazine-elite' )?>
                    </option>
                    <option value="no-sidebar" <?php selected('no-sidebar',$page_layout);?>>
                        <?php _e( 'No Sidebar', 'magazine-elite' )?>
                    </option>
                </select>
            </p>
            <hr/>
            <h3><label for="image-settings"><?php echo __( 'Featured Image on Detail Page', 'magazine-elite' ); ?></label></h3>
            <p>
                <select name="magazine_elite_single_image" id="image-settings">
                    <option value=""><?php _e( '&mdash; Select &mdash;', 'magazine-elite' )?></option>
                    <option value="full" <?php selected('full', $image_settings);?>>
                        <?php _e( 'Full', 'magazine-elite' )?>
                    </option>
                    <option value="no-image" <?php selected('no-image', $image_settings);?>>
                        <?php _e( 'No Image', 'magazine-elite' )?>
                    </option>
                </select>
            </p>
            <hr/>
        </div>
        <?php
	}

endif;


if ( ! function_exists( 'magazine_elite_save_postdata' ) ) :

	/**
	 * Save posts meta box value.
	 *
	 * @since 1.0.0
	 *
	 * @param int  $post_id Post ID.
	 */
	function magazine_elite_save_postdata( $post_id ) {

		// Verify nonce.
		if ( ! isset( $_POST['magazine_elite_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['magazine_elite_meta_box_nonce'], basename( __FILE__ ) ) ) {
			  return; }

		// Bail if auto save or revision.
		if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post_id ) ) || is_int( wp_is_post_autosave( $post_id ) ) ) {
			return;
		}

		// Check the post being saved == the $post_id to prevent triggering this call for other save_post events.
		if ( empty( $_POST['post_ID'] ) || $_POST['post_ID'] != $post_id ) {
			return;
		}

		// Check permission.
		if ( 'page' === $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return; }
		} else if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

        if ( isset( $_POST['magazine_elite_page_layout'] )){
            $valid_layout_values = array(
                'left-sidebar',
                'right-sidebar',
                'no-sidebar',
            );
            $layout_value = sanitize_text_field( $_POST['magazine_elite_page_layout'] );
            if( in_array( $layout_value, $valid_layout_values ) ) {
                update_post_meta($post_id, 'magazine_elite_page_layout', $layout_value);
            }else{
                delete_post_meta($post_id,'magazine_elite_page_layout');
            }
        }

        if ( isset( $_POST['magazine_elite_single_image'] )){
            $valid_image_values = array(
                'full',
                'no-image',
            );
            $image_value = sanitize_text_field( $_POST['magazine_elite_single_image'] );
            if( in_array( $image_value, $valid_image_values ) ) {
                update_post_meta($post_id, 'magazine_elite_single_image', $image_value);
            }else{
                delete_post_meta($post_id,'magazine_elite_single_image');
            }
        }
	}

endif;
add_action( 'save_post', 'magazine_elite_save_postdata' );