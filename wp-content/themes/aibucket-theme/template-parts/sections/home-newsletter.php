<?php
/**
 * Home: newsletter invitation.
 *
 * @package aibucket
 */

?>
<section class="bg-gray-50">
	<div class="mx-auto max-w-site px-4 pb-12 sm:px-5 md:pb-16">
		<?php
		get_template_part(
			'template-parts/elements/form',
			'subscribe',
			array(
				'heading' => __( 'Get one tested workflow every other week', 'aibucket-theme' ),
				'text'    => __( 'One tested workflow every other week: the input, the tools, the output and the fixes it needed. No spam, unsubscribe anytime.', 'aibucket-theme' ),
				'variant' => 'card',
			)
		);
		?>
		<p class="text-sm text-gray-600">
			<a href="<?php echo esc_url( home_url( '/newsletter/' ) ); ?>" class="font-semibold text-primary hover:underline"><?php esc_html_e( 'See what the newsletter includes', 'aibucket-theme' ); ?></a>
		</p>
	</div>
</section>
