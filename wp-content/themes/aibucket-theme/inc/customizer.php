<?php
/**
 * Webiz Starter Theme Customizer
 *
 * @package aibucket
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aibucket_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'aibucket_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'aibucket_customize_partial_blogdescription',
        ) );

        $wp_customize->add_section( 'footer_options' , array(
            'title'      => __( 'Footer options', 'aibucket' ),
            'priority'   => 30,
        ) );
        
        
    }

    $wp_customize->add_setting( 'footer_logo' );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo', array(
        'label'      => __( 'Footer logo', 'aibucket' ), 
        'section'    => 'footer_options',
        'section'    => 'title_tagline',
        'settings'   => 'footer_logo',
    ) ) );

    
}

add_action( 'customize_register', 'aibucket_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function aibucket_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Allow svg uploads
 *
 * @return void
 */
add_filter( 'upload_mimes', function ( $mimes ) {
    $mimes[ 'svg' ] = 'image/svg+xml';
    return $mimes;
} );

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function aibucket_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aibucket_customize_preview_js() {
    wp_enqueue_script( 'aibucket-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}

add_action( 'customize_preview_init', 'aibucket_customize_preview_js' );


/*Add footer secion in customizer */


