<?php

/**
 * Error page, served up when a URL is used that does not exist.
 *
 * @package    WordPress
 * @subpackage WordPressThemeBoilerplate
 * @author     Christopher Lamm <chris@theantichris.com>
 * @since      1.0.0
 */

get_header()

?>

	<div id="content" role="main">
		<h2><?php _e( 'Error 404 - Page Not Found', 'wptbp' ); ?></h2>
	</div>

<?php

get_sidebar();

get_footer();

?>