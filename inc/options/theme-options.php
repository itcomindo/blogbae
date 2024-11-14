<?php

/**
 *
 * Theme Options
 *
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function bb_theme_options()
{
    $option_container = Container::make('theme_options', 'Theme Options')
        // Tab Sidebar.
        ->add_tab('Sidebar', bb_option_sidebar())
        // Tab Blog
        ->add_tab('Blog', bb_option_blog())
        // Tab General
        ->add_tab('General', bb_option_general());
}
add_action('carbon_fields_register_fields', 'bb_theme_options');
