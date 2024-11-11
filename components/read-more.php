<?php

/**
 *
 * Read More
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

/**
 * Retrieves the read more link for a post.
 *
 * @param int $post_id The ID of the post.
 * @return string The read more link.
 */
function bb_read_more($post_id)
{
    $read_more = sprintf(
        '<a href="%s" class="read-more">%s</a>',
        get_permalink($post_id),
        'Read More'
    );
    return $read_more;
}
