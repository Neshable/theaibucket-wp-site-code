<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * Template Name: Home
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aibucket
 */

$button_class = array(
	'cta' => 'w-full
	flex
	items-center
	justify-center
	px-8
	py-3
	border border-transparent
	text-base
	font-medium
	rounded-md
	text-white
	bg-indigo-600
	hover:bg-indigo-700
	md:py-4 md:text-lg md:px-10',
);

// Get 6 random tools.
$random_tools = new WP_Query(
	array(
		'post_type'     => 'tool',
		'post_per_page' => 12,
	)
);

get_header(); ?>

<main class="py-12 px-4 sm:py-20">
	<div class="text-center">
	<h1 class="text-5xl tracking-tight font-extrabold text-gray-900 md:text-6xl">
	<span class="block xl:inline">The </span>
	<span class="block text-indigo-600 xl:inline">Ultimate Bucket</span>
	<span class="block xl:inline"> of AT Tools</span>
	</h1>
	<p class="
				mt-3
				max-w-md
				mx-auto
				text-base text-gray-500
				sm:text-lg
				md:mt-5 md:text-xl md:max-w-3xl
			">
	Stay Ahead of the Game with Our Up-to-date and Comprehensive AI Directory.
	</p>


	<div class="mt-5 max-w-4xl mx-auto sm:flex sm:justify-center md:mt-8">
	<div class="w-full shadow p-5 rounded-lg bg-white">
	<div class="relative">
		<div class="absolute flex items-center ml-2 h-full">
		<svg class="w-4 h-4 fill-current text-primary-gray-dark" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M15.8898 15.0493L11.8588 11.0182C11.7869 10.9463 11.6932 10.9088 11.5932 10.9088H11.2713C12.3431 9.74952 12.9994 8.20272 12.9994 6.49968C12.9994 2.90923 10.0901 0 6.49968 0C2.90923 0 0 2.90923 0 6.49968C0 10.0901 2.90923 12.9994 6.49968 12.9994C8.20272 12.9994 9.74952 12.3431 10.9088 11.2744V11.5932C10.9088 11.6932 10.9495 11.7869 11.0182 11.8588L15.0493 15.8898C15.1961 16.0367 15.4336 16.0367 15.5805 15.8898L15.8898 15.5805C16.0367 15.4336 16.0367 15.1961 15.8898 15.0493ZM6.49968 11.9994C3.45921 11.9994 0.999951 9.54016 0.999951 6.49968C0.999951 3.45921 3.45921 0.999951 6.49968 0.999951C9.54016 0.999951 11.9994 3.45921 11.9994 6.49968C11.9994 9.54016 9.54016 11.9994 6.49968 11.9994Z"></path>
		</svg>
		</div>

		<form role="search" action="/" method="GET">

		<input type="hidden" name="post_type" value="tool">
		<input type="text" name="s" placeholder="Search tool.." class="px-8 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
		
	</div>

		<div class="flex items-center justify-between mt-4">
		<button type="submit" class="px-4 py-2 w-full bg-gray-100 bg-indigo-600 hover:bg-indigo-700 font-medium rounded-md text-white text-sm font-medium rounded-md">
			Search
		</button>
		</div>


		<div>
		<div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">
			<select class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
			<option value="">All Type</option>
			<option value="for-rent">New</option>
			<option value="for-sale">Verified</option>
			</select>

			<?php

			$taxonomies = get_terms(
				array(
					'taxonomy'   => 'tool_category',
					'hide_empty' => false,
				)
			);

			if ( ! empty( $taxonomies ) ) :
				$output  = '<select class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">';
				$output .= '<option value="" selected="selected">Tools Categories</option>';
				foreach ( $taxonomies as $category ) {
					$output .= '<option value="' . esc_attr( $category->term_id ) . '">' . esc_html( $category->name ) . '</option>';
				}
				$output .= '</select>';

				echo $output;
			endif;
			?>
		</div>
		</div>
		

		</form>
	</div>

	</div>
	</div>
  </div>
<section class="container my-8 mx-auto sm:justify-center md:mt-8">
	<p class="
				mt-3
				text-center
				max-w-md
				mx-auto
				text-base text-gray-500
				sm:text-lg
				md:mt-5 md:text-xl md:max-w-3xl
			">
	Latest AI Tools
	</p>
  <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2 lg:grid-cols-3">

	<?php if ( $random_tools->have_posts() ) : ?>
		<?php
		while ( $random_tools->have_posts() ) :

			$random_tools->the_post();
			?>

			<?php get_template_part( 'template-parts/content', 'tool' ); ?>

		<?php endwhile; ?>

	<?php endif; ?>
	
	</div>
	</section>
</main>


<?php
get_footer();
