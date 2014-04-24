<?php
/**
 * q_header
 * This is the header class for the q_ wordpress theme
 *
 * @class
 *
 * @package q_
 *
 */

// Define the q_header class
if( !class_exists( 'q_header') ) {

    class q_header {

        /**
         * init
         * Initialization method for this class
         *
         * @init
         */
        public static function init() {
            // Deregister jQuery if the page is not Admin
            if (!is_admin()) wp_deregister_script('jquery');

            // Adding the action to the init function
            add_action('wp_enqueue_scripts', array( 'q_header', 'custom_styles' ));

            // Adding custom fonts
            add_action( 'wp_head' , array( 'q_header', 'custom_fonts' ) );
            // Adding custom meta
            add_action( 'wp_head' , array( 'q_header', 'meta_viewport' ) );

            // Adding Analytics
            add_action( 'wp_footer' , array( 'q_header', 'google_analytics' ) );
        }

        /**
         * google_analytics
         * Google Analytics Tracking
         *
         * @script
         *
         * @return [ string ]
         */
        public static function google_analytics() {

            // Defining the $output
            $output = "\n" . "
                <!-- Google Analytics -->
                <script>
                  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

                  ga('create', 'UA-50367408-1', 'jonquach.com');
                  ga('send', 'pageview');

                </script>" . "\n\n";

            // Echoing the output
            echo $output;
        }

        /**
         * custom_fonts
         * "Source Sans Pro" from Google Web Font
         *
         * @font
         *
         * @return [ string ]
         */
        public static function custom_fonts() {

            // Defining the $output
            /**
             * Source Sans Pro
             */
            // $output = "\n" . "<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,400italic,700italic' rel='stylesheet' type='text/css'>" . "\n\n";

            /**
             * Domine
             */
            $output = "\n" . "<link href='http://fonts.googleapis.com/css?family=Domine:400,700' rel='stylesheet' type='text/css'>" . "\n\n";

            // Echoing the output
            echo $output;
        }


        /**
         * custom_scripts
         * Loading the Javascript for the theme
         *
         * @sccripts (JS)
         *
         */
        public static function custom_scripts() {
            // Defining the directories
            $dir = get_stylesheet_directory_uri();
            $public = $dir . '/public/';
            $vendor = $dir . '/vendor/';

            // Vendor Scripts
            wp_enqueue_script('jquery', $vendor . 'js/jquery.min.js', array(), '20140323', true);
            wp_enqueue_script('underscore', $vendor . 'js/underscore.min.js', array(), '20140323', true);
            // wp_enqueue_script('knockout', $vendor . 'js/knockout.min.js', array(), '20140323', true);

            // Main Script
            wp_enqueue_script('q-main-js', $public . 'js/main.js', array('jquery'), '20140323', true);
        }

        /**
         * custom_styles
         * Loading the CSS for hte theme
         *
         * @stylesheet (CSS)
         */
        public static function custom_styles() {
            // Defining the directories
            $dir = get_stylesheet_directory_uri();
            $public = $dir . '/public/';
            $vendor = $dir . '/vendor/';

            // Resources
            wp_register_style( 'bootstrap', $vendor . 'css/bootstrap.min.css', array(), null);

            wp_register_style( 'lil-b', $vendor . 'css/b.css', array(), null);

            // Main
            wp_register_style( 'q-main', $public . 'css/main.css', array( 'bootstrap' , 'lil-b' ), null);

            // Enqueuing the styles
            wp_enqueue_style( 'bootstrap' );
            wp_enqueue_style( 'lil-b' );
            wp_enqueue_style( 'q-main' );
        }


        /**
         * meta_viewport
         * Defining the meta viewport for the page. Restrict zooming on
         * mobile/tablet devices
         *
         * @meta
         *
         * @return [ string ]
         */
        public static function meta_viewport() {
            // Defining the output
            $output = "\n" . '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\n";
            // Echoing the output
            echo $output;

        }

    }

    // Initialize
    add_action( 'init' , array( 'q_header', 'init' ) );

} ?>