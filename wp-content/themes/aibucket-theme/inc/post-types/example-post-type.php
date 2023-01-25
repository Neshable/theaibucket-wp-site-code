<?php
/**
 * Register custom post type
 * @return void
 */

function register_my_cpts_example() {

    /**
     * Post Type: Examples.
     */

    $labels = array(
        "name"               => __( "Examples", "aibucket" ),
        "singular_name"      => __( "Example", "aibucket" ),
        "menu_name"          => __( "Examples", "aibucket" ),
        "all_items"          => __( "All Examples", "aibucket" ),
        "add_new"            => __( "Add New Example", "aibucket" ),
        "add_new_item"       => __( "Add New Example", "aibucket" ),
        "edit_item"          => __( "Edit Example", "aibucket" ),
        "new_item"           => __( "New Example", "aibucket" ),
        "view_item"          => __( "View Example", "aibucket" ),
        "view_items"         => __( "View Examples", "aibucket" ),
        "search_items"       => __( "Search Example", "aibucket" ),
        "not_found"          => __( "No Example Found", "aibucket" ),
        "not_found_in_trash" => __( "No Examples Fount in Trash", "aibucket" ),
        "parent_item_colon"  => __( "Parent Example", "aibucket" ),
        "featured_image"     => __( "Example Image", "aibucket" ),
        "parent_item_colon"  => __( "Parent Example", "aibucket" ),
    );

    // Set default slug
    $slug = 'example';

    $args = array(
        "label"                 => __( "Examples", "aibucket" ),
        "labels"                => $labels,
        "description"           => "",
        "public"                => true,
        "publicly_queryable"    => true,
        "show_ui"               => true,
        "delete_with_user"      => false,
        "show_in_rest"          => true,
        "rest_base"             => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive"           => false,
        "show_in_menu"          => true,
        "show_in_nav_menus"     => true,
        "exclude_from_search"   => false,
        "capability_type"       => "post",
        "map_meta_cap"          => true,
        "hierarchical"          => false,
        "rewrite"               => array( "slug" => $slug, "with_front" => true ),
        "query_var"             => true,
        "menu_position"         => 4,
        "menu_icon"             => "dashicons-admin-site-alt3",
        "supports"              => array( "title", "editor", "thumbnail", "excerpt" ),
//        'template'              => array(
//            array( 'acf/current-specific-post-box', array() ),
//            array( 'core/heading', array(
//                'placeholder' => 'Add Author...',
//            ) ),
//        ),
        // TO disable removing of the initial blocks
//        'template_lock'         => 'all',
    );

    register_post_type( "example", $args );
}

//add_action( 'init', 'register_my_cpts_example' );


