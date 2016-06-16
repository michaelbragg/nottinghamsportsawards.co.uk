<?php
/**
 * The assets for the theme
 *
 * @since      1.0.0
 *
 * @package    TM_NSA_2016
 * @subpackage TM_NSA_2016/assets
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    TM_NSA_2016
 * @subpackage TM_NSA_2016/assets
 */
class TM_NSA_2016_Assets {
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $theme_name    The ID of this plugin.
	 */
	private $theme_name;
	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $theme_name			The name of the plugin.
	 * @param      string $version				The version of this plugin.
	 */
	public function __construct( $theme_name, $version ) {
		$this->theme_name = $theme_name;
		$this->version = $version;
	}

	/**
	 * Register the styles
	 */
	public function register_styles() {

		wp_register_style(
			'tm-events-2016',
			get_template_directory_uri() . '/style.css',
			array( 'nsa-2016-fonts' ),
			'0.2.0'
		);

		wp_register_style(
			$this->theme_name,
			get_stylesheet_directory_uri() . '/style.css',
			array( 'tm-events-2016' ),
			$this->version
		);

		wp_register_style(
			'nsa-2016-fonts',
			'//fast.fonts.com/cssapi/4b8a24ad-4d8f-477a-8984-f47de848c395.css',
			array(),
			null
		);
	}

	/**
	 * Register the scripts
	 */
	public function register_scripts() {

	}

	/**
	 * Enqueue styles
	 */
	public function enqueue_global_styles() {

		// Styles to be loaded globally.
		wp_enqueue_style( 'tm-events-2016' );
		wp_enqueue_style( 'tm-nsa-2016' );
		wp_enqueue_style( 'nsa-2016-fonts' );
	}

	/**
	 * Enqueue scripts
	 */
	public function enqueue_global_scripts() {

	}
}
