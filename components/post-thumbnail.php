<?php

/**
 *
 * Post Thumbnail
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

/**
 * Retrieves the thumbnail of a post.
 *
 * @param int $post_id The ID of the post.
 * @return string The thumbnail of the post.
 */
function bb_post_thumbnail($post_id, $size = 'full', $lazy = false, $thumb_class = 'fim')
{
    if (has_post_thumbnail($post_id)) {
        // Menggabungkan atribut dalam satu array
        $thumbnail = get_the_post_thumbnail($post_id, $size, array(
            'class' => $thumb_class,
            'alt' => get_the_title($post_id),
            'title' => get_the_title($post_id),
        ));

        if ($lazy) {
            // Mengubah src menjadi data-src untuk lazy loading
            $thumbnail = str_replace('src=', 'data-src=', $thumbnail);
            // Tambahkan kelas lazy-load jika diperlukan
            $thumbnail = str_replace('class="', 'class="lazy-load ', $thumbnail);
        }

        return $thumbnail;
    } else {
        // Mengembalikan tag <img> untuk placeholder, bukan hanya URL
        return sprintf(
            '<img src="%s" class="%s" alt="No Image Available" />',
            esc_url(THEME_URI . '/assets/images/placeholder.webp'),
            esc_attr($thumb_class)
        );
    }
}
