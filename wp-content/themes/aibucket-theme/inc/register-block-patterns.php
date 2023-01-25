<?php

/**
 * Register the block patterns from here
 * Place a template file in template-parts/block-patterns/endoscopy
 *
 * Call ::init() to register the patterns
 */
Class Webiz_Register_Block_Patterns {

	// Set the default category slug for all patterns
	public static $category = 'webiz';


	public static function init() {
		add_action( 'init', array( get_called_class(), 'register_block_patterns' ) );
	}

	public static function register_block_patterns() {

		// Register the pattern category
		if ( function_exists( 'register_block_pattern_category' ) ) {
			register_block_pattern_category(
				self::$category,
				array( 'label' => __( 'Webiz Theme', 'medflix' ) )
			);
		}

		if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {

			register_block_pattern(
				'endoscopy/landing_page',
				array(
					'title'       => __( 'Landing Page', 'aibucket' ),
					'description' => __( 'Landing Page to use and tweak as needed', 'aibucket' ),
					'categories'  => array( self::$category ),
					'content'     => self::get_template_in_variable( 'template-parts/block-patterns/endoscopy/landing_page_2022' ),
				)
			);

			register_block_pattern(
				'endoscopy/event_page',
				array(
					'title'       => __( 'Event Page Example', 'aibucket' ),
					'description' => __( 'Event Page Example to use and tweak as needed', 'aibucket' ),
					'categories'  => array( self::$category ),
					'content'     => self::get_template_in_variable( 'template-parts/block-patterns/endoscopy/event_page_2022' ),
				)
			);


			register_block_pattern(
				'endoscopy/home_hero',
				array(
					'title'       => __( 'Home Hero', 'aibucket' ),
					'description' => _x( 'Home Hero', 'Home hero', 'aibucket' ),
					'categories'  => array( self::$category ),
					'content'     => self::get_template_in_variable( 'template-parts/block-patterns/endoscopy/home_hero' ),
				)
			);


			register_block_pattern(
				'endoscopy/centered_text_section',
				array(
					'title'       => __( 'Centered Text Section', 'aibucket' ),
					'description' => _x( 'Centered Text Section', 'Centered Text Section', 'aibucket' ),
					'categories'  => array( self::$category ),
					'content'     => self::get_template_in_variable( 'template-parts/block-patterns/endoscopy/centered_text_section' ),
				)
			);


			register_block_pattern(
				'endoscopy/lineseparator',
				array(
					'title'       => __( 'Line Separator', 'aibucket' ),
					'description' => _x( 'Line Separator', 'Line Separator', 'aibucket' ),
					'categories'  => array( self::$category ),
					'content'     => self::get_template_in_variable( 'template-parts/block-patterns/endoscopy/lineseparator' ),
				)
			);


			register_block_pattern(
				'endoscopy/why_join_us',
				array(
					'title'       => __( 'Why Join Us', 'aibucket' ),
					'description' => _x( 'Why Join Us', 'Why Join Us', 'aibucket' ),
					'categories'  => array( self::$category ),
					'content'     => self::get_template_in_variable( 'template-parts/block-patterns/endoscopy/why_join_us' ),
				)
			);


		}

	}

	/**
	 * Get the template part in a variable via buffer
	 * Helper function
	 *
	 * @param $path The path to the template part - 'template-parts/block-patterns/cards-4'
	 */
	public static function get_template_in_variable( $path ) {
		ob_start();
		get_template_part( $path );
		$block_pattern_content = ob_get_contents();
		ob_end_clean();

		return $block_pattern_content;
	}

}

// Webiz_Register_Block_Patterns::init();
