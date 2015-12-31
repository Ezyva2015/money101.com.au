<?php
// Include & setup custom metabox and fields
add_filter( 'cmb_meta_boxes', 'elite_metaboxes' );
function elite_metaboxes( $meta_boxes ) {
	
	$meta_boxes[] = array(
		'id'         => 'layout_metabox',
		'title'      => __( 'Layouts', 'organizedthemes' ),
		'pages'      => array( 'page', 'post', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => __( 'Layout', 'organizedthemes' ),
				'desc' => '',
				'id'   => 'page_layout',
				'type'    => 'select',
						'options' => array(
							array( 'name' => __( 'Default (set in theme options)', 'organizedthemes' ), 'value' => 'default', ),
							array( 'name' => __( 'Left Content/Right Sidebar', 'organizedthemes' ), 'value' => 'content-left', ),
							array( 'name' => __( 'Right Content/Left Sidebar', 'organizedthemes' ), 'value' => 'content-right', ),
							array( 'name' => __( 'Full Content (no sidebar)', 'organizedthemes' ), 'value' => 'content-full', ),
						),
			),
						
		),
	);
	
	$meta_boxes[] = array(
		'id'         => 'product_hero',
		'title'      => __( 'Product Hero Image', 'organizedthemes' ),
		'pages'      => array( 'product', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
                    'name' => __( 'Optional Hero Image', 'organizedthemes' ),
                    'desc' => __( 'To include a hero image with your product, upload it here.  Unlike a page/post, products do not use the featured image for the hero picture.  You will still need to choose the image format.', 'organizedthemes' ),
                    'id'   => 'hero_image',
                    'type' => 'file',
            ),
						
		),
	);
		
	
	$meta_boxes[] = array(
		'id'         => 'hero_options',
		'title'      => __( 'Hero Area Options', 'organizedthemes' ),
		'pages'      => array( 'slide', 'page', 'post', 'product', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			
			array(
				'name' => __( 'Hero Title', 'organizedthemes' ),
				'desc' => '',
				'id'   => 'hero_title',
				'type' => 'text',
			),
			
			array(
				'name' => __( 'Hero Caption', 'organizedthemes' ),
				'desc' => '',
				'id'   => 'hero_caption',
				'type' => 'text',
			),	
			
			array(
				'name' => __( 'Hero Button Text', 'organizedthemes' ),
				'desc' => '',
				'id'   => 'hero_button_text',
				'type' => 'text',
			),
			
			array(
				'name' => __( 'Hero Button URL', 'organizedthemes' ),
				'desc' => '',
				'id'   => 'hero_button_url',
				'type' => 'text',
			),
			
			array(
				'name' => __( 'Alignment', 'organizedthemes' ),
				'desc' => '',
				'id'   => 'hero_alignment',
				'type'    => 'select',
						'options' => array(
							array( 'name' => __( 'Left', 'organizedthemes' ), 'value' => 'left-text', ),
							array( 'name' => __( 'Center', 'organizedthemes' ), 'value' => 'center-text', ),
							array( 'name' => __( 'Right', 'organizedthemes' ), 'value' => 'right-text', ),
						),
			),
			
			array(
				'name' => __( 'Video Embed Code', 'organizedthemes' ),
				'desc' => __( 'If this is a video, place your embed code here.', 'organizedthemes' ),
				'id'   => 'slide_video',
				'type' => 'textarea_code',
			),
			
			array(
			    'name' => __( 'Title Color', 'organizedthemes' ),
			    'desc' => __( 'Sets the color of the title.', 'organizedthemes' ),
			    'id'   => 'hero_title_color',
			    'type' => 'colorpicker',
				'std'  => ''
			),
			
			array(
			    'name' => __( 'Title Background Color', 'organizedthemes' ),
			    'desc' => __( 'Sets the background color of the title.  Leave blank for transparent.', 'organizedthemes' ),
			    'id'   => 'hero_title_background',
			    'type' => 'colorpicker',
				'std'  => ''
			),
			
			array(
			    'name' => __( 'Caption Color', 'organizedthemes' ),
			    'desc' => __( 'Sets the color of your smaller text.', 'organizedthemes' ),
			    'id'   => 'hero_text_color',
			    'type' => 'colorpicker',
				'std'  => ''
			),
			
			array(
			    'name' => __( 'Caption Background Color', 'organizedthemes' ),
			    'desc' => __( 'Sets the background color of your smaller text.  Leave blank for transparent.', 'organizedthemes' ),
			    'id'   => 'hero_text_background',
			    'type' => 'colorpicker',
				'std'  => ''
			),
			
			array(
			    'name' => __( 'Button Text Color', 'organizedthemes' ),
			    'desc' => __( 'Sets the text color of your button text.', 'organizedthemes' ),
			    'id'   => 'hero_button_text_color',
			    'type' => 'colorpicker',
				'std'  => ''
			),
			
			array(
			    'name' => __( 'Button Background Color', 'organizedthemes' ),
			    'desc' => __( 'Sets the background color of your button.', 'organizedthemes' ),
			    'id'   => 'hero_button_background',
			    'type' => 'colorpicker',
				'std'  => ''
			),
			
			array(
			    'name' => __( 'Button Text Color Hover', 'organizedthemes' ),
			    'desc' => __( 'Sets the text color of your button text while hovering.', 'organizedthemes' ),
			    'id'   => 'hero_button_text_hover',
			    'type' => 'colorpicker',
				'std'  => ''
			),
			
			array(
			    'name' => __( 'Button Background Color Hover', 'organizedthemes' ),
			    'desc' => __( 'Sets the background color of your button text while hovering.', 'organizedthemes' ),
			    'id'   => 'hero_button_background_hover',
			    'type' => 'colorpicker',
				'std'  => ''
			),
	

		),
	);
	
	
	$meta_boxes[] = array(
		'id'         => 'slider_metabox',
		'title'      => __( 'Slide Group', 'organizedthemes' ),
		'pages'      => array( 'page', 'post', 'product',  ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			
			array(
				'name'     => __( 'Select A Slide Group', 'organizedthemes' ),
				'desc'     => __( 'If this is a gallery format, choose your slide group here.', 'organizedthemes' ),
				'id'       => 'slide_group_select',
				'type'     => 'taxonomy_select',
				'taxonomy' => 'slide-group', // Taxonomy Slug
			),	
		),
	);
	
	
	
	
	$meta_boxes[] = array(
		'id'         => 'staff_metabox',
		'title'      => __( 'Staff Details', 'organizedthemes' ),
		'pages'      => array( 'staff', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => __( 'Job Title', 'organizedthemes' ),
				'desc' => '',
				'id'   => 'title',
				'type' => 'text',
			),
			array(
				'name' => __( 'Network 1 Link', 'organizedthemes' ),
				'desc' => '',
				'id'   => 'network_1_link',
				'type' => 'text',
			),
			array(
				'name' => __( 'Network 1 Icon', 'organizedthemes' ),
				'desc' => '',
				'id'   => 'network_1_icon',
				'type'    => 'select',
						'options' => array(
							array( 'name' => __( 'Dribbble', 'organizedthemes' ), 'value' => 'dribbble', ),
							array( 'name' => __( 'Email', 'organizedthemes' ), 'value' => 'email', ),
							array( 'name' => __( 'Facebook', 'organizedthemes' ), 'value' => 'facebook', ),
							array( 'name' => __( 'Flickr', 'organizedthemes' ), 'value' => 'flickr', ),
							array( 'name' => __( 'Forrst', 'organizedthemes' ), 'value' => 'forrst', ),
							array( 'name' => __( 'Google Plus', 'organizedthemes' ), 'value' => 'google', ),
							array( 'name' => __( 'Instagram', 'organizedthemes' ), 'value' => 'instagram', ),
							array( 'name' => __( 'LinkedIn', 'organizedthemes' ), 'value' => 'linkedin', ),
							array( 'name' => __( 'Pinterest', 'organizedthemes' ), 'value' => 'pinterest', ),
							array( 'name' => __( 'RSS', 'organizedthemes' ), 'value' => 'rss', ),
							array( 'name' => __( 'Skype', 'organizedthemes' ), 'value' => 'skype', ),
							array( 'name' => __( 'Twitter', 'organizedthemes' ), 'value' => 'twitter', ),
							array( 'name' => __( 'Yelp', 'organizedthemes' ), 'value' => 'yelp', ),
							array( 'name' => __( 'YouTube', 'organizedthemes' ), 'value' => 'youtube', ),
							array( 'name' => __( 'Vimeo', 'organizedthemes' ), 'value' => 'vimeo', ),
						),
			),	
			
			array(
				'name' => __( 'Network 2 Link', 'organizedthemes' ),
				'desc' => '',
				'id'   => 'network_2_link',
				'type' => 'text',
			),
			array(
				'name' => __( 'Network 2 Icon', 'organizedthemes' ),
				'desc' => '',
				'id'   => 'network_2_icon',
				'type'    => 'select',
						'options' => array(
							array( 'name' => __( 'Dribbble', 'organizedthemes' ), 'value' => 'dribbble', ),
							array( 'name' => __( 'Email', 'organizedthemes' ), 'value' => 'email', ),
							array( 'name' => __( 'Facebook', 'organizedthemes' ), 'value' => 'facebook', ),
							array( 'name' => __( 'Flickr', 'organizedthemes' ), 'value' => 'flickr', ),
							array( 'name' => __( 'Forrst', 'organizedthemes' ), 'value' => 'forrst', ),
							array( 'name' => __( 'Google Plus', 'organizedthemes' ), 'value' => 'google', ),
							array( 'name' => __( 'Instagram', 'organizedthemes' ), 'value' => 'instagram', ),
							array( 'name' => __( 'LinkedIn', 'organizedthemes' ), 'value' => 'linkedin', ),
							array( 'name' => __( 'Pinterest', 'organizedthemes' ), 'value' => 'pinterest', ),
							array( 'name' => __( 'RSS', 'organizedthemes' ), 'value' => 'rss', ),
							array( 'name' => __( 'Skype', 'organizedthemes' ), 'value' => 'skype', ),
							array( 'name' => __( 'Twitter', 'organizedthemes' ), 'value' => 'twitter', ),
							array( 'name' => __( 'Yelp', 'organizedthemes' ), 'value' => 'yelp', ),
							array( 'name' => __( 'YouTube', 'organizedthemes' ), 'value' => 'youtube', ),
							array( 'name' => __( 'Vimeo', 'organizedthemes' ), 'value' => 'vimeo', ),
						),
			),
			
			array(
				'name' => __( 'Network 3 Link', 'organizedthemes' ),
				'desc' => '',
				'id'   => 'network_3_link',
				'type' => 'text',
			),
			array(
				'name' => __( 'Network 3 Icon', 'organizedthemes' ),
				'desc' => '',
				'id'   => 'network_3_icon',
				'type'    => 'select',
						'options' => array(
							array( 'name' => __( 'Dribbble', 'organizedthemes' ), 'value' => 'dribbble', ),
							array( 'name' => __( 'Email', 'organizedthemes' ), 'value' => 'email', ),
							array( 'name' => __( 'Facebook', 'organizedthemes' ), 'value' => 'facebook', ),
							array( 'name' => __( 'Flickr', 'organizedthemes' ), 'value' => 'flickr', ),
							array( 'name' => __( 'Forrst', 'organizedthemes' ), 'value' => 'forrst', ),
							array( 'name' => __( 'Google Plus', 'organizedthemes' ), 'value' => 'google', ),
							array( 'name' => __( 'Instagram', 'organizedthemes' ), 'value' => 'instagram', ),
							array( 'name' => __( 'LinkedIn', 'organizedthemes' ), 'value' => 'linkedin', ),
							array( 'name' => __( 'Pinterest', 'organizedthemes' ), 'value' => 'pinterest', ),
							array( 'name' => __( 'RSS', 'organizedthemes' ), 'value' => 'rss', ),
							array( 'name' => __( 'Skype', 'organizedthemes' ), 'value' => 'skype', ),
							array( 'name' => __( 'Twitter', 'organizedthemes' ), 'value' => 'twitter', ),
							array( 'name' => __( 'Yelp', 'organizedthemes' ), 'value' => 'yelp', ),
							array( 'name' => __( 'YouTube', 'organizedthemes' ), 'value' => 'youtube', ),
							array( 'name' => __( 'Vimeo', 'organizedthemes' ), 'value' => 'vimeo', ),
						),
			),	
			
			
			array(
				'name' => __( 'Network 4 Link', 'organizedthemes' ),
				'desc' => '',
				'id'   => 'network_4_link',
				'type' => 'text',
			),
			array(
				'name' => __( 'Network 4 Icon', 'organizedthemes' ),
				'desc' => '',
				'id'   => 'network_4_icon',
				'type'    => 'select',
						'options' => array(
							array( 'name' => __( 'Dribbble', 'organizedthemes' ), 'value' => 'dribbble', ),
							array( 'name' => __( 'Email', 'organizedthemes' ), 'value' => 'email', ),
							array( 'name' => __( 'Facebook', 'organizedthemes' ), 'value' => 'facebook', ),
							array( 'name' => __( 'Flickr', 'organizedthemes' ), 'value' => 'flickr', ),
							array( 'name' => __( 'Forrst', 'organizedthemes' ), 'value' => 'forrst', ),
							array( 'name' => __( 'Google Plus', 'organizedthemes' ), 'value' => 'google', ),
							array( 'name' => __( 'Instagram', 'organizedthemes' ), 'value' => 'instagram', ),
							array( 'name' => __( 'LinkedIn', 'organizedthemes' ), 'value' => 'linkedin', ),
							array( 'name' => __( 'Pinterest', 'organizedthemes' ), 'value' => 'pinterest', ),
							array( 'name' => __( 'RSS', 'organizedthemes' ), 'value' => 'rss', ),
							array( 'name' => __( 'Skype', 'organizedthemes' ), 'value' => 'skype', ),
							array( 'name' => __( 'Twitter', 'organizedthemes' ), 'value' => 'twitter', ),
							array( 'name' => __( 'Yelp', 'organizedthemes' ), 'value' => 'yelp', ),
							array( 'name' => __( 'YouTube', 'organizedthemes' ), 'value' => 'youtube', ),
							array( 'name' => __( 'Vimeo', 'organizedthemes' ), 'value' => 'vimeo', ),
						),
			),
			
			array(
				'name' => __( 'Network 5 Link', 'organizedthemes' ),
				'desc' => '',
				'id'   => 'network_5_link',
				'type' => 'text',
			),
			array(
				'name' => __( 'Network 5 Icon', 'organizedthemes' ),
				'desc' => '',
				'id'   => 'network_5_icon',
				'type'    => 'select',
						'options' => array(
							array( 'name' => __( 'Dribbble', 'organizedthemes' ), 'value' => 'dribbble', ),
							array( 'name' => __( 'Email', 'organizedthemes' ), 'value' => 'email', ),
							array( 'name' => __( 'Facebook', 'organizedthemes' ), 'value' => 'facebook', ),
							array( 'name' => __( 'Flickr', 'organizedthemes' ), 'value' => 'flickr', ),
							array( 'name' => __( 'Forrst', 'organizedthemes' ), 'value' => 'forrst', ),
							array( 'name' => __( 'Google Plus', 'organizedthemes' ), 'value' => 'google', ),
							array( 'name' => __( 'Instagram', 'organizedthemes' ), 'value' => 'instagram', ),
							array( 'name' => __( 'LinkedIn', 'organizedthemes' ), 'value' => 'linkedin', ),
							array( 'name' => __( 'Pinterest', 'organizedthemes' ), 'value' => 'pinterest', ),
							array( 'name' => __( 'RSS', 'organizedthemes' ), 'value' => 'rss', ),
							array( 'name' => __( 'Skype', 'organizedthemes' ), 'value' => 'skype', ),
							array( 'name' => __( 'Twitter', 'organizedthemes' ), 'value' => 'twitter', ),
							array( 'name' => __( 'Yelp', 'organizedthemes' ), 'value' => 'yelp', ),
							array( 'name' => __( 'YouTube', 'organizedthemes' ), 'value' => 'youtube', ),
							array( 'name' => __( 'Vimeo', 'organizedthemes' ), 'value' => 'vimeo', ),
						),
			),
			
			array(
				'name' => __( 'Network 6 Link', 'organizedthemes' ),
				'desc' => '',
				'id'   => 'network_6_link',
				'type' => 'text',
			),
			array(
				'name' => __( 'Network 6 Icon', 'organizedthemes' ),
				'desc' => '',
				'id'   => 'network_6_icon',
				'type'    => 'select',
						'options' => array(
							array( 'name' => __( 'Dribbble', 'organizedthemes' ), 'value' => 'dribbble', ),
							array( 'name' => __( 'Email', 'organizedthemes' ), 'value' => 'email', ),
							array( 'name' => __( 'Facebook', 'organizedthemes' ), 'value' => 'facebook', ),
							array( 'name' => __( 'Flickr', 'organizedthemes' ), 'value' => 'flickr', ),
							array( 'name' => __( 'Forrst', 'organizedthemes' ), 'value' => 'forrst', ),
							array( 'name' => __( 'Google Plus', 'organizedthemes' ), 'value' => 'google', ),
							array( 'name' => __( 'Instagram', 'organizedthemes' ), 'value' => 'instagram', ),
							array( 'name' => __( 'LinkedIn', 'organizedthemes' ), 'value' => 'linkedin', ),
							array( 'name' => __( 'Pinterest', 'organizedthemes' ), 'value' => 'pinterest', ),
							array( 'name' => __( 'RSS', 'organizedthemes' ), 'value' => 'rss', ),
							array( 'name' => __( 'Skype', 'organizedthemes' ), 'value' => 'skype', ),
							array( 'name' => __( 'Twitter', 'organizedthemes' ), 'value' => 'twitter', ),
							array( 'name' => __( 'Yelp', 'organizedthemes' ), 'value' => 'yelp', ),
							array( 'name' => __( 'YouTube', 'organizedthemes' ), 'value' => 'youtube', ),
							array( 'name' => __( 'Vimeo', 'organizedthemes' ), 'value' => 'vimeo', ),
						),
			),	
			
			array(
				'name' => __( 'Network 7 Link', 'organizedthemes' ),
				'desc' => '',
				'id'   => 'network_7_link',
				'type' => 'text',
			),
			array(
				'name' => __( 'Network 7 Icon', 'organizedthemes' ),
				'desc' => '',
				'id'   => 'network_7_icon',
				'type'    => 'select',
						'options' => array(
							array( 'name' => __( 'Dribbble', 'organizedthemes' ), 'value' => 'dribbble', ),
							array( 'name' => __( 'Email', 'organizedthemes' ), 'value' => 'email', ),
							array( 'name' => __( 'Facebook', 'organizedthemes' ), 'value' => 'facebook', ),
							array( 'name' => __( 'Flickr', 'organizedthemes' ), 'value' => 'flickr', ),
							array( 'name' => __( 'Forrst', 'organizedthemes' ), 'value' => 'forrst', ),
							array( 'name' => __( 'Google Plus', 'organizedthemes' ), 'value' => 'google', ),
							array( 'name' => __( 'Instagram', 'organizedthemes' ), 'value' => 'instagram', ),
							array( 'name' => __( 'LinkedIn', 'organizedthemes' ), 'value' => 'linkedin', ),
							array( 'name' => __( 'Pinterest', 'organizedthemes' ), 'value' => 'pinterest', ),
							array( 'name' => __( 'RSS', 'organizedthemes' ), 'value' => 'rss', ),
							array( 'name' => __( 'Skype', 'organizedthemes' ), 'value' => 'skype', ),
							array( 'name' => __( 'Twitter', 'organizedthemes' ), 'value' => 'twitter', ),
							array( 'name' => __( 'Yelp', 'organizedthemes' ), 'value' => 'yelp', ),
							array( 'name' => __( 'YouTube', 'organizedthemes' ), 'value' => 'youtube', ),
							array( 'name' => __( 'Vimeo', 'organizedthemes' ), 'value' => 'vimeo', ),
						),
			),		
			
			
			
				
			
		),
	);
	
	
	return $meta_boxes;
}


// Initialize the metabox class
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'init.php' );
	}
}