
<?php get_header(); ?>

<!-- Main -->
<div id="documentation">

    <main role="main" id="post-main">

        <div class="grid-x grid-margin-x grid-padding-x">

            <div class="cell large-4 callout">

                <?php get_sidebar( 'dev_documentation' ); ?>

            </div>

            <div class="cell large-8">

                <?php echo get_the_content(null, false, 336 ) ?>

            </div>

        </div>

    </main> <!-- end #main -->
</div>

<?php get_footer(); ?>
