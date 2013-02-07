<?php

/**
 * The functions that control special behavior of the theme.
 *
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
	if ( $paged > 1 ) {
		$title .= ' - page ' . $paged;
	}

	return $title;
}

?>