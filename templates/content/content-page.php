<?php
/**
 * Page (Content)
 * @template
 * @partial
 *
 * @package q_
 */
?>

<!-- Post Article -->
<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>

    <!-- Post Header -->
    <header class="entry-header">
        <!-- Post Title -->
        <div class="entry-title">
            <!-- Post Title - Headline -->
            <h1>
                <?php the_title(); ?>
            </h1>
        </div>
    </header>

    <!-- Post Content -->
    <div class="entry-content">

        <?php the_content(); ?>

    </div>

</article>