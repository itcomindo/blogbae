<?php

/**
 *
 * Section Headline
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

?>

<div id="headline" class="section section-medium">
    <div class="inner-section">
        <div class="container">
            <div class="wrapper">
                <?php
                $num = 0;
                $headline = bb_query(7, true);
                if ($headline->have_posts()) {
                    while ($headline->have_posts()) {
                        $num++;
                        $headline->the_post();
                        $post_id = get_the_ID();
                        if (1 === $num || 2 === $num || 5 === $num) {
                            $post_title = bb_post_title($post_id, 500);
                        } else {
                            $post_title = bb_post_title($post_id, 60);
                        }
                ?>
                        <div class="item hover-scale el-<?php echo esc_html($num); ?>">
                            <div class="top">
                                <a class="link" href="<?php echo get_the_permalink($post_id); ?>" title="<?php echo esc_attr(get_the_title()); ?>">
                                    <?php echo bb_post_thumbnail($post_id, 'full', false, 'fim'); ?>
                                </a>
                            </div>
                            <div class="bot">
                                <h3>
                                    <a class="link" href="<?php echo get_the_permalink($post_id); ?>" title="<?php echo esc_attr(get_the_title()); ?>"><?php echo $post_title; ?></a>
                                </h3>
                                <span class="excerpt">
                                    <?php
                                    if (1 === $num) {
                                        echo bb_post_excerpt($post_id, 160);
                                    }
                                    ?>
                                </span>
                                <div class="meta">
                                    <small class="date"><?php echo bb_post_published_date($post_id); ?></small>
                                    <small class="author"><?php echo bb_post_author($post_id); ?></small>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</div>