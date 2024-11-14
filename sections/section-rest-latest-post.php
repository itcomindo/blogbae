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
					<div class="inner-col">
						<h3>Sidebar</h3>
					</div>
				</div>



				<!-- Wrapper End Above This Line -->
			</div>
		</div>
	</div>
</section>