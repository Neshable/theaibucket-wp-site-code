<?php
/**
 * Register theme options page here
 * Needs ACF in order to work
 *
 * @package aibucket
 */

function register_aibucket_options_pages() {

	// Check function exists.
	if ( ! function_exists( 'acf_add_options_page' ) ) {
		return;
	}

	// register options page.
	$option_page = acf_add_options_page( array(
		'page_title'    => __( 'Webiz Starter Theme General Settings', 'aibucket' ),
		'menu_title'    => __( 'Webiz Starter Theme Settings', 'aibucket' ),
		'menu_slug'     => 'theme-general-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false,
		'update_button' => __( 'Save', 'aibucket' ),
		// 'autoload' => true,
	) );
}

// Hook into acf initialization.
add_action( 'acf/init', 'register_aibucket_options_pages' );