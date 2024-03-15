<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 *
 */
?>

<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-T5R42ERNV1"></script><?php // phpcs:ignore ?>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-T5R42ERNV1');
        </script>


        <meta charset="utf-8">

        <!-- Force IE to use the latest rendering engine available -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Mobile Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta class="foundation-mq">



        <!-- Icons & Favicons -->
        <link rel="icon" href="<?php echo esc_url( get_template_directory_uri() ) ?>/favicon.png">
        <link href="<?php echo esc_url( get_template_directory_uri() ) ?>/assets/favicon/apple-icon-touch.png" rel="apple-touch-icon" />
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( get_template_directory_uri() ) ?>/assets/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( get_template_directory_uri() ) ?>/assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( get_template_directory_uri() ) ?>/assets/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?php echo esc_url( get_template_directory_uri() ) ?>/assets/favicon/site.webmanifest">
        <link rel="mask-icon" href="<?php echo esc_url( get_template_directory_uri() ) ?>/assets/favicon/safari-pinned-tab.svg" color="#8bc34a">
        <meta name="msapplication-TileColor" content="#3f729b">
        <meta name="theme-color" content="#8BC34A">


        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

        <?php wp_head(); ?>

    </head>

    <body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WCRQSZT"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

        <div class="off-canvas-wrapper">

            <!-- Load off-canvas container. Feel free to remove if not using. -->
            <?php get_template_part( 'parts/content', 'offcanvas' ); ?>

            <div class="off-canvas-content" data-off-canvas-content>

                <header class="header" role="banner">

                     <!-- This navs will be applied to the topbar, above all content
                          To see additional nav styles, visit the /parts directory -->
                        <?php get_template_part( 'parts/nav', 'offcanvas-topbar' ); ?>

                </header> <!-- end .header -->
