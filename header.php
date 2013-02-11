<?php

/**
 * Included at the top of every page.
 *
 * @package WordPress
 * @subpackage WordPress_Theme_Boilerplate
 * @since 1.00
 */

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>

	<title><?php echo wptbp_get_title(); ?></title>

	<?php wp_enqueue_script( 'jquery' ); ?>

	<?php wp_head(); ?>

	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen"/>
</head>

<body <?php body_class(); ?>>

<header>

</header>