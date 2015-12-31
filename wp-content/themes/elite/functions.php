<?php 

/**
 * The loads all theme functions
 *
 * If you use the theme updater, please
 * place any customizations in a child theme
 * or plugin to prevent being lost when
 * the theme is updated
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 *
 *
 */

// Define Version
	define( 'ELITE_VERSION', '1.1.1' );

// options framework
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
		require_once dirname( __FILE__ ) . '/inc/options-framework.php';
	}
	
	// loads options file directly as required by theme customizer
		require_once dirname( __FILE__ ) . '/includes/options.php';



// Other Theme Functions

	if ( ! function_exists( 'elite_setup' ) ):

		function elite_setup() {
				
			// For localization
				load_theme_textdomain( 'organizedthemes', get_template_directory().'/languages' );
			
			// Add default posts and comments RSS feed links to head
				add_theme_support( 'automatic-feed-links' );
			
			// This theme uses wp_nav_menu() in two locations.
				register_nav_menus( array(
					'primary' => __( 'Header Navigation', 'organizedthemes' ),
					'footer' => __( 'Footer Navigation', 'organizedthemes' ),
				) );
			
			// Add CSS to Visual Editor
				add_editor_style('style-editor.css');
			
			// Post Formats	
				add_theme_support( 'post-formats', array( 'image', 'gallery', 'video' ) );
					add_post_type_support( 'page', 'post-formats' );
					add_post_type_support( 'product', 'post-formats' );
			
			// Declare Woocommerce Support
				add_theme_support( 'woocommerce' );
			
		}
	
	endif; // elite_setup
	
	add_action( 'after_setup_theme', 'elite_setup' );




	
// Go to theme options after theme activated
	if ( is_admin() and isset($_GET['activated'] ) and $pagenow == "themes.php" ) {
	
		global $pagenow, $wp_rewrite;
		
		$wp_rewrite->flush_rules();
		
		wp_redirect( 'themes.php?page=options-framework' );
		
	}




// Load Other Files
	if ( ! function_exists( 'elite_files' ) ):

		function elite_files() {
		
		// include required files
			include(get_template_directory()."/includes/fonts.php");
			include(get_template_directory()."/includes/titles.php");
			include(get_template_directory()."/includes/images.php");
			include(get_template_directory()."/includes/queries.php");
			include(get_template_directory()."/includes/scripts.php");
			include(get_template_directory()."/includes/body-tag.php");
			include(get_template_directory()."/includes/custom-js.php");
			include(get_template_directory()."/includes/shortcodes.php");
			include(get_template_directory()."/includes/custom-css.php");
			include(get_template_directory()."/includes/author-fields.php");
			include(get_template_directory()."/includes/content-limit.php");
			include(get_template_directory()."/includes/tha-theme-hooks.php");
			include(get_template_directory()."/includes/theme-customizer.php");
			include(get_template_directory()."/includes/comment-functions.php");
			include(get_template_directory()."/includes/custom-meta-boxes/elite.php");
		
		
		// Custom Post Types	
			include(get_template_directory()."/includes/post-types/staff.php");
			include(get_template_directory()."/includes/post-types/slides.php");
			include(get_template_directory()."/includes/post-types/testimony.php");
			include(get_template_directory()."/includes/post-types/admin-style.php");
		
		
		// include widgets
			include(get_template_directory()."/includes/widgets.php");
			include(get_template_directory()."/includes/widget-page.php");
			include(get_template_directory()."/includes/widget-posts.php");
			include(get_template_directory()."/includes/widget-video.php");
			include(get_template_directory()."/includes/widget-social.php");
			include(get_template_directory()."/includes/widget-product.php");
			include(get_template_directory()."/includes/widget-testimony.php");
			include(get_template_directory()."/includes/widget-attention.php");
			include(get_template_directory()."/includes/widget-featured-page.php");
			include(get_template_directory()."/includes/widget-facebook-like-box.php");

		}
	
	endif; // elite_files
	
	add_action( 'after_setup_theme', 'elite_files' );

// Optional Includes
	// include organized themes gallery
		if(of_get_option('gallery') == 'yes') {
			include(get_template_directory()."/includes/lightbox.php");
		}




// Filter Excerpt to remove [...]
	function organizedthemes_excerpt_more( $more ) {
		return '';
	}
	add_filter('excerpt_more', 'organizedthemes_excerpt_more');	




// Theme Updater

	if ( !of_get_option( 'disable_theme_updater' ) ) {
	
		function organizedthemes_theme_update() {
		
			/* updater args */
			$updater_args = array(
				'repo_uri'    => 'http://support.organizedthemes.com/',
				'repo_slug'   => 'elite-theme',
				'dashboard'   => false,
				'username'    => false,
			);
		
			/* add support for updater */
			add_theme_support( 'auto-hosted-theme-updater', $updater_args );
		}
		
		add_action( 'after_setup_theme', 'organizedthemes_theme_update' );
		require_once( trailingslashit( get_template_directory() ) . 'includes/theme-updater.php' );
		new Elite_Theme_Updater;
	
	}