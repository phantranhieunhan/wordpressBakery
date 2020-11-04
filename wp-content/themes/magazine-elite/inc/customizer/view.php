<?php
/**
 * Get customizer values.
 *
 * @package Magazine_Elite
 */

if ( ! function_exists( 'magazine_elite_get_option' ) ) :
    /**
     * Get customizer value by key.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function magazine_elite_get_option($key, $defaults = false) {
        $customizer_values = get_theme_mod( 'theme_options' );
        $key_value = ( isset( $customizer_values[ $key ] ) ) ? $customizer_values[ $key ] : 'unset';
        /*Get the default value only if the value is not saved in database*/
        if( true == $defaults && 'unset' === $key_value ){
            $default_values = magazine_elite_get_default_customizer_values();
            $default_key_value = ( isset( $default_values[ $key ] ) ) ? $default_values[ $key ] : '';
            return $default_key_value;
        }
        /*Clear the value*/
        if( 'unset' === $key_value ){
            $key_value = '';
        }
        return $key_value;
    }
endif;

if ( ! function_exists( 'magazine_elite_get_options' ) ) :
    /**
     * Get all customizer values.
     *
     * @since 1.0.0
     *
     * @return array Customizer Values.
     */
    function magazine_elite_get_options() {
        $default_values = magazine_elite_get_default_customizer_values();
        $customizer_values = get_theme_mod( 'theme_options' );
        /*Create and empty array to merge if no options are saved yet*/
        if(empty($customizer_values)){
            $customizer_values = array();
        }
        /**/
        return array_merge( $default_values, $customizer_values );
    }
endif;
