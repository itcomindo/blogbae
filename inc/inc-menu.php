<?php
/**
 *
 * Includes Menu
 *
 * @package bb
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );



/**
 * Register the theme's navigation menus.
 *
 * This function registers the theme's navigation menus using the `register_nav_menus` function.
 * The theme has three menu locations: 'header-menu', 'footer-menu', and 'sidebar-menu'.
 *
 * @return void
 */
function bb_register_menus() {
	register_nav_menus(
		array(
			'header-menu'  => 'Header Menu',
			'footer-menu'  => 'Footer Menu',
			'sidebar-menu' => 'Sidebar Menu',
		)
	);
}
add_action( 'init', 'bb_register_menus' );



/**
 * Display the header menu.
 *
 * This function uses the `wp_nav_menu` function to display a menu assigned to the 'header-menu' theme location.
 * The menu is wrapped in a <nav> container with an ID of 'header-menu' and a class of 'list-no-style horizontal-menu'.
 *
 * @return void
 */
function bb_header_menu() {
	wp_nav_menu(
		array(
			'theme_location' => 'header-menu',
			'container'      => 'nav',
			'container_id'   => 'header-menu',
			'menu_class'     => 'list-no-style horizontal-menu',
		)
	);
}



/**
 * Displays the footer menu.
 *
 * This function uses the wp_nav_menu() function to display a navigation menu
 * in the footer area. The menu is identified by the 'footer-menu' theme location.
 * The menu is wrapped in a <nav> container with an ID of 'footer-menu' and a class
 * of 'list-no-style vertical-menu'.
 *
 * @return void
 */
function bb_sidebar_menu() {
	wp_nav_menu(
		array(
			'theme_location' => 'sidebar-menu',
			'container'      => 'nav',
			'menu_id'        => 'sidebar-menu',
			'menu_class'     => 'list-no-style vertical-menu',
		)
	);
}
