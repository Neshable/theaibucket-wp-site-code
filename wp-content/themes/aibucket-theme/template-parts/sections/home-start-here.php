<?php
/**
 * Home: "Start here" sequence for the first workflow.
 *
 * @package aibucket
 */

$aibucket_workflow_url = home_url( '/workflows/client-recording-to-content/' );

$aibucket_steps = array(
	array(
		__( 'Record and transcribe', 'aibucket-theme' ),
		__( 'Get a clean transcript of the client call, interview or webinar.', 'aibucket-theme' ),
	),
	array(
		__( 'Find the moments worth using', 'aibucket-theme' ),
		__( 'Pick the quotes, stories and answers that stand on their own.', 'aibucket-theme' ),
	),
	array(
		__( 'Draft clips and posts', 'aibucket-theme' ),
		__( 'Turn each moment into a short clip, a social post or a newsletter section.', 'aibucket-theme' ),
	),
	array(
		__( 'Review, approve, publish', 'aibucket-theme' ),
		__( 'Fix what the AI got wrong, check tone and facts with the client, then publish.', 'aibucket-theme' ),
	),
);
?>
<section class="bg-gray-50" aria-labelledby="home-start-heading">
	<div class="mx-auto max-w-site px-4 py-12 sm:px-5 md:py-16">
		<h2 id="home-start-heading" class="text-2xl font-bold tracking-tight text-gray-900 md:text-3xl"><?php esc_html_e( 'Start here', 'aibucket-theme' ); ?></h2>
		<p class="mt-3 max-w-reading text-base text-gray-600 md:text-lg">
			<?php esc_html_e( 'Our first complete workflow: from one client recording to content your client signs off on.', 'aibucket-theme' ); ?>
		</p>

		<ol class="mt-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
			<?php foreach ( $aibucket_steps as $aibucket_index => $aibucket_step ) : ?>
				<li class="rounded-xl border border-gray-200 bg-white p-5">
					<span class="flex h-8 w-8 items-center justify-center rounded-full bg-indigo-50 text-sm font-bold text-primary" aria-hidden="true"><?php echo esc_html( (string) ( $aibucket_index + 1 ) ); ?></span>
					<h3 class="mt-4 text-base font-semibold text-gray-900">
						<span class="sr-only"><?php echo esc_html( sprintf( /* translators: %d: step number. */ __( 'Step %d:', 'aibucket-theme' ), $aibucket_index + 1 ) ); ?> </span><?php echo esc_html( $aibucket_step[0] ); ?>
					</h3>
					<p class="mt-2 text-sm text-gray-600"><?php echo esc_html( $aibucket_step[1] ); ?></p>
				</li>
			<?php endforeach; ?>
		</ol>

		<p class="mt-8">
			<a href="<?php echo esc_url( $aibucket_workflow_url ); ?>" class="inline-flex items-center gap-2 font-semibold text-primary hover:underline">
				<?php esc_html_e( 'Read the complete workflow', 'aibucket-theme' ); ?>
				<svg class="h-4 w-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
			</a>
		</p>
	</div>
</section>
