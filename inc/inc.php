<?php
/**
 *
 * Includes
 *
 * @package mm
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );


require_once THEME_PATH . '/inc/inc-menu.php';
require_once THEME_PATH . '/inc/query.php';
require_once THEME_PATH . '/inc/plugins.php';
require_once THEME_PATH . '/inc/options.php';




/**
 * Retrieves the post type data attribute for a single post.
 *
 * This function checks if the current post is a single post. If it is, it retrieves the post ID
 * and the custom meta field 'bb_post_type' using the Carbon Fields plugin. Depending on the value
 * of 'bb_post_type', it returns a data attribute string indicating the post type.
 *
 * @return string|null The data attribute string for the post type, or null if not a single post.
 */
function bb_post_type_data_attribute() {
	if ( is_single() ) {
		$post_id      = get_the_ID();
		$bb_post_type = carbon_get_post_meta( $post_id, 'bb_post_type' );

		if ( 'video' === $bb_post_type ) {
			$post_type = 'video';
			return 'data-post-type="' . $post_type . '"';
		} elseif ( 'gallery' === $bb_post_type ) {
			$post_type = 'gallery';
			return 'data-post-type="' . $post_type . '"';
		} else {
			$post_type = 'standard';
			return 'data-post-type="' . $post_type . '"';
		}
	}
}
