<?php
/**
 * Testimony Widget
 *
 * Displays customer testimonials for your site. 
 *
 */

class OrganizedThemesTestimonyWidget extends WP_Widget {
 /**
  * Declares the MenuGroupWidget class.
  *
  */
    function OrganizedThemesTestimonyWidget(){
    $widget_ops = array('classname' => 'testimony-block', 'description' => __( 'Displays quotes from your customers','organizedthemes') );
    $this->WP_Widget('testimony-block', __('Testimony Widget','organizedthemes'), $widget_ops);
    }

  /**
    * Displays the Widget
    *
    */
    function widget($args, $instance){
      extract($args);
      $title = empty($instance['title']) ? '' : $instance['title'];

      # Before the widget
      echo $before_widget;

      # Make the widget
      
      if (!empty($instance['title']))
      	echo $before_title . apply_filters('widget_title', $instance['title']) . $after_title ;
      	
      	
      ?>
          
		<div class="testimony-content">	
			
		<?php
			
			if ( ! ( $query = get_transient( 'testimony_posts' ) ) ) {
			
				 $args = array( 
					'post_type' => 'testimony', 
					'orderby' => 'rand', 
					'order' => 'asc',
					'posts_per_page' => '1', 
					'no_found_rows' => true
					);
				
				set_transient( 'testimony_posts', $query, 600 );
			
			}
				  
			$testimony = new WP_Query( $args );
			
			while($testimony->have_posts()) : $testimony->the_post(); ?>
			
				
				<div class="testimony-text"><?php the_content(); ?></div>
				
				<p class="testimony-author"><?php the_title(); ?></p>
				
				
			<?php endwhile; wp_reset_query(); ?>
				
		</div><!-- .testimony-content -->	

      <?php
      
      
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

    return $instance;
  }

  /**
    * Creates the edit form for the widget.
    *
    */
    function form($instance){
      //Defaults
      $instance = wp_parse_args( (array) $instance, array(
      		'title' => ''
      	) 
      );


?>
	<p>
		<?php _e('This widget will display quotes from your customer testimonies.', 'organizedthemes'); ?>
	</p>
	
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional)', 'organizedthemes'); ?>:</label>
	<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" /></p>
   
    
<?php
  }

}// END class

function OrganizedThemes_Testimony_Widget_Init() {
	register_widget('OrganizedThemesTestimonyWidget');
}

add_action('widgets_init', 'OrganizedThemes_Testimony_Widget_Init');
