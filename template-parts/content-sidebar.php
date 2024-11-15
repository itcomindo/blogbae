<?php

/**
 *
 * Sidebar
 * @package bb
 */
defined('ABSPATH') || die('No script kiddies please!');
?>
<aside class="sidebars inner-col">
    <div class="sidebar-content">
        <h3>Siderbar H3</h3>
        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio impedit cupiditate quaerat harum! Nulla, unde.</span>
    </div>

    <?php
    bb_show_post_has_comments();
    ?>

    <div class="sidebar-content">
        <a href="#"><img src="<?php echo THEME_URI . '/assets/images/fpherobg.webp'; ?>" alt="TEST"></a>
    </div>
</aside>