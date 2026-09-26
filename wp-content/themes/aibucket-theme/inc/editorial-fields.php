<?php
/**
 * Read-only helpers shared by editorial templates.
 *
 * @package aibucket-theme
 */

/** Read ACF when available, retaining saved metadata when ACF is unavailable. */
function aibucket_tool_field( $key, $post_id = 0 ) {
	$post_id = $post_id ? absint( $post_id ) : get_the_ID();
	if ( ! $post_id ) {
		return '';
	}
	return function_exists( 'get_field' ) ? get_field( $key, $post_id ) : get_post_meta( $post_id, $key, true );
}

/** Return a plain-text field; structured fields use aibucket_tool_field directly. */
function aibucket_editorial_text( $key, $post_id = 0 ) {
	$value = aibucket_tool_field( $key, $post_id );
	return is_scalar( $value ) ? trim( wp_strip_all_tags( (string) $value ) ) : '';
}

/** Split an editor's one-item-per-line text without generating empty list items. */
function aibucket_editorial_lines( $value ) {
	if ( ! is_string( $value ) ) {
		return array();
	}
	return array_values( array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', $value ) ), 'strlen' ) );
}

/** A short fit sentence, with the existing excerpt as the legacy fallback. */
function aibucket_tool_summary( $post_id = 0 ) {
	$post_id = $post_id ? absint( $post_id ) : get_the_ID();
	$summary = aibucket_editorial_text( 'best_for', $post_id );
	if ( '' === $summary ) {
		$summary = trim( wp_strip_all_tags( get_the_excerpt( $post_id ) ) );
	}
	$sentences = preg_split( '/(?<=[.!?])\s+/u', $summary, 2 );
	return wp_trim_words( $sentences[0], 32 );
}

/** Keep the entered currency and billing basis together, without inferring prices. */
function aibucket_price_line( $post_id = 0 ) {
	$price = aibucket_editorial_text( 'price_from', $post_id );
	$basis = aibucket_editorial_text( 'billing_basis', $post_id );
	if ( '' === $price ) {
		return $basis;
	}
	/* translators: %s: editor-entered starting price including currency. */
	$line = sprintf( __( 'From %s', 'aibucket-theme' ), $price );
	return $basis ? $line . ' · ' . $basis : $line;
}

/** Evidence is explicit; a legacy record is never presented as tested. */
function aibucket_evidence_label( $post_id = 0, $include_unreviewed = true ) {
	$status = aibucket_editorial_text( 'evidence_status', $post_id );
	$labels = array(
		'tested_hands_on' => __( 'Tested hands-on', 'aibucket-theme' ),
		'desk_research'   => __( 'Desk research', 'aibucket-theme' ),
	);
	return isset( $labels[ $status ] ) ? $labels[ $status ] : ( $include_unreviewed ? __( 'Not yet reviewed', 'aibucket-theme' ) : '' );
}

/** Normalize both ACF's return format and its raw stored date, rejecting invalid dates. */
function aibucket_editorial_date( $key, $post_id = 0 ) {
	$value = aibucket_editorial_text( $key, $post_id );
	foreach ( array( 'Y-m-d', 'Ymd' ) as $format ) {
		$date = DateTimeImmutable::createFromFormat( '!' . $format, $value );
		if ( $date && $date->format( $format ) === $value ) {
			return $date->format( 'Y-m-d' );
		}
	}
	return '';
}

/** Resolve the public reviewer name without exposing user contact information. */
function aibucket_reviewer_name( $post_id = 0 ) {
	$reviewer = aibucket_tool_field( 'reviewed_by', $post_id );
	if ( is_array( $reviewer ) ) {
		$reviewer = isset( $reviewer['ID'] ) ? $reviewer['ID'] : 0;
	} elseif ( $reviewer instanceof WP_User ) {
		$reviewer = $reviewer->ID;
	}
	$user = is_numeric( $reviewer ) ? get_userdata( absint( $reviewer ) ) : false;
	return $user ? $user->display_name : '';
}

/** Accept relationship IDs or WP_Post objects and exclude unpublished/non-tool records. */
function aibucket_editorial_tool_ids( $tools, $limit = 0 ) {
	$ids = array();
	foreach ( (array) $tools as $tool ) {
		$id = $tool instanceof WP_Post ? $tool->ID : ( is_numeric( $tool ) ? absint( $tool ) : 0 );
		if ( $id && 'tool' === get_post_type( $id ) && 'publish' === get_post_status( $id ) ) {
			$ids[] = $id;
		}
	}
	$ids = array_values( array_unique( $ids ) );
	return $limit ? array_slice( $ids, 0, absint( $limit ) ) : $ids;
}

/** Only select an affiliate URL when the editor explicitly identifies the relationship. */
function aibucket_vendor_url( $post_id = 0 ) {
	$affiliate = aibucket_editorial_text( 'affiliate_url', $post_id );
	$url       = aibucket_tool_field( 'has_affiliate', $post_id ) && $affiliate ? $affiliate : aibucket_editorial_text( 'website_url', $post_id );
	return esc_url_raw( $url, array( 'http', 'https' ) );
}
