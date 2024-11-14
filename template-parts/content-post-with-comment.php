<?php

/**
 *
 * Content Post With Comment
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

$the_post_id = get_the_ID();

?>
<ul class="items list-no-style xxx">
    <li class="item">
        <div class="left">
            <a href="<?php echo esc_html(get_the_permalink($the_post_id)); ?>" title="<?php echo esc_attr(get_the_title($the_post_id)); ?>"><?php echo bb_post_thumbnail($the_post_id, 'full', true, 'fim'); ?></a>
        </div>
        <div class="right">
            <h3>
                <a href="<?php echo esc_html(get_the_permalink($the_post_id)); ?>" title="<?php echo esc_attr(get_the_title($the_post_id)); ?>"><?php echo bb_post_title($the_post_id, 70); ?></a>
            </h3>
        </div>
    </li>
</ul>