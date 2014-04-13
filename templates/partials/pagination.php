<?php
/**
 * Pagination
 * @template
 * @partial
 *
 * @package q_
 */
?>

<!-- Pagination Container -->
<div class="col-md-8 col-solo">

    <!-- Pagination -->
    <nav class="navigation paging-navigation" role="navigation">

        <!-- Pagination Links -->
        <div class="nav-links">

            <?php if ( get_next_posts_link() ) : ?>
            <!-- Previous Posts -->
            <div class="nav-link nav-previous button">
                <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', '_s' ) ); ?>
            </div>
            <?php endif; ?>

            <?php if ( get_previous_posts_link() ) : ?>
            <!-- Next Posts -->
            <div class="nav-link nav-next button">
                <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', '_s' ) ); ?>
            </div>
            <?php endif; ?>

        </div>

    </nav>

</div>
