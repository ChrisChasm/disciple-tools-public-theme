<?php
/*
Template Name: Join
*/
if ( is_user_logged_in() ) {
    wp_safe_redirect( '/account' );
}
?>

<?php get_header(); ?>

<!-- Title Section-->
<div class="grid-x grid-padding-x deep-blue-section padding-vertical-1">
    <div class="cell center">
        <h1 class="center title">Join the Community</h1>
    </div>
</div>
<div class="grid-x blue-notch-wrapper"><div class="cell center blue-notch"></div></div>

<div id="post-main" class="main" role="main">

    <!-- Header Image-->
    <div class="center">
        <h2 id="about-statement">Zúme is a community of practice <br>for those who want to see disciple making movements.</h2>
    </div>

    <div class="grid-x grid-padding-y">
        <div class="cell center">
            <a class="button primary-button-hollow large" href="/login">Already have a Zúme Training login? Use that here.</a>
        </div>
    </div>

    <!-- Content -->
    <div class="grid-x grid-margin-x">

        <div class="cell small-6 callout">
            <h3>It's Free</h3>
        </div> <!-- column -->
        <div class="cell small-6 callout">
            <h3>Peer Coaching Groups</h3>
        </div> <!-- column -->
        <div class="cell small-6 callout">
            <h3>Local</h3>
        </div> <!-- column -->
        <div class="cell small-6 callout">
            <h3>Local</h3>
        </div> <!-- column -->



    </div>

</div> <!-- end #main -->


<?php get_footer(); ?>



