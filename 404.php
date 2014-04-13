<?php
/**
 * 404 Page
 * @template
 *
 * @package q_
 */

get_header(); ?>

    <!-- Main Container -->
    <div class="main-container" id="main-container">

        <!-- Post Container -->
        <section class="post-container page-container error-404 not-found">

            <?php get_template_part( 'templates/content/content', '404' ); ?>

        </section>

    </div>

<?php get_footer(); ?>