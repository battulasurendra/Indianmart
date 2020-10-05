<?php
/**
 * Checkout login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
    return;
}

//$info_message  = apply_filters( 'woocommerce_checkout_login_message', __( 'Returning customer?', 'woocommerce' ) );
//$info_message .= ' <a href="#" class="showlogin">' . __( 'Click here to login', 'woocommerce' ) . '</a>';
//wc_print_notice( $info_message, 'notice' );
?>
<div class="woocommerce_form_section">
    <div class="secHeaderRow text-center loginHeader">
        <h2 class="secHeader inline">Customer Information</h2>
        <i class="sprite sprite-checkoutIcon1"></i>
    </div>
    <div class="col-sm-6 col-xs-12 woo_checkout_login_sec">
        <?php
            woocommerce_login_form(
                array(
                    /*'message'  => __( 'If you have shopped with us before, please enter your details in the boxes below. <br> If you are a new customer, please proceed to the Billing &amp; Shipping section.', 'woocommerce' ),*/
                    'redirect' => wc_get_page_permalink( 'checkout' ),
                    'hidden'   => false,
                )
            );
        ?>
    </div>
    <div class="col-sm-6 col-xs-12 woo_checkout_guest_sec text-center">
        <div class="guestImage">
            <img src="../wp-content/uploads/2017/09/guest-icon.png">
        </div>
        <div class="guestHeader">Continue without signing in</div>
        <div class="guestText">
            You'll have the option to register for an account after you enter billing and shipping details.
            You can also register for an new account from our page.
        </div>
        <div class="guestBtn btnHolder">
            <a href="#woo_checkout_coupon" id="guestBtn" class="continueBtn btn noarrow yellowBtn">continue as guest</a>
        </div>
    </div>
</div>
<?php

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
