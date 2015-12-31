<?php
/**
 * The file for displaying the footer.
 *
 * This file also loads wp_footer and closes
 * out the #wrap
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 */
?>
	
	<?php if ( ! is_page_template( 'page-home-template.php' ) ) { ?>
	
		</div><!-- #wrap -->
	
	<?php } ?>
	
	<div id="footer">
		
		<div id="footer-content" class="clearfix">
			
			<?php if ( is_active_sidebar( 'footer_sidebar' ) ) : ?>
			
				<div id="footer-sidebar" class="clearfix">
				
					<?php dynamic_sidebar( 'footer_sidebar' ); ?>
				
				</div><!-- #footer-sidebar -->
			
			<?php endif ; // is_active_sidebar ?>
			
			<div id="footer-left">
			
				<?php if ( of_get_option('footer_text', $single = true) != "") : ?>
				
					<p><?php echo of_get_option('footer_text'); ?></p>
					
				<?php else : ?>
				
					<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p> 
				
				<?php endif ; ?>
			
			</div><!-- #footer-left -->
		
			<div id="footer-right">
			
				<?php if ( of_get_option('footer_text_right', $single = true) != "" ) : ?>
				
					<p><?php echo of_get_option('footer_text_right'); ?></p>
					
				<?php elseif ( has_nav_menu( 'footer' ) ) : ?>
				
					<?php wp_nav_menu( array( 
						'theme_location'	=> 'footer',
						'container'			=> 'false',
						'menu_id'			=> 'footer-menu',
						'fallback_cb'		=> false,
						'depth'				=> 1
						) ); ?>
				
				<?php else : ?>
				
					<p><a href="http://www.organizedthemes.com" target="_blank" title="Powered by the Elite theme from Organized Themes" rel="nofollow">Powered by Organized Themes</a></p>
				
				<?php endif ; ?>
			
			</div><!-- #footer-right -->
			
		</div><!-- .wrap -->
		
	</div><!-- #footer -->

<!-- Load wp_footer -->
<?php wp_footer(); ?>


</body>
</html>

<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->