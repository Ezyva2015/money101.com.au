<?php
/*
 Template Name: Home
 *
 *
 * This file controls the display of the
 * themes home page
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 */ 
 
get_header(); ?>

<div id="cbp-so-scroller" class="cbp-so-scroller">	

	<?php if(is_active_sidebar( 'home_1' )) { ?>
	
		<div id="home-one">
			
			<div class="wrap">
		
				<?php dynamic_sidebar( 'home_1' ); ?>
	
			</div><!-- .wrap -->
				
		</div><!-- #home-one -->
	
	<?php } ?>
	
	<?php if(is_active_sidebar( 'home_2' )) { ?>
	
		<div id="home-two">
			
			<div class="wrap">
		
				<?php dynamic_sidebar( 'home_2' ); ?>
	
			</div><!-- .wrap -->
				
		</div><!-- #home-two -->
	
	<?php } ?>
	
	<?php if(is_active_sidebar( 'home_3' )) { ?>
	
		<div id="home-three">
			
			<div class="wrap">
		
				<?php dynamic_sidebar( 'home_3' ); ?>
		
			</div><!-- .wrap -->
				
		</div><!-- #home-three -->
	
	<?php } ?>
	
	<?php if(is_active_sidebar( 'home_4' )) { ?>
	
		<div id="home-four">
			
			<div class="wrap">
		
				<?php dynamic_sidebar( 'home_4' ); ?>
	
			</div><!-- .wrap -->
				
		</div><!-- #home-four -->
	
	<?php } ?>
	
	<?php if(is_active_sidebar( 'home_5' )) { ?>
	
		<div id="home-five">
			
			<div class="wrap">
		
				<?php dynamic_sidebar( 'home_5' ); ?>
			
			</div><!-- .wrap -->
				
		</div><!-- #home-five -->
	
	<?php } ?>
	
	<?php if(is_active_sidebar( 'home_6' )) { ?>
	
		<div id="home-six">
			
			<div class="wrap">
		
				<?php dynamic_sidebar( 'home_6' ); ?>
			
			</div><!-- .wrap -->
			
		</div><!-- #home-six -->
	
	<?php } ?>
	
	<?php if(is_active_sidebar( 'home_7' )) { ?>
	
		<div id="home-seven">
			
			<div class="wrap">
		
				<?php dynamic_sidebar( 'home_7' ); ?>
			
			</div><!-- .wrap -->
			
		</div><!-- #home-seven -->
	
	<?php } ?>
	
	<?php if(is_active_sidebar( 'home_8' )) { ?>
	
		<div id="home-eight">
			
			<div class="wrap">
		
				<?php dynamic_sidebar( 'home_8' ); ?>
			
			</div><!-- .wrap -->
			
		</div><!-- #home-eight -->
	
	<?php } ?>
	
	<?php if(is_active_sidebar( 'home_9' )) { ?>
	
		<div id="home-nine">
			
			<div class="wrap">
		
				<?php dynamic_sidebar( 'home_9' ); ?>
			
			</div><!-- .wrap -->
			
		</div><!-- #home-nine -->
	
	<?php } ?>
	
	<?php if(is_active_sidebar( 'home_10' )) { ?>
	
		<div id="home-ten">
			
			<div class="wrap">
		
				<?php dynamic_sidebar( 'home_10' ); ?>
			
			</div><!-- .wrap -->
			
		</div><!-- #home-ten -->
	
	<?php } ?>
	
</div><!-- #cbp-so-scroller -->

<?php get_footer(); ?>