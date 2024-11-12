<?php
/**
 *
 * Post options
 *
 * @package bb
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

use Carbon_Fields\Container;
use Carbon_Fields\Field;


/**
 * Register post options.
 */
function bb_post_options() {
	Container::make( 'post_meta', 'Post Options' )
		->where( 'post_type', '=', 'post' )
		->add_fields(
			array(
				// radio fields to select post, regular post, video post, image gallery post.
				Field::make( 'radio', 'bb_post_type', 'Post Type' )
					->set_options(
						array(
							'post'    => 'Regular Post',
							'video'   => 'Video Post',
							'gallery' => 'Gallery Post',
						)
					)
					->set_default_value( 'post' ),

				// complex field contain text field for video url and image field for video thumbnail. show only if video post is selected.
				Field::make( 'complex', 'bb_post_video', 'Video' )
					->add_fields(
						array(
							Field::make( 'text', 'bb_post_video_title', 'Video Title' )
								->set_help_text( 'Enter the video title.' ),
							Field::make( 'text', 'bb_post_video_url', 'Video URL' )
								->set_help_text( 'Enter the video ID from Youtube. e.g if video URL is https://www.youtube.com/watch?v=-bBzIgIaPS4 then just enter -bBzIgIaPS4.' ),
							Field::make( 'image', 'bb_post_video_thumbnail', 'Video Thumbnail' )
								->set_value_type( 'url' )
								->set_help_text( 'Leave it empty to use video thumbnail from Youtube.' ),
						)
					)
					->set_conditional_logic(
						array(
							array(
								'field' => 'bb_post_type',
								'value' => 'video',
							),
						)
					)
					->set_layout( 'tabbed-horizontal' )
					->set_header_template(
						'
                                <% if (bb_post_video_title) { %>
                                    <%- bb_post_video_title %>
                                <% } else { %>
                                    Title
                                <% } %>
                            '
					),

				// complex field contain image field for gallery images. show only if gallery post is selected.
				Field::make( 'complex', 'bb_post_gallery', 'Gallery' )
					->add_fields(
						array(
							Field::make( 'image', 'bb_post_gallery_image', 'Image' )
								->set_value_type( 'url' )
								->set_help_text( 'Upload the image for the gallery.' ),
						)
					)
					->set_conditional_logic(
						array(
							array(
								'field' => 'bb_post_type',
								'value' => 'gallery',
							),
						)
					)
					->set_layout( 'tabbed-horizontal' )
					->set_header_template(
						'
                                <% if (bb_post_gallery_image) { %>
                                    <img src="<%- bb_post_gallery_image %>" style="max-width: 100px; max-height: 100px;">
                                <% } else { %>
                                    Image
                                <% } %>
                            '
					),

			)
		);
}

add_action( 'carbon_fields_register_fields', 'bb_post_options' );
