<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Indianmart
 */

?>

    </div><!-- #content -->
    <footer id="footer" class="site-footer" role="contentinfo">
		<div class="container-fluid">
            <div class="row footrow1 text-center">
                <div class="siteTagLine">EXPLORE THE COLOURFUL CULTURE OF INDIAN FOOD!</div>
            </div>
            <div class="row footrow2">
                <div class="container-fluid no-padding">
                    <div class="col-md-2 col-sm-2 col-xs-12 footerColumnMain">
                        <div class="footerLogo">
                            <img src="<?php echo get_site_url();?>/wp-content/uploads/2017/12/logo.svg" class="custom-logo" alt="Indianmart" itemprop="logo">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 text-left footerColumn vr">
                        <div class="footerHead">About Us</div>
                        <div class="footerList text-left">
                            We are a family-run online Indian grocery store operating from the United Kingdom. We pride ourselves on our unparalleled customer service in offering prompt deliveries of only the highest quality Indian groceries.
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-6 text-left footerColumn">
                        <div class="footerHead">Home</div>
                        <div class="footerList text-left">
                            <?php wp_nav_menu( array( 'theme_location' => 'footer-menu1') ); ?>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-6 text-left footerColumn">
                        <div class="footerHead">Quick Links</div>
                        <div class="footerList text-left">
                            <?php wp_nav_menu( array( 'theme_location' => 'footer-menu2') ); ?>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 text-left footerColumn">
                        <div class="footerHead">Contact Info</div>
                        <div class="footerList text-left">
                            <?php wp_nav_menu( array( 'theme_location' => 'footer-menu3') ); ?>
                        </div>
                        <div class="footerList socialRow text-left">
                            <br>
                            <div class="footerHead inline">follow us</div>
                            <div class="socialMenu inline">
                                <a href="https://www.facebook.com/indianmart" class="inline" target="_blank">
                                    <i class="navSprite icon-fb"></i>
                                </a>
                                <a href="https://twitter.com/indianmart" class="inline" target="_blank">
                                    <i class="navSprite icon-twitter"></i>
                                </a>
                                <a href="https://www.instagram.com/indian_mart/" class="inline" target="_blank">
                                    <i class="navSprite icon-insta"></i>
                                </a>
                                <a href="https://plus.google.com/+IndianMartLeicester" class="inline" target="_blank">
                                    <i class="navSprite icon-gplus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footrow3 row">
                <div class="copyrightText text-center">
                    COPYRIGHT © 2018 indianmart.com. ALL RIGHTS RESERVED.
                </div>
            </div>
        </div>
	</footer>
</div><!-- #page -->

<?php

wp_footer();


if(is_checkout()){
    echo '<script>(function($){$("html,body").animate({scrollTop: 0}, 500)})(jQuery);</script>';
}
?>

</body>
</html>