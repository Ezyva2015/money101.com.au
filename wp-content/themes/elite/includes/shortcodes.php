<?php

/**
 * Adds support for shortcodes used by the theme
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 *
 */

	// PayPal Donate Shortcode
		function elite_paypal_donation_shortcode( $atts ) {
		
		    extract(shortcode_atts(array(
		        'label' => 'Make a donation',
		        'email' => 'Account Email Address',
		        'for' => 'Donation',
		    ), $atts));
		
		    global $post;
		
		    if (!$for) $for = str_replace(" ","+",$post->post_title);
		
		    return '<p><a class="button" href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business='.$email.'&item_name='.$for.'">'.$label.'</a></p>';
		
		}
		
		add_shortcode('donate-paypal', 'elite_paypal_donation_shortcode');
	
	
	// Button Shortcode		
		function elite_button_shortcode( $atts ) {
		
		    extract(shortcode_atts(array(
		        'label' => 'Button',
		        'url' => '#'
		    ), $atts));
		
		    global $post;
		
		    if (!$for) $for = str_replace(" ","+",$post->post_title);
		
		    return '<p><a class="button" href="'.$url.'">'.$label.'</a></p>';
		
		}
		
		add_shortcode('button', 'elite_button_shortcode');
	
	
	
	// Lead Shortcode		
		function elite_lead_shortcode( $atts, $content = null ) {
		   return '<div class="lead">' . $content . '</div>';
		}
		add_shortcode('lead', 'elite_lead_shortcode');



	// Responsive Video Shortcode		
		function elite_responsive_video_shortcode( $atts, $content = null ) {
		   return '<div class="fit-video">' . $content . '</div>';
		}
		add_shortcode('fit', 'elite_responsive_video_shortcode');
	
	
	// Page Header Shortcode
		function elite_page_header_shortcode( $atts, $content = null ) {
		   return '<div class="page-header">' . $content . '</div>';
		}
		add_shortcode('page-header', 'elite_page_header_shortcode');
		
		
	// Animation Group
		function elite_animation_group( $atts, $content = null ) {
			
			wp_enqueue_script('modernizr');
			wp_enqueue_script('classie');
			wp_enqueue_script('scroller');
			
			$content = do_shortcode( $content );
		
			return sprintf( '<div class="cbp-so-section">%s</div>', $content );
		
		}
		
		add_shortcode('animate', 'elite_animation_group');
	
	
	// Animation Left
		function elite_animation_left( $atts, $content = null ) {
		
			$content = do_shortcode( $content );
			
			// Allow other shortcodes inside the column content.
			if ( false !== strpos( $content, '[' ) )
				$content = do_shortcode( shortcode_unautop( $content ) );
		
			return sprintf( '<div class="cbp-so-side cbp-so-side-left">%s</div>', $content );
		
		}
		
		add_shortcode('animate-left', 'elite_animation_left');
		
	
	// Animation Right
		function elite_animation_right( $atts, $content = null ) {
		
			$content = do_shortcode( $content );
			
			// Allow other shortcodes inside the column content.
			if ( false !== strpos( $content, '[' ) )
				$content = do_shortcode( shortcode_unautop( $content ) );
		
			return sprintf( '<div class="cbp-so-side cbp-so-side-right">%s</div>', $content );
		
		}
		
		add_shortcode('animate-right', 'elite_animation_right');
		
	