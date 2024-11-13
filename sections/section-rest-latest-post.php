<?php
/**
 *
 * Section Rest Latest Post
 *
 * @package bb
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

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

					$query = bb_rest_post_query( 7 );
					if ( $query->have_posts() ) {
						?>

						<div class="items-wr">
							<?php
							while ( $query->have_posts() ) {
								$query->the_post();
								$the_post_id = get_the_ID();
								?>
								<div class="item">
									<div class="left">
									<span class="icon"><?php echo wp_kses( bb_post_type_icon( $the_post_id ), bb_allowed() ); ?></span>
										<a href="<?php echo esc_html( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo wp_kses( bb_post_thumbnail( $the_post_id, 'full', true, 'fim' ), bb_allowed() ); ?></a>
									</div>
									<div class="right">

										<small class="date"><?php echo esc_html( bb_post_published_date( $the_post_id ) ); ?></small>
										<h3><a href="<?php echo esc_html( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo esc_html( bb_post_title( $the_post_id, 100 ) ); ?></a></h3>

										<!-- Excerpt -->

										<p class="text-smaller"><?php echo esc_html( bb_post_excerpt( $the_post_id, 50 ) ); ?></p>


									</div>
								</div>
								<?php
							}
					}
						wp_reset_postdata();
					?>
						</div>
				</div>
				<div id="wrapper-right" class="col">
					<div class="inner-col">
						<h3>Sidebar</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>