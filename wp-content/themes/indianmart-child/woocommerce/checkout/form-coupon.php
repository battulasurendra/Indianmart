<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div id="woo_checkout_coupon"></div>
<?php

if ( ! wc_coupons_enabled() ) {
	return;
}

if ( empty( WC()->cart->applied_coupons ) ) {
	/*$info_message = apply_filters( 'woocommerce_checkout_coupon_message', __( 'Have a coupon?', 'woocommerce' ) . ' <a href="#" class="showcoupon">' . __( 'Click here to enter your code', 'woocommerce' ) . '</a>' );
	wc_print_notice( $info_message, 'notice' );*/
?>
<!--<div class="woocommerce_form_section" id="woo_checkout_coupon">
    <div class="secHeaderRow text-center couponHeader">
        <h2 class="secHeader inline">COUPON CODE</h2>
    </div>
    <div class="col-xs-12 woo_checkout_coupon_sec">
        <form class="checkout_coupon text-center" method="post">
            <div class="form-row form-row-first inline">
                <input type="text" name="coupon_code" class="input-text" placeholder="<?php /*esc_attr_e( 'Enter your code', 'woocommerce' );*/ ?>" id="coupon_code" value="" />
            </div>
            <div class="btnHolder text-center inline">
                <input type="submit" class="btn noarrow" name="apply_coupon" value="<?php /*esc_attr_e( 'Apply coupon', 'woocommerce' );*/ ?>" />
            </div>
            <div class="clear"></div>
        </form>
    </div>
</div>-->

<?php
}
?>