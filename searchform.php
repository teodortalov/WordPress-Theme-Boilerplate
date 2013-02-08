<?php

/**
 * Search form that can be used on any page.
 *
 * Call the search form with the get_search_form() function.
 *
 * @package WordPress
 * @subpackage WordPress_Theme_Boilerplate
 * @since 1.00
 */

?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="s">Search</label>
	<input type="text" name="s" id="s" placeholder="Search" />
	<input type="submit" name="submit" id="searchsubmit" value="Search" />
</form>