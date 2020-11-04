<?php
if ( ! function_exists( 'magazine_elite_is_banner_slider_enabled' ) ) :

    /**
     * Check if Banner slider is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function magazine_elite_is_banner_slider_enabled( $control ) {

        if ( $control->manager->get_setting( 'theme_options[enable_slider_posts]' )->value() === true ) {
            return true;
        } else {
            return false;
        }

    }

endif;

if ( ! function_exists( 'magazine_elite_is_ft_cats_enabled' ) ) :

    /**
     * Check if Featured categories is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function magazine_elite_is_ft_cats_enabled( $control ) {

        if ( $control->manager->get_setting( 'theme_options[enable_ft_categories]' )->value() === true ) {
            return true;
        } else {
            return false;
        }

    }

endif;

if ( ! function_exists( 'magazine_elite_is_full_grid_enabled' ) ) :

    /**
     * Check if Full Width Grid categories is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function magazine_elite_is_full_grid_enabled( $control ) {

        if ( $control->manager->get_setting( 'theme_options[enable_full_width_grid_cat]' )->value() === true ) {
            return true;
        } else {
            return false;
        }

    }

endif;

if ( ! function_exists( 'magazine_elite_is_panel_grid_enabled' ) ) :

    /**
     * Check if Panel Grid categories is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function magazine_elite_is_panel_grid_enabled( $control ) {

        if ( $control->manager->get_setting( 'theme_options[enable_panel_grid_cat]' )->value() === true ) {
            return true;
        } else {
            return false;
        }

    }

endif;

if ( ! function_exists( 'magazine_elite_is_accessbar_enabled' ) ) :

    /**
     * Check if accessbar is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function magazine_elite_is_accessbar_enabled( $control ) {

        if ( $control->manager->get_setting( 'theme_options[show_access_bar]' )->value() === true ) {
            return true;
        } else {
            return false;
        }

    }

endif;