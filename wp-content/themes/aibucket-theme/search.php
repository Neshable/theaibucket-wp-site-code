<?php
/**
 * Search results. The search forms send post_type=tool, so results are tool cards
 * rendered with the same component and grid as the /tools/ archive.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package aibucket-theme
 */

get_header();
?>

<div id="primary" class="container mx-auto my-8">

	<header class="py-6">
		<h1 class="break-words text-3xl font-extrabold tracking-tight text-gray-900 md:text-5xl">
			<?php
			/* translators: %s: search query. */
			printf( esc_html__( 'Search results for: %s', 'aibucket-theme' ), '<span class="text-primary">' . esc_html( get_search_query( false ) ) . '</span>' );
			?>
		</h1>
	</header>

	<?php if ( have_posts() ) : ?>
		<div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'tool' );
			endwhile;
			?>
		</div>

		<?php Hmc_Templates::pagination(); ?>

	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	<?php endif; ?>

</div>

<?php
get_footer();
