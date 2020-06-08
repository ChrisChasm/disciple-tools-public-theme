<h3><a href="/articles">Recent Articles</a></h3>
<ul class="recent-articles">
    <?php
    $recent_posts = wp_get_recent_posts( array(
        'post_type' => 'articles',
        'numberposts'  => 10,
        'post_status' => 'publish'
    ) );
    foreach ( $recent_posts as $recent ) {
        printf( '<li><a href="%1$s">%2$s </a></li>',
            esc_url( get_permalink( $recent['ID'] ) ),
            apply_filters( 'the_title', $recent['post_title'], $recent['ID'] )
        );
    }
    ?>
</ul>
