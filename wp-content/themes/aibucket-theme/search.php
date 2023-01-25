<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package webiz_starter
 */

get_header();
?>

<div id="primary" class="relative py-16 sm:py-24 lg:py-32">
   <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl">
	  <h2 class="text-base font-semibold tracking-wider text-indigo-600">
		<?php
		/* translators: %s: search query. */
		_e( 'Search Results for:', 'aibucket' );
		?>
	  </h2>
	  <p class="mt-2 text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
		<?php echo get_search_query(); ?>
	  </p>
	  <p class="mt-5 max-w-prose mx-auto text-xl text-gray-500">
		
	  </p>

	  <?php
		if ( have_posts() ) :
			?>
		<div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2 lg:grid-cols-3">
			<?php
					/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'tool' );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );
					?>
					</div>
					<?php
				endif;
				?>
   
   </div>
</div>

<?php

get_footer();
