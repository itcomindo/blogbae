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


function bb_option_sidebar()
{
    return array(
        // seperator for rest latest post options.
        Field::make('separator', 'sepsidebar', 'Sidebar Options')
            ->set_classes('sep'),

        //Checkbox Enable Stciky Sidebar.
        Field::make('checkbox', 'bb_enable_sticky_sidebar', 'Enable Sticky Sidebar')
            ->set_help_text('Check this box to enable sticky sidebar to make it sticky on scroll.')
            ->set_default_value(true),

        //number of post to show on sidebar.
        Field::make('text', 'bb_sidebar_post_number', 'Number of Posts to Show')
            ->set_default_value('5')
            ->set_attribute('type', 'number')
            ->set_help_text('Enter the number of posts to show on the sidebar.'),

        // number comments on post to show as post with higher comments.
        Field::make('text', 'min_comment_to_show', 'Number of Comment to Show')
            ->set_default_value('5')
            ->set_attribute('type', 'number')
            ->set_help_text('Enter the number of posts to show on the blog index page.'),

        //select date range for post with higher comments. e.g. last 7 days, last 14 days, last 30 days.
        Field::make('select', 'post_date_range', 'Date Range')
            ->add_options(array(
                '7' => 'Last 7 Days',
                '14' => 'Last 14 Days',
                '30' => 'Last 30 Days',
                '45' => 'Last 45 Days',
                '60' => 'Last 60 Days',
                '90' => 'Last 90 Days',
                '180' => 'Last 180 Days',
            ))
            ->set_default_value('7')
            ->set_help_text('Select the date range for the post with higher comments.'),



    );
}




function bb_option_single_post()
{
    return array(
        // seperator for single post options.
        Field::make('separator', 'sepsinglepost', 'Single Post')
            ->set_classes('sep'),
        // Complex field for custom text captcha containing text for question and text for answer.
        Field::make('complex', 'bbo_custom_text_captcha', 'Custom Text Captcha')
            ->add_fields(array(
                Field::make('text', 'bbo_captcha_question', 'Captcha question')
                    ->set_help_text('Enter the question for the captcha.'),

                Field::make('text', 'bbo_captcha_answer', 'Captcha answer')
                    ->set_help_text('Enter the answer for the captcha.'),
            ))
    );
}
