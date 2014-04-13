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

    }

    // Initialize
    // add_action( 'init' , array( 'q_' , 'init' ) );

    // Add Featured Image (post thumbnails)
    add_theme_support( 'post-thumbnails' );

}