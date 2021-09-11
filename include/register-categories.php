<?php

namespace TSWidgets;

if( ! defined( 'ABSPATH' ) ) exit();

class Categories_Registration {

    public function __construct() {
        $this->add_categories();
    }
    
    private function add_categories() {
        \Elementor\Plugin::instance()->elements_manager->add_category(
            'theresa',
            array(
                'title' => __( 'Theresa', 'ts-elementor-widgets' ),
                'icon' => 'fa fa-heart',
            ), 1
        );
    }
    
}
