<?php
/**
 *
 * Section related post
 *
 * @package bb
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

if ( is_single() ) {
	$the_post_id = get_the_ID();

	if ( $the_post_id ) {
		// create a new query based on the ID of current post to get same post that have the sama tags.
		$post_tags = wp_get_post_tags( $the_post_id );
		// get post tag ids.
		$tag_ids = array();
		foreach ( $post_tags as $individual_tag ) {
			$tag_ids[] = $individual_tag->term_id;
		}

		$args = array(
			'tag__in'             => $tag_ids,
			'post__not_in'        => array( $the_post_id ),
			'posts_per_page'      => 3,
			'ignore_sticky_posts' => 1,
		);

		$related_post = new WP_Query( $args );

		if ( $related_post->have_posts() ) {
			?>
			<div id="rp" class="section section-medium">
				<div class="inner-section">
					<div class="container">
						<div class="wrapper">
							<div class="top">
								<h2 class="head-small">Related Post</h2>
							</div>
							<div id="rp-item-wr">
								<?php
								while ( $related_post->have_posts() ) {
									$related_post->the_post();
									$the_post_id = get_the_ID();
									?>
									<div class="item">
										<h3 class="head-smaller fw-500"><a href="<?php echo esc_html( get_the_permalink( $the_post_id ) ); ?>" title="<?php echo esc_attr( get_the_title( $the_post_id ) ); ?>"><?php echo esc_html( get_the_title( $the_post_id ) ); ?></a></h3>
										<small class="date"><?php echo esc_html( bb_post_published_date( $the_post_id ) ); ?></small>
									</div>
									<?php
								}
		}
							wp_reset_postdata();
	}
}
?>
							</div>

						</div>
					</div>
				</div>
			</div>