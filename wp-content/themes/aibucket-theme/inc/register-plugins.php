<?php
/**
 * Load MU plugins - Crucial in normal functioning of the theme
 *
 * Loads the integrated plugins/libraries into the theme code.
 * No need of class, use anonymous functions
 *
 * @since      1.0.0
 * @subpackage Starter
 * @author     Nesho Sabakov <code@neshable.com>
 */


// Include the p2P Plugin
// include_once( get_stylesheet_directory() . '/inc/mu-plugins/p2p/p2p.php' );

// Include the ACF plugin - ver. 5.11.4
include_once( get_stylesheet_directory() . '/inc/mu-plugins/acf/acf.php' );

// Customize ACF path
add_filter('acf/settings/path', function( $path ) {
	// update path
	$path = get_stylesheet_directory() . '/inc/mu-plugins/acf/';
	// return
	return $path;
});

// Customize ACF dir.
add_filter('acf/settings/dir', function( $dir ) {
	// update path
	$dir = get_stylesheet_directory_uri() . '/inc/mu-plugins/acf/';
	// return
	return $dir;
});

// (Optional) Hide the ACF admin menu item.
//add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
//
//function my_acf_settings_show_admin( $show_admin ) {
//	return false;
//}


