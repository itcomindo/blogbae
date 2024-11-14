<?php

/**
 *
 * Option: Blog Latest Post Index
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Fungsi untuk Tab General
function bb_option_general()
{
    return [
        Field::make('text', 'xixixixi', 'label')
    ];
}

// Fungsi untuk Tab Blog
function bb_option_blog()
{
    return array(
        // seperator for rest latest post options.
        Field::make('separator', 'sepbloginde', 'Rest Lastest Post Options')
            ->set_classes('sep'),

        // number post to show.
        Field::make('text', 'bb_rest_latest_post_number', 'Number of Posts to Show')
            ->set_default_value('5')
            ->set_attribute('type', 'number')
            ->set_help_text('Enter the number of posts to show on the blog index page.'),
    );
}
