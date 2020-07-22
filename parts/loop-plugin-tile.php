<?php $permalink = get_permalink() ?>
<div class="cell medium-6 large-4">
    <div class="card" style="width:100%;" data-equalizer-watch>

        <div style="width:100%;overflow: hidden;">
            <a href="<?php echo $permalink ?>"><?php the_post_thumbnail( [1200,400 ] ); ?></a>
        </div>
        <div class="card-section">
            <p><a href="<?php echo $permalink ?>"><strong><?php the_title() ?></strong></a></p>
            <p><?php the_excerpt(); ?></p>
            <?php if ( $author = get_post_meta( get_the_ID(), 'author', true ) ) : ?>
                <p style="color: grey;">Author: <?php echo esc_attr( $author ) ?></p>
            <?php endif; ?>
            <p>
                <a href="<?php echo $permalink ?>" class="button">View</a>
                <?php if ( $repo = get_post_meta(get_the_ID(), 'github_repo', true ) ) : ?>
                    <a href="https://github.com/<?php echo esc_attr( get_post_meta(get_the_ID(), 'github_owner', true ) ) ?>/<?php echo esc_attr( $repo ) ?>/releases/latest/download/<?php echo esc_attr( $repo ) ?>.zip" class="button">Download</a>
                <?php endif; ?>
            </p>
        </div>
    </div>
</div>
