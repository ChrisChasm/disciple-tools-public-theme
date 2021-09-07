<?php
/**
 * Special purpose file to deliver JSON response for all active DT Plugins.
 */

if ( defined( 'ABSPATH' )) {
    exit;
} // Exit if accessed directly.


define( 'DOING_AJAX', true );

// Tell WordPress to only load the basics
define( 'SHORTINIT', 1 );

// Setup
if ( ! isset( $_SERVER['DOCUMENT_ROOT'] ) ) {
    exit( 'missing server info' );
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php'; //@phpcs:ignore

// set header type
header( 'Content-type: application/json' );

// test id exists
global $wpdb;

// test hash against post_id's
$selected_plugin = [];
$list = [];
$results = $wpdb->get_results( "SELECT post_id, meta_key, meta_value FROM $wpdb->postmeta WHERE post_id IN (SELECT ID FROM $wpdb->posts WHERE post_type = 'plugins' AND post_status = 'publish')", ARRAY_A );
$data = [];
$relevant_fields = [
    "categories",
    "name",
    "version",
    "download_url",
    "description",
    "changelog",
    "last_updated",
    "upgrade_notice",
    "requires",
    "tested",
    "author",
    "author_homepage",
    "homepage",
    "permalink",
];

// Populate $list array with all available data
if ( ! empty( $results ) ) {
    foreach ( $results as $item ) {
        if ( ! isset( $list[$item['post_id']] ) ) {
            $list[$item['post_id']] = [];
        }
        $list[$item['post_id']][$item['meta_key']] = $item['meta_value'];
        $list[$item['post_id']]['categories'] = $wpdb->get_results( $wpdb->prepare( "SELECT GROUP_CONCAT( t.slug ) as categories FROM $wpdb->posts p LEFT JOIN $wpdb->term_relationships r ON r.object_id = p.id LEFT JOIN $wpdb->terms t ON t.term_id = r.term_taxonomy_id WHERE p.id = %d", $item['post_id'] ), ARRAY_A )[0]['categories'];
        $list[$item['post_id']]['permalink'] = $wpdb->get_results( $wpdb->prepare( "SELECT CONCAT( 'https://disciple.tools/plugins/', post_name, '/' ) AS post_name FROM $wpdb->posts WHERE id = %d", $item['post_id'] ), ARRAY_A )[0]['post_name'];
    }

    // Filter relevant fields for output
    foreach ( $list as $key => $values ) {
        foreach ( $values as $k => $v ) {
            if ( in_array( $k, $relevant_fields ) ) {
                $data[$key][$k] = $v;
            }
        }
    }
}

// publish json
echo json_encode( array_values( $data ) );
