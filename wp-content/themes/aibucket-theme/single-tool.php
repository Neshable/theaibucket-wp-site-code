<?php get_header(); ?>

<!-- <script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script> -->

	<?php // get_template_part( 'template-parts/pages/page', 'single-site' ); ?>

	<div class="container my-8 mx-auto">

	<?php if ( have_posts() ) : ?>

		<?php
		while ( have_posts() ) :
			the_post();

			// Cache post ID for later use.
			$current_post_id = get_the_ID();

			?>

			<?php get_template_part( 'template-parts/content', 'single-tool' ); ?>

		<?php endwhile; ?>

	<?php endif; ?>
	</div>


	<?php
	// If we have the ID then display all related posts.
	if ( $current_post_id ) {

		$related_tools = new WP_Query(
			array(
				'post_type'      => 'tool',
				'posts_per_page' => -1,
			)
		);

		if ( $related_tools->have_posts() ) :
			?>
		<div class="container mx-auto my-8">
			<header class="flex flex-col items-center space-y-4 text-center">
				<h3 class="text-xl md:text-2xl font-bold">
					Other similar AI tools to <span class="text-primary"><?php echo get_the_title( $current_post_id ); ?></span>
				</h3>
			</header>

			<div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2 lg:grid-cols-3">
			<?php

			while ( $related_tools->have_posts() ) :
				$related_tools->the_post();

				get_template_part( 'template-parts/content', 'tool' );
			endwhile;
			?>
			</div>
		</div>
			<?php
		endif;
	}

	?>


<?php
get_footer();
