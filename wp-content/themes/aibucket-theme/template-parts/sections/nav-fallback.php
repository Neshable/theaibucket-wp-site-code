<?php
/**
 * Primary navigation fallback, printed when no menu is assigned to the
 * `primary` location. Mirrors the markup wp_nav_menu() produces so the
 * `#primary-navigation .menu-item` styles in custom.css apply to both.
 *
 * @package aibucket
 */

$aibucket_nav_items = array(
	'/workflows/'  => __( 'Workflows', 'aibucket-theme' ),
	'/compare/'    => __( 'Comparisons', 'aibucket-theme' ),
	'/tools/'      => __( 'Tools', 'aibucket-theme' ),
	'/newsletter/' => __( 'Newsletter', 'aibucket-theme' ),
);

$aibucket_request_path = '/' . ltrim( (string) wp_parse_url( add_query_arg( array() ), PHP_URL_PATH ), '/' );
?>
<ul class="flex flex-col gap-1 rounded-lg border border-gray-100 bg-gray-50 p-2 font-medium lg:flex-row lg:gap-6 lg:border-0 lg:bg-white lg:p-0">
	<?php foreach ( $aibucket_nav_items as $aibucket_path => $aibucket_label ) : ?>
		<?php $aibucket_is_current = 0 === strpos( trailingslashit( $aibucket_request_path ), $aibucket_path ); ?>
		<li class="menu-item<?php echo $aibucket_is_current ? ' current-menu-item' : ''; ?>">
			<a href="<?php echo esc_url( home_url( $aibucket_path ) ); ?>"<?php echo $aibucket_is_current ? ' aria-current="page"' : ''; ?>><?php echo esc_html( $aibucket_label ); ?></a>
		</li>
	<?php endforeach; ?>
</ul>
