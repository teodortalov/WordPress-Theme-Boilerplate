<?php

/**
 * Unit tests for the theme.
 *
 * @package WordPressThemeBoilerplate
 * @author Christopher Lamm <chris@theantichris.com>
 * @since 1.0.0
 */

// Include themes function file
include_once( 'functions.php' );

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

		// Set WordPress timezone
		update_option( 'timezone_string', 'America/New_York' );
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
	 * Test wptbp_setup() in functions.php.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function test_wptbp_setup() {
		do_action( 'after_setup_theme' ); // Run the after_setup_hook

		// Test theme feature support
		$this->assertTrue( current_theme_supports( 'custom-header' ), 'Custom header support is registered at the after_setup_theme hook.' );
		$this->assertTrue( current_theme_supports( 'custom-background' ), 'Custom background support is registered at the after_setup_theme hook.' );
		$this->assertTrue( current_theme_supports( 'menus' ), 'Custom menu support is registered at the after_setup_theme hook by registering the primary navigation menu location.' );

		// Test primary navigation
		/** @var array $locations An array containing all the navigation menu locations registered with WordPress */
		$locations = get_registered_nav_menus();
		$this->assertTrue( array_key_exists( 'primary', $locations ), 'The Primary Navigation menu is registered at the after_setup_theme hook.' );

		// Test timezone
		/** @var string $wordpress_timezone The WordPress timezone setting */
		$wordpress_timezone = get_option( 'timezone_string' );
		/** @var string $default_timezone The current timezone set as the default for PHP */
		$default_timezone = date_default_timezone_get();
		$this->assertEquals( $wordpress_timezone, $default_timezone, 'The default timezone should match the timezone set in WordPress.' );
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