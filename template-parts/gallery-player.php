<?php
/**
 *
 * Gallery Player Template
 *
 * @package bb
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );


if (is_single()) {
    $the_post_id = get_the_ID();
    $the_post_type = carbon_get_post_meta($the_post_id, 'bb_post_type');

    if ('gallery' === $the_post_type) {
        $bb_post_gallery = carbon_get_post_meta($the_post_id, 'bb_post_gallery');
        if ($bb_post_gallery) {
            ?>
            <div class="gallery-wr">
            <div class="photo-player">
                <img src="#" alt="">
            </div>
            <div class="items">
            <?php
            foreach ($bb_post_gallery as $photo) {
                $photo_url = $photo['bb_post_gallery_url'];
                $photo_title = $photo['bb_post_gallery_title'];
                ?>
                <div class="photo" data-photoid="<?php echo esc_html($photo_url); ?>">
                    <img class="find-this" src="<?php echo esc_html($photo_url); ?>" alt="<?php echo esc_attr($photo_title); ?>">
                </div>
                <?php
            }
            ?>
            </div>
            </div>
            <?php
        }
    }
}