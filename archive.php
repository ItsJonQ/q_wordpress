<?php
/**
 * Archive
 * @template
 *
 * @package q_
 */

get_header();

// Defining the $index for the post loop
$index = 0;
?>

    <!-- Main Container -->
    <div class="main-container" id="main-container">

        <!-- Post List Container -->
        <section class="post-container post-list" id="post-list">

        <?php
        /**
         * Getting the posts
         */
        if ( have_posts() ) : ?>

        <!-- Archive Page Header -->
        <header class="page-header">
            <!-- Archive Page Title -->
            <h1 class="page-title">
                <?php q_post::archive_title(); ?>
            </h1>
            <?php
                // Show an optional term description.
                $term_description = term_description();
                if ( ! empty( $term_description ) ) :
                    printf( '<div class="taxonomy-description">%s</div>', $term_description );
                endif;
            ?>
        </header>
        <?php
            // Looping through the posts
            while ( have_posts() ) {
                // Defining the post info
                the_post();
                // Increasing the $index
                $index++;
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

<?php get_footer(); ?>