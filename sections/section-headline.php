<?php

/**
 *
 * Section Headline
 *
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

?>

<div id="headline" class="section section-medium">
	<div class="inner-section">
		<div class="container">
			<div class="wrapper">
				<?php
				$num      = 0;
				$headline = bb_query(7, true);
				if ($headline->have_posts()) {
					while ($headline->have_posts()) {
						++$num;
						$headline->the_post();
						$the_post_id = get_the_ID();
						if (1 === $num || 2 === $num || 5 === $num) {
							$post_title = bb_post_title($the_post_id, 500);
						} else {
							$post_title = bb_post_title($the_post_id, 60);
						}
				?>
						<div class="item hover-scale el-<?php echo esc_html($num); ?>">
							<div class="top">
								<span class="icon"><?php echo wp_kses(bb_post_type_icon($the_post_id), bb_allowed()); ?></span>
								<a class="link" href="<?php echo esc_html(get_the_permalink($the_post_id)); ?>" title="<?php echo esc_attr(get_the_title()); ?>">
									<?php echo wp_kses(bb_post_thumbnail($the_post_id, 'full', true, 'fim'), bb_allowed()); ?>
								</a>
							</div>
							<div class="bot">
								<h3>
									<a class="link" href="<?php echo esc_html(get_the_permalink($the_post_id)); ?>" title="<?php echo esc_attr(get_the_title()); ?>"><?php echo esc_html($post_title); ?></a>
								</h3>
								<span class="excerpt">
									<?php
									if (1 === $num) {
										echo esc_html(bb_post_excerpt($the_post_id, 160));
									}
									?>
								</span>
								<ul class="meta list-no-style">
									<li class="date">
										<?php echo esc_html(bb_post_published_date($the_post_id)); ?>
									</li>
									<li class="author">
										Written by:
										<?php
										echo wp_kses(
											bb_post_author($the_post_id, true),
											array(
												'a' => array(
													'href'  => array(),
													'title' => array(),
												),
											)
										);
										?>

									</li>
								</ul>
								<?php echo bb_post_comment_icon($the_post_id); ?>
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