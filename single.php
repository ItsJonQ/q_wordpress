<?php
/**
 * Single
 * @template
 *
 * @package q_
 */

get_header(); ?>

    <!-- Main Container -->
    <div class="main-container" id="main-container">

        <!-- Post Container -->
        <section class="post-container">

        <?php
        /**
         * Getting the posts
         */
        while ( have_posts() ) {
            // Defining the post info
            the_post();
            // Loading up the content template
            get_template_part( 'templates/content/content', 'single' );
        }
        ?>

        </section>

    </div>

<?php get_footer(); ?>