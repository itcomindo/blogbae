<?php
/**
 *
 * Content Loop
 *
 * @package bb
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

$the_post_id = get_the_ID();

?>
<div class="item">
	<div class="top">
		<a href="<?php the_permalink( $the_post_id ); ?>" title="<?php echo esc_attr( get_the_title( $the_post_id ) ); ?>"><?php echo bb_post_thumbnail( $the_post_id, 'full', false, 'fim' ); ?></a>
	</div>
	<div class="bot">
		<h3>
			<a href="<?php echo esc_html( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title( $the_post_id ) ); ?>"><?php echo esc_html( bb_post_title( $the_post_id, 150 ) ); ?></a>
		</h3>
	</div>
</div>