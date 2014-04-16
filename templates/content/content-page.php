<?php
/**
 * Page (Content)
 * @template
 * @partial
 *
 * @package q_
 */
?>

<?php
// Featurette Cover
q_image::featurette_cover(); ?>

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
        </header>

        <!-- Post Content -->
        <div class="entry-content">

            <?php the_content(); ?>

        </div>

    </article>

</div>
