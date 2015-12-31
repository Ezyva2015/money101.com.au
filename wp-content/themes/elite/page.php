<?php
/**
 * Page
 *
 * This file sets the display of pages.
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 */

get_header(); ?>

	<div id="content" class="site-content" role="main">
		
		<div id="cbp-so-scroller" class="cbp-so-scroller">

		<?php while ( have_posts() ) : the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<h1 class="page-title"><?php the_title(); ?></h1>
				
				<?php the_content(); ?>
				
				<?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>
				
			</article>
			
		<?php endwhile; ?>
		
		</div><!-- #cbp-so-scroller -->

	</div><!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>