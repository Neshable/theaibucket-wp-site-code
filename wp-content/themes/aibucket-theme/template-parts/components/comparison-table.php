<?php
/**
 * Responsive comparison. Args: tool_ids (IDs or posts), criteria (lines or array), caption.
 * Named factual criteria select rows; free-form criteria describe the evaluation scope.
 */
$tool_ids = aibucket_editorial_tool_ids( isset( $args['tool_ids'] ) ? $args['tool_ids'] : array(), 4 );
if ( ! $tool_ids ) {
	return;
}
$criteria = isset( $args['criteria'] ) ? $args['criteria'] : array();
$criteria = is_string( $criteria ) ? aibucket_editorial_lines( $criteria ) : (array) $criteria;
$caption  = ! empty( $args['caption'] ) && is_string( $args['caption'] ) ? $args['caption'] : __( 'Tool comparison at a glance', 'aibucket-theme' );
$labels   = array(
	'verdict'          => __( 'Verdict', 'aibucket-theme' ),
	'best_for'         => __( 'Best for', 'aibucket-theme' ),
	'not_for'          => __( 'Not for', 'aibucket-theme' ),
	'limitations'      => __( 'Limitations', 'aibucket-theme' ),
	'price'            => __( 'Price', 'aibucket-theme' ),
	'evidence_status'  => __( 'Evidence', 'aibucket-theme' ),
	'last_verified_on' => __( 'Last verified', 'aibucket-theme' ),
);
$aliases = array( 'evidence' => 'evidence_status', 'last_verified' => 'last_verified_on', 'price_from' => 'price' );
$selected = array();
$scope    = array();
foreach ( $criteria as $criterion ) {
	if ( ! is_string( $criterion ) || '' === trim( $criterion ) ) {
		continue;
	}
	$key = str_replace( array( ' ', '-' ), '_', strtolower( trim( $criterion ) ) );
	$key = isset( $aliases[ $key ] ) ? $aliases[ $key ] : $key;
	if ( isset( $labels[ $key ] ) ) {
		$selected[ $key ] = $labels[ $key ];
	} else {
		$scope[] = $criterion;
	}
}
$rows = $selected ? $selected : $labels;
// Always disclose the evidence level alongside any chosen comparison criteria.
$rows['evidence_status'] = $labels['evidence_status'];
$values = array();
foreach ( $rows as $key => $label ) {
	$has_value = false;
	foreach ( $tool_ids as $tool_id ) {
		if ( 'price' === $key ) {
			$value = aibucket_price_line( $tool_id );
		} elseif ( 'evidence_status' === $key ) {
			$value = aibucket_evidence_label( $tool_id );
		} elseif ( 'last_verified_on' === $key ) {
			$value = aibucket_editorial_date( $key, $tool_id );
		} else {
			$value = aibucket_editorial_text( $key, $tool_id );
		}
		$values[ $tool_id ][ $key ] = $value;
		$has_value = $has_value || '' !== $value;
	}
	if ( ! $has_value ) {
		unset( $rows[ $key ] );
	}
}
?>
<div class="my-8 w-full !max-w-none">
	<?php if ( $scope ) : ?>
		<p class="mb-4 text-sm leading-relaxed text-gray-700"><span class="font-semibold"><?php esc_html_e( 'Evaluation criteria:', 'aibucket-theme' ); ?></span> <?php echo esc_html( implode( '; ', $scope ) ); ?></p>
	<?php endif; ?>
	<div class="hidden md:block">
		<table class="w-full table-fixed border-collapse text-left text-sm text-gray-700">
			<caption class="pb-4 text-left text-xl font-semibold text-gray-900"><?php echo esc_html( $caption ); ?></caption>
			<thead>
				<tr class="border-b border-gray-300 bg-gray-50">
					<th scope="col" class="w-32 p-4 font-semibold text-gray-900"><?php esc_html_e( 'Criterion', 'aibucket-theme' ); ?></th>
					<?php foreach ( $tool_ids as $tool_id ) : ?>
						<th scope="col" class="break-words p-4 font-semibold text-gray-900"><a class="rounded-sm text-primary underline underline-offset-4 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary" href="<?php echo esc_url( get_permalink( $tool_id ) ); ?>"><?php echo esc_html( get_the_title( $tool_id ) ); ?></a></th>
					<?php endforeach; ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $rows as $key => $label ) : ?>
					<tr class="border-b border-gray-200">
						<th scope="row" class="p-4 align-top font-semibold text-gray-900"><?php echo esc_html( $label ); ?></th>
						<?php foreach ( $tool_ids as $tool_id ) : ?>
							<td class="whitespace-pre-line break-words p-4 align-top leading-relaxed"><?php echo esc_html( $values[ $tool_id ][ $key ] ); ?></td>
						<?php endforeach; ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div class="space-y-5 md:hidden">
		<h2 class="text-xl font-semibold text-gray-900"><?php echo esc_html( $caption ); ?></h2>
		<?php foreach ( $tool_ids as $tool_id ) : ?>
			<article class="rounded-xl border border-gray-200 bg-white p-5">
				<h3 class="text-xl font-semibold text-gray-900"><a class="rounded-sm text-primary underline underline-offset-4 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary" href="<?php echo esc_url( get_permalink( $tool_id ) ); ?>"><?php echo esc_html( get_the_title( $tool_id ) ); ?></a></h3>
				<dl class="mt-4 space-y-4">
					<?php foreach ( $rows as $key => $label ) : ?>
						<?php if ( '' !== $values[ $tool_id ][ $key ] ) : ?>
							<div>
								<dt class="text-sm font-semibold text-gray-900"><?php echo esc_html( $label ); ?></dt>
								<dd class="mt-1 whitespace-pre-line break-words text-sm leading-relaxed text-gray-700"><?php echo esc_html( $values[ $tool_id ][ $key ] ); ?></dd>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</dl>
			</article>
		<?php endforeach; ?>
	</div>
</div>
