<?php
/**
 * Author: ASMTHRY
 * Include all files for ASMTHRY plugin.
 *
 * @package ASMTHRY
 */

/** Check if Asmthry_Load_Resource exists */
if ( ! class_exists( 'Asmthry_Load_Resource' ) ) {
	/** Base Class For ASMTHRY Plugin */
	class Asmthry_Load_Resource {
		/** Simplify file require once
		 *
		 * @param string $class_name - Give your class name.
		 * If you file name is class-asmthry-base.php, pass Asmthry_Base only.
		 */
		public static function load_class( $class_name = null ) {
			if ( null !== $class_name ) {
				if ( ! class_exists( $class_name ) ) {
					$temp     = strtolower( $class_name );
					$filename = str_replace( '_', '-', $temp );
					require_once ASMTHRY_INCLUDE_PATH . 'class-' . $filename . '.php';
				}
			}
		}
	}
}
