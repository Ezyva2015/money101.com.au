<?php
/**
 * The file for displaying the header.
 *
 * This file also loads wp_head, logo and navigation
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 *
 *
 */?><!DOCTYPE html>
 <!--[if IE 8 ]> <html class="ie8 <?php language_attributes(); ?>"> <![endif]-->
 <!--[if IE 9 ]> <html class="ie9 <?php language_attributes(); ?>"> <![endif]-->
 <!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
 <head>

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	
	<!--Load WP Head-->
	
	<?php wp_head(); ?>
	
	<!-- End WP Head -->
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<?php if(of_get_option('favicon', $single = true) != ""){ ?>
	<link rel="shortcut icon" href="<?php echo of_get_option('favicon'); ?>" type="image/x-icon" />
	<?php } ?>
	
	<?php if(of_get_option('apple', $single = true) != ""){ ?>
	<link rel="apple-touch-icon-precomposed" href="<?php echo of_get_option('apple'); ?>" />
	<?php } ?>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<?php tha_head_bottom(); ?>
	
</head>

<body <?php body_class(); ?>>

	<div id="header">
		
		<div id="header-content" class="clearfix">
			
			<?php if ( of_get_option('header_blog_title') == 'image' ) : ?>
			
				<div id="logo">
				
				<?php if ( is_front_page() ) :
						echo '<h1><a href="'.home_url().'/"><img src="'.of_get_option('logo','').'" alt="'.get_bloginfo('name').'" /></a></h1>';
					else :
						echo '<p><a href="'.home_url().'/"><img src="'.of_get_option('logo','').'" alt="'.get_bloginfo('name').'" /></a></p>';
					endif ; ?>
					
				</div>
				
			<?php elseif ( of_get_option('header_blog_title') == 'text' ) : ?>
			
				<div id="text-logo">
				
				<?php if ( is_front_page() ) :
						echo '<h1><a href="'.home_url().'/">'.get_bloginfo('name').'</a></h1>';
					else :
						echo '<p><a href="'.home_url().'/">'.get_bloginfo('name').'</a></p>';
					endif ; ?>
					
				</div>
				
			<?php endif ; ?>
			
			<?php wp_nav_menu( array( 
				'theme_location'	=> 'primary',
				'container'			=> 'nav',
				'container_id'		=> 'top-menu',
				'menu_id'			=> 'primary-menu',
				'depth'				=> 2,
				'fallback_cb'		=> false
				) ); ?>
			
		</div><!-- #header-content -->
		
	</div><!-- #header -->

<?php get_template_part( 'layouts/hero-options' ); ?>

<?php if ( ! is_page_template( 'page-home-template.php' ) ) { ?>

	<div class="wrap clearfix">

<?php } ?>