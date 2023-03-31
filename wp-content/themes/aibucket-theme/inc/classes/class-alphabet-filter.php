<?php

/**
 * Add letter filtering controller
 *
 * @package aibucket
 * @since   1.0.0
 */
class AiBucket_Alphabet_Filter {

	public static function load() {
		add_filter( 'query_vars', array( __CLASS__, 'letter_register_query_var' ) );
		// Alphabet filtering for title
		add_filter( 'posts_where', array( __CLASS__, 'letter_find_where_letter' ), 10, 2 );
		// Alphabet filtering by meta field
		//add_filter( 'pre_get_posts', array( __CLASS__, 'letter_find_pre_get_letter' ), 10, 2 );
	}

	public static function letter_register_query_var( $vars ) {
		$vars[] = 'letter'; // register letter parameter for the alphabet order
		$vars[] = 'search_filter'; // register search filter parameter for filtering results
		return $vars;
	}

	public static function letter_find_pre_get_letter( $query ) {

		// @todo move to query_modifier

		$post_type = get_query_var( 'post_type' );
		$letter    = get_query_var( 'letter' );

		if ( $query->is_main_query() && $post_type && $letter ) {

			if ( $post_type == 'doctor' ) {
				// Order by surname meta field, filled from the API while syncing
				$query->set(
					'meta_query',
					array(
						array(
							'key'     => 'api_lname',
							'value'   => '^' . $letter,
							'compare' => 'REGEXP',
						),
					)
				);
			}

			set_query_var( 'posts_per_page', 36 );
			// If enabled query are faster but doesn't show total count
			// set_query_var( 'no_found_rows', true ); // Important for optimization
		}

		return $query;
	}

	public static function letter_find_where_letter( $where, $wp_query ) {
		global $wpdb;

		$post_type    = get_query_var( 'post_type' );
		$letter       = get_query_var( 'letter' );


		if ( $wp_query->is_main_query() ) {

			// Filtering for post types
			if ( $post_type && $letter ) {
				
				$where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'' . esc_sql( $wpdb->esc_like( $letter ) ) . '%\'';
				
				// If enabled query are faster but doesn't show total count
				// set_query_var( 'no_found_rows', true ); // Important for optimization
			}

			
		}

		return $where;

	}
}

AiBucket_Alphabet_Filter::load();
