<?php
/**
 * None (Content)
 * @template
 * @partial
 *
 * @package q_
 */

?>

<!-- Post Article Wrapper -->
<div class="col-md-8 col-solo no-results not-found">

    <!-- Archive Page Header -->
    <header class="page-header">
        <!-- Archive Page Title -->
        <h1 class="page-title">
            <?php printf( __( 'Nothing found for "<strong>%s</strong>"', '_s' ), '<span>' . get_search_query() . '</span>' ); ?>
        </h1>
    </header>

    <!-- Post Article -->
    <article <?php post_class('entry'); ?>>

        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

            <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', '_s' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

        <?php elseif ( is_search() ) : ?>

            <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', '_s' ); ?></p>
            <?php get_search_form(); ?>

        <?php else : ?>

            <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', '_s' ); ?></p>
            <?php get_search_form(); ?>

        <?php endif; ?>

    </article>

</div>
