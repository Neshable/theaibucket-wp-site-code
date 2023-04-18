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

		<?php if ( have_posts() ) : ?>
				<div class="max-w-3xl mx-auto mt-8" style="">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :

						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'news' );

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