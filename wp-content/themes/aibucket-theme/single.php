<?php get_header(); ?>

<div class="container max-w-content bg-white p-8 rounded-lg mx-auto space-y-12 my-10 h-full overflow-hidden">

	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			// Get the thumbnail
			the_post_thumbnail(
				'full',
				array(
					'class' => 'img-responsive lg:h-80 md:h-48 w-full object-cover object-center',
					'title' => 'Feature image',
				)
			);
			?>

			<h1 class="text-center mt-2 text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">
				<?php the_title(); ?>
			</h1>

			<?php

			$categories = get_categories(
				array(
					'orderby' => 'name',
					'parent'  => 0,
				)
			);

			?>

			<div class="bg-white p-4 flex justify-center items-center flex-wrap">
				<?php foreach ( $categories as $category ) : ?>
					<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="m-2 px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded-full text-sm font-semibold text-gray-600">
						<?php echo esc_html( $category->name ); ?>
					</a>
				<?php endforeach; ?>
			</div>
	

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
