<?php

/**
 *
 * Functions and definitions
 *
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');


// Define theme path.
define('THEME_PATH', get_template_directory());

// Define theme uri.
define('THEME_URI', get_template_directory_uri());

// Define theme version.
define('THEME_VERSION', wp_get_theme()->get('Version'));



/**
 * Calls the Carbon Fields plugin.
 *
 * This function checks if the Carbon Fields class exists, and if not, it requires the
 * Composer autoload file and boots the Carbon Fields plugin.
 *
 * @return void
 */
function bb_theme_call_carbon_fields()
{
	if (! class_exists('\Carbon_Fields\Carbon_Fields')) {
		require_once 'vendor/autoload.php';
		\Carbon_Fields\Carbon_Fields::boot();
	}
}


/**
 * Checks if the Carbon Fields plugin is loaded and calls the function to load it if not.
 *
 * This function hooks into the 'after_setup_theme' action to ensure that the Carbon Fields
 * plugin is loaded after the theme is set up. If the 'carbon_fields_boot_plugin' function
 * does not exist, it calls the 'kjb_theme_call_carbon_fields' function to load the plugin.
 *
 * @return void
 */
function bb_theme_cf_loaded()
{
	if (! function_exists('carbon_fields_boot_plugin')) {
		bb_theme_call_carbon_fields();
	}
}
add_action('after_setup_theme', 'bb_theme_cf_loaded');





// Add theme support for various features.
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('menus');


// Include necessary files.
require_once THEME_PATH . '/assets/assets.php';
require_once THEME_PATH . '/components/components.php';
require_once THEME_PATH . '/inc/inc.php';


/**
 * Allowed HTML tags and attributes for wp_kses.
 *
 * @return array Allowed HTML tags and attributes.
 */
function bb_allowed()
{
	return array(
		'a'      => array(
			'href'   => array(),
			'title'  => array(),
			'target' => array(),
			'rel'    => array(),
			'class'  => array(),
		),
		'img'    => array(
			'src'      => array(),
			'srcset'   => array(),
			'alt'      => array(),
			'title'    => array(),
			'width'    => array(),
			'height'   => array(),
			'class'    => array(),
			'loading'  => array(),
			'id'       => array(),
			'data-src' => array(),
			'decoding' => array(),
		),
		'svg'    => array(
			'class'   => array(),
			'xmlns'   => array(),
			'viewBox' => array(),
			'fill'    => array(),
			'stroke'  => array(),
		),
		'path'   => array(
			'd'            => array(),
			'fill'         => array(),
			'stroke'       => array(),
			'stroke-width' => array(),
		),
		'g'      => array(), // Group elements in SVG.
		'span'   => array(
			'class' => array(),
			'style' => array(),
		),
		'div'    => array(
			'class'  => array(),
			'style'  => array(),
			'id'     => array(),
			'role'   => array(),
			'data-*' => array(), // Mengizinkan semua atribut data-*.
			'aria-*' => array(), // Mengizinkan semua atribut aria-*.
		),
		'p'      => array(
			'class' => array(),
			'style' => array(),
		),
		'strong' => array(),
		'em'     => array(),
		'br'     => array(),
		'ul'     => array(
			'class' => array(),
		),
		'ol'     => array(
			'class' => array(),
		),
		'li'     => array(
			'class' => array(),
			'a'     => array(
				'href'   => array(),
				'title'  => array(),
				'target' => array(),
				'rel'    => array(),
				'class'  => array(),
			),
		),
		'h1'     => array(
			'class' => array(),
			'id'    => array(),
		),
		'h2'     => array(
			'class' => array(),
			'id'    => array(),
		),
		'h3'     => array(
			'class' => array(),
			'id'    => array(),
		),
		'h4'     => array(
			'class' => array(),
			'id'    => array(),
		),
		'h5'     => array(
			'class' => array(),
			'id'    => array(),
		),
		'h6'     => array(
			'class' => array(),
			'id'    => array(),
		),
		'i'      => array(
			'class' => array(),
		),
	);
}
