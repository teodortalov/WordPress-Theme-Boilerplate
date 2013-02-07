<?php

/**
 * Home page and default template.
 *
 * @since 1.00
 */

// TODO: Change wptbp_ prefix

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>

	<title><?php wptbp_get_title(); ?></title>

	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen"/>

	<?php wp_head(); ?>
</head>

<?php wp_enqueue_script( 'jquery' ); ?>
</html>