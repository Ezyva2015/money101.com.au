<?php
/**
 * The custom css generator.
 *
 * This file takes the custom styling from
 * the theme options page and adds it to the
 * header.php file. 
 *
 * @package 	Elite
 * @since		1.0.0
 */


add_action( 'tha_head_bottom', 'organizedthemes_custom_css_hook' );

if ( ! function_exists( 'organizedthemes_custom_css_hook' ) ):

	function organizedthemes_custom_css_hook( ) {
	   
	?>
 
<style type='text/css'>
	
	<?php 
		
		if ( !of_get_option( 'disable_fonts' ) ) {
		
			$output = '';
			$input = '';
			
			if ( of_get_option( 'body_font' ) ) {
				$output .= options_typography_font_styles( of_get_option( 'body_font' ) , 'body');
			}
			
			if ( of_get_option( 'site_title_font' ) ) {
				$output .= options_typography_font_styles( of_get_option( 'site_title_font' ) , '#text-logo p, #text-logo h1');
			}
			if ( of_get_option( 'heading_font' ) ) {
				$output .= options_typography_font_styles( of_get_option( 'heading_font' ) , 'h1, h2, h3, h4, h5, h6');
			}
			if ( of_get_option( 'navigation_font' ) ) {
				$output .= options_typography_font_styles( of_get_option( 'navigation_font' ) , 'nav#top-menu li, .slicknav_nav li, .slicknav_menu  .slicknav_menutxt');
			}
			if ( of_get_option( 'hero_title_font' ) ) {
				$output .= options_typography_font_styles( of_get_option( 'hero_title_font' ) , 'h2.hero-title');
			}
			if ( of_get_option( 'hero_text_font' ) ) {
				$output .= options_typography_font_styles( of_get_option( 'hero_text_font' ) , '.hero-copy p');
			}
			if ( of_get_option( 'widget_title_font' ) ) {
				$output .= options_typography_font_styles( of_get_option( 'widget_title_font' ) , 'h3.widget-title, #sidebar .testimony-block h3.widget-title');
			}
					
			if ( $output != '' ) {
				$output =  $output ;
				echo $output;
			}
		
		}
	
	 ?>
	
	body { background: <?php if(of_get_option('background_image', $single = true) != ""){ ?>url(<?php echo of_get_option('background_image', '' ); ?>)<?php } ?> <?php echo of_get_option('background_color', '' ); ?> <?php echo of_get_option('background_repeat', '' ); ?> <?php echo of_get_option('background_attachment', '' ); ?> <?php echo of_get_option('background_position_horizontal', '' ); ?> <?php echo of_get_option('background_position_vertical', '' ); ?>; 
		<?php if(of_get_option('background_size', $single = true) != ""){ ?>
			-moz-background-size: <?php echo of_get_option('background_size', '' ); ?>; 
			-webkit-background-size: <?php echo of_get_option('background_size', '' ); ?>; 
			background-size: <?php echo of_get_option('background_size', '' ); ?>; <?php } ?> }
			
	<?php if(of_get_option('logo_color', $single = true) != ""){ ?>
		#text-logo a, #text-logo a:visited { color: <?php echo of_get_option('logo_color', '' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('logo_color_hover', $single = true) != ""){ ?>
		#text-logo a:hover { color: <?php echo of_get_option('logo_color_hover', '' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('navigation_bar', $single = true) != ""){ ?>
		#header.scroll-background,
		body.standard #header,
		body.blog #header,
		body.archive #header,
		body.error404 #header,
		body.single-product #header,
		body.search #header { background-color: <?php echo of_get_option('navigation_bar', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('navigation_item', $single = true) != ""){ ?>
		nav#top-menu li a,
		nav#top-menu li a:visited { color: <?php echo of_get_option('navigation_item', '' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('navigation_item_hover', $single = true) != ""){ ?>
		nav#top-menu li a:hover { color: <?php echo of_get_option('navigation_item_hover', '' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('navigation_drop_down_background', $single = true) != ""){ ?>
		nav#top-menu ul li:hover > ul { background-color: <?php echo of_get_option('navigation_drop_down_background', '' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('navigation_drop_down_color', $single = true) != ""){ ?>
		nav#top-menu ul li:hover > ul a,
		nav#top-menu ul ul li.current-menu-item a { color: <?php echo of_get_option('navigation_drop_down_color', '' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('navigation_drop_down_color_hover', $single = true) != ""){ ?>
		nav#top-menu ul li:hover > ul a:hover,
		nav#top-menu ul ul li.current-menu-item a:hover { color: <?php echo of_get_option('navigation_drop_down_color_hover', '' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('navigation_top_margin', $single = true) != ""){ ?>
		nav#top-menu ul li:hover > ul { margin-top: <?php echo of_get_option('navigation_top_margin', '' ); ?>px; }
	<?php } ?>
	<?php if(of_get_option('home_1', $single = true) != ""){ ?>
		#home-one { background-color: <?php echo of_get_option('home_1', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('home_1_text', $single = true) != ""){ ?>
		#home-one,
		#home-one h3.widget-title { color: <?php echo of_get_option('home_1_text', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('home_2', $single = true) != ""){ ?>
		#home-two { background-color: <?php echo of_get_option('home_2', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('home_2_text', $single = true) != ""){ ?>
		#home-two,
		#home-one h3.widget-title { color: <?php echo of_get_option('home_2_text', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('home_3', $single = true) != ""){ ?>
		#home-three { background-color: <?php echo of_get_option('home_3', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('home_3_text', $single = true) != ""){ ?>
		#home-three,
		#home-one h3.widget-title { color: <?php echo of_get_option('home_3_text', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('home_4', $single = true) != ""){ ?>
		#home-four { background-color: <?php echo of_get_option('home_4', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('home_4_text', $single = true) != ""){ ?>
		#home-four,
		#home-one h3.widget-title { color: <?php echo of_get_option('home_4_text', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('home_5', $single = true) != ""){ ?>
		#home-five { background-color: <?php echo of_get_option('home_5', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('home_5_text', $single = true) != ""){ ?>
		#home-five,
		#home-one h3.widget-title { color: <?php echo of_get_option('home_5_text', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('home_6', $single = true) != ""){ ?>
		#home-six { background-color: <?php echo of_get_option('home_6', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('home_6_text', $single = true) != ""){ ?>
		#home-six,
		#home-one h3.widget-title { color: <?php echo of_get_option('home_6_text', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('home_7', $single = true) != ""){ ?>
		#home-seven { background-color: <?php echo of_get_option('home_7', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('home_7_text', $single = true) != ""){ ?>
		#home-seven,
		#home-one h3.widget-title { color: <?php echo of_get_option('home_7_text', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('home_8', $single = true) != ""){ ?>
		#home-eight { background-color: <?php echo of_get_option('home_8', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('home_8_text', $single = true) != ""){ ?>
		#home-eight,
		#home-one h3.widget-title { color: <?php echo of_get_option('home_8_text', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('home_9', $single = true) != ""){ ?>
		#home-nine { background-color: <?php echo of_get_option('home_9', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('home_9_text', $single = true) != ""){ ?>
		#home-nine,
		#home-one h3.widget-title { color: <?php echo of_get_option('home_9_text', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('home_10', $single = true) != ""){ ?>
		#home-ten { background-color: <?php echo of_get_option('home_10', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('home_10_text', $single = true) != ""){ ?>
		#home-ten,
		#home-one h3.widget-title { color: <?php echo of_get_option('home_10_text', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('content_text', $single = true) != ""){ ?>
		#content { color: <?php echo of_get_option('content_text', '' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('content_background', $single = true) != ""){ ?>
		#content { background-color: <?php echo of_get_option('content_background', '' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('heading_color', $single = true) != ""){ ?>
		h1,h2,h3,h4,h5,h6 { color: <?php echo of_get_option('heading_color', '' ); ?>; }
	<?php } ?>	
	<?php if(of_get_option('link_color', $single = true) != ""){ ?>
		a, a:visited { color: <?php echo of_get_option('link_color', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('link_color_hover', $single = true) != ""){ ?>
		a:hover { color: <?php echo of_get_option('link_color_hover', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('product_text', $single = true) != ""){ ?>
		.home-product-block li,
		.woocommerce #content ul.products li.product,
		.woocommerce-page #content ul.products li.product { color: <?php echo of_get_option('product_text', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('product_background', $single = true) != ""){ ?>
		.home-product-block li,
		.woocommerce #content ul.products li.product,
		.woocommerce-page #content ul.products li.product { background-color: <?php echo of_get_option('product_background', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('footer_color', $single = true) != ""){ ?>
		#footer,
		#footer .widget,
		#footer input#search-submit,
		#footer form.searchform,
		#footer h3.widget-title { color: <?php echo of_get_option('footer_color', '' ); ?>; border-color: <?php echo of_get_option('footer_color', '' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('footer_background_color', $single = true) != ""){ ?>
		#footer { background-color: <?php echo of_get_option('footer_background_color', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('footer_link_color', $single = true) != ""){ ?>
		#footer a,
		#footer a:visited { color: <?php echo of_get_option('footer_link_color', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('footer_link_color_hover', $single = true) != ""){ ?>
		#footer a:hover { color: <?php echo of_get_option('footer_link_color_hover', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('footer_line', $single = true) != ""){ ?>
		ul#footer-menu li, ul#footer-menu li { border-color: <?php echo of_get_option('footer_line', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('widget_title', $single = true) != ""){ ?>
		h3.widget-title { color: <?php echo of_get_option('widget_title', '' ); ?>; border-color: <?php echo of_get_option('widget_title', '' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('widget_text', $single = true) != ""){ ?>
		.widget,
		#sidebar input#search-submit,
		#sidebar form#searchform,
		#sidebar input#searchsubmit { color: <?php echo of_get_option('widget_text', '' ); ?>; border-color: <?php echo of_get_option('widget_text', '' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('widget_background', $single = true) != ""){ ?>
		.widget { background-color: <?php echo of_get_option('widget_background', '' ); ?> }
	<?php } ?>	
	<?php if(of_get_option('button', $single = true) != ""){ ?>
		a.button,
		input.button,
		input[type="button"],
		input[type="submit"] { color: <?php echo of_get_option('button', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('button_background', $single = true) != ""){ ?>
		a.button,
		input.button,
		input[type="button"],
		input[type="submit"] { background-color: <?php echo of_get_option('button_background', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('button_hover', $single = true) != ""){ ?>
		a:hover.button,
		input:hover.button,
		input:hover[type="button"],
		input:hover[type="submit"] { color: <?php echo of_get_option('button_hover', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('button_background_hover', $single = true) != ""){ ?>
		a:hover.button,
		input:hover.button,
		input:hover[type="button"],
		input:hover[type="submit"] { background-color: <?php echo of_get_option('button_background_hover', '' ); ?> }
	<?php } ?>	
	
	<?php if(of_get_option('social_color', $single = true) != ""){ ?>
		ul.network-icons li a:before { color: <?php echo of_get_option('social_color', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('social_color_background', $single = true) != ""){ ?>
		ul.network-icons li a:before { background-color: <?php echo of_get_option('social_color_background', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('social_color_hover', $single = true) != ""){ ?>
		ul.network-icons li:hover a:before { color: <?php echo of_get_option('social_color_hover', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('social_color_background_hover', $single = true) != ""){ ?>
		ul.network-icons li:hover a:before { background-color: <?php echo of_get_option('social_color_background_hover', '' ); ?> }
	<?php } ?>	
	<?php if(of_get_option('custom_css', $single = true) != ""){ ?>
		<?php echo of_get_option('custom_css', '' ); ?>
	<?php } ?>

</style>
 
<?php
}
	
endif; // organizedthemes_custom_css_hook