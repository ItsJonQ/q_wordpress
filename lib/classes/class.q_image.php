<?php
/**
 * q_image
 * This is the image class for the q_ wordpress theme
 *
 * @class
 *
 * @package q_
 *
 */

// Defining the q_image class
if(!class_exists('q_image')) {

    class q_image {

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
         * get_thumbnail
         * Method that grabs the thumbnail / featured image from a post
         *
         * @param  [ array ] $options   [ array of options]
         * @return [ html / img]        [ returns an image tag ]
         */
        public static function get_thumbnail( $options = null ) {

            global $post;

            // Defining the $return from options
            $return = isset($options['return']) ? $options['return'] : 'image';

            // Defining the size from options
            $size = isset($options['size']) ? $options['size'] : 'thumbnail';

            // Defining the alt
            $alt = isset($options['alt']) ? $options['alt'] : false;

            $id = isset($options['id']) ? $options['id'] : $post->ID;

            // Getting and defining the $thumb from WP thumbnail
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), $size );

            // $thumb array reference
            // $thumb_src = $thumb[0];
            // $thumb_width = $thumb[1];
            // $thumb_height = $thumb[2];

            // Adjust the image "alt" if alt is defined
            if( isset($alt) ) {
                $alt = 'alt="'.$alt.'"';
            }

            // Return false if the thumbnail doesn't exist
            if(!$thumb) return false;

            // Returning a URL
            if( $return === 'url' ) {
                $output = $thumb[0];
            }
            // Returning the $thumb array
            elseif( $return === 'array' ) {
                $output = $thumb;
            }
            // Returning an image (default)
            else {
                $output = '<img itemprop="image" src="'.$thumb[0].'"" '.$alt.' width="'.$thumb[1].'" height="'.$thumb[2].'">';
            }

            // Returning the output
            return $output;

        }

        public static function featured( $id = null ) {
            // Defining the $id if not defined
            if( !$id ) {
                global $post;
                $id = $post->ID;
            }

            /**
             * Defining the $featured_image using the get_thumbnail method
             * @param       return      returns the thumbnail url
             * @param       size        full sized image
             * @param       id          the post's id
             */
            $featured_image = self::get_thumbnail( array(
                'return'    => 'url',
                'size'      => 'full',
                'id'        => $id
                ));

            // Return false if post does not have a featured image
            if( !$featured_image ) {
                return false;
            }

            echo $featured_image;

        }

    }

    // Initialize
    // add_action( 'init' , array( 'q_image' , 'init' ) );

}