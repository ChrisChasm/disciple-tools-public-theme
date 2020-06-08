<?php $post = get_post(); ?>

<article id="post-<?php the_ID(); ?>" role="article">
    <div class="grid-x grid-padding-x article-section highlight-background" data-post-id="<?php the_ID(); ?>">
        <div class="cell"><span class="small-text"><?php echo get_the_date() ?></span></div>
        <?php if ( has_post_thumbnail( $post->ID ) ) : ?>
            <div class="cell medium-3 hide-for-small-only padding-top-1">
                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail() ?></a>
            </div>
            <div class="cell medium-9">
        <?php else : ?>
            <div class="cell"><!-- full width without image-->
        <?php endif; ?>

                <header class="article-header">
                    <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                </header> <!-- end article header -->

                <section class="entry-content" itemprop="text">
                    <?php the_excerpt(); ?>
                </section> <!-- end article section -->

                <?php
                $categories = wp_get_object_terms( $post->ID, 'article_topics' );

                if ( ! empty( $categories ) ) {
                    echo '<footer class="article-footer padding-bottom-1">Topics: ';

                    $i = 0;
                    foreach ( $categories as $category ) {
                        if ( $i > 0 ) {
                            echo ', ';
                        }
                        echo '<a href="'.site_url().'/article-topics/'.$category->slug.'">'. $category->name . '</a>';
                        $i++;
                    }
                    echo '</footer> <!-- end article footer -->';
                }
                ?>

            </div>
        </div>
</article> <!-- end article -->
