<?php
/**
 * Template Name: Workflow hub
 *
 * @package aibucket-theme
 */
get_header();
?>
<div class="mx-auto max-w-[1200px] px-4 py-12 sm:px-5">
	<?php
	while ( have_posts() ) :
		the_post();
		$outcome  = aibucket_editorial_text( 'workflow_outcome' );
		$tool_ids = aibucket_editorial_tool_ids( aibucket_tool_field( 'workflow_tools' ) );
		?>
		<article>
			<header class="max-w-[720px]">
				<h1 class="break-words text-4xl font-bold tracking-tight text-gray-900 md:text-5xl"><?php echo esc_html( get_the_title() ); ?></h1>
				<?php if ( $outcome ) : ?>
					<p class="mt-5 whitespace-pre-line text-lg leading-relaxed text-gray-700"><?php echo esc_html( $outcome ); ?></p>
				<?php endif; ?>
			</header>
			<?php if ( trim( (string) get_the_content() ) ) : ?>
				<div class="entry-content prose mt-10 max-w-[720px] text-gray-700"><?php the_content(); ?></div>
			<?php endif; ?>
			<?php if ( $tool_ids ) : ?>
				<section class="mt-12 w-full !max-w-none" aria-labelledby="workflow-tools-heading">
					<h2 id="workflow-tools-heading" class="text-2xl font-bold text-gray-900"><?php esc_html_e( 'Tools used in this workflow', 'aibucket-theme' ); ?></h2>
					<div class="mt-6 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
						<?php
						foreach ( $tool_ids as $tool_id ) {
							get_template_part( 'template-parts/components/tool-summary-card', null, array( 'post_id' => $tool_id ) );
						}
						?>
					</div>
					<?php get_template_part( 'template-parts/components/disclosure-note', null, array( 'tool_ids' => $tool_ids ) ); ?>
				</section>
			<?php endif; ?>
		</article>
	<?php endwhile; ?>
</div>
<?php get_footer(); ?>
