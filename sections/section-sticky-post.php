<?php

/**
 *
 * Section Sticky Post
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

/**
 * Retrieve and query sticky posts.
 *
 * This function fetches the sticky posts from the WordPress options and limits them to the first 10 posts.
 * It then creates a WP_Query object to retrieve these posts, ordered by date in descending order.
 *
 * @return WP_Query|null Returns a WP_Query object containing the sticky posts, or null if there are no sticky posts.
 */
function bb_sticky_posts()
{
    $sticky_posts = get_option('sticky_posts');
    if (empty($sticky_posts)) {
        return null; // Tidak ada sticky posts
    }

    // Batasi sticky posts hingga 5 post pertama
    $sticky_posts = array_slice($sticky_posts, 0, 10);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 10,
        'orderby' => 'date',
        'order' => 'DESC',
        'post__in' => $sticky_posts,
        'ignore_sticky_posts' => 1, // Mengabaikan sticky agar tidak diambil 2 kali
    );

    $query = new WP_Query($args);
    return $query;
}

?>

<div id="sticky" class="section section-medium">
    <div class="inner-section">
        <div class="container">
            <div class="wrapper sticky-wr">
                <?php
                $sticky_posts = bb_sticky_posts();
                if ($sticky_posts->have_posts()) {
                    while ($sticky_posts->have_posts()) {
                        $sticky_posts->the_post();
                        $post_id = get_the_ID();
                ?>
                        <div class="item hover-scale">
                            <!-- top -->
                            <div class="top">
                                <a href="<?php echo esc_html(get_the_permalink()); ?>" title="<?php echo esc_attr(get_the_title()); ?>"><?php echo bb_post_thumbnail($post_id, 'full', true, 'fim'); ?></a>
                            </div>

                            <!-- bottom -->
                            <div class="bot">
                                <h3 class="head-smaller"><a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo bb_post_title($post_id, 100); ?></a></h3>
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