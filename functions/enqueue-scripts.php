<?php
/**
 * Load scripts
 *
 * @param string $handle
 * @param string $rel_src
 * @param array  $deps
 * @param bool   $in_footer
 */
function dtps_enqueue_script( $handle, $rel_src, $deps = array(), $in_footer = false ) {
    if ( $rel_src[0] === "/" ) {
        throw new Error( "dtps_enqueue_script took \$rel_src argument which unexpectedly started with /" );
    }
    wp_enqueue_script( $handle, get_template_directory_uri() . "/$rel_src", $deps, filemtime( get_template_directory() . "/$rel_src" ), $in_footer );
}

/**
 * Load styles
 *
 * @param string $handle
 * @param string $rel_src
 * @param array  $deps
 * @param string $media
 */
function dtps_enqueue_style( $handle, $rel_src, $deps = array(), $media = 'all' ) {
    if ( $rel_src[0] === "/" ) {
        throw new Error( "dtps_enqueue_style took \$rel_src argument which unexpectedly started with /" );
    }
    wp_enqueue_style( $handle, get_template_directory_uri() . "/$rel_src", $deps, filemtime( get_template_directory() . "/$rel_src" ), $media );
}

function site_scripts() {
    global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
    $dtps_user = wp_get_current_user();
    $dtps_user_meta = dtps_get_user_meta( $dtps_user->ID );

    // main minimized scripts for loaded on all pages
//    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery', 'lodash', 'wp-i18n' ), filemtime( get_template_directory() . '/assets/scripts/scripts.js' ), true );
//
//    wp_register_script( 'dtps-core', get_template_directory_uri() . '/assets/scripts/api.js', array( 'jquery', 'lodash', 'wp-i18n' ), filemtime( get_theme_file_path() . '/assets/scripts/api.js' ), true );
//    wp_enqueue_script( 'dtps-core' );
//    wp_localize_script(
//        "dtps-core", "dtpsCore", array(
//            'root' => esc_url_raw( rest_url() ),
//            'nonce' => wp_create_nonce( 'wp_rest' ),
//            'theme_uri' => get_stylesheet_directory_uri(),
//            'logged_in' => is_user_logged_in(),
//        )
//    );

    // lodash load
    wp_register_script( 'lodash', 'https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js', false, '4.17.11' );
    wp_enqueue_script( 'lodash' );

    // main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/styles/style.css', array(), filemtime( get_template_directory() . '/assets/styles/scss' ), 'all' );
    wp_style_add_data( 'site-css', 'rtl', 'replace' );

    // script for threaded comments
//    if ( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1 )) {
//        wp_enqueue_script( 'comment-reply' );
//    }

    // foundation styles
    wp_enqueue_style( 'foundations-icons', get_template_directory_uri() .'/assets/styles/foundation-icons/foundation-icons.css', array(), '3' );


}
add_action( 'wp_enqueue_scripts', 'site_scripts', 999 );


function dtps_login_css() {
    dtps_enqueue_style( 'dtps_login_css', 'assets/styles/login.css', array() );
}
add_action( 'login_enqueue_scripts', 'dtps_login_css', 999 );


// calling it only on the login page
add_action( 'login_enqueue_scripts', 'dtps_login_css', 10 );

