<?php
/**
 * The template for displaying archive location page
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package hmc
 */

get_header();


?>

	<div class="container my-8 mx-auto">

        <div class="py-4 px-4 sm:py-8">
            <div class="text-center">
                <h1 class="text-2xl tracking-tight font-bold text-gray-900 md:text-4xl">
                    <span class="block xl:inline">💡 Trending</span>
                    <span class="block text-indigo-600 xl:inline">Repos</span>

                </h1>	
            </div>
        </div>


		<?php if ( have_posts() ) : ?>
				<div class="max-w-3xl mx-auto mt-8" style="">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :

						the_post();

						get_template_part( 'template-parts/content', 'repo' );

					endwhile;
					?>
				</div>
				<?php

				Hmc_Templates::pagination();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
	</div>


<?php

get_footer();
