
<?php get_header(); ?>

<div class="page-wrapper">

    <div class="page-inner-wrapper-hd">

        <!-- Statistics Section-->
        <div class="grid-x grid-padding-x deep-blue-section padding-vertical-1">
            <div class="cell center" style="cursor:pointer;" onclick="window.location = '<?php site_url() ?>/plugins'">
                <h1 class="center title">Plugins</h1>
            </div>
        </div>

        <!-- Main -->
        <main role="main" id="post-main" >

            <div class="grid-x grid-margin-x">

                <div class="cell medium-9 large-8">

                    <div class="grid-x">
                        <div class="cell center padding-1">
                            <h3 class="center">Featured Plugins</h3>
                        </div>
                    </div>

                    <div class="grid-x grid-padding-x" data-equalizer data-equalize-on="medium"> <!-- grid-->

                        <?php
                        $loop = new WP_Query(
                            [  'post_type' => 'plugins',
                                'order' => 'ASC',
                                'orderby' => 'menu_order',
                                'tax_query' => [
                                    [
                                        'taxonomy' => 'plugin_categories',
                                        'field'    => 'slug',
                                        'terms'    => 'featured',
                                    ],
                                ]
                            ]
                        );
                        if ( $loop->have_posts() ) :
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                <?php get_template_part( 'parts/loop', 'plugin-tile' ); ?>
                            <?php endwhile;
                        endif;
                        wp_reset_postdata();

                        ?>

                    </div> <!-- end grid -->

                </div>

                <div class="sidebar cell medium-3 large-4" style="padding-right:20px;">

                    <?php get_sidebar( 'plugins-archive' ); ?>

                </div>

            </div>


        </main> <!-- end #main -->

    </div>
</div>

<?php get_footer(); ?>
