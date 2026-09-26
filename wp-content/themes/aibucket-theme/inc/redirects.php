<?php
/**
 * Permanent redirects for URLs retired during the 2026-09 relaunch.
 *
 * @package aibucket
 */

add_action(
	'template_redirect',
	function () {
		if ( ! is_404() ) {
			return;
		}

		$map = array(
			'privacy-policy-2' => '/privacy-policy/',
		);

		$path = trim( (string) wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );

		if ( isset( $map[ $path ] ) ) {
			wp_safe_redirect( home_url( $map[ $path ] ), 301 );
			exit;
		}
	}
);
