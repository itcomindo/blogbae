<?php
/**
 *
 * Post Title
 *
 * @package bb
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );


/**
 * Retrieves the title of a post.
 *
 * @param int $post_id The ID of the post.
 * @param int $trim    Optional. The number of characters to trim the title to. Default 100.
 *
 * @return string The title of the post.
 */
function bb_post_title( $post_id, $trim = 100 ) {
	$title = get_the_title( $post_id );

	if ( strlen( $title ) <= $trim ) {
		return $title;
	} else {
		$title = substr( $title, 0, $trim );
		$title = $title . '...';
		return $title;
	}
}
