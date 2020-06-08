<!-- By default, this menu will use off-canvas for small
     and a topbar for medium-up -->

<?php
    $zume_is_logged_in = is_user_logged_in();

?>

<div class="grid-x margin-horizontal-1 top-bar">

    <div class="cell small-3 large-2" id="top-logo-div">
        <a href="<?php echo esc_url( site_url() ) ?>">
            <div class="zume-logo-in-top-bar"></div>
        </a>
    </div>
    <div class="cell small-6 large-8 hide-for-small show-for-large center" id="top-full-menu-div-wrapper">
        <div id="top-full-menu-div">
            <?php zume_top_nav(); ?>
        </div>
    </div>

    <div class="cell large-2 hide-for-small show-for-large">
        <a href="javascript:void(0)" data-open="search-box" rel="nofollow" title="Search"><i class="fi-magnifying-glass large-text float-right"></i></a>

        <?php if ( ! is_user_logged_in() ) : ?>
            <a href="/login" class="float-right padding-horizontal-1" title="Login"><i class="fi-torso large-text"></i></a>
        <?php endif; ?>

    </div>

    <div class="cell small-3 show-for-small hide-for-large" id="top-mobile-menu-div">
        <div class="mobile-menu">
            <a href="javascript:void(0)" data-open="search-box" rel="nofollow" title="Search" style="padding-right:15px;"><i class="fi-magnifying-glass large-text"></i></a>
            <a data-toggle="off-canvas" style="cursor:pointer; float: right;"><img src="<?php echo esc_url( zume_images_uri() . 'hamburger.svg' ) ?>" alt="menu" /></a>
        </div>
    </div>

</div>

