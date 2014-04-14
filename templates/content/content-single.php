<?php
/**
 * Single (Content)
 * @template
 * @partial
 *
 * @package q_
 */
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
                <?php q_post::meta(); ?>
            </div>

        </header>

        <!-- Post Content -->
        <div class="entry-content">

            <?php the_content(); ?>

        </div>

        <?php q_post::tags(); ?>


    </article>

</div>

<?php q_post::previous_next(); ?>

<!-- Post Article Wrapper -->
<div class="col-md-8 col-solo">

    <!-- Post Comments -->
    <div class="entry-comments">

    <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() ) :
            comments_template();
        endif;
    ?>

    </div>

</div>
