<?php
/**
 * Register all taxonomies here
 *
 * @todo separate into different files
 *
 * @return void
 */

function register_category_tool() {

	/**
	 * Taxonomy: Tool Categories.
	 */

	$labels = array(
		'name'          => __( 'Tool Categories', 'aibucket' ),
		'singular_name' => __( 'Category', 'aibucket' ),
	);

	$args = array(
		'label'                 => __( 'Tool Categories', 'aibucket' ),
		'labels'                => $labels,
		'public'                => true,
		'publicly_queryable'    => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => false,
		'query_var'             => true,
		'rewrite'               => array(
			'slug'       => 'tool-categories',
			'with_front' => false,
		),
		'show_admin_column'     => true,
		'show_in_rest'          => true,
		'rest_base'             => 'Tool_Category',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
		'show_in_quick_edit'    => true,
	);
	register_taxonomy( 'tool_category', array( 'tool' ), $args );

}

add_action( 'init', 'register_category_tool' );
