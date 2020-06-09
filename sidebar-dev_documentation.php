<?php
/**
 * The sidebar containing the main widget area
 */
?>

<div class="sidebar cell" role="complementary">
    <h2 class="center title"><a href="/dev-docs/">Developer Documentation</a></h2><hr>

    <?php wp_list_pages([
        'post_type' => get_post_type( get_the_ID() ),
        'sort_column' => 'menu_order',
        'echo' => true,
        'title_li' => null,
    ]) ?>
</div>
