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

global $wpdb;
$wpdb->dt_usage = $wpdb->prefix . 'dt_usage';
//latest record for each instance

$plugins_data = get_transient( "dt_plugins_cache" );
if ( !empty( $plugins_data ) ){
    echo json_encode( array_values( $plugins_data ) );
    exit();
}

$latest_records = $wpdb->get_results( $wpdb->prepare("
    SELECT u1.*
    FROM $wpdb->dt_usage as u1
    LEFT JOIN $wpdb->dt_usage as u2
    ON ( u1.site_id = u2.site_id AND u1.timestamp < u2.timestamp )
    WHERE u2.timestamp IS NULL
    AND u1.timestamp > %s
    ", gmdate( "Y-m-d H:i:s", time() - DAY_IN_SECONDS * 30 ) ), ARRAY_A );

$active_plugins = [];
foreach ( $latest_records as $record ){
    $payload = maybe_unserialize( $record["payload"] );
    if ( $payload === false ){
        $fixed_data = preg_replace_callback( '!s:(\d+):"(.*?)";!', function ( $match ){
            return ( $match[1] == strlen( $match[2] ) ) ? $match[0] : 's:' . strlen( $match[2] ) . ':"' . $match[2] . '";';
        }, $record["payload"] );
        $payload = maybe_unserialize( $fixed_data );
    }

    if ( !empty( $payload["active_plugins"] ) && $payload["usage_version"] > 3 ){
        $payload["active_plugins"] = array_unique( $payload["active_plugins"] );
        foreach ( $payload["active_plugins"] as $active_plugin ){
            $active_plugin = str_replace( ".php", "", $active_plugin );
            if ( !isset( $active_plugins[$active_plugin] ) ){
                $active_plugins[$active_plugin] = 0;
            }
            $active_plugins[$active_plugin]++;
        }
    }
}


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
    "icon",
    "active_installs"
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
        $values["active_installs"] = isset( $active_plugins[$values['github_repo']] ) ? $active_plugins[$values['github_repo']] : 0;
        foreach ( $values as $k => $v ) {
            if ( in_array( $k, $relevant_fields ) ) {
                $data[$key][$k] = $v;
            }
        }
    }
}

set_transient( "dt_plugins_cache", $data, HOUR_IN_SECONDS );

// publish json
echo json_encode( array_values( $data ) );
