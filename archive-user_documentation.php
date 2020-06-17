<?php
$landing_post_id = 391; // quick start
?>

<?php get_header(); ?>

<!-- Main -->
<div id="documentation">

    <main role="main" id="post-main">

        <div class="grid-x grid-margin-x grid-padding-x">

            <div class="cell large-4 callout gray-background">

                <?php get_sidebar( 'user_documentation' ); ?>

            </div>

            <div class="cell large-8">

                <header class="article-header ">

                    <h2 class="entry-title single-title vertical-padding" style="font-weight:bold;" itemprop="headline"><?php echo get_the_title(  $landing_post_id ) ?></h2>

                </header> <!-- end article header -->

                <hr>

                <section class="entry-content" itemprop="text">

                    <?php echo get_the_content( null, false, $landing_post_id ) ?>

                </section> <!-- end article section -->

            </div>

        </div>

    </main> <!-- end #main -->
</div>

<?php get_footer(); ?>
