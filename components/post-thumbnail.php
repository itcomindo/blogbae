<?php

/**
 *
 * Post Thumbnail
 *
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

/**
 * Retrieves the post thumbnail.
 *
 * @param int    $the_post_id    The ID of the post.
 * @param string $size       Optional. The size of the thumbnail. Default 'full'.
 * @param bool   $lazy       Optional. Whether to lazy load the image. Default false.
 * @param string $thumb_class Optional. The class of the thumbnail. Default 'fim'.
 *
 * @return string The post thumbnail.
 */
function bb_post_thumbnail($the_post_id, $size = 'full', $lazy = false, $thumb_class = 'fim')
{
	if (has_post_thumbnail($the_post_id)) {
		$thumbnail = get_the_post_thumbnail(
			$the_post_id,
			$size,
			array(
				'class'  => $thumb_class,
				'alt'    => get_the_title($the_post_id),
				'title'  => get_the_title($the_post_id),
				'loading' => $lazy ? 'lazy' : null, // Tambahkan loading="lazy" hanya jika $lazy true
			)
		);

		return $thumbnail;
	} else {
		return sprintf(
			'<img src="%s" class="%s" alt="No Image Available" %s />',
			esc_url(THEME_URI . '/assets/images/placeholder.webp'),
			esc_attr($thumb_class),
			$lazy ? 'loading="lazy"' : '' // Tambahkan loading="lazy" hanya jika $lazy true
		);
	}
}
