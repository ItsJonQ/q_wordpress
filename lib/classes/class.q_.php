<?php

// Defining the main q_ class
if(!class_exists('q_')) {

    class q_ {

        public static function init() {

            add_action( 'wp_head' , array( 'q_', 'header_meta_viewport' ) );

        }

        public static function header_meta_viewport() {
            echo "\n" . '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\n\n";
        }

    }

    add_action( 'init' , array( 'q_' , 'init' ) );

}