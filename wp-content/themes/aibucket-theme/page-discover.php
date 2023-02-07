<?php get_header();

// Get a random post.

$random_tool = new WP_Query(
	array(
		'orderby'        => 'rand',
		'posts_per_page' => '1',
	)
);

?>

	<div class="container my-8 mx-auto">

	<?php if ( $random_tool->have_posts() ) : ?>

		<?php
		while ( $random_tool->have_posts() ) :
			$random_tool->the_post();


			// Cache post ID for later use.
			$current_post_id = get_the_ID();

			?>

			<script>
				window.history.pushState(null, <?php echo get_the_title(); ?>, <?php echo get_permalink(); ?> );
			</script>

			<?php get_template_part( 'template-parts/content', 'single-tool' ); ?>

			<?php
		endwhile;
		// Reset Post Data
		wp_reset_postdata();
		?>

	<?php endif; ?>
	</div>


	<?php
	// If we have the ID then display all related posts.
	if ( $current_post_id ) {

		$related_tools = new WP_Query(
			array(
				'post_type'      => 'tool',
				'posts_per_page' => 10,
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
			$posts = 0; // count the posts displayed, up to 5
			while ( $related_tools->have_posts() && $posts < 6 ) :
				$related_tools->the_post();
				$current = get_the_ID();
				// Exclude the current post if it's in the query. Faster than using posts__not_in.
				if ( $current != $current_post_id ) {
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
