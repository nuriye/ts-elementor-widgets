<?php

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class TS_Elementor_Backbutton_Widget extends \Elementor\Widget_Base {


	public function get_name() {
		return 'Back';
	}


	public function get_title() {
		return __( 'Back', 'plugin-name' );
	}


	public function get_icon() {
		return 'fas fa-long-arrow-alt-left';
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
			'button_text',
			[
				'label' => __( 'Text', 'ts-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Zurück', 'ts-elementor-widgets' ),
			]
		);

		$this->add_control(
			'button_link',
			[
				'label' => __( 'Link', 'ts-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::URL,
				'description' => __( 'Wenn leer wird wie JS back Funktion verwendet.', 'ts-elementor-widgets' ),
				'placeholder' => __( 'Zurück', 'ts-elementor-widgets' ),
			]
		);


		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$buttonText = ( isset($settings['button_text']) ) ? $settings['button_text'] : '';

		if(isset($settings['button_link']['url'])) {
			$target = '';
			if ( isset($settings['button_link']['is_external']) && $settings['button_link']['is_external']) {
				$target = 'target="_blank"';
			}
			$backfunction = $target . 'href="' . $settings['button_link']['url'] . '"';
		} else {
			$backfunction = 'onclick="window.history.back()"';
		}
		if($buttonText) {
			echo '<div class="ts-widgets ts-widgets__backbutton">';
				echo '<a '.$backfunction.'>'.$buttonText.'</a>';
			echo '</div>';
		}

	}

}
