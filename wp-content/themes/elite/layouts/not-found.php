<?php
/**
 * Not Found
 *
 * This is what is displayed when a query does
 * not return any results
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 */

?>
<article class="404">
	
	<h1 class="page-title"><?php _e('Not Found', 'organizedthemes'); ?></h1>
	
	<p><?php _e('We were unable to find what you\'re looking for.  You can try searching for it here.', 'organizedthemes'); ?></p>
	
	<?php get_search_form(); ?>
	
</article>