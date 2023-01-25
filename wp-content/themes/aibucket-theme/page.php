<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * Template Name: Default
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aibucket
 */

get_header(); ?>

<div class="container mx-auto px-4 sm:px-6 space-y-12 my-10">

	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<h1 class="text-center mt-2 text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">
				<?php the_title(); ?>
			</h1>

			<article class="entry-content prose prose-indigo lg:prose-xl">
			<?php the_content(); ?>
			</article>

			<?php // get_template_part( 'template-parts/content', get_post_format() ); ?>

		<?php endwhile; ?>

	<?php endif; ?>

	</div>
</div>

<?php
get_footer();
