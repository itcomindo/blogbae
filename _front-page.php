<?php

/**
 *
 * Front Page
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

get_header();

get_template_part('sections/section', 'front-page-hero');
get_template_part('sections/section', 'headline');
get_template_part('sections/section', 'sticky-post');

get_footer();