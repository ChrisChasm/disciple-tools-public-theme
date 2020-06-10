<?php
/**
 * The sidebar containing the main widget area
 */
?>

<div id="report" class="sidebar cell" role="complementary">

    <?php get_template_part( 'parts/content', 'news-subscribe' ); ?>
    <hr>

    <div class="padding-horizontal-1">
        <h3>Sort By</h3>
        <p>By Month<br>
            <select onchange="window.location = jQuery(this).val()">
                <option></option>
                <?php wp_get_archives(array(
                    'type' => 'monthly',
                    'show_post_count' => true,
                    'post_type' => 'news',
                    'format' => 'option'
                )) ?>
            </select>
        </p>

        <p>By Category<br>
            <select onchange="window.location = jQuery(this).val()">
                <option></option>
                <?php
                $categories = get_categories(array(
                    'hide_empty' => true,
                    'taxonomy' => 'news_categories',
                ));
                foreach ( $categories as $category ) {
                    echo '<option value="'.site_url().'/news-categories/'. $category->slug.'">' . $category->name . '</option>';
                }
                ?>
            </select>
        </p>

    </div>

    <hr>



    <div class="padding-horizontal-1 center">
        <a href="/news/feed">RSS Feed</a>
    </div>
    <div class="padding-horizontal-1 center">
        <a href="/news/?format=compact">Compact Format</a>
    </div>

</div>
