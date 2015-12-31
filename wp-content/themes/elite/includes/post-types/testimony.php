<?php

/**
 * Adds our testimony post type
 * and the testimony group taxonomy
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 *
 */

	// Register the testimony post type and testimony group taxonomy
		if ( ! function_exists( 'organizedthemes_testimony_register' ) ):
	
			function organizedthemes_testimony_register() {
	
				register_post_type( 'testimony',
					array(
						'labels' 				=> array(
						'name' 					=> __( 'Testimonies', 'organizedthemes' ),
						'singular_name' 		=> __( 'Testimony', 'organizedthemes' ),
						'add_new' 				=> __( 'Add New Testimony', 'organizedthemes' ),
						'add_new_item' 			=> __( 'Add New Testimony', 'organizedthemes' ),
						'edit' 					=> __( 'Edit', 'organizedthemes' ),
						'edit_item' 			=> __( 'Edit Testimony', 'organizedthemes' ),
						'view' 					=> __( 'View Testimony', 'organizedthemes' ),
						'view_item' 			=> __( 'View Testimony', 'organizedthemes' ),
						'not_found' 			=> __( 'No testimonies', 'organizedthemes' ),
						'not_found_in_trash' 	=> __( 'Your testimony is not in the trash', 'organizedthemes' ),
					),
						'public' 				=> true,
						'show_ui' 				=> true,
						'hierarchical' 			=> true,
						'publicly_queryable' 	=> true,
						'exclude_from_search' 	=> false,
						'show_in_nav_menus'		=> false,
			    		'supports' 				=> array('title', 'editor', 'page-attributes')
					)
					
				);
		
		}
		
		endif; // organizedthemes_testimony_register
		
		add_action( 'init', 'organizedthemes_testimony_register' );
			
	
	
	
	// Add custom columns
		add_filter( 'manage_edit-testimony_columns', 'organizedthemes_testimony_column_names' ) ;
		
		function organizedthemes_testimony_column_names( $columns ) {
		
			$columns = array(
				'cb' 				=> '<input type="checkbox" />',
				'title' 			=> __( 'Name' ),
				'testimony_content' => __( 'Content' )
			);
		
			return $columns;
		}
		
		
		add_action( 'manage_testimony_posts_custom_column', 'organizedthemes_manage_testimony_columns', 10, 2 );
		
		function organizedthemes_manage_testimony_columns( $column, $post_id ) {
			
			global $post;
		
			switch( $column ) {
			
				
				/* If displaying the 'job title' column. */
				case 'testimony_title' :
		
					/* Get the post meta. */
					$job_title = get_post_meta( $post_id, 'title', true );
		
					/* If no duration is found, output a default message. */
					if ( empty( $job_title ) )
						echo __( '', 'organizedthemes' );
		
					/* If there is a duration, append 'minutes' to the text string. */
					else
						printf( __( '%s' ), $job_title );
		
					break;
		
				/* If displaying the 'testimony-group' column. */
				case "testimony_content": //Adds the excerpt to the bio column
					the_excerpt();
					break;
		
				/* Just break out of the switch statement for everything else. */
				default :
					break;
			}
		}