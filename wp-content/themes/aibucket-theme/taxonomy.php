<?php get_header(); ?>

<div class="container mx-auto my-8">
    <header class="relative grid items-center my-6 md:grid-cols-[3fr,2fr] md:gap-12 md:my-12">
            <aside class="space-y-4 md:py-6">
                <p class="text-sm font-bold tracking-wider uppercase text-blue-400">
                    Category
                </p>
                
				<?php the_archive_title( '<h1 class="text-3xl font-bold tracking-tight md:text-4xl font-headline">', '</h1>' ); ?>

				<?php // the_archive_description( '<div class="archive-description">', '</div>' ); ?>
            </aside>
        </header>
</div>



				

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
