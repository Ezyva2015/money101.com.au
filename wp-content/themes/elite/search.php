<?php
/**
 * Search Results
 *
 * This file sets the display of search results
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 */

get_header(); ?>

	<div id="content" class="site-content" role="main">

	<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
			
			<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'organizedthemes' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h2>
			
			<?php get_template_part( 'layouts/post-meta' ); ?>
			
			<?php the_excerpt(); ?>
				
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'organizedthemes' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><span class="more-link"><?php _e('Read More', 'organizedthemes'); ?></span></a>
							
		</article>
	
	<?php endwhile ; else : ?>
		
		<?php get_template_part( 'layouts/not-found' ); ?>
		
	<?php endif ; ?>

	<?php get_template_part( 'layouts/pagination' ); ?>	

	</div><!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>