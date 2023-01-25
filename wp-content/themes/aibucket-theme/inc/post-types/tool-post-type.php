<?php
/**
 * Register custom post type
 *
 * @return void
 */

function register_my_cpts_tool() {

	/**
	 * Post Type: tools.
	 */

	$labels = array(
		'name'               => __( 'tools', 'aibucket' ),
		'singular_name'      => __( 'tool', 'aibucket' ),
		'menu_name'          => __( 'tools', 'aibucket' ),
		'all_items'          => __( 'All tools', 'aibucket' ),
		'add_new'            => __( 'Add New tool', 'aibucket' ),
		'add_new_item'       => __( 'Add New tool', 'aibucket' ),
		'edit_item'          => __( 'Edit tool', 'aibucket' ),
		'new_item'           => __( 'New tool', 'aibucket' ),
		'view_item'          => __( 'View tool', 'aibucket' ),
		'view_items'         => __( 'View tools', 'aibucket' ),
		'search_items'       => __( 'Search tool', 'aibucket' ),
		'not_found'          => __( 'No tool Found', 'aibucket' ),
		'not_found_in_trash' => __( 'No tools Fount in Trash', 'aibucket' ),
		'parent_item_colon'  => __( 'Parent tool', 'aibucket' ),
		'featured_image'     => __( 'tool Image', 'aibucket' ),
		'parent_item_colon'  => __( 'Parent tool', 'aibucket' ),
	);

	// Set default slug
	$slug = 'tools';

	$args = array(
		'label'                 => __( 'tools', 'aibucket' ),
		'labels'                => $labels,
		'description'           => '',
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'delete_with_user'      => false,
		'show_in_rest'          => true,
		'rest_base'             => '',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'has_archive'           => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'exclude_from_search'   => false,
		'capability_type'       => 'post',
		'map_meta_cap'          => true,
		'hierarchical'          => false,
		'rewrite'               => array(
			'slug'       => $slug,
			'with_front' => true,
		),
		'query_var'             => true,
		'menu_position'         => 4,
		'menu_icon'             => 'dashicons-admin-site-alt3',
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	// 'template'              => array(
	// array( 'acf/current-specific-post-box', array() ),
	// array( 'core/heading', array(
	// 'placeholder' => 'Add Author...',
	// ) ),
	// ),
		// TO disable removing of the initial blocks
	// 'template_lock'         => 'all',
	);

	register_post_type( 'tool', $args );
}

add_action( 'init', 'register_my_cpts_tool' );
