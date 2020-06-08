<?php
/**
 * The sidebar containing the main widget area
 */
?>

<div id="report" class="sidebar cell" role="complementary">

    <hr class="show-for-small-only" />

    <!-- Description -->
    <div class="padding-horizontal-1 padding-top-1">
        <h3>What are these reports?</h3>
        <p>Progress can be reported through <a href="<?php echo get_post_permalink( 14 )?>">maps</a> and <a href="<?php echo get_post_permalink( 77 )?>">statistics</a>, but also through stories of kingdom wins and faith steps taken. These reports are the stories of the Zúme vision unfolding.</p>
    </div>
    <hr>
    <?php get_template_part( "parts/content", "join" ); ?>

    <hr><!-- Divider -->
    <?php get_template_part( 'parts/content', 'reports-subscribe' ); ?>
    <hr>

    <div class="padding-horizontal-1">
        <h3>Sort By</h3>
        <p>By Month<br>
            <select onchange="window.location = jQuery(this).val()">
                <option></option>
                <?php wp_get_archives([
                    'type' => 'monthly',
                    'show_post_count' => true,
                    'post_type' => 'reports',
                    'format' => 'option'
                ]) ?>
            </select>
        </p>

        <p>By Category<br>
            <select onchange="window.location = jQuery(this).val()">
                <option></option>
                <?php
                $categories = get_categories([
                    'hide_empty' => true,
                    'taxonomy' => 'report_categories',
                ]);
                foreach ( $categories as $category ) {

                    echo '<option value="'.site_url().'/report-categories/'. $category->slug.'">' . $category->name . '</option>';
                }
                ?>
            </select>
        </p>

    </div>

    <hr>

    <!-- Key Reports-->
    <div class="padding-horizontal-1">
        <h3>Special Reports</h3>
        <?php dtps_reports_nav() ?>
    </div>

    <hr>

    <!-- Statistics -->
    <div class="padding-horizontal-1">
        <?php get_template_part( 'parts/widget', 'sidebar-progress' ); ?>
    </div>

    <hr>

    <div class="padding-horizontal-1 center">
        <a href="/reports/feed">RSS Feed</a>
    </div>
    <div class="padding-horizontal-1 center">
        <a href="/reports/?format=compact">Compact Format</a>
    </div>



</div>
