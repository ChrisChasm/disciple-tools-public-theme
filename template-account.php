<?php
/**
 * Template Name: Account
 */
if ( ! is_user_logged_in() ) {
    wp_safe_redirect( '/login/?action=register' );
}

/* Build variables for page */
$zume_user = wp_get_current_user(); // Returns WP_User object
$zume_user_meta = zume_get_user_meta( get_current_user_id() ); // Full array of user meta data

get_header(); ?>

<!-- Title Section-->
<div class="grid-x grid-padding-x deep-blue-section padding-vertical-1">
    <div class="cell center" style="cursor:pointer;" onclick="window.location = '<?php site_url() ?>/account'">
        <h1 class="center title">My Account</h1>
    </div>
</div>
<div class="grid-x blue-notch-wrapper"><div class="cell center blue-notch"></div></div>

<style>
    /* Fix for button inheritance on second social sign on. */
    button.button {
        padding-top: .85em;
        padding-bottom: .85em;
    }
</style>
<div id="content" class="grid-x grid-padding-x"><div class="cell">
        <div id="inner-content" class="grid-x grid-margin-x grid-padding-x">
            <div class="large-8 medium-8 small-12 grid-margin-x cell" style="max-width: 900px; margin: 0 auto">

                <div class="grid-x grid-padding-x">
                    <div class="cell" id="profile"></div>
                </div>

                <div class="grid-x grid-padding-x">
                    <div class="cell medium-4 google_elements">
                        <?php
                        if ( ! get_user_meta( $zume_user->ID, 'google_sso_email', true ) ) :
                            zume_google_link_account_button();
                        endif;
                        ?>
                    </div>
                    <div class="cell medium-4 facebook_elements">
                        <?php
                        if ( ! get_user_meta( $zume_user->ID, 'facebook_sso_email', true ) ) :
                            zume_facebook_link_account_button();
                        endif;
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div> <!--cell -->
</div><!-- end #content -->

<?php get_template_part( "parts/content", "fullmodal" ); ?>

<?php get_footer(); ?>
