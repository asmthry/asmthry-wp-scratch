<?php
/**
 * Author: ASMTHRY
 * This file trigger when ASMTHRY plugin deactivate
 *
 * @package ASMTHRY WP Scratch
 */

/** ASMTHRY Plugin deactivation */
if ( ! class_exists( 'Asmthry_Deactivate' ) ) {
	/** Class for doing when plugin deactivating */
	class Asmthry_Deactivate {
		/** Execute code when deactivation Instance created */
		public function deactivate() {
			/** Write plugin deactivation code here */
			flush_rewrite_rules();
		}
	}
}
