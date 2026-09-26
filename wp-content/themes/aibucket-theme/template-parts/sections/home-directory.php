<?php
/**
 * Home: compact entry to the existing AI tools directory (search + top categories).
 *
 * @package aibucket
 */

$aibucket_tools_url  = get_post_type_archive_link( 'tool' );
$aibucket_tools_url  = $aibucket_tools_url ? $aibucket_tools_url : home_url( '/tools/' );
$aibucket_categories = get_terms(
	array(
		'taxonomy'   => 'tool_category',
		'hide_empty' => true,
		'orderby'    => 'count',
		'order'      => 'DESC',
		'number'     => 10,
	)
);
?>
<section class="bg-white border-t border-gray-200" aria-labelledby="home-directory-heading">
	<div class="mx-auto max-w-site px-4 py-12 sm:px-5 md:py-16">
		<div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:items-start">
			<div>
				<h2 id="home-directory-heading" class="text-2xl font-bold tracking-tight text-gray-900 md:text-3xl"><?php esc_html_e( 'Browse the AI tools directory', 'aibucket-theme' ); ?></h2>
				<p class="mt-3 text-base text-gray-600"><?php esc_html_e( 'Look up a tool by name or browse by category.', 'aibucket-theme' ); ?></p>

				<form role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="mt-6 flex max-w-lg flex-col gap-3 sm:flex-row">
					<input type="hidden" name="post_type" value="tool">
					<label for="home-directory-search" class="sr-only"><?php esc_html_e( 'Search AI tools', 'aibucket-theme' ); ?></label>
					<input type="search" id="home-directory-search" name="s" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-3 text-sm text-gray-900" placeholder="<?php esc_attr_e( 'Search tools…', 'aibucket-theme' ); ?>">
					<button type="submit" class="inline-flex shrink-0 items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-semibold text-gray-900 hover:border-primary hover:text-primary"><?php esc_html_e( 'Search', 'aibucket-theme' ); ?></button>
				</form>

				<p class="mt-6">
					<a href="<?php echo esc_url( $aibucket_tools_url ); ?>" class="font-semibold text-primary hover:underline"><?php esc_html_e( 'Browse all tools', 'aibucket-theme' ); ?></a>
				</p>
			</div>

			<?php if ( ! empty( $aibucket_categories ) && ! is_wp_error( $aibucket_categories ) ) : ?>
				<nav aria-labelledby="home-categories-heading">
					<h3 id="home-categories-heading" class="text-base font-semibold text-gray-900"><?php esc_html_e( 'Popular categories', 'aibucket-theme' ); ?></h3>
					<ul class="mt-4 flex flex-wrap gap-2">
						<?php foreach ( $aibucket_categories as $aibucket_category ) : ?>
							<?php
							$aibucket_term_link = get_term_link( $aibucket_category );
							if ( is_wp_error( $aibucket_term_link ) ) {
								continue;
							}
							?>
							<li>
								<a href="<?php echo esc_url( $aibucket_term_link ); ?>" class="inline-flex rounded-full border border-gray-300 bg-white px-3 py-1.5 text-sm font-medium text-gray-700 hover:border-primary hover:text-primary"><?php echo esc_html( $aibucket_category->name ); ?></a>
							</li>
						<?php endforeach; ?>
					</ul>
				</nav>
			<?php endif; ?>
		</div>
	</div>
</section>
