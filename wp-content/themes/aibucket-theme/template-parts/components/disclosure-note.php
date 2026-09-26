<?php
/** Contextual disclosure. Args: post_id or tool_ids, optionally text. */
$disclosure_ids = isset( $args['tool_ids'] ) ? aibucket_editorial_tool_ids( $args['tool_ids'] ) : array( isset( $args['post_id'] ) ? absint( $args['post_id'] ) : get_the_ID() );
$disclosure    = isset( $args['text'] ) && is_string( $args['text'] ) ? trim( $args['text'] ) : '';
foreach ( $disclosure_ids as $disclosure_id ) {
	if ( aibucket_tool_field( 'has_affiliate', $disclosure_id ) && '' === $disclosure ) {
		$disclosure = __( 'Affiliate disclosure: we may earn a commission if you buy through our links.', 'aibucket-theme' );
		break;
	}
}
if ( '' === $disclosure ) {
	return;
}
?>
<p class="mt-3 text-sm leading-relaxed text-gray-600"><?php echo esc_html( $disclosure ); ?></p>
