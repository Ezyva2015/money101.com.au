<?php
/**
 * Individual Staff
 *
 * This file sets the display of individual
 * staff members
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 */

get_header(); ?>

	<div id="content" class="site-content full" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<header class="entry-header">
					
					<?php the_post_thumbnail( 'staff-full' ); ?>
					
					<h1 class="page-title"><?php the_title(); ?></h1>
					
					<p class="job-title"><?php echo get_post_meta($post->ID, "title", TRUE); ?></p>
				
				</header><!-- .entry-header -->
				
				<?php the_content(__('<span class="more-link">Read more</span>', 'organizedthemes')); ?>
				
				<?php wp_link_pages('before=<nav id="page-links">&after=</nav'); ?>
				
				<?php get_template_part( 'layouts/staff-details' ); ?>
				
			</article>
			
		<?php endwhile; ?>

	</div><!-- #content -->

<?php get_footer(); ?>