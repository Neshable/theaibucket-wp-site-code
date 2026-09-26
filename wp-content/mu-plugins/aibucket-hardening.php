<?php
/**
 * Plugin Name: AI Bucket hardening
 * Description: Site-wide hardening added after the 2026-09 compromise clean-up. Must-use, so it can't be deactivated from wp-admin.
 * Version:     1.0.1
 *
 * @package aibucket
 */

defined( 'ABSPATH' ) || exit;

/*
 * XML-RPC: nothing on this site uses it (no Jetpack, no mobile app), and it is
 * a brute-force and pingback-abuse endpoint.
 */
if ( defined( 'XMLRPC_REQUEST' ) && XMLRPC_REQUEST ) {
	status_header( 403 );
	exit( 'XML-RPC is disabled on this site.' );
}
add_filter( 'xmlrpc_enabled', '__return_false' );
add_filter( 'xmlrpc_methods', '__return_empty_array' );
add_filter(
	'wp_headers',
	static function ( $headers ) {
		unset( $headers['X-Pingback'] );
		return $headers;
	}
);

/*
 * Application passwords: the attacker-era n8n credential was revoked and no
 * integration uses REST auth any more. Re-enable here if one ever needs it.
 */
add_filter( 'wp_is_application_passwords_available', '__return_false' );

/*
 * User enumeration: anonymous visitors may not list users over REST, and
 * ?author=<id> no longer redirects to a URL that reveals the login name.
 */
add_filter(
	'rest_endpoints',
	static function ( $endpoints ) {
		if ( is_user_logged_in() ) {
			return $endpoints;
		}
		foreach ( array_keys( $endpoints ) as $route ) {
			if ( 0 === strpos( $route, '/wp/v2/users' ) ) {
				unset( $endpoints[ $route ] );
			}
		}
		return $endpoints;
	}
);

add_action(
	'template_redirect',
	static function () {
		if ( is_admin() || is_user_logged_in() ) {
			return;
		}
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- read-only query check.
		if ( isset( $_GET['author'] ) && is_numeric( $_GET['author'] ) ) {
			wp_safe_redirect( home_url( '/' ), 301 );
			exit;
		}
	},
	1
);

/*
 * Don't advertise the WordPress version.
 */
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );

/*
 * Security headers nginx (RunCloud) doesn't already send — it sets
 * X-Content-Type-Options and X-Frame-Options itself, so those aren't repeated
 * here. These apply to responses PHP renders; pages served straight from the
 * WP Rocket cache skip PHP, so set them at Cloudflare too for full coverage.
 */
add_action(
	'send_headers',
	static function () {
		if ( headers_sent() ) {
			return;
		}
		header( 'Referrer-Policy: strict-origin-when-cross-origin' );
		header( 'Permissions-Policy: camera=(), microphone=(), geolocation=()' );
	}
);
