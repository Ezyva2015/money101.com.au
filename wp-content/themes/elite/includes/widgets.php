<?php

/**
 * This registers our widget areas
 * and sets a few widget related options
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 *
 */

// Register Widgets
	add_action( 'init', 'organizedthemes_sidebars' );
	
	function organizedthemes_sidebars() {
		
		register_sidebar( array(
			'name' => __('Default Sidebar', 'organizedthemes'),
			'id' => 'sidebar_default',
			'description' => __('This sidebar will be used on all inside pages unless one of the more specific ones below is active.', 'organizedthemes'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );

		register_sidebar( array(
			'name' => __('Home One', 'organizedthemes'),
			'id' => 'home_1',
			'description' => __('First section of the home page.', 'organizedthemes'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
		register_sidebar( array(
			'name' => __('Home Two', 'organizedthemes'),
			'id' => 'home_2',
			'description' => __('Second section of the home page.', 'organizedthemes'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
		register_sidebar( array(
			'name' => __('Home Three', 'organizedthemes'),
			'id' => 'home_3',
			'description' => __('Third section of the home page.', 'organizedthemes'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
		register_sidebar( array(
			'name' => __('Home Four', 'organizedthemes'),
			'id' => 'home_4',
			'description' => __('Four section of the home page.', 'organizedthemes'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
		register_sidebar( array(
			'name' => __('Home Five', 'organizedthemes'),
			'id' => 'home_5',
			'description' => __('Fifth section of the home page.', 'organizedthemes'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
		register_sidebar( array(
			'name' => __('Home Six', 'organizedthemes'),
			'id' => 'home_6',
			'description' => __('Sixth section of the home page.', 'organizedthemes'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
		register_sidebar( array(
			'name' => __('Home Seven', 'organizedthemes'),
			'id' => 'home_7',
			'description' => __('Seventh section of the home page.', 'organizedthemes'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
		register_sidebar( array(
			'name' => __('Home Eight', 'organizedthemes'),
			'id' => 'home_8',
			'description' => __('Eighth section of the home page.', 'organizedthemes'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
		register_sidebar( array(
			'name' => __('Home Nine', 'organizedthemes'),
			'id' => 'home_9',
			'description' => __('Ninth section of the home page.', 'organizedthemes'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
		register_sidebar( array(
			'name' => __('Home Ten', 'organizedthemes'),
			'id' => 'home_10',
			'description' => __('Tenth section of the home page.', 'organizedthemes'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
		register_sidebar( array(
			'name' => __('Footer', 'organizedthemes'),
			'id' => 'footer_sidebar',
			'description' => __('This sidebar appears just above the site footer.', 'organizedthemes'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
	}

// Adds shortcode support to text widgets
	add_filter('widget_text', 'do_shortcode');

// remove inline styling from recent comments widget
	function organizedthemes_remove_recent_comments_style() {
		global $wp_widget_factory;
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
	}
	add_action( 'widgets_init', 'organizedthemes_remove_recent_comments_style' );

// disable calendar and recent comments widgets
	function unregister_default_wp_widgets() {
	  unregister_widget('WP_Widget_Calendar');
	}
	add_action('widgets_init', 'unregister_default_wp_widgets', 1);

