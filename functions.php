<?php

/**
 * The functions that control special behavior of the theme.
 *
 * @package    WordPress
 * @subpackage WordPressThemeBoilerplate
 * @author     Christopher Lamm <chris@theantichris.com>
 * @since      1.0.0
 *
 */

// TODO: Change wptbp_ function prefixes to something unique to your theme here in the declaration and in their calls.
// TODO: Change wptbp text domain to something unique to your theme in load_theme_textdomain() and where used..

/**
 * Setup defaults and support for WordPress features.
 *
 * Makes the theme available for translation, adds support for custom a custom header and background, registers the
 * primary navigation menu with WordPress, and sets the default time zone. Called at the after_setup_theme hook.
 *
 * @since 1.0.0
 *
 * @return void
 */
function wptbp_setup() {
	load_theme_textdomain( 'wptbp', get_template_directory() . '/lang' ); // Make theme available for translation.

	add_theme_support( 'custom-header' ); // Add support for custom header.

	add_theme_support( 'custom-background' ); // Add support for custom backgrounds.

	register_nav_menu( 'primary', __( 'Primary Navigation', 'wptbp' ) ); // Register primary navigation menu.

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
	if ( function_exists( 'register_sidebar' ) ) {
		register_sidebar( array(
			'name'          => __( 'Sidebar Widgets', 'wptbp' ),
			'id'			=> 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
		) );
	}
}

add_action( 'widgets_init', 'wptbp_register_sidebars' );

/**
 * Returns the page title based on page properties.
 *
 * This function is called from the theme's header.php file without parameters. It checks the type of page that is being
 * requested and formats the page title based on type.
 *
 * @since 1.00
 *
 * @return string
 */
function wptbp_get_title() {
	/** @var string $title The string that will become the page title */
	$title = '';

	// Add any special prefix for sections.
	if ( function_exists( 'is_tag' ) && is_tag() ) {
		$title .= single_tag_title( 'Tag Archive for &quot; ', false ) . '&quot; - ';
	} elseif ( is_archive() ) {
		$title .= wp_title( '' ) . ' Archive - ';
	} elseif ( is_search() ) {
		/** @var string $s WordPress search term. */
		$title .= 'Search for &quot; ' . esc_html( $s ) . '&quot; - ';
	} elseif ( !( is_404() ) && ( is_single() ) || ( is_page() ) ) {
		$title .= wp_title( '' ) . ' - ';
	} elseif ( is_404() ) {
		$title .= 'Not Found - ';
	}

	// Main title.
	if ( is_home() ) {
		$title .= get_bloginfo( 'name' ) . ' - ' . get_bloginfo( 'description' );
	} else {
		$title .= get_bloginfo( 'name' );
	}

	// Add page indicator to title.
	/** @var int $paged Number of pages found. */
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; // Set the $paged variable.

	if ( $paged > 1 ) {
		$title .= ' - page ' . $paged;
	}

	return $title;
}