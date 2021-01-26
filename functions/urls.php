<?php
/**
 * Functions used in the D.T Website implementation
 *
 * @since 0.1
 */


/**
 * Returns the full URI of the images folder with the ending slash, either as images/ or as images/sub_folder/.
 *
 * @param string $sub_folder
 * @return string
 */
function dtps_images_uri( $sub_folder = '' ) {
    $dtps_images_uri = site_url( '/wp-content/themes/disciple-tools-public-site/assets/images/' );
    if ( empty( $sub_folder ) ) {
        return $dtps_images_uri;
    } else {
        return $dtps_images_uri . $sub_folder . '/';
    }
}
