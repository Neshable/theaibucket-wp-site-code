<article id="post-<?php the_ID(); ?>" class="shadow-sm rounded-xl">
	<div class="overflow-hidden h-full  flex flex-col bg-white shadow rounded-xl">
		
	<header class="flex flex-col flex-1">
		
	<a href="<?php the_permalink(); ?>" ><img src="<?php echo get_the_post_thumbnail_url($post, 'full'); ?>" alt="plant" class="h-auto w-full">
    </a>

	<div class="grid grid-flow-row auto-rows-max p-5">
	<?php the_title( sprintf( '<h2 class="entry-title text-2xl md:text-3xl font-extrabold leading-tight mb-3"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	<div class="flex mb-3 items-center">
		<svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
			<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
			</path>
		</svg>
		<svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
			<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
			</path>
		</svg>
		<svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
			<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
			</path>
		</svg>
		<svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
			<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
			</path>
		</svg>
		<svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
			<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
			</path>
		</svg>
	</div>
    
	<p class="text-medium mb-3 text-gray-700">
		<?php echo get_the_excerpt(); ?>
	</p>

	<?php

	// Get categories and tags.
	$get_categories = get_the_terms( get_the_ID(), 'tool_category');
	$out = array();

	// Check if we have them and fill the array.
	if ( ! empty( $get_categories ) ) {
		$out[] = '<div class="pt-2 pb-2">';
		foreach ( $get_categories as $term ) {
			$out[] = sprintf( '<a class="px-4 py-2 mr-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-full" href="%1$s">%2$s</a>',
				esc_url( get_term_link( $term->slug, 'tool_category' ) ),
				esc_html( $term->name )
			);
		}
		$out[] = "\n</div>\n";
	}

	echo implode( '', $out );
	
	
	?>

	</header>

		<footer class="w-full gap-0 px-6 py-4">	
		<a href="<?php the_permalink(); ?>" class="mt-4 text-center block px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium rounded-md w-full">
			View Details
		</a>
		</footer>
	</div>
</article>