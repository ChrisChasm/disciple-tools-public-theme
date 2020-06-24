<?php
/**
 * The template for displaying all single posts and attachments
 */

$release = [];
$post = get_post();
$version_control_url = get_post_meta( $post->ID, 'version_control_url', true );
if ( isset( $version_control_url ) && ! empty( $version_control_url) ) {
    $result = wp_remote_get( $version_control_url );
    if ( ! is_wp_error( $result ) ) {
        $release = json_decode( $result['body'], true );
    }
}

get_header(); ?>

<div class="page-wrapper">
    <div class="page-inner-wrapper">

        <!-- Bread Crumbs-->
        <nav id="post-nav" class="padding-bottom-1">
            <div class="breadcrumb hide-for-small-only">
                <a href="<?php echo esc_url( home_url() ); ?>" rel="nofollow">Home</a>&nbsp;&nbsp;&#187;&nbsp;&nbsp;
                <a href="<?php echo esc_url( home_url() ); ?>/plugins">Plugins</a>&nbsp;&nbsp;&#187;&nbsp;&nbsp;
                <?php echo esc_html( the_title() ) ?>
            </div>
            <div class="breadcrumb-mobile show-for-small-only"><a href="<?php echo esc_url( home_url() ); ?>/plugins">Plugins</a></div>
        </nav>

        <!-- Main -->
        <main role="main" id="post-main">

            <div class="grid-x grid-margin-x">

                <!------------------------------

                IF USING PU4 DT UPDATE SYSTEM

                -------------------------------->
                <?php if ( ! empty( $release) ) : ?>

                    <div class="blog cell large-8">

                        <article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                            <header class="article-header center">

                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div><?php the_post_thumbnail('full'); ?></div>
                                <?php endif; ?>

<!--                                <div><img src="--><?php //echo esc_url( $release['banners']['high'] ) ?><!--" alt="header banner" /></div>-->

                                <h2 class="entry-title single-title vertical-padding" itemprop="headline"><?php the_title(); ?></h2>

                                <div class="center"><a href="<?php echo $release['download_url'] ?>" class="button"><i class="fi-download"></i> Download</a> </div>

                            </header> <!-- end article header -->
                            <hr>
                            <section class="entry-content" itemprop="text">

                                <h2><?php echo $release['name'] ?></h2>

                                <p><strong>Description</strong></p>

                                <?php if ( ! empty( get_the_content() )) : ?>

                                    <?php the_content() ?>

                                <?php else: ?>

                                    <p><?php echo nl2br( esc_html(  $release['sections']['description'] ) ) ?></p>

                                <?php endif; ?>

                                <p><strong>Current Version</strong></p>

                                <p>
                                    Version: <?php echo $release['version'] ?><br>
                                    Released: <?php echo date( 'F, Y' , strtotime( $release['last_updated'] ) ) ?>
                                </p>

                                <p><strong>Latest Release Notes</strong></p>

                                <p><?php echo nl2br( esc_html( $release['sections']['changelog'] ) ) ?></p>

                                <p><strong>Installation</strong></p>

                                <p><?php echo nl2br( $release['sections']['installation'] ) ?></p>

                                <hr>

                                <p>
                                     <a href="<?php echo $release['homepage'] ?>" class="button primary-button-hollow"><i class="fi-social-github"></i> View Code</a>

                                    <?php if ( isset( $release['projects_url'] ) && ! empty( $release['projects_url']  ) ) : ?>
                                        <a href="<?php echo $release['projects_url'] ?>" class="button primary-button-hollow"> View Projects</a>
                                    <?php endif; ?>

                                    <?php if ( isset( $release['wiki_url'] ) && ! empty( $release['wiki_url']  ) ) : ?>
                                        <a href="<?php echo $release['wiki_url'] ?>" class="button primary-button-hollow"> View Wiki</a>
                                    <?php endif; ?>

                                    <?php if ( isset( $release['issues_url'] ) && ! empty( $release['issues_url']  ) ) : ?>
                                        <a href="<?php echo $release['issues_url'] ?>" class="button primary-button-hollow"> View Issues</a>
                                    <?php endif; ?>

                                    <?php if ( isset( $release['license_url'] ) && ! empty( $release['license_url']  ) ) : ?>
                                        <a href="<?php echo $release['license_url'] ?>" class="button primary-button-hollow"> View License</a>
                                    <?php endif; ?>
                                </p>

                            </section> <!-- end article section -->

                            <footer class="article-footer">

                                <p class="tags"><?php the_tags( '<span class="tags-title">' . __( 'Tags:', 'dtps' ) . '</span> ', ', ', '' ); ?></p>

                            </footer> <!-- end article footer -->

                        </article>

                    </div>

                    <div class="sidebar cell large-4 ">

                        <?php get_sidebar( 'plugins-single' ); ?>

                    </div>

                <!------------------------------

                IF NOT USING PU4 DT UPDATE SYSTEM

                -------------------------------->
                <?php else : ?>

                    <div class="blog cell large-8">

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                            <?php get_template_part( 'parts/loop', 'single' ); ?>

                        <?php endwhile; else : ?>

                            <?php get_template_part( 'parts/content', 'missing' ); ?>

                        <?php endif; ?>

                    </div>

                    <div class="sidebar cell large-4 ">

                        <?php get_sidebar( 'plugins-single' ); ?>

                    </div>

                <?php endif; ?>

            </div>

        </main> <!-- end #main -->

    </div>
</div>

<?php get_footer(); ?>
