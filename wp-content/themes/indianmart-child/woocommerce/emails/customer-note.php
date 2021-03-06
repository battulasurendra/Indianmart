<?php
/**
 * Customer note email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-note.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email );?>

    <tr>
        <td style="font-family: 'Open Sans', sans-serif;font-weight: bold;font-size: 18px;line-height:28px;text-transform: uppercase;color: #353535;padding: 10px;" align="center"  width="470px">
            Hi, <?php echo $order->get_formatted_billing_full_name(); ?>
        </td>
    </tr>
    <tr>
        <td align="center" width="470px">
            <img style="display:block; border:none; outline:none; text-decoration:none;-ms-interpolation-mode:bicubic; color:#eeeeee;" width="50" height="4" alt="---------" src="<?php echo get_site_url() .'/wp-content/uploads/2018/02/line_small.png'; ?>"/>
        </td>
    </tr>
    <tr>
        <td style="font-family: 'Open Sans', sans-serif;font-size:14px;line-height:24px;color:#353535;padding-top: 25px; padding-right: 15px; padding-bottom: 5px; padding-left: 15px;" align="center" width="470px">
            A note has just been added to your order:                    
        </td>
    </tr>
    <tr>
        <td style="font-family: 'Open Sans', sans-serif;font-weight: 500; font-size:14px;line-height:24px;color:#2d2d2d;padding: 0px 10px 15px 10px;" align="center" width="470px">
            <?php echo wptexturize( $customer_note ) ?>
        </td>
    </tr>
    <tr>
        <td style="font-family: 'Open Sans', sans-serif;font-size:14px;line-height:24px;color:#353535;" align="center" width="470px">
            Your order details are below.
        </td>
    </tr>

<?php

/**
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
