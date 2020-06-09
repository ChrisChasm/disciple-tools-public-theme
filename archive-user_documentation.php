
<?php get_header(); ?>

<div class="page-wrapper">
    <div class="page-inner-wrapper">

        <!-- Statistics Section-->
        <div class="grid-x grid-padding-x deep-blue-section padding-vertical-1">
            <div class="cell center" style="cursor:pointer;" onclick="window.location = '<?php site_url() ?>/news'">
                <h1 class="center title">User Documentation</h1>
            </div>
        </div>


        <!-- Main -->
        <main role="main" id="post-main" >


            <div class="grid-x grid-margin-x">

                <div class="cell large-8">

                    Test

                </div>

                <div class="sidebar cell large-4">

                    <?php get_sidebar( 'user_documentation' ); ?>

                </div>

            </div>

        </main> <!-- end #main -->

    </div>
</div>

<?php get_footer(); ?>
