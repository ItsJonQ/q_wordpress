<?php
/**
 * Post (Content)
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
            <h2>
                <a href="<?php the_permalink(); ?>" rel="bookmark">
                    <?php the_title(); ?>
                </a>
            </h2>
        </div>
        <!-- Post Meta -->
        <div class="entry-meta">
            <?php // echo k_post::meta(); ?>
        </div>

    </header>

    <!-- Post Content -->
    <div class="entry-content">

        <?php the_content(); ?>

    </div>

</article>