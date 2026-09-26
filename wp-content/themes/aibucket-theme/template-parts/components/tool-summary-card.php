<?php
/** Concise tool card. Args: post_id (or tool_id). Does not change the global post. */
$tool_id = isset( $args['post_id'] ) ? absint( $args['post_id'] ) : ( isset( $args['tool_id'] ) ? absint( $args['tool_id'] ) : get_the_ID() );
if ( ! $tool_id || ! get_post( $tool_id ) ) {
	return;
}
$title       = get_the_title( $tool_id );
$summary     = aibucket_tool_summary( $tool_id );
$limitations = aibucket_editorial_lines( aibucket_editorial_text( 'limitations', $tool_id ) );
$price       = aibucket_price_line( $tool_id );
$evidence    = aibucket_evidence_label( $tool_id, false );
$thumbnail   = get_the_post_thumbnail_url( $tool_id, 'medium' );
$initial     = function_exists( 'mb_substr' ) ? mb_substr( $title, 0, 1 ) : substr( $title, 0, 1 );
?>
<article class="flex h-full min-w-0 flex-col overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
	<?php if ( $thumbnail ) : ?>
		<img class="h-44 w-full object-cover" src="<?php echo esc_url( $thumbnail ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="lazy" width="400" height="176" />
	<?php else : ?>
		<div class="flex h-44 items-center justify-center bg-gray-100" aria-hidden="true"><span class="text-6xl font-bold text-primary"><?php echo esc_html( strtoupper( $initial ) ); ?></span></div>
	<?php endif; ?>
	<div class="flex w-full flex-1 flex-col p-5">
		<h3 class="text-xl font-semibold text-gray-900"><a class="rounded-sm hover:text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-4" href="<?php echo esc_url( get_permalink( $tool_id ) ); ?>"><?php echo esc_html( $title ); ?></a></h3>
		<?php if ( $summary ) : ?>
			<p class="mt-2 text-sm leading-relaxed text-gray-700"><?php echo esc_html( $summary ); ?></p>
		<?php endif; ?>
		<?php if ( $limitations ) : ?>
			<p class="mt-3 text-sm leading-relaxed text-gray-700"><span class="font-semibold"><?php esc_html_e( 'Watch for:', 'aibucket-theme' ); ?></span> <?php echo esc_html( $limitations[0] ); ?></p>
		<?php endif; ?>
		<?php if ( $price ) : ?>
			<p class="mt-3 text-sm font-medium text-gray-900"><?php echo esc_html( $price ); ?></p>
		<?php endif; ?>
		<?php if ( $evidence ) : ?>
			<p class="mt-3 text-xs font-semibold text-gray-600"><?php echo esc_html( $evidence ); ?></p>
		<?php endif; ?>
		<div class="mt-auto pt-5">
			<a class="inline-flex min-h-[44px] items-center rounded-lg border border-gray-300 px-4 py-2 text-sm font-semibold text-primary hover:bg-gray-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2" href="<?php echo esc_url( get_permalink( $tool_id ) ); ?>"><?php esc_html_e( 'View tool', 'aibucket-theme' ); ?><span class="sr-only">: <?php echo esc_html( $title ); ?></span><span class="ml-2" aria-hidden="true">&rarr;</span></a>
		</div>
	</div>
</article>
