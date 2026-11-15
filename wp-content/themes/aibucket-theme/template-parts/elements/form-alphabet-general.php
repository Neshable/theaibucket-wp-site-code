<?php
/**
 * Custom alphabet filter
 *
 * New improved version with range()
 * Now supports taxonomy as well.
 *
 * @date   02/09/2021
 * @author Nesho Sabakov <ss@ss.ss>
 */



$qo = get_queried_object();

// Get the post type slug
$current_cpt_slug = $qo->rewrite['slug'];

// Check if we have object for terms or post types.
if ( is_object( $qo ) ) {
	if ( $qo instanceof WP_Term ) {

	} else { // Naturally the other option is WP_Post_Type.
		$current_cpt_slug = $qo->rewrite['slug'];
	}
}


// Only continue if we have the slug otherwise the letter filter wont work!
if ( $current_cpt_slug ) :

	// Generate all letters to use furter
	$alphabet = range( 'a', 'z' );

	$query_letter = get_query_var( 'letter' );
	// Wrapping row: every letter stays reachable at 390px, each target is >= 44x44px.
	$item_classes = 'hmc-alphabet__js-trigger';
	$link_classes = 'flex min-h-[44px] min-w-[44px] items-center justify-center rounded-md border border-gray-300 px-2 text-sm font-medium leading-tight focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2';
	$base_url     = home_url( '/' . $current_cpt_slug );

	?>

	<div class="mx-auto text-center">

		<h1 class="text-3xl my-6 tracking-tight font-extrabold text-gray-900 md:text-6xl"><?php esc_html_e( 'Discover More AI Tools', 'aibucket-theme' ); ?></h1>

		<nav aria-label="<?php esc_attr_e( 'Filter tools by first letter', 'aibucket-theme' ); ?>">
			<ul class="flex flex-wrap justify-center gap-1">
				<?php
				foreach ( $alphabet as $letter ) :
					$is_active   = ( $query_letter && $query_letter === $letter );
					$state_class = $is_active ? ' border-indigo-600 bg-indigo-600 text-white hover:bg-gray-500' : ' bg-white text-gray-500 hover:bg-gray-100 hover:text-gray-700';
					?>
					<li data-letter="<?php echo esc_attr( $letter ); ?>" class="<?php echo esc_attr( $item_classes . ( $is_active ? ' active' : '' ) ); ?>">
						<a class="<?php echo esc_attr( $link_classes . $state_class ); ?>" href="<?php echo esc_url( add_query_arg( 'letter', $letter, $base_url ) ); ?>"<?php echo $is_active ? ' aria-current="page"' : ''; ?>><?php echo esc_html( strtoupper( $letter ) ); ?></a>
					</li>
				<?php endforeach; ?>
				<?php if ( $query_letter || is_search() ) : ?>
					<li class="<?php echo esc_attr( $item_classes ); ?>">
						<a class="<?php echo esc_attr( $link_classes . ' bg-white text-gray-500 hover:bg-gray-100 hover:text-gray-700' ); ?>" href="<?php echo esc_url( $base_url ); ?>"><?php esc_html_e( 'Clear', 'aibucket-theme' ); ?></a>
					</li>
				<?php endif; ?>
			</ul>
		</nav>

	</div>

	<?php
endif;
