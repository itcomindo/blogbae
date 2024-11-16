<?php
/**
 *
 * Category Template
 *
 * @package bb
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

get_header();

?>
<div id="arc" class="section section-medium">
    <div class="inner-section">
        <div class="container">
            <div class="wrapper">
                <?php
                $query = bb_query( 7, true );
                if ($query->have_posts()) {
                    ?>
                    <div class="items">
                        <?php
                    while ($query->have_posts()) {
                        $query->the_post();
                        $the_post_id = get_the_ID();
                        get_template_part('template-parts/content', 'loop');
                    }
                    ?>
                    </div>
                    <?php
                } else {
                    echo '<p>No posts found.</p>';
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</div>
<?php

get_footer();
