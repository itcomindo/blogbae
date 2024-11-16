<?php

/**
 *
 * Section Footer
 *
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

?>
<footer id="footer" class="section section-medium">
    <div class="inner-section">
        <div class="container">
            <div class="wrapper">
                <div class="top">
                    <form id="searchform" method="get" action="<?php echo esc_url(home_url('/')); ?>" aria-label="Search form">
                        <label for="search-field">Search</label>
                        <input type="text" id="search-field" class="search-field" name="s" placeholder="Search" value="<?php echo get_search_query(); ?>">
                        <button type="submit" aria-label="Search">
                            <i class="fas fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
                <div class="bot">
                    <div class="inner">
                        <div id="left" class="col">
                            <div class="top">
                                <h3 class="head-small">Footer Head</h3>
                            </div>
                            <div class="content">
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut, ullam?</p>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut, ullam?</p>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut, ullam?</p>
                            </div>
                        </div>

                        <div id="mid" class="col">
                            <div class="top">
                                <h3 class="head-small">Footer Head</h3>
                            </div>
                            <div class="content">
                                <ul class="list-no-style">
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Main Site</a></li>
                                    <li><a href="#">Portfolio</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                        <div id="right" class="col">
                            <div class="top">
                                <h3 class="head-small">Footer Head</h3>
                            </div>
                            <div class="content">
                                <ul class="list-no-style">
                                    <li><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing</a></li>
                                    <li><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing.</a></li>
                                    <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
                                    <li><a href="#">Lorem ipsum dolor sit.</a></li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php
