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
	<span class="block xl:inline"> of AI Tools</span>
	</h1>
	<p class="
				mt-3
				max-w-md
				mx-auto
				text-base text-gray-500
				sm:text-lg
				md:mt-5 md:text-xl md:max-w-3xl
			">
    Find the best and newest AI tools in our always-growing list.
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
		<button type="submit" class="px-4 py-2 w-full bg-indigo-600 hover:bg-indigo-700 font-medium rounded-md text-white text-sm font-medium rounded-md">
			Search
		</button>
		</div>


		<div>
		
		<!-- <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">
			<select class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
			<option value="">All Type</option>
			<option value="for-rent">New</option>
			<option value="for-sale">Verified</option>
			</select>

			<?php

			// $taxonomies = get_terms(
			// 	array(
			// 		'taxonomy'   => 'tool_category',
			// 		'hide_empty' => false,
			// 	)
			// );

			// if ( ! empty( $taxonomies ) ) :
			// 	$output  = '<select class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">';
			// 	$output .= '<option value="" selected="selected">Tools Categories</option>';
			// 	foreach ( $taxonomies as $category ) {
			// 		$output .= '<option value="' . esc_attr( $category->term_id ) . '">' . esc_html( $category->name ) . '</option>';
			// 	}
			// 	$output .= '</select>';

			// 	echo $output;
			// endif;
			?>
		</div> -->

		</div>
		

		</form>
	</div>

	</div>
	</div>
  </div>

<section class="container my-16 sm:my-16 mx-auto sm:justify-center md:mt-8">
	<p class="text-3xl tracking-tight font-bold text-gray-900 md:text-4xl mb-8">
		AI Categories
	</p>
  <div class="grid grid-cols-3 gap-4 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6">

	<?php
	$taxonomies = get_terms(
				array(
					'taxonomy'   => 'tool_category',
					'hide_empty' => false,
					'number' => 40
				)
			);

			if ( ! empty( $taxonomies ) ) : 
				foreach ( $taxonomies as $category ) :
			?>
			<div class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400">
				<div class="min-w-0 flex-1">
				<a href="<?php echo esc_attr( get_term_link( $category->term_id ) ); ?>" class="focus:outline-none">
					<span class="absolute inset-0" aria-hidden="true"></span>
					<p class="text-lg text-center font-medium text-gray-900"><?php echo esc_html( $category->name ); ?></p>
				</a>
				</div>
			</div>

			<?php
				endforeach;
			endif;
			?>



	<!-- More people... -->
	</div>
</section>

<section class="container my-8 mx-auto sm:justify-center md:mt-8">
	<p class="text-3xl tracking-tight font-bold text-gray-900 md:text-4xl">
	Latest AI Tools
	</p>
  <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2 lg:grid-cols-4">

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

<section class="container my-8 mx-auto sm:justify-center md:mt-8">
<div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
	<div class="flex items-center justify-between">
    <div>
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Explore all tools</h5>
    	<p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Browse our complete library of AI tools. We add new tools almost daily.</p>
	</div>
	<a href="/tools" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-indigo-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Browse all
        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </a>
</div>
</section>
</main>


<?php
get_footer();
