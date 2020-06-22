<?php
/**
 * The template for displaying all single posts and attachments
 */

$post = get_post();
$post_id = $post->ID;
$postmeta = dtps_filter_meta( get_post_meta( $post->ID ) );

get_header(); ?>

<div class="page-wrapper">
    <div class="page-inner-wrapper">

        <!-- Bread Crumbs-->
        <nav id="post-nav">
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

                <div class="blog cell large-8">

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                            <?php get_template_part( 'parts/loop', 'single' ); ?>

                    <?php endwhile; else : ?>

                        <?php get_template_part( 'parts/content', 'missing' ); ?>

                    <?php endif; ?>

                    <hr>

                    <div id="releases"></div>

                    <?php if ( isset( $postmeta['releases_url'] ) && ! empty( $postmeta['releases_url'] ) ) :  ?>
                        <h2>Releases</h2>
                        <hr>
                        <?php
                        $result = wp_remote_get( $postmeta['releases_url'] );
                        $releases = [];
                        if ( isset( $result['body'] ) ) {
                            $releases = json_decode( $result['body'], true );
                        }

                        ?>

                        <?php foreach( $releases as $release ) : ?>

                            <p><strong><?php echo $release['name'] ?></strong></p>
                            <p><?php echo nl2br( $release['body'] ) ?></p>

                            <?php if ( isset( $release['assets'][0]['browser_download_url'] ) ) : ?>

                                <p><a href="<?php echo  $release['assets'][0]['browser_download_url']  ?>" class="button">Download</a> <?php echo date( 'm-d-Y', strtotime( $release['published_at'] ) ) ?></p>

                            <?php endif; ?>
                            <hr>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </div>

                <div class="sidebar cell large-4 ">

                    <?php get_sidebar( 'plugins' ); ?>

                </div>


            </div>

        </main> <!-- end #main -->

    </div>
</div>

<?php get_footer(); ?>
