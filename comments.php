<?php
/**
 * Comments
 * @template
 *
 * @package q_
 */

get_header();
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php // You can start editing here -- including this comment! ?>

    <?php if ( have_comments() ) : ?>
        <h3 class="comments-title">
            <?php
                printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments titlesss', '_s' ),
                    number_format_i18n( get_comments_number() ), '' );
            ?>
        </h3>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav id="comment-nav-above" class="comment-navigation" role="navigation">
            <h3 class="screen-reader-text"><?php _e( 'Comment navigation', '_s' ); ?></h3>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', '_s' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', '_s' ) ); ?></div>
        </nav><!-- #comment-nav-above -->
        <?php endif; // check for comment navigation ?>

        <ol class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'      => 'ol',
                    'short_ping' => true,
                ) );
            ?>
        </ol><!-- .comment-list -->

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav id="comment-nav-below" class="comment-navigation" role="navigation">
            <h3 class="screen-reader-text"><?php _e( 'Comment navigation', '_s' ); ?></h3>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', '_s' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', '_s' ) ); ?></div>
        </nav><!-- #comment-nav-below -->
        <?php endif; // check for comment navigation ?>

    <?php endif; // have_comments() ?>

    <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
        <p class="no-comments"><?php _e( 'Comments are closed.', '_s' ); ?></p>
    <?php endif; ?>

    <?php comment_form( array(
        'comment_notes_after' => null
        )
    ); ?>

</div><!-- #comments -->
