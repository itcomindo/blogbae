<?php

/**
 *
 * Post Excerpt
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

function bb_post_excerpt($post_id, $length = 20)
{
    $excerpt = get_the_excerpt($post_id);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $length);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = $excerpt . '...';
    return $excerpt;
}
