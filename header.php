<?php

/**
 * Included at the top of every page. Includes the doctype, <head> tag, opening <body> tag, <header> tag, and <nav> tag.
 * wp_head() is called from the <head> tag.
 *
 * @package    WordPress
 * @subpackage WordPressThemeBoilerplate
 * @author     Christopher Lamm <chris@theantichris.com>
 * @since      1.0.0
 */

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<meta name="description" content="<?php bloginfo( 'description' ); ?>" />

	<meta name="author" content="Christopher Lamm" /> <?php // TODO: Change author name. ?>

	<meta name="Copyright" content="Copyright &copy; <?php bloginfo( 'name' ); ?> <?php echo date( 'Y' ); ?>. All Rights Reserved.">

	<title><?php echo wptbp_get_title(); // TODO: Change function prefix. ?></title>

	<?php wp_head(); ?>

	<link rel="shortcut icon" href="<?php bloginfo( 'stylesheet_directory' ); ?>/favicon.ico" />
	<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo( 'stylesheet_directory' ); ?>/apple-icon-57x57.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo( 'stylesheet_directory' ); ?>/apple-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo( 'stylesheet_directory' ); ?>/apple-icon-114x114.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo( 'stylesheet_directory' ); ?>/apple-icon-144x144.png" />

	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen, projection" />
</head>

<body <?php body_class(); ?>>

<header id="header" role="header">

</header>

<nav id="nav" role="navigation">

</nav>