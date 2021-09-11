<?php

namespace TSWidgets;

if( ! defined( 'ABSPATH' ) ) exit();

class Widgets_Registration {

    public function __construct() {
        $this->register_widgets();
    }

    private function includes() {
        foreach ( glob( TS_PLUGIN_PATH_WIDGETS . '*.php' ) as $file ) {
            require_once ($file);
        }
    }
    
    private function register_widgets() {
        $this->includes();
        
        foreach ( glob( TS_PLUGIN_PATH_WIDGETS . '*.php' ) as $file ) {
            $this->register_addon( $file );
        }
    }
    
    private function register_addon( $file ) {
        $widgetManager = \Elementor\Plugin::instance()->widgets_manager;
        $filename = ucwords( basename( str_replace('.php', '', $file) ) );
        $baseFirst = 'TS_Elementor_';
        $baseLast = '_Widget';
        $class = sprintf( '%s%s%s', $baseFirst, $filename, $baseLast );
    
        $widgetManager->register_widget_type( new $class );
    }
}
