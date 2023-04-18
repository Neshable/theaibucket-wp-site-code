<?php

/**
 * This class is in charge of loading the template parts with additional variables
 * Note: get_template_part() can be used if no variables are passed
 *
 * @package hmc
 * @since 1.0.0
 */
class Hmc_Templates {


	/**
	 * Like get_template_part() put lets you pass args to the template file
	 * Args are available in the tempalte as $template_args array
	 *
	 * @param string $template_path Path to template
	 * @param array $template_args Array of arguments
	 */
	public static function load( $template_path, $template_args = array(), $cache_args = array() ) {
		if ( !$template_path ) return;

		$template_args = wp_parse_args( $template_args );
		$cache_args = wp_parse_args( $cache_args );

		if ( $cache_args ) {

			// Cache the arguments
			foreach ( $template_args as $key => $value ) {
				// Support only scalars and arrays
				if ( is_scalar( $value ) || is_array( $value ) ) {
					$cache_args[ $key ] = $value;
				}
			}



		}

		$template_path_handle = $template_path;


		if ( locate_template( $template_path ) != '' ) {
			include locate_template( $template_path, false, false );
		}

		ob_start();
		$data = ob_get_clean();

		if ( $cache_args ) {
			wp_cache_set( $template_path, $data, serialize( $cache_args ), 3600 );
		}

		echo $data;
	}

	/**
	 * Render a template with pagination
	 *
	 * @param bool $custom_query Whether or not the query is manually called throgh WP_Query
	 */
	public static function pagination( $custom_query = false ) {

		// if( is_singular() )
		// 	return;

		global $wp_query;

		if ( $custom_query ) {
			$wp_query = $custom_query;
		}

		/** Stop execution if there's only 1 page */
		if ( $wp_query->max_num_pages <= 1 )
			return;

		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

		$max = intval( $wp_query->max_num_pages );

		/**    Add current page to the array */
		if ( $paged >= 1 )
			$links[] = $paged;

		/**    Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}

		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}

		echo '<nav class="flex justify-center" aria-label="Tools navigation"><ul class="list-style-none mt-6 mb-6 flex">' . "\n";

		/**    Previous Post Link */
		if ( get_previous_posts_link() )
			printf( '<li class="pointer-events-none relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-500 transition-all duration-300 dark:text-neutral-400">%s</li>' . "\n", get_previous_posts_link( __( 'Previous', 'theaibucket' ) ) );

		/**    Link to first page, plus ellipses if necessary */
		if ( !in_array( 1, $links ) ) {
			$class = 1 == $paged ? ' class="relative block rounded bg-info-100 px-3 py-1.5 text-sm font-medium text-info-700 transition-all duration-300"' : ' class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100  dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white"';

			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

			if ( !in_array( 2, $links ) )
				echo '<li>…</li>';
		}

		/**    Link to current page, plus 2 pages in either direction if necessary */
		sort( $links );
		foreach ( (array)$links as $link ) {
			$class = $paged == $link ? ' class="relative block rounded bg-info-100 px-3 py-1.5 text-sm font-medium text-info-700 transition-all duration-300"' : ' class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100  dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white"';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
		}

		/**    Link to last page, plus ellipses if necessary */
		if ( !in_array( $max, $links ) ) {
			if ( !in_array( $max - 1, $links ) )
				echo '<li>…</li>' . "\n";

			$class = $paged == $max ? ' class="relative block rounded bg-info-100 px-3 py-1.5 text-sm font-medium text-info-700 transition-all duration-300"' : ' class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100  dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white"';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
		}

		/**    Next Post Link */
		if ( get_next_posts_link() )
			printf( '<li class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white">%s</li>' . "\n", get_next_posts_link( __( 'Next', 'theaibucket' ) ) );

		echo '</ul></nav>' . "\n";


	}




	/**
	 * Social Icons – svg sources.
	 *
	 * @var array
	 */
	static $templates = array();

}
