<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
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
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

?>
<div class="woocommerce_form_section has_inner">

    <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
        <div class="woocommerce_form_inner_sec customerDetailsSec">
            <div class="secHeaderRow text-center customerDetailHeader">
                <h2 class="secHeader inline">BILLING &amp; SHIPPING</h2>
                <i class="sprite sprite-checkoutIcon2"></i>
            </div>

            <?php if ( $checkout->get_checkout_fields() ) : ?>

                <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

                <div id="customer_details">
                    <div class="billing_details_sec">
                        <?php do_action( 'woocommerce_checkout_billing' ); ?>
                    </div>

                    <div class="shipping_details_sec">
                        <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                    </div>
                    <div class="btnHolder text-right">
                        <a href="#woo_checkout_order" class="continueBtn btn noarrow">continue</a>
                    </div>
                </div>

                <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

            <?php endif; ?>
        </div>
        <div id="woo_checkout_order"></div>
        <div class="woocommerce_form_inner_sec orderSummarySec">
            <div class="secHeaderRow text-center orderSummaryHeader">
                <h2 class="secHeader inline">ORDER SUMMARY</h2>
                <i class="sprite sprite-checkoutIcon3"></i>
            </div>

            <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

            <div id="order_review" class="woocommerce-checkout-review-order woo_checkout_order_table_sec">
                <?php do_action( 'woocommerce_checkout_order_review' ); ?>
            </div>
            
            <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
        </div>
    </form>
</div>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
