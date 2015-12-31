<?php

/**
 * Adds our staff post type
 * and the staff group taxonomy
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 *
 */

	// Register the staff post type and staff group taxonomy
		if ( ! function_exists( 'organizedthemes_staff_register' ) ):
	
			function organizedthemes_staff_register() {
				
				$staff_slug = of_get_option('staff_slug', 'staff');
				
				register_post_type( 'staff',
					array(
						'labels' 				=> array(
						'name' 					=> __( 'Staff', 'organizedthemes' ),
						'singular_name' 		=> __( 'Staff', 'organizedthemes' ),
						'add_new' 				=> __( 'Add New Staff Member', 'organizedthemes' ),
						'add_new_item' 			=> __( 'Add New Staff Member', 'organizedthemes' ),
						'edit' 					=> __( 'Edit', 'organizedthemes' ),
						'edit_item' 			=> __( 'Edit Staff Member', 'organizedthemes' ),
						'view' 					=> __( 'View Staff', 'organizedthemes' ),
						'view_item' 			=> __( 'View Staff Member', 'organizedthemes' ),
						'not_found' 			=> __( 'No staff members', 'organizedthemes' ),
						'not_found_in_trash' 	=> __( 'Your staff is not in the trash', 'organizedthemes' ),
					),
						'public' 				=> true,
						'show_ui' 				=> true,
						'hierarchical' 			=> true,
						'publicly_queryable' 	=> true,
						'exclude_from_search' 	=> false,
						'show_in_nav_menus'		=> false,
						'rewrite' 				=> array( 'slug' => $staff_slug ),
			    		'supports' 				=> array('title', 'editor', 'thumbnail', 'page-attributes')
					)
					
				);
	
			// Register Staff Group Taxonomy
			
				$staff_group_slug = of_get_option('staff_group_slug', 'staff-group');
			
				register_taxonomy( 'staff-group', 'staff', 
					array( 
						'hierarchical' => true, 
							'labels' => array(
								'name' 				=> __( 'Staff Group', 'organizedthemes' ),
								'singular_name' 	=> __( 'Staff Group', 'organizedthemes' ),
								'search_items' 		=> __( 'Search Staff Groups', 'organizedthemes' ),
								'popular_items' 	=> __( 'Popular Staff Groups', 'organizedthemes' ),
								'all_items' 		=> __( 'All Staff Types', 'organizedthemes' ),
								'parent_item' 		=> __( 'Parent Staff Groups', 'organizedthemes' ),
								'parent_item_colon' => __( 'Parent Staff Groups:', 'organizedthemes' ),
								'edit_item' 		=> __( 'Edit Staff Group', 'organizedthemes' ),
								'update_item' 		=> __( 'Update Staff Group', 'organizedthemes' ),
								'add_new_item' 		=> __( 'Add New Staff Group', 'organizedthemes' ),
								'new_item_name' 	=> __( 'New Staff Group Name', 'organizedthemes' ),
							), 
						'query_var' => true,
						'show_in_nav_menus' => true,
						'show_admin_column' => true,
						'rewrite' => array( 'slug' => $staff_group_slug, 'with_front' => false )
						) 
				);
		
		}
		
		endif; // organizedthemes_staff_register
		
		add_action( 'init', 'organizedthemes_staff_register' );
	
	
	
	//change title to staff member name
		function organizedthemes_staff_title( $title ){
		     $screen = get_current_screen();
		 
		     if  ( 'staff' == $screen->post_type ) {
		          $title = 'Staff Member Name';
		     }
		 
		     return $title;
		}
		 
		add_filter( 'enter_title_here', 'organizedthemes_staff_title' );
			
	
	
	
	// Add custom columns
		add_filter( 'manage_edit-staff_columns', 'organizedthemes_staff_column_names' ) ;
		
		function organizedthemes_staff_column_names( $columns ) {
		
			$columns = array(
				'cb' => '<input type="checkbox" />',
				"slide_thumbnail" 	=> __('Image', 'organizedthemes'),
				'title' => __( 'Name', 'organizedthemes' ),
				'staff_title' => __( 'Title', 'organizedthemes' ),
				'staff_group' => __( 'Staff Group', 'organizedthemes' ),
				'date' => __( 'Date', 'organizedthemes' )
			);
		
			return $columns;
		}
		
		
		add_action( 'manage_staff_posts_custom_column', 'organizedthemes_manage_staff_columns', 10, 2 );
		
		function organizedthemes_manage_staff_columns( $column, $post_id ) {
			
			global $post;
		
			switch( $column ) {
				
				case "slide_thumbnail": //Adds the slide thumnail to the columns
					$width = (int) 400;
					$height = (int) 300;
					$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
					
					// Display the featured image in the column view if possible
					if ($thumbnail_id) {
						$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
					}
					break;
				
				/* If displaying the 'job title' column. */
				case 'staff_title' :
		
					/* Get the post meta. */
					$job_title = get_post_meta( $post_id, 'title', true );
		
					/* If no duration is found, output a default message. */
					if ( empty( $job_title ) )
						echo __( '', 'organizedthemes' );
		
					/* If there is a duration, append 'minutes' to the text string. */
					else
						printf( __( '%s' ), $job_title );
		
					break;
		
				/* If displaying the 'staff-group' column. */
				case 'staff_group' :
		
					/* Get the genres for the post. */
					$terms = get_the_terms( $post_id, 'staff-group' );
		
					/* If terms were found. */
					if ( !empty( $terms ) ) {
		
						$out = array();
		
						/* Loop through each term, linking to the 'edit posts' page for the specific term. */
						foreach ( $terms as $term ) {
							$out[] = sprintf( '<a href="%s">%s</a>',
								esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'staff-group' => $term->slug ), 'edit.php' ) ),
								esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'staff-group', 'display' ) )
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
		
				/* Just break out of the switch statement for everything else. */
				default :
					break;
			}
		}
	
	
	// Shortcodes for Staff Groups
	
		// Shortcode uses this format [staff group="core"]
		// where core is the slug of the taxonomy being used
		
			add_shortcode( 'staff', 'organizedthemes_staff_shortcode' );
			
			function organizedthemes_staff_shortcode( $atts ){
			 	
			 	extract(shortcode_atts(array(
				  'group' => 1,
				), $atts));
			 	
			    ob_start();
			 	
			 	global $post;
			 	
			    $args = array(
			    	'tax_query' => array(
			   		        array(
			   		            'taxonomy' => 'staff-group',
			   		            'terms' => $group,
			   		            'field' => 'slug'
			   		        )
			   		    ),
			    	'orderby' => 'menu_order', 
			    	'order' => 'ASC', 
			    	'showposts' => -1 
			    	);
			    	
			    $loop = new WP_Query( $args );
			 	
			    echo '<div id="staff-list">';
			 	
			        while ( $loop->have_posts() ) : $loop->the_post(); ?>
			 
			           <?php get_template_part( 'layouts/staff-group-item' ); ?>
			            	 
			        <?php endwhile; wp_reset_query(); ?>
			 
			    <?php 
			    
			    echo '</div><!-- #staff-list -->';
			 
			    $content = ob_get_contents();
			    ob_end_clean();
			    
			    return $content;
			
			}
				