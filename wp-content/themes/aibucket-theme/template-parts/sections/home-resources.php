<?php
/**
 * Home: latest resources (the 3 newest posts). Prints nothing without posts.
 *
 * @package aibucket
 */

$aibucket_resources = new WP_Query(
	array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	)
);

if ( ! $aibucket_resources->have_posts() ) {
	return;
}

$aibucket_posts_page = (int) get_option( 'page_for_posts' );
?>
<section class="bg-gray-50" aria-labelledby="home-resources-heading">
	<div class="mx-auto max-w-site px-4 py-12 sm:px-5 md:py-16">
		<div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
			<h2 id="home-resources-heading" class="text-2xl font-bold tracking-tight text-gray-900 md:text-3xl"><?php esc_html_e( 'Latest resources', 'aibucket-theme' ); ?></h2>
			<?php if ( $aibucket_posts_page ) : ?>
				<a href="<?php echo esc_url( get_permalink( $aibucket_posts_page ) ); ?>" class="font-semibold text-primary hover:underline"><?php esc_html_e( 'All resources', 'aibucket-theme' ); ?></a>
			<?php endif; ?>
		</div>

		<div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-3">
			<?php
			while ( $aibucket_resources->have_posts() ) :
				$aibucket_resources->the_post();
				$aibucket_excerpt = wp_strip_all_tags( get_the_excerpt() );
				?>
				<article class="relative flex flex-col rounded-xl border border-gray-200 bg-white p-6 hover:shadow-md">
					<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" class="text-sm text-gray-600"><?php echo esc_html( get_the_date() ); ?></time>
					<h3 class="mt-2 text-lg font-semibold leading-snug text-gray-900">
						<a href="<?php the_permalink(); ?>" class="hover:text-primary">
							<span class="absolute inset-0" aria-hidden="true"></span>
							<?php the_title(); ?>
						</a>
					</h3>
					<?php if ( '' !== trim( $aibucket_excerpt ) ) : ?>
						<p class="mt-2 line-clamp-3 text-sm text-gray-600"><?php echo esc_html( $aibucket_excerpt ); ?></p>
					<?php endif; ?>
				</article>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>
