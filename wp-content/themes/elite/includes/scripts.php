<?php

/**
 * This file registers and enqueues our
 * various scripts in the theme
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 *
 */

	// Register Scripts
		function organizedthemes_script_register() {
			if( !is_admin()){
			   wp_register_script('flex', get_template_directory_uri() . '/js/flex.js', array('jquery'), NULL, true );
			   wp_register_script('slick', get_template_directory_uri() . '/js/slicknav.js', array('jquery'), NULL, true );
			   wp_register_script('scroller', get_template_directory_uri() . '/js/cbpScroller.js', array('jquery'), NULL, true );
			   wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr.js', array('jquery'), NULL, false );
			   wp_register_script('classie', get_template_directory_uri() . '/js/classie.js', array('jquery'), NULL, true );
			}
		}
		add_action('init', 'organizedthemes_script_register');
	
	
	// Load other scripts on all pages
		function organizedthemes_load_default_scripts() {
			if( !is_admin() ) {
			   wp_enqueue_script('flex');
			   wp_enqueue_script('slick');
			}
		}
		add_action('wp_enqueue_scripts', 'organizedthemes_load_default_scripts');
	
	
	// Conditionally load mega menu and comment-reply scripts
		function organizedthemes_conditional_script_loading() {
					
			if ( is_singular( array( 'post' ) ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
			
			if ( is_active_sidebar( 'footer_sidebar' ) ) {
				wp_enqueue_script('jquery-masonry');
			}
			
		}
		add_action('wp_enqueue_scripts', 'organizedthemes_conditional_script_loading');
	
	
	// add ie conditional html5 and responsive shims to header
		function organizedthemes_ie_shim () {
			
			    echo '<!--[if lt IE 9]>';
			    echo '<script src="'.get_template_directory_uri().'/js/html5.js"></script>';
			    echo '<script src="'.get_template_directory_uri().'/js/respond.js"></script>';
			    echo '<![endif]-->';
			
		}
		add_action('wp_head', 'organizedthemes_ie_shim');
	
	
	// Load Stylesheet
		function organizedthemes_load_stylesheets() {
		
			wp_enqueue_style( 'main', get_stylesheet_uri(), false, ELITE_VERSION, 'screen' );
			
		}
		
		add_action( 'wp_enqueue_scripts', 'organizedthemes_load_stylesheets' );
		

// Foundation Meta Generator
		
		if ( ! function_exists( 'elite_meta_generator' ) ):
		
			function elite_meta_generator() {
				
			echo '<meta name="generator" content="Elite Theme Version '.ELITE_VERSION.'" />
				
				';
				
			}
	
		endif;
		
		add_action( 'tha_head_bottom', 'elite_meta_generator', 1 );