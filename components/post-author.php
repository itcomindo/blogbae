<?php

/**
 *
 * Post Author
 *
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

/**
 * Post Author
 *
 * @param int  $the_post_id Post ID.
 * @param bool $link    Whether to return a link.
 * @return string
 */
function bb_post_author($the_post_id, $link = false)
{
	$author_id = get_post_field('post_author', $the_post_id);
	$author    = get_the_author_meta('display_name', $author_id);

	if ($link) {
		$author = '<a href="' . esc_url(get_author_posts_url($author_id)) . '" rel="author">' . $author . '</a>';
	} else {
		$author = esc_html($author);
	}
	return $author;
}
