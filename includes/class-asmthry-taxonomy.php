<?php
/**
 * Author: ASMTHRY
 * Asmthry theme support class helps to add taxonomies to WordPress
 *
 * @package ASMTHRY
 */

/** Check if Asmthry_Taxonomy exists */
if ( ! class_exists( 'Asmthry_Taxonomy' ) ) {

	/** Create Taxonomies Class */
	class Asmthry_Taxonomy extends Asmthry_Base {

		/** Manage taxonomy name and slug.
		 *
		 * @var array $taxonomy - Store taxonomy's slug and name.
		 */
		public $taxonomy = array();

		/**
		 * Set post name for assign taxonomy to post.
		 *
		 * @var array $post_name - Store taxonomy's post and name.
		 */
		public $post_name = 'post';

		/** Construct.
		 *
		 * @param string $taxonomy_name - Give your taxonomy name.
		 * @param string $post_name - Give your post name.
		 */
		public function __construct( string $taxonomy_name, string $post_name ) {
			$this->taxonomy['name'] = $taxonomy_name;
			$this->taxonomy['slug'] = $this->create_slug( $taxonomy_name );
			$this->post_name        = $this->create_slug( $post_name );
		}

		/** Register Taxonomy. */
		public function asmthry_register_taxonomy() {
			register_taxonomy( $this->taxonomy['slug'], $this->post_name, $this->get_Taxonomy_argument() );
		}

		/** Create Arguments for Taxonomy. */
		public function get_Taxonomy_argument() {
			$arguments                          = array();
			$arguments['labels']                = $this->get_Taxonomy_labels();
			$arguments['show_ui']               = true;
			$arguments['show_in_rest']          = true;
			$arguments['show_admin_column']     = true;
			$arguments['update_count_callback'] = '_update_post_term_count';
			$arguments['query_var']             = true;
			$arguments['rewrite']               = array( 'slug' => 'topic' );
			$filter                             = apply_filters( 'asmthry_' . $this->taxonomy['slug'] . '_taxonomy_arguments', $this->taxonomy['name'], $this->taxonomy['slug'] );
			return $this->swap_array_value( $arguments, $filter );
		}

		/** Create Labels for Taxonomy. */
		public function get_Taxonomy_labels() {
			$labels = array();
            //@codingStandardsIgnoreStart
			$labels['name']                       = _x( $this->taxonomy['name'] . 's' , 'asmthry' );
			$labels['singular_name']              = _x( $this->taxonomy['name'], 'asmthry' );
			$labels['search_items']               = __( 'Search '.$this->taxonomy['name'] . 's' );
			$labels['popular_items']              = __( 'Popular '.$this->taxonomy['name'] . 's' );
			$labels['all_items']                  = __( 'All '.$this->taxonomy['name'] . 's' );
			$labels['edit_item']                  = __( 'Edit ' . $this->taxonomy['name'] );
			$labels['update_item']                = __( 'Update '.$this->taxonomy['name'] );
			$labels['add_new_item']               = __( 'Add New '.$this->taxonomy['name'] );
			$labels['new_item_name']              = __( 'New ' . $this->taxonomy['name'] . ' Name' );
			$labels['separate_items_with_commas'] = __( 'Separate ' . $this->taxonomy['name'] . 's with commas' );
			$labels['add_or_remove_items']        = __( 'Add or remove ' . $this->taxonomy['name'] . 's' );
			$labels['choose_from_most_used']      = __( 'Choose from the most used ' . $this->taxonomy['name'] . 's' );
			$labels['menu_name']                  = __( $this->taxonomy['name'] . 's' );
			// @codingStandardsIgnoreEnd
			$filter = apply_filters( 'asmthry_' . $this->taxonomy['slug'] . '_taxonomy_labels', $this->taxonomy['name'], $this->taxonomy['slug'] );
			return $this->swap_array_value( $labels, $filter );
		}
	}
}
