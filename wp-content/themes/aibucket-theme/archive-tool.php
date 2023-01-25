<?php get_header(); ?>

<div class="container mx-auto my-8">

	<div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2 lg:grid-cols-3">

	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			
			the_post();
			?>

			<?php get_template_part( 'template-parts/content', 'tool' ); ?>

		<?php endwhile; ?>

	<?php endif; ?>
	
	</div>

</div>

<?php
get_footer();
