<?php
/**
 * Attention Widget
 *
 * A small home page block to catch the attention of your visitors 
 *
 */

class OrganizedThemesAttentionWidget extends WP_Widget {
 /**
  * Declares the MenuGroupWidget class.
  *
  */
    function OrganizedThemesAttentionWidget(){
    $widget_ops = array('classname' => 'attention-block', 'description' => __( 'Displays a small block to catch visitors attention','organizedthemes') );
    $this->WP_Widget('attention-block', __('Home Block - Attention Widget','organizedthemes'), $widget_ops);
    }

  /**
    * Displays the Widget
    *
    */
    function widget($args, $instance){
      extract($args);
      $title = empty($instance['title']) ? '' : $instance['title'];
      $link = empty($instance['link']) ? '' : $instance['link'];
      $icon = empty($instance['icon']) ? '' : $instance['icon'];
      $description = empty($instance['description']) ? '' : $instance['description'];

      # Before the widget
      echo $before_widget;

      # Make the widget
      
		if (!empty($instance['link'])) 
			echo '<a href="' . $link . '">';	

		if (!empty($instance['title'])) 
			echo '<h3 class="' . $icon . '">' . $title . '</h3>';
			
		if (!empty($instance['link'])) 
			echo '</a>';
		
		if ( !empty($instance['description']) ) { 
			echo '<p class="attention-description'; 
				if ( $icon == 'no-icon' ) {
					echo ' no-icon';
				}
			echo '">' . $description . '</p>';
		}
  	    

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
      $instance['link'] = stripslashes($new_instance['link']);
      $instance['icon'] = stripslashes($new_instance['icon']);
      $instance['description'] = stripslashes($new_instance['description']);

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
      		'link' => '',
      		'icon' => '',
      		'description' => ''
      	) 
      );


?>
	<p>
		<?php _e('Enter the text you\'d like to use and select an icon to use this widget.  You can also add a link.', 'organizedthemes'); ?>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link (optional)', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" value="<?php echo esc_attr( $instance['link'] ); ?>" style="width:95%;" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e( 'Icon', 'organizedthemes' ); ?>:</label>
		<select id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>">
			<option value="lock" <?php selected( 'lock', $instance['icon'] ); ?>><?php _e( 'Lock', 'organizedthemes' ); ?></option>
			<option value="present" <?php selected( 'present', $instance['icon'] ); ?>><?php _e( 'Present', 'organizedthemes' ); ?></option>
			<option value="lightbulb" <?php selected( 'lightbulb', $instance['icon'] ); ?>><?php _e( 'Lightbulb', 'organizedthemes' ); ?></option>
			<option value="cart" <?php selected( 'cart', $instance['icon'] ); ?>><?php _e( 'Shopping Cart', 'organizedthemes' ); ?></option>
			<option value="time" <?php selected( 'time', $instance['icon'] ); ?>><?php _e( 'Clock', 'organizedthemes' ); ?></option>
			<option value="star" <?php selected( 'star', $instance['icon'] ); ?>><?php _e( 'Star', 'organizedthemes' ); ?></option>
			<option value="question" <?php selected( 'question', $instance['icon'] ); ?>><?php _e( 'Question', 'organizedthemes' ); ?></option>
			<option value="plus" <?php selected( 'plus', $instance['icon'] ); ?>><?php _e( 'Plus', 'organizedthemes' ); ?></option>
			<option value="phone" <?php selected( 'phone', $instance['icon'] ); ?>><?php _e( 'Phone', 'organizedthemes' ); ?></option>
			<option value="location" <?php selected( 'location', $instance['icon'] ); ?>><?php _e( 'Location', 'organizedthemes' ); ?></option>
			<option value="tags" <?php selected( 'tags', $instance['icon'] ); ?>><?php _e( 'Tags', 'organizedthemes' ); ?></option>
			<option value="no-icon" <?php selected( 'none', $instance['icon'] ); ?>><?php _e( 'No Icon', 'organizedthemes' ); ?></option>
		</select>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" value="<?php echo esc_attr( $instance['description'] ); ?>" style="width:95%;" />
	</p>
   
    
<?php
  }

}// END class

function OrganizedThemesAttentionWidget_Init() {
	register_widget('OrganizedThemesAttentionWidget');
}

add_action('widgets_init', 'OrganizedThemesAttentionWidget_Init');
