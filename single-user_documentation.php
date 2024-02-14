<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>

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

    <!-- Main -->
    <main role="main" id="post-main">

        <div class="grid-x grid-margin-x grid-padding-x">

            <div class="cell large-3 medium-4 callout hide-for-small-only">

                <?php get_template_part( "parts/sidebar", "user-documentation" ); ?>

            </div>

            <div class="cell large-9 medium-8">

                 <span class="hide-for-medium"
                       style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Contents</span>

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'parts/loop', 'documentation' ); ?>

                <?php endwhile; else : ?>

                    <?php get_template_part( 'parts/content', 'missing' ); ?>

                <?php endif; ?>

            </div>

        </div>

    </main> <!-- end #main -->

</div>

<?php get_footer(); ?>
