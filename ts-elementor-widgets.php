<?php

/**
 * Plugin Name: TS Elementor Widgets
 * Plugin URI:  http://www.theresaschmidt.at
 * Description: Elementor Widgets
 * Version:     1.0
 * Text Domains: ts-elementor-widgets
 */

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

define('TS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define('TS_PLUGIN_PATH_WIDGETS', plugin_dir_path( __FILE__ ) . 'widgets/' );
define('TS_PLUGIN_PATH_INCLUDE', plugin_dir_path( __FILE__ ) . 'include/' );

add_action( 'plugins_loaded', 'ts_init' );

function ts_init() {
    if ( ! did_action( 'elementor/loaded' ) ) {
        add_action( 'admin_notices', 'ts_admin_notice_missing_main_plugin' );
        return;
    } 

    add_action( 'elementor/init', 'ts_register' );
    add_action('wp_enqueue_scripts', 'ts_register_assets');
}



function ts_register() {
    ts_register_assets();

    require_once (TS_PLUGIN_PATH_INCLUDE . 'register-categories.php');
    require_once (TS_PLUGIN_PATH_INCLUDE . 'register-widgets.php');

    $ts_categories = new \TSWidgets\Categories_Registration();
    $ts_widgets = new \TSWidgets\Widgets_Registration();
}

function ts_register_assets(){
    wp_enqueue_style('ts-widgets-styles', plugin_dir_url( __FILE__ ) . 'assets/css/ts-widget-styles.css',array(), filemtime(plugin_dir_path( __FILE__ ) . 'assets/css/ts-widget-styles.css'));
}

function ts_admin_notice_missing_main_plugin() {
	if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

	$message = sprintf(
		esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'ts-elementor-widgetsn' ),
		'<strong>' . esc_html__( 'TS Elementor Widgets', 'ts-elementor-widgets' ) . '</strong>',
		'<strong>' . esc_html__( 'Elementor', 'ts-elementor-widgets' ) . '</strong>'
	);

	printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
}


