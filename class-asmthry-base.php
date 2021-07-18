<?php
/**
 * Author: ASMTHRY
 * This file trigger when ASMTHRY plugin activate
 *
 * @package ASMTHRY
 */

/** Check if Asmthry_Base exists */
if ( ! class_exists( 'Asmthry_Base' ) ) {
	/** Base Class For ASMTHRY Plugin */
	class Asmthry_Base {
		/**
		 * This Function will help to create slug
		 *
		 * @param string $name It must be a string.This function will convert given name to slug.
		 */
		public static function create_slug( $name ) {
			return strtolower( str_replace( ' ', '_', $name ) );
		}
		/**
		 * This Function will help to create name using slug
		 *
		 * @param string $name It must be a string.This function will convert given slug to name.
		 */
		public function slug_to_name( $name ) {
			return ucwords( str_replace( '_', ' ', $name ) );
		}
	}
}
