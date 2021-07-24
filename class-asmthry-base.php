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
		/**
		 * Check if given string is empty or not if empty default value will return.
		 *
		 * @param array $value write your.
		 * @param any   $default Default value.
		 * @param array $index If it is array Index of array or blank.
		 */
		public function empty_sanitize( $value, $default, $index = 0 ) {
			// Check if give value is array or not.
			if ( is_array( $value ) ) {
				if ( isset( $value[ $index ] ) ) {
					return $value[ $index ];
				} else {
					return $default;
				}
			}
			// Check if give value is empty or not.
			if ( empty( $value ) ) {
				return $default;
			} else {
				return $value;
			}
		}
	}
}
