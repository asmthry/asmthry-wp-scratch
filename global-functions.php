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
	Asmthry_Load_Resource::load_class( 'Asmthry_Enqueue' );
	/** Check if Asmthry Enqueue class loaded properly */
	if ( ! empty( $resources ) ) {
		$enqueue = new Asmthry_Enqueue( $resources );
		add_action( 'wp_enqueue_scripts', array( $enqueue, 'register_style' ) );
		return $enqueue->get_ids();
	}
}
/** Enqueue Styles
 *
 * @param array $ids - Give resources id and page as an array.
 */
function asmthry_enqueue_style( array $ids = null ) {
	Asmthry_Load_Resource::load_class( 'Asmthry_Enqueue' );
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
	Asmthry_Load_Resource::load_class( 'Asmthry_Enqueue' );
	/** Check if Asmthry Enqueue class loaded properly */
	if ( ! empty( $resources ) ) {
		$enqueue = new Asmthry_Enqueue( $resources );
		add_action( 'wp_enqueue_scripts', array( $enqueue, 'register_script' ) );
		return $enqueue->get_ids();
	}
}
/** Enqueue Scripts
 *
 * @param array $ids - Give resources id and page as an array.
 */
function asmthry_enqueue_script( array $ids = null ) {
	Asmthry_Load_Resource::load_class( 'Asmthry_Enqueue' );
	/** Check if Asmthry Enqueue class loaded properly */
	if ( ! empty( $ids ) ) {
		$enqueue = new Asmthry_Enqueue( $ids );
		add_action( 'wp_enqueue_scripts', array( $enqueue, 'enqueue_script' ) );
	}
}

/** Create Custom post type
 *
 * @param string $post_name - Give post name.
 */
function asmthry_create_cpt( string $post_name ) {
	Asmthry_Load_Resource::load_class( 'Asmthry_Cpt' );
	/** Check if Asmthry Enqueue class loaded properly */
	if ( ! empty( $post_name ) ) {
		$cpt = new Asmthry_Cpt( $post_name );
		add_action( 'init', array( $cpt, 'register_cpt' ) );
	}
}

/** Create taxonomies.
 *
 * @param string $taxonomy_name - taxonomy name.
 * @param string $post_name - Give post name.
 */
function asmthry_create_taxonomy( string $taxonomy_name, string $post_name ) {
	Asmthry_Load_Resource::load_class( 'Asmthry_Taxonomy' );
	/** Check if Asmthry Taxonomy class loaded properly */
	if ( ! empty( $taxonomy_name ) ) {
		$cpt = new Asmthry_Taxonomy( $taxonomy_name, $post_name );
		add_action( 'init', array( $cpt, 'asmthry_register_taxonomy' ) );
	}
}

/** Create Customizer.
 *
 * @param array $customizer - Give customizer controls.
 */
function asmthry_create_customizer( array $customizer ) {
	Asmthry_Load_Resource::load_class( 'Asmthry_Customizer' );
	/** Check if Asmthry Taxonomy class loaded properly */
	if ( ! empty( $customizer ) ) {
		$asmthry_customizer = new Asmthry_Customizer( $customizer );
		add_action( 'customize_register', array( $asmthry_customizer, 'create_customizer' ) );
	}
}

/** Create Customizer.
 *
 * @param string $customizer_name - Give customizer controls.
 */
function asmthry_get_customizer( string $customizer_name ) {
	Asmthry_Load_Resource::load_class( 'Asmthry_Customizer' );
	/** Check if Asmthry Taxonomy class loaded properly */
	if ( ! empty( $customizer_name ) ) {
		$customizer_value = Asmthry_Customizer::get_theme_mode( $customizer_name );
		return $customizer_value;
	}
}
