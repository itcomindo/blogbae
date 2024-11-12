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
		$the_post_id   = get_the_ID();
		$the_post_type = carbon_get_post_meta( $the_post_id, 'bb_post_type' );

		if ( 'video' === $the_post_type ) {
			$post_type = 'video';
		} elseif ( 'gallery' === $the_post_type ) {
			$post_type = 'gallery';
		} else {
			$post_type = 'standard';
		}
		return esc_attr( $post_type );
	}
	return '';
}
