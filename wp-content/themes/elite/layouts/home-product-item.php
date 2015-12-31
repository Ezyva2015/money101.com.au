<?php
/**
 * Home Product Item
 *
 * Sets how products are displayed in the custom
 * products widget
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 */

?>
<?php global $post, $product; ?>	

<li id="product-item-<?php the_ID(); ?>" class="product-item">
	
	<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'organizedthemes' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( 'home-product', array( 'class' => 'feature' ) ); ?></a>
	
	<div class="product-item-content">
	
		<h4 class="product-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'organizedthemes' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h4>
		
		<p class="item-price"><?php echo $product->get_price_html(); ?></p>
		
	</div>

</li><!-- #product-item-<?php the_ID(); ?> -->