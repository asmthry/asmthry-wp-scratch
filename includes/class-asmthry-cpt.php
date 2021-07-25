<?php
/**
 * Author: ASMTHRY
 * Asmthry theme support class helps to add custom post type to WordPress
 *
 * @package ASMTHRY
 */

/** Check if Asmthry_Cpt exists */
if ( ! class_exists( 'Asmthry_Cpt' ) ) {

	/** Create Custom Post Type Class */
	class Asmthry_Cpt extends Asmthry_Base {
		/** Manage post name and slug.
		 *
		 * @var array $post - Store post's slug and name
		 */
		public $post = array();
		/** Construct.
		 *
		 * @param string $post_name - Give your post name.
		 */
		public function __construct( string $post_name ) {
			$this->post['name'] = $post_name;
			$this->post['slug'] = $this->create_slug( $post_name );
		}
		/** Register Custom Post Type. */
		public function register_cpt() {
			register_post_type( $this->post['slug'], $this->get_cpt_argument() );
		}
		/** Create Arguments for Custom Post Type. */
		public function get_cpt_argument() {
			$arguments                       = array();
			$arguments['labels']             = $this->get_cpt_labels();
			$arguments['public']             = true;
			$arguments['publicly_queryable'] = true;
			$arguments['show_ui']            = true;
			$arguments['show_in_menu']       = true;
			$arguments['query_var']          = true;
			$arguments['rewrite']            = array( 'slug' => $this->post['slug'] );
			$arguments['capability_type']    = 'post';
			$arguments['has_archive']        = true;
			$arguments['hierarchical']       = false;
			$arguments['menu_position']      = null;
			$arguments['supports']           = array( 'title', 'editor', 'thumbnail', 'excerpt' );
			return $arguments;
		}
		/** Create Labels for Custom Post Type. */
		public function get_cpt_labels() {
			$labels = array();
            //@codingStandardsIgnoreStart
			$labels['name']                  = __( $this->post['name'] . 's', 'textdomain' );
			$labels['singular_name']         = __( $this->post['name'], 'textdomain' );
			$labels['menu_name']             = __( $this->post['name'] . 's', 'textdomain' );
			$labels['name_admin_bar']        = __( $this->post['name'], 'textdomain' );
			$labels['add_new']               = __( 'Add New', 'textdomain' );
			$labels['add_new_item']          = __( 'Add New ' . $this->post['name'], 'textdomain' );
			$labels['new_item']              = __( 'New ' . $this->post['name'], 'textdomain' );
			$labels['edit_item']             = __( 'Edit ' . $this->post['name'], 'textdomain' );
			$labels['view_item']             = __( 'View ' . $this->post['name'], 'textdomain' );
			$labels['all_items']             = __( 'All ' . $this->post['name'] . 's', 'textdomain' );
			$labels['search_items']          = __( 'Search ' . $this->post['name'] . 's', 'textdomain' );
			$labels['parent_item_colon']     = __( 'Parent ' . $this->post['name'] . 's', 'textdomain' );
			$labels['not_found']             = __( 'No ' . $this->post['name'] . 's found.', 'textdomain' );
			$labels['not_found_in_trash']    = __( 'No ' . $this->post['name'] . ' found in Trash.', 'textdomain' );
			$labels['featured_image']        = __( $this->post['name'] . ' Cover Image', 'textdomain' );
			$labels['set_featured_image']    = __( 'No ' . $this->post['name'] . ' found in Trash.', 'textdomain' );
			$labels['remove_featured_image'] = __( $this->post['name'] . ' Cover Image', 'textdomain' );
			$labels['archives']              = __( $this->post['name'] . ' archives', 'textdomain' );
            //@codingStandardsIgnoreEnd
			return $labels;
		}
	}
}
