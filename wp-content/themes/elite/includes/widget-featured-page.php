<?php

/**
 * The featured page widget displays
 * content from the page of your choosing
 * inside a widget.  Based on the Genesis widget
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 *
 */

add_action('widgets_init', create_function('', "register_widget('OrganizedThemes_Featured_Page');"));
class OrganizedThemes_Featured_Page extends WP_Widget {

	function OrganizedThemes_Featured_Page() {
		$widget_ops = array( 
			'classname' => 'featuredpage', 
			'description' => __('Displays featured page with thumbnail', 'organizedthemes') 
		);
		$control_ops = array( 'width' => 200, 'height' => 250, 'id_base' => 'featured-page' );
		$this->WP_Widget( 'featured-page', __('Featured Page Widget', 'organizedthemes'), $widget_ops, $control_ops );
	}

	function widget($args, $instance) {
		extract($args);
		
		$instance = wp_parse_args( (array)$instance, array(
			'title' => '',
			'page_id' => '',
			'show_title' => 0,
			'show_content' => 0,
			'content_limit' => '',
			'more_text' => ''
		) );
		
		echo $before_widget;
		
			// Set up the author bio
			if (!empty($instance['title']))
				echo $before_title . apply_filters('widget_title', $instance['title']) . $after_title;

			$featured_page = new WP_Query(array('page_id' => $instance['page_id']));
			if($featured_page->have_posts()) : while($featured_page->have_posts()) : $featured_page->the_post();
				
				echo '<div '; post_class(); echo '>';

				?>
				
				<a href="<?php the_permalink() ?>" rel="noindex"><?php the_post_thumbnail(); ?></a>
				
				<?php
				if(!empty($instance['show_title'])) :
					printf( '<h2><a href="%s" title="%s">%s</a></h2>', get_permalink(), the_title_attribute('echo=0'), the_title_attribute('echo=0') );
				endif;
				
				if(!empty($instance['show_content'])) :
				
					if(empty($instance['content_limit'])) :
						the_content($instance['more_text']);
					else :
						the_content_limit( (int)$instance['content_limit'], esc_html( $instance['more_text'] ) );
					endif;
					
				endif;
				
				echo '</div><!--end post_class()-->'."\n\n";
					
			endwhile; endif;
		
		echo $after_widget;
		wp_reset_query();
	}

	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	function form($instance) { 
		
		$instance = wp_parse_args( (array)$instance, array(
			'title' => '',
			'page_id' => '',
			'image_size' => '',
			'show_title' => 0,
			'show_content' => 0,
			'content_limit' => '',
			'more_text' => __('[Read More...]', 'organizedthemes')
		) );
		
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" /></p>
		
		<p><label for="<?php echo $this->get_field_id('page_id'); ?>"><?php _e('Page', 'organizedthemes'); ?>:</label>
		<?php wp_dropdown_pages(array('name' => $this->get_field_name('page_id'), 'selected' => $instance['page_id'])); ?></p>
		
		<p><input id="<?php echo $this->get_field_id('show_title'); ?>" type="checkbox" name="<?php echo $this->get_field_name('show_title'); ?>" value="1" <?php checked(1, $instance['show_title']); ?>/> <label for="<?php echo $this->get_field_id('show_title'); ?>"><?php _e('Show Page Title', 'organizedthemes'); ?></label></p>
		
		<p><input id="<?php echo $this->get_field_id('show_content'); ?>" type="checkbox" name="<?php echo $this->get_field_name('show_content'); ?>" value="1" <?php checked(1, $instance['show_content']); ?>/> <label for="<?php echo $this->get_field_id('show_content'); ?>"><?php _e('Show Page Content', 'organizedthemes'); ?></label></p>
		
		<p><label for="<?php echo $this->get_field_id('content_limit'); ?>"><?php _e('Content Character Limit', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('content_limit'); ?>" name="<?php echo $this->get_field_name('content_limit'); ?>" value="<?php echo esc_attr( $instance['content_limit'] ); ?>" size="3" /></p>
		
		<p><label for="<?php echo $this->get_field_id('more_text'); ?>"><?php _e('More Text', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('more_text'); ?>" name="<?php echo $this->get_field_name('more_text'); ?>" value="<?php echo esc_attr( $instance['more_text'] ); ?>" /></p>
			
	<?php 
	}
}