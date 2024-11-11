<?php

/**
 *
 * Header
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

?>
<!DOCTYPE html>
<html lang="id-ID" class="no-js" itemscope itemtype="https://schema.org/WebPage">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="googlebot" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    get_template_part('parts/part', 'header');
    // get_template_part('parts/part', 'header-menu');
    echo bb_header_menu();
    wp_body_open();
    ?>
    <main>