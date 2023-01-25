<?php

/**
 * Gutenberg category registration
 *
 * @package aibucket
 */
// function aibucket_block_category( $categories, $post ) {
//     return array_merge(
//         $categories,
//         array(
//             array(
//                 'slug'  => 'aibucket-blocks',
//                 'title' => __( 'Webiz Starter Blocks', 'aibucket' ),
//             ),
//         )
//     );
// }
add_filter( 'block_categories_all' , function( $categories ) {

    // Adding a new category.
	$categories[] = array(
		'slug'  => 'aibucket-blocks',
		'title' => __( 'Webiz Starter Blocks', 'aibucket' ),
	);

	return $categories;
} );

// add_filter( 'block_categories', 'aibucket_block_category', 10, 2 );

/**
 * Load Blocks for ACF 6 using Wordpress native register_block_type function
 * https://developer.wordpress.org/reference/functions/register_block_type/
 */
function aibucket_register_acf_blocks() {

	// register_block_type( get_template_directory() . '/template-parts/blocks/block-example/block.json' );

}
add_action( 'init', 'aibucket_register_acf_blocks', 5 );

function aibucket_acf_block_render_callback( $block ) {

    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace( 'acf/', '', $block[ 'name' ] );
    printf(get_theme_file_path( "/template-parts/blocks/{$slug}/{$slug}.php" ));

    // include a template part from within the "template-parts/blocks/*" folder
    if ( file_exists( get_theme_file_path( "/template-parts/blocks/{$slug}/{$slug}.php" ) ) ) {
        include( get_theme_file_path( "/template-parts/blocks/{$slug}/{$slug}.php" ) );
    }
}

/**
 * Gutenberg blocks registration through ACF
 *
 * @package aibucket
 */


