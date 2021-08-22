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
	Asmthry_Load_Resource::load_class( 'Asmthry_Theme_Support' );
	if ( ! empty( $supports ) ) {
		new Asmthry_Theme_Support( $supports );
	} else {
		new Asmthry_Theme_Support();
	}
}

/** Register Styles
 *
 * @param array $resources - Give resources as an array.
 */
function asmthry_register_style( array $resources = null ) {
	Asmthry_Load_Resource::include_file( 'enqueue' );
	/** Check if Asmthry Enqueue class loaded properly */
	if ( class_exists( 'Asmthry_Enqueue' ) ) {
		if ( ! empty( $resources ) ) {
			$enqueue = new Asmthry_Enqueue( $resources );
			add_action( 'wp_enqueue_scripts', array( $enqueue, 'register_style' ) );
			return $enqueue->get_ids();
		}
		return;
	}
}
/** Enqueue Styles
 *
 * @param array $ids - Give resources id as an array.
 */
function asmthry_enqueue_style( array $ids = null ) {
	Asmthry_Load_Resource::include_file( 'enqueue' );
	/** Check if Asmthry Enqueue class loaded properly */
	if ( class_exists( 'Asmthry_Enqueue' ) ) {
		if ( ! empty( $ids ) ) {
			$enqueue = new Asmthry_Enqueue( $ids );
			add_action( 'wp_enqueue_scripts', array( $enqueue, 'enqueue_style' ) );
		}
		return;
	}
}
