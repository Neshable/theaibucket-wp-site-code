<?php
/** Editorial verdict. Args: post_id, optionally verdict. */
$tool_id = isset( $args['post_id'] ) ? absint( $args['post_id'] ) : get_the_ID();
$verdict = isset( $args['verdict'] ) && is_string( $args['verdict'] ) ? trim( $args['verdict'] ) : aibucket_editorial_text( 'verdict', $tool_id );
if ( '' === $verdict ) {
	return;
}
?>
<section class="rounded-xl border border-gray-200 bg-gray-50 p-6">
	<h2 class="text-xl font-semibold text-gray-900"><?php esc_html_e( 'Our verdict', 'aibucket-theme' ); ?></h2>
	<p class="mt-3 whitespace-pre-line text-base leading-relaxed text-gray-700"><?php echo esc_html( $verdict ); ?></p>
</section>
