<?php
/**
 * Search
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
            <header class="page-header col-md-8 col-solo">
                <!-- Archive Page Title -->
                <h1 class="page-title">
                    <?php printf( __( 'Search Results for "<strong>%s</strong>"', '_s' ), '<span>' . get_search_query() . '</span>' ); ?>
                </h1>
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

                // Pagination
                q_post::pagination();

            else :

                // Loading up the content template
                    get_template_part( 'templates/content/content', 'none' );

            endif; ?>

        </section>

    </div>

<?php get_footer(); ?>
