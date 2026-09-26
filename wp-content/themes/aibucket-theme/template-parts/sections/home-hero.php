<?php
/**
 * Home: hero with the site's specific promise and two actions.
 *
 * @package aibucket
 */

?>
<section class="bg-white border-b border-gray-200" aria-labelledby="home-hero-heading">
	<div class="mx-auto max-w-site px-4 py-16 sm:px-5 md:py-24">
		<div class="max-w-3xl">
			<h1 id="home-hero-heading" class="text-4xl font-extrabold leading-tight tracking-tight text-gray-900 md:text-5xl md:leading-tight">
				<?php esc_html_e( 'Turn client recordings into content you can actually publish.', 'aibucket-theme' ); ?>
			</h1>
			<p class="mt-5 max-w-reading text-lg text-gray-600 md:text-xl">
				<?php esc_html_e( 'Step-by-step AI workflows for freelance marketers and small content agencies: take one client call or interview and turn it into clips and posts ready for client approval.', 'aibucket-theme' ); ?>
			</p>
			<div class="mt-8 flex flex-col gap-3 sm:flex-row">
				<a href="<?php echo esc_url( home_url( '/workflows/client-recording-to-content/' ) ); ?>" class="inline-flex items-center justify-center rounded-lg bg-primary px-6 py-3 text-base font-semibold text-white hover:bg-indigo-700">
					<?php esc_html_e( 'See the step-by-step workflow', 'aibucket-theme' ); ?>
				</a>
				<a href="<?php echo esc_url( home_url( '/newsletter/' ) ); ?>" class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-6 py-3 text-base font-semibold text-gray-900 hover:border-primary hover:text-primary">
					<?php esc_html_e( 'Get the newsletter', 'aibucket-theme' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>
