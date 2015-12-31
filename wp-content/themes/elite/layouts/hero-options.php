<?php
/**
 * Hero Section
 *
 * Creates our hero media elements
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 */

?>
<div id="hero-section">

	<?php global $post; ?>
	
	<?php if ( is_archive() || is_home() ) { ?>
	
		<?php // this prevents the first post from having it's hero section from being at the top of the blog/archive page ?>
	
	<?php } elseif ( has_post_format( 'image' ) ) { ?>
		
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
		
		<style>
			
			<?php if(get_post_meta($post->ID, "hero_image", $single = true) != ""){ ?>
				
				#hero-section { background-image: url(<?php echo get_post_meta($post->ID, "hero_image", TRUE); ?>) }
			
			<?php } else { ?>
		
				#hero-section { background-image: url(<?php echo $image[0]; ?>) }
			
			<?php } ?>
			
			<?php if(get_post_meta($post->ID, "hero_title_color", $single = true) != ""){ ?>
				.hero-copy h2.hero-title { color: <?php echo get_post_meta($post->ID, "hero_title_color", TRUE); ?> }
			<?php } ?>
			
			<?php if(get_post_meta($post->ID, "hero_title_background", $single = true) != ""){ ?>
				.hero-copy h2.hero-title { background-color: <?php echo get_post_meta($post->ID, "hero_title_background", TRUE); ?> }
			<?php } ?>
			
			<?php if(get_post_meta($post->ID, "hero_text_color", $single = true) != ""){ ?>
				.hero-copy p { color: <?php echo get_post_meta($post->ID, "hero_text_color", TRUE); ?> }
			<?php } ?>
			
			<?php if(get_post_meta($post->ID, "hero_text_background", $single = true) != ""){ ?>
				.hero-copy p { background-color: <?php echo get_post_meta($post->ID, "hero_text_background", TRUE); ?> }
			<?php } ?>
			
			<?php if(get_post_meta($post->ID, "hero_button_text_color", $single = true) != ""){ ?>										
				.hero-copy a.button.hero { color: <?php echo get_post_meta($post->ID, "hero_button_text_color", TRUE); ?> }
			<?php } ?>
			
			<?php if(get_post_meta($post->ID, "hero_button_background", $single = true) != ""){ ?>										
				.hero-copy a.button.hero { background-color: <?php echo get_post_meta($post->ID, "hero_button_background", TRUE); ?> }
			<?php } ?>
			
			<?php if(get_post_meta($post->ID, "hero_button_text_hover", $single = true) != ""){ ?>										
				.hero-copy a.button.hero:hover { color: <?php echo get_post_meta($post->ID, "hero_button_text_hover", TRUE); ?> }
			<?php } ?>
			
			<?php if(get_post_meta($post->ID, "hero_button_background_hover", $single = true) != ""){ ?>										
				.hero-copy a.button.hero:hover { background-color: <?php echo get_post_meta($post->ID, "hero_button_background_hover", TRUE); ?> }
			<?php } ?>
		
		</style>
		
		<div class="hero-copy <?php echo get_post_meta($post->ID, "hero_alignment", TRUE); ?>">
			
			<?php if(get_post_meta($post->ID, "hero_title", $single = true) != ""){ ?>
				<div class="hero-title-holder">
					<h2 class="hero-title"><?php echo get_post_meta($post->ID, "hero_title", TRUE); ?></h2>
				</div>
			<?php } ?>
			<?php if(get_post_meta($post->ID, "hero_caption", $single = true) != ""){ ?>
				<div class="hero-caption">
					<p><?php echo get_post_meta($post->ID, "hero_caption", TRUE); ?></p>
				</div>
			<?php } ?>
			<?php if(get_post_meta($post->ID, "hero_button_text", $single = true) != ""){ ?>
				<div class="hero-button-holder">
					<a class="button hero" href="<?php echo get_post_meta($post->ID, "hero_button_url", TRUE); ?>"><?php echo get_post_meta($post->ID, "hero_button_text", TRUE); ?></a>
				</div>
			<?php } ?>
			
		</div>
		
	<?php } else if ( has_post_format( 'video' ) ) { ?>
		
		<div class="fit-video"><?php echo get_post_meta($post->ID, "slide_video", TRUE); ?></div>
	
	<?php } else if ( has_post_format( 'gallery' ) ) { ?>
		
		<div class="flexslider">
		
			<ul class="slides">
		
				<?php
					
					$slide_slug = '';
					
					$terms = get_the_terms( $post->ID, 'slide-group' );
					
					if ( $terms && ! is_wp_error( $terms ) ) {
					
					    $slide_slug = $terms[0]->slug;
					
					}	
					
					$loop = new WP_Query( 
						array( 
							'post_type' => 'slide', 
							'posts_per_page' => '-1', 
							'orderby'=>'menu_order', 
							'order'=>'ASC',
							'no_found_rows' => true,
								'tax_query' => array(
										array(
											'taxonomy' => 'slide-group',
											'field' => 'slug',
											'terms' => $slide_slug
										)
									) 
						) 
					); 
				
				?>
				
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				
					<li id="slide-<?php the_ID(); ?>">
					
						<?php if(get_post_meta($post->ID, "slide_video", $single = true) != ""){ ?>
						
							<div class="fit-video"><?php echo get_post_meta($post->ID, "slide_video", TRUE); ?></div>
						
						<?php } else { ?>
									
							<div class="hero-copy <?php echo get_post_meta($post->ID, "hero_alignment", TRUE); ?>">
							
								<style>
								
									<?php if(get_post_meta($post->ID, "hero_title_color", $single = true) != ""){ ?>
										#slide-<?php the_ID(); ?> .hero-copy h2.hero-title { color: <?php echo get_post_meta($post->ID, "hero_title_color", TRUE); ?> }
									<?php } ?>
									
									<?php if(get_post_meta($post->ID, "hero_title_background", $single = true) != ""){ ?>
										#slide-<?php the_ID(); ?> .hero-copy h2.hero-title { background-color: <?php echo get_post_meta($post->ID, "hero_title_background", TRUE); ?> }
									<?php } ?>
									
									<?php if(get_post_meta($post->ID, "hero_text_color", $single = true) != ""){ ?>
										#slide-<?php the_ID(); ?> .hero-copy p { color: <?php echo get_post_meta($post->ID, "hero_text_color", TRUE); ?> }
									<?php } ?>
									
									<?php if(get_post_meta($post->ID, "hero_text_background", $single = true) != ""){ ?>
										#slide-<?php the_ID(); ?> .hero-copy p { background-color: <?php echo get_post_meta($post->ID, "hero_text_background", TRUE); ?> }
									<?php } ?>
									
									<?php if(get_post_meta($post->ID, "hero_button_text_color", $single = true) != ""){ ?>										
										#slide-<?php the_ID(); ?> .hero-copy a.button.hero { color: <?php echo get_post_meta($post->ID, "hero_button_text_color", TRUE); ?> }
									<?php } ?>
									
									<?php if(get_post_meta($post->ID, "hero_button_background", $single = true) != ""){ ?>										
										#slide-<?php the_ID(); ?> .hero-copy a.button.hero { background-color: <?php echo get_post_meta($post->ID, "hero_button_background", TRUE); ?> }
									<?php } ?>
									
									<?php if(get_post_meta($post->ID, "hero_button_text_hover", $single = true) != ""){ ?>										
										#slide-<?php the_ID(); ?> .hero-copy a.button.hero:hover { color: <?php echo get_post_meta($post->ID, "hero_button_text_hover", TRUE); ?> }
									<?php } ?>
									
									<?php if(get_post_meta($post->ID, "hero_button_background_hover", $single = true) != ""){ ?>										
										#slide-<?php the_ID(); ?> .hero-copy a.button.hero:hover { background-color: <?php echo get_post_meta($post->ID, "hero_button_background_hover", TRUE); ?> }
									<?php } ?>
								
								</style>
								
								<?php if(get_post_meta($post->ID, "hero_title", $single = true) != ""){ ?>
									<div class="hero-title-holder">
										<h2 class="hero-title"><?php echo get_post_meta($post->ID, "hero_title", TRUE); ?></h2>
									</div>
								<?php } ?>
								<?php if(get_post_meta($post->ID, "hero_caption", $single = true) != ""){ ?>
									<div class="hero-caption">
										<p><?php echo get_post_meta($post->ID, "hero_caption", TRUE); ?></p>
									</div>
								<?php } ?>
								<?php if(get_post_meta($post->ID, "hero_button_text", $single = true) != ""){ ?>
									<div class="hero-button-holder">
										<a class="button hero" href="<?php echo get_post_meta($post->ID, "hero_button_url", TRUE); ?>"><?php echo get_post_meta($post->ID, "hero_button_text", TRUE); ?></a>
									</div>
								<?php } ?>
								
							</div>
							
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
							
							<style>
							
								#hero-section li#slide-<?php the_ID(); ?> {
									background-image: url(<?php echo $image[0]; ?>);
								}
							
							</style>
							
						<?php } ?>
						
					</li>
					
				<?php endwhile; wp_reset_query(); ?>
		
			</ul>	
		
		</div>
	
	<?php } ?>
	
	<div class="scroll-down"></div>
	
</div>