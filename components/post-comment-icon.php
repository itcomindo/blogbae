<?php

/**
 *
 * Post comment icon
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

/**
 * Display post comment icon
 *
 * @param int $the_post_id Post ID.
 */
function bb_post_comment_icon($the_post_id)
{
    // Cek apakah komentar dibuka untuk post tersebut
    if (comments_open($the_post_id)) {
        $comment_count = get_comments_number($the_post_id);
        if ($comment_count > 0) {
            echo '<span class="post-comment-icon"><i class="fas fa-comment"></i> ' . $comment_count . '</span>';
        } else {
            echo '';
        }
    }
}
