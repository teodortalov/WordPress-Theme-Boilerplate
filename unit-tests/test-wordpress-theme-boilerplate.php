<?php

/**
 * Unit tests for the theme.
 *
 * @since 1.00
 */

// Include themes function file
include_once( '../functions.php' );

/**
 * Class that contains the unit tests for the theme.
 *
 * @since 1.00
 */
class Test_WordPress_Theme_Boilerplate extends WP_UnitTestCase {
	// TODO: Change WordPress_Theme_Boilerplate to theme name

	/**
	 * Setup the theme for testing.
	 *
	 * Switches the theme to this theme for testing.
	 *
	 * @since 1.00
	 */
	function setUp() {
		parent::setUp();

		// Switch active theme to this theme
		switch_theme( 'WordPress Theme Boilerplate', 'WordPress Theme Boilerplate' ); // TODO: Change to theme name
	}

	/**
	 * Test that the theme is active
	 *
	 * @since 1.00
	 */
	function test_active_theme() {
		$this->assertTrue( 'WordPress Theme Boilerplate' == wp_get_theme() ); // TODO: Change to theme name
	}


	/**
	 * Tests that the default theme is inactive.
	 *
	 * @since 1.00
	 */
	function test_inactive_theme() {
		$this->assertFalse( 'Twenty Twelve' == wp_get_theme() );
	}

	/**
	 * Test that checks if jQuery is loaded.
	 *
	 * @since 1.00
	 */
	function test_jquery_is_loaded() {
		$this->assertFalse( wp_script_is( 'jquery' ), 'Test that jQuery is not loaded.' ); // Make sure jQuery is not loaded yet

		wp_enqueue_script( 'jquery' ); // Run this action to load jQuery using the same code used to load it in the theme

		$this->assertTrue( wp_script_is( 'jquery' ), 'Test that jQuery is loaded.' ); // Test that jQuery is now loaded
	}

	function test_wptbp_get_title() {
		$site_name = get_bloginfo( 'name' );

		$this->assertContains( $site_name, wptbp_get_title(), 'wptbp_get_title() echoes the title for the page.' );
	}
}

?>