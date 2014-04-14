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
// If q_previous_next is defined, add the What's next label
if($post->q_previous_next) : ?>
<!-- Post Article - Next Post -->
<div class="col-md-8 col-solo">
    <header class="entry-next-post">
        <h4>What's Next</h4>
    </header>
</div>
<?php endif; ?>

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
                <?php q_post::title( $index, 'h2', true ); ?>
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
