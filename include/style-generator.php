<?php

namespace TSWidgets;

if( ! defined( 'ABSPATH' ) ) exit();

class Style_Generator {

    public function generate_inline_style( $style ) {

        $styles = '';

        // if( isset($style['background-image']) && isset($style['overlay-color']) ) {
        //     $styles .= " background:";
        //     $styles .= "linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5) ";
        //     $styles .= ' url('.$style['background-image'].')';
        //     // "background:  linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)),
        //     //    url(http://placeimg.com/400/400/animals);"
        // }

        foreach($style as $key => $value) {
            switch ($key) {
                case 'overlay-color':
                    $styles .= " background-color:$value;";
                break;
                case 'background-image':
                    $styles .= " $key:url('$value');";
                    $styles .= " background-size:cover; ";
                break;

            }
        }

        return $styles;
    }

}
