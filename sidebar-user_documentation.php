<?php
/**
 * The sidebar containing the main widget area
 */
?>

<div class="sidebar cell" role="complementary">
    <h2 class="center title"><a href="/user-docs/">User Documentation</a></h2><hr>

    <?php wp_list_pages([
        'post_type' => 'user_documentation',
        'sort_column' => 'menu_order',
        'echo' => true,
        'title_li' => null,
    ]) ?>
</div>
