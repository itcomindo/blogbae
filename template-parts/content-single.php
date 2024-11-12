<?php
/**
 *
 * Content Single Template
 *
 * @package bb
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

if ( is_single() ) {
	$the_post_id   = get_the_ID();
	$the_post_type = carbon_get_post_meta( $the_post_id, 'bb_post_type' );
}

?>

<section id="sing" class="section section-small">
	<div class="inner-section">
		<div class="container">
			<div class="wrapper">
				<div class="meta row">
					<small class="date"><?php echo esc_html( bb_post_published_date( $the_post_id ) ); ?></small>
					<h1 id="post-title"><?php echo esc_html( bb_post_title( $the_post_id, 200 ) ); ?></h1>
					<small class="author">Writen by: <?php echo esc_html( bb_post_author( $the_post_id, false ) ); ?></small>
					<?php echo wp_kses( bb_post_category( $the_post_id, true ), bb_allowed() ); ?>
				</div>
				<?php
				if ( 'video' === $the_post_type ) {
					get_template_part( 'template-parts/video-player' );
				} elseif ( 'gallery' === $the_post_type ) {
					return '';
				} else {
					?>
					<div class="fim-wr">
						<?php echo wp_kses( bb_post_thumbnail( $the_post_id, 'full', false, 'fim' ), bb_allowed() ); ?>
					</div>
					<?php
				}
				?>

				<div id="the-content" class="row">
					<?php
					the_content();
					?>
				</div>
				<div id="post-tags-wr">
					<?php
					echo wp_kses( bb_post_tags( $the_post_id ), bb_allowed() );
					?>
				</div>
			</div>
		</div>
	</div>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var content = document.getElementById("the-content");
			var postTitle = document.getElementById("post-title");
			var titleText = postTitle ? postTitle.textContent.trim() : "";

			if (content) {
				var paragraphs = content.getElementsByTagName("p");
				for (var i = paragraphs.length - 1; i >= 0; i--) {
					var p = paragraphs[i];
					var hasOnlyImage = p.children.length === 1 && p.children[0].tagName === "IMG";

					if (hasOnlyImage) {
						var div = document.createElement("div");
						div.className = "content-img";
						div.innerHTML = p.innerHTML;
						p.replaceWith(div);
					} else if (!p.textContent.trim() || p.innerHTML.trim() === "&nbsp;") {
						p.remove();
					}
				}

				// Menambahkan alt dan title jika kosong serta loading="lazy" pada setiap img
				var images = content.getElementsByTagName("img");
				for (var j = 0; j < images.length; j++) {
					var img = images[j];

					// Cek dan tambahkan alt dan title jika kosong
					if (titleText) {
						if (!img.hasAttribute("alt") || img.getAttribute("alt").trim() === "") {
							img.setAttribute("alt", titleText);
						}
						if (!img.hasAttribute("title") || img.getAttribute("title").trim() === "") {
							img.setAttribute("title", titleText);
						}
					}

					// Tambahkan loading="lazy" jika belum ada
					if (!img.hasAttribute("loading")) {
						img.setAttribute("loading", "lazy");
					}
				}
			}
		});
	</script>
</section>

<?php

get_template_part( 'template-parts/content-single-related-post' );
get_template_part( 'template-parts/content-more-post' );
