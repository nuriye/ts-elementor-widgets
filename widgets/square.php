<?php

use TSWidgets\Style_Generator;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class TS_Elementor_Square_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Square';
	}

	public function get_title() {
		return __( 'Square', 'plugin-name' );
	}

	public function get_icon() {
		return 'fa fa-square-full';
	}

	public function get_categories() {
		return [ 'theresa' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'ts-elementor-widgets'  ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'text_front',
			[
				'label' => __( 'Text front', 'ts-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 4,
				'placeholder' => __( 'Speedoptimization', 'ts-elementor-widgets' ),
			]
		);

		$this->add_control(
			'title_back',
			[
				'label' => __( 'Title back', 'ts-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 4,
				'placeholder' => __( 'Speedoptimization' ),
			]
		);

		$this->add_control(
			'text_back',
			[
				'label' => __( 'Text back', 'ts-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.', 'ts-elementor-widgets' ),
			]
		);


		// $this->add_control(
		// 	'overlay_color',
		// 	[
		// 		'label' => __( 'Overlay Color', 'ts-elementor-widgets' ),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'scheme' => [
		// 			'type' => \Elementor\Scheme_Color::get_type(),
		// 			'value' => \Elementor\Scheme_Color::COLOR_1,
		// 		],
		// 		'selectors' => [
		// 			'{{WRAPPER}} .title' => 'color: {{VALUE}}',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'background_image',
		// 	[
		// 		'label' => __( 'Background Image', 'ts-elementor-widgets' ),
		// 		'type' => \Elementor\Controls_Manager::MEDIA,
		// 		'default' => [
		// 			'url' => \Elementor\Utils::get_placeholder_image_src(),
		// 		],
		// 	]
		// );

		//$this->end_controls_section();

		// $this->start_controls_section(
		// 	'button_section',
		// 	[
		// 		'label' => __( 'Button', 'ts-elementor-widgets'  ),
		// 		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		// 	]
		// );

		$this->add_control(
			'button_text',
			[
				'label' => __( 'Button Text', 'ts-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Contact me!', 'ts-elementor-widgets' ),
			]
		);

		$this->add_control(
			'button_url',
			[
				'label' => __( 'Button Link', 'ts-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'tome@example.com', 'ts-elementor-widgets' ),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		//$html = wp_oembed_get( $settings['text_front'] );

		$styles = array();

		$textFront = ( isset($settings['text_front']) ) ? $settings['text_front'] : '';
		$textBack = ( isset($settings['text_back']) ) ? $settings['text_back'] : '';
		$titleBack = ( isset($settings['title_back']) ) ? $settings['title_back'] : '';
		$textButton = ( isset($settings['button_text']) ) ? $settings['button_text'] : '';
		$textButtonUrl = ( isset($settings['button_url']) ) ? $settings['button_url'] : '';
		// $overlayColor = ( $settings['overlay_color'] ) ? $settings['overlay_color'] && $styles['overlay-color'] = $settings['overlay_color'] : '';
		// $backgroundImage = ( $settings['background_image'] ) ? $settings['background_image']['id'] && $styles['background-image'] = wp_get_attachment_image_src($settings['background_image']['id'], 'medium')[0] : '';


		// $sg = new Style_Generator();
		// $inlineStyle = $sg->generate_inline_style( $styles );

		echo '<div class="ts-widgets ts-widgets__square">';

			echo '<div class="ts-widgets ts-widgets__square__inner">';

				echo '<div class="ts-widgets__square__front">';
					echo '<h3>'.$textFront.'</h3>';
				echo '</div>';

				echo '<div class="ts-widgets__square__back">';
					echo '<p><b>'.str_replace('<br>','',$titleBack).'</b></p>';
					echo $textBack;
					if(!empty($textButton && $textButtonUrl)) :

						if (filter_var($textButtonUrl, FILTER_VALIDATE_EMAIL)) {
							$textButtonUrl = 'mailto:' . $textButtonUrl;
						}
					echo '<div class="ts-widgets-button ts-widgets__square__button">';
						echo sprintf('<a href="%s">%s</a>', $textButtonUrl, $textButton);
					echo '</div>';
					endif;
				echo '</div>';

			echo '</div>';

		echo '</div>';

	}
	
}
