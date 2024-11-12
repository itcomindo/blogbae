<?php
/**
 *
 * Plugins
 *
 * @package bb
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

// Disable Gutenberg.
add_filter( 'use_block_editor_for_post', '__return_false' );
