<?php
/**
 *
 * Post Published Date
 *
 * @package bb
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 * Retrieves the published date of a post in a specified format.
 *
 * @param int $the_post_id The ID of the post.
 * @return string The formatted date when the post was published.
 */
function bb_post_published_date( $the_post_id ) {
	$date = get_the_date( 'F j, Y', $the_post_id );
	return $date;
}
