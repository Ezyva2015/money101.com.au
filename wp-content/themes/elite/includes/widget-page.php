<?php
/**
 * Page Widget
 *
 * Creates a block for the home page
 * widget areas.  It is not intended for 
 * sidebar areas  
 *
 */

class PageBlockWidget extends WP_Widget
{
 /**
  * Declares the PageBlockWidget class.
  *
  */
    function PageBlockWidget(){
    $widget_ops = array('classname' => 'home-page-block', 'description' => __( 'Displays the content from the page of your choice','organizedthemes') );
    $this->WP_Widget('page-block', __('Home Block - Page Content','organizedthemes'), $widget_ops);
    }

  /**
    * Displays the Widget
    *
    */
    function widget($args, $instance){
      extract($args);
      $title = empty($instance['title']) ? '' : $instance['title'];
      $page_id = empty($instance['page_id']) ? '' : $instance['page_id'];

      # Before the widget
      echo $before_widget;

      # Make the widget
      
      if (!empty($instance['title']))
      	echo $before_title . apply_filters('widget_title', $instance['title']) . $after_title ;      	
      	
     	 $featured_page = new WP_Query(array('page_id' => $instance['page_id']));
  			if($featured_page->have_posts()) : while($featured_page->have_posts()) : $featured_page->the_post();
  				
  				echo '<div class="home-page-content">';
  
  				the_content();
  				
  				echo '</div><!-- .home-page-content -->';
  					
  			endwhile; endif;
         	wp_reset_query();

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
      $instance['page_id'] = stripslashes($new_instance['page_id']);

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
      		'page_id' => ''
      	) 
      );


?>
	<p>
		<?php _e('This widget will display your slideshow.  Go to the Media section and select "Slides" to add your slides.', 'organizedthemes'); ?>
	</p>
	
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional)', 'organizedthemes'); ?>:</label>
	<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" /></p>

   	<p><label for="<?php echo $this->get_field_id('page_id'); ?>"><?php _e('Page', 'organizedthemes'); ?>:</label>
   	<?php wp_dropdown_pages(array('name' => $this->get_field_name('page_id'), 'selected' => $instance['page_id'])); ?></p>
    
<?php
  }

}// END class

	function PageBlockWidget_Init() {
		register_widget('PageBlockWidget');
	}
	add_action('widgets_init', 'PageBlockWidget_Init');
