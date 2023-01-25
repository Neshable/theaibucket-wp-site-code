<?php

/*
 * Manual Contact Form 7 Scripts
 */

// Disable contact-form-7 enqueue actions
add_filter('wpcf7_load_js', '__return_false'); // Disable CF7 JavaScript
add_filter('wpcf7_load_css', '__return_false'); // Disable CF7 CSS

remove_action('wp_enqueue_scripts', 'wpcf7_recaptcha_enqueue_scripts', 20);

// Trigger contact-form-7 enqueue actions when form shortcode is executed
add_filter('shortcode_atts_wpcf7', 'contact_form_7_enqueue_scripts');


function contact_form_7_enqueue_scripts($out)
{
    if (function_exists('wpcf7_enqueue_scripts')){
        wpcf7_enqueue_scripts();
    }
    if (function_exists('wpcf7_enqueue_styles')) {
        wpcf7_enqueue_styles();
    }
    if (function_exists('wpcf7_recaptcha_enqueue_scripts')) {
        wpcf7_recaptcha_enqueue_scripts();
    }
    return $out;
}