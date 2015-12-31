<?php
/**
 * Product Block Widget
 *
 * This widget creates a home page block
 * of your featured products.  
 *
 */

class HomeProductWidget extends WP_Widget {

 /**
  * Declares the MenuGroupWidget class.
  *
  */
    function HomeProductWidget(){
    $widget_ops = array('classname' => 'home-product-block', 'description' => __( 'Displays a block of your featured products on the home page.','organizedthemes') );
    $this->WP_Widget('home-product-block', __('Home Block - Products','organizedthemes'), $widget_ops);
    }

  /**
    * Displays the Widget
    *
    */
    function widget($args, $instance){
      extract($args);
      $title = empty($instance['title']) ? '' : $instance['title'];
      $description = empty($instance['description']) ? '' : $instance['description'];
      $product_cat_1 = empty($instance['product_cat_1']) ? '' : $instance['product_cat_1'];
      $product_number = empty($instance['product_number']) ? '' : $instance['product_number'];

      # Before the widget
      echo $before_widget;

      # Make the widget
      
      if (!empty($instance['title']))
      	echo $before_title . apply_filters('widget_title', $instance['title']) . $after_title ;
      
      if (!empty($instance['description'])) 
      	echo '<p>' . $description . "</p>";
      	
      	
      ?>
          
		<div class="product-list clearfix">
			
			<ul class="fly-in">
			
			<?php
				  $args = array( 
				  	'orderby' => 'menu_order', 
				  	'order' => 'asc',
				  	'posts_per_page' => $product_number,
				   	'tax_query' => array(
				   		array(
				   			'taxonomy' => 'product_cat',
				   			'field' => 'id',
				   			'terms' => $product_cat_1
				   		),	
				   	)
				   );
				   $recent = new WP_Query( $args );
				   
				   while($recent->have_posts()) : $recent->the_post(); ?>

				<?php get_template_part( 'layouts/home-product-item' ); ?>
					
			<?php endwhile; wp_reset_query(); ?>
			
			</ul>
			
		</div>
      
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
      $instance['description'] = stripslashes($new_instance['description']);
      $instance['product_cat_1'] = stripslashes($new_instance['product_cat_1']);
      $instance['product_number'] = stripslashes($new_instance['product_number']);

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
      		'description' => '',
      		'product_cat_1' => '',
      		'product_number' => '3'
      	) 
      );


?>
	<p>
		<?php _e('This widget will display items from a product category.', 'organizedthemes'); ?>
	</p>
	
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional)', 'organizedthemes'); ?>:</label>
	<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" /></p>
	
	<p><label for="description"><?php _e('Description (optional)', 'organizedthemes'); ?><textarea class="widefat" rows="3" cols="19" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>"><?php echo esc_attr( $instance['description'] ); ?></textarea></label></p>

	
	<p>
		<label for="<?php echo $this->get_field_id( 'product_cat' ); ?>"><?php _e( 'Choose Product Group', 'organizedthemes' ); ?>:</label>
		<?php
		$categories_args = array(
			'name'				=> $this->get_field_name( 'product_cat_1' ),
			'selected'			=> $instance['product_cat_1'],
			'orderby'			=> 'Name',
			'hierarchical'		=> 1,
			'show_option_all'	=> '',
			'taxonomy'			=> 'product_cat',
			'hide_empty'		=> false
		);
		wp_dropdown_categories( $categories_args ); ?>
	</p>
   
   <p><label for="<?php echo $this->get_field_id('product_number'); ?>"><?php _e('Number Of Products To Display', 'organizedthemes'); ?>:</label>
   <input type="text" id="<?php echo $this->get_field_id('product_number'); ?>" name="<?php echo $this->get_field_name('product_number'); ?>" value="<?php echo esc_attr( $instance['product_number'] ); ?>" style="width:95%;" /></p>
    
<?php
  }

}// END class

	function Home_Product_Widget_Init() {
		register_widget('HomeProductWidget');
	}
	add_action('widgets_init', 'Home_Product_Widget_Init');
