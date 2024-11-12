<?php
/**
 *
 * Post Video Component
 *
 * @package mm
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );



/**
 * Retrieves the title of a video post.
 *
 * @param array $video An associative array containing video details.
 *
 * @return string The title of the video if it exists, otherwise an empty string.
 */
function bb_post_video_thumbnail( $video ) {
	$video_thumbnail = $video['bb_post_video_thumbnail'];
	if ( $video_thumbnail ) {
		return $video_thumbnail;
	} else {
		$video_id        = $video['bb_post_video_url'];
		$video_thumbnail = 'https://img.youtube.com/vi/' . $video_id . '/hqdefault.jpg';
		return $video_thumbnail;
	}
}
