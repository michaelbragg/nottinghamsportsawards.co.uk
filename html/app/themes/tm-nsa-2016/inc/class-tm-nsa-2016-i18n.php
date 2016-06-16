<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    TM_NSA_2016
 * @subpackage TM_NSA_2016/i18n
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    TM_NSA_2016
 * @subpackage TM_NSA_2016/i18n
 */
class TM_NSA_2016_i18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_theme_textdomain() {
		load_child_theme_textdomain(
			'tm-nsa-2016',
			get_stylesheet_directory() . '/languages'
		);
	}
}
