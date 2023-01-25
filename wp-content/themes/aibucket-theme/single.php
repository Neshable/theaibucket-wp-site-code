<?php get_header(); ?>

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

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>

			<?php // get_template_part( 'template-parts/content', get_post_format() ); ?>

		<?php endwhile; ?>

	<?php endif; ?>

	</div>
</div>

<?php
get_footer();
