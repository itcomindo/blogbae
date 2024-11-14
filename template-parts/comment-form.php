<?php
/**
*
* Comment form
* @package bb
*/

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

if (is_single()) {
    if (comments_open() || get_comments_number()) {
        ?>
        <div class="comment-form-wr">
            <?php
            comments_template();
            ?>
        </div>
        <?php
    }
}
