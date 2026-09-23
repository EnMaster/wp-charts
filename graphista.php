<?php
/**
 * Plugin Name:       Graphista
 * Description:       Display beautiful charts (bar, line, pie, doughnut, polar area, radar) from JSON data inside Elementor.
 * Version:           1.0.5
 * Author:            enricodev
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       graphista
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Requires Plugins:  elementor
 */

defined( 'ABSPATH' ) || exit;

define( 'GRAPHISTA_VERSION', '1.0.5' );
define( 'GRAPHISTA_PATH', plugin_dir_path( __FILE__ ) );
define( 'GRAPHISTA_URL', plugin_dir_url( __FILE__ ) );
define( 'GRAPHISTA_CHARTJS_VERSION', '4.5.1' );

final class Graphista {

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
			esc_html__( 'Graphista richiede che Elementor sia installato e attivo.', 'graphista' )
		);
	}

	public function register_assets() {
		wp_register_script(
			'graphista-chartjs',
			GRAPHISTA_URL . 'assets/js/chart.umd.min.js',
			array(),
			GRAPHISTA_CHARTJS_VERSION,
			true
		);
	}

	public function register_widgets( $widgets_manager ) {
		require_once GRAPHISTA_PATH . 'includes/class-graphista-widget.php';
		$widgets_manager->register( new \Graphista_Widget() );
	}

	public function register_categories( $elements_manager ) {
		$elements_manager->add_category(
			'graphista',
			array(
				'title' => __( 'Graphista', 'graphista' ),
				'icon'  => 'fa fa-chart-pie',
			)
		);
	}
}

Graphista::instance();