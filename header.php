<?php

/**
 *
 * Header
 *
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
	<link rel="preload" href="/wp-content/themes/blogbae/assets/fonts/Roboto-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">
	<link rel="preload" href="/wp-content/themes/blogbae/assets/fonts/Roboto-Light.woff2" as="font" type="font/woff2" crossorigin="anonymous">
	<link rel="preload" href="/wp-content/themes/blogbae/assets/fonts/Roboto-Medium.woff2" as="font" type="font/woff2" crossorigin="anonymous">
	<link rel="preload" href="/wp-content/themes/blogbae/assets/fonts/Roboto-Bold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
	<link rel="preload" href="/wp-content/themes/blogbae/assets/fonts/Roboto-Black.woff2" as="font" type="font/woff2" crossorigin="anonymous">
	<link rel="preload" href="/wp-content/themes/blogbae/assets/fonts/Roboto-BlackItalic.woff2" as="font" type="font/woff2" crossorigin="anonymous">
	<link rel="preload" href="/wp-content/themes/blogbae/assets/fonts/Roboto-Italic.woff2" as="font" type="font/woff2" crossorigin="anonymous">

	<?php
	if (is_home() || is_front_page()) {
	?>
		<link rel="preload" href="https://blogbae.budiharyono.id/wp-content/themes/blogbae/assets/images/fpherobg.webp" as="image" type="image/webp">
	<?php
	}
	?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-post-type="<?php echo esc_html(bb_post_type_data_attribute()); ?>">
	<?php
	get_template_part('template-parts/template-part', 'header');
	bb_header_menu();
	wp_body_open();
	?>
	<main>