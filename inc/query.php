<?php
/**
 *
 * Query
 *
 * @package bb
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );


/**
 * Custom query function for WordPress.
 *
 * This function generates a custom WP_Query based on the context of the page.
 *
 * @param int  $post_perpage   Number of posts to display per page. Default is 6.
 * @param bool $ignore_sticky  Whether to ignore sticky posts. Default is true.
 *
 * @return WP_Query  The custom query object.
 */
function bb_query( $post_perpage = 6, $ignore_sticky = true ) {
	if ( is_front_page() ) {
		$args = array(
			'post_type'           => 'post',
			'posts_per_page'      => $post_perpage,
			'orderby'             => 'date',
			'order'               => 'DESC',
			'ignore_sticky_posts' => $ignore_sticky,
		);
	} elseif ( is_category() ) {
		$args = array(
			'post_type'           => 'post',
			'posts_per_page'      => $post_perpage,
			'orderby'             => 'date',
			'order'               => 'DESC',
			'ignore_sticky_posts' => $ignore_sticky,
			'category_name'       => get_query_var( 'category_name' ),
		);
	} elseif ( is_tag() ) {
		$args = array(
			'post_type'           => 'post',
			'posts_per_page'      => $post_perpage,
			'orderby'             => 'date',
			'order'               => 'DESC',
			'ignore_sticky_posts' => $ignore_sticky,
			'tag'                 => get_query_var( 'tag' ),
		);
	} elseif ( is_search() ) {
		$args = array(
			'post_type'           => 'post',
			'posts_per_page'      => $post_perpage,
			'orderby'             => 'date',
			'order'               => 'DESC',
			'ignore_sticky_posts' => $ignore_sticky,
			's'                   => get_query_var( 's' ),
		);
	} elseif ( is_author() ) {
		$args = array(
			'post_type'           => 'post',
			'posts_per_page'      => $post_perpage,
			'orderby'             => 'date',
			'order'               => 'DESC',
			'ignore_sticky_posts' => $ignore_sticky,
			'author'              => get_query_var( 'author' ),
		);
	}

	$query = new WP_Query( $args );
	return $query;
}



/**
 * Custom query function for the REST API.
 *
 * This function generates a custom WP_Query for the REST API.
 *
 * @param int $post_to_exclude  Number of posts to exclude from the query. Default is 7.
 * @param int $post_perpage     Number of posts to display per page. Default is 6.
 *
 * @return WP_Query  The custom query object.
 */
function bb_rest_post_query( $post_to_exclude = 7, $post_perpage = 6 ) {
	$exclude_args  = array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => $post_to_exclude,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'fields'         => 'ids',
	);
	$exclude_query = new WP_Query( $exclude_args );
	$exclude_ids   = $exclude_query->posts;
	$args          = array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => $post_perpage,
		'orderby'             => 'date',
		'order'               => 'DESC',
		'ignore_sticky_posts' => 1,
		'paged'               => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
		'post__not_in'        => $exclude_ids,
	);
	$query         = new WP_Query( $args );
	return $query;
}
