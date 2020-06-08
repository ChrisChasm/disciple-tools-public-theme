<?php
// Related Posts Function, matches posts by tags - call using zume_related_posts(); )
function zume_related_posts() {
    global $post;
    $tag_arr = '';
    $tags = wp_get_post_tags( $post->ID );
    if ($tags) {
        foreach ( $tags as $tag ) {
            $tag_arr .= $tag->slug . ',';
        }
        $args = array(
            'tag' => $tag_arr,
            'numberposts' => 3, /* you can change this to show more */
            'post__not_in' => array( $post->ID )
        );
        $related_posts = get_posts( $args );
        if ($related_posts) {
            echo '<div class="widget">';
            echo __( '<h4 class="widgettitle">Related Posts</h4>', 'zume' );
            echo '<ul class="zume-related-posts">';
            foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
                <li class="related_post">
                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                </li>
            <?php endforeach; }
            echo '</div>';
    }
    wp_reset_postdata();
    echo '</ul>';
} /* end zume related posts function */
