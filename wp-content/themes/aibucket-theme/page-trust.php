<?php
/**
 * Template Name: Trust / policy
 *
 * Long-form reading layout for About, How we test, Affiliate disclosure,
 * Contact & corrections and Privacy policy pages.
 *
 * @package aibucket
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'mx-auto w-full max-w-reading px-4 py-12 sm:px-5 md:py-16' ); ?>>
		<header class="mb-8 border-b border-gray-200 pb-6">
			<h1 class="text-3xl font-extrabold tracking-tight text-gray-900 md:text-4xl"><?php the_title(); ?></h1>
			<p class="mt-3 text-sm text-gray-600">
				<?php esc_html_e( 'Last updated', 'aibucket-theme' ); ?>
				<time datetime="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>"><?php echo esc_html( get_the_modified_date() ); ?></time>
			</p>
		</header>

		<div class="entry-content text-base leading-relaxed text-gray-800 md:text-lg">
			<?php the_content(); ?>
		</div>
	</article>

	<?php
endwhile;

get_footer();
