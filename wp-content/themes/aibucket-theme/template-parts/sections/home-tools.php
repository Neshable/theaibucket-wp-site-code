<?php
/**
 * Home: recommended tools.
 *
 * Uses the Home page's `home_featured_tools` ACF relationship (max 3) when it
 * has tools; otherwise falls back to the 3 most recently modified tools with
 * a neutral heading. Cards come from the shared template-parts/content-tool.php.
 * Must be called inside the page loop.
 *
 * @package aibucket
 */

$aibucket_tool_ids = array();

if ( function_exists( 'get_field' ) ) {
	$aibucket_featured = get_field( 'home_featured_tools', get_the_ID() );

	if ( is_array( $aibucket_featured ) ) {
		foreach ( $aibucket_featured as $aibucket_item ) {
			$aibucket_id = $aibucket_item instanceof WP_Post ? $aibucket_item->ID : absint( $aibucket_item );

			if ( $aibucket_id ) {
				$aibucket_tool_ids[] = $aibucket_id;
			}
		}
	}
}

$aibucket_is_curated = ! empty( $aibucket_tool_ids );

$aibucket_query_args = array(
	'post_type'           => 'tool',
	'post_status'         => 'publish',
	'posts_per_page'      => 3,
	'ignore_sticky_posts' => true,
	'no_found_rows'       => true,
);

if ( $aibucket_is_curated ) {
	$aibucket_query_args['post__in'] = array_slice( $aibucket_tool_ids, 0, 3 );
	$aibucket_query_args['orderby']  = 'post__in';
} else {
	$aibucket_query_args['orderby'] = 'modified';
	$aibucket_query_args['order']   = 'DESC';
}

$aibucket_tools = new WP_Query( $aibucket_query_args );

if ( ! $aibucket_tools->have_posts() ) {
	return;
}
?>
<section class="bg-white border-y border-gray-200" aria-labelledby="home-tools-heading">
	<div class="mx-auto max-w-site px-4 py-12 sm:px-5 md:py-16">
		<div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
			<div>
				<h2 id="home-tools-heading" class="text-2xl font-bold tracking-tight text-gray-900 md:text-3xl">
					<?php
					if ( $aibucket_is_curated ) {
						esc_html_e( 'Recommended tools', 'aibucket-theme' );
					} else {
						esc_html_e( 'Recently updated in the directory', 'aibucket-theme' );
					}
					?>
				</h2>
				<?php if ( $aibucket_is_curated ) : ?>
					<p class="mt-3 max-w-reading text-base text-gray-600 md:text-lg"><?php esc_html_e( 'The tools we would pick for this workflow. Open each one to see what it is good at and where it falls short.', 'aibucket-theme' ); ?></p>
				<?php endif; ?>
			</div>
			<a href="<?php echo esc_url( home_url( '/tools/' ) ); ?>" class="font-semibold text-primary hover:underline"><?php esc_html_e( 'Browse all tools', 'aibucket-theme' ); ?></a>
		</div>

		<div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
			<?php
			while ( $aibucket_tools->have_posts() ) :
				$aibucket_tools->the_post();
				get_template_part( 'template-parts/content', 'tool' );
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>
