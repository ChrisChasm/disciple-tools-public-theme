<?php get_header(); ?>

    <div class="page-wrapper padding-top-1" >

        <div class="page-inner-wrapper-hd">


            <!-- Main -->
            <main role="main" id="post-main" >

                <div class="grid-x grid-margin-x grid-padding-x">

                    <div class="cell medium-9 large-8">

                        <div class="grid-x grid-padding-x" data-equalizer data-equalize-on="medium"> <!-- grid-->

                            <?php
                            $loop = new WP_Query(
                                [
                                    'post_type' => 'plugins',
                                    'order' => 'ASC',
                                    'orderby' => 'menu_order',
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

                    <div class="sidebar cell medium-3 large-4 " style="padding-right:20px;">

                        <hr class="show-for-small-only" />

                        <?php get_template_part( 'parts/content', 'plugin-search' ); ?>

                        <hr>

                        <div>
                            <h4>What's a Plugin?</h4>
                            <div class="padding-left-1">
                                <p>
                                    Plugins are ways of extending the Disciple.Tools system to meet the unique needs of your project, ministry, or movement.
                                </p>
                                <p>
                                    The power of our open source model is that you don't have to wait on us! Using our starter plugin templates, complete sections can be
                                    added to Disciple.Tools to track and steward ministry information important to you.
                                </p>
                            </div>
                        </div>
                        <hr>

                        <?php get_template_part( 'parts/content', 'plugin-makelist' ); ?>

                    </div>

                </div>

            </main> <!-- end #main -->

        </div>

    </div>

<?php get_footer(); ?>
