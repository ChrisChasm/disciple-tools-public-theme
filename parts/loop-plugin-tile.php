<?php $permalink = get_permalink() ?>
<div class="cell medium-6 large-4">
    <div class="card" style="width:100%;" data-equalizer-watch>

        <div style="width:100%;overflow: hidden;">
            <a href="<?php echo esc_url( $permalink ) ?>"><?php the_post_thumbnail( [ 1200,400 ] ); ?></a>
        </div>
        <div class="card-section">
            <p>
                <h4>
                    <a href="<?php echo esc_url( $permalink ) ?>"><?php the_title() ?></a>
                    <?php if ( is_object_in_term( get_the_ID(), 'plugin_categories','beta' ) ) : ?>
                    <span style="background-color: #8bc34a; padding:2px 10px 2px 10px; color:white; margin-left:10px; border-radius: 5px">
                        BETA
                    </span>
                    <?php endif; ?>
                </h4>
            </p>
            <p><?php the_excerpt(); ?></p>
            <?php
            $author = get_post_meta( get_the_ID(), 'author', true );
            if ( $author ) : ?>
                <p style="color: grey;">Author: <?php echo esc_attr( $author ) ?></p>
            <?php endif; ?>
            <p>
                <a href="<?php echo esc_url( $permalink ) ?>" class="button">View</a>
                <?php
                $repo = get_post_meta( get_the_ID(), 'github_repo', true );
                if ( $repo ) : ?>
                    <a href="https://github.com/<?php echo esc_attr( get_post_meta( get_the_ID(), 'github_owner', true ) ) ?>/<?php echo esc_attr( $repo ) ?>/releases/latest/download/<?php echo esc_attr( $repo ) ?>.zip" class="button">Download</a>
                <?php endif; ?>
            </p>
        </div>
    </div>
</div>
