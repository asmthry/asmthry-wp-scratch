<?php
/**
 * Author: ASMTHRY
 * Add functions for global use.
 *
 * @package ASMTHRY
 */

/** Add Theme Support
 *
 * @param array $supports - Give support name as an array.
 */
function asmthry_theme_support( array $supports = null ) {
	Asmthry_Load_Resource::include_file( 'theme-support' );
	/** Check if Asmthry Theme support class loaded properly */
	if ( class_exists( 'Asmthry_Theme_Support' ) ) {
		if ( ! empty( $supports ) ) {
			new Asmthry_Theme_Support( $supports );
		} else {
			new Asmthry_Theme_Support();
		}
	}
}
