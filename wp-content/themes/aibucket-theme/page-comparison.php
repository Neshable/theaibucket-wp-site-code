<?php
/**
 * Template Name: Comparison
 *
 * @package aibucket-theme
 */
get_header();
?>
<div class="mx-auto max-w-[1200px] px-4 py-12 sm:px-5">
	<?php
	while ( have_posts() ) :
		the_post();
		$tool_ids     = aibucket_editorial_tool_ids( aibucket_tool_field( 'compared_tools' ), 4 );
		$quick_winner = aibucket_editorial_text( 'quick_winner' );
		?>
		<article>
			<header class="max-w-[720px]">
				<h1 class="break-words text-4xl font-bold tracking-tight text-gray-900 md:text-5xl"><?php echo esc_html( get_the_title() ); ?></h1>
			</header>
			<?php if ( $quick_winner ) : ?>
				<section class="mt-8 max-w-[720px] rounded-xl border border-gray-200 bg-gray-50 p-6">
					<h2 class="text-xl font-semibold text-gray-900"><?php esc_html_e( 'Quick winner by scenario', 'aibucket-theme' ); ?></h2>
					<p class="mt-3 whitespace-pre-line leading-relaxed text-gray-700"><?php echo esc_html( $quick_winner ); ?></p>
				</section>
			<?php endif; ?>
			<?php
			get_template_part(
				'template-parts/components/comparison-table',
				null,
				array(
					'tool_ids' => $tool_ids,
					'criteria' => aibucket_editorial_text( 'criteria' ),
				)
			);
			?>
			<?php if ( trim( (string) get_the_content() ) ) : ?>
				<div class="entry-content prose mt-10 max-w-[720px] text-gray-700"><?php the_content(); ?></div>
			<?php endif; ?>
			<?php get_template_part( 'template-parts/components/disclosure-note', null, array( 'tool_ids' => $tool_ids ) ); ?>
		</article>
	<?php endwhile; ?>
</div>
<?php get_footer(); ?>
