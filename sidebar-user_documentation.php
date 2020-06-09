<?php
/**
 * The sidebar containing the main widget area
 */
?>

<div class="sidebar cell" role="complementary">

    <hr class="show-for-small-only" />

    <?php get_template_part( "parts/content", "join" ); ?>
    <hr>
    <?php get_template_part( 'parts/content', 'news-subscribe' ); ?>
    <hr>

    <!-- Key News-->
    <div class="padding-horizontal-1">
        <h3>Special News</h3>
        <?php dtps_news_nav() ?>
    </div>

</div>
