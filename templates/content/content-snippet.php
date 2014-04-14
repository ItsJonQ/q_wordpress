<?php
/**
 * Post (Content)
 * @template
 * @partial
 *
 * @package q_
 */

?>

    <!-- Post Article Wrapper -->
    <div class="col-md-6">

        <!-- Post Article -->
        <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>

            <!-- Post Header -->
            <header class="entry-header">
                <div class="entry-taxonomy">
                    <?php echo q_post::category(); ?>
                </div>
                <!-- Post Title -->
                <div class="entry-title">
                    <!-- Post Title - Headline -->
                    <?php q_post::title( $index, 'h3', true ); ?>
                </div>
                <!-- Post Meta -->
                <div class="entry-meta">
                    <?php q_post::author(); ?>
                    <?php q_post::meta( array( 'category' => false ) ); ?>
                </div>

            </header>

        </article>

    </div>

