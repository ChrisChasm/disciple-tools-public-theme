<?php
/**
 * The sidebar containing the main widget area
 */
?>

<div id="report" class="sidebar cell" role="complementary">

    <hr class="show-for-small-only" />

    <?php get_template_part( "parts/content", "join" ); ?>
    <hr>
    <?php get_template_part( 'parts/content', 'reports-subscribe' ); ?>
    <hr>

    <?php get_template_part( 'parts/widget', 'sidebar-progress' ); ?>

    <hr>

    <!-- Key Reports-->
    <div class="padding-horizontal-1">
        <h3>Special Reports</h3>
        <?php dtps_reports_nav() ?>
    </div>

</div>
