<?php
/**
 * Previous & Next
 * @template
 * @partial
 *
 * @package q_
 */

// This template requires $post_data (generated from q_post::previous_next)
if( !$post_data ) {
    return false;
} ?>

<!-- Post Article - What's Next -->
<div class="col-md-8 col-solo entry-previous-next">

    <!-- What's Next - Header -->
    <header class="entry-post-header">
        <h2>What's Next</h2>
    </header>

    <!-- What's Next - Post Container -->
    <div class="row">

        <?php
        foreach( $post_data as $post ) :
            // Setting up the post data for the template
            setup_postdata( $post );
            // Loading the template
            get_template_part( 'templates/content/content', 'snippet' );
        endforeach;
        // Resetting the post data
        wp_reset_postdata();
        ?>

    </div>

</div>
