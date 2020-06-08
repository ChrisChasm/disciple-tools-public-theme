<?php
// SIDEBARS AND WIDGETIZED AREAS
function zume_register_sidebars() {
    register_sidebar(array(
        'id' => 'sidebar1',
        'name' => __( 'Sidebar 1', 'zume' ),
        'description' => __( 'The first (primary) sidebar.', 'zume' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'id' => 'sidebar2',
        'name' => __( 'Sidebar 2', 'zume' ),
        'description' => __( 'Sidebar for single posts.', 'zume' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'id' => 'playbook',
        'name' => __( 'Playbook', 'zume' ),
        'description' => __( 'Sidebar for playbook', 'zume' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'id' => 'report',
        'name' => __( 'Report', 'zume' ),
        'description' => __( 'Sidebar for reports', 'zume' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));

//    register_sidebar(array(
//        'id' => 'offcanvas',
//        'name' => __( 'Offcanvas', 'zume' ),
//        'description' => __( 'The offcanvas sidebar.', 'zume' ),
//        'before_widget' => '<div id="%1$s" class="widget %2$s">',
//        'after_widget' => '</div>',
//        'before_title' => '<h4 class="widgettitle">',
//        'after_title' => '</h4>',
//    ));
} /* end register sidebars */

add_action( 'widgets_init', 'zume_register_sidebars' );
