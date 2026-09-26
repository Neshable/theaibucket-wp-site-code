<?php
// Generate a consistent gradient colour based on the post title.
$title     = get_the_title();
$hue       = abs( crc32( $title ) ) % 360;
$gradient  = 'hsl(' . $hue . ',60%,50%)';
$gradient2 = 'hsl(' . ( ( $hue + 40 ) % 360 ) . ',70%,40%)';
$initial   = strtoupper( mb_substr( $title, 0, 1 ) );
?>
<div id="post-<?php the_ID(); ?>" class="w-full bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200 dark:bg-gray-800 dark:border-gray-700 flex flex-col overflow-hidden">

	<?php if ( has_post_thumbnail() ) : ?>
	<a href="<?php the_permalink(); ?>" class="block overflow-hidden" tabindex="-1">
		<img
			class="w-full h-44 object-cover hover:scale-105 transition-transform duration-300"
			src="<?php echo esc_url( get_the_post_thumbnail_url( $post, 'medium' ) ); ?>"
			alt="<?php echo esc_attr( $title ); ?>"
			loading="lazy"
		/>
	</a>
	<?php else : ?>
	<a href="<?php the_permalink(); ?>" class="block" tabindex="-1">
		<div class="w-full h-44 flex items-center justify-center" style="background: linear-gradient(135deg, <?php echo esc_attr( $gradient ); ?>, <?php echo esc_attr( $gradient2 ); ?>);">
			<span class="text-white font-extrabold" style="font-size:4rem;line-height:1;opacity:.85;"><?php echo esc_html( $initial ); ?></span>
		</div>
	</a>
	<?php endif; ?>

	<div class="px-5 pt-4 pb-5 flex flex-col flex-1">
		<div class="flex-1">
			<a href="<?php the_permalink(); ?>">
				<h5 class="text-base font-semibold tracking-tight text-gray-900 dark:text-white hover:text-indigo-600 transition-colors line-clamp-1"><?php the_title(); ?></h5>
			</a>
			<p class="text-sm mt-2 text-gray-500 dark:text-gray-400 line-clamp-3 leading-relaxed">
				<?php echo wp_strip_all_tags( get_the_excerpt() ); ?>
			</p>

			<?php
			$get_categories = get_the_terms( get_the_ID(), 'tool_category' );
			if ( ! empty( $get_categories ) && ! is_wp_error( $get_categories ) ) :
				$visible_terms = array_slice( $get_categories, 0, 2 );
				?>
			<div class="mt-3 flex flex-wrap gap-1.5">
				<?php foreach ( $visible_terms as $term ) : ?>
				<a
					href="<?php echo esc_url( get_term_link( $term->slug, 'tool_category' ) ); ?>"
					class="px-2 py-0.5 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 text-xs font-medium rounded-full transition-colors"
				><?php echo esc_html( $term->name ); ?></a>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>

		<div class="flex items-center justify-between mt-4 pt-3 border-t border-gray-100 dark:border-gray-700">
			<span class="flex items-center gap-1.5 text-xs text-gray-400">
				<span class="w-2 h-2 bg-green-500 rounded-full inline-block"></span>
				Active
			</span>
			<a
				href="<?php the_permalink(); ?>"
				class="text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-xs px-4 py-2 transition-colors"
			>View Details</a>
		</div>
	</div>
</div>
