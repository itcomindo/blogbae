<?php

/**
 *
 * Section Header
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

?>

<header id="header" class="section">
    <div class="inner-section h100">
        <div class="container h100">
            <div class="wrapper h100">
                <div class="left">
                    <h2 class="head-small"><a href="/">BlogBae</a></h2>
                </div>
                <div class="right">
                    <div id="header-search-wr" class="item">
                        <form id="searchform" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                            <input type="text" class="search-field" name="s" placeholder="Search" value="<?php echo get_search_query(); ?>">
                            <button><i class="fas fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <div id="header-button-wr" class="item">
                        <a href="#" class="btn medium hover-top">Signin</a>
                        <a href="#" class="btn border medium light hover-top borad-5">Signup</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>