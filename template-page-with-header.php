<?php
/*
Template Name: Page With Header
*/
?>
<?php get_header(); ?>

<!-- Title Section-->
<div class="grid-x grid-padding-x deep-blue-section padding-vertical-1">
    <div class="cell center">
        <h1 class="center title"><?php the_title() ?></h1>
    </div>
</div>
<div class="grid-x blue-notch-wrapper"><div class="cell center blue-notch"></div></div>

<!-- Main -->
<main role="main" id="post-main">

    <div class="grid-x grid-margin-x">

        <div class="sidebar cell large-2"></div>

        <div class="blog cell large-8">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <?php the_content(); ?>

            <?php endwhile;
endif; ?>

        </div>

        <div class="sidebar cell large-2"></div>

    </div>

</main> <!-- end #main -->

<div class="padding-top-2">
    <?php get_template_part( "parts/content", "join" ); ?>
</div>

<?php get_footer(); ?>
