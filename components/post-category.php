<?php
/**
 *
 * Post Category
 *
 * @package bb
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );


/**
 * Generates a list of categories for a given post.
 *
 * @param int  $post_id The ID of the post.
 * @param bool $link    Optional. Whether to link the category names. Default true.
 *
 * @return string HTML output of the category list.
 */
function bb_post_category( $post_id, $link = true ) {
	$categories = get_the_category( $post_id );
	$output     = '';

	if ( $categories ) {
		$output .= '<ul class="list-no-style category-list">';

		foreach ( $categories as $category ) {
			$output .= '<li>';

			if ( $link ) {
				$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">';
			}

			$output .= esc_html( $category->name );

			if ( $link ) {
				$output .= '</a>';
			}

			$output .= '</li>';
		}

		$output .= '</ul>';
	}

	return $output;
}
