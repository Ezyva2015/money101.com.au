<?php

/**
 * Adds our slides post type
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 *
 */
 
// Registers the slides post type

	if ( ! function_exists( 'organizedthemes_slides_register' ) ):

		function organizedthemes_slides_register() {
			
			// Register slide post type
				$labels = array(
					'name' 			=> __( 'Slides', 'organizedthemes' ),
					'singular_name' => __( 'Slide', 'organizedthemes' ),
					'add_new' 		=> __( 'Add Slide', 'organizedthemes' ),
					'add_new_item' 	=> __( 'Add New Slide', 'organizedthemes' ),
					'edit_item' 	=> __( 'Edit Slide', 'organizedthemes' ),
					'new_item' 		=> __( 'Add New Slide', 'organizedthemes' ),
					'view_item' 	=> __( 'View Slide', 'organizedthemes' ),
					'search_items' 	=> __( 'Search Slides', 'organizedthemes' ),
					'not_found' 	=> __( 'No slides found', 'organizedthemes' ),
					'not_found_in_trash' => __( 'No slides in trash', 'organizedthemes' )
				);
			
				$args = array(
			    	'labels' 				=> $labels,
			    	'public' 				=> true,
					'supports' 				=> array( 'title', 'thumbnail', 'page-attributes' ),
					'capability_type' 		=> 'post',
					'rewrite' 				=> array("slug" => "slide"),
					'exclude_from_search' 	=> true,
					'menu_position' 		=> 5,
					'hierarchical' 			=> true,
					'has_archive' 			=> false,
					'show_in_nav_menus'		=> false,
				); 
			
				register_post_type( 'slide', $args);
				
		// register slide group taxonomy
			register_taxonomy( 'slide-group', 'slide', 
				array( 
					'hierarchical' => true, 
						'labels' => array(
							'name' 				=> __( 'Slide Group', 'organizedthemes' ),
							'singular_name' 	=> __( 'Slide Group', 'organizedthemes' ),
							'search_items' 		=> __( 'Search Slide Groups', 'organizedthemes' ),
							'popular_items' 	=> __( 'Popular Slide Groups', 'organizedthemes' ),
							'all_items' 		=> __( 'All Slide Groups', 'organizedthemes' ),
							'parent_item' 		=> __( 'Parent Slide Group', 'organizedthemes' ),
							'parent_item_colon' => __( 'Parent Slide Group:', 'organizedthemes' ),
							'edit_item' 		=> __( 'Edit Slide Group', 'organizedthemes' ),
							'update_item' 		=> __( 'Update Slide Group', 'organizedthemes' ),
							'add_new_item' 		=> __( 'Add New Slide Group', 'organizedthemes' ),
							'new_item_name' 	=> __( 'New Slide Group Name', 'organizedthemes' ),
						), 
					'query_var' 			=> true,
					'show_in_nav_menus'		=> false,
					'show_admin_column' 	=> true,
					'rewrite' => array( 'slug' => 'slide-group', 'with_front' => false )
					) 
			); 	
		
		}
		
	endif; // organizedthemes_slides_register
	
	add_action( 'init', 'organizedthemes_slides_register' );

//  Add columns to slide dashboard
	//  http://wptheming.com/2010/07/column-edit-pages/
	
	add_filter("manage_edit-slide_columns", "slide_edit_columns");
	add_action("manage_pages_custom_column",  "slide_columns_display", 10, 2);
	
	 
	function slide_edit_columns($slide_columns){
		$slide_columns = array(
			"cb" 				=> "<input type=\"checkbox\" />",
			"title" 			=> __('Description', 'organizedthemes'),
			"slide_thumbnail" 	=> __('Image', 'organizedthemes'),
			"slide_group" 		=> __('Slide Group', 'organizedthemes'),
		);
		return $slide_columns;
	}
	 
	function slide_columns_display($slide_columns, $post_id){
	
		switch ($slide_columns) {
			// Code from: http://wpengineer.com/display-post-thumbnail-post-page-overview
			
			case "slide_thumbnail": //Adds the slide thumnail to the columns
				$width = (int) 400;
				$height = (int) 300;
				$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
				
				// Display the featured image in the column view if possible
				if ($thumbnail_id) {
					$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
				}
				if ( isset($thumb) ) {
					echo $thumb;
				} else {
					$custom = get_post_custom();
					echo $custom["slide_video"][0];
				}
				break;
				
					/* If displaying the 'slide-group' column. */
					case 'slide_group' :
			
						/* Get the genres for the post. */
						$terms = get_the_terms( $post_id, 'slide-group' );
			
						/* If terms were found. */
						if ( !empty( $terms ) ) {
			
							$out = array();
			
							/* Loop through each term, linking to the 'edit posts' page for the specific term. */
							foreach ( $terms as $term ) {
								$out[] = sprintf( '<a href="%s">%s</a>',
									esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'slide-group' => $term->slug ), 'edit.php' ) ),
									esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'slide-group', 'display' ) )
								);
							}
			
							/* Join the terms, separating them with a comma. */
							echo join( ', ', $out );
						}
			
						/* If no terms were found, output a default message. */
						else {
							_e( '' );
						}
			
						break;
			
		}
	}

//change title to slide description
	function organizedthemes_slide_title( $title ){
	     $screen = get_current_screen();
	 
	     if  ( 'slide' == $screen->post_type ) {
	          $title = 'Enter Slide Description (not publically visible)';
	     }
	 
	     return $title;
	}
	 
	add_filter( 'enter_title_here', 'organizedthemes_slide_title' );


// Add default slide group on theme activation
	function elite_slide_group_create() {
		wp_insert_term(
			'Default',
			'slide-group',
			array(
			  'description'	=> __( 'This is the default slide group.', 'organizedthemes' )
			)
		);
	}
	add_action( 'init', 'elite_slide_group_create' );
