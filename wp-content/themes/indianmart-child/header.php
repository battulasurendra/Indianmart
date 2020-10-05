<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Indianmart
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-91276026-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-91276026-1');
    </script>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()?>/style-responsive.css" media="only screen and (max-width: 992px)">
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/js/allAnimations.min.js"></script>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <?php $pt = get_post_type();?>

    <?php if(is_page(358)): ?>
        <div id="page_loader">
            <img src="<?php echo get_site_url()?>/wp-content/uploads/2017/12/submitRecipe.gif">
        </div>
    <?php elseif($pt == 'recipe'): ?>
        <div id="page_loader">
            <div class="loaderVideo">
                <video autoplay="autoplay" loop="loop" muted="">
                    <source src="<?php echo get_site_url()?>/wp-content/uploads/2017/12/Recipe.mp4" type="video/mp4" />
                </video>
            </div>
            <!--<img src="<?php /*echo get_site_url()*/?>/wp-content/uploads/2017/12/recipe.gif">-->
        </div>
    <?php elseif(is_page(856)): ?>
        <div id="page_loader">
            <img src="<?php echo get_site_url()?>/wp-content/uploads/2017/12/region.gif">
        </div>
    <?php elseif(is_page(852)): ?>
        <div id="page_loader">
            <img src="<?php echo get_site_url()?>/wp-content/uploads/2017/12/festival.gif">
        </div>
    <?php else: ?>
        <div id="page_loader">
            <img src="<?php echo get_site_url()?>/wp-content/uploads/2017/12/common.gif">
        </div>
    <?php endif; ?>
    
<div id="page" class="site">
	<header id="masthead" class="site-header navMenu" role="banner">
		<nav class="navbar main-menu navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <div class="navbar-brand">
                        <?php the_custom_logo(); ?>
                    </div>
                </div>
                <div class="collapse navbar-collapse navbar-wrapper">
                    <div class="innerNavbar">
                        <div class="stickyMenu">
                            <?php wp_nav_menu( array(
                                    'menu'              => 'Header Menu',
                                    'theme_location'    => 'menu-1',
                                    'depth'             => 2,
                                    'menu_class'        => 'nav navbar-nav',
                                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker'            => new WP_Bootstrap_Navwalker())
                                );
                            ?>             
                        </div>
                        <div class="menuSearchBar woocommerce">
                            <?php echo do_shortcode('[wcas-search-form]'); ?>
                        </div>
                    </div>
                </div>
                <div class="navbar-cart">
                    <div class="subMenu">
                        <?php wp_nav_menu( array(
                                'theme_location'    => 'header-submenu',
                                'depth'             => 2,
                                'menu_class'        => 'nav navbar-nav',
                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'            => new WP_Bootstrap_Navwalker())
                            );
                        ?>
                    </div>
                    <div class="cart-btn">
                        <a href="<?php echo wc_get_cart_url(); ?>" class="cart-link mini_cart_drop" title="<?php _e( 'View your shopping cart' ); ?>">
                            My Bag <i class="navSprite bagIcon"></i>
                            <span class="cart-count"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-mini-cart">
                            <li>
                                <div class="widget_shopping_cart_content">
                                    <?php echo woocommerce_mini_cart(); ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container-fluid text-center">
                <div class="row countMessageContainer">
                    <div class="countMessage"></div>
                </div>
            </div>
        </nav>
	</header>
	<div id="content" class="site-content">
