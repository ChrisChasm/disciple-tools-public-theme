<?php
/**
 * The sidebar containing the main widget area
 */
?>

<div id="playbook" class="sidebar small-12 medium-3 large-3 cell" role="complementary">

    <hr class="show-for-small-only" />

    <?php get_template_part( "parts/content", "top-articles" ); ?>

    <hr>

    <h3>Topics</h3>
    <div class="grid-x padding-left-1">
        <?php
        /** Category List */
        $categories = get_categories( array(
            'taxonomy' => 'article_topics',
            'hide_empty' => false,
        ));

        foreach ( $categories as $category ) {
            if ( $category->count > 0 ) {
                echo '<div class="cell"><a href="'. esc_url( site_url() ).'/article-topics/'.$category->slug.'/">' . esc_html( $category->name ) . '<span class="float-right">('.esc_html( $category->count ).')</span></a></div>';
            } else {
                echo '<div class="cell">' . esc_html( $category->name ) . '<span class="float-right">(0)</span></div>';
            }
        }
        ?>
    </div>

    <hr>
    <?php get_template_part( "parts/content", "join" ); ?>

    <hr>
    <?php get_template_part( 'parts/widget', 'sidebar-recent-articles' ); ?>

    <hr>
    <?php get_template_part( 'parts/widget', 'sidebar-progress' ); ?>

</div>
