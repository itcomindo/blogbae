<?php

/**
 *
 * Post Author
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

/**
 * Retrieves the author of a post.
 *
 * @param int $post_id The ID of the post.
 * @return string The author of the post.
 */
function bb_post_author($post_id, $link = false)
{
    $author_id = get_post_field('post_author', $post_id);
    $author = get_the_author_meta('display_name', $author_id);

    if ($link) {
        $author = '<a href="' . esc_url(get_author_posts_url($author_id)) . '">' . $author . '</a>';
    } else {
        $author = esc_html($author);
    }
    return $author;
}
