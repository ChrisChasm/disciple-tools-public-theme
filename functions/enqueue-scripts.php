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

    // main minimized scripts for loaded on all pages
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery' ), filemtime( get_template_directory() . '/assets/scripts/scripts.js' ), true );


    // main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/styles/style.css', array(), filemtime( get_template_directory() . '/assets/styles/scss' ), 'all' );
    wp_style_add_data( 'site-css', 'rtl', 'replace' );


    // foundation styles
    wp_enqueue_style( 'foundations-icons', get_template_directory_uri() .'/assets/styles/foundation-icons/foundation-icons.css', array(), '3' );



    if ( 'plugins' === dt_public_site_get_url_path() ) {
        wp_register_script( 'listjs', '//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js', array( 'jquery' ), '2.3.1', true );
        wp_enqueue_script( 'listjs' );
    }


}
add_action( 'wp_enqueue_scripts', 'site_scripts', 999 );

function dt_public_site_get_url_path() {
    if ( isset( $_SERVER["HTTP_HOST"] ) ) {
        $url  = ( !isset( $_SERVER["HTTPS"] ) || @( $_SERVER["HTTPS"] != 'on' ) ) ? 'http://'. sanitize_text_field( wp_unslash( $_SERVER["HTTP_HOST"] ) ) : 'https://'. sanitize_text_field( wp_unslash( $_SERVER["HTTP_HOST"] ) );
        if ( isset( $_SERVER["REQUEST_URI"] ) ) {
            $url .= sanitize_text_field( wp_unslash( $_SERVER["REQUEST_URI"] ) );
        }
        return trim( str_replace( get_site_url(), "", $url ), '/' );
    }
    return '';
}


function dtps_login_css() {
    dtps_enqueue_style( 'dtps_login_css', 'assets/styles/login.css', array() );
}
add_action( 'login_enqueue_scripts', 'dtps_login_css', 999 );


// calling it only on the login page
add_action( 'login_enqueue_scripts', 'dtps_login_css', 10 );

