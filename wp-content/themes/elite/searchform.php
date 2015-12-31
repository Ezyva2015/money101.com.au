<?php
/**
 * Search Form
 *
 * This file controls the display of 
 * search form within the theme
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 */
?>
	<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'organizedthemes' ); ?></label>
		<input type="text" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="" />
		<input type="submit" class="submit" name="submit" id="search-submit" value="<?php esc_attr_e( 'Search', 'organizedthemes' ); ?>" />
	</form>