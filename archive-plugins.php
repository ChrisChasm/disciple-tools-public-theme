
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

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                            <!-- To see additional archive styles, visit the /parts directory -->
                            <?php get_template_part( 'parts/loop', 'plugin-tile' ); ?>

                        <?php endwhile; ?>

                            <?php dtps_page_navi(); ?>

                        <?php else : ?>

                            <?php get_template_part( 'parts/content', 'missing' ); ?>

                        <?php endif; ?>

                    </div> <!-- end grid -->

                    <div class="grid-x">
                        <div class="cell center padding-1">
                            <h3 class="center">Community Plugins</h3>
                        </div>
                        <div class="cell">
                            <table>
                                <thead>
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        Name
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="sidebar cell medium-3 large-4" style="padding-right:20px;">

                    <?php get_sidebar( 'plugins' ); ?>

                </div>


            </div>


        </main> <!-- end #main -->

    </div>
</div>

<div class="page-wrapper blue-background">

    <div class="page-inner-wrapper-hd">
        <div class="grid-x">
            <div class="cell center padding-1">
                <h2 style="color:white">Plugin Guides and Tutorials</h2>
            </div>

        </div>
    </div>

</div>

<hr>

<?php get_footer(); ?>
