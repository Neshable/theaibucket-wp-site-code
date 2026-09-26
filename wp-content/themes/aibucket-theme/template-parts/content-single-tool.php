<?php
/** Decision-first tool detail, retaining the legacy description and body. */
$tool_id        = get_the_ID();
$summary        = aibucket_tool_summary( $tool_id );
$verdict        = aibucket_editorial_text( 'verdict', $tool_id );
$best_for       = aibucket_editorial_text( 'best_for', $tool_id );
$not_for        = aibucket_editorial_text( 'not_for', $tool_id );
$limitations    = aibucket_editorial_lines( aibucket_editorial_text( 'limitations', $tool_id ) );
$price          = aibucket_price_line( $tool_id );
$price_date     = aibucket_editorial_date( 'price_verified_on', $tool_id );
$price_source   = aibucket_editorial_text( 'price_source_url', $tool_id );
$verified_date  = aibucket_editorial_date( 'last_verified_on', $tool_id );
$reviewer       = aibucket_reviewer_name( $tool_id );
$method         = aibucket_tool_field( 'test_method', $tool_id );
$vendor_url     = aibucket_vendor_url( $tool_id );
$vendor_rel     = aibucket_tool_field( 'has_affiliate', $tool_id ) ? 'sponsored nofollow noopener' : 'nofollow noopener';
?>
<article class="space-y-10 py-10 md:py-14">
	<header class="grid w-full !max-w-none items-center gap-8 md:grid-cols-2">
		<div>
			<p class="mb-3 text-sm font-semibold text-gray-600"><?php echo esc_html( aibucket_evidence_label( $tool_id ) ); ?></p>
			<h1 class="break-words text-4xl font-bold tracking-tight text-gray-900 md:text-5xl"><?php echo esc_html( get_the_title() ); ?></h1>
			<?php if ( $summary ) : ?>
				<p class="mt-5 text-lg leading-relaxed text-gray-700"><?php echo esc_html( $summary ); ?></p>
			<?php endif; ?>
			<?php if ( $reviewer || $verified_date ) : ?>
				<div class="mt-5 flex flex-wrap gap-x-4 gap-y-2 text-sm text-gray-600">
					<?php if ( $reviewer ) : ?>
						<p><?php /* translators: %s: reviewer's public display name. */ echo esc_html( sprintf( __( 'Reviewed by %s', 'aibucket-theme' ), $reviewer ) ); ?></p>
					<?php endif; ?>
					<?php if ( $verified_date ) : ?>
						<p><?php esc_html_e( 'Last verified', 'aibucket-theme' ); ?> <time datetime="<?php echo esc_attr( $verified_date ); ?>"><?php echo esc_html( $verified_date ); ?></time></p>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="overflow-hidden rounded-xl border border-gray-200 bg-white"><?php echo wp_kses_post( get_the_post_thumbnail( $tool_id, 'large', array( 'class' => 'h-auto w-full object-contain' ) ) ); ?></div>
		<?php endif; ?>
	</header>

	<?php if ( $verdict || $vendor_url || $price || $price_date || $price_source ) : ?>
		<div class="grid w-full !max-w-none items-start gap-6 md:grid-cols-2">
			<?php get_template_part( 'template-parts/components/verdict-card', null, array( 'post_id' => $tool_id ) ); ?>
			<?php if ( $vendor_url || $price || $price_date || $price_source ) : ?>
				<div class="rounded-xl border border-gray-200 bg-white p-6">
					<?php if ( $price ) : ?>
						<p class="text-lg font-semibold text-gray-900"><?php echo esc_html( $price ); ?></p>
					<?php endif; ?>
					<?php if ( $price_date || $price_source ) : ?>
						<div class="mb-4 mt-2 flex flex-wrap gap-x-3 gap-y-1 text-sm text-gray-600">
							<?php if ( $price_date ) : ?>
								<p><?php esc_html_e( 'Price checked', 'aibucket-theme' ); ?> <time datetime="<?php echo esc_attr( $price_date ); ?>"><?php echo esc_html( $price_date ); ?></time></p>
							<?php endif; ?>
							<?php if ( $price_source ) : ?>
								<a class="rounded-sm underline underline-offset-4 hover:text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary" href="<?php echo esc_url( $price_source ); ?>" target="_blank" rel="nofollow noopener"><?php esc_html_e( 'Price source', 'aibucket-theme' ); ?><span class="sr-only"><?php esc_html_e( ' (opens in a new tab)', 'aibucket-theme' ); ?></span></a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					<?php if ( $vendor_url ) : ?>
						<a class="mt-3 inline-flex min-h-[44px] w-full items-center justify-center rounded-lg bg-primary px-5 py-3 text-base font-semibold text-white hover:opacity-90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-4" href="<?php echo esc_url( $vendor_url ); ?>" target="_blank" rel="<?php echo esc_attr( $vendor_rel ); ?>"><?php /* translators: %s: tool name. */ echo esc_html( sprintf( __( 'Visit %s', 'aibucket-theme' ), get_the_title() ) ); ?><span class="ml-2" aria-hidden="true">&nearr;</span><span class="sr-only"><?php esc_html_e( ' (opens in a new tab)', 'aibucket-theme' ); ?></span></a>
						<?php get_template_part( 'template-parts/components/disclosure-note', null, array( 'post_id' => $tool_id ) ); ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php if ( $best_for || $not_for ) : ?>
		<div class="grid w-full !max-w-none gap-6 md:grid-cols-2">
			<?php if ( $best_for ) : ?>
				<section class="border-t border-gray-200 pt-5">
					<h2 class="text-xl font-semibold text-gray-900"><?php esc_html_e( 'Best for', 'aibucket-theme' ); ?></h2>
					<p class="mt-3 whitespace-pre-line leading-relaxed text-gray-700"><?php echo esc_html( $best_for ); ?></p>
				</section>
			<?php endif; ?>
			<?php if ( $not_for ) : ?>
				<section class="border-t border-gray-200 pt-5">
					<h2 class="text-xl font-semibold text-gray-900"><?php esc_html_e( 'Not for', 'aibucket-theme' ); ?></h2>
					<p class="mt-3 whitespace-pre-line leading-relaxed text-gray-700"><?php echo esc_html( $not_for ); ?></p>
				</section>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php if ( $limitations ) : ?>
		<section class="max-w-[720px]">
			<h2 class="text-2xl font-semibold text-gray-900"><?php esc_html_e( 'Limitations to consider', 'aibucket-theme' ); ?></h2>
			<ul class="mt-4 list-disc space-y-2 pl-5 leading-relaxed text-gray-700">
				<?php foreach ( $limitations as $limitation ) : ?>
					<li><?php echo esc_html( $limitation ); ?></li>
				<?php endforeach; ?>
			</ul>
		</section>
	<?php endif; ?>

	<?php if ( is_string( $method ) && trim( $method ) ) : ?>
		<section class="max-w-[720px]">
			<h2 class="mb-4 text-2xl font-semibold text-gray-900"><?php esc_html_e( 'How we evaluated this tool', 'aibucket-theme' ); ?></h2>
			<div class="entry-content prose max-w-none text-gray-700"><?php echo wp_kses_post( $method ); ?></div>
		</section>
	<?php endif; ?>

	<?php if ( trim( (string) get_the_content() ) ) : ?>
		<div class="entry-content prose max-w-[720px] text-gray-700"><?php the_content(); ?></div>
	<?php endif; ?>
</article>
