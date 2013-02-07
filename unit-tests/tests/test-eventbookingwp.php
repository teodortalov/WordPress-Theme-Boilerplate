<?php

/**
 * This file contains the class that houses the unit tests for the Hello Reader plugin.
 */

// Include the main plugin file
require_once( '../eventbookingwp.php' );

/**
 * Main class file
 *
 * Contains the unit tests for the Hello Reader plugin
 *
 * @property object $plugin An instance of the main plugin class
 *
 * @since 1.0
 */
class Test_EventBookingWP extends WP_UnitTestCase {
	private $plugin;

	/**
	 * Sets up the class for unit testing.
	 *
	 * @since 1.0
	 */
	function setUp() {
		parent::setUp();
		$this->plugin = $GLOBALS[ 'eventbookingwp' ];
	}

	/**
	 * Tests that the plugin has been initialized.
	 *
	 * Checks that the reference to the plugin object is not null.
	 *
	 * @since 1.0
	 */
	function test_plugin_initialization() {
		$this->assertFalse( null == $this->plugin );
	}

	/**
	 * Tests registration of the eb_event custom post type.
	 *
	 * @since 2.0
	 */
	function test_event_post_type_exists() {
		$this->assertFalse( post_type_exists( 'eb_event' ) ); // Test that the post type does not exists before creation

		do_action( 'init' ); // Run the init action to create the post type

		$this->assertTrue( post_type_exists( 'eb_event' ) ); // Check that the post type now exists
	}
}

?>