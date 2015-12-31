<?php

/**
 * Adds additional classes to the body tag
 *
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 *
 *
 */

// Add browser to body tag 
	function organizedthemes_browser_body_class($classes) {
	
	    global $is_gecko, $is_IE, $is_opera, $is_safari, $is_chrome;
	
	    if($is_gecko)      $classes[] = 'gecko';
	    elseif($is_opera)  $classes[] = 'opera';
	    elseif($is_safari) $classes[] = 'safari';
	    elseif($is_chrome) $classes[] = 'chrome';
	    elseif($is_IE)     $classes[] = 'ie';
	    else               $classes[] = 'unknown';
	
	    return $classes;
	
	}
	add_filter('body_class','organizedthemes_browser_body_class');

// Add category name to single posts
	function organizedthemes_category_single($classes) {
	
		if ( is_single() ) {
			global $post;
			foreach((get_the_category($post->ID)) as $category) {
				$classes[] = $category->category_nicename;
			}
		}
		
		return $classes;
		
	}
	add_filter('body_class','organizedthemes_category_single');


// Default page layout
	function organizedthemes_default_layout($classes) {
		
		global $post;
		
		// add layou to classes
		if ( ( is_single() || is_page() ) && get_post_meta($post->ID, "page_layout", $single = true) != "default" ) {
			
			$classes[] = get_post_meta($post->ID, "page_layout", TRUE);
			
		} else {
		
			$classes[] = of_get_option('default_layout','');
		
		}
		
		// return the $classes array
		return $classes;
	}
	add_filter('body_class','organizedthemes_default_layout');

// Add format to Body tag
	function organizedthemes_format_class($classes) {
		
		global $post;
		
		// add format to classes
		if ( ( is_single() || is_page() ) && ( has_post_format( 'image' ) || has_post_format( 'video' ) || has_post_format( 'gallery' ) ) ) {
			
			$classes[] = get_post_format();
			
		} else if ( is_single() || is_page() ) {
		
			$classes[] = 'standard';
		
		}
		
		// return the $classes array
		return $classes;
	}
	add_filter('body_class','organizedthemes_format_class');
