<?php

/**
 *
 * Edit Post
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');


/**
 * Edit Post when user is Administator and logged in.
 */
function bb_edit_post_link($the_post_id)
{
    if (current_user_can('administrator')) {
?>
        <div class="edit-post">
            <a href="<?php echo esc_url(get_edit_post_link($the_post_id)); ?>" title="Edit Post">Edit Post</a>
        </div>
<?php
    }
}
