<?php

/**
 * The functions that control special behavior of the theme.
 *
 * @since 1.00
 *
 */

/* TODO: Change wptbp_ prefixes */

function wptbp_get_title() {
	if ( function_exists( 'is_tag' ) && is_tag() ) {
		single_tag_title( 'Tag Archive for &quot; ' );
		echo '&quot; - ';
	} elseif ( is_archive() ) {
		wp_title( '' );
		echo ' Archive - ';
	} elseif ( is_search() ) {
		echo 'Search for &quot; ' . esc_html( $s ) . '&quot; - ';
	} elseif ( !( is_404() ) && ( is_single() ) || ( is_page() ) ) {
		wp_title( '' );
		echo ' - ';
	} elseif ( is_404() ) {
		echo 'Not Found - ';
	}

	if ( is_home() ) {
		bloginfo( 'name' );
		echo ' - ';
		bloginfo( 'description' );
	} else {
		bloginfo( 'name' );
	}

	if ( $paged > 1 ) {
		echo ' - page ' . $paged;
	}
}

?>