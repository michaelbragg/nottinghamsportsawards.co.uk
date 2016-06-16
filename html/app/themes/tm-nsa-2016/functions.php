<?php
/**
 * WordPress loads this file
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package nsa-2016
 */

/**
 * Nottingham Sports Awards Child Theme
 */
class TM_NSA_2016_Theme {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Plugin_Name_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this theme.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $theme_name    The string used to uniquely identify this theme.
	 */
	protected $theme_name;
	/**
	 * The current version of the theme.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the theme.
	 */
	protected $version;

	/**
	 * The unique identifier of the parent theme.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $theme_parent    The string used to uniquely identify the parent theme.
	 */
	protected $theme_parent;

	/**
	 * Flag to track if the plugin is loaded.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var bool
	 */
	private $loaded;

	/**
	 * Define the core functionality of the theme
	 *
	 * Set the theme name and the theme version that can be used throughout the theme.
	 * Load the dependencies, define the locale, and set the hooks for the admin
	 * area and the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->loaded = false;
		$this->theme_name = 'tm-nsa-2016';
		$this->version = '1.0.0';
		$this->theme_parent = 'tm-events-2016';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_assets();
	}

	/**
	 * [on_loaded description]
	 */
	public function load() {

		if ( $this->loaded ) {
			return;
		}

		add_action(
			'login_enqueue_scripts',
			array( $this, 'admin_login_branding' ),
			10
		);

		$this->loaded = true;

	}

	/**
	 * Load the required dependencies for this theme.
	 *
	 * Include the following files that make up the theme:
	 *
	 * - Plugin_Name_Loader. Orchestrates the hooks of the theme.
	 * - Plugin_Name_i18n. Defines internationalization functionality.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once 'inc/class-tm-nsa-2016-loader.php';
		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once 'inc/class-tm-nsa-2016-i18n.php';
		/**
		 * The class responsible for defining all assets required for the theme.
		 */
		require_once 'inc/class-tm-nsa-2016-assets.php';

		$this->loader = new TM_NSA_2016_Loader();

	}

	/**
	 * Define the locale for this theme for internationalization.
	 *
	 * Uses the TM_NSA_2016_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {
		$theme_i18n = new TM_NSA_2016_i18n();
		$this->loader->add_action( 'after_setup_theme', $theme_i18n, 'load_theme_textdomain' );
	}

	/**
	 * Register all of the assets reated to the theme.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_assets() {

		$theme_assets = new TM_NSA_2016_Assets( $this->theme_name, $this->version );
		$this->loader->add_action( 'wp_loaded', $theme_assets, 'register_styles', 1 );
		$this->loader->add_action( 'wp_enqueue_scripts', $theme_assets, 'enqueue_global_styles', 100 );
		$this->loader->add_action( 'login_enqueue_scripts', $theme_assets, 'admin_login_branding', 10 );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * WP Admin login branding
	 */
	public function admin_login_branding() {
		?>
	<style type="text/css">
	body {
		background-color: rgb(204,204,204) !important;
		background-image: linear-gradient(to bottom, rgb(204,204,204) 0%, rgb(183,192,197) 100%) !important;
	}
	body.login div#login h1 a {
		width: 272px;
		height: 96px;
		background-image: url('<?php echo esc_url( get_stylesheet_directory_uri() . '/gui/logo_wp-admin.png' ); ?>');
		background-size: 100%;
	}
	.login #nav {
		color: rgb(51,51,51) !important;
	}
	.login #nav a,
	.login #backtoblog a {
		color: rgb(51,51,51) !important;
	}
	</style>
	<?php }
}

/**
 * Initialize theme
 */
$tm_nsa_2016 = new TM_NSA_2016_Theme( __FILE__ );
$tm_nsa_2016->run();
