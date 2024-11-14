<?php

/**
 *
 * Section Rest Latest Post
 *
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

?>
<section id="rlp" class="section-medium">
	<div class="inner-section">
		<div class="container">
			<div class="wrapper">
				<div id="wrapper-left" class="col">
					<div class="top">
						<h2>Latest Posts</h2>
					</div>
					<?php

					$post_to_show = carbon_get_theme_option('bb_rest_latest_post_number');

					$query = bb_rest_post_query(7, $post_to_show);
					$count = 0;
					if ($query->have_posts()) {
					?>

						<div class="items infinite">
						<?php
						while ($query->have_posts()) {
							$count++;
							$query->the_post();
							$the_post_id = get_the_ID();
							get_template_part('template-parts/content', 'rest-latest-post');
						}
					}
					wp_reset_postdata();
						?>
						</div>

						<div id="prev-next-btn">
							<div class="prev"><?php previous_posts_link('Previous'); ?></div>
							<div class="next"><?php next_posts_link('Next', $rest->max_num_pages); ?></div>
						</div>


				</div>
				<div id="wrapper-right" class="col">
					<div class="sidebars inner-col">

						<div class="sidebar-content">
							<h3>Siderbar H3</h3>
							<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio impedit cupiditate quaerat harum! Nulla, unde.</span>
						</div>

						<?php
						$pwc = bb_post_has_comments_query();
						if ($pwc->have_posts()) {
							$the_post_id = get_the_ID();
							$post_date = get_the_date('Y-m-d', $the_post_id);
							echo '<div class="sidebar-content">';
							echo '<h3>Viral</h3>';
							echo '<ul class="items list-no-style">';
							while ($pwc->have_posts()) {
								$pwc->the_post();
								$the_post_id = get_the_ID();
						?>
								<li class="item">
									<div class="left">
										<?php echo bb_post_comment_icon($the_post_id); ?>
										<a href="<?php echo esc_html(get_the_permalink()); ?>" title="<?php echo esc_attr(get_the_title()); ?>"><?php echo bb_post_thumbnail($the_post_id, 'full', true, 'fim'); ?></a>
									</div>
									<div class="right">
										<h3><a href="<?php echo esc_html(get_the_permalink()); ?>" title="<?php echo esc_attr(get_the_title()); ?>"><?php echo bb_post_title($the_post_id, 70); ?></a></h3>
									</div>
								</li>
						<?php
							}
							echo '</ul>';
							echo '</div>';
						}
						wp_reset_postdata();
						?>




						<div class="sidebar-content">
							<a href="#"><img src="<?php echo THEME_URI . '/assets/images/fpherobg.webp'; ?>" alt="TEST"></a>
						</div>


					</div>
				</div>



				<!-- Wrapper End Above This Line -->
			</div>
		</div>
	</div>
</section>