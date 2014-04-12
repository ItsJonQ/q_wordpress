<?php

// Defining the main q_ class
if(!class_exists('q_')) {

    // Including / requiring the other classes

    /**
     * Header
     * @class   q_header
     */
    require_once( 'class.q_header.php' );


    class q_ {

        /**
         * init
         * Initialization method for this class
         *
         * @init
         */
        public static function init() {
            /**
             * Nothin' yet!
             */
        }

    }

    // Initialize
    // add_action( 'init' , array( 'q_' , 'init' ) );

    // Add Featured Image (post thumbnails)
    add_theme_support( 'post-thumbnails' );

}