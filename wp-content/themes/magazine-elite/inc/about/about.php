<?php
/**
 * About setup
 *
 * @package Magazine_Elite
 */

if ( ! function_exists( 'magazine_elite_about_setup' ) ) :

	/**
	 * About setup.
	 *
	 * @since 1.0.0
	 */
	function magazine_elite_about_setup() {

		$config = array(

			// Welcome content.
			'welcome_content' => sprintf( esc_html__( '%1$s is now installed and ready to use. We want to make sure you have the best experience using the theme and that is why we gathered here all the necessary information for you. Thanks for using our theme!', 'magazine-elite' ), 'Magazine Elite' ),

			// Tabs.
			'tabs' => array(
				'getting-started' => esc_html__( 'Getting Started', 'magazine-elite' ),
				'useful-plugins'  => esc_html__( 'Useful Plugins', 'magazine-elite' ),
				),

			// Quick links.
			'quick_links' => array(
                'theme_url' => array(
                    'text' => esc_html__( 'Theme Details', 'magazine-elite' ),
                    'url'  => 'https://themesaga.com/theme/magazine-elite/',
                ),
                'demo_url' => array(
                    'text' => esc_html__( 'View Demo', 'magazine-elite' ),
                    'url'  => 'https://demo.themesaga.com/magazine-elite/',
                ),
                'documentation_url' => array(
                    'text'   => esc_html__( 'View Documentation', 'magazine-elite' ),
                    'url'    => 'https://docs.themesaga.com/magazine-elite/',
                    'button' => 'primary',
                ),
            ),

			// Getting started.
			'getting_started' => array(
				'one' => array(
					'title'       => esc_html__( 'Theme Documentation', 'magazine-elite' ),
					'icon'        => 'dashicons dashicons-format-aside',
					'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'magazine-elite' ),
					'button_text' => esc_html__( 'View Documentation', 'magazine-elite' ),
					'button_url'  => 'https://themesaga.com/theme/magazine-elite/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				'two' => array(
					'title'       => esc_html__( 'Static Front Page', 'magazine-elite' ),
					'icon'        => 'dashicons dashicons-admin-generic',
					'description' => esc_html__( 'To achieve custom home page other than blog listing, you need to create and set static front page.', 'magazine-elite' ),
					'button_text' => esc_html__( 'Static Front Page', 'magazine-elite' ),
					'button_url'  => admin_url( 'customize.php?autofocus[section]=static_front_page' ),
					'button_type' => 'primary',
					),
				'three' => array(
					'title'       => esc_html__( 'Theme Options', 'magazine-elite' ),
					'icon'        => 'dashicons dashicons-admin-customizer',
					'description' => esc_html__( 'Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'magazine-elite' ),
					'button_text' => esc_html__( 'Customize', 'magazine-elite' ),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
					),
				'five' => array(
					'title'       => esc_html__( 'Theme Preview', 'magazine-elite' ),
					'icon'        => 'dashicons dashicons-welcome-view-site',
					'description' => esc_html__( 'You can check out the theme demos for reference to find out what you can achieve using the theme and how it can be customized.', 'magazine-elite' ),
					'button_text' => esc_html__( 'View Demo', 'magazine-elite' ),
					'button_url'  => 'https://demo.themesaga.com/magazine-elite/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
                'six' => array(
                    'title'       => esc_html__( 'Contact Support', 'magazine-elite' ),
                    'icon'        => 'dashicons dashicons-sos',
                    'description' => esc_html__( 'Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'magazine-elite' ),
                    'button_text' => esc_html__( 'Contact Support', 'magazine-elite' ),
                    'button_url'  => 'https://themesaga.com/support/',
                    'button_type' => 'link',
                    'is_new_tab'  => true,
                ),
				),

			// Useful plugins.
			'useful_plugins' => array(
				'description' => esc_html__( 'Theme supports some helpful WordPress plugins to enhance your site. But, please enable only those plugins which you need in your site. For example, enable WooCommerce only if you are using e-commerce.', 'magazine-elite' ),
				),

			);

		Magazine_Elite_About::init( $config );
	}

endif;

add_action( 'after_setup_theme', 'magazine_elite_about_setup' );
