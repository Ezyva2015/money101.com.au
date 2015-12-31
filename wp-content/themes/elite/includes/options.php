<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	$optionsframework_settings = get_option('optionsframework');
	
	// Edit 'options-theme-customizer' and set your own theme name instead
	$optionsframework_settings['id'] = 'elite';
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
		
	// Graphic logo or dynamic text
		$logo_type = array(
			"text" => __( 'Text', 'organizedthemes' ),
			"image" => __( 'Image', 'organizedthemes' )
		);
	
	// Yes or No
		$yes = array(
			"yes" => __( 'Yes', 'organizedthemes' ),
			"no" => __( 'No', 'organizedthemes' )
		);
	
	// Yes or No
		$true = array(
			"1" => __( 'Yes', 'organizedthemes' ),
			"0" => __( 'No', 'organizedthemes' )
		);
	
	// Yes or No
		$false = array(
			"0" => __( 'No', 'organizedthemes' ),
			"1" => __( 'Yes', 'organizedthemes' )
		);
	
	// excerpt or full content
		$content_type = array(
			"excerpt" => __( 'Excerpt', 'organizedthemes' ),
			"content" => __( 'Full Content', 'organizedthemes' )
			);
	
	// Background Options
		$background_repeat = array(
			"" => __( '', 'organizedthemes' ),
			"repeat" => __( 'Repeat All', 'organizedthemes' ),
			"repeat-y" => __( 'Repeat Vertically', 'organizedthemes' ),
			"repeat-x" => __( 'Repeat Horizontally', 'organizedthemes' ),
			"no-repeat" => __( 'No Repeat', 'organizedthemes' )
			);
		
		$background_attachment = array(
			"" => __( '', 'organizedthemes' ),
			"scroll" => __( 'Scroll', 'organizedthemes' ),
			"fixed" => __( 'Fixed', 'organizedthemes' )
			);
		
		$background_position_x = array(
			"" => __( '', 'organizedthemes' ),
			"left" => __( 'Left', 'organizedthemes' ),
			"center" => __( 'Center', 'organizedthemes' ),
			"right" => __( 'Right', 'organizedthemes' )
			);
		
		$background_position_y = array(
			"" => __( '', 'organizedthemes' ),
			"top" => __( 'Top', 'organizedthemes' ),
			"center" => __( 'Center', 'organizedthemes' ),
			"bottom" => __( 'Bottom', 'organizedthemes' )
			);
		
		$background_size = array(
			"" => __( 'None', 'organizedthemes' ),
			"cover" => __( 'Cover', 'organizedthemes' ),
			"contain" => __( 'Contain', 'organizedthemes' )
			);
	
	// lightbox styling
		$light_style = array(
			"default" => __( 'Default', 'organizedthemes' ),
			"carbono" => __( 'Carbono', 'organizedthemes' ),
			"classic" => __( 'Classic', 'organizedthemes' ),
			"classic_dark" => __( 'Classic Dark', 'organizedthemes' ),
			"evolution" => __( 'Evolution', 'organizedthemes' ),
			"evolution_dark" => __( 'Evolution Dark', 'organizedthemes' ),
			"facebook" => __( 'Facebook', 'organizedthemes' ),
			"minimal" => __( 'Minimalist', 'organizedthemes' ),
			"minimal_dark" => __( 'Minimalist Dark', 'organizedthemes' ),
			"white" => __( 'White and Green', 'organizedthemes' )
		);
	
	// If using image radio buttons, define a directory path
		$imagepath =  get_template_directory_uri() . '/inc/images/';
		
	$options = array();
		
$options[] = array( "name" => __( 'Header', 'organizedthemes' ),
					"desc" => __( '', 'organizedthemes' ),
					"type" => "heading");
	
	$options[] = array(
		'name' => __('Logo', 'organizedthemes'),
		'desc' => __('', 'organizedthemes'),
		'type' => 'info');
						
	$options['header_blog_title'] = array( "name" => __( 'Text or Graphic Logo', 'organizedthemes' ),
						"desc" => __( 'Choose between a graphic logo or the site title.', 'organizedthemes' ),
						"id" => "header_blog_title",
						"std" => "Text",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => $logo_type);
	
	$options['logo'] = array( "name" => __( 'Logo', 'organizedthemes' ),
						"desc" => __( 'Upload a graphic logo here.', 'organizedthemes' ),
						"id" => "logo",
						"type" => "upload");
	
	
	$options['site_title_font'] = array( 'name' => __( 'Text Logo Font', 'organizedthemes' ),
			'desc' => __( 'Choose the type for your text logo.', 'organizedthemes' ),
			'id' => 'site_title_font',
			'std' => array( 'size' => '50px', 'face' => 'Open Sans, sans-serif', 'color' => '#ffffff'),
			'type' => 'typography',
			'options' => array(
				'faces' => options_typography_get_google_fonts(),
				'styles' => false,
				'color' => false )
			);
	
	$options['logo_color'] = array( "name" => __( 'Text Logo Color', 'organizedthemes' ),
						"desc" => __( 'The color of your text logo.', 'organizedthemes' ),
						"id" => "logo_color",
						"std" => "",
						"type" => "color");	
	
	$options['logo_color_hover'] = array( "name" => __( 'Text Logo Color (hover)', 'organizedthemes' ),
						"desc" => __( 'The color of your text logo while hovering.', 'organizedthemes' ),
						"id" => "logo_color_hover",
						"std" => "",
						"type" => "color");	
	
	$options[] = array(
		'name' => __('Shortcut Icons', 'organizedthemes'),
		'desc' => __('', 'organizedthemes'),
		'type' => 'info');
	
	$options[] = array( "name" => __( 'Favicon', 'organizedthemes' ),
						"desc" => __( 'Upload a favicon (small icon that sits beside your websites address in a browser navigation bar here.', 'organizedthemes' ),
						"id" => "favicon",
						"std" => get_template_directory_uri() ."/images/favicon.png",
						"type" => "upload");
	
	$options[] = array( "name" => __( 'Apple Shortcut Icon', 'organizedthemes' ),
						"desc" => __( 'Upload an icon for an iOS shortcut icon here.  Should be 114 pixels square.', 'organizedthemes' ),
						"id" => "apple",
						"std" => "",
						"type" => "upload");
		
	
	$options[] = array(
		'name' => __('Navigation', 'organizedthemes'),
		'desc' => __('', 'organizedthemes'),
		'type' => 'info');
	
	$options['navigation_bar'] = array( "name" => __( 'Navigation Bar Color', 'organizedthemes' ),
						"desc" => __( 'Choose a navigation bar background color', 'organizedthemes' ),
						"id" => "navigation_bar",
						"std" => "",
						"type" => "color");	
	
	$options['navigation_font'] = array( 'name' => __( 'Navigation Item Font', 'organizedthemes' ),
			'desc' => __( 'Sets the type for your navigation menu.', 'organizedthemes' ),
			'id' => 'navigation_font',
			'std' => array( 'size' => '20px', 'face' => 'Open Sans, sans-serif', 'color' => '#ffffff'),
			'type' => 'typography',
			'options' => array(
				'faces' => options_typography_get_google_fonts(),
				'styles' => false,
				'color' => false )
			);
	
	$options['navigation_item'] = array( "name" => __( 'Navigation Item', 'organizedthemes' ),
						"desc" => __( 'Color of your navigation menu items', 'organizedthemes' ),
						"id" => "navigation_item",
						"std" => "",
						"type" => "color");
	
	$options['navigation_item_hover'] = array( "name" => __( 'Navigation Item (hover)', 'organizedthemes' ),
						"desc" => __( 'Color of your navigation menu items while hovering', 'organizedthemes' ),
						"id" => "navigation_item_hover",
						"std" => "",
						"type" => "color");
	
	$options['navigation_drop_down_background'] = array( "name" => __( 'Navigation Drop Down Background Color', 'organizedthemes' ),
						"desc" => __( 'Background color of your drop-down menus.', 'organizedthemes' ),
						"id" => "navigation_drop_down_background",
						"std" => "",
						"type" => "color");
	
	$options['navigation_drop_down_color'] = array( "name" => __( 'Navigation Drop Down Link Color', 'organizedthemes' ),
						"desc" => __( 'Link color of your drop-down menus.', 'organizedthemes' ),
						"id" => "navigation_drop_down_color",
						"std" => "",
						"type" => "color");
	
	$options['navigation_drop_down_color_hover'] = array( "name" => __( 'Navigation Drop Down Link Color (Hover)', 'organizedthemes' ),
						"desc" => __( 'Link color of your drop-down menus while hovering.', 'organizedthemes' ),
						"id" => "navigation_drop_down_color_hover",
						"std" => "",
						"type" => "color");
	
	$options['navigation_top_margin'] = array( "name" => __( 'Drop Down Top Margin', 'organizedthemes' ),
						"desc" => __( 'This sets the top margin of the drop-down menus in pixels.  If you\'re having difficulty clicking on a drop-down, using a negative number like -27 can be helpful to keep the drop-down from disappearing before you can click on it.  You may need to experiment to find the right value to go with the font and font size that has been selected.  The default is -21.', 'organizedthemes' ),
						"id" => "navigation_top_margin",
						"std" => "",
						"type" => "text");
	
	$options['mobile_navigation_name'] = array( "name" => __( 'Mobile Navigation Label', 'organizedthemes' ),
						"desc" => __( 'Sets the text for the mobile navigation menu', 'organizedthemes' ),
						"id" => "mobile_navigation_name",
						"std" => "Menu",
						"type" => "text");
	
	
	
$options[] = array( "name" => __( 'Hero Section', 'organizedthemes' ),
					"desc" => __( '', 'organizedthemes' ),
					"type" => "heading");
	
	
	
	$options['auto'] = array( "name" => __( 'Automatically Play Slideshow', 'organizedthemes' ),
						"desc" => __( 'Choose yes to have the slideshow begin sliding once the page loads.  If you are using videos, we recommend setting this to NO.', 'organizedthemes' ),
						"id" => "auto",
						"std" => "true",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => $true);
	
	$options['prev_next'] = array( "name" => __( 'Previous/Next Buttons', 'organizedthemes' ),
						"desc" => __( 'Choose yes to display previous/next buttons.  They appear while hovering over the slideshow.', 'organizedthemes' ),
						"id" => "prev_next",
						"std" => "true",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => $true);
	
	$options['duration'] = array( "name" => __( 'Slide Duration','organizedthemes'),
						"desc" => __( 'The amount of time in milliseconds that each slide will be visible.','organizedthemes'),
						"id" => "duration",
						"std" => "5000",
						"type" => "text");
	
	$options['transition'] = array( "name" => __( 'Animation Duration','organizedthemes'),
						"desc" => __( 'The amount of time in milliseconds that it takes to change a slide','organizedthemes'),
						"id" => "transition",
						"std" => "750",
						"type" => "text");
	
	$options['hero_title_font'] = array( 'name' => __( 'Hero Title Font', 'organizedthemes' ),
			'desc' => __( 'Select a font for your hero section.', 'organizedthemes' ),
			'id' => 'hero_title_font',
			'std' => array( 'size' => '70px', 'face' => 'Open Sans, sans-serif', 'color' => '#ffffff'),
			'type' => 'typography',
			'options' => array(
				'faces' => options_typography_get_google_fonts(),
				'styles' => false,
				'color' => false )
			);
		
	$options['hero_text_font'] = array( 'name' => __( 'Hero Text Font', 'organizedthemes' ),
			'desc' => __( 'Select a font for your hero section.', 'organizedthemes' ),
			'id' => 'hero_text_font',
			'std' => array( 'size' => '24px', 'face' => 'Open Sans, sans-serif', 'color' => '#ffffff'),
			'type' => 'typography',
			'options' => array(
				'faces' => options_typography_get_google_fonts(),
				'styles' => false,
				'color' => false )
			);
	
	
	
$options[] = array( "name" => __( 'Background', 'organizedthemes' ),
					"desc" => __( '', 'organizedthemes' ),
					"type" => "heading");
	
	
	$options['background_image'] = array( "name" => __( 'Background Image', 'organizedthemes' ),
						"desc" => __( 'Upload a background image here.', 'organizedthemes' ),
						"id" => "background_image",
						"type" => "upload");
	
	$options['background_repeat'] = array( "name" => __( 'Background Repeat', 'organizedthemes' ),
						"desc" => __( 'Set how your background iamge repeats.', 'organizedthemes' ),
						"id" => "background_repeat",
						"std" => "",
						"type" => "select",
						"options" => $background_repeat);
	
	$options['background_attachment'] = array( "name" => __( 'Background Attachment', 'organizedthemes' ),
						"desc" => __( 'Set how your background iamge is attached.', 'organizedthemes' ),
						"id" => "background_attachment",
						"std" => "",
						"type" => "select",
						"options" => $background_attachment);
	
	$options['background_position_horizontal'] = array( "name" => __( 'Background Position (horizontal)', 'organizedthemes' ),
						"desc" => __( 'Chose where the background image begins horizontally.', 'organizedthemes' ),
						"id" => "background_position_horizontal",
						"std" => "",
						"type" => "select",
						"options" => $background_position_x);
	
	$options['background_position_vertical'] = array( "name" => __( 'Background Position (vertical)', 'organizedthemes' ),
						"desc" => __( 'Chose where the background image begins vertically.', 'organizedthemes' ),
						"id" => "background_position_vertical",
						"std" => "",
						"type" => "select",
						"options" => $background_position_y);
	
	$options['background_size'] = array( "name" => __( 'Background Scaling', 'organizedthemes' ),
						"desc" => __( 'Cover will force the background image to fill the background area.  Contain will scale the image so that both its height and width fit.', 'organizedthemes' ),
						"id" => "background_size",
						"std" => "",
						"type" => "select",
						"options" => $background_size);
	
	$options['background_color'] = array( "name" => __( 'Background Color', 'organizedthemes' ),
						"desc" => __( 'Choose a background color.', 'organizedthemes' ),
						"id" => "background_color",
						"std" => "#EDEDED",
						"type" => "color");	
	


$options[] = array( "name" => __( 'Home Sections', 'organizedthemes' ),
					"desc" => __( '', 'organizedthemes' ),
					"type" => "heading");

	$options['home_1'] = array( "name" => __( 'Home 1 Background Color', 'organizedthemes' ),
						"desc" => __( 'Sets the background color of the first home page section', 'organizedthemes' ),
						"id" => "home_1",
						"std" => "",
						"type" => "color");
	
	$options['home_1_text'] = array( "name" => __( 'Home 1 Text Color', 'organizedthemes' ),
						"desc" => __( 'Sets the text color of the first home page section', 'organizedthemes' ),
						"id" => "home_1_text",
						"std" => "",
						"type" => "color");
	
	$options['home_2'] = array( "name" => __( 'Home 2 Background Color', 'organizedthemes' ),
						"desc" => __( 'Sets the background color of the second home page section', 'organizedthemes' ),
						"id" => "home_2",
						"std" => "",
						"type" => "color");
	
	$options['home_2_text'] = array( "name" => __( 'Home 2 Text Color', 'organizedthemes' ),
						"desc" => __( 'Sets the text color of the second home page section', 'organizedthemes' ),
						"id" => "home_2_text",
						"std" => "",
						"type" => "color");
	
	$options['home_3'] = array( "name" => __( 'Home 3 Background Color', 'organizedthemes' ),
						"desc" => __( 'Sets the background color of the third home page section', 'organizedthemes' ),
						"id" => "home_3",
						"std" => "",
						"type" => "color");
	
	$options['home_3_text'] = array( "name" => __( 'Home 3 Text Color', 'organizedthemes' ),
						"desc" => __( 'Sets the text color of the third home page section', 'organizedthemes' ),
						"id" => "home_3_text",
						"std" => "",
						"type" => "color");
						
	$options['home_4'] = array( "name" => __( 'Home 4 Background Color', 'organizedthemes' ),
						"desc" => __( 'Sets the background color of the fourth home page section', 'organizedthemes' ),
						"id" => "home_4",
						"std" => "",
						"type" => "color");	
	
	$options['home_4_text'] = array( "name" => __( 'Home 4 Text Color', 'organizedthemes' ),
						"desc" => __( 'Sets the text color of the fourth home page section', 'organizedthemes' ),
						"id" => "home_4_text",
						"std" => "",
						"type" => "color");				
	
	$options['home_5'] = array( "name" => __( 'Home 5 Background Color', 'organizedthemes' ),
						"desc" => __( 'Sets the background color of the fifth home page section', 'organizedthemes' ),
						"id" => "home_5",
						"std" => "",
						"type" => "color");
	
	$options['home_5_text'] = array( "name" => __( 'Home 5 Text Color', 'organizedthemes' ),
						"desc" => __( 'Sets the text color of the fifth home page section', 'organizedthemes' ),
						"id" => "home_5_text",
						"std" => "",
						"type" => "color");
	
	$options['home_6'] = array( "name" => __( 'Home 6 Background Color', 'organizedthemes' ),
						"desc" => __( 'Sets the background color of the sixth home page section', 'organizedthemes' ),
						"id" => "home_6",
						"std" => "",
						"type" => "color");
	
	$options['home_6_text'] = array( "name" => __( 'Home 6 Text Color', 'organizedthemes' ),
						"desc" => __( 'Sets the text color of the sixth home page section', 'organizedthemes' ),
						"id" => "home_6_text",
						"std" => "",
						"type" => "color");
	
	$options['home_7'] = array( "name" => __( 'Home 7 Background Color', 'organizedthemes' ),
						"desc" => __( 'Sets the background color of the seventh home page section', 'organizedthemes' ),
						"id" => "home_7",
						"std" => "",
						"type" => "color");
	
	$options['home_7_text'] = array( "name" => __( 'Home 7 Text Color', 'organizedthemes' ),
						"desc" => __( 'Sets the text color of the seventh home page section', 'organizedthemes' ),
						"id" => "home_7_text",
						"std" => "",
						"type" => "color");
	
	$options['home_8'] = array( "name" => __( 'Home 8 Background Color', 'organizedthemes' ),
						"desc" => __( 'Sets the background color of the eighth home page section', 'organizedthemes' ),
						"id" => "home_8",
						"std" => "",
						"type" => "color");
	
	$options['home_8_text'] = array( "name" => __( 'Home 8 Text Color', 'organizedthemes' ),
						"desc" => __( 'Sets the text color of the eighth home page section', 'organizedthemes' ),
						"id" => "home_8_text",
						"std" => "",
						"type" => "color");
	
	$options['home_9'] = array( "name" => __( 'Home 9 Background Color', 'organizedthemes' ),
						"desc" => __( 'Sets the background color of the ninth home page section', 'organizedthemes' ),
						"id" => "home_9",
						"std" => "",
						"type" => "color");
	
	$options['home_9_text'] = array( "name" => __( 'Home 9 Text Color', 'organizedthemes' ),
						"desc" => __( 'Sets the text color of the ninth home page section', 'organizedthemes' ),
						"id" => "home_9_text",
						"std" => "",
						"type" => "color");
	
	$options['home_10'] = array( "name" => __( 'Home 10 Background Color', 'organizedthemes' ),
						"desc" => __( 'Sets the background color of the tenth home page section', 'organizedthemes' ),
						"id" => "home_10",
						"std" => "",
						"type" => "color");
	
	$options['home_10_text'] = array( "name" => __( 'Home 10 Text Color', 'organizedthemes' ),
						"desc" => __( 'Sets the text color of the tenth home page section', 'organizedthemes' ),
						"id" => "home_10_text",
						"std" => "",
						"type" => "color");
	
					
	

$options[] = array( "name" => __( 'Content', 'organizedthemes' ),
					"desc" => __( '', 'organizedthemes' ),
					"type" => "heading");

	
	$options['default_layout'] = array(
			'name' => __( 'Default Layout', 'organizedthemes' ),
			'desc' => __( 'Choose a default layout for your pages and posts.', 'organizedthemes' ),
			'id' => "default_layout",
			'std' => "content-left",
			'type' => "images",
			'options' => array(
				'content-left' => $imagepath . '2cr.png',
				'content-full' => $imagepath . '1col.png',
				'content-right' => $imagepath . '2cl.png')
		);
	
	
	$options['content_excerpt'] = array( "name" => __( 'Excerpt Or Full Content', 'organizedthemes' ),
						"desc" => __( 'You can choose to display your full post content or only an excerpt on archive pages.', 'organizedthemes' ),
						"id" => "content_excerpt",
						"std" => "yes",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => $content_type);
						
	$options['gallery'] = array( "name" => __( 'Include Lightbox Gallery', 'organizedthemes' ),
						"desc" => __( 'If you would like to disable the lightbox gallery, select no here.', 'organizedthemes' ),
						"id" => "gallery",
						"std" => "yes",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => $yes);
	
	$options['lightbox_style'] = array( "name" => __( 'Lightbox Style', 'organizedthemes' ),
						"desc" => __( 'Choose a style for the pop-up lightbox.', 'organizedthemes' ),
						"id" => "lightbox_style",
						"std" => "classic",
						"type" => "select",
						"class" => "tiny", //mini, tiny, small
						"options" => $light_style);
	
	
	
	$options[] = array(
		'name' => __('Main Content Styles', 'organizedthemes'),
		'desc' => __('', 'organizedthemes'),
		'type' => 'info');
	
	$options['body_font'] = array( 'name' => __( 'Body Font', 'organizedthemes' ),
			'desc' => __( 'This is used for the main conent and widgets.', 'organizedthemes' ),
			'id' => 'body_font',
			'std' => array( 'size' => '15px', 'face' => 'Open Sans, sans-serif', 'color' => '#000000'),
			'type' => 'typography',
			'options' => array(
				'faces' => options_typography_get_google_fonts(),
				'styles' => false,
				'color' => false )
			);
	
	$options['content_text'] = array( "name" => __( 'Text Color', 'organizedthemes' ),
						"desc" => __( 'The color of your main text', 'organizedthemes' ),
						"id" => "content_text",
						"std" => "",
						"type" => "color");	
	
	$options['content_background'] = array( "name" => __( 'Content Background Color', 'organizedthemes' ),
						"desc" => __( 'The background color of the main content area of the site.', 'organizedthemes' ),
						"id" => "content_background",
						"std" => "",
						"type" => "color");	
		
	$options['heading_font'] = array( 'name' => __( 'Heading Font', 'organizedthemes' ),
			'desc' => __( 'Choose a font for your page titles and other headings (h1, h2, h3, h4, h5, h6)', 'organizedthemes' ),
			'id' => 'heading_font',
			'std' => array( 'size' => '24px', 'face' => 'Open Sans, sans-serif', 'color' => '#000000'),
			'type' => 'typography',
			'options' => array(
				'faces' => options_typography_get_google_fonts(),
				'styles' => false,
				'sizes' => false,
				'color' => false )
			);
	
	$options['heading_color'] = array( "name" => __( 'Heading Color', 'organizedthemes' ),
						"desc" => __( 'The color of your headings', 'organizedthemes' ),
						"id" => "heading_color",
						"std" => "",
						"type" => "color");	
	
	
	$options[] = array(
		'name' => __('Links', 'organizedthemes'),
		'desc' => __('', 'organizedthemes'),
		'type' => 'info');
	
	$options['link_color'] = array( "name" => __( 'Link Color', 'organizedthemes' ),
						"desc" => __( 'Choose a link color', 'organizedthemes' ),
						"id" => "link_color",
						"std" => "",
						"type" => "color");	
	
	$options['link_color_hover'] = array( "name" => __( 'Link Color (hover)', 'organizedthemes' ),
						"desc" => __( 'Choose a link color while hovering', 'organizedthemes' ),
						"id" => "link_color_hover",
						"std" => "",
						"type" => "color");
	
	
	
	$options[] = array(
		'name' => __('Products', 'organizedthemes'),
		'desc' => __('', 'organizedthemes'),
		'type' => 'info');
	
	$options['product_text'] = array( "name" => __( 'Product Text', 'organizedthemes' ),
						"desc" => __( 'This sets the text color of products in your store catalog.', 'organizedthemes' ),
						"id" => "product_text",
						"std" => "",
						"type" => "color");
	
	$options['product_background'] = array( "name" => __( 'Product Background', 'organizedthemes' ),
						"desc" => __( 'This sets the background color of products in your store catalog.', 'organizedthemes' ),
						"id" => "product_background",
						"std" => "",
						"type" => "color");
	
	
	
$options[] = array( "name" => __( 'Footer', 'organizedthemes' ),
					"desc" => __( '', 'organizedthemes' ),
					"type" => "heading");
	
	$options['footer_text'] = array( "name" => __( 'Custom Footer Text (Left)', 'organizedthemes' ),
						"desc" => __( 'The text you enter here will be displayed in the left hand side of the footer.', 'organizedthemes' ),
						"id" => "footer_text",
						"std" => "",
						"type" => "text");
	
	$options['footer_text_right'] = array( "name" => __( 'Custom Footer Text (Right)', 'organizedthemes' ),
						"desc" => __( 'The text you enter here will be displayed in the right hand side of the footer.  If you\'d like to use a navigation menu, leave this blank.', 'organizedthemes' ),
						"id" => "footer_text_right",
						"std" => "",
						"type" => "text");
			
	$options['footer_color'] = array( "name" => __( 'Footer Text Color', 'organizedthemes' ),
						"desc" => __( 'Your footer text color', 'organizedthemes' ),
						"id" => "footer_color",
						"std" => "",
						"type" => "color");
	
	$options['footer_background_color'] = array( "name" => __( 'Footer Background Color', 'organizedthemes' ),
						"desc" => __( 'The background color of your footer', 'organizedthemes' ),
						"id" => "footer_background_color",
						"std" => "",
						"type" => "color");
	
	$options['footer_link_color'] = array( "name" => __( 'Footer Link Color', 'organizedthemes' ),
						"desc" => __( 'The color of links in your footer.', 'organizedthemes' ),
						"id" => "footer_link_color",
						"std" => "",
						"type" => "color");
	
	$options['footer_link_color_hover'] = array( "name" => __( 'Footer Link Color (Hover)', 'organizedthemes' ),
						"desc" => __( 'The color of links in your footer while hovering.', 'organizedthemes' ),
						"id" => "footer_link_color_hover",
						"std" => "",
						"type" => "color");		
	
	$options['footer_line'] = array( "name" => __( 'Footer Line Color', 'organizedthemes' ),
						"desc" => __( 'This is the color of the dividers between the footer navigation items and also the border between the footer widgets and the rest of the footer.', 'organizedthemes' ),
						"id" => "footer_line",
						"std" => "",
						"type" => "color");	
	


	
	


// Widget Options						
	$options[] = array( "name" => __( 'Widgets', 'organizedthemes' ),
						"type" => "heading");
	
	
	$options['widget_title_font'] = array( 'name' => __( 'Widget Title Font', 'organizedthemes' ),
			'desc' => __( 'The heading at the top of a widget.', 'organizedthemes' ),
			'id' => 'widget_title_font',
			'std' => array( 'size' => '24px', 'face' => 'Open Sans, sans-serif', 'color' => '#000000'),
			'type' => 'typography',
			'options' => array(
				'faces' => options_typography_get_google_fonts(),
				'styles' => false,
				'color' => false )
			);
	
	$options['widget_title'] = array( "name" => __( 'Widget Title', 'organizedthemes' ),
						"desc" => __( 'The color of your widget titles.', 'organizedthemes' ),
						"id" => "widget_title",
						"std" => "",
						"type" => "color");
	
	$options['widget_text'] = array( "name" => __( 'Widget Text', 'organizedthemes' ),
						"desc" => __( 'Color for the text in your widgets.', 'organizedthemes' ),
						"id" => "widget_text",
						"std" => "",
						"type" => "color");
	
	$options['widget_background'] = array( "name" => __( 'Widget Backgound', 'organizedthemes' ),
						"desc" => __( 'Background color for your widgets.', 'organizedthemes' ),
						"id" => "widget_background",
						"std" => "",
						"type" => "color");


	
$options[] = array( "name" => __( 'Buttons', 'organizedthemes' ),
					"type" => "heading");
		
	
	$options['button'] = array( "name" => __( 'Button Text', 'organizedthemes' ),
						"desc" => __( 'Text color for buttons.', 'organizedthemes' ),
						"id" => "button",
						"std" => "",
						"type" => "color");
	
	$options['button_background'] = array( "name" => __( 'Button Background', 'organizedthemes' ),
						"desc" => __( 'Background color for buttons.', 'organizedthemes' ),
						"id" => "button_background",
						"std" => "",
						"type" => "color");
	
	$options['button_hover'] = array( "name" => __( 'Button Text (hover)', 'organizedthemes' ),
						"desc" => __( 'Text color for buttons while hovering.', 'organizedthemes' ),
						"id" => "button_hover",
						"std" => "",
						"type" => "color");
	
	$options['button_background_hover'] = array( "name" => __( 'Button Background (hover)', 'organizedthemes' ),
						"desc" => __( 'Background color for buttons while hovering.', 'organizedthemes' ),
						"id" => "button_background_hover",
						"std" => "",
						"type" => "color");
	
	
	$options[] = array(
		'name' => __('Social Media Icons', 'organizedthemes'),
		'desc' => __('', 'organizedthemes'),
		'type' => 'info');
	
	$options['social_color'] = array( "name" => __( 'Social Icon Color', 'organizedthemes' ),
						"desc" => __( 'The forground color of the icon.', 'organizedthemes' ),
						"id" => "social_color",
						"std" => "",
						"type" => "color");
	
	$options['social_color_background'] = array( "name" => __( 'Socail Icon Background Color', 'organizedthemes' ),
						"desc" => __( 'The background color of the icon.', 'organizedthemes' ),
						"id" => "social_color_background",
						"std" => "",
						"type" => "color");
	
	$options['social_color_hover'] = array( "name" => __( 'Social Icon Color Hover', 'organizedthemes' ),
						"desc" => __( 'The forground color of the icon while hovering.', 'organizedthemes' ),
						"id" => "social_color_hover",
						"std" => "",
						"type" => "color");
	
	$options['social_color_background_hover'] = array( "name" => __( 'Socail Icon Background Color Hover', 'organizedthemes' ),
						"desc" => __( 'The background color of the icon while hovering.', 'organizedthemes' ),
						"id" => "social_color_background_hover",
						"std" => "",
						"type" => "color");




$options[] = array( "name" => __( 'Advanced', 'organizedthemes' ),
					"type" => "heading");	
	
	$options[] = array( "name" => __( 'URL Slug For Staff Members', 'organizedthemes' ),
						"desc" => __( 'You can enter a new slug for your staff member\'s individual URL\'s here.  Must be all lowercase with no special characters or spaces.  After changing this you will need to resave your permalinks to prevent not found errors.', 'organizedthemes' ),
						"id" => "staff_slug",
						"std" => "staff",
						"type" => "text");
	
	
	$options[] = array( "name" => __( 'URL Slug For Staff Groups', 'organizedthemes' ),
						"desc" => __( 'You can enter a new slug for your staff group\'s URL here.  Must be all lowercase with no special characters or spaces.  After changing this you will need to resave your permalinks to prevent not found errors.', 'organizedthemes' ),
						"id" => "staff_group_slug",
						"std" => "staff-group",
						"type" => "text");
	
	$options[] = array( 'name' => __( 'Disable Theme Updates', 'organizedthemes' ),
		'desc' => __( 'Disables the theme updater feature.', 'organizedthemes' ),
		'id' => 'disable_theme_updater',
		'std' => false,
		'type' => 'checkbox' );				
	
	$options[] = array( 'name' => __( 'Disable Google Fonts', 'organizedthemes' ),
		'desc' => __( 'Turns off the output of Google fonts.', 'organizedthemes' ),
		'id' => 'disable_fonts',
		'std' => false,
		'type' => 'checkbox' );
				
							
	$options['custom_css'] = array( "name" => __( 'Custom CSS', 'organizedthemes' ),
		"desc" => __( 'Add any custom CSS you would like to use here.', 'organizedthemes' ),
		"id" => "custom_css",
		"std" => "",
		"type" => "textarea"); 
		
						
	return $options;
}

