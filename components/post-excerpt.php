<?php
/**
 *
 * Post Excerpt
 *
 * @package bb
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );


/**
 * Get post excerpt
 *
 * @param int $the_post_id Post ID.
 * @param int $length Excerpt length.
 * @return string
 */
function bb_post_excerpt( $the_post_id, $length = 20 ) {
	$excerpt = get_the_excerpt( $the_post_id );
	$excerpt = wp_strip_all_tags( $excerpt );
	$excerpt = substr( $excerpt, 0, $length );
	$excerpt = substr( $excerpt, 0, strripos( $excerpt, ' ' ) );
	$excerpt = $excerpt . '...';
	return $excerpt;
}
