<?php
/**
 * Plugin Name:       DataCharts
 * Description:       Display beautiful charts (bar, line, pie, doughnut, polar area, radar) from JSON data inside Elementor.
 * Version:           1.0.3
 * Author:            enrico-dev
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       datacharts
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Requires Plugins:  elementor
 */

defined( 'ABSPATH' ) || exit;

define( 'DATACHARTS_VERSION', '1.0.3' );
define( 'DATACHARTS_PATH', plugin_dir_path( __FILE__ ) );
define( 'DATACHARTS_URL', plugin_dir_url( __FILE__ ) );
define( 'DATACHARTS_CHARTJS_VERSION', '4.4.1' );

final class DataCharts {

	private static $instance = null;

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	public function init() {
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_elementor' ) );
			return;
		}

		add_action( 'elementor/widgets/register', array( $this, 'register_widgets' ) );
		add_action( 'elementor/elements/categories_registered', array( $this, 'register_categories' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ) );
		add_action( 'elementor/preview/enqueue_scripts', array( $this, 'register_assets' ) );
	}

	public function admin_notice_missing_elementor() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		printf(
			'<div class="notice notice-warning is-dismissible"><p>%s</p></div>',
			esc_html__( 'DataCharts richiede che Elementor sia installato e attivo.', 'datacharts' )
		);
	}

	public function register_assets() {
		wp_register_script(
			'datacharts-chartjs',
			DATACHARTS_URL . 'assets/js/chart.umd.min.js',
			array(),
			DATACHARTS_CHARTJS_VERSION,
			true
		);
	}

	public function register_widgets( $widgets_manager ) {
		require_once DATACHARTS_PATH . 'includes/class-datacharts-widget.php';
		$widgets_manager->register( new \DataCharts_Widget() );
	}

	public function register_categories( $elements_manager ) {
		$elements_manager->add_category(
			'datacharts',
			array(
				'title' => __( 'DataCharts', 'datacharts' ),
				'icon'  => 'fa fa-chart-pie',
			)
		);
	}
}

DataCharts::instance();