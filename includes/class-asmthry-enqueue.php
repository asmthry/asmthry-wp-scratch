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
				$id    = $this->create_slug( $key );
				$deps  = $this->empty_sanitize( $resource, array(), 'dependance' );
				$var   = $this->empty_sanitize( $resource, ASMTHRY_PLUGIN_VERSION, 'version' );
				$media = $this->empty_sanitize( $resource, 'all', 'media' );
				wp_register_style( $id, $path, $deps, $var, $media );
			}
		}
		/** Call enqueue_style to register your style. */
		public function enqueue_style() {
			foreach ( $this->enqueue_file as $key => $value ) {
				if ( is_page( $value['page'] ) || 'all' === $value['page'] ) {
					wp_enqueue_style( $value['id'] );
				}
			}
		}
		/** Register scripts.*/
		public function register_script() {
			foreach ( $this->enqueue_file as $key => $resource ) {
				if ( isset( $resource['path'] ) ) {
					$path = ASMTHRY_THEME_URL . $resource['path'];
				} elseif ( isset( $resource['url'] ) ) {
					$path = $resource['url'];
				} else {
					$path = ASMTHRY_THEME_URL . 'assets/js/script.js';
				}
				$id        = $this->create_slug( $key );
				$deps      = $this->empty_sanitize( $resource, array(), 'dependance' );
				$var       = $this->empty_sanitize( $resource, ASMTHRY_PLUGIN_VERSION, 'version' );
				$in_footer = $this->empty_sanitize( $resource, false, 'footer' );
				wp_register_script( $id, $path, $deps, $var, $in_footer );
			}
		}
		/** Call enqueue_scripts to register your scripts. */
		public function enqueue_script() {
			foreach ( $this->enqueue_file as $key => $value ) {
				if ( is_page( $value['page'] ) || 'all' === $value['page'] ) {
					wp_enqueue_script( $value['id'] );
				}
			}
		}
		/** Return resources ids */
		public function get_ids() {
			$array = array();
			foreach ( $this->enqueue_file as $key => $value ) {
				$page = 'all';
				$id   = $this->create_slug( $key );
				if ( isset( $value['page'] ) ) {
					$page = $value['page'];
				}
				array_push(
					$array,
					array(
						'id'   => $id,
						'page' => $page,
					)
				);
			}
			return $array;
		}
	}
}
