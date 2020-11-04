<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class Food_Grocery_Store_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'food-grocery-store-typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'food-grocery-store' ),
				'family'      => esc_html__( 'Font Family', 'food-grocery-store' ),
				'size'        => esc_html__( 'Font Size',   'food-grocery-store' ),
				'weight'      => esc_html__( 'Font Weight', 'food-grocery-store' ),
				'style'       => esc_html__( 'Font Style',  'food-grocery-store' ),
				'line_height' => esc_html__( 'Line Height', 'food-grocery-store' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'food-grocery-store' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'food-grocery-store-ctypo-customize-controls' );
		wp_enqueue_style(  'food-grocery-store-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'food-grocery-store' ),
        'Abril Fatface' => __( 'Abril Fatface', 'food-grocery-store' ),
        'Acme' => __( 'Acme', 'food-grocery-store' ),
        'Anton' => __( 'Anton', 'food-grocery-store' ),
        'Architects Daughter' => __( 'Architects Daughter', 'food-grocery-store' ),
        'Arimo' => __( 'Arimo', 'food-grocery-store' ),
        'Arsenal' => __( 'Arsenal', 'food-grocery-store' ),
        'Arvo' => __( 'Arvo', 'food-grocery-store' ),
        'Alegreya' => __( 'Alegreya', 'food-grocery-store' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'food-grocery-store' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'food-grocery-store' ),
        'Bangers' => __( 'Bangers', 'food-grocery-store' ),
        'Boogaloo' => __( 'Boogaloo', 'food-grocery-store' ),
        'Bad Script' => __( 'Bad Script', 'food-grocery-store' ),
        'Bitter' => __( 'Bitter', 'food-grocery-store' ),
        'Bree Serif' => __( 'Bree Serif', 'food-grocery-store' ),
        'BenchNine' => __( 'BenchNine', 'food-grocery-store' ),
        'Cabin' => __( 'Cabin', 'food-grocery-store' ),
        'Cardo' => __( 'Cardo', 'food-grocery-store' ),
        'Courgette' => __( 'Courgette', 'food-grocery-store' ),
        'Cherry Swash' => __( 'Cherry Swash', 'food-grocery-store' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'food-grocery-store' ),
        'Crimson Text' => __( 'Crimson Text', 'food-grocery-store' ),
        'Cuprum' => __( 'Cuprum', 'food-grocery-store' ),
        'Cookie' => __( 'Cookie', 'food-grocery-store' ),
        'Chewy' => __( 'Chewy', 'food-grocery-store' ),
        'Days One' => __( 'Days One', 'food-grocery-store' ),
        'Dosis' => __( 'Dosis', 'food-grocery-store' ),
        'Droid Sans' => __( 'Droid Sans', 'food-grocery-store' ),
        'Economica' => __( 'Economica', 'food-grocery-store' ),
        'Fredoka One' => __( 'Fredoka One', 'food-grocery-store' ),
        'Fjalla One' => __( 'Fjalla One', 'food-grocery-store' ),
        'Francois One' => __( 'Francois One', 'food-grocery-store' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'food-grocery-store' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'food-grocery-store' ),
        'Great Vibes' => __( 'Great Vibes', 'food-grocery-store' ),
        'Handlee' => __( 'Handlee', 'food-grocery-store' ),
        'Hammersmith One' => __( 'Hammersmith One', 'food-grocery-store' ),
        'Inconsolata' => __( 'Inconsolata', 'food-grocery-store' ),
        'Indie Flower' => __( 'Indie Flower', 'food-grocery-store' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'food-grocery-store' ),
        'Julius Sans One' => __( 'Julius Sans One', 'food-grocery-store' ),
        'Josefin Slab' => __( 'Josefin Slab', 'food-grocery-store' ),
        'Josefin Sans' => __( 'Josefin Sans', 'food-grocery-store' ),
        'Kanit' => __( 'Kanit', 'food-grocery-store' ),
        'Lobster' => __( 'Lobster', 'food-grocery-store' ),
        'Lato' => __( 'Lato', 'food-grocery-store' ),
        'Lora' => __( 'Lora', 'food-grocery-store' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'food-grocery-store' ),
        'Lobster Two' => __( 'Lobster Two', 'food-grocery-store' ),
        'Merriweather' => __( 'Merriweather', 'food-grocery-store' ),
        'Monda' => __( 'Monda', 'food-grocery-store' ),
        'Montserrat' => __( 'Montserrat', 'food-grocery-store' ),
        'Muli' => __( 'Muli', 'food-grocery-store' ),
        'Marck Script' => __( 'Marck Script', 'food-grocery-store' ),
        'Noto Serif' => __( 'Noto Serif', 'food-grocery-store' ),
        'Open Sans' => __( 'Open Sans', 'food-grocery-store' ),
        'Overpass' => __( 'Overpass', 'food-grocery-store' ),
        'Overpass Mono' => __( 'Overpass Mono', 'food-grocery-store' ),
        'Oxygen' => __( 'Oxygen', 'food-grocery-store' ),
        'Orbitron' => __( 'Orbitron', 'food-grocery-store' ),
        'Patua One' => __( 'Patua One', 'food-grocery-store' ),
        'Pacifico' => __( 'Pacifico', 'food-grocery-store' ),
        'Padauk' => __( 'Padauk', 'food-grocery-store' ),
        'Playball' => __( 'Playball', 'food-grocery-store' ),
        'Playfair Display' => __( 'Playfair Display', 'food-grocery-store' ),
        'PT Sans' => __( 'PT Sans', 'food-grocery-store' ),
        'Philosopher' => __( 'Philosopher', 'food-grocery-store' ),
        'Permanent Marker' => __( 'Permanent Marker', 'food-grocery-store' ),
        'Poiret One' => __( 'Poiret One', 'food-grocery-store' ),
        'Quicksand' => __( 'Quicksand', 'food-grocery-store' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'food-grocery-store' ),
        'Raleway' => __( 'Raleway', 'food-grocery-store' ),
        'Rubik' => __( 'Rubik', 'food-grocery-store' ),
        'Rokkitt' => __( 'Rokkitt', 'food-grocery-store' ),
        'Russo One' => __( 'Russo One', 'food-grocery-store' ),
        'Righteous' => __( 'Righteous', 'food-grocery-store' ),
        'Slabo' => __( 'Slabo', 'food-grocery-store' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'food-grocery-store' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'food-grocery-store'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'food-grocery-store' ),
        'Sacramento' => __( 'Sacramento', 'food-grocery-store' ),
        'Shrikhand' => __( 'Shrikhand', 'food-grocery-store' ),
        'Tangerine' => __( 'Tangerine', 'food-grocery-store' ),
        'Ubuntu' => __( 'Ubuntu', 'food-grocery-store' ),
        'VT323' => __( 'VT323', 'food-grocery-store' ),
        'Varela Round' => __( 'Varela Round', 'food-grocery-store' ),
        'Vampiro One' => __( 'Vampiro One', 'food-grocery-store' ),
        'Vollkorn' => __( 'Vollkorn', 'food-grocery-store' ),
        'Volkhov' => __( 'Volkhov', 'food-grocery-store' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'food-grocery-store' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'food-grocery-store' ),
			'100' => esc_html__( 'Thin',       'food-grocery-store' ),
			'300' => esc_html__( 'Light',      'food-grocery-store' ),
			'400' => esc_html__( 'Normal',     'food-grocery-store' ),
			'500' => esc_html__( 'Medium',     'food-grocery-store' ),
			'700' => esc_html__( 'Bold',       'food-grocery-store' ),
			'900' => esc_html__( 'Ultra Bold', 'food-grocery-store' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'food-grocery-store' ),
			'normal'  => esc_html__( 'Normal', 'food-grocery-store' ),
			'italic'  => esc_html__( 'Italic', 'food-grocery-store' ),
			'oblique' => esc_html__( 'Oblique', 'food-grocery-store' )
		);
	}
}
