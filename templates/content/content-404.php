<?php
/**
 * 404 (Content)
 * @template
 * @partial
 *
 * @package q_
 */
?>
<!-- Post Article Wrapper -->
<div class="col-md-8 col-solo">

    <!-- Post Article -->
    <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>

        <!-- Post Header -->
        <header class="entry-header">
            <!-- Post Title -->
            <div class="entry-title">
                <!-- Post Title - Headline -->
                <h1>
                    <?php _e( 'Oops! That page can&rsquo;t be found.', '_s' ); ?>
                </h1>
            </div>
        </header>

        <!-- Post Content -->
        <div class="entry-content">

            <p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', '_s' ); ?></p>

            <?php get_search_form(); ?>

        </div>

    </article>

</div>
