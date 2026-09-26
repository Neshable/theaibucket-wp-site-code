<?php
/**
 * Newsletter signup (ConvertKit form 4692392).
 *
 * Optional $args (via get_template_part( ..., null, $args )):
 * - heading  string  Heading text. '' hides it. Card default: see below.
 * - text     string  Supporting line. '' hides it.
 * - variant  string  'card' (bordered box, default) or 'compact' (form only).
 *
 * @package aibucket
 */

$aibucket_args = wp_parse_args(
	isset( $args ) && is_array( $args ) ? $args : array(),
	array(
		'heading' => null,
		'text'    => null,
		'variant' => 'card',
	)
);

$aibucket_is_compact = 'compact' === $aibucket_args['variant'];

if ( null === $aibucket_args['heading'] ) {
	$aibucket_args['heading'] = $aibucket_is_compact ? '' : __( 'Get one tested workflow in your inbox', 'aibucket-theme' );
}

if ( null === $aibucket_args['text'] ) {
	$aibucket_args['text'] = __( 'One tested workflow every other week. No spam, unsubscribe anytime.', 'aibucket-theme' );
}

$aibucket_email_id    = wp_unique_id( 'subscribe-email-' );
$aibucket_heading_id  = $aibucket_email_id . '-heading';
$aibucket_privacy_url = get_privacy_policy_url();
$aibucket_privacy_url = $aibucket_privacy_url ? $aibucket_privacy_url : home_url( '/privacy-policy/' );

if ( $aibucket_is_compact ) {
	$aibucket_wrapper_class = 'w-full';
} else {
	$aibucket_wrapper_class = 'my-8 rounded-xl border border-gray-200 bg-white p-6 shadow-sm sm:p-8';
}
?>
<aside class="<?php echo esc_attr( $aibucket_wrapper_class ); ?>"<?php echo '' !== $aibucket_args['heading'] ? ' aria-labelledby="' . esc_attr( $aibucket_heading_id ) . '"' : ' aria-label="' . esc_attr__( 'Newsletter signup', 'aibucket-theme' ) . '"'; ?>>
	<?php if ( '' !== $aibucket_args['heading'] ) : ?>
		<h2 id="<?php echo esc_attr( $aibucket_heading_id ); ?>" class="text-xl font-bold tracking-tight text-gray-900 sm:text-2xl"><?php echo esc_html( $aibucket_args['heading'] ); ?></h2>
	<?php endif; ?>

	<?php if ( '' !== $aibucket_args['text'] ) : ?>
		<p class="mt-2 text-base text-gray-600"><?php echo esc_html( $aibucket_args['text'] ); ?></p>
	<?php endif; ?>

	<script src="https://f.convertkit.com/ckjs/ck.5.js"></script>
	<form action="https://app.convertkit.com/forms/4692392/subscriptions" class="seva-form formkit-form mt-5" method="post" data-sv-form="4692392" data-uid="344e3b5c48" data-format="inline" data-version="5" data-options="{&quot;settings&quot;:{&quot;after_subscribe&quot;:{&quot;action&quot;:&quot;message&quot;,&quot;success_message&quot;:&quot;Success! Now check your email to confirm your subscription.&quot;,&quot;redirect_url&quot;:&quot;&quot;},&quot;analytics&quot;:{&quot;google&quot;:null,&quot;fathom&quot;:null,&quot;facebook&quot;:null,&quot;segment&quot;:null,&quot;pinterest&quot;:null,&quot;sparkloop&quot;:null,&quot;googletagmanager&quot;:null},&quot;modal&quot;:{&quot;trigger&quot;:&quot;timer&quot;,&quot;scroll_percentage&quot;:null,&quot;timer&quot;:5,&quot;devices&quot;:&quot;all&quot;,&quot;show_once_every&quot;:15},&quot;powered_by&quot;:{&quot;show&quot;:true,&quot;url&quot;:&quot;https://convertkit.com/features/forms?utm_campaign=poweredby&amp;utm_content=form&amp;utm_medium=referral&amp;utm_source=dynamic&quot;},&quot;recaptcha&quot;:{&quot;enabled&quot;:false},&quot;return_visitor&quot;:{&quot;action&quot;:&quot;show&quot;,&quot;custom_content&quot;:&quot;&quot;},&quot;slide_in&quot;:{&quot;display_in&quot;:&quot;bottom_right&quot;,&quot;trigger&quot;:&quot;timer&quot;,&quot;scroll_percentage&quot;:null,&quot;timer&quot;:5,&quot;devices&quot;:&quot;all&quot;,&quot;show_once_every&quot;:15},&quot;sticky_bar&quot;:{&quot;display_in&quot;:&quot;top&quot;,&quot;trigger&quot;:&quot;timer&quot;,&quot;scroll_percentage&quot;:null,&quot;timer&quot;:5,&quot;devices&quot;:&quot;all&quot;,&quot;show_once_every&quot;:15}},&quot;version&quot;:&quot;5&quot;}" min-width="400 500 600 700">
		<div data-style="clean">
			<ul class="formkit-alert formkit-alert-error mb-3 text-sm text-red-700" data-element="errors" data-group="alert" aria-live="polite"></ul>
			<div data-element="fields" data-stacked="false" class="seva-fields formkit-fields">
				<label for="<?php echo esc_attr( $aibucket_email_id ); ?>" class="mb-2 block text-sm font-medium text-gray-900"><?php esc_html_e( 'Email address', 'aibucket-theme' ); ?></label>
				<div class="flex w-full max-w-lg flex-col gap-3 sm:flex-row">
					<div class="formkit-field relative w-full">
						<input id="<?php echo esc_attr( $aibucket_email_id ); ?>" class="formkit-input block w-full rounded-lg border border-gray-300 bg-gray-50 p-3 text-sm text-gray-900" name="email_address" placeholder="<?php esc_attr_e( 'you@example.com', 'aibucket-theme' ); ?>" required="" type="email" autocomplete="email">
					</div>
					<button type="submit" data-element="submit" class="formkit-submit inline-flex shrink-0 items-center justify-center rounded-lg bg-primary px-5 py-3 text-sm font-semibold text-white hover:bg-indigo-700">
						<div class="formkit-spinner">
							<div></div>
							<div></div>
							<div></div>
						</div>
						<span><?php esc_html_e( 'Subscribe', 'aibucket-theme' ); ?></span>
					</button>
				</div>
			</div>
		</div>
	</form>

	<p class="mt-3 text-sm text-gray-600">
		<?php esc_html_e( 'How we handle your email:', 'aibucket-theme' ); ?>
		<a href="<?php echo esc_url( $aibucket_privacy_url ); ?>" class="text-primary underline hover:no-underline"><?php esc_html_e( 'privacy policy', 'aibucket-theme' ); ?></a>.
	</p>
</aside>
