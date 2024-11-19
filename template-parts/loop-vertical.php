<?php
/**
 *
 * Loop Vertical
 * Description: A Page Template that adds a sidebar to pages
 *
 * @package bb
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

?>

<div class="item">
	<div class="top">
		<a href="<?php echo esc_html( get_the_permalink( $the_post_id ) ); ?>" title="<?php echo esc_html( get_the_title( $the_post_id ) ); ?>">Featured Image</a>
	</div>
	<div class="bot">
		<h3>
			<a href="<?php echo esc_html( get_the_permalink( $the_post_id ) ); ?>" title="<?php echo esc_html( get_the_title( $the_post_id ) ); ?>"><?php echo esc_html( bb_post_title( $the_post_id, 100 ) ); ?></a>
		</h3>
	</div>
</div>