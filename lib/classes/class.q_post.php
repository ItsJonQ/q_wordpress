<?php
/**
 * q_post
 * This is the post class for the q_ wordpress theme
 *
 * @class
 *
 * @package q_
 *
 */

// Defining the q_post class
if(!class_exists('q_post')) {

    class q_post {

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
         * meta
         * @param  [number]  $id    [ Inserting the post's ID ]
         * @param  boolean $echo    [ Determing whether to return or echo the $output ]
         * @return [ html ]         [ Returning the HTML from the publish_date method]
         */
        public static function meta( $id = null, $echo = true ) {
            global $post;
            // Getting the $id if the $id is not defined
            if( !$id ) {
                $id = $post->ID;
            }
            // Defining the $date
            $date = self::publish_date( $id );
            /**
             * Defining the $output
             * The reason why it is currently $output = $date is because the
             * meta method might $output more than just the $date. Keeping
             * it open and flexible for change and customization.
             */
            $output = $date;
            // Returning / echoing the $output
            if( $echo === true ) {
                echo $output;
            } else {
                return $output;
            }
        }


        /**
         * publish_date
         * Generating the post's published date
         * @param  [ number ] $id   [ Inserting the post's ID if applicable]
         * @return [ html ]         [ Returning the pbulishded date in a <time> HTML ]
         */
        public static function publish_date( $id = null, $echo = false ) {
            global $post;
            // Getting the $id if the $id is not defined
            if( !$id ) {
                $id = $post->ID;
            }
            // Defining the $output
            $output = '
            <!-- Post Article: Published Date -->
            <time itemprop="datePublished" datetime="'. get_the_time( 'Y-m-d', $id ) .'">' . get_the_time( 'M j, Y', $id ) . '
            </time>
            ';
            // Returning / echoing the $output
            if( $echo === true ) {
                echo $output;
            } else {
                return $output;
            }
        }



        /**
         * title
         * Generating the title for the post
         * @param  integer $index [ Creates an <h1> tag if the index is 1 (first post) ]
         * @param  boolean $echo  [ If false, return the $output instead of echo'ing it ]
         * @return [ html ]       [ the title wrapped in a header tag ]
         */
        public static function title( $index = 2, $echo = true ) {
            // Defining the header tag
            $header_tag = 'h2';

            // Change the $header_tag to h1 if the $index is 1
            if( $index === 1 ) {
                $header_tag = 'h1';
            }

            // Defining the $title
            $title = get_the_title();
            // Defining the $permalink
            $permalink = get_permalink();

            // Adjusting the title if the page is NOT singular
            if( !is_singular() ) {
                $title = '<a href="'.$permalink.'" title="Read '.$title.'" rel="bookmark">'.$title.'</a>';
            }
            // Creating the headline
            $output = '<'.$header_tag.'>'.$title.'</'.$header_tag.'/>';

            // Return / echo the $output
            if( $echo === true ) {
                echo $output;
            } else {
                return $output;
            }
        }



    }

    // Initialize
    // add_action( 'init' , array( 'q_post' , 'init' ) );

}