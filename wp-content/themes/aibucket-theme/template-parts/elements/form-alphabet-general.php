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
	$classes = 'hmc-alphabet__js-trigger bg-white border border-gray-300 ml-0 leading-tight dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white';

	?>

	<div class="mx-auto text-center overflow-x-auto">

		<h1 class="text-3xl my-6 tracking-tight font-extrabold text-gray-900 md:text-6xl">Discover More AI Tools</h1>

		<ul class="inline-flex  -space-x-px">
			<?php foreach ( $alphabet as $letter ) : 
				$additional_classes = ' text-gray-500 hover:bg-gray-100 hover:text-gray-700';
				if ( $query_letter && $query_letter == $letter ) {
					$additional_classes = ' active text-white bg-indigo-600 hover:bg-gray-500';
				}
				?>
				<li data-letter="<?php echo $letter; ?>" class="<?php echo $classes . $additional_classes; ?>">
					<a class="block py-2 px-3" href="/<?php echo $current_cpt_slug; ?>?letter=<?php echo $letter; ?>"><?php echo strtoupper( $letter ); ?></a>
				</li>
			<?php endforeach; ?>
			<?php if ( $query_letter || is_search() ) : ?>
				<li class="<?php echo $classes; ?>">
					<a class="block py-2 px-3" href="/<?php echo $current_cpt_slug; ?>"><?php _e( 'Clear', 'aibucket' ); ?></a>
				</li>
			<?php endif; ?>
		</ul>


	
	</div>

	<?php
endif;
