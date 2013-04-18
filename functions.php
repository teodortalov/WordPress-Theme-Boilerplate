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
 * Setup defaults and support for WordPress features.
 *
 * Makes the theme available for translation, adds support for custom a custom header and background, registers the
 * primary navigation menu with WordPress, and sets the default time zone. Called at the after_setup_theme hook.
 */
function wptbp_setup() {
	load_theme_textdomain( 'wptbp', get_template_directory() . '/lang' ); // Make theme available for translation

	add_theme_support( 'custom-header' ); // Add support for custom header

	add_theme_support( 'custom-background' ); // Add support for custom backgrounds

	register_nav_menu( 'primary', __( 'Primary Navigation', 'wptbp' ) ); // Register primary navigation menu

	// Set timezone
	/** @var string $timezone_string The WordPress timezone setting */
	$timezone_string = get_option( 'timezone_string' );
	date_default_timezone_set( $timezone_string );
}

add_action( 'after_setup_theme', 'wptbp_setup' );

/**
 * Registers sidebars with WordPress.
 *
 * @since 1.0.0
 *
 * @return void
 */
function wptbp_register_sidebars() {
	// Register sidebar
	if ( function_exists( 'register_sidebar' ) ) {
		register_sidebar( array(
			'name' => __( 'Sidebar Widgets', 'fp' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		) );
	}

// Register secondary sidebar
	if ( function_exists( 'register_sidebar' ) ) {
		register_sidebar( array(
			'name' => __( 'Secondary Sidebar Widgets', 'fp' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		) );
	}
}

add_action( 'widgets_init', 'wptbp_register_sidebars' );

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