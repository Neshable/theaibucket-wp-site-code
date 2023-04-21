<?php get_header(); ?>

<div class="container mx-auto my-8">

	<?php get_template_part( 'template-parts/elements/form', 'alphabet-general' ); ?>

	<div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2 lg:grid-cols-4">

	<?php if ( have_posts() ) : ?>
		<?php
			while ( have_posts() ) :

				the_post();
				?>

				<?php get_template_part( 'template-parts/content', 'tool' ); ?>

				<?php
			endwhile;

		else :
			?>
		<div class="flex bg-yellow-100 rounded-lg p-4 mb-4 text-sm text-yellow-700" role="alert">
			<svg class="w-5 h-5 inline mr-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
			<div>
				<span class="font-medium">No Tools Found!</span> Try a different keyword or a letter.
			</div>
		</div>
	<?php endif; ?>
	
	</div>

	<?php Hmc_Templates::pagination(); ?>

</div>

<?php
get_footer();
