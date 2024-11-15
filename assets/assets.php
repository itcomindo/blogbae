<?php

/**
 *
 * Assets
 *
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
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css', array(), '6.6.0', null);
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
	wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), '3.7.1', null, true);

	wp_enqueue_script('jquery');

	// Load Boxicons.
	wp_enqueue_script('boxicons', 'https://unpkg.com/boxicons@2.1.4/dist/boxicons.js', array(), '2.1.4', null, true);

	if (is_home()) {
		// call flickity js.
		wp_enqueue_script('flickity', 'https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.pkgd.min.js', array(), '2.2.2', null, true);

		//Call Infinite Scroll.
		wp_enqueue_script('infinite-scroll', 'https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js', array(), '4', null, true);

		// call front page js.
		wp_enqueue_script('front-page-js', get_template_directory_uri() . '/assets/js/front-page.js', array(), THEME_VERSION, true);
	}

	if (is_single()) {

		$the_post_id   = get_the_ID();
		$the_post_type = carbon_get_post_meta($the_post_id, 'bb_post_type');

		if ('video' === $the_post_type) {
			$bb_post_video = carbon_get_post_meta($the_post_id, 'bb_post_video');


			// Count Array in $bb_post_video.
			$video_count = is_array($bb_post_video) ? count($bb_post_video) : 0;


			// If there are more than 3 videos, enqueue Flickity.
			if ($video_count > 2) {

				// Call flickity js.
				wp_enqueue_script('flickity', 'https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.pkgd.min.js', array(), '2.2.2', null, true);

				// Call video.js.
				wp_enqueue_script('video-js', get_template_directory_uri() . '/assets/js/video.js', array(), THEME_VERSION, true);
			}
		} elseif ('gallery' === $the_post_type) {
			$bb_post_gallery = carbon_get_post_meta($the_post_id, 'bb_post_gallery');
			$gallery_count = is_array($bb_post_gallery) ? count($bb_post_gallery) : 0;
			if ($gallery_count > 2) {

				// Call flickity js.
				wp_enqueue_script('flickity', 'https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.pkgd.min.js', array(), '2.2.2', null, true);

				// Call video.js.
				wp_enqueue_script('gallery-js', get_template_directory_uri() . '/assets/js/gallery.js', array(), THEME_VERSION, true);
			}
		}



		// Call single.js.
		wp_enqueue_script('single-js', get_template_directory_uri() . '/assets/js/single.js', array(), THEME_VERSION, true);
	}

	// Global js.
	wp_enqueue_script('find-this-js', get_template_directory_uri() . '/assets/js/find-this.js', array('jquery'), THEME_VERSION, true);


	wp_enqueue_script('global-js', get_template_directory_uri() . '/assets/js/global.js', array('jquery'), THEME_VERSION, true);
}
add_action('wp_enqueue_scripts', 'mm_load_scripts_and_libs', 1);



/**
 * Adds the defer attribute to specific script tags.
 *
 * This function checks if the script handle is in the list of scripts to defer.
 * If it is, it adds the defer attribute to the script tag.
 *
 * @param string $tag The HTML script tag.
 * @param string $handle The script handle.
 * @return string The modified or unmodified script tag.
 */
function mm_add_defer_attribute($tag, $handle)
{
	$scripts_to_defer = array(
		'jquery',
		'boxicons',
		'global-js',
		'flickity',
		'front-page-js',
	);
	if (in_array($handle, $scripts_to_defer, true)) {
		return str_replace('src=', 'defer src=', $tag);
	}

	return $tag;
}

// Uncomment the line below to enable defer attribute for specific scripts.
// add_filter( 'script_loader_tag', 'mm_add_defer_attribute', 10, 2 );.
