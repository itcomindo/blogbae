<?php

/**
 *
 * Content Rest Latest Post
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');
$the_post_id = get_the_ID();

?>


<div class="item infinite">
    <div class="left">
        <?php echo bb_post_comment_icon($the_post_id); ?>
        <span class="icon"><?php echo wp_kses(bb_post_type_icon($the_post_id), bb_allowed()); ?></span>
        <a href="<?php echo esc_html(get_the_permalink()); ?>" title="<?php echo esc_attr(get_the_title()); ?>">
            <?php echo wp_kses(bb_post_thumbnail($the_post_id, 'full', true, 'fim'), bb_allowed()); ?>
        </a>
    </div>
    <div class="right">
        <div class="count"><?php echo esc_html($count); ?></div>
        <small class="date"><?php echo esc_html(bb_post_published_date($the_post_id)); ?></small>
        <h3>
            <a href="<?php echo esc_html(get_the_permalink()); ?>" title="<?php echo esc_attr(get_the_title()); ?>">
                <?php echo esc_html(bb_post_title($the_post_id, 100)); ?>
            </a>
        </h3>
        <p class="text-smaller"><?php echo esc_html(bb_post_excerpt($the_post_id, 50)); ?></p>
    </div>
</div>