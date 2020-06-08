<?php
/**
 * The template for displaying the footer.
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>

                <footer class="footer" role="contentinfo">


                    <?php get_template_part( 'parts/nav', 'footer-menus' ); ?>

                    <?php get_template_part( 'parts/nav', 'footer-contact-bar' ); ?>

                    <div class="ast-small-footer footer-sml-layout-1">
                        <div class="ast-footer-overlay">
                            <div class="ast-container">
                                <div class="ast-small-footer-wrap" style="color:white;" >
                                    &copy; <?php echo date( 'Y' ); ?> Gospel Ambition, Inc
                                </div><!-- .ast-row .ast-small-footer-wrap -->
                            </div><!-- .ast-container -->
                        </div><!-- .ast-footer-overlay -->
                    </div><!-- .ast-small-footer-->

                    <div class="reveal" id="search-box" data-reveal>
                        <h1>Search</h1>
                        <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url() ) ?>">
                            <div class="input-group large">
                                <input type="search" class="input-group-field search-field" placeholder="Search..." value="" name="s" title="Search for:">
                                <div class="input-group-button">
                                    <input type="submit" class="search-submit button" value="Search">
                                </div>
                            </div>
                            <button class="close-button" data-close aria-label="Close modal" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </form>
                    </div>

                </footer> <!-- end .footer -->

            </div>  <!-- end .off-canvas-content -->

        </div> <!-- end .off-canvas-wrapper -->

        <?php wp_footer(); ?>

    </body>

</html> <!-- end page -->
