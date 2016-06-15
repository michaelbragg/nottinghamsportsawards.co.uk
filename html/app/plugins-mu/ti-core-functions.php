<?php
/**
 * Plugin Name: TI Core Functions
 * Plugin URI:
 * Description: Functions that perform some core functionality that we would love to live inside of WordPress one day.
 * Author: Michael Bragg
 * Author URI:
 * Version: 0.1.0
 *
 * @package ti-core-functions
 */

/**
 * TI Core Functions Plugin
 */
class TI_Core_Functions {

	/**
	 * Maintain the single instance of TI_Core_Functions
	 *
	 * @var bool
	 */
	private static $instance = false;

	/**
	 * Add required hooks
	 */
	function __construct() {

		add_action(
			'admin_menu',
			array( $this, 'ti_add_home_to_menu' )
		);

	}

	/**
	 * Handle requests for the instance.
	 *
	 * @return bool
	 */
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new TI_Core_Functions();
		}
		return self::$instance;
	}

	/**
	 * Add link to front page in admin menu
	 *
	 * @since 0.1.0
	 */
	public function ti_add_home_to_menu() {

		$homepage_id = get_option( 'page_on_front' );

		add_menu_page(
			'Home Page',
			'Home Page',
			'edit_pages',
			'post.php?post=' . $homepage_id . '&action=edit',
			false,
			'dashicons-admin-home',
			4
		);

	}
}

/**
 * Load plugin
 */
function ti_core_functions_init() {
	TI_Core_Functions::get_instance();
}

add_action( 'plugins_loaded', 'ti_core_functions_init' );
