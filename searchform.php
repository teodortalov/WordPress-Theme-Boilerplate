<?php

/**
 * Search form that can be used on any page.
 *
 * Call the search form with the get_search_form() function. The results are displayed in search.php.
 *
 * @package    WordPress
 * @subpackage WordPressThemeBoilerplate
 * @author     Christopher Lamm <chris@theantichris.com>
 * @since      1.0.0
 */

?>

<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="s"><?php _e( 'Search:', 'wptbp' ); ?></label>
	<input id="s" name="s" type="search" value="<?php _e( 'Search:', 'wptbp' ); ?>" />
	<input id="search-submit" type="submit" name="submit" value="<?php _e( 'Search:', 'wptbp' ); ?>" />
</form>