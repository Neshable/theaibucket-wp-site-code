<?php
/**
 * Register custom post type
 *
 * @return void
 */

function register_my_cpts_repo() {

	/**
	 * Post Type: repos.
	 */

	$labels = array(
		'name'               => __( 'Repos', 'aibucket' ),
		'singular_name'      => __( 'Repo', 'aibucket' ),
		'menu_name'          => __( 'Repos', 'aibucket' ),
		'all_items'          => __( 'All Repos', 'aibucket' ),
		'add_new'            => __( 'Add New Repo', 'aibucket' ),
		'add_new_item'       => __( 'Add New Repo', 'aibucket' ),
		'edit_item'          => __( 'Edit Repo', 'aibucket' ),
		'new_item'           => __( 'New Repo', 'aibucket' ),
		'view_item'          => __( 'View Repo', 'aibucket' ),
		'view_items'         => __( 'View Repos', 'aibucket' ),
		'search_items'       => __( 'Search Repo', 'aibucket' ),
		'not_found'          => __( 'No Repo Found', 'aibucket' ),
		'not_found_in_trash' => __( 'No Repos Fount in Trash', 'aibucket' ),
		'parent_item_colon'  => __( 'Parent Repo', 'aibucket' ),
		'featured_image'     => __( 'Repo Image', 'aibucket' ),
		'parent_item_colon'  => __( 'Parent Repo', 'aibucket' ),
	);

	// Set default slug
	$slug = 'repositories';

	$args = array(
		'label'                 => __( 'Repos', 'aibucket' ),
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

	register_post_type( 'repo', $args );
}

add_action( 'init', 'register_my_cpts_repo' );
