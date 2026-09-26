<?php
/**
 * Template Name: Home
 *
 * Front page: hero, real output example (the page's own content), start-here
 * workflow, recommended tools, latest resources, newsletter invitation and a
 * compact entry to the tools directory. Sections live in template-parts/sections/.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aibucket
 */

get_header();

while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/sections/home', 'hero' );
	get_template_part( 'template-parts/sections/home', 'example' );
	get_template_part( 'template-parts/sections/home', 'start-here' );
	get_template_part( 'template-parts/sections/home', 'tools' );
	get_template_part( 'template-parts/sections/home', 'resources' );
	get_template_part( 'template-parts/sections/home', 'newsletter' );
	get_template_part( 'template-parts/sections/home', 'directory' );

endwhile;

get_footer();
