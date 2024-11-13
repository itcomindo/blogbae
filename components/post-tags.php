<?php
/**
 *
 * Post Tags
 *
 * @package bb
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );


/**
 * Retrieves the tags of a post.
 *
 * @param int $the_post_id The ID of the post.
 * @return string The tags of the post.
 */
function bb_post_tags( $the_post_id ) {
	$tags   = get_the_tags( $the_post_id );
	$output = '';

	if ( $tags ) {
		$output .= '<ul class="list-no-style tag-list">';

		foreach ( $tags as $tag ) {
			$output .= '<li>';
			$output .= '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '">';
			$output .= esc_html( $tag->name );
			$output .= '</a>';
			$output .= '</li>';
		}

		$output .= '</ul>';
	}

	return $output;
}
