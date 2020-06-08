<?php
$format = false;
if ( isset( $_GET['format'] ) && $_GET['format'] === 'compact' ) {
    $format = 'compact';
}
?>

<?php get_header(); ?>

<!-- Statistics Section-->
<div class="grid-x grid-padding-x deep-blue-section padding-vertical-1">
    <div class="cell center" style="cursor:pointer;" onclick="window.location = '<?php site_url() ?>/reports'">
        <h1 class="center title">Reports</h1>
    </div>
</div>
<div class="grid-x blue-notch-wrapper"><div class="cell center blue-notch"></div></div>

<!-- Main -->
<main role="main" id="post-main">

    <div class="grid-x grid-margin-x">

        <div class="blog cell large-8">

            <?php /** Show Category Bread Crumb */
            global $wp;
            $url_parts = explode( '/', $wp->request );
            if ( 'report-categories' === $url_parts[0] ) {
                the_archive_title();
            } ?>

            <?php /* Show default full view*/
            if ( ! $format ) : if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php get_template_part( 'parts/loop', 'report-archive' ); ?>
            <?php endwhile; ?>
                    <?php zume_page_navi(); ?>
            <?php else : ?>
                <?php get_template_part( 'parts/content', 'missing' ); ?>
            <?php endif;
/* have posts*/ endif; /* no format */ ?>


            <?php /* Show compressed view */
            if ( $format ) : if (have_posts()) : ?>
                <table class=""><thead><tr><th>Date</th><th></th></tr></thead><tbody>
                    <?php while (have_posts()) : the_post(); ?>
                    <tr>
                        <td><span class="small-text"><?php echo get_the_date() ?></span></td>
                        <td><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" style="text-decoration: none;"><?php the_title(); ?></a></td>
                    </tr>
                    <?php endwhile; ?>
                    </tbody></table>
                    <?php zume_page_navi(); ?>
            <?php else : ?>
                <?php get_template_part( 'parts/content', 'missing' ); ?>
            <?php endif;
/* have posts*/ endif; /* has format */  ?>

        </div>

        <div class="sidebar cell large-4">

            <?php get_sidebar( 'reports-archive' ); ?>

        </div>

    </div>

</main> <!-- end #main -->

<?php get_footer(); ?>
