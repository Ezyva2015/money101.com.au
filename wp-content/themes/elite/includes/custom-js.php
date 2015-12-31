<?php

/**
 * Sets up and fires our javascript.  It is loaded
 * by wp_footer in footer.php
 *
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 *
 *
 */


	add_action( 'wp_footer', 'organizedthemes_custom_js_hook', 20 );
	function organizedthemes_custom_js_hook( ) {   
?>

<script>

// Add Header Class On Scroll
	jQuery(function() {
		jQuery(window).scroll(function() {
		
			var $widnowHeight = jQuery('#hero-section').height() - 100;
		
			if(jQuery(this).scrollTop() > $widnowHeight) {
				jQuery('#header').addClass('scroll-background');
			} else {
				jQuery('#header').removeClass('scroll-background');
			}
		});
	});



// Flexslider	
	jQuery(window).load(function() {
		jQuery('.flexslider').flexslider({
			animation           :	"fade",
			slideshow           :	<?php echo of_get_option('auto','true') ?>,
			slideshowSpeed      :	<?php echo of_get_option('duration','5000') ?>,
			animationDuration   :	<?php echo of_get_option('transition','750') ?>,
			controlNav          :	false,
			directionNav        :   <?php echo of_get_option('prev_next','true') ?>,
			prevText			:	"",
			nextText			:	"", 
			pauseOnAction       :   true,
			pauseOnHover        :	true,
			useCSS				:	false,
			video				:	true,
			smoothHeight		:	true,
			controlsContainer	:	".slider-nav",
		});
	});

// slicknav	
	jQuery('#primary-menu').slicknav({
		prependTo:'#header-content',
		label: '<?php echo of_get_option('mobile_navigation_name','') ?>'
	});



<?php if ( of_get_option( 'gallery' ) == 'yes' ) { ?>
	
// Load Lightbox and add lightbox class and rel for prev/next functionality
	jQuery(document).ready(function(){
    	jQuery('.lightbox').lightbox();
    	
    		jQuery('div.gallery a').addClass('lightbox');	
    		jQuery('div.gallery a').attr('rel', 'gallery');
    		jQuery('div.images a').attr('rel', 'gallery');
    
    });

// Add lightbox class to single images with links:
	jQuery('a').each(function(){
		
		if ( this.href.toLowerCase().substr(-4).indexOf('.jpg') < 0 &&
		     this.href.toLowerCase().substr(-5).indexOf('.jpeg') < 0 &&
		     this.href.toLowerCase().substr(-4).indexOf('.png') < 0 &&
		     this.href.toLowerCase().substr(-4).indexOf('.gif') < 0 )
		return;

		var $lnk = jQuery(this); 
		
		$lnk.addClass('lightbox');
	
	});

<?php } ?>

<?php if ( is_active_sidebar( 'footer_sidebar' ) ) { ?>

// Masonry for Home page widgets
	var $container = jQuery('#footer-sidebar');
		$container.imagesLoaded(function(){
		$container.masonry({
			itemSelector : '.widget',
			gutterWidth  : 60,
			isAnimated   : true,
			columnWidth	 : 340
		});
	});
	
<?php } ?>

</script>

<?php
}

