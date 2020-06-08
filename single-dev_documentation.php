<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>

<div class="page-wrapper">
    <div class="page-inner-wrapper">

        <!-- Bread Crumbs-->
        <nav id="post-nav">
            <div class="breadcrumb hide-for-small-only">
                <a href="<?php echo esc_url( home_url() ); ?>" rel="nofollow">Home</a>&nbsp;&nbsp;&#187;&nbsp;&nbsp;
                <a href="<?php echo esc_url( home_url() ); ?>/dev-docs">Dev Documentation</a>&nbsp;&nbsp;&#187;&nbsp;&nbsp;
                <?php echo esc_html( the_title() ) ?>
            </div>
            <div class="breadcrumb-mobile show-for-small-only"><a href="<?php echo esc_url( home_url() ); ?>/dev-docs">Developer Documentation</a></div>
        </nav>

        <!-- Main -->
        <main role="main" id="post-main">

            <div class="grid-x grid-margin-x">

                <div class="blog cell large-8">

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <?php get_template_part( 'parts/loop', 'news' ); ?>

                    <?php endwhile; else : ?>

                        <?php get_template_part( 'parts/content', 'missing' ); ?>

                    <?php endif; ?>

                    <hr>



                </div>

                <div class="sidebar cell large-4">

                    <?php get_sidebar( 'news' ); ?>

                </div>
            </div>

        </main> <!-- end #main -->

    </div>
</div>

<?php get_footer(); ?>
