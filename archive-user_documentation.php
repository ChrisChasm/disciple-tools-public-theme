<?php
$landing_post_id = 391; // quick start
?>

<?php get_header(); ?>

<!-- Main -->
<div id="documentation">


    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <?php wp_list_pages(array(
            'post_type' => get_post_type( get_the_ID() ),
            'sort_column' => 'menu_order',
            'echo' => true,
            'title_li' => null,
            'depth' => 1,
        )) ?>
    </div>


    <main role="main" id="post-main">



        <div class="grid-x grid-margin-x grid-padding-x">



            <div id="content-navigation" class="cell medium-3 callout hide-for-small-only">

                <?php get_template_part( "parts/sidebar", "user-documentation" ); ?>

            </div>

            <div class="cell medium-9">

                <span class="hide-for-medium"
                    style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Contents</span>

                <header class="article-header ">

                    <h2 class="entry-title single-title vertical-padding" style="font-weight:bold;" itemprop="headline"><?php echo esc_html( get_the_title( $landing_post_id ) ) ?></h2>

                </header> <!-- end article header -->

                <hr>

                <section class="entry-content" itemprop="text">

                    <div class="callout padding-top-3 padding-bottom-3">
                        <h3>Search</h3>
                        <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url() ) ?>">
                            <div class="input-group large">
                                <input type="search" class="input-group-field search-field" placeholder="Search User Guide ..." value="" name="s" title="Search for:">
                                <input type="hidden" name="post_type" value="user_documentation" />
                                <div class="input-group-button">
                                    <input type="submit" class="search-submit button" value="Search">
                                </div>
                            </div>
                        </form>
                    </div>

                    <?php echo wp_kses_post( get_the_content( null, false, $landing_post_id ) ) ?>

                </section> <!-- end article section -->

            </div>

        </div>

    </main> <!-- end #main -->
</div>

<?php get_footer(); ?>
