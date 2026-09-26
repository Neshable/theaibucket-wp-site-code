		</main>

		<?php do_action( 'aibucket_theme_content_end' ); ?>

	</div>

	<?php do_action( 'aibucket_theme_content_after' ); ?>

	<?php
	$aibucket_privacy_url = get_privacy_policy_url();
	$aibucket_trust_links = array(
		array( home_url( '/about/' ), __( 'About', 'aibucket-theme' ) ),
		array( home_url( '/how-we-test/' ), __( 'How we test', 'aibucket-theme' ) ),
		array( home_url( '/affiliate-disclosure/' ), __( 'Affiliate disclosure', 'aibucket-theme' ) ),
		array( home_url( '/contact/' ), __( 'Contact & corrections', 'aibucket-theme' ) ),
		array( $aibucket_privacy_url ? $aibucket_privacy_url : home_url( '/privacy-policy/' ), __( 'Privacy policy', 'aibucket-theme' ) ),
	);
	$aibucket_explore_links = array(
		array( home_url( '/workflows/' ), __( 'Workflows', 'aibucket-theme' ) ),
		array( home_url( '/compare/' ), __( 'Comparisons', 'aibucket-theme' ) ),
		array( home_url( '/tools/' ), __( 'AI tools directory', 'aibucket-theme' ) ),
		array( home_url( '/newsletter/' ), __( 'Newsletter', 'aibucket-theme' ) ),
	);
	?>

	<footer class="bg-white border-t border-gray-200">
		<div class="mx-auto max-w-site px-4 py-12 sm:px-5">
			<?php do_action( 'aibucket_theme_footer' ); ?>

			<div class="grid grid-cols-1 gap-8 md:grid-cols-4">
				<div class="md:col-span-2">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-lg font-bold tracking-tight text-gray-900" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
					<p class="mt-3 max-w-sm text-sm text-gray-600">
						<?php esc_html_e( 'AI workflows for freelance marketers and small content agencies, plus a directory of AI tools.', 'aibucket-theme' ); ?>
					</p>
				</div>

				<nav aria-labelledby="footer-explore-heading">
					<h2 id="footer-explore-heading" class="text-sm font-semibold text-gray-900"><?php esc_html_e( 'Explore', 'aibucket-theme' ); ?></h2>
					<ul class="mt-3 space-y-2 text-sm">
						<?php foreach ( $aibucket_explore_links as $aibucket_link ) : ?>
							<li><a href="<?php echo esc_url( $aibucket_link[0] ); ?>" class="text-gray-600 hover:text-primary hover:underline"><?php echo esc_html( $aibucket_link[1] ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</nav>

				<nav aria-labelledby="footer-trust-heading">
					<h2 id="footer-trust-heading" class="text-sm font-semibold text-gray-900"><?php esc_html_e( 'About this site', 'aibucket-theme' ); ?></h2>
					<ul class="mt-3 space-y-2 text-sm">
						<?php foreach ( $aibucket_trust_links as $aibucket_link ) : ?>
							<li><a href="<?php echo esc_url( $aibucket_link[0] ); ?>" class="text-gray-600 hover:text-primary hover:underline"><?php echo esc_html( $aibucket_link[1] ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</nav>
			</div>

			<div class="mt-10 flex flex-col gap-2 border-t border-gray-200 pt-6 text-sm text-gray-600 md:flex-row md:items-center md:justify-between">
				<p><?php esc_html_e( 'Some links are affiliate links. They never decide what we recommend.', 'aibucket-theme' ); ?></p>
				<p>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?></p>
			</div>
		</div>
	</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
