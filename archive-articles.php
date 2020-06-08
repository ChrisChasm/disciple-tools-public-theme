<?php get_header(); ?>

<!-- Title Section-->
<div class="grid-x grid-padding-x deep-blue-section padding-vertical-1">
    <div class="cell center" style="cursor:pointer;" onclick="window.location = '<?php site_url() ?>/articles'">
        <h1 class="center title">Articles</h1>
    </div>
</div>
<div class="grid-x blue-notch-wrapper"><div class="cell center blue-notch"></div></div>

<!-- Main -->
<main role="main" id="post-main">

    <div class="grid-x grid-margin-x">

        <div class="blog cell large-8">

            <?php /** Show Category Label on Category Pages */
            global $wp;
            $url_parts = explode( '/', $wp->request );
            if ( 'article-topics' === $url_parts[0] ) {
                the_archive_title();
            } ?>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <?php get_template_part( 'parts/loop', 'articles-archive' ); ?>

            <?php endwhile; ?>

                <?php dtps_page_navi(); ?>

            <?php else : ?>

                <?php get_template_part( 'parts/content', 'missing' ); ?>

            <?php endif; ?>

        </div>

        <div class="sidebar cell large-4">

            <?php get_sidebar( 'articles-archive' ); ?>

        </div>

    </div>

</main> <!-- end #main -->

<?php get_footer(); ?>
