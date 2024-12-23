<?php
/**
 *
 * Single Template
 *
 * @package bb
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', 'single' );
	}
}


get_footer();
