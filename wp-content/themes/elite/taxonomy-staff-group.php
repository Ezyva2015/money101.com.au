<?php
/**
 * Staff Group
 *
 * If the staff section has been broken up into groups,
 * this file will display a group of your staff members.
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 */

get_header(); ?>

	<div id="content" class="site-content" role="main">
		
		<?php
			$taxonomy = 'staff-group';
			$queried_term = get_query_var($taxonomy);
			$terms = get_terms($taxonomy, 'slug='.$queried_term);
			if ($terms) {
			  foreach($terms as $term) {
			    echo '<h1 class="page-title">  ' . $term->name .  '</h1> ';
			  }
			}
		?>
		
		<?php echo term_description( '', get_query_var( 'taxonomy' ) ); ?>
		
		<div id="staff-list">
		
			<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
				
				<?php get_template_part( 'layouts/staff-group-item' ); ?>
					
			<?php endwhile; else : ?>
				
				<?php get_template_part( 'layouts/not-found' ); ?>
				
			<?php endif; ?>
		
		</div><!-- #staff-list -->
	
		<?php get_template_part( 'layouts/pagination' ); ?>	

	</div><!-- #content -->

<?php get_footer(); ?>