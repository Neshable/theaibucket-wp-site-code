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
			$term_ids = array();

			$terms = get_the_terms( get_the_ID(), 'tool_category' );

			if ( $terms && ! is_wp_error( $terms ) ) : 
			
				foreach ( $terms as $term ) {
					$term_links[] = $term->term_id;
				}
	
			endif;

			?>

			<?php get_template_part( 'template-parts/content', 'single-tool' ); ?>

		<?php endwhile; ?>

	<?php endif; ?>

	
	<?php 
	
	// get_template_part( 'template-parts/elements/form', 'subscribe' ); ?>

	</div>

	<?php
	// If we have the ID then display all related posts.
	if ( $current_post_id ) {

		$related_tools = new WP_Query(
			array(
				'post_type'      => 'tool',
				'posts_per_page' => 10,
				'category__in' 	=>   $term_ids
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

			<div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2 lg:grid-cols-4">
			<?php
			$posts = 0; // count the posts displayed, up to 5
			while ( $related_tools->have_posts() && $posts < 8 ) :
				$related_tools->the_post();
				$current = get_the_ID();
				// Exclude the current post if it's in the query. Faster than using posts__not_in.
				if ( $current != $current_post_id  ) {
					$posts++;
					get_template_part( 'template-parts/content', 'tool' );
				}
		
			endwhile;
			?>
			</div>
		</div>
			<?php
			wp_reset_postdata();
		endif;
	}

	?>


<?php
get_footer();
