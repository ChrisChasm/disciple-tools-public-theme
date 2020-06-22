<?php $permalink = get_permalink() ?>
<div class="cell medium-6 large-4">
    <div class="card" style="width:100%;" data-equalizer-watch>
        <div class="card-divider blue-background ">
            <a href="<?php echo $permalink ?>"><strong><?php the_title() ?></strong></a>
        </div>
        <div style="width:100%; height:250px;overflow: hidden;">
            <a href="<?php echo $permalink ?>"><?php the_post_thumbnail( '300' ); ?></a>
        </div>
        <div class="card-section">
            <p><?php the_excerpt(); ?></p>
            <p>
                <a href="<?php echo $permalink ?>" class="button">View</a>
                <?php if ( $download_link = get_post_meta( $post->ID, 'download_url')) : ?>
                <a href="<?php echo esc_html( $download_link ) ?>" class="button">Download</a>
                <?php endif; ?>
            </p>
        </div>
    </div>
</div>
