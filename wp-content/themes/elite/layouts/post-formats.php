<?php
/**
 * Displays post format media
 *
 * A reusable post format media block
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 *
 *
 */
 
  if ( has_post_format( 'video' ) ) { ?>

	<div class="fit-video feature"><?php echo get_post_meta($post->ID, "slide_video", TRUE); ?></div>

<?php } elseif ( has_post_thumbnail() ) { ?>

	<?php the_post_thumbnail( '', array( 'class' => 'feature' ) ); ?>

<?php } ?>