<?php

add_action( 'init', 'dt_register_shortcodes');
function dt_register_shortcodes(){
    add_shortcode( 'dt-load-github-md', 'DT_load_github_markdown' );
}

function DT_load_github_markdown( $atts ){
    $url = null;
    extract(shortcode_atts(array(
      'url' => null,
   ), $atts));


    if ( $url ) { /* If readme url is present, then the Readme markdown is used */
        $string = file_get_contents( $url );
    }
    // end check on readme existence
    if ( !empty( $string )) {
        $Parsedown = new Parsedown();
        echo $Parsedown->text( $string );
    }

}
