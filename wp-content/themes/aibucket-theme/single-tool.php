<?php
/** Individual tool and recommendations from its actual tool categories. */
get_header();
$current_post_id = 0;
$term_ids        = array();
?>
<div class="mx-auto max-w-[1200px] px-4 sm:px-5">
	<?php
	while ( have_posts() ) :
		the_post();
		$current_post_id = get_the_ID();
		$terms           = get_the_terms( $current_post_id, 'tool_category' );
		if ( $terms && ! is_wp_error( $terms ) ) {
			$term_ids = wp_list_pluck( $terms, 'term_id' );
		}
		get_template_part( 'template-parts/content', 'single-tool' );
	endwhile;
	?>
</div>
<?php
if ( $current_post_id && $term_ids ) :
	$related_tools = new WP_Query(
		array(
			'post_type'      => 'tool',
			'post_status'    => 'publish',
			'posts_per_page' => 8,
			'post__not_in'   => array( $current_post_id ),
			'no_found_rows'  => true,
			'tax_query'      => array(
				array(
					'taxonomy' => 'tool_category',
					'field'    => 'term_id',
					'terms'    => $term_ids,
				),
			),
		)
	);
	if ( $related_tools->have_posts() ) :
		?>
		<section class="mx-auto max-w-[1200px] px-4 py-12 sm:px-5" aria-labelledby="related-tools-heading">
			<h2 id="related-tools-heading" class="text-2xl font-bold text-gray-900"><?php /* translators: %s: current tool name. */ echo esc_html( sprintf( __( 'Tools related to %s', 'aibucket-theme' ), get_the_title( $current_post_id ) ) ); ?></h2>
			<div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
				<?php
				while ( $related_tools->have_posts() ) :
					$related_tools->the_post();
					get_template_part( 'template-parts/content', 'tool' );
				endwhile;
				?>
			</div>
		</section>
		<?php
	endif;
	wp_reset_postdata();
endif;
get_footer();
