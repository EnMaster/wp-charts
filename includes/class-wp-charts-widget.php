<?php
/**
 * Elementor widget: grafico da dati JSON.
 */

defined( 'ABSPATH' ) || exit;

class WP_Charts_Widget extends \Elementor\Widget_Base {

	const PALETTE = array(
		'#4e79a7',
		'#f28e2c',
		'#e15759',
		'#76b7b2',
		'#59a14f',
		'#edc949',
		'#af7aa1',
		'#ff9da7',
		'#9c755f',
		'#bab0ab',
	);

	public function get_name() {
		return 'wp_charts_chart';
	}

	public function get_title() {
		return __( 'Grafico', 'wp-charts' );
	}

	public function get_icon() {
		return 'eicon-chart-bar';
	}

	public function get_categories() {
		return array( 'wp-charts' );
	}

	public function get_keywords() {
		return array( 'grafico', 'chart', 'diagramma', 'torta', 'barre', 'linea' );
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			array(
				'label' => __( 'Dati', 'wp-charts' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'chart_type',
			array(
				'label'   => __( 'Tipo di grafico', 'wp-charts' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'bar'        => __( 'Barre', 'wp-charts' ),
					'line'       => __( 'Linea', 'wp-charts' ),
					'pie'        => __( 'Torta', 'wp-charts' ),
					'doughnut'   => __( 'Anello (Doughnut)', 'wp-charts' ),
					'polarArea'  => __( 'Polar Area', 'wp-charts' ),
					'radar'      => __( 'Radar', 'wp-charts' ),
				),
				'default' => 'bar',
			)
		);

		$this->add_control(
			'chart_title',
			array(
				'label'       => __( 'Titolo', 'wp-charts' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => '',
				'placeholder' => __( 'Es. Vendite 2025', 'wp-charts' ),
			)
		);

		$this->add_control(
			'chart_data',
			array(
				'label'       => __( 'Dati (JSON)', 'wp-charts' ),
				'type'        => \Elementor\Controls_Manager::CODE,
				'language'    => 'json',
				'rows'        => 14,
				'default'     => $this->default_data(),
				'description' => __( 'Incolla i dati in formato JSON: <code>{"labels": [...], "datasets": [{"label": "...", "data": [...]}]}</code>. Opzionale per dataset: <code>backgroundColor</code> e <code>borderColor</code>.', 'wp-charts' ),
			)
		);

		$this->add_control(
			'chart_height',
			array(
				'label'      => __( 'Altezza (px)', 'wp-charts' ),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'default'    => 350,
				'min'        => 100,
				'max'        => 2000,
				'step'       => 10,
				'separator'  => 'before',
			)
		);

		$this->add_control(
			'show_legend',
			array(
				'label'        => __( 'Mostra legenda', 'wp-charts' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'legend_position',
			array(
				'label'     => __( 'Posizione legenda', 'wp-charts' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => array(
					'top'    => __( 'Sopra', 'wp-charts' ),
					'bottom' => __( 'Sotto', 'wp-charts' ),
					'left'   => __( 'Sinistra', 'wp-charts' ),
					'right'  => __( 'Destra', 'wp-charts' ),
				),
				'default'   => 'top',
				'condition' => array( 'show_legend' => 'yes' ),
			)
		);

		$this->end_controls_section();
	}

	public function render() {
		$settings = $this->get_settings_for_display();

		$config = $this->build_config( $settings );

		if ( is_wp_error( $config ) ) {
			printf(
				'<div class="wp-charts-error" style="padding:15px;border:1px solid #e15759;border-radius:4px;color:#a12b2b;background:#fdf3f2;">%s</div>',
				esc_html( $config->get_error_message() )
			);
			return;
		}

		wp_enqueue_script( 'wp-charts-chartjs' );

		$chart_id = 'wp-chart-' . $this->get_id();

		printf(
			'<div class="wp-charts-wrap" style="position:relative;height:%dpx;width:100%%;"><canvas id="%s" aria-label="%s"></canvas></div>',
			absint( $settings['chart_height'] ),
			esc_attr( $chart_id ),
			esc_attr( $settings['chart_title'] )
		);
		?>
		<script>
		(function () {
			var canvas = document.getElementById(<?php echo wp_json_encode( $chart_id ); ?>);
			if (!canvas || (window.WPChartsChartHandle && window.WPChartsChartHandle[<?php echo wp_json_encode( $chart_id ); ?>])) {
				return;
			}
			window.WPChartsChartHandle = window.WPChartsChartHandle || {};
			window.WPChartsChartHandle[<?php echo wp_json_encode( $chart_id ); ?>] = true;
			var config = <?php echo wp_json_encode( $config ); ?>;
			new Chart(canvas.getContext('2d'), config);
		})();
		</script>
		<?php
	}

	protected function content_template() {
		?>
		<div class="wp-charts-wrap" style="position:relative;height:350px;width:100%;display:flex;align-items:center;justify-content:center;background:#f7f7f7;border:1px dashed #d5d5d5;border-radius:4px;">
			<span style="color:#888;">{{ settings.chart_title }}</span>
		</div>
		<?php
	}

	private function build_config( $settings ) {
		$raw = isset( $settings['chart_data'] ) ? $settings['chart_data'] : '';
		$data = json_decode( $raw, true );

		if ( ! is_array( $data ) || ! isset( $data['labels'] ) || ! is_array( $data['labels'] ) ||
			! isset( $data['datasets'] ) || ! is_array( $data['datasets'] ) || empty( $data['datasets'] ) ) {
			return new WP_Error( 'invalid_json', __( 'JSON dei dati non valido. Formato atteso: {"labels": [...], "datasets": [{"label": "...", "data": [...]}]}', 'wp-charts' ) );
		}

		$labels   = array_values( array_map( 'strval', $data['labels'] ) );
		$datasets = array();

		foreach ( array_values( $data['datasets'] ) as $i => $ds ) {
			if ( ! is_array( $ds ) || ! isset( $ds['data'] ) || ! is_array( $ds['data'] ) ) {
				continue;
			}

			$values = array_values(
				array_map(
					function ( $v ) {
						return is_numeric( $v ) ? (float) $v : 0;
					},
					$ds['data']
				)
			);

			$label   = isset( $ds['label'] ) ? (string) $ds['label'] : ( 'Serie ' . ( $i + 1 ) );
			$palette = $this->slice_palette( $i );

			$dataset = array(
				'label'                 => $label,
				'data'                  => $values,
				'backgroundColor'       => isset( $ds['backgroundColor'] ) ? $ds['backgroundColor'] : $palette['fill'],
				'borderColor'           => isset( $ds['borderColor'] ) ? $ds['borderColor'] : $palette['border'],
				'borderWidth'           => 2,
				'pointBackgroundColor'  => $palette['border'],
			);

			if ( 'line' === $settings['chart_type'] ) {
				$dataset['pointBorderColor'] = '#ffffff';
				$dataset['tension']           = 0.3;
				$dataset['fill']              = empty( $ds['fill'] ) ? false : true;
			}

			if ( ! empty( $ds['fill'] ) && 'line' === $settings['chart_type'] ) {
				$dataset['backgroundColor'] = $palette['fill_alpha'];
			}

			$datasets[] = $dataset;
		}

		$config = array(
			'type' => $settings['chart_type'],
			'data' => array(
				'labels'   => $labels,
				'datasets' => $datasets,
			),
			'options' => array(
				'responsive'            => true,
				'maintainAspectRatio'   => false,
				'plugins'               => array(
					'legend' => array(
						'display'  => 'yes' === $settings['show_legend'],
						'position' => empty( $settings['legend_position'] ) ? 'top' : $settings['legend_position'],
					),
					'title'  => array(
						'display' => ! empty( $settings['chart_title'] ),
						'text'    => $settings['chart_title'],
					),
				),
			),
		);

		if ( in_array( $settings['chart_type'], array( 'pie', 'doughnut', 'polarArea' ), true ) ) {
			$first = $config['data']['datasets'][0];

			$config['data']['datasets'] = array(
				array(
					'label'           => $first['label'],
					'data'            => $first['data'],
					'backgroundColor' => $this->pie_colors( count( $first['data'] ) ),
					'borderColor'     => '#ffffff',
					'borderWidth'     => 2,
				),
			);
		}

		return $config;
	}

	private function slice_palette( $index ) {
		$base  = $index % count( self::PALETTE );
		$color = self::PALETTE[ $base ];

		return array(
			'fill'       => $color,
			'border'     => $color,
			'fill_alpha' => $this->hex_to_rgba( ltrim( $color, '#' ), 0.25 ),
		);
	}

	private function pie_colors( $count ) {
		$colors = array();
		for ( $i = 0; $i < $count; $i++ ) {
			$colors[] = self::PALETTE[ $i % count( self::PALETTE ) ];
		}
		return $colors;
	}

	private function hex_to_rgba( $hex, $alpha ) {
		if ( 3 === strlen( $hex ) ) {
			$hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
		}
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );

		return sprintf( 'rgba(%d, %d, %d, %s)', $r, $g, $b, number_format( $alpha, 2, '.', '' ) );
	}

	private function default_data() {
		return '{
  "labels": ["Gennaio", "Febbraio", "Marzo", "Aprile"],
  "datasets": [
    {
      "label": "Vendite",
      "data": [120, 190, 90, 140]
    },
    {
      "label": "Ordini",
      "data": [80, 110, 130, 95]
    }
  ]
}';
	}
}