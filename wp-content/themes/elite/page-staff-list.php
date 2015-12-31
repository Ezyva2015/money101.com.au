<?php
/*
 Template Name: Staff
 *
 *
 * This page template will display a complete list of your staff members
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 */ 
 
get_header(); ?>

	<div id="content" class="site-content" role="main">
		
		<?php // the main loop ?>
		
		<?php while (have_posts()) : the_post(); ?>
		
			<?php the_post_thumbnail('page-feature'); ?>
		
			<h1 class="page-title"><?php the_title(); ?></h1>		
		
			<?php the_content();?>
		
		<?php endwhile; // end main loop ?>
		
		<div id="staff-list">
		
			<?php // the staff loop ?>
			
			<?php $loop = new WP_Query( array( 'post_type' => 'staff', 'posts_per_page' => -1, 'orderby'=>'menu_order', 'order'=>'ASC' ) ); ?>
					
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					
					<?php get_template_part( 'layouts/staff-group-item' ); ?>
									
			<?php endwhile; wp_reset_query(); // end staff loop ?>
		
		</div><!-- #staff-list -->
		
	</div><!-- #content -->

<?php get_footer(); ?>