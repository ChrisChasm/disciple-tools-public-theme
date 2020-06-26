<?php $permalink = get_permalink() ?>
<div class="cell medium-6 large-4">
    <div class="card" style="width:100%;" data-equalizer-watch>

        <div style="width:100%;overflow: hidden;">
            <a href="<?php echo $permalink ?>"><?php the_post_thumbnail( [1200,400 ] ); ?></a>
        </div>
        <div class="card-section">
            <p><a href="<?php echo $permalink ?>"><strong><?php the_title() ?></strong></a></p>
            <p><?php the_excerpt(); ?></p>
            <p>
                <a href="<?php echo $permalink ?>" class="button">View</a>
                <?php if ( $download_link = get_post_meta( $post->ID, 'download_url', true )) : ?>
                <a href="<?php echo esc_html( $download_link ) ?>" class="button">Download</a>
                <?php endif; ?>
            </p>
        </div>
    </div>
</div>
