<?php
/**
 *
 * Video Player
 *
 * @package bb
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

if ( is_single() ) {
	$the_post_id   = get_the_ID();
	$the_post_type = carbon_get_post_meta( $the_post_id, 'bb_post_type' );

	if ( 'video' === $the_post_type ) {
		$bb_post_video = carbon_get_post_meta( $the_post_id, 'bb_post_video' );

		if ( $bb_post_video ) {
			?>
			<div class="video-wr">
				<div class="video-player">
				<iframe width="768" height="432" src="#" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				</div>
				<div class="video-item-wr">
					<?php
					foreach ( $bb_post_video as $video ) {
						$video_title     = $video['bb_post_video_title'];
						$video_url       = $video['bb_post_video_url'];
						$video_thumbnail = $video['bb_post_video_thumbnail'];
						?>
						<div class="video" data-videoid="<?php echo esc_html( bb_post_video_url( $video ) ); ?>">
							<img class="find-this" src="<?php echo esc_html( bb_post_video_thumbnail( $video ) ); ?>" alt="<?php echo esc_html( bb_post_video_title( $video ) ); ?>">
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
