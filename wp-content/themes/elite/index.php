<?php
/**
 * Index
 *
 * This is the main index file of the theme.
 * If a more speific file is not in use, then this
 * is the fallback.
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 */

get_header(); ?>

	<div id="content" class="site-content" role="main">

	<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
			
			<?php get_template_part( 'layouts/post-formats' ); ?>
			
			<h2 class="page-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'organizedthemes' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h2>
			
			<?php get_template_part( 'layouts/post-meta' ); ?>
						
			<?php if ( of_get_option('content_excerpt') == 'excerpt' ) : ?>
			
				<?php the_excerpt(); ?>
				
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'organizedthemes' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><span class="more-link"><?php _e('Read More', 'organizedthemes'); ?></span></a>
				
			<?php else : ?>
			
				<?php if ( ! has_excerpt() ) : ?>
				
					<?php the_content(__('<span class="more-link">Read more</span>', 'organizedthemes')); ?>
				      
				 <?php else : ?>
				 
				    <?php the_excerpt(); ?>
				      
				    <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'organizedthemes' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><span class="more-link"><?php _e('Read More', 'organizedthemes'); ?></span></a>
				
				<?php endif ;  // ! has_excerpt ?>
			
			<?php endif ; // if of_get_option = excerpt ?>
			
		</article>
	
	<?php endwhile ; else : ?>
	
		<?php get_template_part( 'layouts/not-found' ); ?>
		
	<?php endif ; ?>

	<?php get_template_part( 'layouts/pagination' ); ?>	

	</div><!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>