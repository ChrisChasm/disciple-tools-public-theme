
<?php get_header(); ?>

<div class="page-wrapper">

    <div class="page-inner-wrapper-hd">

        <!-- Statistics Section-->
        <div class="grid-x grid-padding-x deep-blue-section padding-vertical-1">
            <div class="cell center" style="cursor:pointer;" onclick="window.location = '<?php site_url() ?>/plugins'">
                <h1 class="center title">Plugins</h1>
            </div>
        </div>

        <!-- Main -->
        <main role="main" id="post-main" >

            <div class="grid-x grid-margin-x">

                <div class="cell large-8">

                    <div class="grid-x grid-padding-x"> <!-- grid-->

                        <div class="cell center padding-1">
                            <h3 class="center">Featured Plugins</h3>
                        </div>

                        <!-- block -->
                        <div class="cell medium-6 large-4">
                            <div class="card" style="width:100%;">
                                <div class="card-divider">
                                    GenMapper
                                </div>
                                <img src="https://via.placeholder.com/200">
                                <div class="card-section">
                                    <h4>This is a card.</h4>
                                    <p>It has an easy to override visual style, and is appropriately subdued.</p>
                                </div>
                            </div>
                        </div>
                        <!-- block -->
                        <div class="cell medium-6 large-4">
                            <div class="card" style="width:100%;">
                                <div class="card-divider">
                                    Training
                                </div>
                                <img src="https://via.placeholder.com/200">
                                <div class="card-section">
                                    <h4>This is a card.</h4>
                                    <p>It has an easy to override visual style, and is appropriately subdued.</p>
                                </div>
                            </div>
                        </div>
                        <!-- block -->
                        <div class="cell medium-6 large-4">
                            <div class="card" style="width:100%;">
                                <div class="card-divider">
                                    Network Dashboard
                                </div>
                                <img src="https://via.placeholder.com/200">
                                <div class="card-section">
                                    <h4>This is a card.</h4>
                                    <p>It has an easy to override visual style, and is appropriately subdued.</p>
                                </div>
                            </div>
                        </div>
                        <!-- block -->
                        <div class="cell medium-6 large-4">
                            <div class="card" style="width:100%;">
                                <div class="card-divider">
                                    Webform
                                </div>
                                <img src="https://via.placeholder.com/200">
                                <div class="card-section">
                                    <h4>This is a card.</h4>
                                    <p>It has an easy to override visual style, and is appropriately subdued.</p>
                                </div>
                            </div>
                        </div>
                        <!-- block -->
                        <div class="cell medium-6 large-4">
                            <div class="card" style="width:100%;">
                                <div class="card-divider">
                                    Slack
                                </div>
                                <img src="https://via.placeholder.com/200">
                                <div class="card-section">
                                    <h4>This is a card.</h4>
                                    <p>It has an easy to override visual style, and is appropriately subdued.</p>
                                </div>
                            </div>
                        </div>
                        <!-- block -->
                        <div class="cell medium-6 large-4">
                            <div class="card" style="width:100%;">
                                <div class="card-divider">
                                    Metrics
                                </div>
                                <img src="https://via.placeholder.com/200">
                                <div class="card-section">
                                    <h4>This is a card.</h4>
                                    <p>It has an easy to override visual style, and is appropriately subdued.</p>
                                </div>
                            </div>
                        </div>


                    </div> <!-- end grid -->


                </div>

                <div class="sidebar cell large-4">

                    <?php get_sidebar( 'plugins' ); ?>

                </div>


            </div>

        </main> <!-- end #main -->

    </div>
</div>

<div class="page-wrapper blue-background">

    <div class="page-inner-wrapper-hd">
        <div class="grid-x">
            <div class="cell center padding-1">
                <h2 style="color:white">Plugin Guides and Tutorials</h2>
            </div>
        </div>
    </div>

</div>

<hr>

<?php get_footer(); ?>
