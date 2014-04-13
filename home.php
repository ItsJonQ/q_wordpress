<?php
/**
 * Home
 * @template
 *
 * @package q_
 */

get_header(); ?>

    <!-- Main Container -->
    <div class="main-container container" id="main-container">
        <div class="row">

            <!-- Post List Container -->
            <section class="col-md-8 col-solo" id="post-list">

            <?php
            /**
             * Getting the posts
             */
            if ( have_posts() ) :
                // Looping through the posts
                while ( have_posts() ) {
                    // Defining the post info
                    the_post();
                    // Loading up the content template
                    get_template_part( 'templates/content/content', 'post' );
                }

            else :

                /**
                 * No posts!
                 */

            endif; ?>

            </section>

        </div>
    </div>

<?php get_footer(); ?>