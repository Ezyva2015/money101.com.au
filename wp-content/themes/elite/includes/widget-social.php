<?php
/**
 * Social Widget
 *
 * Adds a simple widget to provide icon links
 * to various social sites
 *
 */

class OrganizedThemes_Social_Widget extends WP_Widget {
 /**
  * Declares the OrganizedThemes_Social_Widget class.
  *
  */
    function OrganizedThemes_Social_Widget(){
	    $widget_ops = array(
	    	'classname' => 'organizedthemes-social-widget', 
	    	'description' => __( 'Displays icons with links to various social networks','organizedthemes') 
	    	);
	    $control_ops = array('width' => 300, 'height' => 350);
	    $this->WP_Widget('organizedthemes_social', __('Social Network Links','organizedthemes'), $widget_ops, $control_ops);
    }

  /**
    * Displays the Widget
    *
    */
    function widget($args, $instance){
      extract($args);
      $title 		= empty($instance['title']) ? '' : $instance['title'];
      $twitter		= empty($instance['twitter']) ? '' : $instance['twitter'];
      $dribbble		= empty($instance['dribbble']) ? '' : $instance['dribbble'];
      $email		= empty($instance['email']) ? '' : $instance['email'];
      $facebook		= empty($instance['facebook']) ? '' : $instance['facebook'];
      $flickr		= empty($instance['flickr']) ? '' : $instance['flickr'];
      $google		= empty($instance['google']) ? '' : $instance['google'];
      $linkedin		= empty($instance['linkedin']) ? '' : $instance['linkedin'];
      $instagram	= empty($instance['instagram']) ? '' : $instance['instagram'];
      $itunes		= empty($instance['itunes']) ? '' : $instance['itunes'];
      $pinterest	= empty($instance['pinterest']) ? '' : $instance['pinterest'];
      $rss			= empty($instance['rss']) ? '' : $instance['rss'];
      $skype		= empty($instance['skype']) ? '' : $instance['skype'];
      $vimeo		= empty($instance['vimeo']) ? '' : $instance['vimeo'];
      $youtube		= empty($instance['youtube']) ? '' : $instance['youtube'];
      $new_window	= empty($instance['new_window']) ? '' : $instance['new_window'];

      # Before the widget
      echo $before_widget;

      # Make the widget
      
      if (!empty($instance['title']))
      	echo $before_title . apply_filters('widget_title', $instance['title']) . $after_title ;
      
     	echo '<ul class="network-icons">';
     	
     		// Twitter
	     		if (!empty($instance['twitter'])) {
	     			echo '<li class="twitter"><a href="';
	     			echo  $twitter;
	     			echo '"';
	     				if (!empty($instance['new_window']))
	     					echo ' target="_blank"';
	     			echo '></a></li>';
	     		}
     		
     		// Dribbble
	     		if (!empty($instance['dribbble'])) {
	     			echo '<li class="dribbble"><a href="';
	     			echo  $dribbble;
	     			echo '"';
	     				if (!empty($instance['new_window']))
	     					echo ' target="_blank"';
	     			echo '></a></li>';
	     		}
	     		
	     	// email
	     		if (!empty($instance['email'])) {
	     			echo '<li class="email"><a href="mailto:';
	     			echo  $email;
	     			echo '"';
	     			echo '></a></li>';
	     		}
	     	
	     	// facebook
	     		if (!empty($instance['facebook'])) {
	     			echo '<li class="facebook"><a href="';
	     			echo  $facebook;
	     			echo '"';
	     				if (!empty($instance['new_window']))
	     					echo ' target="_blank"';
	     			echo '></a></li>';
	     		}
	     	
	     	// flickr
	     		if (!empty($instance['flickr'])) {
	     			echo '<li class="flickr"><a href="';
	     			echo  $flickr;
	     			echo '"';
	     				if (!empty($instance['new_window']))
	     					echo ' target="_blank"';
	     			echo '></a></li>';
	     		}
	     	
	     	// google
	     		if (!empty($instance['google'])) {
	     			echo '<li class="google"><a href="';
	     			echo  $google;
	     			echo '"';
	     				if (!empty($instance['new_window']))
	     					echo ' target="_blank"';
	     			echo '></a></li>';
	     		}
	     	
	     	// linkedin
	     		if (!empty($instance['linkedin'])) {
	     			echo '<li class="linkedin"><a href="';
	     			echo  $linkedin;
	     			echo '"';
	     				if (!empty($instance['new_window']))
	     					echo ' target="_blank"';
	     			echo '></a></li>';
	     		}
	     	
	     	// instagram
	     		if (!empty($instance['instagram'])) {
	     			echo '<li class="instagram"><a href="';
	     			echo  $instagram;
	     			echo '"';
	     				if (!empty($instance['new_window']))
	     					echo ' target="_blank"';
	     			echo '></a></li>';
	     		}
	     	
	     	// itunes
	     		if (!empty($instance['itunes'])) {
	     			echo '<li class="itunes"><a href="';
	     			echo  $itunes;
	     			echo '"';
	     				if (!empty($instance['new_window']))
	     					echo ' target="_blank"';
	     			echo '></a></li>';
	     		}
	     	
	     	// pinterest
	     		if (!empty($instance['pinterest'])) {
	     			echo '<li class="pinterest"><a href="';
	     			echo  $pinterest;
	     			echo '"';
	     				if (!empty($instance['new_window']))
	     					echo ' target="_blank"';
	     			echo '></a></li>';
	     		}
	     	
	     	// rss
	     		if (!empty($instance['rss'])) {
	     			echo '<li class="rss"><a href="';
	     			echo  $rss;
	     			echo '"';
	     				if (!empty($instance['new_window']))
	     					echo ' target="_blank"';
	     			echo '></a></li>';
	     		}
	     	
	     	// skype
	     		if (!empty($instance['skype'])) {
	     			echo '<li class="skype"><a href="';
	     			echo  $skype;
	     			echo '"';
	     				if (!empty($instance['new_window']))
	     					echo ' target="_blank"';
	     			echo '></a></li>';
	     		}
	     	
	     	// vimeo
	     		if (!empty($instance['vimeo'])) {
	     			echo '<li class="vimeo"><a href="';
	     			echo  $vimeo;
	     			echo '"';
	     				if (!empty($instance['new_window']))
	     					echo ' target="_blank"';
	     			echo '></a></li>';
	     		}
	     	
	     	// youtube
	     		if (!empty($instance['youtube'])) {
	     			echo '<li class="youtube"><a href="';
	     			echo  $youtube;
	     			echo '"';
	     				if (!empty($instance['new_window']))
	     					echo ' target="_blank"';
	     			echo '></a></li>';
	     		}
     		
     	echo '</ul>';

      # After the widget
      echo $after_widget;
  }

  /**
    * Saves the widgets settings.
    *
    */
    function update($new_instance, $old_instance){
      $instance = $old_instance;
      $instance['title'] 		= stripslashes($new_instance['title']);
      $instance['twitter'] 		= stripslashes($new_instance['twitter']);
      $instance['dribbble'] 	= stripslashes($new_instance['dribbble']);
      $instance['email'] 		= stripslashes($new_instance['email']);
      $instance['facebook'] 	= stripslashes($new_instance['facebook']);
      $instance['flickr'] 		= stripslashes($new_instance['flickr']);
      $instance['google'] 		= stripslashes($new_instance['google']);
      $instance['linkedin'] 	= stripslashes($new_instance['linkedin']);
      $instance['instagram'] 	= stripslashes($new_instance['instagram']);
      $instance['itunes'] 		= stripslashes($new_instance['itunes']);
      $instance['pinterest'] 	= stripslashes($new_instance['pinterest']);
      $instance['rss'] 			= stripslashes($new_instance['rss']);
      $instance['skype'] 		= stripslashes($new_instance['skype']);
      $instance['vimeo'] 		= stripslashes($new_instance['vimeo']);
      $instance['youtube'] 		= stripslashes($new_instance['youtube']);
      $instance['new_window'] 	= stripslashes($new_instance['new_window']);

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
      		'twitter'=>'',
      		'dribbble'=>'',
      		'email'=>'',
      		'facebook'=>'',
      		'google'=>'',
      		'itunes'=>'',
      		'linkedin'=>'',
      		'instagram'=>'',
      		'pinterest'=>'',
      		'rss'=>'',
      		'skype'=>'',
      		'vimeo'=>'',
      		'youtube'=>'',
      		'flickr'=>'',
      		'new_window'=>''
      	) 
      );

?>
	<p>
		<?php _e('To include an icon/link enter the URL to your profile on any network below.  Only networks with a URL present will be displayed.', 'organizedthemes'); ?>
	</p>
	
	<p>
		<input id="<?php echo $this->get_field_id( 'new_window' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'new_window' ); ?>" value="1" <?php checked( $instance['new_window'] ); ?>/>
		<label for="<?php echo $this->get_field_id( 'new_window' ); ?>"><?php _e( 'Open links in new tab/window?', 'organizedthemes' ); ?></label>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:99%;" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php echo esc_attr( $instance['twitter'] ); ?>" style="width:99%;" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('dribbble'); ?>"><?php _e('Dribbble', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('dribbble'); ?>" name="<?php echo $this->get_field_name('dribbble'); ?>" value="<?php echo esc_attr( $instance['dribbble'] ); ?>" style="width:99%;" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email Address', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" value="<?php echo esc_attr( $instance['email'] ); ?>" style="width:99%;" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php echo esc_attr( $instance['facebook'] ); ?>" style="width:99%;" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('flickr'); ?>"><?php _e('Flickr', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" value="<?php echo esc_attr( $instance['flickr'] ); ?>" style="width:99%;" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Google Plus', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" value="<?php echo esc_attr( $instance['google'] ); ?>" style="width:99%;" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" value="<?php echo esc_attr( $instance['instagram'] ); ?>" style="width:99%;" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('itunes'); ?>"><?php _e('Itunes', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('itunes'); ?>" name="<?php echo $this->get_field_name('itunes'); ?>" value="<?php echo esc_attr( $instance['itunes'] ); ?>" style="width:99%;" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('LinkedIn', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" value="<?php echo esc_attr( $instance['linkedin'] ); ?>" style="width:99%;" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" value="<?php echo esc_attr( $instance['pinterest'] ); ?>" style="width:99%;" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('RSS Feed', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" value="<?php echo esc_attr( $instance['rss'] ); ?>" style="width:99%;" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('skype'); ?>"><?php _e('Skype', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('skype'); ?>" name="<?php echo $this->get_field_name('skype'); ?>" value="<?php echo esc_attr( $instance['skype'] ); ?>" style="width:99%;" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('vimeo'); ?>"><?php _e('Vimeo', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('vimeo'); ?>" name="<?php echo $this->get_field_name('vimeo'); ?>" value="<?php echo esc_attr( $instance['vimeo'] ); ?>" style="width:99%;" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('YouTube', 'organizedthemes'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" value="<?php echo esc_attr( $instance['youtube'] ); ?>" style="width:99%;" />
	</p>
      
<?php
  }

}// END class

function OrganizedThemes_Social_Widget_Init() {
	register_widget('OrganizedThemes_Social_Widget');
}
add_action('widgets_init', 'OrganizedThemes_Social_Widget_Init');
