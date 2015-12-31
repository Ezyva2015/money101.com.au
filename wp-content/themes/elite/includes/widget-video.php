<?php
/**
 * Video Widget
 *
 * Adds a simple widget
 * to embed video.  Uses an extra
 * div called video to allow
 * for responsive video sizing.
 *
 */

class FeaturedVideoWidget extends WP_Widget {
 /**
  * Declares the FeaturedVideoWidget class.
  *
  */
    function FeaturedVideoWidget(){
	    $widget_ops = array(
	    	'classname' => 'featured-video', 
	    	'description' => __( 'Display a Featured Video','organizedthemes') 
	    	);
	    $control_ops = array('width' => 400, 'height' => 350);
	    $this->WP_Widget('featuredvideo', __('Featured Video Widget','organizedthemes'), $widget_ops, $control_ops);
    }

  /**
    * Displays the Widget
    *
    */
    function widget($args, $instance){
      extract($args);
      $embed = empty($instance['title']) ? '' : $instance['title'];
      $embed = empty($instance['embed']) ? '' : $instance['embed'];

      # Before the widget
      echo $before_widget;

      # Make the widget
      
      if (!empty($instance['title']))
      	echo $before_title . apply_filters('widget_title', $instance['title']) . $after_title ;
      
      echo '<div class="fit-video">' . $embed . "</div>";

      # After the widget
      echo $after_widget;
  }

  /**
    * Saves the widgets settings.
    *
    */
    function update($new_instance, $old_instance){
      $instance = $old_instance;
      $instance['title'] = stripslashes($new_instance['title']);
      $instance['embed'] = stripslashes($new_instance['embed']);

    return $instance;
  }

  /**
    * Creates the edit form for the widget.
    *
    */
    function form($instance){
      //Defaults
      $instance = wp_parse_args( (array) $instance, array(
      		'title' => '',
      		'embed'=>''
      	) 
      );

      $embed = htmlspecialchars($instance['embed']);

?>
	<p>
		<?php _e('The video widget can be used to display a video in any sidebar area.  Just paste the embed code from the video provider of your choice (like YouTube or Vimeo).  Be sure to use the embed code and not just the URL to the video.', 'organizedthemes'); ?>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:99%;" />
	</p>
	
	<p>
		<label for="embed"><?php _e('Embed Code:', 'organizedthemes'); ?></label>
		<textarea class="widefat" rows="16" cols="19" id="<?php echo $this->get_field_id('embed'); ?>" name="<?php echo $this->get_field_name('embed'); ?>"><?php echo $embed; ?></textarea>
	</p>
      
<?php
  }

}// END class

function FeaturedVideoInit() {
	register_widget('FeaturedVideoWidget');
}
add_action('widgets_init', 'FeaturedVideoInit');


