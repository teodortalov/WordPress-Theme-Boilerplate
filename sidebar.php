<?php

/**
 * The main sidebar the theme uses.
 *
 * @package    WordPress
 * @subpackage WordPressThemeBoilerplate
 * @author     Christopher Lamm <chris@theantichris.com>
 * @since      1.0.0
 *
 */

?>

<div id="sidebar">
	<?php

	if ( ( function_exists( 'dynamic_sidebar' ) ) && ( dynamic_sidebar( 'sidebar' ) ) ) {
		dynamic_sidebar( 'sidebar' );
	}

	?>
</div>