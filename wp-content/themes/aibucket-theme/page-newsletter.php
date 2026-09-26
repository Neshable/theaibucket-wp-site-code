<?php
/**
 * Template Name: Newsletter
 *
 * Newsletter landing page: specific promise, what subscribers get, cadence,
 * one signup form and one sample issue (the page's own content, shown only
 * when the page has content).
 *
 * @package aibucket
 */

$aibucket_benefits = array(
	__( 'One complete workflow per issue: the input, the tools and settings, the output and the manual fixes it needed.', 'aibucket-theme' ),
	__( 'What each tool costs and where it fell short, so you can decide before you pay.', 'aibucket-theme' ),
);

get_header();

while ( have_posts() ) :
	the_post();
	$aibucket_has_sample = '' !== trim( (string) get_the_content() );
	?>

	<div class="mx-auto w-full max-w-reading px-4 py-12 sm:px-5 md:py-16">
		<header>
			<h1 class="text-4xl font-extrabold leading-tight tracking-tight text-gray-900 md:text-5xl md:leading-tight"><?php the_title(); ?></h1>
			<p class="mt-5 text-lg text-gray-600 md:text-xl">
				<?php esc_html_e( 'One tested AI workflow for client content, every other week. Written for freelance marketers and small content agencies.', 'aibucket-theme' ); ?>
			</p>
		</header>

		<div class="mt-8 rounded-xl border border-gray-200 bg-white p-6 shadow-sm sm:p-8">
			<?php
			get_template_part(
				'template-parts/elements/form',
				'subscribe',
				array(
					'heading' => '',
					'text'    => '',
					'variant' => 'compact',
				)
			);
			?>
		</div>

		<section class="mt-12" aria-labelledby="newsletter-benefits-heading">
			<h2 id="newsletter-benefits-heading" class="text-2xl font-bold tracking-tight text-gray-900"><?php esc_html_e( 'What you get', 'aibucket-theme' ); ?></h2>
			<ul class="mt-4 space-y-3">
				<?php foreach ( $aibucket_benefits as $aibucket_benefit ) : ?>
					<li class="flex gap-3 text-base text-gray-700">
						<svg class="mt-1 h-5 w-5 shrink-0 text-primary" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
						<span><?php echo esc_html( $aibucket_benefit ); ?></span>
					</li>
				<?php endforeach; ?>
			</ul>
		</section>

		<section class="mt-12" aria-labelledby="newsletter-cadence-heading">
			<h2 id="newsletter-cadence-heading" class="text-2xl font-bold tracking-tight text-gray-900"><?php esc_html_e( 'How often', 'aibucket-theme' ); ?></h2>
			<p class="mt-4 text-base text-gray-700"><?php esc_html_e( 'Every other week. No spam, unsubscribe anytime.', 'aibucket-theme' ); ?></p>
		</section>

		<?php if ( $aibucket_has_sample ) : ?>
			<section class="mt-12 border-t border-gray-200 pt-10" aria-labelledby="newsletter-sample-heading">
				<h2 id="newsletter-sample-heading" class="text-2xl font-bold tracking-tight text-gray-900"><?php esc_html_e( 'A sample issue', 'aibucket-theme' ); ?></h2>
				<div class="entry-content mt-6 rounded-xl border border-gray-200 bg-white p-6 sm:p-8">
					<?php the_content(); ?>
				</div>
			</section>
		<?php endif; ?>
	</div>

	<?php
endwhile;

get_footer();
