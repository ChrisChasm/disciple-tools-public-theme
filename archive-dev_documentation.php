<?php
$landing_post_id = 313; // quick start
?>

<?php get_header(); ?>

<!-- Main -->
<div id="documentation">

    <main role="main" id="post-main">

        <div class="grid-x grid-margin-x grid-padding-x">

            <div class="cell large-4 callout">

                <?php get_sidebar( 'dev_documentation' ); ?>

            </div>

            <div class="cell large-8">

                <header class="article-header ">

                    <h2 class="entry-title single-title vertical-padding" style="font-weight:bold;" itemprop="headline"><?php echo get_the_title( $landing_post_id ) ?></h2>

                </header> <!-- end article header -->

                <hr>

                <section class="entry-content" itemprop="text">

                    <div class="callout padding-3">
                        <h3>Search</h3>
                        <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url() ) ?>">
                            <div class="input-group large">
                                <input type="search" class="input-group-field search-field" placeholder="Search Documentation ..." value="" name="s" title="Search for:">
                                <input type="hidden" name="post_type[]" value="dev_documentation" />
                                <div class="input-group-button">
                                    <input type="submit" class="search-submit button" value="Search">
                                </div>
                            </div>
                        </form>
                    </div>

                    <?php echo get_the_content( null, false, $landing_post_id ) ?>

                </section> <!-- end article section -->

            </div>

        </div>

    </main> <!-- end #main -->
</div>

<?php get_footer(); ?>
