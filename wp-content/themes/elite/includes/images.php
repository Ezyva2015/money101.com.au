<?php

/**
 * Adds support for custom image sizes
 * and sets them
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 *
 */

// Featured Images
	add_theme_support('post-thumbnails');
		
		add_image_size('single', 960, 640, true);
		
		add_image_size('staff-full', 405, 525, true);
		add_image_size('staff-thumbnail', 360, 480, true);
		
		add_image_size('full-header', 2400, 1200, true);
		
		add_image_size('home-product', 360, 480, true);
		
		add_image_size('home-thumbnail', 380, 230, false);


// Define Theme Content Width
	if ( ! isset( $content_width ) ) $content_width = 590;


// Wrap post videos in responsive div
	if ( ! function_exists( 'organizedthemes_fit_video_wrap' ) ) :
		
		add_filter('embed_oembed_html', 'organizedthemes_fit_video_wrap', 99, 4);
		
		function organizedthemes_fit_video_wrap($html, $url, $attr, $post_id) {
			return '<div class="fit-video">' . $html . '</div>';
		}		
	
	endif; // organizedthemes_fit_video_wrap
