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
	Asmthry_Load_Resource::include_file( 'Asmthry_Theme_Support' );
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
	Asmthry_Load_Resource::include_file( 'Asmthry_Enqueue' );
	/** Check if Asmthry Enqueue class loaded properly */
	if ( ! empty( $resources ) ) {
		$enqueue = new Asmthry_Enqueue( $resources );
		add_action( 'wp_enqueue_scripts', array( $enqueue, 'register_style' ) );
		return $enqueue->get_ids();
	}
}
/** Enqueue Styles
 *
 * @param array $ids - Give resources id as an array.
 */
function asmthry_enqueue_style( array $ids = null ) {
	Asmthry_Load_Resource::include_file( 'Asmthry_Enqueue' );
	/** Check if Asmthry Enqueue class loaded properly */
	if ( ! empty( $ids ) ) {
		$enqueue = new Asmthry_Enqueue( $ids );
		add_action( 'wp_enqueue_scripts', array( $enqueue, 'enqueue_style' ) );
	}
}

/** Register Scripts
 *
 * @param array $resources - Give resources as an array.
 */
function asmthry_register_script( array $resources = null ) {
	Asmthry_Load_Resource::include_file( 'Asmthry_Enqueue' );
	/** Check if Asmthry Enqueue class loaded properly */
	if ( ! empty( $resources ) ) {
		$enqueue = new Asmthry_Enqueue( $resources );
		add_action( 'wp_enqueue_scripts', array( $enqueue, 'register_script' ) );
		return $enqueue->get_ids();
	}
}
/** Enqueue Scripts
 *
 * @param array $ids - Give resources id as an array.
 */
function asmthry_enqueue_script( array $ids = null ) {
	Asmthry_Load_Resource::include_file( 'Asmthry_Enqueue' );
	/** Check if Asmthry Enqueue class loaded properly */
	if ( ! empty( $ids ) ) {
		$enqueue = new Asmthry_Enqueue( $ids );
		add_action( 'wp_enqueue_scripts', array( $enqueue, 'enqueue_script' ) );
	}
}

/** Register Scripts
 *
 * @param array $resources - Give resources as an array.
 */
function asmthry_register_script( array $resources = null ) {
	Asmthry_Load_Resource::include_file( 'enqueue' );
	/** Check if Asmthry Enqueue class loaded properly */
	if ( class_exists( 'Asmthry_Enqueue' ) ) {
		if ( ! empty( $resources ) ) {
			$enqueue = new Asmthry_Enqueue( $resources );
			add_action( 'wp_enqueue_scripts', array( $enqueue, 'register_script' ) );
			return $enqueue->get_ids();
		}
		return;
	}
}

/** Enqueue Scripts
 *
 * @param array $ids - Give resources id as an array.
 */
function asmthry_enqueue_script( array $ids = null ) {
	Asmthry_Load_Resource::include_file( 'enqueue' );
	/** Check if Asmthry Enqueue class loaded properly */
	if ( class_exists( 'Asmthry_Enqueue' ) ) {
		if ( ! empty( $ids ) ) {
			$enqueue = new Asmthry_Enqueue( $ids );
			add_action( 'wp_enqueue_scripts', array( $enqueue, 'enqueue_script' ) );
		}
	}
}

/** Enqueue Styles
 *
 * @param string $post_name - Give resources id as an array.
 */
function asmthry_create_cpt( string $post_name ) {
	Asmthry_Load_Resource::include_file( 'Asmthry_Cpt' );
	/** Check if Asmthry Enqueue class loaded properly */
	if ( ! empty( $post_name ) ) {
		$cpt = new Asmthry_Cpt( $post_name );
		add_action( 'init', array( $cpt, 'register_cpt' ) );
	}
}
