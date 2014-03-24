<?php

// Defining the main q_ class
if(!class_exists('q_')) {

    class q_ {

        public static function init() {

            add_action( 'wp_head' , array( 'q_', 'header_meta_viewport' ) );

        }

        // fn: Header - Meta Viewport
        public static function header_meta_viewport() {
            echo "\n" . '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\n\n";
        }

        // fn: Header - Custom Scripts
        public static function header_custom_scripts() {

            $lib = get_stylesheet_directory_uri() . '/lib/';
            $public = get_stylesheet_directory_uri() . '/public/';
            $vendor = get_stylesheet_directory_uri() . '/vendor/';

            // Scripts
            wp_enqueue_script('jquery', $vendor . 'js/jquery.min.js', array(), '20140323', true);
            wp_enqueue_script('underscore', $vendor . 'js/underscore.min.js', array(), '20140323', true);
            wp_enqueue_script('knockout', $vendor . 'js/knockout.min.js', array(), '20140323', true);

            wp_enqueue_script('q-main-js', $public . 'js/main.js', array('jquery'), '20140323', true);

            // Styles

            // Resources
            wp_register_style( 'bootstrap', $vendor . 'css/bootstrap.min.css', array(), null);

            // Main
            wp_register_style( 'q-main-css', $oublic . 'css/main.css', array('bootstrap'), null);

            wp_enqueue_style( 'bootstrap' );
            wp_enqueue_style( 'q-main-css' );

        }

        public static function header_custom_scripts_init() {
            // Deregister jQuery if the page is not Admin
            if (!is_admin()) wp_deregister_script('jquery');

            // Adding the action to the init function
            add_action('wp_enqueue_scripts', array( 'q_', 'header_custom_scripts' ));
        }

    }

    add_action( 'init' , array( 'q_' , 'init' ) );
    add_action( 'init' , array( 'q_', 'header_custom_scripts_init' ) );

}