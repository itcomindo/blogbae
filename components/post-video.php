<?php
/**
 *
 * Post Video Component
 *
 * @package mm
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );


/**
 * Retrieves the title for a given video.
 *
 * This function checks if a custom title is provided for the video. If a custom title
 * is available, it returns that title. Otherwise, it returns an empty string.
 *
 * @param array $video An associative array containing video details.
 *   - 'bb_post_video_title' (string): The custom title for the video.
 *
 * @return string The title of the video.
 */
function bb_post_video_title( $video ) {
	$video_title = $video['bb_post_video_title'];
	if ( $video_title ) {
		return $video_title;
	} else {
		return '';
	}
}


/**
 * Retrieves the URL for a given video.
 *
 * This function checks if a custom URL is provided for the video. If a custom URL
 * is available, it returns that URL. Otherwise, it returns an empty string.
 *
 * @param array $video An associative array containing video details.
 *   - 'bb_post_video_url' (string): The custom URL for the video.
 *
 * @return string The URL of the video.
 */
function bb_post_video_url( $video ) {
	$video_url = $video['bb_post_video_url'];
	if ( $video_url ) {
		return $video_url;
	} else {
		return '';
	}
}

/**
 * Retrieves the thumbnail for a given video.
 *
 * This function checks if a custom thumbnail is provided for the video. If a custom thumbnail
 * is available, it returns that thumbnail. Otherwise, it generates a YouTube thumbnail URL
 * based on the provided video ID.
 *
 * @param array $video An associative array containing video details.
 *   - 'bb_post_video_thumbnail' (string): The custom thumbnail URL for the video.
 *   - 'bb_post_video_url' (string): The YouTube video ID.
 *
 * @return string The URL of the video thumbnail.
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
