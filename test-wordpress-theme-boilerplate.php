<?php

/**
 * Unit tests for the theme.
 *
 * @package WordPressThemeBoilerplate
 * @author Christopher Lamm <chris@theantichris.com>
 * @since 1.0.0
 */

// Include themes function file
include_once( '../functions.php' );

/**
 * Class that contains the unit tests for the theme.
 *
 * @package WordPressThemeBoilderPlate
 * @author Christopher Lamm <chris@theantichris.com>
 * @since 1.0.0
 */
class Test_WordPress_Theme_Boilerplate extends WP_UnitTestCase {
	// TODO: Change WordPress_Theme_Boilerplate to theme name
	// TODO: Change file name to match

	/**
	 * Setup the theme for testing.
	 *
	 * Switches the theme to this theme for testing.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function setUp() {
		parent::setUp();

		// Switch active theme to this theme
		switch_theme( 'WordPress Theme Boilerplate', 'WordPress Theme Boilerplate' ); // TODO: Change to theme name
	}

	/**
	 * Test that the theme is active
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function test_active_theme() {
		$this->assertTrue( 'WordPress Theme Boilerplate' == wp_get_theme() ); // TODO: Change to theme name
	}


	/**
	 * Tests that the default theme is inactive.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function test_inactive_theme() {
		// TODO: Set "Twenty Twelve" to whatever your default theme is
		$this->assertFalse( 'Twenty Twelve' == wp_get_theme() );
	}

	/**
	 * Test that checks if jQuery is loaded.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function test_jquery_is_loaded() {
		$this->assertFalse( wp_script_is( 'jquery' ), 'Test that jQuery is not loaded.' ); // Make sure jQuery is not loaded yet

		wp_enqueue_script( 'jquery' ); // Run this action to load jQuery using the same code used to load it in the theme

		$this->assertTrue( wp_script_is( 'jquery' ), 'Test that jQuery is loaded.' ); // Test that jQuery is now loaded
	}

	/**
	 * Tests the output of the title function to make sure it contains the site's name.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function test_wptbp_get_title() {
		// TODO: Change function prefix
		$site_name = get_bloginfo( 'name' );

		// TODO: Change function prefix
		$this->assertContains( $site_name, wptbp_get_title(), 'wptbp_get_title() echoes the title for the page.' );
	}
}