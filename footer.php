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

                    <!-- Footer Menu -->
                    <div class="page-wrapper" id="footer-menu-section">
                        <div class="page-inner-wrapper">
                            <div class="grid-x">
                                <div class="cell large-4">
                                    <img class="hfe-retina-img elementor-animation-" src="https://dtools.wpengine.com/wp-content/uploads/2020/04/dt-emblem.png" srcset="https://dtools.wpengine.com/wp-content/uploads/2020/04/dt-emblem.png 1x,https://dtools.wpengine.com/wp-content/uploads/2020/04/dt-emblem-150px.png 2x">
                                </div>
                                <div class="cell large-2">
                                    <p>
                                        <strong>Product</strong><br>
                                        <a href="/features">Features</a><br>
                                        <a href="/security">Security</a><br>
                                        <a href="/pricing">Pricing</a><br>
                                        <a href="/demo">Demo</a>
                                    </p>
                                </div>
                                <div class="cell large-2">
                                    <p><strong>Solutions</strong><br>Team Leader<br>Media Access<br>Mission Organization<br>Network<br>Remote Collaboration<br>Kingdom.Training</p>
                                </div>
                                <div class="cell large-2">
                                    <p><strong>Resources</strong><br>News<br>Documentation<br>Security News<br>Endorsements<br>FAQ</p>
                                </div>
                                <div class="cell large-2">
                                    <p><strong>Developers</strong><br>User Story<br>Open Source<br>GitHub</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Footer Contact Bar-->
                    <div class="page-wrapper " id="footer-contact-bar">
                        <div class="page-inner-wrapper">
                            <div class="grid-x">
                                <div class="cell large-6" style="padding-top:15px;"><span><a href="">Contact Us</a></span></div>
                                <div class="cell large-6 "><span class="float-right"><a href="https://www.youtube.com/channel/UCwQQSXUJunyqnj1bL_Fh6mQ"><i class="fi-social-youtube"></i></a> <a href="https://github.com/DiscipleTools"><i class="fi-social-github"></i></a></span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Contact Bar-->
                    <div class="page-wrapper " id="footer-copyright-bar">
                        <div class="page-inner-wrapper">
                            <div class="grid-x">
                                <div class="cell copyright-content">&copy; <?php echo date( 'Y' ); ?> Gospel Ambition, Inc</div>
                            </div>
                        </div>
                    </div>

                    <!-- Search modal-->
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