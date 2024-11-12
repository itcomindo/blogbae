<?php

/**
 *
 * Content Single Template
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

if (is_single()) {
    $post_id = get_the_ID();
}

?>

<section id="sing" class="section section-small">
    <div class="inner-section">
        <div class="container">
            <div class="wrapper">
                <div class="meta row">
                    <small class="date"><?php echo bb_post_published_date($post_id); ?></small>
                    <h1 id="post-title"><?php echo bb_post_title($post_id, 200); ?></h1>
                    <small class="author">Writen by: <?php echo bb_post_author($post_id, true); ?></small>
                    <?php echo bb_post_category($post_id, true); ?>
                </div>
                <div class="fim-wr">
                    <?php echo bb_post_thumbnail($post_id, 'full', false, 'fim'); ?>
                </div>
                <div id="the-content" class="row">
                    <?php
                    the_content();
                    ?>
                </div>
                <div id="related-post" class="row">
                    <h2 class="head-small">Related Post</h2>
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