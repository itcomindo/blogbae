<?php

/**
 *
 * Content more post
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

if (is_single()) {
    $post_id = get_the_ID();

    if ($post_id) {
        $args = array(
            'post__not_in' => array($post_id),
            'posts_per_page' => 3,
            'ignore_sticky_posts' => 1
        );

        $more_post = new WP_Query($args);

        if ($more_post->have_posts()) {
?>
            <section id="more" class="section section-medium">
                <div class="inner-section">
                    <div class="container">
                        <div class="wrapper">
                            <div class="top">
                                <h2 class="head-small">More</h2>
                            </div>
                            <div id="more-item-wr">
                                <?php
                                while ($more_post->have_posts()) {
                                    $more_post->the_post();
                                    $post_id = get_the_ID();
                                ?>
                                    <div class="item">
                                        <!-- Left -->
                                        <div class="left">
                                            <span class="date"><?php echo bb_post_published_date($post_id); ?></span>
                                        </div>

                                        <!-- Right -->
                                        <div class="right">

                                            <!-- Mid -->
                                            <div class="left-col">
                                                <h3 class="head-small"><a href="<?php echo esc_html(get_the_permalink($post_id)); ?>" title="<?php echo esc_attr(get_the_title($post_id)); ?>"><?php echo get_the_title($post_id); ?></a></h3>
                                                <span class="excerpt"><?php echo bb_post_excerpt($post_id, 100); ?></span>
                                            </div>

                                            <!-- Right -->
                                            <div class="right-col">
                                                <?php echo bb_post_thumbnail($post_id, 'full', true, 'fim'); ?>
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
            </section>
    <?php
    }
}
