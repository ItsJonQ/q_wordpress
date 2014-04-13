<?php
/**
 * Single
 * @template
 *
 * @package q_
 */

get_header(); ?>

<section class="featurette section cover" style="background-image:url('<?php q_image::featured(); ?>')">

</section>

    <!-- Featured Image -->

    <!-- Main Container -->
    <div class="main-container container" id="main-container">
        <div class="row">

            <!-- Post List Container -->
            <section class="col-md-8 col-solo" id="post-list">

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
    </div>

<?php get_footer(); ?>