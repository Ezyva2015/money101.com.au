<?php

/**
 * This file attaches the theme customizer to
 * the options in the options framework
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 *
 */

add_action( 'customize_register', 'organizedthemes_customizer_register' );

function organizedthemes_customizer_register($wp_customize) {
	
	// Change section names
		$wp_customize->get_section('title_tagline')->title = __( 'Logo', 'organizedthemes' );
	
	// Remove tagline field
		$wp_customize->remove_control('blogdescription');
	
	// Change default priority
		$wp_customize->get_section('title_tagline')->priority = 3;
		$wp_customize->get_section('nav')->priority = 5;
	
	/**
	 * This is optional, but if you want to reuse some of the defaults
	 * or values you already have built in the options panel, you
	 * can load them into $options for easy reference
	 */
	 
	$options = optionsframework_options();
	

// Title & Tagline
	
	// Logo Type
		$wp_customize->add_setting( 'elite[header_blog_title]', array(
			'default' => $options['header_blog_title']['std'],
			'type' => 'option'
		) );
	
		$wp_customize->add_control( 'elite_logo_select', array(
				'label' => $options['header_blog_title']['name'],
				'section' => 'title_tagline',
				'settings' => 'elite[header_blog_title]',
				'type' => $options['header_blog_title']['type'],
				'choices' => $options['header_blog_title']['options'],
				'priority' => 1
		) );
		
		$wp_customize->add_setting( 'elite[logo]', array(
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
			'label' => $options['logo']['name'],
			'section' => 'title_tagline',
			'settings' => 'elite[logo]',
			'priority' => 2
		) ) );
	
	// Title font face
		$wp_customize->add_setting( 'elite[site_title_font][face]', array(
			'default' => $options['site_title_font']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'site_title_font', array(
				'label' => $options['site_title_font']['name'],
				'section' => 'title_tagline',
				'settings' => 'elite[site_title_font][face]',
				'type' => 'select',
				'choices' => $options['site_title_font']['options']['faces'],
				'priority' => 3
		) );
	
	// Title Color
		$wp_customize->add_setting( 'elite[logo_color]', array(
			'default' => $options['logo_color']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logo_color', array(
			'label'   => $options['logo_color']['name'],
			'section' => 'title_tagline',
			'settings'   => 'elite[logo_color]',
			'priority' => 4
		) ) );
	
	// Title Color Hover
		$wp_customize->add_setting( 'elite[logo_color_hover]', array(
			'default' => $options['logo_color_hover']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logo_color_hover', array(
			'label'   => $options['logo_color_hover']['name'],
			'section' => 'title_tagline',
			'settings'   => 'elite[logo_color_hover]',
			'priority' => 5
		) ) );

// Navigation
	
	// Navigation Bar Color
		$wp_customize->add_setting( 'elite[navigation_bar]', array(
			'default' => $options['navigation_bar']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_bar', array(
			'label'   => $options['navigation_bar']['name'],
			'section' => 'nav',
			'settings'   => 'elite[navigation_bar]',
			'priority' => 5
		) ) );
		
	// Navigation font face
		$wp_customize->add_setting( 'elite[navigation_font][face]', array(
			'default' => $options['navigation_font']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'navigation_font', array(
				'label' => $options['navigation_font']['name'],
				'section' => 'nav',
				'settings' => 'elite[navigation_font][face]',
				'type' => 'select',
				'choices' => $options['navigation_font']['options']['faces'],
				'priority' => 10
		) );
	
	// Navigation Item Color
		$wp_customize->add_setting( 'elite[navigation_item]', array(
			'default' => $options['navigation_item']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_item', array(
			'label'   => $options['navigation_item']['name'],
			'section' => 'nav',
			'settings'   => 'elite[navigation_item]',
			'priority' => 12
		) ) );
		
	// Navigation Item Color Hover
		$wp_customize->add_setting( 'elite[navigation_item_hover]', array(
			'default' => $options['navigation_item_hover']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_item_hover', array(
			'label'   => $options['navigation_item_hover']['name'],
			'section' => 'nav',
			'settings'   => 'elite[navigation_item_hover]',
			'priority' => 13
		) ) );
	
	// Navigation Drop Down Background
		$wp_customize->add_setting( 'elite[navigation_drop_down_background]', array(
			'default' => $options['navigation_drop_down_background']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_drop_down_background', array(
			'label'   => $options['navigation_drop_down_background']['name'],
			'section' => 'nav',
			'settings'   => 'elite[navigation_drop_down_background]',
			'priority' => 15
		) ) );
	
	// Navigation Drop Down Link
		$wp_customize->add_setting( 'elite[navigation_drop_down_color]', array(
			'default' => $options['navigation_drop_down_color']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_drop_down_color', array(
			'label'   => $options['navigation_drop_down_color']['name'],
			'section' => 'nav',
			'settings'   => 'elite[navigation_drop_down_color]',
			'priority' => 20
		) ) );
	
	// Navigation Drop Down Link
		$wp_customize->add_setting( 'elite[navigation_drop_down_color_hover]', array(
			'default' => $options['navigation_drop_down_color_hover']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_drop_down_color_hover', array(
			'label'   => $options['navigation_drop_down_color_hover']['name'],
			'section' => 'nav',
			'settings'   => 'elite[navigation_drop_down_color_hover]',
			'priority' => 25
		) ) );
	
	// Mobile Navigation Text
		$wp_customize->add_setting( 'elite[mobile_navigation_name]', array(
			'default' => $options['mobile_navigation_name']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'mobile_navigation_name', array(
			'label'   => $options['mobile_navigation_name']['name'],
			'section' => 'nav',
			'settings'   => 'elite[mobile_navigation_name]',
			'type' => $options['mobile_navigation_name']['mobile_navigation_name'],
			'priority' => 30
		 ) );
	
	
	
	
// Background
	
	$wp_customize->add_section( 'organizedthemes_background', array(
		'title' => __( 'Background', 'organizedthemes' ),
		'priority' => 15
	) );
	
	// background image
		$wp_customize->add_setting( 'elite[background_image]', array(
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'background_image', array(
			'label' => $options['background_image']['name'],
			'section' => 'organizedthemes_background',
			'settings' => 'elite[background_image]'
		) ) );
	
	// background color
		$wp_customize->add_setting( 'elite[background_color]', array(
			'default' => $options['background_color']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
			'label'   => $options['background_color']['name'],
			'section' => 'organizedthemes_background',
			'settings'   => 'elite[background_color]'
		) ) );

	// background repeat
		$wp_customize->add_setting( 'elite[background_repeat]', array(
				'default' => $options['background_repeat']['std'],
				'type' => 'option'
			) );
		
		$wp_customize->add_control( 'elite_repeat_select', array(
				'label' => $options['background_repeat']['name'],
				'section' => 'organizedthemes_background',
				'settings' => 'elite[background_repeat]',
				'type' => $options['background_repeat']['type'],
				'choices' => $options['background_repeat']['options']
		) );
	
	// background attachment
		$wp_customize->add_setting( 'elite[background_attachment]', array(
				'default' => $options['background_attachment']['std'],
				'type' => 'option'
			) );
		
		$wp_customize->add_control( 'elite_attachment_select', array(
				'label' => $options['background_attachment']['name'],
				'section' => 'organizedthemes_background',
				'settings' => 'elite[background_attachment]',
				'type' => $options['background_attachment']['type'],
				'choices' => $options['background_attachment']['options']
		) );
	
	// background horizontal position
		$wp_customize->add_setting( 'elite[background_position_horizontal]', array(
				'default' => $options['background_position_horizontal']['std'],
				'type' => 'option'
			) );
		
		$wp_customize->add_control( 'elite_horizontal_select', array(
				'label' => $options['background_position_horizontal']['name'],
				'section' => 'organizedthemes_background',
				'settings' => 'elite[background_position_horizontal]',
				'type' => $options['background_position_horizontal']['type'],
				'choices' => $options['background_position_horizontal']['options']
		) );
	
	// background vertical position
		$wp_customize->add_setting( 'elite[background_position_vertical]', array(
				'default' => $options['background_position_vertical']['std'],
				'type' => 'option'
			) );
		
		$wp_customize->add_control( 'elite_vertical_select', array(
				'label' => $options['background_position_vertical']['name'],
				'section' => 'organizedthemes_background',
				'settings' => 'elite[background_position_vertical]',
				'type' => $options['background_position_vertical']['type'],
				'choices' => $options['background_position_vertical']['options']
		) );


// Slideshow
	
	$wp_customize->add_section( 'organizedthemes_slideshow', array(
		'title' => __( 'Hero Section', 'organizedthemes' ),
		'priority' => 20
	) );
	
	// Automatically Play Slideshow
		$wp_customize->add_setting( 'elite[auto]', array(
			'default' => $options['auto']['std'],
			'type' => 'option'
		) );
	
		$wp_customize->add_control( 'auto', array(
				'label' => $options['auto']['name'],
				'section' => 'organizedthemes_slideshow',
				'settings' => 'elite[auto]',
				'type' => $options['auto']['type'],
				'choices' => $options['auto']['options'],
				'priority' => 5
		) );
	
	// Previous & Next Buttons
		$wp_customize->add_setting( 'elite[prev_next]', array(
			'default' => $options['prev_next']['std'],
			'type' => 'option'
		) );
	
		$wp_customize->add_control( 'prev_next', array(
				'label' => $options['prev_next']['name'],
				'section' => 'organizedthemes_slideshow',
				'settings' => 'elite[prev_next]',
				'type' => $options['prev_next']['type'],
				'choices' => $options['prev_next']['options'],
				'priority' => 10
		) );
	
	// Slide Duration
		$wp_customize->add_setting( 'elite[duration]', array(
			'default' => $options['duration']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'duration', array(
			'label'   => __( 'Slide Duration (milliseconds)', 'organizedthemes' ),
			'section' => 'organizedthemes_slideshow',
			'settings'   => 'elite[duration]',
			'type' => $options['duration']['duration'],
			'priority' => 20
		 ) );
		
	// Slide Transition Speed
		$wp_customize->add_setting( 'elite[transition]', array(
			'default' => $options['transition']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'transition', array(
			'label'   => __( 'Transition Speed (milliseconds)', 'organizedthemes' ),
			'section' => 'organizedthemes_slideshow',
			'settings'   => 'elite[transition]',
			'type' => $options['duration']['transition'],
			'priority' => 25
		 ) );
	
	// Hero Title Font
		$wp_customize->add_setting( 'elite[hero_title_font][face]', array(
			'default' => $options['hero_title_font']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'hero_title_font', array(
				'label' => $options['hero_title_font']['name'],
				'section' => 'organizedthemes_slideshow',
				'settings' => 'elite[hero_title_font][face]',
				'type' => 'select',
				'choices' => $options['hero_title_font']['options']['faces'],
				'priority' => 30
		) );
	
	// Hero Text Font
		$wp_customize->add_setting( 'elite[hero_text_font][face]', array(
			'default' => $options['hero_text_font']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'hero_text_font', array(
				'label' => $options['hero_text_font']['name'],
				'section' => 'organizedthemes_slideshow',
				'settings' => 'elite[hero_text_font][face]',
				'type' => 'select',
				'choices' => $options['hero_text_font']['options']['faces'],
				'priority' => 35
		) );
	

// Home Sections

	$wp_customize->add_section( 'organizedthemes_home_sections', array(
		'title' => __( 'Home Page', 'organizedthemes' ),
		'priority' => 25
	) );		
	
		// Home 1
			$wp_customize->add_setting( 'elite[home_1]', array(
				'default' => $options['home_1']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_1', array(
				'label'   => $options['home_1']['name'],
				'section' => 'organizedthemes_home_sections',
				'settings'   => 'elite[home_1]',
				'priority' => 5
			) ) );
		
		// Home 1 Text
			$wp_customize->add_setting( 'elite[home_1_text]', array(
				'default' => $options['home_1_text']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_1_text', array(
				'label'   => $options['home_1_text']['name'],
				'section' => 'organizedthemes_home_sections',
				'settings'   => 'elite[home_1_text]',
				'priority' => 7
			) ) );
		
		// Home 2
			$wp_customize->add_setting( 'elite[home_2]', array(
				'default' => $options['home_2']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_2', array(
				'label'   => $options['home_2']['name'],
				'section' => 'organizedthemes_home_sections',
				'settings'   => 'elite[home_2]',
				'priority' => 10
			) ) );
		
		// Home 2 Text
			$wp_customize->add_setting( 'elite[home_2_text]', array(
				'default' => $options['home_2_text']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_2_text', array(
				'label'   => $options['home_2_text']['name'],
				'section' => 'organizedthemes_home_sections',
				'settings'   => 'elite[home_2_text]',
				'priority' => 12
			) ) );
		
		// Home 3
			$wp_customize->add_setting( 'elite[home_3]', array(
				'default' => $options['home_3']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_3', array(
				'label'   => $options['home_3']['name'],
				'section' => 'organizedthemes_home_sections',
				'settings'   => 'elite[home_3]',
				'priority' => 15
			) ) );
		
		// Home 3 Text
			$wp_customize->add_setting( 'elite[home_3_text]', array(
				'default' => $options['home_3_text']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_3_text', array(
				'label'   => $options['home_3_text']['name'],
				'section' => 'organizedthemes_home_sections',
				'settings'   => 'elite[home_3_text]',
				'priority' => 17
			) ) );
		
		// Home 4
			$wp_customize->add_setting( 'elite[home_4]', array(
				'default' => $options['home_4']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_4', array(
				'label'   => $options['home_4']['name'],
				'section' => 'organizedthemes_home_sections',
				'settings'   => 'elite[home_4]',
				'priority' => 20
			) ) );
		
		// Home 4 Text
			$wp_customize->add_setting( 'elite[home_4_text]', array(
				'default' => $options['home_4_text']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_4_text', array(
				'label'   => $options['home_4_text']['name'],
				'section' => 'organizedthemes_home_sections',
				'settings'   => 'elite[home_4_text]',
				'priority' => 22
			) ) );
		
		// Home 5
			$wp_customize->add_setting( 'elite[home_5]', array(
				'default' => $options['home_5']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_5', array(
				'label'   => $options['home_5']['name'],
				'section' => 'organizedthemes_home_sections',
				'settings'   => 'elite[home_5]',
				'priority' => 25
			) ) );
		
		// Home 5 Text
			$wp_customize->add_setting( 'elite[home_5_text]', array(
				'default' => $options['home_5_text']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_5_text', array(
				'label'   => $options['home_5_text']['name'],
				'section' => 'organizedthemes_home_sections',
				'settings'   => 'elite[home_5_text]',
				'priority' => 27
			) ) );
		
		// Home 6
			$wp_customize->add_setting( 'elite[home_6]', array(
				'default' => $options['home_6']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_6', array(
				'label'   => $options['home_6']['name'],
				'section' => 'organizedthemes_home_sections',
				'settings'   => 'elite[home_6]',
				'priority' => 30
			) ) );
		
		// Home 6 Text
			$wp_customize->add_setting( 'elite[home_6_text]', array(
				'default' => $options['home_6_text']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_6_text', array(
				'label'   => $options['home_6_text']['name'],
				'section' => 'organizedthemes_home_sections',
				'settings'   => 'elite[home_6_text]',
				'priority' => 32
			) ) );
		
		// Home 7
			$wp_customize->add_setting( 'elite[home_7]', array(
				'default' => $options['home_7']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_7', array(
				'label'   => $options['home_7']['name'],
				'section' => 'organizedthemes_home_sections',
				'settings'   => 'elite[home_7]',
				'priority' => 35
			) ) );
		
		// Home 7 Text
			$wp_customize->add_setting( 'elite[home_7_text]', array(
				'default' => $options['home_7_text']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_7_text', array(
				'label'   => $options['home_7_text']['name'],
				'section' => 'organizedthemes_home_sections',
				'settings'   => 'elite[home_7_text]',
				'priority' => 37
			) ) );
		
		// Home 8
			$wp_customize->add_setting( 'elite[home_8]', array(
				'default' => $options['home_8']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_8', array(
				'label'   => $options['home_8']['name'],
				'section' => 'organizedthemes_home_sections',
				'settings'   => 'elite[home_8]',
				'priority' => 40
			) ) );
		
		// Home 8 Text
			$wp_customize->add_setting( 'elite[home_8_text]', array(
				'default' => $options['home_8_text']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_8_text', array(
				'label'   => $options['home_8_text']['name'],
				'section' => 'organizedthemes_home_sections',
				'settings'   => 'elite[home_8_text]',
				'priority' => 42
			) ) );
		
		// Home 9
			$wp_customize->add_setting( 'elite[home_9]', array(
				'default' => $options['home_9']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_9', array(
				'label'   => $options['home_9']['name'],
				'section' => 'organizedthemes_home_sections',
				'settings'   => 'elite[home_9]',
				'priority' => 45
			) ) );
		
		// Home 9 Text
			$wp_customize->add_setting( 'elite[home_9_text]', array(
				'default' => $options['home_9_text']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_9_text', array(
				'label'   => $options['home_9_text']['name'],
				'section' => 'organizedthemes_home_sections',
				'settings'   => 'elite[home_9_text]',
				'priority' => 47
			) ) );
		
		// Home 10
			$wp_customize->add_setting( 'elite[home_10]', array(
				'default' => $options['home_10']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_10', array(
				'label'   => $options['home_10']['name'],
				'section' => 'organizedthemes_home_sections',
				'settings'   => 'elite[home_10]',
				'priority' => 50
			) ) );
		
		// Home 10 Text
			$wp_customize->add_setting( 'elite[home_10_text]', array(
				'default' => $options['home_10_text']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_10_text', array(
				'label'   => $options['home_10_text']['name'],
				'section' => 'organizedthemes_home_sections',
				'settings'   => 'elite[home_10_text]',
				'priority' => 52
			) ) );
	
	
	
// Content Colors

	$wp_customize->add_section( 'organizedthemes_content', array(
		'title' => __( 'Main Content', 'organizedthemes' ),
		'priority' => 30
	) );	
	
	
		// Body Font
			$wp_customize->add_setting( 'elite[body_font][face]', array(
				'default' => $options['body_font']['std']['face'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( 'body_font', array(
					'label' => $options['body_font']['name'],
					'section' => 'organizedthemes_content',
					'settings' => 'elite[body_font][face]',
					'type' => 'select',
					'choices' => $options['body_font']['options']['faces'],
					'priority' => 5
			) );
		
		// Content Text Color
			$wp_customize->add_setting( 'elite[content_text]', array(
				'default' => $options['content_text']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_text', array(
				'label'   => $options['content_text']['name'],
				'section' => 'organizedthemes_content',
				'settings'   => 'elite[content_text]',
				'priority' => 10
			) ) );
		
		// Content Background Color
			$wp_customize->add_setting( 'elite[content_background]', array(
				'default' => $options['content_background']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_background', array(
				'label'   => $options['content_background']['name'],
				'section' => 'organizedthemes_content',
				'settings'   => 'elite[content_background]',
				'priority' => 15
			) ) );
		
		// Heading Font
			$wp_customize->add_setting( 'elite[heading_font][face]', array(
				'default' => $options['heading_font']['std']['face'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( 'heading_font', array(
					'label' => $options['heading_font']['name'],
					'section' => 'organizedthemes_content',
					'settings' => 'elite[heading_font][face]',
					'type' => 'select',
					'choices' => $options['heading_font']['options']['faces'],
					'priority' => 20
			) );
		
		// Heading Color
			$wp_customize->add_setting( 'elite[heading_color]', array(
				'default' => $options['heading_color']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'heading_color', array(
				'label'   => $options['heading_color']['name'],
				'section' => 'organizedthemes_content',
				'settings'   => 'elite[heading_color]',
				'priority' => 25
			) ) );
		
		// Link Color
			$wp_customize->add_setting( 'elite[link_color]', array(
				'default' => $options['link_color']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
				'label'   => $options['link_color']['name'],
				'section' => 'organizedthemes_content',
				'settings'   => 'elite[link_color]',
				'priority' => 30
			) ) );
		
		// Link Color Hover
			$wp_customize->add_setting( 'elite[link_color_hover]', array(
				'default' => $options['link_color_hover']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color_hover', array(
				'label'   => $options['link_color_hover']['name'],
				'section' => 'organizedthemes_content',
				'settings'   => 'elite[link_color_hover]',
				'priority' => 35
			) ) );
		
		// Product Text
			$wp_customize->add_setting( 'elite[product_text]', array(
				'default' => $options['product_text']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'product_text', array(
				'label'   => $options['product_text']['name'],
				'section' => 'organizedthemes_content',
				'settings'   => 'elite[product_text]',
				'priority' => 40
			) ) );
		
		// Product Background
			$wp_customize->add_setting( 'elite[product_background]', array(
				'default' => $options['product_background']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'product_background', array(
				'label'   => $options['product_background']['name'],
				'section' => 'organizedthemes_content',
				'settings'   => 'elite[product_background]',
				'priority' => 45
			) ) );
	

// Footer Colors

	$wp_customize->add_section( 'organizedthemes_footer', array(
		'title' => __( 'Footer', 'organizedthemes' ),
		'priority' => 40
	) );	


	// Footer Text Left
		$wp_customize->add_setting( 'elite[footer_text]', array(
			'default' => $options['footer_text']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'footer_text', array(
			'label'   => $options['footer_text']['name'],
			'section' => 'organizedthemes_footer',
			'settings'   => 'elite[footer_text]',
			'type' => $options['footer_text']['footer_text'],
			'priority' => 5
		 ) );
	
	// Footer Text Right
		$wp_customize->add_setting( 'elite[footer_text_right]', array(
			'default' => $options['footer_text_right']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'footer_text_right', array(
			'label'   => $options['footer_text_right']['name'],
			'section' => 'organizedthemes_footer',
			'settings'   => 'elite[footer_text_right]',
			'type' => $options['footer_text_right']['footer_text'],
			'priority' => 10
		 ) );

	// Footer Color
		$wp_customize->add_setting( 'elite[footer_color]', array(
			'default' => $options['footer_color']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_color', array(
			'label'   => $options['footer_color']['name'],
			'section' => 'organizedthemes_footer',
			'settings'   => 'elite[footer_color]',
			'priority' => 15
		) ) );
	
	// Footer Background Color
		$wp_customize->add_setting( 'elite[footer_background_color]', array(
			'default' => $options['footer_background_color']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
			'label'   => $options['footer_background_color']['name'],
			'section' => 'organizedthemes_footer',
			'settings'   => 'elite[footer_background_color]',
			'priority' => 20
		) ) );
	
	// Footer Link Color
		$wp_customize->add_setting( 'elite[footer_link_color]', array(
			'default' => $options['footer_link_color']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link_color', array(
			'label'   => $options['footer_link_color']['name'],
			'section' => 'organizedthemes_footer',
			'settings'   => 'elite[footer_link_color]',
			'priority' => 25
		) ) );
	
	// Footer Link Color Hover
		$wp_customize->add_setting( 'elite[footer_link_color_hover]', array(
			'default' => $options['footer_link_color_hover']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link_color_hover', array(
			'label'   => $options['footer_link_color_hover']['name'],
			'section' => 'organizedthemes_footer',
			'settings'   => 'elite[footer_link_color_hover]',
			'priority' => 30
		) ) );
	
	// Footer Line Color
		$wp_customize->add_setting( 'elite[footer_line]', array(
			'default' => $options['footer_line']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_line', array(
			'label'   => $options['footer_line']['name'],
			'section' => 'organizedthemes_footer',
			'settings'   => 'elite[footer_line]',
			'priority' => 35
		) ) );


// Widgets

	$wp_customize->add_section( 'organizedthemes_widget', array(
		'title' => __( 'Widgets', 'organizedthemes' ),
		'priority' => 50
	) );
	
	// Widget Title Font
		$wp_customize->add_setting( 'elite[widget_title_font][face]', array(
			'default' => $options['widget_title_font']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'widget_title_font', array(
				'label' => $options['widget_title_font']['name'],
				'section' => 'organizedthemes_widget',
				'settings' => 'elite[widget_title_font][face]',
				'type' => 'select',
				'choices' => $options['widget_title_font']['options']['faces'],
				'priority' => 5
		) );
		
	// Widget Title Color
		$wp_customize->add_setting( 'elite[widget_title]', array(
			'default' => $options['widget_title']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'widget_title', array(
			'label'   => $options['widget_title']['name'],
			'section' => 'organizedthemes_widget',
			'settings'   => 'elite[widget_title]',
			'priority' => 10
		) ) );
	
	// Widget Text Color
		$wp_customize->add_setting( 'elite[widget_text]', array(
			'default' => $options['widget_text']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'widget_text', array(
			'label'   => $options['widget_text']['name'],
			'section' => 'organizedthemes_widget',
			'settings'   => 'elite[widget_text]',
			'priority' => 15
		) ) );
	
	// Widget Background Color
		$wp_customize->add_setting( 'elite[widget_background]', array(
			'default' => $options['widget_background']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'widget_background', array(
			'label'   => $options['widget_background']['name'],
			'section' => 'organizedthemes_widget',
			'settings'   => 'elite[widget_background]',
			'priority' => 20
		) ) );
	
	
// Buttons

	$wp_customize->add_section( 'organizedthemes_buttons', array(
		'title' => __( 'Buttons', 'organizedthemes' ),
		'priority' => 60
	) );
	
	// Button Color
		$wp_customize->add_setting( 'elite[button]', array(
			'default' => $options['button']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button', array(
			'label'   => $options['button']['name'],
			'section' => 'organizedthemes_buttons',
			'settings'   => 'elite[button]',
			'priority' => 5
		) ) );
	
	// Button Background Color
		$wp_customize->add_setting( 'elite[button_background]', array(
			'default' => $options['button_background']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_background', array(
			'label'   => $options['button_background']['name'],
			'section' => 'organizedthemes_buttons',
			'settings'   => 'elite[button_background]',
			'priority' => 10
		) ) );
	
	// Button Hover Color
		$wp_customize->add_setting( 'elite[button_hover]', array(
			'default' => $options['button_hover']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_hover', array(
			'label'   => $options['button_hover']['name'],
			'section' => 'organizedthemes_buttons',
			'settings'   => 'elite[button_hover]',
			'priority' => 15
		) ) );
	
	// Button Background Hover Color
		$wp_customize->add_setting( 'elite[button_background_hover]', array(
			'default' => $options['button_background_hover']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_background_hover', array(
			'label'   => $options['button_background_hover']['name'],
			'section' => 'organizedthemes_buttons',
			'settings'   => 'elite[button_background_hover]',
			'priority' => 20
		) ) );



// Social Icons

	$wp_customize->add_section( 'organizedthemes_social', array(
		'title' => __( 'Social Icons', 'organizedthemes' ),
		'priority' => 70
	) );
	
	// Icon Color
		$wp_customize->add_setting( 'elite[social_color]', array(
			'default' => $options['social_color']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_color', array(
			'label'   => $options['social_color']['name'],
			'section' => 'organizedthemes_social',
			'settings'   => 'elite[social_color]',
			'priority' => 5
		) ) );
	
	// Icon Color Background
		$wp_customize->add_setting( 'elite[social_color_background]', array(
			'default' => $options['social_color_background']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_color_background', array(
			'label'   => $options['social_color_background']['name'],
			'section' => 'organizedthemes_social',
			'settings'   => 'elite[social_color_background]',
			'priority' => 10
		) ) );
	
	// Icon Color Hover
		$wp_customize->add_setting( 'elite[social_color_hover]', array(
			'default' => $options['social_color_hover']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_color_hover', array(
			'label'   => $options['social_color_hover']['name'],
			'section' => 'organizedthemes_social',
			'settings'   => 'elite[social_color_hover]',
			'priority' => 15
		) ) );
	
	// Icon Color Background Hover
		$wp_customize->add_setting( 'elite[social_color_background_hover]', array(
			'default' => $options['social_color_background_hover']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_color_background_hover', array(
			'label'   => $options['social_color_background_hover']['name'],
			'section' => 'organizedthemes_social',
			'settings'   => 'elite[social_color_background_hover]',
			'priority' => 20
		) ) );
		
}

