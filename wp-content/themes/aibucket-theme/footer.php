</main>

<?php do_action( 'aibucket_theme_content_end' ); ?>

</div>

<?php do_action( 'aibucket_theme_content_after' ); ?>


<footer class="bg-white">
  <div class="max-w-screen-xl px-4 py-16 mx-auto sm:px-6 lg:px-8">
  <?php do_action( 'aibucket_theme_footer' ); ?>
	
  <div class="grid grid-cols-1 gap-8 lg:grid-cols-4">
	  <div class="lg:col-span-2">
	  <?php
		if ( has_custom_logo() ) {
			the_custom_logo();
		}

		if ( is_active_sidebar( 'footer-widget-1' ) ) {
			dynamic_sidebar( 'footer-widget-1' );
		}
		?>
	  </div>
	   
	  <div>
	  <?php
		if ( is_active_sidebar( 'footer-widget-2' ) ) {
			dynamic_sidebar( 'footer-widget-2' );
		}
		?>
	  </div>

	  <div>
	  <?php
		if ( is_active_sidebar( 'footer-widget-3' ) ) {
			dynamic_sidebar( 'footer-widget-3' );
		}
		?>
	  </div>
	</div>
	
	<div class="container mx-auto pt-12 text-center text-gray-500">
		&copy; <?php echo date_i18n( 'Y' ); ?> - <?php echo get_bloginfo( 'name' ); ?>
	</div>
  </div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
