<?php
/**
 * Author: ASMTHRY
 * This file trigger when ASMTHRY plugin activate
 *
 * @package ASMTHRY WP Scratch
 */

/** ASMTHRY Plugin activation */
if ( ! class_exists( 'Asmthry_Activate' ) ) {
	/** Class for doing when plugin activating */
	class Asmthry_Activate {
		/** Execute code when Activation Instance created */
		public static function activate() {
			/** Write plugin activation code here */
			flush_rewrite_rules();
		}
	}
}
