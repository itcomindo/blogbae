<?php
/**
 *
 * Post Type Icon
 *
 * @package bb
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );


/**
 * This function will return the icon based on the post type.
 * why? To show the icon in the post list.
 * how? This function will get the post type from the post meta and return the icon.
 *
 * @param int $the_post_id The post ID.
 * @return string The icon.
 */
function bb_post_type_icon( $the_post_id ) {
	$the_post_type = carbon_get_post_meta( $the_post_id, 'bb_post_type' );
	if ( 'video' === $the_post_type ) {
		$icon = '<i class="fas fa-video"></i>';
	} elseif ( 'gallery' === $the_post_type ) {
		$icon = '<i class="fas fa-images"></i>';
	} else {
		$icon = '<i class="fas fa-file-alt"></i>';
	}

	return $icon;
}
