<?php

/**
 *
 * Assets
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

/**
 * Enqueues theme stylesheets and libraries.
 *
 * This function enqueues the following stylesheets:
 * - Font Awesome from a CDN.
 * - Global CSS from the theme's assets directory.
 *
 * @return void
 */
function mm_load_stylesheet_and_libs()
{
    // Load Font-awesome.
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css', array(), null);
    // Load global css.
    wp_enqueue_style('global-css', get_template_directory_uri() . '/assets/css/global.min.css', array(), THEME_VERSION);
}
add_action('wp_enqueue_scripts', 'mm_load_stylesheet_and_libs', 1);

/**
 * Enqueues theme stylesheets and libraries.
 *
 * This function enqueues the following stylesheets:
 * - Font Awesome from a CDN.
 * - Global CSS from the theme's assets directory.
 *
 * @return void
 */
function mm_load_scripts_and_libs()
{
    wp_deregister_script('jquery');

    // register jquery.
    wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), null, true);

    wp_enqueue_script('jquery');

    // Load Boxicons.
    wp_enqueue_script('boxicons', 'https://unpkg.com/boxicons@2.1.4/dist/boxicons.js', array(), null, true);

    //Global js.
    wp_enqueue_script('global-js', get_template_directory_uri() . '/assets/js/global.js', array('jquery'), THEME_VERSION, true);
}
add_action('wp_enqueue_scripts', 'mm_load_scripts_and_libs', 1);


/**
 * Defer
 */

// Tambahkan defer ke semua script yang spesifik
function mm_add_defer_attribute($tag, $handle)
{
    // Daftar handle script yang akan diberi defer
    $scripts_to_defer = array(
        'jquery',
        'boxicons',
        'global-js',
        'flickity',
        'front-page-js',
    );

    // Jika handle sesuai dengan daftar, tambahkan atribut defer
    if (in_array($handle, $scripts_to_defer)) {
        return str_replace('src=', 'defer src=', $tag);
    }

    return $tag;
}
// add_filter('script_loader_tag', 'mm_add_defer_attribute', 10, 2);
