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

            // add_filter('excerpt_more', array( 'q_post', 'filter_excerpt_read_more' ) );
        }

        /**
         * archive_title
         * This is the archive title template that came stock with the
         * Wordpress Underscores theme.
         *
         * _e is a Built in WP class (not exclusive to Underscores)
         * @reference http://codex.wordpress.org/Function_Reference/_e
         *
         * @return [ html/text ]     Echo's the archive page's title
         */
        public static function archive_title() {

            if ( is_category() ) :
                printf( '<strong>' . single_cat_title( '', false ) . '</strong>' );

            elseif ( is_tag() ) :
                printf( '<span class="hashtag">#</span><strong>' . single_tag_title( '', false ) . '</strong>' );

            elseif ( is_author() ) :
                printf( __( 'Posts by <strong>%s</strong>', '_s' ), '<span class="vcard">' . get_the_author() . '</span>' );

            elseif ( is_day() ) :
                printf( __( 'Day: %s', '_s' ), '<span>' . get_the_date() . '</span>' );

            elseif ( is_month() ) :
                printf( __( 'Month: %s', '_s' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', '_s' ) ) . '</span>' );

            elseif ( is_year() ) :
                printf( __( 'Year: %s', '_s' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', '_s' ) ) . '</span>' );

            // elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
            //     _e( 'Asides', '_s' );

            // elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
            //     _e( 'Galleries', '_s');

            // elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
            //     _e( 'Images', '_s');

            // elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
            //     _e( 'Videos', '_s' );

            // elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
            //     _e( 'Quotes', '_s' );

            // elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
            //     _e( 'Links', '_s' );

            // elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
            //     _e( 'Statuses', '_s' );

            // elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
            //     _e( 'Audios', '_s' );

            // elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
            //     _e( 'Chats', '_s' );

            else :
                _e( 'Archives', '_s' );

            endif;

        }

        /**
         * author
         * Returning the author of the post
         * This is the author code that came with the Underscores Wordpress theme.
         * @return [ html ] [ author + author link]
         */
        public static function author() {
            // Return the author
            return sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                esc_html( get_the_author() )
            );
        }


        public static function category() {
            ob_start();
            the_category('</span><span class="space">|</span><span itemprop="articleSection">');
            $category = ob_get_clean();
            $output = '<span class="entry-category"><span itemprop="articleSection">'.$category.'</span></span>';
            return $output;
        }


        /**
         * content
         * the_content() output with a customized read more
         * @return [ html ]         [ Returning a customized the_content() ]
         */
        public static function content( $echo = true ) {
            // Customizing the read more text;
            $read_more = 'Keep Reading';

            // Defining the $output
            $output = get_the_content( $read_more );

            // Returning the $output
            if( $echo === true ) {
                echo $output;
            } else {
                return $output;
            }
        }


        /**
         * meta
         * @param  [number]  $id    [ Inserting the post's ID ]
         * @param  boolean $echo    [ Determing whether to return or echo the $output ]
         * @return [ html ]         [ Returning the HTML from the publish_date method]
         */
        public static function meta( $id = null, $echo = true ) {
            // Getting the $id if the $id is not defined
            if( !$id ) {
                $id = get_the_ID();
            }
            // Defining the $date
            $author = self::author();
            $date = self::publish_date( $id );
            $category = self::category();
            // Defining the separator
            $sep = ' <span class="sep">&#183;</span> ';
            /**
             * Defining the $output
             * The reason why it is currently $output = $date is because the
             * meta method might $output more than just the $date. Keeping
             * it open and flexible for change and customization.
             */
            $output = $author . $sep . $date . $sep . $category;
            // Returning / echoing the $output
            if( $echo === true ) {
                echo $output;
            } else {
                return $output;
            }
        }

        public static function pagination() {
            // Don't print empty markup if there's only one page.
            if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
                return;
            }

            ob_start();
            // Getting the pagination template
            include( locate_template( 'templates/partials/pagination.php' ) );
            // Defining the $output from the template
            $output = ob_get_clean();

            // Echoing the $output
            echo $output;
        }

        public static function previous_post() {
            global $post;
            // Defining the previous post
            $prev_post = get_previous_post();
            // Return false if $prev_post is empty
            if( empty($prev_post) ) {
                return false;
            }

            // Getting the previous post
            $prev_post = get_posts( 'p='.$prev_post->ID );
            // Looping through foreach loop from get_posts
            foreach( $prev_post as $post ) :
                // Setting up the post data for the template
                setup_postdata( $post );
                // Adding the attribute to check for previous/next usage in snippet template
                $post->q_previous_next = 'previous';
                // Loading the template
                get_template_part( 'templates/content/content', 'snippet' );
            endforeach;
            // Resetting the post data
            wp_reset_postdata();

            return true;

        }


        /**
         * publish_date
         * Generating the post's published date
         * @param  [ number ] $id   [ Inserting the post's ID if applicable]
         * @return [ html ]         [ Returning the pbulishded date in a <time> HTML ]
         */
        public static function publish_date( $id = null, $echo = false ) {
            // Getting the $id if the $id is not defined
            if( !$id ) {
                $id = get_the_ID();
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
         * tags
         * Generating the tags for the post
         * @param  boolean $echo    [ If false, return the $output instead of echo'ing it ]
         * @return [ html ]         [ returning / echoing the tags ]
         */
        public static function tags( $echo = true ) {
            ob_start();
            the_tags('<span class="tag-label">Tags:</span> <span class="tag"><span class="hashtag">#</span>', '</span><span class="tag"><span class="hashtag">#</span>', '</span></span>');
            $tags = ob_get_clean();
            $output = '
            <!-- Post Tags -->
            <div class="entry-tags">
                '.$tags.'
            </div>
            ';

            // Returning / echoing
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
        public static function title( $index = 2, $tag = null, $url = false, $echo = true ) {

            // If $tag is not defined
            if( !isset( $tag ) ) {

                // Defining the header tag
                $header_tag = 'h2';

                // Change the $header_tag to h1 if
                // $index === 1
                // is_page()
                // is_singular()
                // BUT NOT
                // is_archive()
                if( ( $index === 1 ||
                    is_page() ||
                    is_singular() ) &&
                    !is_archive()
                     ) {
                    $header_tag = 'h1';
                }

            } else {
                // Set $header_tag as $tag
                $header_tag = $tag;
            }

            // Defining the $title
            $title = get_the_title();
            // Defining the $permalink
            $permalink = get_permalink();

            // Adjusting the title if the page is NOT singular or if $url is true
            if( !is_singular() || $url === true ) {
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