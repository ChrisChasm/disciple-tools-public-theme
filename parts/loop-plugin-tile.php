<div class="cell medium-6 large-4">
    <div class="card" style="width:100%;" data-equalizer-watch>
        <div class="card-divider blue-background ">
            <strong><?php the_title() ?></strong>
        </div>
        <div style="width:100%; height:250px;overflow: hidden;">
            <?php the_post_thumbnail( '300' ); ?>
        </div>
        <div class="card-section">
            <p><?php the_excerpt(); ?></p>
            <p>
                <a class="button">View</a>
                <a class="button">Download</a>
            </p>
        </div>
    </div>
</div>
