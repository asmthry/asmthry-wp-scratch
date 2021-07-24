<?php
/**
 * Author: ASMTHRY
 * Asmthry Enqueue class helps to add assets files to WordPress
 *
 * @package ASMTHRY
 */

/** Check if Asmthry_Enqueue exists */
if ( ! class_exists( 'Asmthry_Enqueue' ) ) {
	/** Theme Support Class */
	class Asmthry_Enqueue extends Asmthry_Base {
		/** Enqueue files
		 *
		 * @var array $enqueue_file is.
		 */
		public $enqueue_file;
		/**
		 * Load when constructor create
		 *
		 * @param array $files write your.
		 */
		public function __construct( array $files ) {
			$this->enqueue_file = $files;
		}
		/** Register styles.
		 */
		public function register_style() {
			foreach ( $this->enqueue_file as $key => $resource ) {
				if ( isset( $resource['path'] ) ) {
					$path = ASMTHRY_THEME_URL . $resource['path'];
				} elseif ( isset( $resource['url'] ) ) {
					$path = $resource['url'];
				} else {
					$path = get_stylesheet_uri();
				}
				$deps  = $this->empty_sanitize( $resource, array(), 'dependance' );
				$var   = $this->empty_sanitize( $resource, ASMTHRY_PLUGIN_VERSION, 'version' );
				$media = $this->empty_sanitize( $resource, 'all', 'media' );
				wp_register_style( $key, $path, $deps, $var, $media );
			}
		}
		/** Call enqueue_style to register your style. */
		public function enqueue_style() {
			foreach ( $this->enqueue_file as $key => $id ) {
				wp_enqueue_style( $id );
			}
		}
		/** Return resources ids */
		public function get_ids() {
			$array = array();
			foreach ( $this->enqueue_file as $key => $value ) {
				array_push( $array, $key );
			}
			return $array;
		}
	}
}
