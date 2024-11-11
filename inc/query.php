<?php

/**
 *
 * Query
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');


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

function bb_query($post_perpage = 6, $ignore_sticky = true)
{
    if (is_front_page()) {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $post_perpage,
            'orderby' => 'date',
            'order' => 'DESC',
            'ignore_sticky_posts' => $ignore_sticky
        );
    } elseif (is_category()) {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $post_perpage,
            'orderby' => 'date',
            'order' => 'DESC',
            'ignore_sticky_posts' => $ignore_sticky,
            'category_name' => get_query_var('category_name')
        );
    } elseif (is_tag()) {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $post_perpage,
            'orderby' => 'date',
            'order' => 'DESC',
            'ignore_sticky_posts' => $ignore_sticky,
            'tag' => get_query_var('tag')
        );
    } elseif (is_search()) {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $post_perpage,
            'orderby' => 'date',
            'order' => 'DESC',
            'ignore_sticky_posts' => $ignore_sticky,
            's' => get_query_var('s')
        );
    } elseif (is_author()) {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $post_perpage,
            'orderby' => 'date',
            'order' => 'DESC',
            'ignore_sticky_posts' => $ignore_sticky,
            'author' => get_query_var('author')
        );
    }

    $query = new WP_Query($args);
    return $query;
}
