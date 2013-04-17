<?php

/**
 * The functions that control special behavior of the theme.
 *
 * @package WordPress
 * @subpackage WordPress_Theme_Boilerplate
 * @since 1.00
 *
 */

/* TODO: Change wptbp_ prefixes */

/**
 * Returns the page title based on page properties.
 *
 * @return string
 *
 * @since 1.00
 */
function wptbp_get_title() {
	$title = '';

	// Add any special prefix for sections
	if ( function_exists( 'is_tag' ) && is_tag() ) {
		$title .= single_tag_title( 'Tag Archive for &quot; ', false ) . '&quot; - ';
	} elseif ( is_archive() ) {
		$title .= wp_title( '' ) . ' Archive - ';
	} elseif ( is_search() ) {
		$title .= 'Search for &quot; ' . esc_html( $s ) . '&quot; - ';
	} elseif ( !( is_404() ) && ( is_single() ) || ( is_page() ) ) {
		$title .= wp_title( '' ) . ' - ';
	} elseif ( is_404() ) {
		$title .= 'Not Found - ';
	}

	// Main title
	if ( is_home() ) {
		$title .= get_bloginfo( 'name' ) . ' - ' . get_bloginfo( 'description' );
	} else {
		$title .= get_bloginfo( 'name' );
	}

	// Add page indicator to title
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; // Set the $paged variable

	if ( $paged > 1 ) {
		$title .= ' - page ' . $paged;
	}

	return $title;
}

register_nav_menu( 'primary', 'Primary Navigation' ); // Register primary navigation menu location


// Register sidebar
if ( function_exists( 'register_sidebar' ) ) {
	register_sidebar( array(
		'name' => 'Sidebar Widgets',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>'
	) );
}

// Register secondary sidebar
if ( function_exists( 'register_sidebar' ) ) {
	register_sidebar( array(
		'name' => 'Secondary Sidebar Widgets',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>'
	) );
}