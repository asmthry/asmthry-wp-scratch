<?php
/**
 * Author: ASMTHRY
 * Asmthry Enqueue class helps to add assets files to WordPress
 *
 * @package ASMTHRY
 */

/** Check if Asmthry_Customizer exists */
if ( ! class_exists( 'Asmthry_Customizer' ) ) {

	/** Customizer Creating Class */
	class Asmthry_Customizer extends Asmthry_Base {

		/** Variable for store customizer option values
		 *
		 * @var $customizer */
		public $customizer;

		/** Variable to store customizer values
		 *
		 * @var $customize
		 */
		public $customize = array();

		/** Variable for store customizer object
		 *
		 * @var $wp_customize */
		public $wp_customize;

		/** Load customizer on creating object
		 *
		 * @param array $array - Give customizer settings options.
		 */
		public function __construct( $array ) {
			$this->customizer = $array;
		}

		/** Create customizer options
		 *
		 * @param object $wp_customize - WP Customizer object.
		 */
		public function create_customizer( $wp_customize ) {
			$this->wp_customize = $wp_customize;
			foreach ( $this->customizer as $key => $value ) {
				$this->create_section( $key );
				$this->create_controls( $value );
			}
		}

		/** Create Customizer section
		 *
		 * @param string $section_name - Pass your section's name.
		 */
		public function create_section( $section_name ) {
            //@codingStandardsIgnoreStart
            $this->customize['section'] = $this->create_slug($section_name);
			$this->wp_customize->add_section(
				$this->customize['section'],
				array(
					'title' => __( $section_name, 'asmthry' ),
                    'description' => 'Update Your Contact Details',
                    'priority'    => 70,
				)
			);
            //@codingStandardsIgnoreEnd
		}

		/** Create controls for a section
		 *
		 * @param array $controls - controls for a section.
		 */
		public function create_controls( $controls ) {
			foreach ( $controls as $key => $control ) {
				$this->customize['field'] = $key;
				$this->create_settings( $key );
				$this->create_control( $control );
			}
		}

		/** Create customizer settings
		 *
		 * @param string $name - name of your settings.
		 */
		public function create_settings( $name = 'Settings' ) {
			$this->customize['settings'] = $this->create_slug( $name );
			$this->wp_customize->add_setting(
				$this->customize['settings'],
				array(
					'capability' => 'edit_theme_options',
				)
			);
		}

		/** Create customizer controls
		 *
		 * @param array $input - Give input customizer values.
		 */
		public function create_control( $input = array( 'label' => 'Name' ) ) {
			$this->customize['control'] = $this->customize['settings'] . '_input';
            //@codingStandardsIgnoreStart
			$this->wp_customize->add_control(
				$this->customize['control'],
				array(
					'type'	   => $this->empty_sanitize( $input, 'text', 'type'),
					'label'    => __( $this->customize['field'], 'ASMThry' ),
					'section'  => $this->customize['section'],
					'settings' => $this->customize['settings'],
				)
			);
            //@codingStandardsIgnoreEnd
		}

		/** Create customizer controls
		 *
		 * @param string $customizer_name - Give input customizer name.
		 */
		public static function get_theme_mode( string $customizer_name ) {
			return get_theme_mod( self::create_slug( $customizer_name ), 'NULL' );
		}

	}

}
