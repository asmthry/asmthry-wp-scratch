<?php
/**
 * Author: ASMTHRY
 * Asmthry theme support class helps to add theme support to WordPress
 *
 * @package ASMTHRY
 */

/** Check if Asmthry_Themesupport exists */
if ( ! class_exists( 'Asmthry_Theme_Support' ) ) {
	/** Theme Support Class */
	class Asmthry_Theme_Support {
		/** Load constructor When creating Asmthry_Themesupport Class
		 *
		 * @param array $supports - Pass Theme support as an array.
		 * @default: 'title-tag', 'featured-content', 'post-thumbnails'.
		 */
		public function __construct( $supports = array( 'title-tag', 'featured-content', 'post-thumbnails' ) ) {
			foreach ( $supports as $support ) {
				add_theme_support( $support );
			}
		}
	}
}
