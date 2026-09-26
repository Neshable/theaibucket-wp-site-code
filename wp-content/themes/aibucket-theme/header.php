<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-gray-50 text-gray-900 font-sans antialiased' ); ?>>

<?php do_action( 'aibucket_theme_site_before' ); ?>

<a href="#content" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-50 focus:rounded-lg focus:bg-white focus:px-4 focus:py-2 focus:text-sm focus:font-semibold focus:text-primary focus:shadow-lg">
	<?php esc_html_e( 'Skip to content', 'aibucket-theme' ); ?>
</a>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'aibucket_theme_header' ); ?>

	<?php
	$aibucket_site_name     = get_bloginfo( 'name' );
	$aibucket_custom_logo   = (int) get_theme_mod( 'custom_logo' );
	$aibucket_search_query  = get_search_query();
	$aibucket_search_label  = __( 'Search AI tools', 'aibucket-theme' );
	$aibucket_show_cta      = ! is_page_template( 'page-newsletter.php' );
	$aibucket_search_icon   = '<svg class="w-4 h-4 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>';
	?>

	<header class="bg-white border-b border-gray-200">
		<nav aria-label="<?php esc_attr_e( 'Primary', 'aibucket-theme' ); ?>">
			<div class="mx-auto flex max-w-site flex-wrap items-center justify-between gap-y-3 px-4 py-3 sm:px-5">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center rounded" rel="home">
					<?php
					$aibucket_logo_html = $aibucket_custom_logo ? wp_get_attachment_image(
						$aibucket_custom_logo,
						'full',
						false,
						array(
							'class'   => 'h-8 w-auto',
							'alt'     => $aibucket_site_name,
							'loading' => false,
						)
					) : '';

					if ( $aibucket_logo_html ) {
						echo $aibucket_logo_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- core-generated, escaped markup.
					} else {
						echo '<span class="text-lg font-bold tracking-tight text-gray-900">' . esc_html( $aibucket_site_name ) . '</span>';
					}
					?>
				</a>

				<div class="flex items-center gap-3 lg:order-2">
					<form role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="relative hidden lg:block">
						<input type="hidden" name="post_type" value="tool">
						<label for="search-navbar" class="sr-only"><?php echo esc_html( $aibucket_search_label ); ?></label>
						<div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
							<?php echo $aibucket_search_icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</div>
						<input type="search" name="s" id="search-navbar" value="<?php echo esc_attr( $aibucket_search_query ); ?>" class="block w-56 rounded-lg border border-gray-300 bg-gray-50 p-2 pl-9 text-sm text-gray-900" placeholder="<?php esc_attr_e( 'Search tools…', 'aibucket-theme' ); ?>">
					</form>

					<?php if ( $aibucket_show_cta ) : ?>
					<a href="<?php echo esc_url( home_url( '/newsletter/' ) ); ?>" class="hidden lg:inline-flex items-center rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">
						<?php esc_html_e( 'Get the newsletter', 'aibucket-theme' ); ?>
					</a>
					<?php endif; ?>

					<button type="button" data-collapse-toggle="primary-navigation" aria-controls="primary-navigation" aria-expanded="false" class="inline-flex items-center rounded-lg p-2 text-gray-600 hover:bg-gray-100 lg:hidden">
						<span class="sr-only"><?php esc_html_e( 'Open menu', 'aibucket-theme' ); ?></span>
						<svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
					</button>
				</div>

				<div id="primary-navigation" class="hidden w-full lg:order-1 lg:flex lg:w-auto lg:items-center">
					<form role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="relative mb-3 lg:hidden">
						<input type="hidden" name="post_type" value="tool">
						<label for="search-navbar-mobile" class="sr-only"><?php echo esc_html( $aibucket_search_label ); ?></label>
						<div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
							<?php echo $aibucket_search_icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</div>
						<input type="search" name="s" id="search-navbar-mobile" value="<?php echo esc_attr( $aibucket_search_query ); ?>" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 pl-9 text-sm text-gray-900" placeholder="<?php esc_attr_e( 'Search tools…', 'aibucket-theme' ); ?>">
					</form>

					<?php
					wp_nav_menu(
						array(
							'container'      => false,
							'menu_class'     => 'flex flex-col gap-1 rounded-lg border border-gray-100 bg-gray-50 p-2 font-medium lg:flex-row lg:gap-6 lg:border-0 lg:bg-white lg:p-0',
							'theme_location' => 'primary',
							'li_class'       => '',
							'fallback_cb'    => static function () {
								get_template_part( 'template-parts/sections/nav-fallback' );
							},
						)
					);
					?>

					<?php if ( $aibucket_show_cta ) : ?>
					<a href="<?php echo esc_url( home_url( '/newsletter/' ) ); ?>" class="mt-3 flex items-center justify-center rounded-lg bg-primary px-4 py-2.5 text-sm font-semibold text-white hover:bg-indigo-700 lg:hidden">
						<?php esc_html_e( 'Get the newsletter', 'aibucket-theme' ); ?>
					</a>
					<?php endif; ?>
				</div>

			</div>
		</nav>
	</header>

	<div id="content" class="site-content flex-grow focus:outline-none" tabindex="-1">

		<?php do_action( 'aibucket_theme_content_start' ); ?>

		<main>
