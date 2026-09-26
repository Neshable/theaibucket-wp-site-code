<?php
/**
 * Home: real output example.
 *
 * Renders the Home page's own content (the_content()) so the owner can add an
 * original input-to-output example in the editor. Prints nothing while the
 * page content is empty. Must be called inside the page loop.
 *
 * @package aibucket
 */

if ( '' === trim( (string) get_the_content() ) ) {
	return;
}
?>
<section class="bg-white border-b border-gray-200">
	<div class="mx-auto max-w-site px-4 py-12 sm:px-5 md:py-16">
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	</div>
</section>
