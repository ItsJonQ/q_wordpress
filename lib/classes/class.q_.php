<?php
/**
 * q_
 * This is the main class for the q_ wordpress theme
 *
 * @class
 *
 * @package q_
 *
 */

// Defining the main q_ class
if(!class_exists('q_')) {

    // Including / requiring the other classes

    /**
     * Header
     * @class   q_header
     */
    include( 'class.q_header.php' );

    /**
     * Image
     * @class   q_image
     */
    include( 'class.q_image.php' );

    /**
     * Posts
     * @class   q_post
     */
    include( 'class.q_post.php' );


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

        /**
         * extend
         * Method to extend settings / options (arrays)
         * @param  [ array ] $base        [ the base/original array ]
         * @param  [ array ] $replacement [ the replacement array ]
         * @return [ array ]              [ the extended base array]
         */
        public static function extend( $base, $replacement = null ) {
            // Return false if $base is invalid
            if( !isset($base) || !is_array( $base ) ) {
                return false;
            }

            // Return base if $replacement is not defined or if it's not valid
            if( !$replacement || !is_array( $replacement ) ) {
                return $base;
            }

            // Defining the $output
            $output = array_replace_recursive( $base, $replacement );

            // Returning the $output
            return $output;
        }

    }

    // Initialize
    // add_action( 'init' , array( 'q_' , 'init' ) );

    // Add Featured Image (post thumbnails)
    add_theme_support( 'post-thumbnails' );
}