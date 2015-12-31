<?php
/**
 * Staff links.
 *
 * This file creates the social network
 * links for our staff members
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 *
 *
 */?>
<ul class="network-icons">                                                         

	<?php if(get_post_meta($post->ID, "network_1_link", $single = true) != ""){ ?>
		<li class="<?php echo get_post_meta($post->ID, "network_1_icon", TRUE); ?>"><a href="<?php echo get_post_meta($post->ID, "network_1_link", TRUE); ?>"></a></li>
	<?php } ?>
	
	<?php if(get_post_meta($post->ID, "network_2_link", $single = true) != ""){ ?>
		<li class="<?php echo get_post_meta($post->ID, "network_2_icon", TRUE); ?>"><a href="<?php echo get_post_meta($post->ID, "network_2_link", TRUE); ?>"></a></li>
	<?php } ?>
	
	<?php if(get_post_meta($post->ID, "network_3_link", $single = true) != ""){ ?>
		<li  class="<?php echo get_post_meta($post->ID, "network_3_icon", TRUE); ?>"><a href="<?php echo get_post_meta($post->ID, "network_3_link", TRUE); ?>"></a></li>
	<?php } ?>
	
	<?php if(get_post_meta($post->ID, "network_4_link", $single = true) != ""){ ?>
		<li  class="<?php echo get_post_meta($post->ID, "network_4_icon", TRUE); ?>"><a href="<?php echo get_post_meta($post->ID, "network_4_link", TRUE); ?>"></a></li>
	<?php } ?>
	
	<?php if(get_post_meta($post->ID, "network_5_link", $single = true) != ""){ ?>
		<li  class="<?php echo get_post_meta($post->ID, "network_5_icon", TRUE); ?>" ><a href="<?php echo get_post_meta($post->ID, "network_5_link", TRUE); ?>"></a></li>
	<?php } ?>
	
	<?php if(get_post_meta($post->ID, "network_6_link", $single = true) != ""){ ?>
		<li  class="<?php echo get_post_meta($post->ID, "network_6_icon", TRUE); ?>"><a href="<?php echo get_post_meta($post->ID, "network_6_link", TRUE); ?>"></a></li>
	<?php } ?>
	
	<?php if(get_post_meta($post->ID, "network_7_link", $single = true) != ""){ ?>
		<li class="<?php echo get_post_meta($post->ID, "network_7_icon", TRUE); ?>"><a href="<?php echo get_post_meta($post->ID, "network_7_link", TRUE); ?>"></a></li>
	<?php } ?>
			
</li>
