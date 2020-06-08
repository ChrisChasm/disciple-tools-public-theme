<?php
/**
 * The template part for displaying an author byline
 */
?>

<p class="byline">
    <?php
    printf( __( 'Posted on %1$s by %2$s - %3$s', 'dtps' ),
        get_the_time( __( 'F j, Y', 'dtps' ) ),
        get_the_author_posts_link(),
        get_the_category_list( ', ' )
    );
    ?>
</p>
