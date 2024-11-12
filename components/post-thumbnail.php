<?php
/**
 *
 * Post Thumbnail
 *
 * @package bb
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 * Retrieves the post thumbnail.
 *
 * @param int    $post_id    The ID of the post.
 * @param string $size       Optional. The size of the thumbnail. Default 'full'.
 * @param bool   $lazy       Optional. Whether to lazy load the image. Default false.
 * @param string $thumb_class Optional. The class of the thumbnail. Default 'fim'.
 *
 * @return string The post thumbnail.
 */
function bb_post_thumbnail( $post_id, $size = 'full', $lazy = false, $thumb_class = 'fim' ) {
	if ( has_post_thumbnail( $post_id ) ) {
		$thumbnail = get_the_post_thumbnail(
			$post_id,
			$size,
			array(
				'class' => $thumb_class,
				'alt'   => get_the_title( $post_id ),
				'title' => get_the_title( $post_id ),
			)
		);

		if ( $lazy ) {
			$thumbnail = str_replace( 'src=', 'data-src=', $thumbnail );
			$thumbnail = str_replace( 'class="', 'class="lazy-load ', $thumbnail );
		}

		return $thumbnail;
	} else {
		return sprintf(
			'<img src="%s" class="%s" alt="No Image Available" />',
			esc_url( THEME_URI . '/assets/images/placeholder.webp' ),
			esc_attr( $thumb_class )
		);
	}
}
