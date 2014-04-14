<?php
/**
 * Post (Content)
 * @template
 * @partial
 *
 * @package q_
 */

// Getting the $index from the loop
global $index;
?>

<?php
// Featurette Cover
q_image::featurette_cover( array(
    'permalink'     => get_permalink()
) ); ?>

<!-- Post Article Wrapper -->
<div class="col-md-8 col-solo">

    <!-- Post Article -->
    <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>

        <!-- Post Header -->
        <header class="entry-header">
            <!-- Post Title -->
            <div class="entry-title">
                <!-- Post Title - Headline -->
                <?php q_post::title( $index ); ?>
            </div>
            <!-- Post Meta -->
            <div class="entry-meta">
                <?php q_post::author(); ?>
                <?php q_post::meta(); ?>
            </div>

        </header>

        <!-- Post Content -->
        <div class="entry-content">

            <?php the_excerpt(); ?>

        </div>

    </article>

</div>
